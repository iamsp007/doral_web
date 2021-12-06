<!-- page 2 start-->
<div class="break"></div>
<table width="100%">/opt/lampp/htdocs/doral/doral_web/resources/views/pages/clincian/profile/professional_detail.blade.php
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
            <h1 style="padding: 10px;border: 1px solid #006C76;font-size: 20px;margin: 10px 0px;text-align: center;color: #006C76;font-weight: 600;">Professional Detail</h1>
        </td>
    </tr>
    <tr>
        <td>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td style="width: 50%;">
                        <p>Age:
                            <span>
                                <input type="checkbox" {{ ($users->professional_detail['age_0_18']) ? 'checked' : '' }}> Age 0 to 18
                                <input type="checkbox" {{ ($users->professional_detail['age_19_40']) ? 'checked' : '' }}> Age 19 to 40
                            </span>
                        </p>
                    </td>
                    <td>
                        <p>
                            <span>
                                <input type="checkbox" {{ ($users->professional_detail['age_41_65']) ? 'checked' : '' }}> Age 41 to 65
                                <input type="checkbox" {{ ($users->professional_detail['age_65Plus']) ? 'checked' : '' }}> Age 65+
                                </span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 50%;">
                        <p>Federal DEA Id:<span>{{ $users->professional_detail['federal_DEA_id']}}</span></p>
                    </td>
                    <td>
                        <p>Medicaid Enrolled:
                            <span>
                                <input type="checkbox" {{ isset($users->professional_detail['medicaidEnrolled']) ? 'checked' : '' }}> Yes
                                <input type="checkbox" {{ isset($users->professional_detail['medicaidEnrolled']) ? '' : 'checked' }}> No
                            </span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 50%;">
                        <p>Medicaid Enrolled State:
                            <span>@if (isset($users->professional_detail['medicaidEnrolled_StateId']))
                                        {{ \App\Models\State::find($users->professional_detail['medicaidEnrolled_StateId'])->state }}
                                    @endif</span></p>
                    </td>
                    <td>
                        <p>Medicaid Enrolled Number:
                            <span>{{ $users->professional_detail['medicaidEnrolled_Number']}}</span></p>
                    </td>
                    
                   
                </tr>
                <tr>
                    <td style="width: 50%;">
                        <p>Medicare Enrolled:
                            <span>
                                <input type="checkbox" {{ isset($users->professional_detail['medicareEnrolled']) ? 'checked' : '' }}> Yes
                                <input type="checkbox" {{ isset($users->professional_detail['medicareEnrolled']) ? '' : 'checked' }}> No
                               
                            </span>
                        </p>
                      
                    </td>
                    <td>
                        <p>Medicare Enrolled Number:
                            <span>{{ $users->professional_detail['medicareEnrolled_Number']}}</span></p>
                        <p>Medicare Enrolled State:
                            <span>@if (isset($users->professional_detail['medicareEnrolled_StateId']))
                                        {{ \App\Models\State::find($users->professional_detail['medicareEnrolled_StateId'])->state }}
                                    @endif</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 50%;">
                        <p>Fed Expired Month Year:<span>{{ $users->professional_detail['fedExpiredMonthYear']}}</span></p>
                    </td>
                     <td style="width: 50%;">
                        <p>Npi Number:<span>{{ $users->professional_detail['npiNumber']}}</span></p>
                    </td>
                   </tr>
                   <tr>
                    <td style="width: 50%;">
                        <p>Npi Type:<span>{{ $users->professional_detail['npiType']}}</span></p>
                    </td>
                     <td style="width: 50%;">
                        <p>Npi OrgName:<span>{{ $users->professional_detail['npiOrgName']}}</span></p>
                    </td>
                   </tr>
            </table>
        </td>
    </tr>
    @php $number=1; @endphp
    @if (isset($users->professional_detail['stateLicense']) && count($users->professional_detail['stateLicense']) > 0)
        @foreach ($users->professional_detail['stateLicense'] as $stateLicense)
            <tr>
                <td>
                    <h1 style="padding: 10px;border: 1px solid #006C76;font-size: 20px;margin: 10px 0px;color: #006C76;font-weight: 600;">State License Information {{ $number}}:</h1>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td>
                                <p>Number: <span>{{ isset($stateLicense['Number']) ? $stateLicense['Number'] : '' }}</span></p>
                            </td>
                        </tr>
                        <td>
                            <p>Category: <span>{{ isset($stateLicense['Category']) ? $stateLicense['Category'] : '' }}</span></p>
                        </td>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td>
                                <p>State:  <span>
                                    @if (isset($stateLicense['StateID']))
                                        {{ \App\Models\State::find($stateLicense['StateID'])->state }}
                                    @endif
                                </span></p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        @php $number++; @endphp
        @endforeach
    @else
        <tr>
            <td>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td>
                            <p>Record(s) not found <span></span></p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    @endif

    @php $number=1; @endphp
    @if (isset($users->professional_detail['boardCertificate']) && count($users->professional_detail['boardCertificate']) > 0)
        @foreach ($users->professional_detail['boardCertificate'] as $boardCertificate)
            <tr>
                <td>
                    <h1 style="padding: 10px;border: 1px solid #006C76;font-size: 20px;margin: 10px 0px;color: #006C76;font-weight: 600;">Board Certificate Information {{ $number}}:</h1>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td>
                                <p>Status: <span>{{ isset($boardCertificate['status']) ? $boardCertificate['status'] : '' }}</span></p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td>
                            <p>Certificate: <span>{{ isset($boardCertificate['certificate']) ? $boardCertificate['certificate'] : '' }}</span></p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        @php $number++; @endphp
        @endforeach
    @else
        <tr>
            <td>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td>
                            <p>Record(s) not found <span></span></p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    @endif
</table>
<!-- page 2 end-->