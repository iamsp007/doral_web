<!DOCTYPE html>
<html lang="en">
    <style>
        @page{margin: 15px;}
        .container {padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;}
        @media (min-width: 768px) {.container {width: 750px;}}
        @media (min-width: 992px) {.container {width: 970px;}}
        @media (min-width: 1200px) {.container {width: 1170px;}}
        .box {border: 2px solid black;padding: 12px;margin: 15px;}
        input[type=text] {width: auto;outline: 0;border-width: 0 0 1.5px;border-color: rgb(0, 0, 0);background-color: whitesmoke;}
        span{border-bottom: 1px solid black;width: 100%;}
    </style>
    <head><title>Employment Verification</title></head>
    <body style="margin: 5px; padding: 5px; font-family: Arial">
        @if (isset($users->employer_detail) && count($users->employer_detail['employer']) > 0)
            @foreach ($users->employer_detail['employer'] as $employer_detail)
                <div class="container">
                    <h3 style="text-align: center;"><u>EMPLOYMENT VERIFICATION</u></h3>
                    <p>
                        <b>Name of Applicant:</b>
                        <span>{{ ($users->user) ? $users->user->first_name : '' }} {{ ($users->user) ? $users->user->last_name : '' }}</span>
                        <b> SSN#:</b>
                        <span>
                            @if (isset($users->address_detail['info']))
                                {{ $users->address_detail['info'] ? getSsn($users->address_detail['info']['ssn']) : '' }}
                            @else
                                {{ ($users->ssn) ? getSsn($users->ssn) : ''}}
                            @endif
                        </span>
                    </p>
                    <div class="box">
                        @php
                            $phoneData = '';
                            if(isset($employer_detail['phoneNo'])):
                                $phoneData = "+".substr($employer_detail['phoneNo'], 0, 1)." ". "(".substr($employer_detail['phoneNo'], 1, 3).") ".substr($employer_detail['phoneNo'], 4, 3)."-".substr($employer_detail['phoneNo'],7);
                            endif;
                        @endphp
                        <p><b> Name of Company:</b><span>{{ $employer_detail['companyName']}}</span></p> 
                        <p><b>Phone:</b><span>{{ $phoneData }}</span><b>Fax: </b><span></span></p> 
                        <p>
                            <b>Address:</b>
                            <span>
                                {{ $employer_detail['address1'] }},
                                @if (isset($employer_detail['address2']))
                                    {{ $employer_detail['address2'] }},
                                @endif
                                {{ isset($employer_detail['building']) ? $employer_detail['building'] : '' }},
                                @if (isset($employer_detail['city_id']))
                                    {{ \App\Models\City::find($employer_detail['city_id'])->city }},
                                @endif
                                @if (isset($employer_detail['state_id']))
                                    {{ \App\Models\State::find($employer_detail['state_id'])->state }},
                                @endif
                                {{ isset($employer_detail['zipcode']) ? $employer_detail['zipcode'] : '' }}
                            </span>
                        </p> 
                    </div>
                    <p><b>Applicant's Authorization Release:</b>I hereby authorize the release of any information requested by Pella Care concerning my employement in your company.</p>
                    <p>
                        <b>Applicant's signature:</b>
                        <span>
                            @if($users->signature_url)
                                <img src="{{ $users->signature_url }}" style="display: inline-block; width: 90px; height: auto" />
                            @endif
                        </span>
                        <b>Date:</b><span>{{date('m/d/Y')}}</span>
                    </p>
                    <div class="box" style="text-align: center;">
                        <b>DO NOT WRITE BELOW THIS BOX ~ TO BE COMPLETED BY EMPLOYER ONLY</b>
                    </div>
                    <p>Dear Sir/Madam, <br>The person listed has given your name as a source of refrence and has also signed a statement authorizing the inquiry. We would appreciate a statement of your experiences with this person, and an assessment of his/her potential in your openion. Any information released will be held in strict confidence. <br></p>
                    <b>PLEASE COMPLETE THIS SECTION:</b>
                    <p>Position Held: <input type="text" style="width: 70%;" value=""></p> 
                    <p>Date Employment Began:<input type="text" style="width: 25%;" value=""> Date Employment Ended:<input type="text" value="" style="width: 25%;"></p>
                    <p>Reason for Leaving: <input type="text" style="width: 70%;" value=""></p>

                    <table style="width: 100%;">
                        <tbody>
                            <tr>
                                <td>
                                    <p>Overall Job Perfomance:</p>
                                </td>
                                <td>
                                    <p>Excellent <input type="checkbox"> Good <input type="checkbox"> Average <input type="checkbox"> Poor <input type="checkbox"></p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>Attendance:</p>
                                </td>
                                <td>
                                    <p>Excellent <input type="checkbox"> Good <input type="checkbox"> Average <input type="checkbox"> Poor <input type="checkbox"></p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>Punctuality:</p>
                                </td>
                                <td>
                                    <p>Excellent <input type="checkbox"> Good <input type="checkbox"> Average <input type="checkbox"> Poor <input type="checkbox"></p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <p>Eligible for Rehire: Yes <input type="checkbox"> No <input type="checkbox"> If No, Please Explain: <input type="text" style="width: 40%;"></p>
                    <p><input type="text" style="width: 80%;"></p>
                    <p>Additional comments: <input type="text" style="width: 70%;"></p>
                    <p><input type="text" style="width: 80%;"></p>
                    <p>Refrence Given By: <input type="text" style="width: 30%;"> Title: <input type="text" style="width: 30%;"> </p>
                    <p>Thank you for your cooperation.</p><br><br>
                    <p>Sincerely,</p>
                    <b><u>Human Resources</u></b>
                </div>
            @endforeach
        @else
            <div class="container">
                <h3 style="text-align: center;"><u>EMPLOYMENT VERIFICATION</u></h3>
                <p>
                    <b>Name of Applicant:</b><span>{{ ($users->user) ? $users->user->first_name : '' }} {{ ($users->user) ? $users->user->last_name : '' }}</span>
                    <b> SSN#:</b>
                    <span>
                        @if (isset($users->address_detail['info']))
                            {{ $users->address_detail['info'] ? getSsn($users->address_detail['info']['ssn']) : '' }}
                        @else
                            {{ ($users->ssn) ? getSsn($users->ssn) : ''}}
                        @endif
                    </span>
                </p>
                <div class="box">
                    @php
                        $phoneData = '';
                        if(isset($employer_detail['phoneNo'])):
                            $phoneData = "+".substr($employer_detail['phoneNo'], 0, 1)." ". "(".substr($employer_detail['phoneNo'], 1, 3).") ".substr($employer_detail['phoneNo'], 4, 3)."-".substr($employer_detail['phoneNo'],7);
                        endif;
                    @endphp
                    <p><b>Name of Company:</b><span>{{ $employer_detail['companyName']}}</span></p> 
                    <p><b>Phone:</b><span>{{ $phoneData }}</span> <b> Fax: </b><span></span></p> 
                    <p>
                        <b>Address:</b>
                        <span>
                            {{ $employer_detail['address1'] }},
                            @if (isset($employer_detail['address2']))
                                {{ $employer_detail['address2'] }},
                            @endif
                            {{ isset($employer_detail['building']) ? $employer_detail['building'] : '' }},
                            @if (isset($employer_detail['city_id']))
                                {{ \App\Models\City::find($employer_detail['city_id'])->city }},
                            @endif
                            @if (isset($employer_detail['state_id']))
                                {{ \App\Models\State::find($employer_detail['state_id'])->state }},
                            @endif
                            {{ isset($employer_detail['zipcode']) ? $employer_detail['zipcode'] : '' }}
                        </span>
                    </p> 
                </div>
                <p><b>Applicant's Authorization Release:</b>  I hereby authorize the release of any information requested by Pella Care concerning my employement in your company.</p>
                <p>
                    <b> Applicant's signature:</b> 
                    <span>
                        @if($users->signature_url)
                            <img src="{{ $users->signature_url }}" style="display: inline-block; width: 90px; height: auto"/>
                        @endif
                    </span>
                    <b>Date:</b><span>{{date('m/d/Y')}}</span>
                </p>
                <div class="box" style="text-align: center;">
                    <b>DO NOT WRITE BELOW THIS BOX ~ TO BE COMPLETED BY EMPLOYER ONLY</b>
                </div>
                <p>Dear Sir/Madam, <br>The person listed has given your name as a source of refrence and has also signed a statement authorizing the inquiry. We would appreciate a statement of your experiences with this person, and an assessment of his/her potential in your openion. Any information released will be held in strict confidence. <br></p>
                <b>PLEASE COMPLETE THIS SECTION:</b>
                <p>Position Held: <input type="text" style="width: 70%;" value=""></p> 
                <p>Date Employment Began:<input type="text" style="width: 25%;" value=""> Date Employment Ended:<input type="text" value="" style="width: 25%;"> </p>
                <p>Reason for Leaving: <input type="text" style="width: 70%;" value=""></p>

                <table style="width: 100%;">
                    <tbody>
                        <tr>
                            <td>
                                <p>Overall Job Perfomance:</p>
                            </td>
                            <td>
                                <p>Excellent <input type="checkbox"> Good <input type="checkbox"> Average <input type="checkbox"> Poor <input type="checkbox"></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Attendance:</p>
                            </td>
                            <td>
                                <p>Excellent <input type="checkbox"> Good <input type="checkbox"> Average <input type="checkbox"> Poor <input type="checkbox"></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Punctuality:</p>
                            </td>
                            <td>
                                <p>Excellent <input type="checkbox"> Good <input type="checkbox"> Average <input type="checkbox"> Poor <input type="checkbox"></p>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <p>Eligible for Rehire: Yes <input type="checkbox"> No <input type="checkbox"> If No, Please Explain: <input type="text" style="width: 40%;"></p>
                <p><input type="text" style="width: 80%;"></p>
                <p>Additional comments: <input type="text" style="width: 70%;"></p>
                <p><input type="text" style="width: 80%;"></p>
                <p>Refrence Given By: <input type="text" style="width: 30%;"> Title: <input type="text" style="width: 30%;"> </p>
                <p>Thank you for your cooperation.</p> <br> <br>
                <p>Sincerely,</p>
                <b><u>Human Resources</u></b>
            </div>
        @endif
    </body>
</html>
