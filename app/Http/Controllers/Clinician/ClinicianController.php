<?php

namespace App\Http\Controllers\Clinician;

use App\Http\Controllers\Controller;
use App\Models\ScanModel\Aanp;
use App\Models\Applicant;
use App\Models\Designation;
use App\Models\ScanModel\NursePractitionerUsers;
use App\Models\ScanModel\PhysicianAssistantUsers;
use App\Models\ScanModel\Abfm;
use App\Models\UploadDocuments;
use App\Models\User;
use Yajra\DataTables\DataTables;
use App\Services\AdminService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use ZipArchive;
use PDF;
use Illuminate\Support\Facades\Validator;
use App\Models\ScanModel\PhysicianUsers;
use App\Models\ScanModel\Abim;
use App\Models\ScanModel\Ama;
use App\Models\ScanModel\CategorySiteMapping;
use App\Models\ScanModel\Dea;
use App\Models\ScanModel\Ecfmg;
use App\Models\ScanModel\Everify;
use App\Models\ScanModel\Nccpa;
use App\Models\ScanModel\Npdb;
use App\Models\ScanModel\NursingWorld;
use App\Models\ScanModel\Nysed;
use App\Models\ScanModel\OfficeInspectorGeneral;
use App\Models\ScanModel\OfficeMedicaidInspector;
use App\Models\ScanModel\Sam;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Image;

class ClinicianController extends Controller
{
    public function index($status)
    {
        $designations = Designation::where('role_id', 4)->get();
        return view('admin.clinician.index',compact('status', 'designations'));
    }

    public function getList(Request $request)
    {
        $input = $request->all();

        $user = User::with('designation')
            ->whereHas('roles', function($q) {
                $q->where('name','=', 'clinician');
            })
            ->when($input['status'] ,function ($query) use($input) {
                if ($input['status'] == 'pending') {
                    $query->whereIn('status', ['0', '3']);
                } else if ($input['status'] == 'active') {
                    $query->where('status', '1');
                }
            })
            ->when($input['searchstatus'] ,function ($query) use($input) {
            	  if ($input['searchstatus'] == 'rejected') {
                    $query->where('status', '3');
                } else if ($input['searchstatus'] == 'applicant') {
                    $query->where('status', '0');
                }
            })
            ->when($input['designation_id'], function ($query) use($input){
                $query->where('designation_id', $input['designation_id']);
            })
            ->when($input['first_name'], function ($query) use($input){

                $query->where('id', $input['first_name']);
            })
            ->when($input['last_name'], function ($query) use($input){

                $query->where('id', $input['last_name']);
            })
            ->when($input['email'], function ($query) use($input){
                $email = $input['email'];

                $query->where('email','LIKE',"%$email%");
            })
            ->when($input['gender'], function ($query) use($input){
                $query->where('gender', $input['gender']);

            })->orderBy('id','DESC')->get();

        return  DataTables::of($user)
            ->addColumn('checkbox_id', function($q) {
                return '<div class="checkbox"><label><input class="innerallchk" onclick="chkmain();" type="checkbox" name="allchk[]" value="' . $q['id'] . '" /><span></span></label></div>';
            })
            ->addColumn('name', function ($row){
                return '<a href="'.url("/admin/clinician-detail/".$row['id']).'" title="View Profile">'.$row['full_name'].'</a>';
            })
            ->addColumn('gender', function ($user){
                return $user->gender_data;
            })
            ->addColumn('dob', function ($user){
                if ($user->dob != '')
                    return date('m-d-Y', strtotime($user->dob));
                else
                    return $user->dob;
            })
            ->addColumn('designation_id', function ($user){
                $designation = '';

                if ($user->designation) {
                    $designation = $user->designation->name;
                }
                return $designation;
            })
            ->addColumn('phone', function ($user){
                $designation = '';

                if ($user->phone) {
                    $designation = $user->phone;
                }
                return $designation;
            })
            ->addColumn('created_at', function ($user){
                $created_at = '';

                if ($user->created_at) {
                    $created_at = viewDateTimeFormat($user->created_at);
                }
                return $created_at;
            })
            ->addColumn('action', function ($row){

                $action = '';
                if ($row->status === '0') {
                    $action .= '<a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Accept" class="btn btn-primary btn-green shadow-sm btn--sm mr-2 update-status" data-status="1">Accept</a>';
                    $action .= ' <a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Reject" class="btn btn-danger shadow-sm btn--sm mr-2 update-status" data-status="3">Reject</a>';
                } else if ($row->status === '1') {
                    // $action .= ' <a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Reject" class="btn btn-danger shadow-sm btn--sm mr-2 update-status" data-status="3">Reject</a>';
                } else if ($row->status === '3') {
                    $action .= '<a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Accept" class="btn btn-primary btn-green shadow-sm btn--sm mr-2 update-status" data-status="1">Accept</a>';
                }
                $action .= '<a href="javascript:void(0)" data-toggle="tooltip" id="' . $row->id . '" data-original-title="Due Report" class="btn btn-sm viewprintOption" style="background: #006c76; color: #fff">Print</a>';
                //$action .= '<a id="print" data-id="'.$row->id.'" class="btn btn-primary btn-sm mr-2">Print</a>';
                //$action .= '<a href="'.route('clinician.info',['id' => $row->id]).'" class="btn btn-primary btn-sm mr-2">Print</a>';
                return $action;
            })
            ->rawColumns(['action', 'checkbox_id','name'])
            ->make(true);
    }

