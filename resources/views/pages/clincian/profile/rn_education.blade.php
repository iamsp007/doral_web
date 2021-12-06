<tr>
    <td>
        <h1 style="padding: 10px;border: 1px solid #006C76;font-size: 20px;margin: 10px 0px;color: #006C76;font-weight: 600;">Employment History and Educational Background:</h1>
    </td>
</tr>
<tr>
    <td>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td>
                    <p>List your past three (3) employers, beginning with the most recent: <span></span></p>
                </td>
            </tr>
        </table>
    </td>
</tr>
<tr>
    <td>
        <h1 style="padding: 10px;border: 1px solid #006C76;font-size: 20px;margin: 10px 0px;color: #006C76;font-weight: 600;">Position Desired:</h1>
    </td>
</tr>
<tr>
    <td>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td>
                    <p>Position: <span>{{ isset($users->employer_detail['position']) ? $users->employer_detail['position'] : '' }}</span></p>
                </td>
                <td>
                    <p>Are you currently employed? : <span>{{ isset($users->employer_detail['position']) ? viewDateFormat($users->employer_detail['isCurrentEmployee']) : '' }}</span></p>
                </td>
            </tr>
        </table>
    </td>
</tr>
<tr>
    <td>
        <table style="width: 100%;border: 1px solid #a5a5a5;margin-top: 20px;">
            <tr>
                <th style="font-weight: 800;font-size: 16px;color: #000;padding: 15px 15px 15px 15px;width: 2%;text-align: left;border-bottom: 1px solid #a5a5a5;">#
                </th>
                <th style="width: 20%;">
                    <h1  style="font-weight: 800;font-size: 16px;color: #000;padding: 15px 0 15px 0;text-align: left;border-bottom: 1px solid #a5a5a5;"> Company</h1>
                </th>
                <th style="width: 20%;">
                    <h1 style="font-weight: 800;font-size: 16px;color: #000;padding: 15px 0 15px 0;text-align: left;border-bottom: 1px solid #a5a5a5;">Address</h1>
                </th>
                <th style="width: 20%;">
                    <h1 style="font-weight: 800;font-size: 16px;color: #000;padding: 15px 0 15px 0;text-align: left;border-bottom: 1px solid #a5a5a5;">Phone</h1>
                </th>
                <th style="width: 20%;">
                    <h1 style="font-weight: 800;font-size: 16px;color: #000;padding: 15px 0 15px 0;text-align: left;border-bottom: 1px solid #a5a5a5;">Supervisor</h1>
                </th>
            </tr>
            @php $counter = 1 @endphp
            @if (isset($users->employer_detail) && count($users->employer_detail['employer']) > 0)
                @foreach ($users->employer_detail['employer'] as $employer_detail)
                    <tr style="background: #f8f8f8;">
                        <td style="width: 2%;text-align: left;padding: 15px;border-bottom: 1px solid #a5a5a5;">{{ $counter }}</td>
                        <td style="width: 20%;text-align: left;border-bottom: 1px solid #a5a5a5;">
                            {{ $employer_detail['companyName']}}
                        </td>
                        <td style="width: 20%;text-align: left;border-bottom: 1px solid #a5a5a5;">
                        {{ $employer_detail['address1'] }}
                        @if (isset($employer_detail['address2']))
                            {{ $employer_detail['address2'] }}
                        @endif  
                        {{ isset($employer_detail['building']) ? $employer_detail['building'] : '' }}
                        @if (isset($employer_detail['city_id']))
                            {{ \App\Models\City::find($employer_detail['city_id'])->city }}
                        @endif
                        @if (isset($employer_detail['state_id']))
                            {{ \App\Models\State::find($employer_detail['state_id'])->state }}
                        @endif
                        {{ isset($employer_detail['zipcode']) ? $employer_detail['zipcode'] : '' }}
                        </td>
                        <td style="width: 20%;text-align: left;border-bottom: 1px solid #a5a5a5;">{{ $employer_detail['phoneNo']}}</td>
                        <td style="width: 20%;text-align: left;border-bottom: 1px solid #a5a5a5;">{{ isset($employer_detail['supervisor']) ? $employer_detail['supervisor'] : '' }}</td>
                    </tr>
                    @php $counter++ @endphp
                @endforeach
            @else 
                <tr style="background: #f8f8f8;">
                    <td colspan="5" style="width: 2%;text-align: left;padding: 15px;border-bottom: 1px solid #a5a5a5;">Record(s) Not Found</td>
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
                    <p>List your past three (3) schools you attended, beginning with the most recent. <span></span></p>
                </td>
            </tr>
        </table>
    </td>
