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
            <h1 style="padding: 10px;border: 1px solid #006C76;font-size: 20px;margin: 10px 0px;color: #006C76;font-weight: 600;">New Employee Information</h1>
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
                                {{ $users->address_detail['info'] ? $users->address_detail['info']['ssn'] : '' }}
                            @else
                                {{ ($users->ssn) ? $users->ssn : ''}}
                            @endif
                        </span></p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <p style="font-weight: bold;font-size: 14px; width:100%; text-align: left;box-shadow: none;">Current Address: <span  value="Shashikant"
            style="display: block;width: 100%;font-size: 1rem; display:inline-block;line-height: 1.5;color: #495057;background-color: #fff;background-clip: padding-box;border: 1px solid #ced4da;border-radius: .25rem;transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;display: inline;width: inherit;border: none;border-bottom: 2px solid;border-radius: 0px;outline: none;">{{ isset($users->address_detail['address']) ? $users->address_detail['address']['address1']  : ''}} {{ isset($users->address_detail['address']) ? $users->address_detail['address']['address2']  : ''}} {{ isset($users->address_detail['address']) ? $users->address_detail['address']['building']  : ''}}</span></p>
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
                        <p>Phone: <span>{{ ($users->user) ? $users->user->phone : ''}}</span></p>
                    </td>
                    <td>
                        <p>How long have you resided at current address? <span>{{ isset($users->address_detail['address']['how_long_resident']) ? $users->address_detail['address']['how_long_resident'] : ''}}</span></p>
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
                        <p style="font-weight: bold;font-size: 14px; width:100%; text-align: left;box-shadow: none;">Prior Address: <span  value="Shashikant"
                        style="display: block;width: 100%;font-size: 1rem; display:inline-block;line-height: 1.5;color: #495057;background-color: #fff;background-clip: padding-box;border: 1px solid #ced4da;border-radius: .25rem;transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;display: inline;width: inherit;border: none;border-bottom: 2px solid;border-radius: 0px;outline: none;">{{ isset($users->address_detail['prior']) ? $users->address_detail['prior']['address1']  : ''}} {{ isset($users->address_detail['prior']) ? $users->address_detail['prior']['address2']  : ''}} {{ isset($users->address_detail['prior']) ? $users->address_detail['prior']['building']  : ''}}</span></p>
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
                        @endif
                                    </span></p>
                    </td>
                    

                    <td>
                        <p>Zip: <span>{{ isset($users->address_detail['prior']) ? $users->address_detail['prior']['zipcode'] : ''}}</span></p>
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
                    <p>Phone: <span>{{ ($users->user) ? $users->user->phone : ''}}</span></p>
                    </td>
                    <td>
                        <p>How long have you resided at current address? <span>{{ isset($users->address_detail['address']['how_long_resident']) ? $users->address_detail['address']['how_long_resident'] : ''}}</span></p>
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
                        <p>Are you over 18 years of age?: 
                            <span>
                                <input type="checkbox" {{ ($users->user && $users->user->age == 'Yes') ? 'checked' : '' }}>Yes
                                <input type="checkbox" {{ ($users->user && $users->user->age == 'No') ? 'checked' : '' }}>No
                            </span>
                        </p>
                    </td>
                    <td>
                        <p>Sex: 
                            <span>
                                <input type="checkbox" {{ ($users->user) && $users->user->gender === '1' ? 'checked' : '' }} >Male
                                <input type="checkbox" {{ ($users->user) && $users->user->gender === '2' ? 'checked' : '' }}>Female
                                <input type="checkbox" {{ ($users->user) && $users->user->gender === '3' ? 'checked' : '' }}>Other
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
                        <p>Have you worked for this company in the past
                            <span>
                                <input type="checkbox">Yes
                                <input type="checkbox" >No
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
    </tr>
 
    @if ($users->user->designation_id == '2')
        <!-- Emergency Info Start -->
        @include('pages.clincian.profile.emergency_detail')
        <!-- Emergency Info End -->

        <!-- Emergency Info Start -->
        @include('pages.clincian.profile.position')
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