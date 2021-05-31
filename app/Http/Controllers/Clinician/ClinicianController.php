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
use ZipArchive;
use PDF;

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
            ->when($input['date_of_birth'], function ($query) use($input){
                $query->where('dob', dateFormat($input['date_of_birth']));
            })
            ->when($input['email'], function ($query) use($input){
                $query->where('email', $input['email']);
            })
            ->when($input['gender'], function ($query) use($input){
                $query->where('gender', $input['gender']);
            })->get();

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
                
                $action .= '<a href="'.route('clinician.info',['id' => $row->id]).'" class="btn btn-primary btn-sm mr-2">Print</a>';

                return $action;
            })
            ->rawColumns(['action', 'checkbox_id','name'])
            ->make(true);
    }

     /**
     * Covid 19 data will display
     *
     * @return \Illuminate\Http\Response
     */
    public function clinicianInfo($id)
    { 
        try {
            $users = Applicant::where('user_id', $id)->with('user', 'documents', 'user.designation')->first();
             
            if ($users) {
                $idProof = $socialSecurity = $professionalReferrance = $nycNurseCertificate = $insuranceReport = $cpr = $physical = $forensicDrugScreen = $rubellaImmunization = $rubellaMeasiesImmunization = $annualPPD = $flu = '';
                if ($users->documents) {
                    $idProof = $users->documents->where('type', 1)->count();
                    $socialSecurity = $users->documents->where('type', 5)->count();
                    $professionalReferrance = $users->documents->where('type', 6)->count();
                    $nycNurseCertificate = $users->documents->where('type', 8)->count();
                    $insuranceReport = $users->documents->where('type', 4)->count();
                    $cpr = $users->documents->where('type', 9)->count();
                    $physical = $users->documents->where('type', 10)->count();
                    $forensicDrugScreen = $users->documents->where('type', 11)->count();
                    $rubellaImmunization = $users->documents->where('type', 12)->count();
                    $rubellaMeasiesImmunization = $users->documents->where('type', 13)->count();
                    $annualPPD = $users->documents->where('type', 16)->count();
                    $flu = $users->documents->where('type', 15)->count();
                    
                }

                $data = [
                    'users' => $users, 
                    'idProof' => $idProof,
                    'socialSecurity' => $socialSecurity,
                    'professionalReferrance' => $professionalReferrance,
                    'nycNurseCertificate' => $nycNurseCertificate,
                    'insuranceReport' => $insuranceReport,
                    'cpr' => $cpr,
                    'physical' => $physical,
                    'forensicDrugScreen' => $forensicDrugScreen,
                    'rubellaImmunization' => $rubellaImmunization,
                    'rubellaMeasiesImmunization' => $rubellaMeasiesImmunization,
                    'annualPPD' => $annualPPD,
                    'flu' => $flu,
                ];
                
                // $pdf = PDF::loadView('pages.clincian.clinician-form', $data);
          
                // return $pdf->download($users->full_name .'.pdf');
                
                return view('pages.clincian.clinician-form', compact('users','idProof', 'socialSecurity', 'professionalReferrance', 'nycNurseCertificate', 'insuranceReport', 'cpr', 'physical', 'forensicDrugScreen', 'rubellaImmunization', 'rubellaMeasiesImmunization', 'annualPPD', 'flu'));
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
          
            $family_detail = $military_detail = $security_detail = $address_detail = $reference_detail = $employer_detail = $education_detail = $language_detail = $skill_detail = $emergency_detail = $payroll_details = $position_detail = [];
            if ($data->applicant) {
                if ($data->applicant->family_detail) {
                    $family_detail = $data->applicant->family_detail;
                }

                if ($data->applicant->military_detail) {
                    $military_detail = $data->applicant->military_detail;
                }

                if ($data->applicant->security_detail) {
                    $security_detail = $data->applicant->security_detail;
                }

                if ($data->applicant->address_detail && $data->applicant->address_detail->address) {
                    $address_detail = $data->applicant->address_detail->address;
                }

                if ($data->applicant->reference_detail) {
                    $reference_detail = $data->applicant->reference_detail;
                }

                if ($data->applicant->employer_detail && $data->applicant->employer_detail->employer) {
                    $employer_detail = $data->applicant->employer_detail->employer;
                }

                if ($data->applicant->employer_detail && $data->applicant->employer_detail->position) {
                    $position_detail = $data->applicant->employer_detail->position;
                }
                
                if ($data->applicant->education_detail) {
                    $education_detail = $data->applicant->education_detail;
                }

                if ($data->applicant->language_detail) {
                    $language_detail = $data->applicant->language_detail;
                }

                if ($data->applicant->skill_detail) {
                    $skill_detail = $data->applicant->skill_detail;
                }

                if ($data->applicant->emergency_detail) {
                    $emergency_detail = $data->applicant->emergency_detail;
                }
                
                if ($data->applicant->payroll_details) {
                    $payroll_details = $data->applicant->payroll_details;
                }
            }

            // return view('pages.admin.clinician-view', compact(
            //     'data',
            //     'family_detail',
            //     'military_detail',
            //     'security_detail',
            //     'address_detail',
            //     'reference_detail',
            //     'employer_detail',
            //     'position_detail',
            //     'education_detail',
            //     'language_detail',
            //     'skill_detail',
            //     'emergency_detail',
            //     'payroll_details')
            // );
//            if ($data->designation_id == 1) {
                return view('pages.admin.nurse-view', compact('data', 'security_detail'));
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
}
