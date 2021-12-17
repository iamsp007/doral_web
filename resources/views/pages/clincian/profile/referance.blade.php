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
            <h1 style="padding: 10px;border: 1px solid #006C76;font-size: 20px;margin: 10px 0px;color: #006C76;font-weight: 600;">Reference detail</h1>
        </td>
    </tr>
    <tr>
        <td>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td>
                        <p>Employee Name: <span>{{ ($users->user) ? $users->user->full_name : ''}}</span></p>
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
                        <p><span><input type="checkbox" name="terms" {{ isset($users->reference_detail['terms']) && ($users->reference_detail['terms'] == '1') ? 'checked' : '' }} onclick="return false;">I {{ ($users->user) ? $users->user->full_name : ''}} of applicant, agree to the release of the above mentioned information concerning my employment </br>with Doral Medical and Multi-Specialty Center, as may requested by prospective employer.</span></p>
                    </td>
                    
                </tr>
            </table>
        </td>
    </tr>
    @if ($users->user->designation_id != '2')
        <tr>
            <td>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td>
                            <p>Have You Ever Been Bonded: <span>
                            <input type="radio" {{ isset($users->reference_detail['haveYouEverBeenBonded']) && $users->reference_detail['haveYouEverBeenBonded'] == 'true' ? 'checked' : '' }}>Yes
                            <input type="radio"{{ isset($users->reference_detail['haveYouEverBeenBonded']) && $users->reference_detail['haveYouEverBeenBonded'] == 'false' ? '' : 'checked' }}>No
                        </span></p>
                           
                        </td>
                        <td>
                            <p>Have You Ever Been Refused Bond: <span>
                            <input type="radio" {{ isset($users->reference_detail['haveYouEverBeenRefusedBond']) && $users->reference_detail['haveYouEverBeenRefusedBond'] == 'true' ? 'checked' : '' }}>Yes
                            <input type="radio"{{ isset($users->reference_detail['haveYouEverBeenRefusedBond']) && $users->reference_detail['haveYouEverBeenRefusedBond'] == 'false' ? '' : 'checked' }}>No
                        </span></p>
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
                            <p>Have You Over Been Convicated Of a Crime: <span>
                            <input type="radio" {{ isset($users->reference_detail['haveYouOverBeenConvicatedOfaCrime']) && $users->reference_detail['haveYouOverBeenConvicatedOfaCrime'] == 'true' ? 'checked' : '' }}>Yes
                            <input type="radio"{{ isset($users->reference_detail['haveYouOverBeenConvicatedOfaCrime']) && $users->reference_detail['haveYouOverBeenConvicatedOfaCrime'] == 'false' ? '' : 'checked' }}>No
                        </span></p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    @endif
    @php $number=1; @endphp
    @if (isset($users->reference_detail['reference_list']) && count($users->reference_detail['reference_list']) > 0)
        @foreach ($users->reference_detail['reference_list'] as $reference_detail)
            <tr>
                <td>
                    <h1 style="padding: 10px;border: 1px solid #006C76;font-size: 20px;margin: 10px 0px;text-align: center;color: #006C76;font-weight: 600;">Reference {{ $number}}</h1>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td>
                                <p>Contact Name: <span>{{ isset($reference_detail['name']) ? $reference_detail['name'] : '' }}</span></p>
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
                        <p>Address1: <span>  
                        {{ isset($reference_detail['address1']) ? $reference_detail['address1'] : ''}}</span></p>
                    </td>
                    <td>
                        <p>Address2: <span>
                        {{ isset($reference_detail) ? $reference_detail['address2']  : ''}}</span></p>
                      
                    </td>
                    <td>
                        <p>Building: <span>{{ isset($reference_detail['building']) ? $reference_detail['building']  : ''}}</span></p>
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
                            @if (isset($reference_detail['city_id']))
                                    {{ \App\Models\City::find($reference_detail['city_id'])->city }}
                                @endif
                            </span></p>
                    </td>
                    <td>
                        <p>State: <span>
                        @if (isset($reference_detail['state_id']))
                                    {{ \App\Models\State::find($reference_detail['state_id'])->state }}
                                    @endif</span></p>
                    </td>
                    <td>
                        <p>Zip: <span>{{ isset($reference_detail['zipcode']) ? $reference_detail['zipcode'] : '' }}</span></p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
           
            @php
            $phoneData = '';
            if(isset($reference_detail['phoneNo'])):
             $phoneData = "+".substr($reference_detail['phoneNo'], 0, 1)." ". "(".substr($reference_detail['phoneNo'], 1, 3).") ".substr($reference_detail['phoneNo'], 4, 3)."-".substr($reference_detail['phoneNo'],7);
             endif;
            @endphp
            <tr>
                <td>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td>
                                <p>Phone No #: <span>{{ $phoneData }}</span></p>
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