    public function getUserData(Request $request)
    {
        $data = [];
        if($request->has('q')){
            $search = $request->q;
            $data = User::whereHas('roles', function($q) {
                $q->where('name','=', 'clinician');
            })->select("id","first_name", 'last_name')
            ->where('first_name','LIKE',"%$search%")->orWhere('last_name', 'LIKE', "%$search%")
            ->get();
        }

        return response()->json($data);
    }
    
    public function getprintoption($id)
    {   
        if (isset($id)) {
            // $userDeviceLog = UserDeviceLog::where('id',$id)->first();
            // $notes = explode('.', $userDeviceLog->note);
            $user = User::with('applicant')->select('id','first_name','last_name')->where('id',$id)->first();
            $documents = UploadDocuments::where('user_id',$id)->get();
            $file_name = $user->first_name . ' ' . $user->last_name;
            $employer_verify = '';
            if ($user->applicant && $user->applicant->employer_verify) {
                $employer_verify = $user->applicant->employer_verify;
            }

            return view('pages.clincian.print.print_option', compact('id','documents', 'file_name', 'employer_verify'));
        }
    }
    /**
     * Covid 19 data will display
     *
     * @return \Illuminate\Http\Response
     */
    public function clinicianInfo(Request $request)
    {
        $input = $request->all();
        try {
            $users = Applicant::where('user_id', $input['id'])->with('user', 'documents', 'user.designation')
            ->withCount([
                'documents',
                'documents as idProof_count' => function ($query) {
                    $query->where('type', 1);
                },
                'documents as degreeProof_count' => function ($query) {
                    $query->where('type', 2);
                },
                'documents as medicalReport_count' => function ($query) {
                    $query->where('type', 3);
                },
                'documents as insuranceReport_count' => function ($query) {
                    $query->where('type', 4);
                },
                'documents as socialSecurity_count' => function ($query) {
                    $query->where('type', 5);
                },
                'documents as professionalReferrance_count' => function ($query) {
                    $query->where('type', 6);
                },
                'documents as nycNurseCertificate_count' => function ($query) {
                    $query->where('type', 8);
                },
                'documents as CPR_count' => function ($query) {
                    $query->where('type', 9);
                },
                'documents as physical_count' => function ($query) {
                    $query->where('type', 10);
                },
                'documents as forensicDrugScreen_count' => function ($query) {
                    $query->where('type', 11);
                },
                'documents as RubellaImmunization_count' => function ($query) {
                    $query->where('type', 12);
                },
                'documents as RubellaMeasiesImmunization_count' => function ($query) {
                    $query->where('type', 13);
                },
                'documents as malpracticeInsurance_count' => function ($query) {
                    $query->where('type', 14);
                },
                'documents as flu_count' => function ($query) {
                    $query->where('type', 15);
                },
                'documents as annualPPD_count' => function ($query) {
                    $query->where('type', 16);
                },
                'documents as chestXRay_count' => function ($query) {
                    $query->where('type', 17);
                },
                'documents as annualTubeScreening_count' => function ($query) {
                    $query->where('type', 18);
                },
                'documents as w4document_count' => function ($query) {
                    $query->where('type', 19);
                },
                'documents as pictureIdentification_count' => function ($query) {
                    $query->where('type', 25);
                },
                'documents as currentCV_count' => function ($query) {
                    $query->where('type', 26);
                },
                'documents as ProfessionalLicense_count' => function ($query) {
                    $query->where('type', 27);
                },
                'documents as StateRegistrationCertificate_count' => function ($query) {
                    $query->where('type', 28);
                },
                'documents as DEALicense_count' => function ($query) {
                    $query->where('type', 29);
                },
                'documents as ControlledSubstanceStateLicense_count' => function ($query) {
                    $query->where('type', 30);
                },
                'documents as MalpracticeCertificateOfInsurance_count' => function ($query) {
                    $query->where('type', 31);
                },
                'documents as ExplanationOfAllMalpractice_count' => function ($query) {
                    $query->where('type', 32);
                },
                'documents as MedicalSchoolDiploma_count' => function ($query) {
                    $query->where('type', 33);
                },
                'documents as ResidencyCertificate_count' => function ($query) {
                    $query->where('type', 34);
                },
                'documents as FellowshipCertificate_count' => function ($query) {
                    $query->where('type', 35);
                },
                'documents as InternshipCertificate_count' => function ($query) {
                    $query->where('type', 35);
                },
                'documents as ECFMGCertificate_count' => function ($query) {
                    $query->where('type', 36);
                },
                'documents as BoardCertificate_count' => function ($query) {
                    $query->where('type', 37);
                },
                'documents as HospitalAffiliationLetter_count' => function ($query) {
                    $query->where('type', 38);
                },
                'documents as SanctionsQueries_count' => function ($query) {
                    $query->where('type', 39);
                },
                'documents as MedicareWelcomeLetter_count' => function ($query) {
                    $query->where('type', 40);
                },
                'documents as SignedW9_count' => function ($query) {
                    $query->where('type', 41);
                },
                'documents as SignedESignatureForm_count' => function ($query) {
                    $query->where('type', 42);
                },
                'documents as CovidCertificate_count' => function ($query) {
                    $query->where('type', 44);
                },
                'documents as CPRACLS_count' => function ($query) {
                    $query->where('type', 45);
                },
                ])
            ->first();

            if ($users) {
                $employer_verify = [];
                if ($users->employer_verify) {
                    $employer_verify = $users->employer_verify;
                }
                // $pdf = PDF::loadView('pages.clincian.clinician-form', $data);
                // return $pdf->stream($users->full_name .'.pdf');
                //return view('pages.clincian.clinician-form', compact('users'));
                // return view('pages.clincian.print.background_check_print', compact('users'));
                
                $response = [
                    'users' => $users,
                    'employer_verify' => $employer_verify,
                ];

                

                if($input['fileType'] === 'demograhics') {
                    $pdf = PDF::loadView('pages.clincian.print.application_print', $response);
                }
                if($input['fileType'] === 'document') {
                    $pdf = PDF::loadView('pages.clincian.print.documents_print', $response);
                }
                if($input['fileType'] === 'empVerify') {
                    $pdf = PDF::loadView('pages.clincian.print.emp_verification_print', $response);
                }
                if($input['fileType'] === 'form8850') {
                    $pdf = PDF::loadView('pages.clincian.print.form8850_print', $response);
                }
                if($input['fileType'] === 'i9form') {
                    $pdf = PDF::loadView('pages.clincian.print.i9form_print', $response);
                }
                if($input['fileType'] === 'i9form_verify') {
                   
                    $pdf = PDF::loadView('pages.clincian.print.i9form_verify', $response);
                }
                if($input['fileType'] === 'NoticePay') {
                    $pdf = PDF::loadView('pages.clincian.print.payroll_print', $response);
                }
                if($input['fileType'] === 'w4form') {
                    $pdf = PDF::loadView('pages.clincian.print.w4_print', $response);
                }
                if($input['fileType'] === 'NYState') {
                    $pdf = PDF::loadView('pages.clincian.print.withholdingIT204_print', $response);
                }
            }

            $pdf->setPaper('A4');
       
            return $pdf->stream('clinician.pdf');
            
        } catch (Exception $e) {
            dd("Error: ". $e->getMessage());
        }
    }

