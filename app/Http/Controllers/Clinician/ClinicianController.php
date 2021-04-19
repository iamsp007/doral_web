<?php

namespace App\Http\Controllers\Clinician;

use App\Http\Controllers\Controller;
use App\Models\Applicant;
use App\Models\UploadDocuments;
use Yajra\DataTables\DataTables;
use App\Services\AdminService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use ZipArchive;

class ClinicianController extends Controller
{
    public function clinician()
    {
        return view('pages.admin.clinician');
    }

    public function getClinicianList($status_id = 0)
    {
        $services = new AdminService();
        $response = $services->getClinicianList($status_id);
        
        $data = array();
        if ($response != null && $response->status === true) {
            $data = [
                'data' => $response->data
            ];
            
            return  DataTables::of($data['data'])
                ->addColumn('checkbox_id', function($q) {
                   
                    return '<div class="checkbox"><label><input class="innerallchk" onclick="chkmain();" type="checkbox" name="allchk[]" value="' . $q->id . '" /><span></span></label></div>';
                })
                ->addIndexColumn()
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
                        $designation = getPhone($user->phone);
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
                ->addColumn('status', function ($user) use($data) {
                    $btn = '';
                  
                    if ($user->status === '3') {
                        $btn .= '<a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $user->id . '" data-original-title="Edit" class="edit btn btn-sm update-status" style="background: #006c76; color: #fff" data-status="1">Accept</a>';
                    } else if ($user->status === '1') {
                        $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $user->id . '" data-original-title="Delete" class="btn btn-sm update-status" style="background: #eaeaea; color: #000" data-status="3">Reject</a>';
                    } else {
                        $btn .= '<a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $user->id . '" data-original-title="Edit" class="edit btn btn-sm update-status" style="background: #006c76; color: #fff" data-status="1">Accept</a>';

                        $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $user->id . '" data-original-title="Delete" class="btn btn-sm update-status" style="background: #eaeaea; color: #000" data-status="3">Reject</a>';
                    }
                    
                    $btn .= '<a href="'.route('clinician.info',['id' => $user->id]).'" class="btn btn-primary btn-sm mr-2" target="__blank">Print</a>';

                    return $btn;
                })
                ->rawColumns(['status', 'checkbox_id'])
                ->make(true);
        }
        
        return DataTables::of($data)
            ->make(true);
    }

     /**
     * Covid 19 data will display
     *
     * @return \Illuminate\Http\Response
     */
    public function clinicianInfo($id)
    {
        $users = Applicant::where('user_id', $id)->with('user', 'documents','state','city')->first();

        $idProof = $insuranceReport = $socialSecurity = '';
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

        return view('pages.clincian.clinician-form', compact('users', 'idProof', 'socialSecurity', 'professionalReferrance', 'nycNurseCertificate', 'insuranceReport', 'cpr', 'physical', 'forensicDrugScreen', 'rubellaImmunization', 'rubellaMeasiesImmunization', 'annualPPD', 'flu'));
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
