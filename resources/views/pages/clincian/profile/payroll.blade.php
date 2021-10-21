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
                                <p>Name Of Bank:<span> {{ $users->payroll_details['nameOfBank']}}</span></p>
                            </td>
                            <td>
                                <p>Name Of Account:<span> {{ $users->payroll_details['nameOfAccount']}}</span></p>
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
                            <td>
                                <p>Type Of Account:<span>{{ $users->payroll_details['typeOfAccount']}}</span></p>
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
                                <p>Files your Tax:
                                    <span>
                                        {{ $users->payroll_details['filesyourtax']}}
                                    </span>
                                </p>
                            </td>
                            <td>
                                <p>Routing Number:<span>{{ $users->payroll_details['routingNumber']}}</span></p>
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
                                <p>Dependents:
                                    <span>
                                        {{ $users->payroll_details['dependents']}}
                                    </span>
                                </p>
                            </td>
                            <td>
                                <p>Other dependents:<span>{{ $users->payroll_details['otherdependents']}}</span></p>
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
                                <p>Children Dependents:
                                    <span>
                                        {{ $users->payroll_details['childrendependents']}}
                                    </span>
                                </p>
                            </td>
                            <td>
                                <p>Total Dependents:<span>{{ $users->payroll_details['totaldependents']}}</span></p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        @if ($users->user->designation_id != '2')
        <tr>
            <td>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                        <tr>
                            <td style="width: 50%;">
                                <p>Legal Entity:
                                    <span>
                                        {{ $users->payroll_details['legal_entity']}}
                                    </span>
                                </p>
                            </td>
                            <td>
                                <p>Send Tax Document:<span>{{ $users->payroll_details['send_tax_doc']}}</span></p>
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
                                <p>Tax Payer Id Number:
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
        <tr>
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
        </tr>
    </table>
@endif
<!-- page 7 end-->