    public function i9form_verify($id)
    {
        $users = Applicant::where('user_id', $id)->with('user', 'documents', 'user.designation')->first();

        return view('pages.clincian.print.i9form_verify', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $applicant = Applicant::where('user_id', $request->user_id)->first();
            $applicant->employer_verify = $request->employer_verify;

            $applicant->save();

            $arr = array('status' => 200, 'message' => 'form submited successfully.', 'data' => []);
        } catch (\Illuminate\Database\QueryException $ex) {
            $message = $ex->getMessage();
            if (isset($ex->errorInfo[2])) {
                $message = $ex->errorInfo[2];
            }

            $arr = array("status" => 400, "message" => $message, "resultdata" => array());
        } catch (Exception $ex) {
            $message = $ex->getMessage();
            if (isset($ex->errorInfo[2])) {
                $message = $ex->errorInfo[2];
            }
            
            $arr = array("status" => 400, "message" => $message, "resultdata" => array());
        }
        return \Response::json($arr);
    }
    
    public function getClinicianDetail($id)
    {
        //$services = new AdminService();
       // $response = $services->getClinicianDetail($id);
          $response = User::with(['applicant.references', 'applicant.state', 'applicant.city', 'education.medicalInstituteState', 'education.medicalInstituteCity', 'education.residencyInstituteState', 'education.residencyInstituteCity', 'education.fellowshipInstituteState', 'education.fellowshipInstituteCity', 'professional.medicareState', 'professional.medicaidState', 'professional.ageRanges', 'professional.stateLicenses.licenseState', 'professional.boardCertificates', 'attestation', 'background.country', 'background.state', 'background.city', 'deposit.state', 'deposit.city', 'documents','designation','applicant'])->findOrFail($id);
      	//dd($response->applicant);
        $data = [];
        //if ($response != null && $response->status === true) {
        if ($response != null) {
            $data = $response;

                 $applicant = $workHistory_detail = $military_detail = $security_detail = $prior = $address = $info = $reference_detail = $employer_detail = $education_detail = $emergency_detail = $payroll_details = $professional_detail = $document_information = $employer_verify = [];
            if ($data->applicant) {
            
            $applicant = $data->applicant;
                if ($data->applicant->workHistory_detail) {
                    $workHistory_detail = $data->applicant->workHistory_detail;
                }

                if ($data->applicant->military_detail) {
                    $military_detail = $data->applicant->military_detail;
                }

                if ($data->applicant->security_detail) {
                    $security_detail = $data->applicant->security_detail;
                }

                if ($data->applicant->address_detail) {
                    //$prior = $address = $info = '';
                    if(isset($data->applicant->address_detail->prior)) {
                    	$prior = $data->applicant->address_detail->prior;
                    }
                    if(isset($data->applicant->address_detail->address)) {
                    	$address = $data->applicant->address_detail->address;
                    }
                   if(isset($data->applicant->address_detail->info)) {
                    	$info = $data->applicant->address_detail->info;
                    }
                }

                if ($data->applicant->reference_detail) {
                    $reference_detail = $data->applicant->reference_detail;
                }

                if ($data->applicant->employer_detail) {
                    $employer_detail = $data->applicant->employer_detail;
                }

                if ($data->applicant->education_detail) {
                    $education_detail = $data->applicant->education_detail;
                }

                if ($data->applicant->emergency_detail) {
                    $emergency_detail = $data->applicant->emergency_detail;
                }

                if ($data->applicant->payroll_details) {
                    $payroll_details = $data->applicant->payroll_details;
                }

                if ($data->applicant->payroll_details) {
                    $payroll_details = $data->applicant->payroll_details;
                }

                if ($data->applicant->professional_detail) {
                    $professional_detail = $data->applicant->professional_detail;
                }
                if ($data->applicant->document_Information) {
                    $document_information = $data->applicant->document_Information;
                }
                if ($data->applicant->employer_verify) {
                    $employer_verify = $data->applicant->employer_verify;
                }
            }
	
            $scan_field = $scanId = $cat_id = $board = '';
            $today = date('Y-m-d');

            if ($data->designation_id == '9') {
                $ssn = $dob ='';
                if (isset($info->ssn) && isset($info->dateOfBirth)) {
                    $ssn = setSsn($info->ssn);
                    $dob = date("Y-m-d", strtotime($info->dateOfBirth));
                }

                if ($ssn != '' && $dob != '') {
                    $physicianUser = PhysicianUsers::where([['ssn_no','=', $ssn],['date_of_birth', '=' , $dob]])->first();

                    if ($physicianUser) {
                        $scanId = $physicianUser->id;
                        $scan_field = 'PhysicianUsers';
                        $board = $physicianUser->board;
                    }
                }
                $cat_id = '1';
            } else if ($data->designation_id == '1') {
                $ssn = $dob ='';

                if (isset($info->ssn) && isset($info->dateOfBirth)) {
                    $ssn = setSsn($info->ssn);
                     $dob = date("Y-m-d", strtotime($info->dateOfBirth));
                }

                if ($ssn != '' && $dob != '') {
                    $nursePractitionerUsers = NursePractitionerUsers::where([['ssn_no','=', $ssn],['date_of_birth', '=' , $dob]])->first();

                    if ($nursePractitionerUsers) {
                        $scanId = $nursePractitionerUsers->id;
                        $scan_field = 'NursePractitionerUsers';
                    }
                }
                $cat_id = '2';
            } else if ($data->designation_id == '4') {
                $ssn = $dob ='';
                if (isset($info->ssn) && isset($info->dateOfBirth)) {
                    $ssn = setSsn($info->ssn);
                      $dob = date("Y-m-d", strtotime($info->dateOfBirth));
                }

                if ($ssn != '' && $dob != '') {
                    $physicianAssistantUsers = PhysicianAssistantUsers::where([['ssn_no','=', setSsn($info->ssn)],['date_of_birth', '=' , $dob]])->first();

                    if ($physicianAssistantUsers) {
                        $scanId = $physicianAssistantUsers->id;
                        $scan_field = 'PhysicianAssistantUsers';
                    }
                }
                $cat_id = '3';
            }
            
            $mapId = CategorySiteMapping::with('siteInfo')->where('category_id', $cat_id)->get();

            // $url = "https://1000logos.net/wp-content/uploads/2016/11/google-logo.jpg";
            // $contents = file_get_contents($url);
            // $name = substr($url, strrpos($url, '/') + 1);

            // Storage::put($name, $contents);
            // $where = [
            //     'physician_user_id' => 1,
            //     'cron_status' => '1',
            // ];
            // $data = OfficeInspectorGeneral::where($where)->get();
           // dd();
            $currentMonth = Carbon::now()->month;
            return view('pages.admin.nurse-view', compact('data', 'prior','address','info','reference_detail','emergency_detail','education_detail','security_detail','military_detail','employer_detail','payroll_details','workHistory_detail','professional_detail','document_information','applicant', 'scanId', 'cat_id', 'scan_field', 'mapId', 'board', 'currentMonth', 'employer_verify'));
        }

        return redirect()->back();
    }

