<?php

namespace App\Http\Controllers\patient;

use App\Http\Controllers\Controller;
use App\Models\Demographic;
use App\Models\PatientEmergencyContact;
use App\Models\User;
use Illuminate\Http\Request;

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

        $parts = explode('-',$input['dob']);
        $yyyy_mm_dd = $parts[2] . '-' . $parts[0] . '-' . $parts[1];
        $user = new User();

        $user->gender = $input['gender'];
        $user->first_name = $input['first_name'];
        $user->last_name = $input['last_name'];
        $user->dob = $yyyy_mm_dd;
        
        $user->save();

        $demographic = new Demographic();
       
        $demographic->ssn = $input['ssn'];
        $demographic->language = $input['language'];
        $demographic->address->address1 = $input['address1'];
        $demographic->address->address2 = $input['address2'];
        $demographic->address->city = $input['city'];
        $demographic->address->state = $input['state'];
        $demographic->address->zip_code = $input['zip_code'];
        $demographic->ethnicity = $input['ethnicity'];
        $demographic->country_of_birth = $input['country_of_birth'];
        $demographic->marital_status = $input['marital_status'];

        $demographic->save();

        $contactName = $input['contact_name'];
        $phone1 = $input['phone1'];
        $phone2 = $input['phone2'];
        $relation = $input['relationship_name'];
        $address = $input['address_old'];
         
        foreach ($contactName as $index => $value) {
            PatientEmergencyContact::create([
                'user_id' => $input['user_id'],
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
