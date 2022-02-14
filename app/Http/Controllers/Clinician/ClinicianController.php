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
                
                // $action .= '<a id="print" data-id="'.$row->id.'" class="btn btn-primary btn-sm mr-2">Print</a>';
                $action .= '<a href="'.route('clinician.info',['id' => $row->id]).'" class="btn btn-primary btn-sm mr-2">Print</a>';
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

    /**
     * Covid 19 data will display
     *
     * @return \Illuminate\Http\Response
     */
    public function clinicianInfo($id)
    { 
        try {
            $users = Applicant::where('user_id', $id)->with('user', 'documents', 'user.designation')
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
                // $pdf = PDF::loadView('pages.clincian.clinician-form', $data);
                // return $pdf->stream($users->full_name .'.pdf');
                return view('pages.clincian.clinician-form', compact('users'));
            }  
        } catch (Exception $e) {
            dd("Error: ". $e->getMessage());
        }     
    }

    public function getClinicianDetail($id)
    {
        $services = new AdminService();
        $response = $services->getClinicianDetail($id);
       
        $data = [];
        if ($response != null && $response->status === true) {
            $data = $response->data;
           
                 $applicant = $workHistory_detail = $military_detail = $security_detail = $prior = $address = $info = $reference_detail = $employer_detail = $education_detail = $emergency_detail = $payroll_details = $professional_detail = $document_information = [];
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
            }    
          
            $scan_field = $scanId = $cat_id = '';
            if ($data->designation_id == '9') {
                $ssn = $dob ='';
                if (isset($info->ssn) && isset($info->dateOfBirth)) {
                    $ssn = setSsn($info->ssn);
                    $dob = date("Y/m/d", strtotime($info->dateOfBirth));
                } 

                if ($ssn != '' && $dob != '') {
                    $physicianUser = PhysicianUsers::where([['ssn_no','=', $ssn],['date_of_birth', '=' , $dob]])->first();

                    if ($physicianUser) {
                        $scanId = $physicianUser->id;
                        $scan_field = 'PhysicianUsers';
    
                        $where = ['physician_user_id' => $scanId];
                    }
                }
                $cat_id = '1';
            } else if ($data->designation_id == '1') {
                $ssn = $dob ='';
                if (isset($info->ssn) && isset($info->dateOfBirth)) {
                    $ssn = setSsn($info->ssn);
                    $dob = date("Y/m/d", strtotime($info->dateOfBirth));
                }

                if ($ssn != '' && $dob != '') {
                    $nursePractitionerUsers = NursePractitionerUsers::where([['ssn_no','=', $ssn],['date_of_birth', '=' , $dob]])->first();
                    
                    if ($nursePractitionerUsers) {
                        $scanId = $nursePractitionerUsers->id;
                        $scan_field = 'NursePractitionerUsers';

                        $where = ['nurse_prac_user_id' => $scanId];
                    }
                }
                $cat_id = '2';
            } else if ($data->designation_id == '4') {
                $ssn = $dob ='';
                if (isset($info->ssn) && isset($info->dateOfBirth)) {
                    $ssn = setSsn($info->ssn);
                    $dob = date("Y/m/d", strtotime($info->dateOfBirth));
                }

                if ($ssn != '' && $dob != '') {
                    $physicianAssistantUsers = PhysicianAssistantUsers::where([['ssn_no','=', setSsn($info->ssn)],['date_of_birth', '=' , $dob]])->first();
                
                    if ($physicianAssistantUsers) {
                        $scanId = $physicianAssistantUsers->id;
                        $scan_field = 'PhysicianAssistantUsers';

                        $where = ['phy_assi_user_id' => $scanId];
                    }
                }
                $cat_id = '3';
            }
            $dea = $omig = $abim = $abfm = $nysed = $oig = $nccpa = $aanp = $nursingWorld = $ama = $everify = $npdb = $sam = $ecfmg = [];
           
            if ($scan_field === 'NursePractitionerUsers') {
                $aanp = Aanp::where(['nurse_prac_user_id' => $scanId])->get();
                $nursingWorld = NursingWorld::where($where)->get();
            } else if ($scan_field === 'PhysicianUsers') {
                $abim = Abim::where($where)->get();
                $abfm = Abfm::where($where)->get();
                $ecfmg = Ecfmg::where($where)->get();
                $everify = Everify::where($where)->get();
            } else if ($scan_field === 'PhysicianAssistantUsers') {
                $nccpa = Nccpa::where($where)->get();
            }
            
            if ($scan_field === 'PhysicianUsers' || $scan_field === 'PhysicianAssistantUsers') {
                $ama = Ama::where($where)->get();
            }
            $designation = '';
                
            if ($scan_field === 'PhysicianUsers' || $scan_field === 'PhysicianAssistantUsers' || $scan_field === 'NursePractitionerUsers') {
                $dea = Dea::where($where)->get();
                $omig = OfficeMedicaidInspector::where($where)->get();
                $oig = OfficeInspectorGeneral::where($where)->get();
                $npdb = Npdb::where($where)->get();
                $sam = Sam::where($where)->get();
                $nysed = Nysed::where($where)->get();
            }

            $mapId = CategorySiteMapping::with('siteInfo')->where('category_id', $cat_id)->get();

            $scanArray = [
                'dea' => $dea,
                'omig' => $omig,
                'abim' => $abim,
                'abfm' => $abfm,
                'nysed' => $nysed,
                'oig' => $oig,
                'nccpa' => $nccpa,
                'aanp' => $aanp,
                'nursingWorld' => $nursingWorld,
                'ama' => $ama,
                'everify' => $everify,
                'npdb' => $npdb,
                'sam' => $sam,
                'ecfmg' => $ecfmg,
            ];
            
           
            return view('pages.admin.nurse-view', compact('data', 'prior','address','info','reference_detail','emergency_detail','education_detail','security_detail','military_detail','employer_detail','payroll_details','workHistory_detail','professional_detail','document_information','applicant', 'scanId', 'cat_id', 'scan_field', 'scanArray','mapId'));
        }

        return redirect()->back();
    }

    public function search($data,$site)
    {
      
        if($data['scan_field'] == 'PhysicianAssistantUsers') {
            $where = ['category_id'=> $data['category_id'], 'phy_assi_user_id'=> $data['user_id']];
            
        } else if($data['scan_field'] == 'NursePractitionerUsers') {
            $where = ['category_id'=> $data['category_id'], 'nurse_prac_user_id'=> $data['user_id']];
        } else if($data['scan_field'] == 'PhysicianUsers') {
            $where = ['category_id'=> $data['category_id'], 'physician_user_id'=> $data['user_id']];
        }
        if($data['start_date'] != '') {
            $date = explode('-', $data['start_date']);
            $startDate  = date('Y-m-d', strtotime($date[0]));
            $endDate = date('Y-m-d', strtotime($date[1]));
        }
     
        if ($site === 'dea') {
            $dea = Dea::where($where);
                if($data['start_date'] != '') {
                    $dea->whereBetween('created_at', [$startDate, $endDate]);
                }
                return $dea->get();
        } else if ($site === 'omig') {
            $omig = OfficeMedicaidInspector::where($where);
                if($data['start_date'] != '') {
                    $omig->whereBetween('created_at', [$startDate, $endDate]);
                }
                return $omig->get();
        } else if ($site === 'oig') {
            $oig = OfficeInspectorGeneral::where($where);
                if($data['start_date'] != '') {
                    $oig->whereBetween('created_at', [$startDate, $endDate]);
                }
                return $oig->get();
        } else if ($site === 'npdb') {
            $npdb = Npdb::where($where);
                if($data['start_date'] != '') {
                    $npdb->whereBetween('created_at', [$startDate, $endDate]);
                }
                return $npdb->get();
        } else if ($site === 'samgov') {
            $sam = Sam::where($where);
                if($data['start_date'] != '') {
                    $sam->whereBetween('created_at', [$startDate, $endDate]);
                }
                return $sam->get();
        } else if ($site === 'nys') {
            $nys = Nysed::where($where);
                if($data['start_date'] != '') {
                    $nys->whereBetween('created_at', [$startDate, $endDate]);
                }
                return $nys->get();
        } else if ($site === 'aanp') {
            $aanp = Aanp::where(['nurse_prac_id' => $data['user_id']]);
                if($data['start_date'] != '') {
                    $aanp->whereBetween('created_at', [$startDate, $endDate]);
                }
                return $aanp->get();
        } else if ($site === 'nursingworld') {
            $nursingworld = NursingWorld::where($where);
                if($data['start_date'] != '') {
                    $nursingworld->whereBetween('created_at', [$startDate, $endDate]);
                }
                return $nursingworld->get();
        } else if ($site === 'nccpa') {
            $nccpa = Nccpa::where($where);
                if($data['start_date'] != '') {
                    $nccpa->whereBetween('created_at', [$startDate, $endDate]);
                }
                return $nccpa->get();
        } else if ($site === 'ama') {
            $ama = Ama::where($where);
                if($data['start_date'] != '') {
                    $ama->whereBetween('created_at', [$startDate, $endDate]);
                }
                return $ama->get();
        } else if ($site === 'abfm') {
            $abfm = Abfm::where($where);
                if($data['start_date'] != '') {
                    $abfm->whereBetween('created_at', [$startDate, $endDate]);
                }
                return $abfm->get();
        } else if ($site === 'abim') {
            $abim = Abim::where($where);
                if($data['start_date'] != '') {
                    $abim->whereBetween('created_at', [$startDate, $endDate]);
                }
                return $abim->get();
        } else if ($site === 'everify') {
            $everify = Everify::where($where);
                if($data['start_date'] != '') {
                    $everify->whereBetween('created_at', [$startDate, $endDate]);
                }
                return $everify->get();
        } else if ($site === 'ecfmg') {
            $ecfmg = Ecfmg::where($where);
                if($data['start_date'] != '') {
                    $ecfmg->whereBetween('created_at', [$startDate, $endDate]);
                }
                return $ecfmg->get();
        } 
    }

    public function userSearchDetail(Request $request)
    {
        $dea_detail = '';
        $omig_detail = '';
        $oig_detail = '';
        $npdb_detail = '';
        $samgov_detail = '';
        $nys_detail = '';
        $aanp_detail = '';
        $nursingworld_detail = '';
        $nccpa_detail = '';
        $ama_detail = '';
        $abim_detail = '';
        $abfm_detail = '';
        $everify_detail = '';
        $ecfmg_detail = '';

        $allData = $request->all();
   
        if($request && $request->sites){
            foreach($request->sites as $site){
             
                switch ($site) {
                    // For all Category
                    case "dea":
                        $dea_detail = $this->search($allData,'dea');
                        break;
                    case "omig":
                        $omig_detail = $this->search($allData,'omig');
                        break;
                    case "oig":
                        $oig_detail = $this->search($allData,'oig');
                        break;
                    case "npdb":
                        $npdb_detail = $this->search($allData,'npdb');
                        break;
                    case "samgov":
                        $samgov_detail = $this->search($allData,'samgov');
                        break;
                    case "nys":
                        $nys_detail = $this->search($allData,'nys');
                        break;

                    // NP Category
                    case "aanp":
                        $aanp_detail = $this->search($allData,'aanp');
                        break;
                    case "nursingworld":
                        $nursingworld_detail = $this->search($allData,'nursingworld');
                        break;
                        
                    // PA Category
                    case "nccpa":
                        $nccpa_detail = $this->search($allData,'nccpa');
                        break;

                    // PA and PCategory
                    case "ama":
                        $ama_detail = $this->search($allData,'ama');
                        break;

                    // P Category
                    case "abim":
                        $abim_detail = $this->search($allData,'abim');
                        break;
                    case "abfm":
                        $abfm_detail = $this->search($allData,'abfm');
                        break;
                    case "everify":
                        $everify_detail = $this->search($allData,'everify');
                        break;
                    case "ecfmg":
                        $ecfmg_detail = $this->search($allData,'ecfmg');
                        break;
                }
            }
        }
        $data = [
            'dea' => $dea_detail,
            'omig' => $omig_detail,
            'oig' => $oig_detail, 
            'npdb' => $npdb_detail,
            'samgov' => $samgov_detail,
            'nys' => $nys_detail,
            'aanp' => $aanp_detail,
            'nursingworld' => $nursingworld_detail,
            'nccpa'=>$nccpa_detail,
            'ama' => $ama_detail,
            'abim' => $abim_detail,
            'abfm' => $abfm_detail,
            'everify' => $everify_detail, 
            'ecfmg' => $ecfmg_detail,
            'scan_field' => $allData['scan_field'],
        ];
       
        return json_encode($data);
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

    public function getDocument(Request $request)
    {
        $input = $request->all();
        
        $user_id = $input['user_id'];
        $type_id = $input['type_id'];
       
        if (isset($input['action']) && $input['action'] === 'scanReport') {
            if ($input['field'] === 'NursePractitionerUsers') {
                if ($input['type_id'] === 'Aanp') {
                    $where = ['nurse_prac_id' => $input['user_id']];
                } else {
                    $where = ['nurse_prac_user_id' => $input['user_id']];
                }
            } elseif ($input['field'] === 'PhysicianUsers') {
                $where = ['physician_user_id' => $input['user_id']];
            } elseif ($input['field'] === 'PhysicianAssistantUsers') {
                $where = ['phy_assi_user_id' => $input['user_id']];
            }
            $query = '';
            if ($input['type_id'] === 'Dea') {
                $query = Dea::query();
            } elseif ($input['type_id'] === 'OfficeMedicaidInspector') {
                $query = OfficeMedicaidInspector::query();
            } elseif ($input['type_id'] === 'Abim') {
                $query = Abim::query();
            } elseif ($input['type_id'] === 'Abfm') {
                $query = Abfm::query();
            } elseif ($input['type_id'] === 'Nysed') {
                $query = Nysed::query();
            } elseif ($input['type_id'] === 'OfficeInspectorGeneral') {
                $query = OfficeInspectorGeneral::query();
            } elseif ($input['type_id'] === 'Nccpa') {
                $query = Nccpa::query();
            } elseif ($input['type_id'] === 'Aanp') {
                $query = Aanp::query();
            } elseif ($input['type_id'] === 'NursingWorld') {
                $query = NursingWorld::query();
            } elseif ($input['type_id'] === 'Ama') {
                $query = Ama::query();
            } elseif ($input['type_id'] === 'Everify') {
                $query = Everify::query();
            } elseif ($input['type_id'] === 'Npdb') {
                $query = Npdb::query();
            } elseif ($input['type_id'] === 'Sam') {
                $documents = Sam::where('id', $input['user_id']);
            } elseif ($input['type_id'] === 'Ecfmg') {
                $query = Ecfmg::query();
            } 
            //$documents = Sam::where('id', $input['user_id']);
            $documents = $query->where('id',$input['user_id'])->first();
             
            //dd($documents);
            $action = $input['action'];
            
        } else {
            $documents = UploadDocuments::where([
                'user_id' => $input['user_id'],
                'type' => $input['type_id']
            ])->get();
            $action = $input['action'];
        }
        
        //return view('layouts.sidemenu', $arr)->render();
    
        return view('pages.admin.clinician-detail.viewDocument', compact('documents',  'user_id', 'type_id', 'action','input'))->render();
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