    public function getScrapDetail(Request $request)
    {
        $input = $request->all();
        $where = [];
        if ($input['scan_field'] === 'PhysicianUsers') {
            $where = [
                'physician_user_id' => $input['scanId'],
                //'cron_status' => '1',
            ];
        } else if ($input['scan_field'] === 'NursePractitionerUsers') {
            $where = [
                'nurse_prac_user_id' => $input['scanId'],
                //'cron_status' => '1',
            ];
        } else if ($input['scan_field'] === 'PhysicianAssistantUsers') {
            $where = [
                'phy_assi_user_id' => $input['scanId'],
                //'cron_status' => '1',
            ];
        }

        if ($input['sites_name'] === 'dea') {
            $data = Dea::query();
            $input['siteId'] = '14';
        }

        if ($input['sites_name'] === 'omig') {
            $data = OfficeMedicaidInspector::query();
            $input['siteId'] = '2';
        }

        if ($input['sites_name'] === 'oig') {
            $data = OfficeInspectorGeneral::query();
            $input['siteId'] = '1';
        }

        if ($input['sites_name'] === 'npdb') {
            $data = Npdb::query();
            $input['siteId'] = '11';
        }

        if ($input['sites_name'] === 'samgov') {
            $data = Sam::query();
            $input['siteId'] = '3';
        }

        if ($input['sites_name'] === 'nys') {
            $data = Nysed::query();
            $input['siteId'] = '13';
        }

        if ($input['scan_field'] === 'PhysicianUsers') {
            if ($input['sites_name'] === 'abim') {
                $data = Abim::query();
                $input['siteId'] = '4';
            }

            if ($input['sites_name'] === 'abfm') {
                $data = Abfm::query();
                $input['siteId'] = '6';
            }

            if ($input['sites_name'] === 'everify') {
                $data = Everify::query();
                $input['siteId'] = '9';
            }

            if ($input['sites_name'] === 'ecfmg') {
                $data = Ecfmg::query();
                $input['siteId'] = '8';
            }
        }

        if ($input['scan_field'] === 'PhysicianAssistantUsers') {
            if ($input['sites_name'] === 'nccpa') {
                $data = Nccpa::query();
                $input['siteId'] = '10';
            }
        }
        if ($input['scan_field'] === 'PhysicianAssistantUsers' || $input['scan_field'] === 'PhysicianUsers') {
            if ($input['sites_name'] === 'ama') {
                $data = Ama::query();
                $input['siteId'] = '5';
            }
        }

        if ($input['scan_field'] === 'NursePractitionerUsers') {
            if ($input['sites_name'] === 'aanp') {
                $data = Aanp::query();
                $input['siteId'] = '7';
            }

            if ($input['sites_name'] === 'nursingworld') {
                $data = NursingWorld::query();
                $input['siteId'] = '12';
            }
        }
        
        $data
            ->where($where)
            ->when($input['year'] ,function ($query) use($input) {
                $query->whereYear('created_at', $input['year']);
            })->when($input['month'] ,function ($query) use($input) {
                $query->whereMonth('created_at', $input['month']);
            })
            ->when($input['start_date'], function ($query) use($input){
                if ($input['start_date'] && $input['end_date']) {
                    $query->whereDate('due_date',[$input['start_date'],$input['end_date']]);
                }
            })
            ->orderBy('id','DESC');

             if ($input['currentMonth'] === 'current') {
                 $data->take(1);
             }
            
            $datatble = DataTables::of($data->get());
                $datatble->addColumn('checkbox_id', function($q) use($input) {
                    return '<div class="checkbox"><label><input class="innerallchk1 innerallchk'.$input['sites_name'].'" onclick="chkmain('.$input['sites_name'].');" type="checkbox" name="allchk[]" value="' . $q->id . '" id="'.$input['sites_name'].'"/><span></span></label></div>';
                });
                $datatble->addColumn('created_at', function($row){
                    return viewDateHM($row->created_at);
                });
                if ($input['sites_name'] === 'oig') {
                    $datatble->addColumn('name', function($row){
                        return $row->first_name . ' ' . $row->last_name;
                    });
                }
                $datatble->addColumn('action', function($row) use($input) {
                    $actual_link = 'http://3.132.211.119/'.$row->screenshot;
                    //$routeurl = 'http://3.132.211.119/user/run';
                    $btn = '<a class="nav-link active view_document" data-id="'.$row->id .'" data-type="Dea" href="javascript:void(0)" data-action="scanReport" data-value="' . $actual_link .'" data-field="">Print</a>';

                    //$btn .= '<button class="btn btn-primary SingleRun" type="button" data-id="' .  $input['category_id'] . '" data-scan="' .  $input['scanId'] . '" data-site="' .  $input['siteId'] . '"  data-url="' . $routeurl . '">Start</button>';
                    
                    $btn .= getstatus($row->status);
                    
                    return $btn;

                });
                $datatble->rawColumns(['checkbox_id', 'action']);
                return $datatble->make(true);
    }

