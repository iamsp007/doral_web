
<tr>
    <td>
        <h1 style="padding: 10px;border: 1px solid #006C76;font-size: 20px;margin: 10px 0px;color: #006C76;font-weight: 600;">Emergency Contact Information</h1>
    </td>
    </tr>
@php $counter = 1 @endphp
@if (isset($users->emergency_detail))
    @foreach ($users->emergency_detail as $emergency_detail)
        <tr>
            <td>
                <h1 style="padding: 10px;border: 1px solid #006C76;font-size: 20px;margin: 10px 0px;text-align: center;color: #006C76;font-weight: 600;">Contact {{ $counter }}</h1>
            </td>
        </tr>
        @php
            $phoneData = '';
            if(isset($emergency_detail['phoneNo'])):
             $phoneData = "+".substr($emergency_detail['phoneNo'], 0, 1)." ". "(".substr($emergency_detail['phoneNo'], 1, 3).") ".substr($emergency_detail['phoneNo'], 4, 3)."-".substr($emergency_detail['phoneNo'],7);
             endif;
            @endphp
        <tr>
            <td>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td>
                            <p>Name: <span>{{ isset($emergency_detail['name']) ? $emergency_detail['name'] : ''}}</span></p>
                        </td>
                        <td>
                            <p>Home Phone: <span>{{ $phoneData }}</span></p>
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
                            <p>Address: <span>{{ isset($emergency_detail['address1']) ? $emergency_detail['address1'] : '' }} {{ isset($emergency_detail['address2']) ? $emergency_detail['address2'] : ''}} {{ isset($emergency_detail['building']) ? $emergency_detail['building'] : '' }} </span></p>
                        </td>
                        <td>
                            <p>Work Phone: <span></span></p>
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
                                @if (isset($emergency_detail['city_id']))
                                    {{ isset($emergency_detail['city_id']) ? \App\Models\City::find($emergency_detail['city_id'])->city : '' }}
                                @endif
                                </span></p>
                        </td>
                        <td>
                            <p>State: <span>
                                @if (isset($emergency_detail['state_id']))
                                    {{ isset($emergency_detail['state_id']) ? \App\Models\State::find($emergency_detail['state_id'])->state : '' }}
                                @endif
                                </span></p>
                        </td>
                        <td>
                            <p>Zipcode: <span>{{ isset($emergency_detail['zipcode']) ? $emergency_detail['zipcode'] : '' }}</span></p>
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
                            <p>How is the person is related to you: <span>
                                @if($emergency_detail['relation'] != 'Other')
                                    {{ isset($emergency_detail['relation']) ? $emergency_detail['relation'] : '' }}
                                @else
                                    {{ isset($emergency_detail['otherRelation']) ? $emergency_detail['otherRelation'] : '' }}
                                @endif
                                </span></p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        @php $counter++ @endphp
    @endforeach
@endif