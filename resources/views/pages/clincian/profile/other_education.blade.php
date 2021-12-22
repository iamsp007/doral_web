<tr>
    <td>
        <h1 style="padding: 10px;border: 1px solid #006C76;font-size: 20px;margin: 10px 0px;color: #006C76;font-weight: 600;">Education Detail:</h1>
    </td>
</tr>
<tr>
    <td>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td>
                    <p>Medical Detail: <span></span></p>
                </td>
            </tr>
        </table>
    </td>
</tr>
<tr>
    <td>
        <table style="width: 100%;border: 1px solid #a5a5a5;margin-top: 20px;">
            <tr>
                <th style="font-weight: 800;font-size: 16px;color: #000;padding: 15px 15px 15px 15px;width: 2%;text-align: center;border: 1px solid #a5a5a5;">#
                </th>
                <th style="width: 20%;">
                    <h1  style="font-weight: 800;font-size: 16px;color: #000;padding: 15px 0 15px 0;text-align: center;border: 1px solid #a5a5a5;"> Institute Name</h1>
                </th>
                <th style="width: 50%;">
                    <h1 style="font-weight: 800;font-size: 16px;color: #000;padding: 15px 0 15px 0;text-align: center;border: 1px solid #a5a5a5;">Address</h1>
                </th>
                <th style="width: 20%;">
                    <h1 style="font-weight: 800;font-size: 16px;color: #000;padding: 15px 0 15px 0;text-align: center;border: 1px solid #a5a5a5;">Year</h1>
                </th>
            </tr>
            @php $counter = 1 @endphp
            @if (isset($users->education_detail) && count($users->education_detail['medical']) > 0)
                @foreach ($users->education_detail['medical'] as $education_detail)
                    <tr style="background: #f8f8f8;">
                        <td style="width: 2%;text-align: center;padding: 15px;border: 1px solid #a5a5a5;">{{ $counter }}</td>
                        <td style="width: 20%;text-align: center;border: 1px solid #a5a5a5;">
                            {{ $education_detail['medical_instituteName']}}
                        </td>
                        <td style="width: 50%;text-align: center;border: 1px solid #a5a5a5;">
                        {{ $education_detail['medical_address1'] }}
                        @if (isset($education_detail['medical_address2']))
                            {{ $education_detail['medical_address2'] }}
                        @endif  
                        {{ isset($education_detail['medical_building']) ? $education_detail['medical_building'] : '' }}
                        @if (isset($education_detail['medical_cityId']))
                            {{ \App\Models\City::find($education_detail['medical_cityId'])->city }}
                        @endif
                        @if (isset($education_detail['medical_stateId']))
                            {{ \App\Models\State::find($education_detail['medical_stateId'])->state }}
                        @endif
                        {{ isset($education_detail['medical_zipcode']) ? $education_detail['medical_zipcode'] : '' }}
                        </td>
                        <td style="width: 20%;text-align: center;border: 1px solid #a5a5a5;">{{ isset($education_detail['medical_yearStarted']) ? $education_detail['medical_yearStarted'] : '' }} - {{ isset($education_detail['medical_yearEnded']) ? $education_detail['medical_yearEnded'] : '' }}</td>
                    </tr>
                    @php $counter++ @endphp
                @endforeach
            @else 
                <tr style="background: #f8f8f8;">
                    <td colspan="5" style="width: 2%;text-align: center;padding: 15px;border: 1px solid #a5a5a5;">Record(s) Not Found</td>
                </tr>                                                          
            @endif
        </table>
    </td>
</tr>
<tr>
    <td>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td>
                    <p>Residency Detail: <span></span></p>
                </td>
            </tr>
        </table>
    </td>