    public function getClinicianData(Request $request)
    {
        $requestData = $request->all();
        $data = [];
        if (isset($requestData['searchTerm']) && $requestData['searchTerm']) {
            $services = new AdminService();
            $response = $services->getClinicianData($requestData);
            // print_r($response);die();
            if ($response != null && $response->status === true) {
                $data['data'] = $response->data;
            }
        }
        return $data;
    }

    public function scrapedpdf(Request $request)
    {
        $input = $request->all();
     
        foreach ($input['data'] as $element) {
            $arr[$element['id']][] = $element['value'];
        }

        $dea = $omig = $oig = $npdb = $samgov = $nys = $abim = $abfm = $everify = $ecfmg = $nccpa = $aanp = $ama = $nursingWorld = '';
     
        if (isset($arr['dea'])) {
            $dea = Dea::whereIn('id',$arr['dea'])->select('id','created_at', 'dea_no', 'name', 'business_activity', 'status', 'screenshot')->get();
        }

        if (isset($arr['omig'])) {
            $omig = OfficeMedicaidInspector::whereIn('id',$arr['omig'])->select('id','created_at', 'provider_name', 'license_number', 'npi_number', 'status', 'screenshot')->get();
        }

        if (isset($arr['oig'])) {
            $oig = OfficeInspectorGeneral::whereIn('id',$arr['oig'])->select('id','created_at', 'npi_no','upin_no', 'status', 'screenshot')->get();
        }

        if (isset($arr['npdb'])) {
            $npdb = Npdb::whereIn('id',$arr['npdb'])->select('id','created_at', 'status', 'screenshot')->get();
        }

        if (isset($arr['samgov'])) {
            $samgov = Sam::whereIn('id',$arr['samgov'])->select('id','created_at', 'status', 'screenshot')->get();
        }


        if (isset($arr['nys'])) {
            $nys = Nysed::whereIn('id',$arr['nys'])->select('id','created_at', 'name', 'address', 'profession', 'status', 'screenshot')->get();
        }

        if (isset($arr['abim'])) {
            $abim = Abim::whereIn('id',$arr['abim'])->select('id','created_at', 'abim_id', 'certification_status', 'initial_certi', 'status', 'screenshot')->get();
        }

        if (isset($arr['abfm'])) {
            $abfm = Abfm::whereIn('id',$arr['abfm'])->select('id','created_at', 'certification', 'cert_status', 'cert_history', 'status', 'screenshot')->get();
        }
        
        if (isset($arr['everify'])) {
            $everify = Everify::whereIn('id',$arr['everify'])->select('id','created_at', 'verification_num', 'case_status', 'submitted_by', 'case_result', 'clouser', 'status', 'screenshot')->get();
        }

        if (isset($arr['ecfmg'])) {
            $ecfmg = Ecfmg::whereIn('id',$arr['ecfmg'])->select('id','created_at', 'requester', 'usmle_id', 'applicant_name', 'request_status', 'status', 'screenshot')->get();
        }

        if (isset($arr['nccpa'])) {
            $nccpa = Nccpa::whereIn('id',$arr['nccpa'])->select('id','created_at', 'nccpa_detail', 'status', 'screenshot')->get();
        }       
        
        if (isset($arr['aanp'])) {
            $aanp = Aanp::whereIn('id',$arr['aanp'])->select('id','created_at', 'order_num', 'pdf', 'status', 'screenshot')->get();
        }

        if (isset($arr['ama'])) {
            $ama = Ama::whereIn('id',$arr['ama'])->select('id','created_at', 'order_id', 'status', 'screenshot')->get();
        }

        if (isset($arr['nursingWorld'])) {
            $nursingWorld = NursingWorld::whereIn('id',$arr['nursingWorld'])->select('id','created_at', 'order_id', 'status', 'screenshot')->get();
        }

        $response = [
            'dea' => $dea,
            'omig' => $omig,
            'oig' => $oig,
            'npdb' => $npdb,
            'samgov' => $samgov,
            'nys' => $nys,
            'abim' => $abim,
            'abfm' => $abfm,
            'everify' => $everify,
            'ecfmg' => $ecfmg,
            'nccpa' => $nccpa,
            'aanp' => $aanp,
            'ama' => $ama,
            'nursingWorld' => $nursingWorld,
            'title' => 'Scraped'
        ];

        $pdf = PDF::loadView('pages.admin.clinician-detail.scrap-pdf', $response);
        $pdf->setPaper('A4');
       
        return $pdf->stream('scraped.pdf');
    }

