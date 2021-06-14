<?php

namespace App\Http\Controllers\patient;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Jobs\SendEmailJob;
use App\Models\City;
use App\Models\Company;
use App\Models\Demographic;
use App\Models\PatientEmergencyContact;
use App\Models\Services;
use App\Models\State;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::select('id','name')->orderBy('name','ASC')->get();
        $services = Services::select('id','name')->orderBy('name','ASC')->get();
        $cities = City::select('id','city')->take(2)->orderBy('city','ASC')->get();
     
        $states = State::select('id','state', 'state_code')->orderBy('state','ASC')->get();
        
        return view('admin.patient.create',compact('companies', 'services', 'cities', 'states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
       
        $rules = [
            'company_id' => 'required',
            'service_id' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'dateOfBirth' => 'required',
            'ssn' => 'required',
            'address1' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip_code' => 'required',
            'home_phone' => 'required',
            'name' => 'required',
            'relation' => 'required',
            'phone1' => 'required',
            'emergency_address1' => 'required',
            'emergency_city' => 'required',
            'emergency_state' => 'required',
            'emergency_zip_code' => 'required',
        ];

        $messages = [
            'company_id.required' => 'Please select company .',
            'service_id.required' => 'Please select service.',
            'first_name.required' => 'Please enter first name.',
            'last_name.required' => 'Please enter last name.',
            'email.required' => 'Please enter email.',
            'gender.required' => 'Please enter gender.',
            'dateOfBirth.required' => 'Please select date of birth.',
            'ssn.required' => 'Please enter ssn number.',
            'address1.required' => 'Please enter address line 1.',
            'city.required' => 'Please select city.',
            'state.required' => 'Please select state.',
            'zip_code.required' => 'Please enter zipcode.',
            'home_phone.required' => 'Please enter home phone.',
            'name.required' => 'Please enter name.',
            'relation.required' => 'Please select relation.',
            'phone1.required' => 'Please enter phone1.',
            'emergency_address1.required' => 'Please enter address line 1.',
            'emergency_city.required' => 'Please select city.',
            'emergency_state.required' => 'Please select state.',
            'emergency_zip_code.required' => 'Please enter zipcode.',
          
        ];

        $validator = Validator::make($input, $rules, $messages);

        if ($validator->fails()) {
            $arr = array('status' => 400, 'message' => $validator->errors()->first(), 'result' => array());
        } else {
            try {
                DB::beginTransaction();

                $user = new User();

                $doral_id = createDoralId();

                $password = str_replace("-", "@",$doral_id);
                if (isset($input['avatar']) && !empty($input['avatar'])) {
                    $uploadFolder = 'users';
                    $image = $input['avatar'];
                    $image_uploaded_path = $image->store($uploadFolder, 'public');
                  
                    $user->avatar = basename($image_uploaded_path);
                }

                $phone_number = $input['home_phone'] ? $input['home_phone'] : '';
                if ($phone_number != '') {
           
                    $userDuplicatePhone = User::where('phone', setPhone($phone_number))->first();
              
                    if (empty($userDuplicatePhone)) {
                        $user->phone = setPhone($phone_number);
                        $user->phone_verified_at = now();
                        $status = '0';
                    } else {
                        $status = '4';
                    }
                } else {
                    $status = '4';
                }
                $user->first_name = $input['first_name'];
                $user->last_name = $input['last_name'];
                $user->email = $input['email'];
                $user->gender = setGender($input['gender']);
                $user->dob = dateFormat($input['dateOfBirth']);
                $user->password = setPassword($password);
                $user->status = $status;
                $user->save();

                $user->assignRole('patient')->syncPermissions(Permission::all());
                
                $address = [
                    'address1' => $input['address1'],
                    'address2' => $input['address2'],
                    'apt_building' => $input['apt_building'],
                    'city' => $input['city'],
                    'state' => $input['state'],
                    'zip_code' => $input['zip_code'],
                    'primary' => isset($input['primary']) ? $input['primary'] : '',
                    'addressType' => $input['addressType'],
                    'notes' => $input['address_note']
                ];

                $phone_info = [
                    'home_phone' => ($input['home_phone']) ? setPhone($input['home_phone']) : '',
                    'cell_phone' => ($input['cell_phone']) ? setPhone($input['cell_phone']) : '',
                    'alternate_phone' => ($input['alternate_phone']) ? setPhone($input['alternate_phone']) : '',
                ];

                $language = '';
                if (isset($input['language'])) {
                    $language = implode(",",$input['language']);
                }
                
                $demographic = new Demographic();
                
                $demographic->user_id = $user->id;
                $demographic->service_id = $input['service_id'];
                $demographic->company_id = $input['company_id'];
                $demographic->doral_id = $doral_id;
                $demographic->ethnicity = $input['ethnicity'];
                $demographic->medicaid_number = $input['medicaid_number'];
                $demographic->medicare_number = $input['medicare_number'];
                $demographic->ssn = setSsn($input['ssn']);
                $demographic->address = $address;
                $demographic->language = $language;
                $demographic->race = $input['race'];
                $demographic->alert = $input['alert'];
                $demographic->service_request_start_date =  dateFormat($input['serviceRequestStartDate']);
                $demographic->phone_info = $phone_info;
                $demographic->marital_status = $input['marital_status'];
                
                $demographic->type = '3';

                $demographic->save();

                self::getAddressLatlngAttribute($address, $user->id);

                $address = [
                    'address1' => $input['emergency_address1'],
                    'address2' => $input['emergency_address2'],
                    'apt_building' => $input['emergency_apt_building'],
                    'city' => $input['emergency_city'],
                    'state' => $input['emergency_state'],
                    'zip_code' => $input['emergency_zip_code'],
                ];

                PatientEmergencyContact::create([
                    'user_id' => $user->id,
                    'name' => $input['name'],
                    'relation' => $input['relation'],
                    'lives_with_patient' => isset($input['lives_with_patient']) ? $input['lives_with_patient'] : '',
                    'have_keys' => isset($input['have_keys']) ? $input['have_keys'] : '',
                    'phone1' => setPhone($input['phone1']),
                    'phone2' => setPhone($input['phone2']),
                    'address' => $address,
                ]);
                
                DB::commit();
                $url = route('partnerEmailVerified', base64_encode($user->id));
                $details = [
                    'name' => $user->first_name,
                    'href' => $url,
                ];
                
                SendEmailJob::dispatch($user->email,$details,'WelcomeEmail');

                $arr = array('status' => 200, 'message' => 'Patient created successfully.', 'data' => []);
            } catch (\Illuminate\Database\QueryException $ex) {
                $message = $ex->getMessage();
                if (isset($ex->errorInfo[2])) {
                    $message = $ex->errorInfo[2];
                }
                DB::rollBack();

                $arr = array("status" => 400, "message" => $message, "resultdata" => array());
            } catch (Exception $ex) {
                $message = $ex->getMessage();
                if (isset($ex->errorInfo[2])) {
                    $message = $ex->errorInfo[2];
                }
                DB::rollBack();
                
                $arr = array("status" => 400, "message" => $message, "resultdata" => array());
            }
        } 
        return \Response::json($arr);
    }

    /**
     * Get the user's Date Of Birth.
     *
     * @return string
     */
    public static function getAddressLatlngAttribute($addressData, $user_id)
    {
        $address='';
        if ($addressData['address1']){
            $address.= $addressData['address1'];
        }
        if ($addressData['city']){
            $address.=', '.$addressData['city'];
        }
        if ($addressData['state']){
            $address.=', '.$addressData['state'];
        }
        if ($addressData['zip_code']){
            $address.=', '.$addressData['zip_code'];
        }

        if ($address){
            $helper = new Helper();
            $response = $helper->getLatLngFromAddress($address);
            if ($response->status === "OK"){
                $latlong =  $response->results[0]->geometry->location;

                User::find($user_id)->update([
                    'latitude' => $latlong->lat,
                    'longitude' => $latlong->lng,
                ]);
            }
        }
    }
}
