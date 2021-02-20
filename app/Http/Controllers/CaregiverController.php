<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class CaregiverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchCaregiverDetails()
    {
        $data = '<?xml version="1.0" encoding="utf-8"?><SOAP-ENV:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/"><SOAP-ENV:Body><SearchCaregivers xmlns="https://www.hhaexchange.com/apis/hhaws.integration"><Authentication><AppName>HCHS257</AppName><AppSecret>99473456-2939-459c-a5e7-f2ab47a5db2f</AppSecret><AppKey>MQAwADcAMwAxADMALQAzADEAQwBDADIAQQA4ADUAOQA3AEEARgBDAEYAMwA1AEIARQA0ADQANQAyAEEANQBFADIAQgBDADEAOAA=</AppKey></Authentication><SearchFilters></SearchFilters></SearchCaregivers></SOAP-ENV:Body></SOAP-ENV:Envelope>';

        //<FirstName>string</FirstName><LastName>string</LastName><Status>string</Status><PhoneNumber>string</PhoneNumber><CaregiverCode>string</CaregiverCode><EmployeeType>string</EmployeeType><SSN>string</SSN>
        
        $method = 'POST';
        $getPatientDetailsController = new GetPatientDetailsController();
        return $getPatientDetailsController->curlCall($data, $method);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDemographicDetails($cargiver_id)
    {
        $data = '<?xml version="1.0" encoding="utf-8"?><SOAP-ENV:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/"><SOAP-ENV:Body><GetCaregiverDemographics xmlns="https://www.hhaexchange.com/apis/hhaws.integration"><Authentication><AppName>HCHS257</AppName><AppSecret>99473456-2939-459c-a5e7-f2ab47a5db2f</AppSecret><AppKey>MQAwADcAMwAxADMALQAzADEAQwBDADIAQQA4ADUAOQA3AEEARgBDAEYAMwA1AEIARQA0ADQANQAyAEEANQBFADIAQgBDADEAOAA=</AppKey></Authentication><CaregiverInfo><ID>' . $cargiver_id . '</ID></CaregiverInfo></GetCaregiverDemographics></SOAP-ENV:Body></SOAP-ENV:Envelope>';

        $method = 'POST';
        $getPatientDetailsController = new GetPatientDetailsController();
        return $getPatientDetailsController->curlCall($data, $method);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getChangesV2()
    {
        $date = Carbon::now();// will get you the current date, time 
        $today = $date->format("Y-m-d"); 
        
        $data = '<?xml version="1.0" encoding="utf-8"?><SOAP-ENV:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/"><SOAP-ENV:Body><GetCaregiverChangesV2 xmlns="https://www.hhaexchange.com/apis/hhaws.integration"><Authentication><AppName>HCHS257</AppName><AppSecret>99473456-2939-459c-a5e7-f2ab47a5db2f</AppSecret><AppKey>MQAwADcAMwAxADMALQAzADEAQwBDADIAQQA4ADUAOQA3AEEARgBDAEYAMwA1AEIARQA0ADQANQAyAEEANQBFADIAQgBDADEAOAA=</AppKey></Authentication><ModifiedAfter>2015-03-19T04:31:57.077</ModifiedAfter></GetCaregiverChangesV2></SOAP-ENV:Body></SOAP-ENV:Envelope>';

        $method = 'POST';
        $getPatientDetailsController = new GetPatientDetailsController();
        return $getPatientDetailsController->curlCall($data, $method);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createMedical($cargiver_id)
    {
        $data = '<?xml version="1.0" encoding="utf-8"?><SOAP-ENV:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/"><SOAP-ENV:Body><CreateCaregiverMedical xmlns="https://www.hhaexchange.com/apis/hhaws.integration"><Authentication><AppName>HCHS257</AppName><AppSecret>99473456-2939-459c-a5e7-f2ab47a5db2f</AppSecret><AppKey>MQAwADcAMwAxADMALQAzADEAQwBDADIAQQA4ADUAOQA3AEEARgBDAEYAMwA1AEIARQA0ADQANQAyAEEANQBFADIAQgBDADEAOAA=</AppKey></Authentication><CaregiverMedicalInfo><CaregiverID>' . $cargiver_id . '</CaregiverID><MedicalID>int</MedicalID><DueDate>dateTime</DueDate><DateCompleted>dateTime</DateCompleted><Notes>string</Notes><ResultID>int</ResultID></CaregiverMedicalInfo></CreateCaregiverMedical></SOAP-ENV:Body></SOAP-ENV:Envelope>';

        $method = 'POST';
        $getPatientDetailsController = new GetPatientDetailsController();
        return $getPatientDetailsController->curlCall($data, $method);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchCaregivers()
    {
        $searchCaregiverIds = $this->searchCaregiverDetails();
        $caregiverArray = $searchCaregiverIds['soapBody']['SearchCaregiversResponse']['SearchCaregiversResult']['Caregivers']['CaregiverID'];

        $counter = 0;
        foreach ($caregiverArray as $cargiver_id) {
            if ($counter < 5) {

                /** Store patirnt demographic detail */
                $getdemographicDetails = $this->getDemographicDetails($cargiver_id);
                $demographicDetails = $getdemographicDetails['soapBody']['GetCaregiverDemographicsResponse']['GetCaregiverDemographicsResult']['CaregiverInfo'];
                
                $getChangesV2 = $this->getChangesV2();
                $changesV2 = $getChangesV2['soapBody']['GetCaregiverChangesV2Response']['GetCaregiverChangesV2Result']['GetCaregiverChangesV2Info'];

                $createMedical = $this->createMedical($cargiver_id);
                
            }
            $counter++;
        }
    }
}
