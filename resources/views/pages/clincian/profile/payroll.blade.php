<!-- page 7 start-->
@if (isset($users->payroll_details))
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
                <h1 style="padding: 10px;border: 1px solid #006C76;font-size: 20px;margin: 10px 0px;text-align: center;color: #006C76;font-weight: 600;">PAYROLL DETAIL</h1>
            </td>
        </tr>
        <tr>
            <td>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                        <tr>
                            <td style="width: 50%;">
                                <p>How do you files your tax?:
                                    <span>
                                    	@php
                                    	$string = Str::of($users->payroll_details['filesyourtax'])->words(15, ' ...');
                                    	@endphp
                                        {{ $string}}
                                    </span>
                                </p>
                            </td>                           
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <!-- <tr>
            <td>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                        <tr>
                            <td style="width: 50%;">
                                <p>Dependents:
                                    <span>
                                        {{ $users->payroll_details['dependents']}}
                                    </span>
                                </p>
                            </td>
                            
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr> -->
        <tr>
            <td>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                        <tr>
                            <td style="width: 50%;">
                                <p>No. of dependent children's(under age 17):
                                    <span>
                                        {{ $users->payroll_details['childrendependents']}}
                                    </span>
                                </p>
                            </td>
                            <td>
                                <p>Any other dependents:<span>{{ $users->payroll_details['otherdependents']}}</span></p>
                            </td>
                            <td>
                                <p>Total dependents:<span>{{ $users->payroll_details['totaldependents']}}</span></p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <h1 style="padding: 10px;border: 1px solid #006C76;font-size: 20px;margin: 10px 0px;text-align: center;color: #006C76;font-weight: 600;">Bank Informatopn</h1>
            </td>
        </tr>
        <tr>
            <td>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                        <tr>
                            <td style="width: 50%;">
                                <p>Bank Name:<span> {{ $users->payroll_details['nameOfBank']}}</span></p>
                            </td>
                            <td>
                                <p>Account Holder Name :<span> {{ $users->payroll_details['nameOfAccount']}}</span></p>
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
                                <p>Type Of Account:<span>
                            <input type="checkbox" name="typeOfAccount" {{ isset($users->payroll_details['typeOfAccount']) && $users->payroll_details['typeOfAccount'] == 'Saving' ? 'checked' : '' }} onclick="return false;">Saving
                            <input type="checkbox" name="typeOfAccount" {{ isset($users->payroll_details['typeOfAccount']) && $users->payroll_details['typeOfAccount'] == 'Checking' ? 'checked' : '' }} onclick="return false;">Checking
                        </span></p>
                            </td>
                            <td>
                                <p>Bank Routing Number:<span>{{ $users->payroll_details['routingNumber']}}</span></p>
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
                                <p>Account Number:
                                    <span>
                                        {{ $users->payroll_details['accountNumber']}}
                                    </span>
                                </p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>  
        
        @if ($users->user->designation_id != '2')
         <tr>
            <td>
                <h1 style="padding: 10px;border: 1px solid #006C76;font-size: 20px;margin: 10px 0px;text-align: center;color: #006C76;font-weight: 600;">Tax Informatopn</h1>
            </td>
        </tr>
        <tr>
            <td>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                        <tr>
                           
                            <td>
                                <p>Are You Filing As A Entity?:<span>    <input type="radio" {{ isset($users->payroll_details['are_you_filing_as_a_entity']) &&$users->payroll_details['are_you_filing_as_a_entity'] == 'true' ? 'checked' : '' }}>Yes
                            <input type="radio"{{ isset($users->payroll_details['are_you_filing_as_a_entity']) && $users->payroll_details['are_you_filing_as_a_entity'] == 'false' ? '' : 'checked' }}>No
                        </span></p>
                            </td>
                            @if(isset($users->payroll_details['are_you_filing_as_a_entity']) && $users->payroll_details['are_you_filing_as_a_entity'] == 'true')
                             <td style="width: 50%;">
                                <p>Legal name of entity Entity:
                                    <span>
                                        {{ $users->payroll_details['legal_entity']}}
                                    </span>
                                </p>
                            </td>
                            @endif
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
         @if(isset($users->payroll_details['are_you_filing_as_a_entity']) && $users->payroll_details['are_you_filing_as_a_entity'] == 'true')
        <tr>
            <td>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                        <tr>
                        
                            <td style="width: 50%;">
                                <p>TaxPayer identification Number:
                                    <span>
                                        {{ $users->payroll_details['taxpayer_id_number']}}
                                    </span>
                                </p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        @endif
        @endif
        {{-- <tr>
            <td>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                        <tr>
                            <td>
                                <p>Address:<span>
                                {{ $users->payroll_details['address1'] }}
                                @if (isset($employer_detail['address2']))
                                    {{ $users->payroll_details['address2'] }}
                                @endif  
                                {{ isset($users->payroll_details['building']) ? $users->payroll_details['building'] : '' }}
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
                                @if (isset($users->payroll_details['city_id']))
                                    {{ \App\Models\City::find($users->payroll_details['city_id'])->city }}
                                @endif
                                @if (isset($users->payroll_details['state_id']))
                                    {{ \App\Models\State::find($users->payroll_details['state_id'])->state }}
                                @endif
                                {{ isset($users->payroll_details['zipcode']) ? $users->payroll_details['zipcode'] : '' }}</span></p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr> --}}
    </table>
@endif
<!-- page 7 end-->
