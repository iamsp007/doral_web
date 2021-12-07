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
                        <p>Terms: <span>{{ isset($users->reference_detail['terms']) && ($users->reference_detail['terms'] === '1') ? 'True' : 'False'}}</span></p>
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
                            <p>Have You Ever Been Bonded: <span>{{ isset($users->reference_detail['haveYouEverBeenBonded']) && $users->reference_detail['haveYouEverBeenBonded'] == '1' ? 'True' : 'False' }}</span></p>
                        </td>
                        <td>
                            <p>Have You Ever Been Refused Bond: <span>{{ isset($users->reference_detail['haveYouEverBeenRefusedBond']) && $users->reference_detail['haveYouEverBeenRefusedBond'] == '1' ? 'True' : 'False' }}</span></p>
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
                            <p>Have You Over Been Convicated Of a Crime: <span>{{ isset($users->reference_detail['haveYouOverBeenConvicatedOfaCrime']) && $users->reference_detail['haveYouOverBeenConvicatedOfaCrime'] == '1' ? 'True' : 'False' }}</span></p>
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
                    <h1 style="padding: 10px;border: 1px solid #006C76;font-size: 20px;margin: 10px 0px;text-align: center;color: #006C76;font-weight: 600;">Contact Information {{ $number}}</h1>
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
                                <p>Address:  <span>{{ $reference_detail['address1'] }}
                                    @if (isset($reference_detail['address2']))
                                    {{ $reference_detail['address2'] }}
                                    @endif  
                                    {{ isset($reference_detail['building']) ? $reference_detail['building'] : '' }}
                                @if (isset($reference_detail['city_id']))
                                    {{ \App\Models\City::find($reference_detail['city_id'])->city }}
                                @endif
                                @if (isset($reference_detail['state_id']))
                                    {{ \App\Models\State::find($reference_detail['state_id'])->state }}
                                    @endif
                                    {{ isset($reference_detail['zipcode']) ? $reference_detail['zipcode'] : '' }} </span></p>
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
                                <p>Emergency Contact Phone Home #: <span>{{ isset($reference_detail['phoneNo']) ? $reference_detail['phoneNo'] : '' }}</span></p>
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