</tr>
<tr>
    <td>
        <table style="width: 100%;border: 1px solid #a5a5a5;margin-top: 20px;">
            <tr>
                <th style="font-weight: 800;font-size: 16px;color: #000;padding: 15px 15px 15px 15px;width: 2%;text-align: left;border-bottom: 1px solid #a5a5a5;"> #
                </th>
                <th style="width: 20%;">
                    <h1 style="font-weight: 800;font-size: 16px;color: #000;padding: 15px 0 15px 0;text-align: left;border-bottom: 1px solid #a5a5a5;">Name and address</h1>
                </th>
                <th style="width: 20%;">
                    <h1 style="font-weight: 800;font-size: 16px;color: #000;padding: 15px 0 15px 0;text-align: left;border-bottom: 1px solid #a5a5a5;">Years completed</h1>
                </th>
                <th style="width: 20%;">
                    <h1 style="font-weight: 800;font-size: 16px;color: #000;padding: 15px 0 15px 0;text-align: left;border-bottom: 1px solid #a5a5a5;">Did you graduate?</h1>
                </th>
                <th style="width: 20%;">
                    <h1 style="font-weight: 800;font-size: 16px;color: #000;padding: 15px 0 15px 0;text-align: left;border-bottom: 1px solid #a5a5a5;"> Major/Degree</h1>
                </th>
                <th style="width: 20%;">
                    <h1 style="font-weight: 800;font-size: 16px;color: #000;padding: 15px 0 15px 0;text-align: left;border-bottom: 1px solid #a5a5a5;"> Website</h1>
                </th>
            </tr>
            @php $counter = 1 @endphp
            @if (isset($users->education_detail) && count($users->education_detail) > 0)
            @foreach ($users->education_detail as $education_detail)
                <tr style="background: #f8f8f8;">
                    <td style="width: 2%;text-align: left;padding: 15px;border-bottom: 1px solid #a5a5a5;">{{$counter}}</td>
                    <td style="width: 20%;text-align: left;border-bottom: 1px solid #a5a5a5;">
                        {{ $education_detail['name'] }}
                        {{ $education_detail['address1'] }}
                        @if (isset($education_detail['address2']))
                            {{ $education_detail['address2'] }}
                        @endif  
                        {{ isset($education_detail['building']) ? $education_detail['building'] : '' }}
                        @if (isset($education_detail['city_id']))
                            {{ \App\Models\City::find($education_detail['city_id'])->city }}
                        @endif
                        @if (isset($education_detail['state_id']))
                            {{ \App\Models\State::find($education_detail['state_id'])->state }}
                        @endif
                        {{ isset($education_detail['zipcode']) ? $education_detail['zipcode'] : '' }}
                        </td>
                    <td style="width: 20%;text-align: left;border-bottom: 1px solid #a5a5a5;">{{ isset($education_detail['year']) ? $education_detail['year'] : '' }}</td>
                    <td style="width: 20%;text-align: left;border-bottom: 1px solid #a5a5a5;">{{ isset($education_detail['isGraduate']) ? $education_detail['isGraduate']  : '' }}</td>
                    <td style="width: 20%;text-align: left;border-bottom: 1px solid #a5a5a5;">
                        {{ isset($education_detail['degree']) ? $education_detail['degree'] : '' }}
                    </td>
                    <td style="width: 20%;text-align: left;border-bottom: 1px solid #a5a5a5;">
                        {{ isset($education_detail['website']) ? $education_detail['website'] : '' }}
                    </td>
                </tr>
                @php $counter++ @endphp
            @endforeach
            @else 
                <tr style="background: #f8f8f8;">
                    <td colspan="5" style="width: 2%;text-align: left;padding: 15px;border-bottom: 1px solid #a5a5a5;">Record(s) Not Found</td>
                </tr>      
            @endif
        </table>
    </td>
</tr>