    public function getDocument(Request $request)
    {
        $input = $request->all();
        $documents = [];
        if (isset($input['action']) && $input['action'] === 'document') {
            $documents = UploadDocuments::where([
                'user_id' => $input['user_id'],
                'type' => $input['type_id']
            ])->get();
        } 

        return view('pages.admin.clinician-detail.viewDocument', compact('documents', 'input'))->render();
    }


    public function updatescrapStatus(Request $request)
    {
        $input = $request->all();
        $query = '';
        if ($input['action'] === 'Dea') {
            $query = Dea::query();
        } elseif ($input['action'] === 'OfficeMedicaidInspector') {
            $query = OfficeMedicaidInspector::query();
        } elseif ($input['action'] === 'Abim') {
            $query = Abim::query();
        } elseif ($input['action'] === 'Abfm') {
            $query = Abfm::query();
        } elseif ($input['action'] === 'Nysed') {
            $query = Nysed::query();
        } elseif ($input['action'] === 'OfficeInspectorGeneral') {
            $query = OfficeInspectorGeneral::query();
        } elseif ($input['action'] === 'Nccpa') {
            $query = Nccpa::query();
        } elseif ($input['action'] === 'Aanp') {
            $query = Aanp::query();
        } elseif ($input['action'] === 'NursingWorld') {
            $query = NursingWorld::query();
        } elseif ($input['action'] === 'Ama') {
            $query = Ama::query();
        } elseif ($input['action'] === 'Everify') {
            $query = Everify::query();
        } elseif ($input['action'] === 'Npdb') {
            $query = Npdb::query();
        } elseif ($input['action'] === 'Sam') {
            $query = Sam::query();
        } elseif ($input['action'] === 'Ecfmg') {
            $query = Ecfmg::query();
        }
        $query->where('id',$input['id'])->update([
            'status' => $input['status'],
        ]);
        $response["status"] = true;
        $response["code"] = 200;
        $response["message"] = 'Status updated';
        $response["data"] = $query;

        return response()->json($response, 200);
    }