</tr>
<tr>
    <td>
        <table style="width: 100%;border: 1px solid #a5a5a5;margin-top: 20px;">
            <tr>
                <th style="font-weight: 800;font-size: 16px;color: #000;padding: 15px 15px 15px 15px;width: 2%;text-align: center;border: 1px solid #a5a5a5;">#
                </th>
                <th style="width: 20%;">
                    <h1  style="font-weight: 800;font-size: 16px;color: #000;padding: 15px 0 15px 0;text-align: center;border: 1px solid #a5a5a5;"> Institute Name</h1>
                </th>
                <th style="width: 50%;">
                    <h1 style="font-weight: 800;font-size: 16px;color: #000;padding: 15px 0 15px 0;text-align: center;border: 1px solid #a5a5a5;">Address</h1>
                </th>
                <th style="width: 20%;">
                    <h1 style="font-weight: 800;font-size: 16px;color: #000;padding: 15px 0 15px 0;text-align: center;border: 1px solid #a5a5a5;">Year</h1>
                </th>
            </tr>
            @php $counter = 1 @endphp
            @if (isset($users->education_detail) && count($users->education_detail['residency']) > 0)
                @foreach ($users->education_detail['residency'] as $education_detail)
                    <tr style="background: #f8f8f8;">
                        <td style="width: 2%;text-align: center;padding: 15px;border: 1px solid #a5a5a5;">{{ $counter }}</td>
                        <td style="width: 20%;text-align: center;border: 1px solid #a5a5a5;">
                            {{ $education_detail['residency_instituteName']}}
                        </td>
                        <td style="width: 50%;text-align: center;border: 1px solid #a5a5a5;">
                        {{ $education_detail['residency_address1'] }}
                        @if (isset($education_detail['residency_address2']))
                            {{ $education_detail['residency_address2'] }}
                        @endif  
                        {{ isset($education_detail['residency_building']) ? $education_detail['residency_building'] : '' }}
                        @if (isset($education_detail['residency_cityId']))
                            {{ \App\Models\City::find($education_detail['residency_cityId'])->city }}
                        @endif
                        @if (isset($education_detail['residency_stateId']))
                            {{ \App\Models\State::find($education_detail['residency_stateId'])->state }}
                        @endif
                        {{ isset($education_detail['residency_zipcode']) ? $education_detail['residency_zipcode'] : '' }}
                        </td>
                        <td style="width: 20%;text-align: center;border: 1px solid #a5a5a5;">{{ isset($education_detail['residency_yearStarted']) ? $education_detail['residency_yearStarted'] : '' }} - {{ isset($education_detail['residency_yearEnded']) ? $education_detail['residency_yearEnded'] : '' }}</td>
                    </tr>
                    @php $counter++ @endphp
                @endforeach
            @else 
                <tr style="background: #f8f8f8;">
                    <td colspan="5" style="width: 2%;text-align: center;padding: 15px;border: 1px solid #a5a5a5;">Record(s) Not Found</td>
                </tr>                                                          
            @endif
        </table>
    </td>
</tr>
<tr>
    <td>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td>
                    <p>Fellowship Detail: <span></span></p>
                </td>
            </tr>
        </table>
    </td>
</tr>
<tr>
    <td>
        <table style="width: 100%;border: 1px solid #a5a5a5;margin-top: 20px;">
            <tr>
                <th style="font-weight: 800;font-size: 16px;color: #000;padding: 15px 15px 15px 15px;width: 2%;text-align: center;">#
                </th>
                <th style="width: 20%;">
                    <h1  style="font-weight: 800;font-size: 16px;color: #000;padding: 15px 0 15px 0;text-align: center;"> Institute Name</h1>
                </th>
                <th style="width: 20%;">
                    <h1  style="font-weight: 800;font-size: 16px;color: #000;padding: 15px 0 15px 0;text-align: center;">Name of fellowship program</h1>
                </th>
                <th style="width: 30%;">
                    <h1 style="font-weight: 800;font-size: 16px;color: #000;padding: 15px 0 15px 0;text-align: center;">Address</h1>
                </th>
                <th style="width: 20%;">
                    <h1 style="font-weight: 800;font-size: 16px;color: #000;padding: 15px 0 15px 0;text-align: center;">Year</h1>
                </th>
            </tr>
            @php $counter = 1 @endphp
            @if (isset($users->education_detail) && count($users->education_detail['fellowship']) > 0)
                @foreach ($users->education_detail['fellowship'] as $education_detail)
                    <tr style="background: #f8f8f8;">
                        <td style="width: 2%;text-align: center;padding: 15px;border: 1px solid #a5a5a5;">{{ $counter }}</td>
                        <td style="width: 20%;text-align: center;border: 1px solid #a5a5a5;">
                            {{ $education_detail['fellowship_instituteName']}}
                        </td>
                        <td style="width: 20%;text-align: center;border: 1px solid #a5a5a5;">
                            {{ $education_detail['fellowship_nameOfProgram']}}
                        </td>
                        <td style="width: 30%;text-align: center;border: 1px solid #a5a5a5;">
                        {{ $education_detail['fellowship_address1'] }}
                        @if (isset($education_detail['fellowship_address2']))
                            {{ $education_detail['fellowship_address2'] }}
                        @endif  
                        {{ isset($education_detail['fellowship_building']) ? $education_detail['fellowship_building'] : '' }}
                        @if (isset($education_detail['fellowship_cityId']))
                            {{ \App\Models\City::find($education_detail['fellowship_cityId'])->city }}
                        @endif
                        @if (isset($education_detail['fellowship_stateId']))
                            {{ \App\Models\State::find($education_detail['fellowship_stateId'])->state }}
                        @endif
                        {{ isset($education_detail['fellowship_zipcode']) ? $education_detail['fellowship_zipcode'] : '' }}
                        </td>
                        <td style="width: 20%;text-align: center;border: 1px solid #a5a5a5;">{{ isset($education_detail['fellowship_yearStarted']) ? $education_detail['fellowship_yearStarted'] : '' }} - {{ isset($education_detail['fellowship_yearEnded']) ? $education_detail['fellowship_yearEnded'] : '' }}</td>
                    </tr>
                    @php $counter++ @endphp
                @endforeach
            @else 
                <tr style="background: #f8f8f8;">
                    <td colspan="5" style="width: 2%;text-align: center;padding: 15px;border: 1px solid #a5a5a5;">Record(s) Not Found</td>
                </tr>                                                          
            @endif
        </table>
    </td>
</tr>