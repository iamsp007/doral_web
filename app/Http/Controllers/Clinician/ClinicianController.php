<?php

namespace App\Http\Controllers\Clinician;

use App\Http\Controllers\Controller;
use App\Models\Applicant;
use App\Models\Designation;
use App\Models\UploadDocuments;
use App\Models\User;
use Yajra\DataTables\DataTables;
use App\Services\AdminService;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use ZipArchive;
use PDF;
use Illuminate\Support\Facades\Validator;

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
                    $query->where('status', '0');
                } else if ($input['status'] == 'active') {
                    $query->where('status', '1');
                } else if ($input['status'] == 'rejected') {
                    $query->where('status', '3');
                }
            })
            ->when($input['designation_id'], function ($query) use($input){
                $query->where('designation_id', $input['designation_id']);
            })
            ->when($input['user_name'], function ($query) use($input){
                $query->where('id', $input['user_name']);
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
                    $action .= ' <a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Reject" class="btn btn-danger shadow-sm btn--sm mr-2 update-status" data-status="3">Reject</a>';
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
         
//            if ($data->designation_id == 1) {
              return view('pages.admin.nurse-view', compact('data', 'prior','address','info','reference_detail','emergency_detail','education_detail','security_detail','military_detail','employer_detail','payroll_details','workHistory_detail','professional_detail','document_information','applicant'));
//            } else if ($data->designation_id == 2) {
//                return view('pages.admin.rn-view', compact('data'));
//            } else {
//                return view('pages.admin.clinician-view', compact('data'));
//            }
        }

        return redirect()->back();
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
        $documents = UploadDocuments::where([
            'user_id' => $input['user_id'],
            'type' => $input['type_id']
        ])->get();
      
        return view('pages.admin.clinician-detail.viewDocument', compact('documents', 'user_id', 'type_id'));
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