<!-- page 7 start-->
@if (isset($users->employer_detail) && count($users->employer_detail['employer']) > 0)
    @foreach ($users->employer_detail['employer'] as $employer_detail)
        <div class="break"></div>
        <table width="100%">
            <tr>
                <td>
                    <table style="width: 100%;">
                        <thead style=" background-color: #07737A;padding: 10px;display: block;margin: 0 auto;display: flex;justify-content: center;align-items: center;">
                            <tr>
                                <td>
                                    <a href="index.html" title="Welcome to Doral"><img style="width: 180px; height: 84px;" src="{{ asset('assets/img/green_logo.jpg') }}" alt="Welcome to Doral" srcset="{{ asset('assets/img/logo-white.svg') }}"></a>
                                </td>
                            </tr>
                        </thead>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <h1 style="padding: 10px;border: 1px solid #006C76;font-size: 20px;margin: 10px 0px;text-align: center;color: #006C76;font-weight: 600;">EMPLOYMENT VERIFICATION</h1>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tbody>
                            <tr>
                                <td style="width: 50%;">
                                    <p>Name of Applicant:<span>{{ ($users->user) ? $users->user->full_name : ''}}</span></p>
                                </td>
                                <td>
                                    <p>SSN:<span>{{ ($users->ssn) ? $users->ssn : ''}}</span></p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tbody>
                            <tr>
                                <td>
                                    <p>Name of Company:
                                        <span>
                                            {{ $employer_detail['companyName']}}
                                        </span>
                                    </p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tbody>
                            <tr>
                                <td style="width: 50%;">
                                    <p>Phone:<span>{{ $employer_detail['phoneNo']}}</span></p>
                                </td>
                                <td>
                                    <p>Fax:<span></span></p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tbody>
                            <tr>
                                <td>
                                    <p>Address:<span>
                                    {{ $employer_detail['address1'] }}
                                    @if (isset($employer_detail['address2']))
                                        {{ $employer_detail['address2'] }}
                                    @endif  
                                    {{ isset($employer_detail['building']) ? $employer_detail['building'] : '' }}
                                    </span></p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tbody>
                            <tr>
                                <td>
                                    <p>City,State,Zipcode:<span>
                                    @if (isset($employer_detail['city_id']))
                                        {{ \App\Models\City::find($employer_detail['city_id'])->city }}
                                    @endif
                                    @if (isset($employer_detail['state_id']))
                                        {{ \App\Models\State::find($employer_detail['state_id'])->state }}
                                    @endif
                                    {{ isset($employer_detail['zipcode']) ? $employer_detail['zipcode'] : '' }}</span></p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tbody>
                            <tr>
                                <td>
                                    <p style="display: inline-block; font-weight: normal;" class="white-spacenone"><b>APPLICANT'S AUTHORIZATION RELEASE: </b>I hereby authorize the release of any information requested by House Calls HC concerning my employment in your company.</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tbody>
                            <tr>
                                <td style="width: 50%;">
                                    <p>Applicant's Signature:
                                        <span>
                                            @if($users->signature_url)
                                                <img src="{{ $users->signature_url }}" alt="sign"  style="max-width: 70px;">
                                            @endif
                                        </span>
                                    </p>
                                </td>
                                <td>
                                    <p>Date:<span>{{ ($users->user) ? viewDateFormat($users->user->created_at) : '' }}</span></p>
                                </td>
                            </tr>
                        </tbody>  
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <h1 style="padding: 10px;border: 1px solid #006C76;font-size: 20px;margin: 10px 0px;text-align: center;color: #006C76;font-weight: 600;">DO NOT WRITE BELOW THIS BOX — TO BE COMPLETED BY EMPLOYER ONLY</h1>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tbody>
                            <tr>
                                <td>
                                    <p style="font-weight: normal;" class="white-spacenone">Dear Sir/Madam,<br>The person listed has given your name as a source of reference and has also signed a statement authorizing the inquiry. We would appreciate a statement of your experiences with this person, and an assessment of his/her potential in your opinion. Any information released will be held in strict confidence.</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <h1 style="padding: 10px;border: 1px solid #006C76;font-size: 20px;margin: 10px 0px;color: #006C76;font-weight: 600;">PLEASE COMPLETE THIS SECTION:</h1>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tbody>
                            <tr>
                                <td>
                                    <p>Position Held:<span></span></p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tbody>
                            <tr>
                                <td style="width: 50%;">
                                    <p>Date Employment Began:<span></span></p>
                                </td>
                                <td>
                                    <p>Date Employment Ended:<span></span></p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tbody>
                            <tr>
                                <td>
                                    <p>Reason for Leaving:<span></span></p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tbody>
                            <tr>
                                <td>
                                    <p>Overall Job Performance:</p>
                                </td>
                                <td>
                                    <p>Excellent <input type="checkbox"></p>
                                </td>
                                <td>
                                    <p>Good <input type="checkbox"></p>
                                </td>
                                <td>
                                    <p>Average <input type="checkbox"></p>
                                </td>
                                <td>
                                    <p>Poor <input type="checkbox"></p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tbody>
                            <tr>
                                <td>
                                    <p>Attendance:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                                </td>
                                <td>
                                    <p>Excellent <input type="checkbox"></p>
                                </td>
                                <td>
                                    <p>Good <input type="checkbox"></p>
                                </td>
                                <td>
                                    <p>Average <input type="checkbox"></p>
                                </td>
                                <td>
                                    <p>Poor <input type="checkbox"></p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tbody>
                            <tr>
                                <td>
                                    <p>Punctuality:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                                </td>
                                <td>
                                    <p>Excellent <input type="checkbox"></p>
                                </td>
                                <td>
                                    <p>Good <input type="checkbox"></p>
                                </td>
                                <td>
                                    <p>Average <input type="checkbox"></p>
                                </td>
                                <td>
                                    <p>Poor <input type="checkbox"></p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tbody>
                            <tr>
                                <td>
                                    <p>Eligible for Rehire:  
                                        <input type="checkbox">Yes
                                        <input type="checkbox">No    
                                    </p>
                                    <p> If No, Please Explain:<span></span></p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tbody>
                            <tr>
                                <td>
                                    <p>Additional Comments: <span></span></p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tbody>
                            <tr>
                                <td>
                                    <p>Reference Given By: <span></span></p>
                                </td>
                                <td>
                                    <p>Title: <span></span></p>
                                </td>
                                <td>
                                    <p>Date: <span></span></p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tbody>
                            <tr>
                                <td>
                                    <p>Thank you for your cooperation.</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tbody>
                            <tr>
                                <td>
                                    <p>Sincerely,<br></p>
                                    <p style="text-decoration: underline;">Human Resources</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </table>
    @endforeach
@endif
<!-- page 7 end-->