<!-- page 2 start-->
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
                        <p>Medicare Enrolled:
                            <span>
                                <input type="checkbox" {{ isset($users->professional_detail['medicareEnrolled']) ? 'checked' : '' }}> Yes
                                <input type="checkbox" {{ isset($users->professional_detail['medicareEnrolled']) ? '' : 'checked' }}> No
                               
                            </span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td>
                                    <p>Address:  <span>
                                        @if (isset($users->professional_detail['npa_address1']))
                                        {{ $users->professional_detail['npa_address1'] }}
                                        @endif  
                                        @if (isset($users->professional_detail['npa_address2']))
                                        {{ $users->professional_detail['npa_address2'] }}
                                        @endif  
                                        {{ isset($users->professional_detail['npa_building']) ? $users->professional_detail['npa_building'] : '' }}
                                    @if (isset($users->professional_detail['npa_cityId']))
                                        {{ \App\Models\City::find($users->professional_detail['npa_cityId'])->city }}
                                    @endif
                                    @if (isset($users->professional_detail['npa_stateId']))
                                        {{ \App\Models\State::find($users->professional_detail['npa_stateId'])->state }}
                                        @endif
                                        {{ isset($users->professional_detail['npa_zipCode']) ? $users->professional_detail['npa_zipCode'] : '' }} </span></p>
                                </td>
                            </tr>
                        </table>
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
                <tr>
                    <td style="width: 50%;">
                        <p>Taxonomy Description:<span>
                        @if (isset($users->professional_detail['taxonomyDescription']))
                            {{ $users->professional_detail['taxonomyDescription']}}
                        @endif</span></p>
                    </td>
                    
                   </tr>
            </table>
        </td>
    </tr>
    @php $number=1; @endphp
    @if (isset($users->professional_detail['medicare']) && count($users->professional_detail['medicare']) > 0)
        @foreach ($users->professional_detail['medicare'] as $medicare)
            <tr>
                <td>
                    <h1 style="padding: 10px;border: 1px solid #006C76;font-size: 20px;margin: 10px 0px;color: #006C76;font-weight: 600;">Medicare Information {{ $number}}:</h1>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td>
                                <p>Number: <span>{{ isset($medicare['Number']) ? $medicare['Number'] : '' }}</span></p>
                            </td>
                            <td>
                                <p>State:  <span>
                                    @if (isset($medicare['StateID']))
                                        {{ \App\Models\State::find($medicare['StateID'])->state }}
                                    @endif
                                </span></p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        @php $number++; @endphp
        @endforeach
    @endif

    @php $number=1; @endphp
    @if (isset($users->professional_detail['medicaid']) && count($users->professional_detail['medicaid']) > 0)
        @foreach ($users->professional_detail['medicaid'] as $medicaid)
            <tr>
                <td>
                    <h1 style="padding: 10px;border: 1px solid #006C76;font-size: 20px;margin: 10px 0px;color: #006C76;font-weight: 600;">Medicaid Information {{ $number}}:</h1>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td>
                                <p>Number: <span>{{ isset($medicaid['Number']) ? $medicaid['Number'] : '' }}</span></p>
                            </td>
                            <td>
                                <p>State:  <span>
                                    @if (isset($medicaid['StateID']))
                                        {{ \App\Models\State::find($medicaid['StateID'])->state }}
                                    @endif
                                </span></p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        @php $number++; @endphp
        @endforeach
    @endif

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
    @endif
</table>
<!-- page 2 end-->