<?php

namespace App\Http\Controllers;

use App\Models\PatientReferral;
use Illuminate\Http\Request;

class GetPatientDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDemographicDetails(Request $request)
    {
        $input = $request->all();
       
        $data = '<GetPatientDemographics xmlns="https://www.hhaexchange.com/apis/hhaws.integration"><Authentication><AppName>' .config('patientDetailAuthentication.AppKey'). '</AppName><AppSecret>' .config('patientDetailAuthentication.AppSecret'). '</AppSecret><AppKey>' .config('patientDetailAuthentication.AppKey'). '</AppKey></Authentication><PatientInfo><ID>' .  $input['PatientID'] . '</ID></PatientInfo></GetPatientDemographics></SOAP-ENV:Body></SOAP-ENV:Envelope>';

        $method = 'POST';
        return $this->curlCall($data, $method);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchPatients(Request $request)
    {
        $patientReferal = PatientReferral::where('service_id',2)->take(15)->get();
        
        $data = [];
        foreach ($patientReferal as $key => $value) {
            $data['FirstName'] = $value['first_name'];
            $data['LastName'] = $value['last_name'];
            $data['Status'] = $value['status'];
            $data['PhoneNumber'] = '';
            $data['AdmissionID'] = '';
            $data['MRNumber'] = '';
            $data['SSN'] = $value['ssn'];
            return $this->searchPatientDetails($data);
        }
        $this->searchPatientDetails($data);
       
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchPatientDetails($input)
    {
        $url = '<SearchPatients xmlns="https://www.hhaexchange.com/apis/hhaws.integration"><Authentication><AppName>' .config('patientDetailAuthentication.AppKey'). '</AppName><AppSecret>' .config('patientDetailAuthentication.AppSecret'). '</AppSecret><AppKey>' .config('patientDetailAuthentication.AppKey'). '</AppKey></Authentication><SearchFilters><FirstName>' . $input['FirstName'] . '</FirstName><LastName>' . $input['LastName'] . '</LastName><Status>' . $input['Status'] . '</Status><PhoneNumber>' . $input['PhoneNumber'] . '</PhoneNumber><AdmissionID>' . $input['AdmissionID'] . '</AdmissionID><MRNumber>' . $input['MRNumber'] . '</MRNumber><SSN>' . $input['SSN'] . '</SSN></SearchFilters></SearchPatients>';
        
        $data = $this->setParameter($url);

        $method = 'POST';

        $this->curlCall($data, $method);
    }

    public function curlCall($data, $method)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => config('patientDetailAuthentication.AppUrl'),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => $method,
        CURLOPT_POSTFIELDS => $data,
        CURLOPT_HTTPHEADER => array(
            'Content-Type: text/xml'
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    }

    public function setParameter($parameter)
    {
        return '<?xml version="1.0" encoding="utf-8"?><SOAP-ENV:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/"><SOAP-ENV:Body>' . $parameter . '</SOAP-ENV:Body></SOAP-ENV:Envelope>';
    }
}
