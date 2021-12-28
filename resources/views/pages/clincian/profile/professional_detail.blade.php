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
        <td style="width: 50%;">
            <p>Medicare Enrolled:
                <span>
                 
                            <input type="radio" name="medicareEnrolled" {{ isset($users->professional_detail['medicareEnrolled']) && $users->professional_detail['medicareEnrolled'] == 'true' ? 'checked' : '' }} onclick="return false;">Yes
                            <input type="radio" name="medicareEnrolled" {{ isset($users->professional_detail['medicareEnrolled']) && $users->professional_detail['medicareEnrolled'] == 'false' ? '' : 'checked' }} onclick="return false;">No
                      
                </span>
            </p>
        </td>
    </tr>
    @if(isset($users->professional_detail['medicareEnrolled']) && $users->professional_detail['medicareEnrolled'] == 'true')
    <tr>
        <td>
            <h1 style="padding: 10px;border: 1px solid #006C76;font-size: 20px;margin: 10px 0px;color: #006C76;font-weight: 600;">Medicare Detail:</h1>
        </td>
    </tr>
    <tr>
        <td>
            <table style="width: 100%;border: 1px solid #a5a5a5;margin-bottom: 20px;">
                <tr>
                    <th style="font-weight: 800;font-size: 16px;color: #000;padding: 15px 15px 15px 15px;width: 2%;text-align: center;border: 1px solid #a5a5a5;">#
                    </th>
                    <th style="width: 20%;">
                        <h1  style="font-weight: 800;font-size: 16px;color: #000;padding: 15px 0 15px 0;text-align: center;border: 1px solid #a5a5a5;"> Number</h1>
                    </th>
                    <th style="width: 20%;">
                        <h1 style="font-weight: 800;font-size: 16px;color: #000;padding: 15px 0 15px 0;text-align: center;border: 1px solid #a5a5a5;">State</h1>
                    </th>
                </tr>
                @php $number=1; @endphp
                @if (isset($users->professional_detail['medicare']) && count($users->professional_detail['medicare']) > 0)
                    @foreach ($users->professional_detail['medicare'] as $medicare)
                        <tr style="background: #f8f8f8;">
                            <td style="width: 2%;text-align: center;padding: 15px;border: 1px solid #a5a5a5;">{{ $number }}</td>
                            <td style="width: 20%;text-align: center;border: 1px solid #a5a5a5;">
                            {{ isset($medicare['Number']) ? $medicare['Number'] : '' }}
                            </td>
                            <td style="width: 20%;text-align: center;border: 1px solid #a5a5a5;">
                            @if (isset($medicare['StateID']))
                                            {{ \App\Models\State::find($medicare['StateID'])->state }}
                                        @endif
                            </td>
                        
                        </tr>
                        @php $number++; @endphp
                    @endforeach
                                                                    
                @endif
            </table>
        </td>
    </tr>
    @endif
    <tr>
        <td>
            <p>Medicaid Enrolled:
                <span>
                  <input type="radio" name="medicaidEnrolled" {{ isset($users->professional_detail['medicaidEnrolled']) && $users->professional_detail['medicaidEnrolled'] == 'true' ? 'checked' : '' }} onclick="return false;">Yes
                    <input type="radio" name="medicaidEnrolled" {{ isset($users->professional_detail['medicaidEnrolled']) && $users->professional_detail['medicaidEnrolled'] == 'false' ? '' : 'checked' }} onclick="return false;">No
                </span>
            </p>
        </td>
    </tr>
    @if(isset($users->professional_detail['medicaidEnrolled']) && $users->professional_detail['medicareEnrolled'] == 'true')
    <tr>
        <td>
            <h1 style="padding: 10px;border: 1px solid #006C76;font-size: 20px;margin: 10px 0px;color: #006C76;font-weight: 600;">Medicaid Detail:</h1>
        </td>
    </tr>
    <tr>
        <td>
            <table style="width: 100%;border: 1px solid #a5a5a5;margin-bottom: 20px;">
                <tr>
                    <th style="font-weight: 800;font-size: 16px;color: #000;padding: 15px 15px 15px 15px;width: 2%;text-align: center;border: 1px solid #a5a5a5;">#
                    </th>
                    <th style="width: 20%;">
                        <h1  style="font-weight: 800;font-size: 16px;color: #000;padding: 15px 0 15px 0;text-align: center;border: 1px solid #a5a5a5;"> Number</h1>
                    </th>
                    <th style="width: 20%;">
                        <h1 style="font-weight: 800;font-size: 16px;color: #000;padding: 15px 0 15px 0;text-align: center;border: 1px solid #a5a5a5;">State</h1>
                    </th>
                </tr>
                @php $number=1; @endphp
                    @if (isset($users->professional_detail['medicaid']) && count($users->professional_detail['medicaid']) > 0)
                        @foreach ($users->professional_detail['medicaid'] as $medicaid)
                        <tr style="background: #f8f8f8;">
                            <td style="width: 2%;text-align: center;padding: 15px;border: 1px solid #a5a5a5;">{{ $number }}</td>
                            <td style="width: 20%;text-align: center;border: 1px solid #a5a5a5;">
                            {{ isset($medicaid['Number']) ? $medicaid['Number'] : '' }}
                            </td>
                            <td style="width: 20%;text-align: center;border: 1px solid #a5a5a5;">
                            @if (isset($medicaid['StateID']))
                                        {{ \App\Models\State::find($medicaid['StateID'])->state }}
                                    @endif
                            </td>
                        
                        </tr>
                        @php $number++; @endphp
                    @endforeach
                                                                    
                @endif
            </table>
        </td>
    </tr>
    @endif
    <tr>
        <td style="width: 50%;">
            <p>Age range you treated:
                <span>
                    <input type="checkbox" name="age" {{ ($users->professional_detail['age_0_18']) ? 'checked' : '' }} onclick="return false;"> Age 0 to 18
                    <input type="checkbox" name="age" {{ ($users->professional_detail['age_19_40']) ? 'checked' : '' }} onclick="return false;"> Age 19 to 40
                     <input type="checkbox" name="age" {{ ($users->professional_detail['age_41_65']) ? 'checked' : '' }} onclick="return false;"> Age 41 to 65
                    <input type="checkbox" name="age" {{ ($users->professional_detail['age_65Plus']) ? 'checked' : '' }} onclick="return false;"> Age 65+
                </span>
            </p>
        </td>
     
    </tr>
    <tr>
        <td>
            <h1 style="padding: 10px;border: 1px solid #006C76;font-size: 20px;margin: 10px 0px;color: #006C76;font-weight: 600;">State License Information:</h1>
        </td>
        </tr>
    <tr>
        <td>
            <table style="width: 100%;border: 1px solid #a5a5a5;margin-bottom: 20px;">
                <tr>
                    <th style="font-weight: 800;font-size: 16px;color: #000;padding: 15px 15px 15px 15px;width: 2%;text-align: center;border: 1px solid #a5a5a5;">#
                    </th>
                    <th style="width: 20%;">
                        <h1 style="font-weight: 800;font-size: 16px;color: #000;padding: 15px 0 15px 0;text-align: center;border: 1px solid #a5a5a5;">State</h1>
                    </th>
                    <th style="width: 20%;">
                        <h1  style="font-weight: 800;font-size: 16px;color: #000;padding: 15px 0 15px 0;text-align: center;border: 1px solid #a5a5a5;">License Number</h1>
                    </th>
                    <th style="width: 20%;">
                        <h1 style="font-weight: 800;font-size: 16px;color: #000;padding: 15px 0 15px 0;text-align: center;border: 1px solid #a5a5a5;">Category</h1>
                    </th>
                
                </tr>
                @php $number=1; @endphp
                    @if (isset($users->professional_detail['stateLicense']) && count($users->professional_detail['stateLicense']) > 0)
                        @foreach ($users->professional_detail['stateLicense'] as $stateLicense)
                        <tr style="background: #f8f8f8;">
                            <td style="width: 2%;text-align: center;padding: 15px;border: 1px solid #a5a5a5;">{{ $number }}</td>
                            <td style="width: 20%;text-align: center;border: 1px solid #a5a5a5;">
                            @if (isset($stateLicense['StateID']))
                                        {{ \App\Models\State::find($stateLicense['StateID'])->state }}
                                    @endif
                            </td>
                            <td style="width: 20%;text-align: center;border: 1px solid #a5a5a5;">
                            {{ isset($stateLicense['Number']) ? $stateLicense['Number'] : '' }}
                            </td>
                            <td style="width: 20%;text-align: center;border: 1px solid #a5a5a5;">
                        {{ isset($stateLicense['Category']) ? $stateLicense['Category'] : '' }}
                            </td>
                        
                        </tr>
                        @php $number++; @endphp
                    @endforeach
                                                                    
                @endif
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <h1 style="padding: 10px;border: 1px solid #006C76;font-size: 20px;margin: 10px 0px;color: #006C76;font-weight: 600;">Board Certificate Information:</h1>
        </td>
    </tr>
    <tr>
        <td>
            <table style="width: 100%;border: 1px solid #a5a5a5;margin-bottom: 20px;">
                <tr>
                    <th style="font-weight: 800;font-size: 16px;color: #000;padding: 15px 15px 15px 15px;width: 2%;text-align: center;border: 1px solid #a5a5a5;">#
                    </th>
                    <th style="width: 20%;">
                        <h1 style="font-weight: 800;font-size: 16px;color: #000;padding: 15px 0 15px 0;text-align: center;border: 1px solid #a5a5a5;">Certifing Board</h1>
                    </th>
                    <th style="width: 20%;">
                        <h1 style="font-weight: 800;font-size: 16px;color: #000;padding: 15px 0 15px 0;text-align: center;border: 1px solid #a5a5a5;">NCCPA Id</h1>
                    </th>
                    <th style="width: 20%;">
                        <h1 style="font-weight: 800;font-size: 16px;color: #000;padding: 15px 0 15px 0;text-align: center;border: 1px solid #a5a5a5;">Certification Number</h1>
                    </th>
                    <th style="width: 20%;">
                        <h1 style="font-weight: 800;font-size: 16px;color: #000;padding: 15px 0 15px 0;text-align: center;border: 1px solid #a5a5a5;">Board Certified</h1>
                    </th>
                    <th style="width: 20%;">
                        <h1 style="font-weight: 800;font-size: 16px;color: #000;padding: 15px 0 15px 0;text-align: center;border: 1px solid #a5a5a5;">Board Eligible</h1>
                    </th>
                </tr>
                @php $number=1; @endphp
                    @if (isset($users->professional_detail['boardCertificate']) && count($users->professional_detail['boardCertificate']) > 0)
                        @foreach ($users->professional_detail['boardCertificate'] as $boardCertificate)
                        <tr style="background: #f8f8f8;">
                            <td style="width: 2%;text-align: center;padding: 15px;border: 1px solid #a5a5a5;">{{ $number }}</td>
                        
                            <td style="width: 20%;text-align: center;border: 1px solid #a5a5a5;">
                                {{ isset($boardCertificate['certificate']) ? $boardCertificate['certificate'] : '' }}
                            </td>
                            <td style="width: 20%;text-align: center;border: 1px solid #a5a5a5;">
                                {{ isset($boardCertificate['nccpa_id']) ? $boardCertificate['nccpa_id'] : '' }}
                            </td>
                            <td style="width: 20%;text-align: center;border: 1px solid #a5a5a5;">
                                {{ isset($boardCertificate['nccpa_certificate_number']) ? $boardCertificate['nccpa_certificate_number'] : '' }}
                            </td>
                            <td style="width: 20%;text-align: center;border: 1px solid #a5a5a5;">
                                <input type="radio" name="isBoardCertified" {{ isset($boardCertificate['isBoardCertified']) && $boardCertificate['isBoardCertified'] == 'true' ? 'checked' : '' }} onclick="return false;">Yes
                                <input type="radio" name="isBoardCertified" {{ isset($boardCertificate['isBoardCertified']) && $boardCertificate['isBoardCertified'] == 'false' ? '' : 'checked' }} onclick="return false;">No
                            </td>   
                            <td style="width: 20%;text-align: center;border: 1px solid #a5a5a5;">
                                <input type="radio" name="isBoardEligible" {{ isset($boardCertificate['isBoardEligible']) && $boardCertificate['isBoardEligible'] == 'true' ? 'checked' : '' }} onclick="return false;">Yes
                                <input type="radio" name="isBoardEligible" {{ isset($boardCertificate['isBoardEligible']) && $boardCertificate['isBoardEligible'] == 'false' ? '' : 'checked' }} onclick="return false;">No
                            </td>   
                        </tr>
                        @php $number++; @endphp
                    @endforeach
                                                                    
                @endif
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <h1 style="padding: 10px;border: 1px solid #006C76;font-size: 20px;margin: 10px 0px;text-align: center;color: #006C76;font-weight: 600;">Federal DEA</h1>
        </td>
    </tr>
    <tr>
        <td>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td>
                        <p>Federal DEA Id:<span>{{ $users->professional_detail['federal_DEA_id']}}</span></p>
                    </td>
                    <td>
                        <p>Expire Month/Year:<span>{{ $users->professional_detail['fedExpiredMonthYear']}}</span></p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <h1 style="padding: 10px;border: 1px solid #006C76;font-size: 20px;margin: 10px 0px;text-align: center;color: #006C76;font-weight: 600;">NPI</h1>
        </td>
    </tr>
    <tr>
        <td>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td>
                        <p>Npi Number:<span>{{ $users->professional_detail['npiNumber']}}</span></p>
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
                        <p>Npi Type:<span>{{ $users->professional_detail['npiType']}}</span></p>
                    </td>
                  
                    @if(isset($users->professional_detail['npiType']) && ($users->professional_detail['npiType'] == 'Individuan' || $users->professional_detail['npiType'] == 'Organisation'))
                    <td>
                        <p>Npi Organization Name:<span>{{ $users->professional_detail['npiOrgName']}}</span></p>
                    </td>
                    @endif
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td>
                        <p>Address1: <span>  
                        @if (isset($users->professional_detail['npa_address1']))
                            {{ $users->professional_detail['npa_address1'] }}
                        @endif </span></p>
                    </td>
                    <td>
                        <p>Address2: <span>
                        @if (isset($users->professional_detail['npa_address2']))
                            {{ $users->professional_detail['npa_address2'] }}
                        @endif</span></p>
                    </td>
                    <td>
                        <p>Building: <span> {{ isset($users->professional_detail['npa_building']) ? $users->professional_detail['npa_building'] : '' }}</span></p>
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
                        <p>City: <span> 
                            @if (isset($users->professional_detail['npa_cityId']))
                                {{ \App\Models\City::find($users->professional_detail['npa_cityId'])->city }}
                            @endif
                        </span></p>
                    </td>
                    <td>
                        <p>State: <span>
                        @if (isset($users->professional_detail['npa_stateId']))
                                {{ \App\Models\State::find($users->professional_detail['npa_stateId'])->state }}
                                @endif
                        </span></p>
                    </td>
                    <td>
                        <p>Zipcode: <span>{{ isset($users->professional_detail['npa_zipCode']) ? $users->professional_detail['npa_zipCode'] : '' }}</span></p>
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
                    <p>Taxonomy Description:<span>
                        @if (isset($users->professional_detail['taxonomyDescription']))
                            {{ $users->professional_detail['taxonomyDescription']}}
                        @endif</span></p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <h1 style="padding: 10px;border: 1px solid #006C76;font-size: 20px;margin: 10px 0px;text-align: center;color: #006C76;font-weight: 600;">CAQH</h1>
        </td>
    </tr>
    <tr>
        <td>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td>
                        <p>CAQH Id:<span>{{ $users->professional_detail['caqh_id']}}</span></p>
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
                        <p>CAQH User:<span>{{ $users->professional_detail['caqh_user']}}</span></p>
                    </td>
                    <td>
                        <p>CAQH Password:<span>{{ $users->professional_detail['caqh_password']}}</span></p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<!-- page 2 end-->
