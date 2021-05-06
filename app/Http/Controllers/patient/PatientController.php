<?php

namespace App\Http\Controllers\patient;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Company;
use App\Models\Demographic;
use App\Models\PatientEmergencyContact;
use App\Models\Services;
use App\Models\State;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
        
        return view('pages.admin.patient.create',compact('companies', 'services', 'cities', 'states'));
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
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'service_id' => 'required',
            // 'doral_id' => 'required',
        ];

        $messages = [
            'first_name.required' => 'Please enter first name.',
            // 'payer_id.required' => 'Please enter payer id.',
            // 'phone.required' => 'Please enter phone.',
            // 'policy_no.required' => 'Please enter policy no.',
        ];

        $validator = Validator::make($input, $rules, $messages);

        if ($validator->fails()) {
            $arr = array('status' => 400, 'message' => $validator->errors()->first(), 'result' => array());
        } else {
            try {
                $user = new User();

                $doral_id = createDoralId();

                $password = str_replace(" ", "",$input['first_name']) . '@' . $doral_id;

                if (isset($input['avatar']) && !empty($input['avatar'])) {
                    $file = $input['avatar'];
                    $name = time() .'.'.$file->getClientOriginalExtension();
                    $filePath = 'avatar';
                    $file->move($filePath,$name);
                    $user->avatar = $file;
                }

                $user->first_name = $input['first_name'];
                $user->last_name = $input['last_name'];
                $user->gender = setGender($input['gender']);
                $user->dob = dateFormat($input['dateOfBirth']);
                $user->password = setPassword($password);
             
                $user->save();

                $address = [
                    'address1' => $input['address1'],
                    'address2' => $input['address2'],
                    'apt_building' => $input['apt_building'],
                    'city' => $input['city'],
                    'state' => $input['state'],
                    'zip_code' => $input['zip_code'],
                    'primary' => $input['primary'],
                    'addressType' => $input['addressType'],
                    'notes' => $input['address_note']
                ];

                $phone_info = [
                    'home_phone' => $input['home_phone'],
                    'cell_phone' => $input['cell_phone'],
                    'alternate_phone' => $input['alternate_phone'],
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
                $demographic->doral_id = createDoralId();
                $demographic->address = $address;
                $demographic->language = $language;
                $demographic->race = $input['race'];
                $demographic->alert = $input['alert'];
                $demographic->service_request_start_date =  dateFormat($input['serviceRequestStartDate']);
                $demographic->phone_info = $phone_info;
                
                $demographic->save();

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
                    'lives_with_patient' => $input['lives_with_patient'],
                    'have_keys' =>  $input['have_keys'],
                    'phone1' => $input['phone1'],
                    'phone2' => $input['phone2'],
                    'address' => $address,
                    
                    // 'address' => $emergencyAddress,
                ]);

                $arr = array('status' => 200, 'message' => 'Patient created successfully.', 'data' => []);
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
