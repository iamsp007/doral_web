<!-- page 7 start-->
@php $counter = 1 @endphp
@if (isset($users->education_detail))
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
                <h1 style="padding: 10px;border: 1px solid #006C76;font-size: 20px;margin: 10px 0px;text-align: center;color: #006C76;font-weight: 600;">Education Detail</h1>
            </td>
        </tr>
        @if (isset($users->education_detail['medicalInstitute']))
            <tr>
                <td>
                    <h1 style="padding: 10px;border: 1px solid #006C76;font-size: 20px;margin: 10px 0px;text-align: center;color: #006C76;font-weight: 600;">Medical Institute</h1>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tbody>
                            <tr>
                                <td>
                                    <p>Medical Institute Name:
                                        <span>
                                            {{ $users->education_detail['medicalInstitute']['medical_instituteName']}}
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
                                    <p>Medical Year Started:<span>{{ $users->education_detail['medicalInstitute']['medical_yearStarted']}}</span></p>
                                </td>
                                <td>
                                    <p>Medical Year Ended:<span>{{ $users->education_detail['medicalInstitute']['medical_yearEnded']}}</span></p>
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
                                    {{ $users->education_detail['medicalInstitute']['medical_address1'] }}
                                    @if (isset($users->education_detail['medicalInstitute']['medical_address2']))
                                        {{ $users->education_detail['medicalInstitute']['medical_address2'] }}
                                    @endif  
                                    {{ isset($users->education_detail['medicalInstitute']['medical_building']) ? $users->education_detail['medicalInstitute']['medical_building'] : '' }}
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
                                    @if (isset($users->education_detail['medicalInstitute']['medical_cityId']))
                                        {{ \App\Models\City::find($users->education_detail['medicalInstitute']['medical_cityId'])->city }}
                                    @endif
                                    @if (isset($users->education_detail['medicalInstitute']['medical_stateId']))
                                        {{ \App\Models\State::find($users->education_detail['medicalInstitute']['medical_stateId'])->state }}
                                    @endif
                                    {{ isset($users->education_detail['medicalInstitute']['medical_zipcode']) ? $users->education_detail['medicalInstitute']['medical_zipcode'] : '' }}</span></p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        @endif

        @if (isset($users->education_detail['residencyInstitute']))
            <tr>
                <td>
                    <h1 style="padding: 10px;border: 1px solid #006C76;font-size: 20px;margin: 10px 0px;text-align: center;color: #006C76;font-weight: 600;">Residency Institute</h1>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tbody>
                            <tr>
                                <td>
                                    <p>Medical Institute Name:
                                        <span>
                                            {{ $users->education_detail['residencyInstitute']['medical_instituteName']}}
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
                                    <p>Medical Year Started:<span>{{ $users->education_detail['residencyInstitute']['medical_yearStarted']}}</span></p>
                                </td>
                                <td>
                                    <p>Medical Year Ended:<span>{{ $users->education_detail['residencyInstitute']['medical_yearEnded']}}</span></p>
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
                                    {{ $users->education_detail['residencyInstitute']['medical_address1'] }}
                                    @if (isset($users->education_detail['residencyInstitute']['medical_address2']))
                                        {{ $users->education_detail['residencyInstitute']['medical_address2'] }}
                                    @endif  
                                    {{ isset($users->education_detail['residencyInstitute']['medical_building']) ? $users->education_detail['residencyInstitute']['medical_building'] : '' }}
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
                                    @if (isset($users->education_detail['residencyInstitute']['medical_cityId']))
                                        {{ \App\Models\City::find($users->education_detail['residencyInstitute']['medical_cityId'])->city }}
                                    @endif
                                    @if (isset($users->education_detail['residencyInstitute']['medical_stateId']))
                                        {{ \App\Models\State::find($users->education_detail['residencyInstitute']['medical_stateId'])->state }}
                                    @endif
                                    {{ isset($users->education_detail['residencyInstitute']['medical_zipcode']) ? $users->education_detail['residencyInstitute']['medical_zipcode'] : '' }}</span></p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        @endif

        @if (isset($users->education_detail['fellowshipInstitute']))
            <tr>
                <td>
                    <h1 style="padding: 10px;border: 1px solid #006C76;font-size: 20px;margin: 10px 0px;text-align: center;color: #006C76;font-weight: 600;">Fellowship Institute</h1>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tbody>
                            <tr>
                                <td>
                                    <p>Medical Institute Name:
                                        <span>
                                            {{ $users->education_detail['fellowshipInstitute']['medical_instituteName']}}
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
                                    <p>Medical Year Started:<span>{{ $users->education_detail['fellowshipInstitute']['medical_yearStarted']}}</span></p>
                                </td>
                                <td>
                                    <p>Medical Year Ended:<span>{{ $users->education_detail['fellowshipInstitute']['medical_yearEnded']}}</span></p>
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
                                    {{ $users->education_detail['fellowshipInstitute']['medical_address1'] }}
                                    @if (isset($users->education_detail['fellowshipInstitute']['medical_address2']))
                                        {{ $users->education_detail['fellowshipInstitute']['medical_address2'] }}
                                    @endif  
                                    {{ isset($users->education_detail['fellowshipInstitute']['medical_building']) ? $users->education_detail['fellowshipInstitute']['medical_building'] : '' }}
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
                                    @if (isset($users->education_detail['fellowshipInstitute']['medical_cityId']))
                                        {{ \App\Models\City::find($users->education_detail['fellowshipInstitute']['medical_cityId'])->city }}
                                    @endif
                                    @if (isset($users->education_detail['fellowshipInstitute']['medical_stateId']))
                                        {{ \App\Models\State::find($users->education_detail['fellowshipInstitute']['medical_stateId'])->state }}
                                    @endif
                                    {{ isset($users->education_detail['fellowshipInstitute']['medical_zipcode']) ? $users->education_detail['fellowshipInstitute']['medical_zipcode'] : '' }}</span></p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        @endif
    </table>
@endif
<!-- page 7 end-->