    public function downloadDocument($id,Request $request)
    {
        $uploadDocuments = UploadDocuments::where([
            'user_id' => $id,
            'type' => $request['type_id']
        ])->get();

        $public_dir=public_path();
        $zipFileName = 'documentzipfile-'.$id.'.zip';

        $zip = new ZipArchive;

        if (!file_exists($public_dir.'/zip')) {
            mkdir($public_dir.'/zip', 0777, true);
        }

        if ($zip->open($public_dir . '/zip' . '/' . $zipFileName, ZipArchive::CREATE) === TRUE) {
            foreach ($uploadDocuments as $key => $uploadDocument) {
                $document = $uploadDocument->file_name;
                $path = $uploadDocument->file_url;
                $zip->addFile($path.$document,$document);
            }
            // $zip->close();
        }

        // Set Header
        $headers = array(
            'Content-Type' => 'application/octet-stream',
        );
        $filetopath=$public_dir. '/zip' . '/'.$zipFileName;

        // Create Download Response
        if(file_exists($filetopath)){
            return response()->download($filetopath,$zipFileName,$headers);
        }
    }

    public function profileView($id)
    {
        if ($id != Auth::user()->id) {
            return view('errors.401');
        }
        $user = User::where('id',$id)->first();

        return view('admin.clinician.profile',compact('user'));
    }

