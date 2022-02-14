<!-- page 1 start-->
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
            <h1 style="padding: 10px;border: 1px solid #006C76;font-size: 20px;margin: 10px 0px;color: #006C76;font-weight: 600;">Employee Data</h1>
        </td>
    </tr>
    <tr>
        <td>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td>
                        <p>Name: <span>{{ ($users->user) ? $users->user->full_name : ''}}</span></p>
                    </td>
                    <td>
                        <p>SNN: <span>
                            @if (isset($users->address_detail['info']))
                                {{ $users->address_detail['info'] ? getSsn($users->address_detail['info']['ssn']) : '' }}
                            @else
                                {{ ($users->ssn) ? getSsn($users->ssn) : ''}}
                            @endif
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
                        <p>Cell Phone: <span>{{ ($users->phone) ? $users->phone : ''}}</span></p>
                    </td>
                    <td>
                        <p>Home Phone: <span>{{ ($users->home_phone) ? $users->home_phone : ''}}</span></p>
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
                        <p>Date Of Birth: <span>{{ $users->address_detail['info'] ? $users->address_detail['info']['dateOfBirth'] : '' }}</span></p>
                    </td>
                    <td>
                        <p>Are you over 18 years of age?: 
                            <span>
                                <input type="radio" name="age18" {{ ($users->user && $users->user->age == 'Yes') ? 'checked' : '' }} onclick="return false;">Yes
                                <input type="radio" name="age18" {{ ($users->user && $users->user->age == 'No') ? 'checked' : '' }} onclick="return false;">No
                            </span>
                        </p>
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
                        <p>Sex: 
                            <span>
                                <input type="radio" name="gender" {{ ($users->user) && $users->user->gender === '1' ? 'checked' : '' }} onclick="return false;">Male
                                <input type="radio" name="gender" {{ ($users->user) && $users->user->gender === '2' ? 'checked' : '' }} onclick="return false;">Female
                                <input type="radio" name="gender" {{ ($users->user) && $users->user->gender === '3' ? 'checked' : '' }} onclick="return false;">Other
                            </span>
                        </p>
                    </td> 
                    <td>                     		
                        <p>Ethnicity: <span> 
                        	 @if($users->address_detail['info']['Ethnicity'] != 'Other')
                                    {{ $users->address_detail['info'] ? $users->address_detail['info']['Ethnicity'] : '' }}
                                @else
                                    {{ $users->address_detail['info'] ? $users->address_detail['info']['OtherEthnicity'] : '' }}
                                @endif</span></p>
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
                        <p>Date You Can Start Work: <span>{{ $users->address_detail['info'] ? $users->address_detail['info']['DateYouCanStartWork'] : '' }}</span></p>
                    </td>
		    {{-- <td>
                        <p>Salary Desired $/hr: <span>{{ $users->address_detail['info'] ? $users->address_detail['info']['salaryDesired'] : '' }}</span></p>
                    </td> --}}

                </tr>
            </table>
        </td>
    </tr>
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
        <tr>
            <td>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td>
                            <p>{{$label}}: <span>{{ $docId }}</span></p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    @endif
    @if ($users->user->designation_id != '2')
        <tr>
            <td>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td>
                            <p>Us Citizen: <span>
                            <input type="radio" name="us_citizen" {{ isset($users->address_detail['info']['us_citizen']) && $users->address_detail['info']['us_citizen'] == 'true' ? 'checked' : '' }} onclick="return false;">Yes
                            <input type="radio" name="us_citizen" {{ isset($users->address_detail['info']['us_citizen']) && $users->address_detail['info']['us_citizen'] == 'false' ? '' : 'checked' }} onclick="return false;">No
                            </span></p>
                        </td>
                        @if($users->address_detail['info']['us_citizen'] === false)
                            <td>
                                <p>Immigration Id: <span>{{ isset($users->address_detail['info']) ? $users->address_detail['info']['immigration_id']  : ''}}</span></p>
                            </td>
                        @endif
                    </tr>  
                </table>
            </td>
        </tr>
       
    @endif
    <tr>
        <td>
            <h1 style="padding: 10px;border: 1px solid #006C76;font-size: 20px;margin: 10px 0px;text-align: center;color: #006C76;font-weight: 600;">Current Address</h1>
        </td>
    </tr>
    <tr>
        <td>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td>
                        <p>Address1: <span>  
                        {{ isset($users->address_detail['address']) ? $users->address_detail['address']['address1']  : ''}}</span></p>
                    </td>
                    <td>
                        <p>Address2: <span>
                        {{ isset($users->address_detail['address']) ? $users->address_detail['address']['address2']  : ''}}</span></p>
                    </td>
                    <td>
                        <p>Building: <span>{{ isset($users->address_detail['address']) ? $users->address_detail['address']['building']  : ''}}</span></p>
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
                            @if (isset($users->address_detail['address']))
                                {{ isset($users->address_detail['address']['city_id']) ? \App\Models\City::find($users->address_detail['address']['city_id'])->city : '' }}
                            @endif</span></p>
                    </td>
                    <td>
                        <p>State: <span>
                        @if (isset($users->address_detail['address']))
                            {{ isset($users->address_detail['address']['state_id']) ? \App\Models\State::find($users->address_detail['address']['state_id'])->state : '' }}
                            @endif </span></p>
                    </td>
                    <td>
                        <p>Zipcode: <span>{{ isset($users->address_detail['address']) ? $users->address_detail['address']['zipcode'] : ''}}</span></p>
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
                        <p>How long have you resided at current address? <span>{{ isset($users->address_detail['address']['how_long_resident']) ? $users->address_detail['address']['how_long_resident'] : ''}}</span></p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>    
    @if(isset($users->address_detail['prior']))
    <tr>
        <td>
            <h1 style="padding: 10px;border: 1px solid #006C76;font-size: 20px;margin: 10px 0px;text-align: center;color: #006C76;font-weight: 600;">Prior Address</h1>
        </td>
    </tr>
    <tr>
        <td>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td>
                        <p>Address1: <span>  
                        {{ isset($users->address_detail['prior']) ? $users->address_detail['prior']['address1']  : ''}}</span></p>
                    </td>
                    <td>
                        <p>Address2: <span>
                        {{ isset($users->address_detail['prior']) ? $users->address_detail['prior']['address2']  : ''}}</span></p>
                    </td>
                    <td>
                        <p>Building: <span>{{ isset($users->address_detail['prior']) ? $users->address_detail['prior']['building']  : ''}}</span></p>
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
                            @if (isset($users->address_detail['prior']))
                                {{ isset($users->address_detail['prior']['city_id']) ? \App\Models\City::find($users->address_detail['prior']['city_id'])->city : '' }}
                            @endif</span></p>
                    </td>
                    <td>
                        <p>State: <span>
                        @if (isset($users->address_detail['prior']))
                            {{ isset($users->address_detail['prior']['state_id']) ? \App\Models\State::find($users->address_detail['prior']['state_id'])->state : '' }}
                        @endif</span></p>
                    </td>
                    <td>
                        <p>Zip: <span>{{ isset($users->address_detail['prior']) ? $users->address_detail['prior']['zipcode'] : ''}}</span></p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    @endif
 
  
    {{-- <tr>
        <td>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td>
                        <p>Have you worked for this company in the past
                            <span>
                                <input type="radio">Yes
                                <input type="radio" >No
                            </span>
                            <span>If so,when?</span>
                        </p>
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
                        <p> Names of friends or relatives who presently work for this company:<span></span></p>
                    </td>
                </tr>
            </table>
        </td>
    </tr> --}}
 
        <!-- Emergency Info Start -->
        @include('pages.clincian.profile.emergency_detail')
        <!-- Emergency Info End -->
        
    @if ($users->user->designation_id == '2')      

        <!-- Emergency Info Start -->
        {{-- @include('pages.clincian.profile.position') --}}
        <!-- Emergency Info End -->

        <!-- Education Start -->
        @include('pages.clincian.profile.rn_education')
        <!-- Education End -->

        <!-- Security Start -->
        @include('pages.clincian.profile.security')
        <!-- Security End -->

        <!-- Military Start -->
        @include('pages.clincian.profile.military')
        <!-- Military End -->
    @else
        @include('pages.clincian.profile.other_education')
        @include('pages.clincian.profile.workHistory_detail')
        @include('pages.clincian.profile.professional_detail')
    @endif
    
    <!-- Authorization Start -->
        @include('pages.clincian.profile.authorization')
    <!-- Authorization End -->
</table>
<!-- page 1 end-->