<?php

namespace App\Http\Controllers;

use App\Jobs\PatientImportSheet;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Services\ReferralService;
use Exception;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
use App\Models\LabReportType;
use Illuminate\Support\Facades\DB;

class PatientReferralController extends Controller
{
    public function vbcUploadBulk()
    {
        return view('pages.referral.vbc-upload-bulk-data');
    }
    public function occupationalHealthUploadBulk()
    {
        return view('pages.referral.occupational-health-upload-bulk-data');
    }

    public function covid19UploadBulk()
    {
        return view('pages.referral.covid19');
    }

    public function getEmployeePhysicalExaminationReport($id)
    {
        $labReportTypes = LabReportType::pluck('name', 'id');
        $checkData = DB::table('employee_physical_examination_reports')->where('patient_id',$id)->first();
        if(!empty($checkData)) {
            return view('pages.autofill_employee-physical-examination-report', compact(['labReportTypes', 'checkData']));
        }
    }

    public function mdOrderUploadBulk()
    {
        try {
            $referralservice = new ReferralService();
            $response = $referralservice->mdOrderUploadBulk();
            if ($response->status===true){
                return view('pages.referral.md-order-upload-bulk-data')->with('data', $response->data);
            }
        } catch(Exception $e) {
            $status = 0;
            $message = $e->getMessage();
        }

        return view('pages.referral.md-order-upload-bulk-data');
    }
 
    public function store(Request $request)
    {
        $user = Auth::guard('referral')->user();
      
        $request['referral_id'] = $user->referal_id;
        $this->validate($request, ['file_name' => 'required', 'vbc_select' => 'required', 'referral_id' => 'required', 'service_id' => 'required', ]);

        try {
              $folder = 'csv';
            if ($request->vbc_select === "1")
            {
                
                $folder = "demographic";
            }
            elseif ($request->vbc_select === 2)
            {
                $folder = "clinical";
            }
            elseif ($request->vbc_select === 3)
            {
                $folder = "compliance_due";
            }
            elseif ($request->vbc_select === 4)
            {
                $folder = "previous_md";
            }
          
            if ($request->hasFile('file_name'))
            {
                $filenameWithExt = $request->file('file_name')
                ->getClientOriginalName();

                $filename = preg_replace("/[^a-z0-9\_\-\.]/i", '_', pathinfo($filenameWithExt, PATHINFO_FILENAME));
                $extension = $request->file('file_name')
                    ->getClientOriginalExtension();
                $fileNameToStore = $filename . '_' . time() . '.' . $extension;
                $path = $request->file('file_name')
                    ->storeAs($folder, $fileNameToStore);

                $filePath = storage_path('app/' . $path);
                $companyID='';
                if(Auth::guard('referral')) {
                    $companyID = Auth::guard('referral')->user()->id;
                } 
               
                $import = PatientImportSheet::dispatch($request->referral_id, $request->service_id, $request->vbc_select, $request->formSelect, $filenameWithExt, $filePath,$companyID);

                $response = [
                    'status' => true,
                    'message' => 'CSV Uploaded successfully.',
                    'data' => $import
                ];
                return response()->json($response,200);
            }

            $response = [
                'status' => false,
                'message' => 'Something Went Wrong!.',
                'data' => null
            ];
            return response()->json($response,200);

        } catch (Exception $e) {
            $status = 0;
            $message = $e->getMessage();
            $response = [
                'status' => $status,
                'message' => $message
            ];
        }
        return response()->json($response, 422);
    }

    public function addPatient()
    {
        $client = new Client();
        $states = $client->request('GET', env('API_URL').'/auth/states');
        $states = json_decode($states->getBody()->getContents());
       
        return view('pages.referral.add-patient',compact('states'));
    }

    public function getCities(Request $request)
    {
        $client = new Client();

        $states = $client->request('GET', env('API_URL').'/auth/states');
        $states = json_decode($states->getBody()->getContents());
        $neededObject = array_filter(
            $states,
            function ($e) use (&$request) {
                return $e->id == $request->state;
            }
        );
        $cities = $client->request('POST', env('API_URL').'/auth/filter-cities', [
            'multipart' => [
                [
                    'name'=>'state_code',
                    'contents'=>reset($neededObject)->state_code
                ]
            ],
            'headers' => [
                'X-Requested-With' => 'XMLHttpRequest',
                'Access-Control-Allow-Origin' => 'http://localhost'
            ]
        ]);

        return json_decode($cities->getBody()->getContents());
    }

    public function storePatient(Request $request)
    {
        try {
            $client = new Client();

            $data = $request->all();

            $referralservice = new ReferralService();

            $responseArray = $referralservice->storePatient($data);

            if($responseArray['status']) {
                $status = 1;
                $record = $responseArray['data'];
                return redirect()->route('referral.patient-detail', ['patient_id' => $record['user_id']]);
            }
            $message = $responseArray->message;
            return redirect()->back()->withErrors($message);
        } catch(Exception $e) {
            $status = 0;
            $message = $e->getMessage();
            return redirect()->back()->withErrors($message);
        }
        $response = [
            'status' => $status,
            'message' => $message
        ];

        return response()->json($response, 201);
    }

    public function occupationalHealthFailData()
    {
        return view('pages.referral.occupational-health-failed');
    }

    public function occupationalHealthGetFaileData()
    {
        $referralservice = new ReferralService();
        $responseArray = $referralservice->occupationalHealthFailData(3);
        $record = $responseArray['data'];
        return DataTables::of($record)
            ->addColumn('action', function($row){
                    $id = $row['id'];
                    return '<a href="view-failed-data/'.$id.'"
                        class="btn btn-primary btn-blue shadow-sm btn--sm mr-2"
                        data-toggle="tooltip" data-placement="left">View Recode
                    </a>';
        })
        ->make(true);
    }

    public function viewoccupationalHealthFailData(Request $request)
    {
        $id = $request->id;
        return view('pages.referral.view-occupational-health-failed',compact('id'));
    }

    public function viewoccupationalHealthGetFaileData(Request $request)
    {
    $referralservice = new ReferralService($request->id);
    $responseArray = $referralservice->viewoccupationalHealthGetFaileData($request->id);
    $record = $responseArray['data'];

    return DataTables::of($record)->make(true);
    }

    public function vbcFailData()
    {
        return view('pages.referral.vbc-failed');
    }

    public function vbcGetFaileData()
    {
        $referralservice = new ReferralService();
        $responseArray = $referralservice->occupationalHealthFailData(1);
        $record = $responseArray['data'];
        
        return DataTables::of($record)
             ->addColumn('action', function($row){
                        $id = $row['id'];
                        return '<a href="view-failed-data/'.$id.'"
                            class="btn btn-primary btn-blue shadow-sm btn--sm mr-2"
                            data-toggle="tooltip" data-placement="left">View Recode
                        </a>';
            })
            ->make(true);
    }

    public function mdorderFailData()
    {
        return view('pages.referral.md-order-failed');
    }

    public function mdorderGetFaileData()
    {
        $referralservice = new ReferralService();
        $responseArray = $referralservice->occupationalHealthFailData(2);
        $record = $responseArray['data'];
        return DataTables::of($record)
             ->addColumn('action', function($row){
                        $id = $row['id'];
                        return '<a href="view-failed-data/'.$id.'"
                            class="btn btn-primary btn-blue shadow-sm btn--sm mr-2"
                            data-toggle="tooltip" data-placement="left">View Recode
                        </a>';
            })
            ->make(true);
    }
}
