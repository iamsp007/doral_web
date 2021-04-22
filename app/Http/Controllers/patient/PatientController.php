<?php

namespace App\Http\Controllers\patient;

use App\Http\Controllers\Controller;
use App\Models\Demographic;
use App\Models\PatientEmergencyContact;
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
        return view('pages.admin.patient.create');
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
        // dd($input);
        $rules = [
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'service_id' => 'required',
            'doral_id' => 'required',
        ];

        $messages = [
            'name.required' => 'Please enter company name.',
            'payer_id.required' => 'Please enter payer id.',
            'phone.required' => 'Please enter phone.',
            'policy_no.required' => 'Please enter policy no.',
        ];

        $validator = Validator::make($input, $rules, $messages);

        if ($validator->fails()) {
            $arr = array('status' => 400, 'message' => $validator->getMessageBag()->toArray(), 'result' => array(), 'action' => $action);
        } else {
            try {
                // $parts = explode('-',$input['dob']);
                // $yyyy_mm_dd = $parts[2] . '-' . $parts[0] . '-' . $parts[1];
                $user = new User();
              
                $user->first_name = $input['first_name'];
                $user->last_name = $input['last_name'];
                $user->gender = $input['gender'];
                // $user->dob = $yyyy_mm_dd;
                $user->password = Hash::make('patient@doral');
                
                $user->save();

                $address = [
                    'address1' => $input['address1'],
                    'address2' => $input['address2'],
                    'city' => $input['city'],
                    'state' => $input['state'],
                    'country' => $input['country'],
                    'zip_code' => $input['zip_code'],
                ];
                $demographic = new Demographic();
            
                $demographic->ssn = $input['ssn'];
                $demographic->user_id = $user->id;
                $demographic->service_id = $input['service_id'];
                $demographic->company_id = '1';
                $demographic->doral_id = $input['doral_id'];
                $demographic->ethnicity = $input['ethnicity'];
                $demographic->medicaid_number = $input['medicaid_number'];
                $demographic->medicare_number = $input['medicare_number'];
                $demographic->ssn = $input['ssn'];
                $demographic->doral_id = $input['doral_id'];
                $demographic->address = $address;

                $demographic->save();

                $contactName = $input['name'];
                $phone1 = $input['phone1'];
                $phone2 = $input['phone2'];
                $relation = $input['relation'];
                $address = $input['address_old'];
                
                foreach ($contactName as $index => $value) {
                    PatientEmergencyContact::create([
                        'user_id' => $user->id,
                        'name' => ($contactName[$index]) ? $contactName[$index] : '',
                        'phone1' => ($phone1[$index]) ? $phone1[$index] : '',
                        'phone2' => ($phone2[$index]) ? $phone2[$index] : '',
                        'relation' => ($relation[$index]) ? $relation[$index] : '',
                        // 'address' => [
                        //     'apt_building' => $input['emergencyAptBuilding'],
                        //     'address1' => $input['emergencyAddress1'],
                        //     'address2' => $input['emergencyAddress2'],
                        //     'city' => $input['emergencyAddress_city'],
                        //     'state' => $input['emergencyAddress_state'],
                        //     'zip_code' => $input['emergencyAddress_zip_code'],
                        // ],
                        'address_old' => ($address[$index]) ? $address[$index] : '',
                        // 'address' => $emergencyAddress,
                    ]);
                }

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
