<?php

namespace App\Http\Controllers;

use App\Models\PatientReferral;
use App\Models\User;
use App\Models\Demographic;
use App\Services\AdminService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    protected $view_path='pages.';
    protected $adminService;

    public function __construct(AdminService $adminService){
        $this->adminService = $adminService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::guard('partner')->check()){
            return redirect()->route('partner.dashboard');
        }elseif (Auth::guard('referral')->check()){
            return redirect()->route('referral.dashboard');
        }else if (Auth::user()->hasRole('admin')){
            return redirect()->route('admin.dashboard');
        }else if (Auth::user()->hasRole('clinician')){
            return redirect()->route('clinician.dashboard');
        }else if (Auth::user()->hasRole('supervisor')){
            return redirect()->route('supervisor.dashboard');
        }else if (Auth::user()->hasRole('coordinator')){
            return redirect()->route('coordinator.dashboard');
        }
        return redirect()->route('login');
    }


    public function getPatientDetail(Request $request,$patient_id){

        $details = User::with('patientDetail')->find($patient_id);
        return view($this->view_path.'patient-detail',compact('details'));
    }

    public function saveToken(Request $request){
        if (Auth::check()){
            $user = User::find(Auth::user()->id);
            if ($user){
                $user->web_token = $request->device_token;
                $user->save();
                return response()->json([
                    'status'=>true,
                    'message'=>'Device Token update successfully'
                ],200);
            }
        }
        return response()->json([
            'status'=>false,
            'message'=>'Device Token Not update'
        ],422);
    }

    public function allPatientList(Request $request){

        $patientList = User::with('patientDetail','roles')
            ->whereHas('roles',function ($q){
                $q->where('name','=','patient');
            });
        return DataTables::of($patientList)
            ->editColumn('dob', function ($contact){
                if($contact->dob!='')
                    return date('m-d-Y', strtotime($contact->dob));
                else
                    return '--';
            })->editColumn('patient_detail.city', function ($contact){
                if($contact->city!='')
                    return $contact->city;
                else
                    return '--';
            })->editColumn('patient_detail.state', function ($contact){
                if($contact->state!='')
                    return $contact->state;
                else
                    return '--';
            })->editColumn('patient_detail.address_1', function ($contact){
                if($contact->address_1!='')
                    return $contact->address_1;
                else
                    return '--';
            })->editColumn('patient_detail.service.name', function ($contact){
                if($contact->service!='')
                    return $contact->service->name;
                else
                    return '--';
            })->editColumn('patient_detail.gender', function ($contact){
                if($contact->gender!='')
                    return $contact->gender;
                else
                    return 'Other';
            })->editColumn('patient_detail.ssn', function ($contact){
                if($contact->ssn!='')
                    return $contact->ssn;
                else
                    return '--';
            })
            ->make(true);
    }
    
    public function convertLatLongFromAddress() {
        $user = Demographic::all();
        foreach ($user as $v) {
            echo"<pre>";
            print_r($v->user_id);
//            exit();
            $user_id = $v->user_id;
            $address = $v->address;
            
            $street1 = '';
            $street2 = '';
            $city = '';
            $state = '';
            $zipcode = '';
            if(!empty($address)) {
                
                if(is_array($address['address1'] != '')) {
                    $street1 = $address['address1'];
                }else if($address['address1'] != '') {
                    $street1 = $address['address1'];
                }
                if(is_array($address['address2'])) {
                    if(!empty($address['address2'])) {
                        $street2 = $address['address2'];
                    }
                }else if($address['address2'] != '') {
                    $street2 = $address['address2'];
                }
                if($address['city'] != '') {
                    $city = $address['city'];
                }
                if($address['state'] != '') {
                    $state = $address['state'];
                }
                if($address['zip_code'] != '') {
                    $zipcode = $address['zip_code'];
                }
            }
            if($street1 != '' || $street2 != '') {
                $address = $street1." ".$street2." ".$city." ".$state." ".$zipcode;
                $apiKey = 'AIzaSyAOHZY4U-K9nbXK78shinqKD4sUQw5a-wk';
                $geocode=file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($address).'&sensor=false&key='.$apiKey);
                $json= json_decode($geocode);
                $lat = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lat'};
                $long = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lng'};
                $user = User::find($user_id);
                if ($user){
                    $user->latitude = $lat;
                    $user->longitude = $long;
                    $user->save();
                }
            }
        }
    }
}