    public function profileUpdate(Request $request)
    {
        $input =  $request->all();

        $rules = [
            'nickname' => 'required',
        ];

        $messages = [
            'nickname.required' => 'Please enter nick name.',
        ];

        $validator = Validator::make($input, $rules, $messages);

        if ($validator->fails()) {
            $arr = array('status' => 400, 'message' => $validator->getMessageBag()->toArray(), 'resultdata' => array());
        } else {
            try {

                $user = User::find($input['id_for_update']);
                $message = 'Profile updated successfully!!';

                if (isset($input["avatar"]) && !empty($input["avatar"])) {
                    $file = $input['avatar'];
                    $new_file_name = time(). "_" .$file->getClientOriginalName();
                    copy($file->getRealPath(),public_path('upload/images/'.$new_file_name));
                    $user->avatar = $new_file_name;
                }

                $user->nickname = $input['nickname'];
                $user->save();

                $arr = array('status' => 200, 'message' => $message, 'resultdata' => $user);

            } catch (\Illuminate\Database\QueryException $ex) {
                $message = $ex->getMessage();
                if (isset($ex->errorInfo[2])) {
                    $message = $ex->errorInfo[2];
                }

                $arr = array("status" => 400, "message" => $message, "resultdata" => array());
            } catch (Exception $ex) {
                $message = $ex->getMessage();
                if (isset($ex->errorInfo[2])) {
                    $message = $ex->errorInfo[2];
                }
                $arr = array("status" => 400, "message" => $message, "resultdata" => array());
            }
        }
        return \Response::json($arr);
    }
}
