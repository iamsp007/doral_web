<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Caregiver Enrollment Form</title>
        <style>
            * {margin: 0;padding: 0;box-sizing: border-box;font-size: 11px;}
            @page {margin: 15px;}
            table, tr, td {
                border: 0; margin: 0; padding: 0; border-collapse: collapse; border-spacing: 0;}
            table {width: 100%; border: 0;}
            td, th {text-align: left; padding: 3px 5px; vertical-align: top;}
            img { display: inline-block;vertical-align: sub;}
            ul, ol { margin: 10px; padding: 0;}
            h1 {font-size: 16px;padding-bottom: 5px;text-decoration: underline;}
            h2 {font-size: 14px;}
            p {text-align: justify;font-size: 11px;}
            .table-border, .table-border th, .table-border td {border: 1px solid #e0e0e0;}
            .border {border: 1px solid #e0e0e0;}
            .no-border {border: 0 !important;}
            .no-padding {padding: 0 !important;}
            .times-font {font-family: "Times New Roman", Times, serif;}
            .openSans {font-family: "Open Sans", sans-serif;}
            .text-left { text-align: left;}
            .text-center {text-align: center;}
            .text-right { text-align: right;}
            .text-justify {text-align: justify;}
            .mr-top-10px {margin-top: 10px;}
            .mr-bottom-10px {margin-bottom: 10px; }
            .pad-left-10 {padding-left: 10px;}
            .pad-left-20 {padding-left: 20px;}
            .pad-bottom-5 {padding: 0 0 5px 0 !important;}
            .pad-bottom-10 {padding: 0 0 10px 0 !important;}
            .pad-bottom-15 { padding: 0 0 15px 0 !important;}
            .pad-bottom-20 {padding: 0 0 20px 0 !important;}
            .border-left {border-left: 1px solid #e0e0e0 !important;}
            .border-right {border-right: 1px solid #e0e0e0 !important;}
            .sign {display: inline-block;height: 50px;width: auto;vertical-align: top;border: 1px solid #ddd;margin-left: 5px;}
            .question {color: #0073de;}
            .page-title {display: block;width: 97%;font-size: 20px;font-weight: bold;color: #00569a;padding: 10px;text-align: center;border-bottom: 4px double #5fd7ff;margin-bottom: 5px;}
            .page-break {page-break-before: always;}
            .common-checkbox {color: #0073de;}
        </style>
    </head>
    <body style="margin: 0;padding: 10px;font-size: 11px;font-family: 'Open Sans', sans-serif;">
        <table style="width: 100%; border: 1px solid #e0e0e0;" cellspacing="0" cellpadding="0">
            <!-- Demographics -->
            <tr>
                <td style="border: 0">
                    <table style="width: 100%; border-bottom: 5px solid #000" cellspacing="0" cellpadding="0">
                        <tr>
                            <td class="text-center" style="width: 100px; vertical-align: middle; padding-bottom: 10px;">
                                <img src="{{ asset('assets/img/green_logo.jpg') }}" style="width: auto; height: 40px" />
                            </td>        
                            <!-- <td style="text-align: left; vertical-align: middle; width: 180px;">
                                <table>
                                    <tr>
                                        <td style="width: 28px; text-align: left; vertical-align: middle;">
                                            <img
                                            src="./application/pdf-images/home.png"
                                            style="width: 24px; height: 24px"
                                        />
                                        </td>
                                        <td>
                                            <h2 style="font-weight: normal; font-size: 11px;">
                                            Address :
                                            </h2>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td style="text-align: left; vertical-align: middle;">
                                <table>
                                    <tr>
                                        <td style="width: 20px; text-align: left; vertical-align: middle;">
                                            <img
                                            src="./application/pdf-images/phone.png"
                                            style="width: 18px; height: 18px"
                                        />
                                        </td>
                                        <td style="width: 100px; text-align: left; vertical-align: middle; font-size: 11px;">
                                           
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left; vertical-align: middle;">
                                            <img
                                            src="./application/pdf-images/fax-machine.png"
                                            style="width: 18px; height: 18px"
                                        />
                                        </td>
                                        <td style="text-align: left; vertical-align: middle; font-size: 11px;">
                                            
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td style="text-align: center; vertical-align: middle; width: 100%;">
                                <table>
                                    <tr>
                                        <td style="text-align: center; vertical-align: middle; font-size: 12px;">
                                            Home Health Aide &nbsp;&nbsp;•&nbsp;&nbsp; Personal Care Aide
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center; vertical-align: middle; font-size: 14px; font-weight: bold;">
                                            Employee Personal Information
                                        </td>
                                    </tr>
                                </table>
                            </td> -->
                        </tr>
                    </table>
                    <table>
                        <tr>
                            <td>
                                <table>
                                    <tr>
                                        <td><b class="page-title">Demographics</b></td>
                                    </tr>
                                    <tr>
                                        <td class="no-border pad-bottom-5">
                                            <h1>Personal Information :</h1>
                                            <table class="table-border">
                                                <tr>
                                                    <td>
                                                        <b>First Name :</b>
                                                        {{ ($users->user) ? $users->user->first_name : '' }}
                                                    </td>
                                                    <td>
                                                        <b>Last Name :</b>
                                                        {{ ($users->user) ? $users->user->last_name : '' }}
                                                    </td>
                                                    <td>
                                                        <b>Gender :</b>
                                                        {{ ($users->user) ? $users->user->gender_data : '' }}
                                                    </td>
                                                    <td>
                                                        <b>Email :</b>
                                                        {{ ($users->user) ? $users->user->email : ''}}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <b>Phone (H) :</b>
                                                        {{ ($users->home_phone) ? $users->home_phone : ''}}
                                                    </td>
                                                    <td>
                                                        <b>Phone (C) :</b>
                                                        {{ ($users->phone) ? $users->phone : ''}}
                                                    </td>
                                                    <td>
                                                        <b>SSN :</b>
                                                        @if (isset($users->address_detail['info']))
                                                            {{ $users->address_detail['info'] ? getSsn($users->address_detail['info']['ssn']) : '' }}
                                                        @else
                                                            {{ ($users->ssn) ? getSsn($users->ssn) : ''}}
                                                        @endif
                                                    </td>
                                                    @php $label = $docId = '' @endphp
                                                    @if(isset($users->address_detail['info']['documentType']))
                                                        @php
                                                            
                                                            if ($users->address_detail['info']['documentType'] === 'passport'):
                                                                $docId = isset($users->address_detail['info']['passport_id']) ? $users->address_detail['info']['passport_id']  : '';
                                                                $label = 'Passport';
                                                            elseif ($users->address_detail['info']['documentType'] === 'greencard'):
                                                                $docId = isset($users->address_detail['info']['greencard_id']) ? $users->address_detail['info']['greencard_id'] : '';
                                                                $label = 'Greencard';
                                                            elseif ($users->address_detail['info']['documentType'] === 'workpermit'):
                                                                $docId = isset($users->address_detail['info']['workpermit_uscisId']) ? $users->address_detail['info']['workpermit_uscisId'] : '';
                                                                $label = 'Workpermit';
                                                            endif;
                                                        @endphp
                                                        
                                                    @endif
                                                    <td>
                                                        <b>{{ ($label) ? $label : 'Passport'}}: </b>
                                                        {{ ($docId) ? $docId : '' }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <b>Date of Birth :</b>
                                                        {{ $users->address_detail['info'] ? $users->address_detail['info']['dateOfBirth'] : '' }}
                                                    </td>
                                                    <td>
                                                        <b>Are you over 18 years of age?</b>
                                                        {{ $users->user->age }}
                                                    </td>
                                                    <td>
                                                        <b>Ethnicity :</b>
                                                        @if($users->address_detail['info']['Ethnicity'] != 'Other')
                                                            {{ $users->address_detail['info'] ? $users->address_detail['info']['Ethnicity'] : '' }}
                                                        @else
                                                            {{ $users->address_detail['info'] ? $users->address_detail['info']['OtherEthnicity'] : '' }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <b>Date You Can Start Work</b>
                                                        {{ $users->address_detail['info'] ? $users->address_detail['info']['DateYouCanStartWork'] : '' }}
                                                    </td>
                                                </tr>
                                                @if ($users->user->designation_id != '2')
                                                <tr>
                                                    <td>
                                                        <b>Us Citizen :</b>
                                                        {{ isset($users->address_detail['info']['us_citizen']) && $users->address_detail['info']['us_citizen'] == 'true' ? 'Yes' : 'No' }}
                                                    </td>
                                                    @if($users->address_detail['info']['us_citizen'] === false)
                                                        <td>
                                                            <b>Immigration Id:</b> {{ isset($users->address_detail['info']) ? $users->address_detail['info']['immigration_id']  : ''}}
                                                        </td>
                                                    @endif
                                                </tr>
                                                @endif
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="height: 10px"></td>
                                    </tr>
                                    <tr>
                                        <td class="no-border pad-bottom-5">
                                            <h1>Current Address:</h1>
                                            <table class="table-border">
                                                <tr>
                                                    <td>
                                                        <b>Address Line 1 :</b>
                                                        {{ isset($users->address_detail['address']) ? $users->address_detail['address']['address1']  : ''}}
                                                    </td>
                                                    <td>
                                                        <b>Address Line 2 :</b>
                                                        {{ isset($users->address_detail['address']) ? $users->address_detail['address']['address2']  : ''}}
                                                    </td>
                                                    <td>
                                                        <b>Building:</b>
                                                        {{ isset($users->address_detail['address']) ? $users->address_detail['address']['building']  : ''}}
                                                    </td>
                                                    <td>
                                                        <b>City :</b>
                                                        @if (isset($users->address_detail['address']))
                                                            {{ isset($users->address_detail['address']['city_id']) ? \App\Models\City::find($users->address_detail['address']['city_id'])->city : '' }}
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <b>State :</b>
                                                        @if (isset($users->address_detail['address']))
                                                            {{ isset($users->address_detail['address']['state_id']) ? \App\Models\State::find($users->address_detail['address']['state_id'])->state : '' }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <b>Zipcode :</b>
                                                        {{ isset($users->address_detail['address']) ? $users->address_detail['address']['zipcode'] : ''}}
                                                    </td>
                                                    <td colspan="2">
                                                        <b class="question">How long have you resided at current address?: </b>
                                                        {{ isset($users->address_detail['address']['how_long_resident']) ? $users->address_detail['address']['how_long_resident'] : ''}}
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    @if(isset($users->address_detail['prior']))
                                    <tr>
                                        <td style="height: 10px"></td>
                                    </tr>
                                    <tr>
                                        <td class="no-border pad-bottom-5">
                                            <h1>Prior Address:</h1>
                                            <table class="table-border">
                                                <tr>
                                                    <td>
                                                        <b>Address Line 1 :</b>
                                                        {{ isset($users->address_detail['prior']) ? $users->address_detail['prior']['address1']  : ''}}
                                                    </td>
                                                    <td>
                                                        <b>Address Line 2 :</b>
                                                        {{ isset($users->address_detail['prior']) ? $users->address_detail['prior']['address2']  : ''}}
                                                    </td>
                                                    <td>
                                                        <b>Building:</b>
                                                        {{ isset($users->address_detail['prior']) ? $users->address_detail['prior']['building']  : ''}}
                                                    </td>
                                                    <td>
                                                        <b>City :</b>
                                                        @if (isset($users->address_detail['prior']))
                                                            {{ isset($users->address_detail['prior']['city_id']) ? \App\Models\City::find($users->address_detail['prior']['city_id'])->city : '' }}
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <b>State :</b>
                                                        @if (isset($users->address_detail['prior']))
                                                            {{ isset($users->address_detail['prior']['state_id']) ? \App\Models\State::find($users->address_detail['prior']['state_id'])->state : '' }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <b>Zipcode :</b>
                                                        {{ isset($users->address_detail['prior']) ? $users->address_detail['prior']['zipcode'] : ''}}
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    @endif
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="height: 10px"></td>
            </tr>
            <!-- Contact & References -->
            <tr style="page-break-before: always !important;">
                <td style="border: 0">
                    <table>
                        <tr>
                            <td><b class="page-title">Contact &amp; References</b></td>
                        </tr>
                        <tr>
                            <td class="no-border pad-bottom-5">
                                <h1>Emergency Contacts :</h1>
                                <table class="table-border" id="emergency-body">
                                    <tr>
                                        <th>
                                            <b>#</b>
                                        </th>
                                        <th>
                                            <b>Name</b>
                                        </th>
                                        <th>
                                            <b>Relationship</b>
                                        </th>
                                        <th>
                                            <b>Phone Number #</b>
                                        </th>
                                        <th>
                                            <b>Address</b>
                                        </th>
                                    </tr>
                                    @php $counter = 1 @endphp
                                    @if (isset($users->emergency_detail))
                                        @foreach ($users->emergency_detail as $emergency_detail)
                                            @php
                                                $phoneData = '';
                                                if(isset($emergency_detail['phoneNo'])):
                                                $phoneData = "+".substr($emergency_detail['phoneNo'], 0, 1)." ". "(".substr($emergency_detail['phoneNo'], 1, 3).") ".substr($emergency_detail['phoneNo'], 4, 3)."-".substr($emergency_detail['phoneNo'],7);
                                                endif;
                                            @endphp
                                            <tr>
                                                <td>{{$counter}}</td>
                                                <td>{{ isset($emergency_detail['name']) ? $emergency_detail['name'] : ''}}</td>
                                                <td>
                                                    @if($emergency_detail['relation'] != 'Other')
                                                        {{ isset($emergency_detail['relation']) ? $emergency_detail['relation'] : '' }}
                                                    @else
                                                        {{ isset($emergency_detail['otherRelation']) ? $emergency_detail['otherRelation'] : '' }}
                                                    @endif
                                                </td>
                                                <td>{{ $phoneData }}</td>
                                                <td>
                                                    {{ isset($emergency_detail['address1']) ? $emergency_detail['address1'] : '' }},
                                                    {{ isset($emergency_detail['address2']) ? $emergency_detail['address2'] : ''}},
                                                    {{ isset($emergency_detail['building']) ? $emergency_detail['building'] : '' }}, 
                                                    @if (isset($emergency_detail['city_id']))
                                                        {{ isset($emergency_detail['city_id']) ? \App\Models\City::find($emergency_detail['city_id'])->city : '' }},
                                                    @endif
                                                    @if (isset($emergency_detail['state_id']))
                                                        {{ isset($emergency_detail['state_id']) ? \App\Models\State::find($emergency_detail['state_id'])->state : '' }},
                                                    @endif
                                                    {{ isset($emergency_detail['zipcode']) ? $emergency_detail['zipcode'] : '' }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr style="background: #f8f8f8;">
                                            <td colspan="5" style="text-align: center;padding: 15px;">Record(s) Not Found</td>
                                        </tr>
                                    @endif
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4">&nbsp;</td>
                        </tr>
                        <tr>
                            <td class="no-border pad-bottom-5">
                                <h1>References :</h1>
                                <table class="table-border">
                                    <tr>
                                        <td>
                                            <b>Employee Name :</b>
                                            {{ ($users->user) ? $users->user->full_name : ''}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <b><input {{ isset($users->reference_detail['terms']) && ($users->reference_detail['terms'] == '1') ? 'checked' : '' }} onclick="return false;" type="checkbox" style="vertical-align: top; margin: 0" /></b>I {{ ($users->user) ? $users->user->full_name : ''}} of applicant, agree to the release of the above mentioned information concerning my employment with Doral Medical and Multi-Specialty Center, as may requested by prospective employer.
                                        </td>
                                    </tr>
                                    <tr>
                                    @if ($users->user->designation_id != '2')
                                            <td>
                                                <b>Have You Ever Been Bonded: </b>
                                                {{ isset($users->reference_detail['haveYouEverBeenBonded']) && $users->reference_detail['haveYouEverBeenBonded'] == 'true' ? 'Yes' : 'No' }}
                                            </td>
                                            <td>
                                                <b>Have You Ever Been Refused Bond:</b>
                                                {{ isset($users->reference_detail['haveYouEverBeenRefusedBond']) && $users->reference_detail['haveYouEverBeenRefusedBond'] == 'true' ? 'Yes' : 'No' }}
                                            </td>
                                        @endif
                                    </tr>
                                    <tr>
                                        @if ($users->user->designation_id != '2')
                                            <td>
                                                <b>Have You Over Been Convicated Of a Crime:</b>
                                                {{ isset($users->reference_detail['haveYouOverBeenConvicatedOfaCrime']) && $users->reference_detail['haveYouOverBeenConvicatedOfaCrime'] == 'true' ? 'Yes' : 'No' }}
                                            </td>
                                        @endif
                                    </tr>
                                </table>
                                <tr>
                                    <td style="height: 10px"></td>
                                </tr>
                                <table class="table-border" id="referrences-body">
                                    <tr>
                                        <th>
                                            <b>#</b>
                                        </th>
                                        <th>
                                            <b>Contact Name</b>
                                        </th>
                                        <th>
                                            <b>Phone Number #</b>
                                        </th>
                                        <th>
                                            <b>Address</b>
                                        </th>
                                    </tr>
                                    @php $number=1; @endphp
                                    @if (isset($users->reference_detail['reference_list']) && count($users->reference_detail['reference_list']) > 0)
                                        @foreach ($users->reference_detail['reference_list'] as $reference_detail)
                                            @php
                                                $phoneData = '';
                                                if(isset($reference_detail['phoneNo'])):
                                                    $phoneData = "+".substr($reference_detail['phoneNo'], 0, 1)." ". "(".substr($reference_detail['phoneNo'], 1, 3).") ".substr($reference_detail['phoneNo'], 4, 3)."-".substr($reference_detail['phoneNo'],7);
                                                endif;
                                            @endphp
                                            <tr>
                                                <td>{{$counter}}</td>
                                                <td>{{ isset($reference_detail['name']) ? $reference_detail['name'] : '' }}</td>
                                                <td>{{ $phoneData }}</td>
                                                <td>
                                                    {{ isset($reference_detail['address1']) ? $reference_detail['address1'] : ''}},
                                                    {{ isset($reference_detail) ? $reference_detail['address2']  : ''}},
                                                    {{ isset($reference_detail['building']) ? $reference_detail['building']  : ''}},
                                                    @if (isset($reference_detail['city_id']))
                                                        {{ \App\Models\City::find($reference_detail['city_id'])->city }},
                                                    @endif
                                                    @if (isset($reference_detail['state_id']))
                                                        {{ \App\Models\State::find($reference_detail['state_id'])->state }},
                                                        @endif
                                                    {{ isset($reference_detail['zipcode']) ? $reference_detail['zipcode'] : '' }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else 
                                        <tr style="background: #f8f8f8;">
                                            <td colspan="5" style="text-align: center;padding: 15px;">Record(s) Not Found</td>
                                        </tr>  
                                    @endif
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="height: 10px"></td>
            </tr>
            <!-- <div class="page-break" style="page-break-before: always !important;"></div> -->
            <!-- Education -->
            <tr style="page-break-before: always !important;">
                <td style="border: 0">
                    <table style="width: 100%; border-bottom: 5px solid #000" cellspacing="0" cellpadding="0">
                        <tr>
                            <td class="text-center" style="width: 100px; vertical-align: middle; padding-bottom: 10px;">
                                <img src="{{ asset('assets/img/green_logo.jpg') }}" style="width: auto; height: 40px"/>
                            </td>     
                        </tr>
                    </table> 
                    <table>
                        <tr>
                            <td><b class="page-title">Education</b></td>
                        </tr>
                        @if ($users->user->designation_id == '2')  
                            <tr>
                                <td class="no-border pad-bottom-5">
                                    <h1>Education Details :</h1>
                                    <table class="table-border" id="education-body">
                                        <tr>
                                            <th>
                                                <b>#</b>
                                            </th>
                                            <th>
                                                <b>Name of school</b>
                                            </th>
                                            <th>
                                                <b>Address</b>
                                            </th>
                                            <th>
                                                <b>Did you graduate</b>
                                            </th>
                                            <th>
                                                <b>Major/Degree</b>
                                            </th>
                                            <th>
                                                <b>Year of completed</b>
                                            </th>
                                            <th><b>Website</b></th>
                                        </tr>
                                        @php $counter = 1 @endphp
                                        @if (isset($users->education_detail) && count($users->education_detail) > 0)
                                            @foreach ($users->education_detail as $education_detail)
                                            <tr>
                                                <td>{{$counter}}</td>
                                                <td>{{ $education_detail['name'] }},</td>
                                                <td>{{ $education_detail['address1'] }}
                                                    @if (isset($education_detail['address2']))
                                                        {{ $education_detail['address2'] }}
                                                    @endif  
                                                    {{ isset($education_detail['building']) ? $education_detail['building'] : '' }}
                                                    @if (isset($education_detail['city_id']))
                                                        {{ \App\Models\City::find($education_detail['city_id'])->city }}
                                                    @endif
                                                    @if (isset($education_detail['state_id']))
                                                        {{ \App\Models\State::find($education_detail['state_id'])->state }}
                                                    @endif
                                                    {{ isset($education_detail['zipcode']) ? $education_detail['zipcode'] : '' }}
                                                </td>
                                                <td>
                                                    {{ isset($education_detail['isGraduate']) ? $education_detail['isGraduate']  : '' }}
                                                </td>
                                                <td>
                                                    {{ isset($education_detail['degree']) ? $education_detail['degree'] : '' }}
                                                </td>
                                                <td>
                                                    {{ isset($education_detail['year']) ? $education_detail['year'] : '' }}
                                                </td>
                                                <td>
                                                    {{ isset($education_detail['website']) ? $education_detail['website'] : '' }}
                                                </td>
                                            </tr>
                                            @endforeach
                                        @endif
                                    </table>
                                </td>
                            </tr>
                        @else
                            <tr>
                                <td class="no-border pad-bottom-5">
                                    <h1>Medical Details :</h1>
                                    <table class="table-border" id="education-body">
                                        <tr>
                                            <th>
                                                <b>#</b>
                                            </th>
                                            <th>
                                                <b>Institute Name</b>
                                            </th>
                                            <th>
                                                <b>Address</b>
                                            </th>
                                            <th>
                                                <b>Year</b>
                                            </th>
                                        </tr>
                                        @php $counter = 1 @endphp
                                        @if (isset($users->education_detail) && count($users->education_detail['medical']) > 0)
                                            @foreach ($users->education_detail['medical'] as $education_detail)
                                            <tr>
                                                <td>{{$counter}}</td>
                                                <td>{{ $education_detail['medical_instituteName']}}</td>
                                                <td>
                                                    {{ $education_detail['medical_address1'] }}
                                                    @if (isset($education_detail['medical_address2']))
                                                        {{ $education_detail['medical_address2'] }}
                                                    @endif  
                                                    {{ isset($education_detail['medical_building']) ? $education_detail['medical_building'] : '' }}
                                                    @if (isset($education_detail['medical_cityId']))
                                                        {{ \App\Models\City::find($education_detail['medical_cityId'])->city }}
                                                    @endif
                                                    @if (isset($education_detail['medical_stateId']))
                                                        {{ \App\Models\State::find($education_detail['medical_stateId'])->state }}
                                                    @endif
                                                    {{ isset($education_detail['medical_zipcode']) ? $education_detail['medical_zipcode'] : '' }}
                                                </td>
                                                <td>
                                                    {{ isset($education_detail['medical_yearStarted']) ? $education_detail['medical_yearStarted'] : '' }} - {{ isset($education_detail['medical_yearEnded']) ? $education_detail['medical_yearEnded'] : '' }}
                                                </td>
                                            </tr>
                                            @endforeach
                                        @else 
                                            <tr style="background: #f8f8f8;">
                                                 <td colspan="5" style="text-align: center;padding: 15px;">Record(s) Not Found</td>
                                            </tr>                                                          
                                        @endif
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td style="height: 10px"></td>
                            </tr>
                            <tr>
                                <td class="no-border pad-bottom-5">
                                    <h1>Residency Details :</h1>
                                    <table class="table-border" id="education-body">
                                        <tr>
                                            <th>
                                                <b>#</b>
                                            </th>
                                            <th>
                                                <b>Institute Name</b>
                                            </th>
                                            <th>
                                                <b>Address</b>
                                            </th>
                                            <th>
                                                <b>Year</b>
                                            </th>
                                        </tr>
                                        @php $counter = 1 @endphp
                                        @if (isset($users->education_detail) && count($users->education_detail['residency']) > 0)
                                            @foreach ($users->education_detail['residency'] as $education_detail)
                                            <tr>
                                                <td>{{$counter}}</td>
                                                <td>{{ $education_detail['residency_instituteName']}}</td>
                                                <td>
                                                    {{ $education_detail['residency_address1'] }}
                                                    @if (isset($education_detail['residency_address2']))
                                                        {{ $education_detail['residency_address2'] }}
                                                    @endif  
                                                    {{ isset($education_detail['residency_building']) ? $education_detail['residency_building'] : '' }}
                                                    @if (isset($education_detail['residency_cityId']))
                                                        {{ \App\Models\City::find($education_detail['residency_cityId'])->city }}
                                                    @endif
                                                    @if (isset($education_detail['residency_stateId']))
                                                        {{ \App\Models\State::find($education_detail['residency_stateId'])->state }}
                                                    @endif
                                                    {{ isset($education_detail['residency_zipcode']) ? $education_detail['residency_zipcode'] : '' }}
                                                </td>
                                                <td>
                                                    {{ isset($education_detail['residency_yearStarted']) ? $education_detail['residency_yearStarted'] : '' }} - {{ isset($education_detail['residency_yearEnded']) ? $education_detail['residency_yearEnded'] : '' }}
                                                </td>
                                            </tr>
                                            @endforeach
                                        @else
                                            <tr style="background: #f8f8f8;">
                                                 <td colspan="5" style="text-align: center;padding: 15px;">Record(s) Not Found</td>
                                            </tr>  
                                        @endif
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td style="height: 10px"></td>
                            </tr>
                            <tr>
                                <td class="no-border pad-bottom-5">
                                    <h1>Fellowship Details :</h1>
                                    <table class="table-border" id="education-body">
                                        <tr>
                                            <th>
                                                <b>#</b>
                                            </th>
                                            <th>
                                                <b>Institute Name</b>
                                            </th>
                                            <th><b>Name of fellowship program</b></th>
                                            <th>
                                                <b>Address</b>
                                            </th>
                                            <th>
                                                <b>Year</b>
                                            </th>
                                        </tr>
                                        @php $counter = 1 @endphp
                                        @if (isset($users->education_detail) && count($users->education_detail['fellowship']) > 0)
                                            @foreach ($users->education_detail['fellowship'] as $education_detail)
                                            <tr>
                                                <td>{{$counter}}</td>
                                                <td>{{ $education_detail['fellowship_instituteName']}}</td>
                                                <td>{{ $education_detail['fellowship_nameOfProgram']}}</td>
                                                <td>
                                                    {{ $education_detail['fellowship_address1'] }}
                                                    @if (isset($education_detail['fellowship_address2']))
                                                        {{ $education_detail['fellowship_address2'] }}
                                                    @endif  
                                                    {{ isset($education_detail['fellowship_building']) ? $education_detail['fellowship_building'] : '' }}
                                                    @if (isset($education_detail['fellowship_cityId']))
                                                        {{ \App\Models\City::find($education_detail['fellowship_cityId'])->city }}
                                                    @endif
                                                    @if (isset($education_detail['fellowship_stateId']))
                                                        {{ \App\Models\State::find($education_detail['fellowship_stateId'])->state }}
                                                    @endif
                                                    {{ isset($education_detail['fellowship_zipcode']) ? $education_detail['fellowship_zipcode'] : '' }}
                                                </td>
                                                <td>
                                                    {{ isset($education_detail['fellowship_yearStarted']) ? $education_detail['fellowship_yearStarted'] : '' }} - {{ isset($education_detail['fellowship_yearEnded']) ? $education_detail['fellowship_yearEnded'] : '' }}
                                                </td>
                                            </tr>
                                            @endforeach
                                        @else
                                            <tr style="background: #f8f8f8;">
                                                 <td colspan="5" style="text-align: center;padding: 15px;">Record(s) Not Found</td>
                                            </tr>  
                                        @endif
                                    </table>
                                </td>
                            </tr>
                        @endif
                    </table>
                </td>
            </tr>
            <!-- Employment History -->
            
            <!-- Employment History End-->
            @if ($users->user->designation_id == '2') 
                <tr>
                    <td style="border: 0">
                        <table>
                            <tr>
                                <td><b class="page-title">Employment History</b></td>
                            </tr>
                            <tr>
                                <td class="no-border pad-bottom-5">
                                    <h1>Employer Details :</h1>
                                    <table class="table-border">
                                        <tr>
                                            <td>
                                                <b>Position:</b>
                                                {{ isset($users->employer_detail['position']) ? $users->employer_detail['position'] : '' }}
                                            </td>
                                            <td>
                                                <b>Are you currently employed?: </b>
                                                {{ isset($users->employer_detail['position']) ? 'Yes' : 'No' }}
                                            </td>
                                        </tr>
                                    </table>
                                    <tr>
                                        <td style="height: 10px"></td>
                                    </tr>
                                    <table class="table-border" id="employer-body">
                                        <tr>
                                            <th>#</th>
                                            <th>
                                                <b>Company Name</b>
                                            </th>
                                            <th>
                                                <b>Address</b>
                                            </th>
                                            <th>
                                                <b>Phone #</b>
                                            </th>
                                            <th>
                                                <b>Supervisor Name</b>
                                            </th>
                                        </tr>
                                        @php $counter = 1 @endphp
                                        @if (isset($users->employer_detail) && count($users->employer_detail['employer']) > 0)
                                            @foreach ($users->employer_detail['employer'] as $employer_detail)
                                                <tr>
                                                    <td>{{$counter}}</td>
                                                    <td>{{ $employer_detail['companyName']}}</td>
                                                    <td>
                                                        {{ $employer_detail['address1'] }}
                                                        @if (isset($employer_detail['address2']))
                                                            {{ $employer_detail['address2'] }}
                                                        @endif  
                                                        {{ isset($employer_detail['building']) ? $employer_detail['building'] : '' }}
                                                        @if (isset($employer_detail['city_id']))
                                                            {{ \App\Models\City::find($employer_detail['city_id'])->city }}
                                                        @endif
                                                        @if (isset($employer_detail['state_id']))
                                                            {{ \App\Models\State::find($employer_detail['state_id'])->state }}
                                                        @endif
                                                        {{ isset($employer_detail['zipcode']) ? $employer_detail['zipcode'] : '' }}
                                                    </td>
                                                    @php
                                                        $phoneData = '';
                                                        if(isset($employer_detail['phoneNo'])):
                                                            $phoneData = "+".substr($employer_detail['phoneNo'], 0, 1)." ". "(".substr($employer_detail['phoneNo'], 1, 3).") ".substr($employer_detail['phoneNo'], 4, 3)."-".substr($employer_detail['phoneNo'],7);
                                                        endif;
                                                    @endphp
                                                    <td>{{ $phoneData }}</td>
                                                    <td>{{ isset($employer_detail['supervisor']) ? $employer_detail['supervisor'] : '' }}
                                                    </td>
                                                </tr>
                                                @endforeach
                                            @else
                                                <tr style="background: #f8f8f8;">
                                                    <td colspan="5" style="text-align: center;padding: 15px;">Record(s) Not Found</td>
                                                </tr>  
                                            @endif
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>  
                <tr>
                    <td style="border: 0">
                        <table>
                            <tr>
                                <td class="no-border pad-bottom-5">
                                    <h1>Security:</h1>
                                    <table class="table-border">
                                        <tr>
                                            <td>
                                                <b>Have you ever bonded?</b>
                                                {{ ($users->security_detail && $users->security_detail['bond']) ? 'Yes' : 'No' }}
                                            </td>
                                            @if(isset($users->security_detail['bond']) && $users->security_detail['bond'] == 'true')
                                                <td>
                                                    <b>If Yes, Explain: </b>
                                                    {{ $users->security_detail ? $users->security_detail['bond_explain'] : '' }}
                                                </td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <td>
                                                <b>Have you been convicted of a falcony within the last 5 years?</b>
                                                {{ ($users->security_detail && $users->security_detail['convict']) ? 'Yes' : 'No' }}
                                            </td>
                                            @if(isset($users->security_detail['convict']) && $users->security_detail['convict'] == 'true')
                                                <td>
                                                    <b>If so, explain (this will not necessarily exclude you from consideration): </b>
                                                    {{ $users->security_detail ? $users->security_detail['convict_explain'] : '' }}
                                                </td>
                                            @endif
                                        </tr>
                                    </table>
                                    <tr>
                                        <td style="height: 10px"></td>
                                    </tr>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="border: 0">
                        <table>
                            <tr>
                                <td class="no-border pad-bottom-5">
                                    <h1>Military:</h1>
                                    <table class="table-border">
                                        <tr>
                                            <td>
                                                <b>Have you served in military?</b>
                                                {{ isset($users->military_detail['isMilitary']) && $users->military_detail['isMilitary'] == 'true' ? 'Yes' : 'No' }}
                                            </td>
                                                @if(isset($users->military_detail['isMilitary']) && $users->military_detail['isMilitary'] == 'true')
                                                <td>
                                                    <b>Branch: </b>
                                                    {{ isset($users->military_detail['branch']) ? $users->military_detail['branch'] : '' }}
                                                </td>
                                                @endif
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <b>Do you have any military commitment, including National Guard service that would influence your work schedule?  </b>
                                                {{ isset($users->military_detail['isCommited']) && $users->military_detail['isCommited'] == 'true' ? 'Yes' : 'No' }}
                                            </td>
                                        </tr>
                                        @if(isset($users->military_detail['isCommited'])  && $users->military_detail['isCommited'] == 'true')
                                            <tr>
                                                <td>
                                                    <b>If so, explain: </b>
                                                    {{ isset($users->military_detail['isCommited_explain']) ? $users->military_detail['isCommited_explain'] : ''}}
                                                </td>
                                            </tr>
                                        @endif
                                        <tr>
                                        @if(isset($users->military_detail['isMilitary']) && $users->military_detail['isMilitary'] == 'true')
                                            <td>
                                                    <b>Served service:</b>
                                                    {{ isset($users->military_detail['serve_start_date']) ? $users->military_detail['serve_start_date'] : '' }} to {{ isset($users->military_detail['serve_end_date']) ? $users->military_detail['serve_end_date'] : '' }}
                                                </td>
                                                @endif
                                            <td>
                                                <b>Are you a Vietnam veteran?</b>
                                                {{ isset($users->military_detail['isVietnam']) && $users->military_detail['isVietnam'] == 'true' ? 'Yes' : 'No' }}
                                            </td>
                                        </tr>
                                        <tr>
                                        <td>
                                                <b>Are you a disabled veteran? : </b>
                                                {{ isset($users->military_detail['isDisableVetran']) && $users->military_detail['isDisableVetran'] == 'true' ? 'Yes' : 'No' }}
                                            </td>
                                            <td>
                                                <b>Are you a special disabled veteran?: </b>
                                                {{ isset($users->military_detail['isSpecialDisableVereran']) && $users->military_detail['isSpecialDisableVereran'] == 'true' ? 'Yes' : 'No' }} 
                                            </td>
                                        </tr>
                                    </table>
                                    <tr>
                                        <td style="height: 10px"></td>
                                    </tr>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
           
            @endif
                <tr style="page-break-before: always !important;">
                    <td style="border: 0">
                        <table style="width: 100%; border-bottom: 5px solid #000" cellspacing="0" cellpadding="0">
                            <tr>
                                <td class="text-center" style="width: 100px; vertical-align: middle; padding-bottom: 10px;">
                                    <img src="{{ asset('assets/img/green_logo.jpg') }}" style="width: auto; height: 40px"/>
                                </td>     
                            </tr>
                        </table> 
                        <table>
                        <tr>
                            <td><b class="page-title">Work History</b></td>
                        </tr>
                            <tr>
                                <td class="no-border pad-bottom-5">
                                    <h1>Work History:</h1>
                                    <table class="table-border">
                                        <tr>
                                            <td>
                                                <b>Position:</b>
                                                {{ isset($users->workHistory_detail['position']) ? $users->workHistory_detail['position'] : '' }}
                                            </td>
                                            <td>
                                                <b>Are you currently employed?: </b>
                                                {{ isset($users->workHistory_detail['isCurrentEmployee']) && $users->workHistory_detail['isCurrentEmployee'] == 'true' ? 'Yes' : 'No' }}
                                            </td>
                                            
                                        </tr>
                                        <tr><td colspan="2">It is been noted that the large gap in your work history is due to taking time off: <span>{{ isset($users->workHistory_detail['gapReason']) ? $users->workHistory_detail['gapReason'] : '' }}</td></tr>
                                    </table>
                                    <tr>
                                        <td style="height: 10px"></td>
                                    </tr>
                                    <table class="table-border" id="employer-body">
                                        <tr>
                                            <th>
                                                <b>#</b>
                                            </th>
                                            <th>
                                                <b>Company Name</b>
                                            </th>
                                            <th>
                                                <b>Position/Title</b>
                                            </th>
                                            <th>
                                                <b>Address</b>
                                            </th>
                                            <th>
                                                <b>Record Id</b>
                                            </th>
                                            <th>
                                                <b>Start Date</b>
                                            </th>
                                            <th>
                                                <b>End Date</b>
                                            </th>
                                            <th>
                                                <b>Reason For Leaving</b>
                                            </th>
                                        </tr>
                                        @php $number=1; @endphp
                                        @if (isset($users->workHistory_detail['list']) && count($users->workHistory_detail['list']) > 0)
                                            @foreach ($users->workHistory_detail['list'] as $workHistory)
                                                <tr>
                                                    <td>{{ $number }}
                                                    <td>{{ isset($workHistory['companyName']) ? $workHistory['companyName'] : '' }}</td>
                                                    <td>{{ $workHistory['position']}}</td>
                                                    <td>
                                                        {{ $workHistory['address1'] }},
                                                        @if (isset($workHistory['address2']))
                                                            {{ $workHistory['address2'] }},
                                                        @endif
                                                        {{ isset($workHistory['building']) ? $workHistory['building'] : '' }},
                                                        @if (isset($workHistory['cityId']))
                                                            {{ \App\Models\City::find($workHistory['cityId'])->city }},
                                                        @endif
                                                        @if (isset($workHistory['stateId']))
                                                            {{ \App\Models\State::find($workHistory['stateId'])->state }},
                                                        @endif
                                                        {{ isset($workHistory['zipCode']) ? $workHistory['zipCode'] : '' }}
                                                    </td>
                                                    <td>{{ $workHistory['recordId']}}</td>
                                                    <td>{{ $workHistory['startDate']}}</td>
                                                    <td>{{ $workHistory['endDate']}}</td>
                                                    <td>{{ isset($workHistory['reason']) ? $workHistory['reason'] : '' }}</td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </table>
                                    <tr>
                                        <td style="height: 10px"></td>
                                    </tr>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="height: 10px"></td>
                </tr>
            <tr>
                <td style="border: 0">
                    <table style="width: 100%; border-bottom: 5px solid #000" cellspacing="0" cellpadding="0">
                        <tr>
                            <td class="text-center" style="width: 100px; vertical-align: middle; padding-bottom: 10px;">
                                <img src="{{ asset('assets/img/green_logo.jpg') }}" style="width: auto; height: 40px" />
                            </td>        
                        </tr>
                    </table>
                    <table>
                        <tr>
                            <td>
                                <table>
                                    <tr>
                                        <td><b class="page-title">Payroll</b></td>
                                    </tr>
                                    <tr>
                                        <td class="no-border pad-bottom-5">
                                            <h1>Payroll :</h1>
                                            <table class="table-border">
                                                <tr>
                                                    <td>
                                                        <b>How do you files your tax?</b>
                                                        @php
                                                            $string = Str::of($users->payroll_details['filesyourtax'])->words(15, ' ...');
                                                        @endphp
                                                        {{ $string}}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <b>No. of dependent children's(under age 17) :</b>
                                                        {{ $users->payroll_details['childrendependents']}}
                                                    </td>
                                                    <td>
                                                        <b>Any other dependents:</b>
                                                        {{ $users->payroll_details['otherdependents']}}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <b>Total dependents :</b>
                                                        {{ $users->payroll_details['totaldependents']}}
                                                    </td>
                                                    <td>
                                                        <b>Total Claim Amount:</b>
                                                        {{ $users->payroll_details['totalClaimAmount']}}
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="height: 10px"></td>
                                    </tr>
                                    <tr>
                                        <td class="no-border pad-bottom-5">
                                            <h1>Bank Information:</h1>
                                            <table class="table-border">
                                                <tr>
                                                    <td>
                                                        <b>Bank Name :</b>
                                                        {{ $users->payroll_details['nameOfBank']}}
                                                    </td>
                                                    <td>
                                                        <b>Account Holder Name :</b>
                                                        {{ $users->payroll_details['nameOfAccount']}}
                                                    </td>
                                                    <td>
                                                        <b>Type Of Account:</b>
                                                        {{ $users->payroll_details['typeOfAccount'] }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <b>Bank Routing Number :</b>
                                                        {{ $users->payroll_details['routingNumber']}}
                                                    </td>
                                                    <td>
                                                        <b>Account Number :</b>
                                                        {{ $users->payroll_details['accountNumber']}}
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    @if ($users->user->designation_id != '2')
                                    <tr>
                                        <td style="height: 10px"></td>
                                    </tr>
                                    <tr>
                                        <td class="no-border pad-bottom-5">
                                            <h1>Tax Information:</h1>
                                            <table class="table-border">
                                                <tr>
                                                    <td>
                                                        <b>Are You Filing As A Entity?:</b>
                                                        {{ isset($users->payroll_details['are_you_filing_as_a_entity']) && $users->payroll_details['are_you_filing_as_a_entity'] == 'true' ? 'Yes' : 'No' }}
                                                    </td>
                                                    @if(isset($users->payroll_details['are_you_filing_as_a_entity']) && $users->payroll_details['are_you_filing_as_a_entity'] == 'true')
                                                    <td>
                                                        <b>Legal name of entity entity: </b>
                                                        {{ $users->payroll_details['legal_entity']}}
                                                    </td>
                                                    @endif
                                                    @if(isset($users->payroll_details['are_you_filing_as_a_entity']) && $users->payroll_details['are_you_filing_as_a_entity'] == 'true')
                                                    <td>
                                                        <b>TaxPayer identification number:</b>
                                                        {{ $users->payroll_details['taxpayer_id_number']}}
                                                    </td>
                                                    @endif
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    @endif
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="height: 10px"></td>
            </tr>
        </table>
    </body>
</html>