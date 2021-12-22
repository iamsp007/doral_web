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
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td>
                        <p>Position: <span>{{ isset($users->workHistory_detail['position']) ? $users->workHistory_detail['position'] : '' }}</span></p>
                    </td>
                    <td>
                        <p>Are you currently employed?: 
                        <span>
                            <input type="radio" name="isMilitary" {{ isset($users->workHistory_detail['isCurrentEmployee']) && $users->workHistory_detail['isCurrentEmployee'] == 'true' ? 'checked' : '' }} onclick="return false;">Yes
                            <input type="radio" name="isMilitary" {{ isset($users->workHistory_detail['isCurrentEmployee']) && $users->workHistory_detail['isCurrentEmployee'] == 'false' ? '' : 'checked' }} onclick="return false;">No
                        </span>
                    </p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
   
    @php $number=1; @endphp
    @if (isset($users->workHistory_detail['list']) && count($users->workHistory_detail['list']) > 0)
        @foreach ($users->workHistory_detail['list'] as $workHistory)
            <tr>
                <td>
                    <h1 style="padding: 10px;border: 1px solid #006C76;font-size: 20px;margin: 10px 0px;color: #006C76;font-weight: 600;">Work History Information {{ $number}}:</h1>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td>
                                <p>Employer Name: <span>{{ isset($workHistory['companyName']) ? $workHistory['companyName'] : '' }}</span></p>
                            </td>
                            <td style="width: 50%;">
                                <p>Position/Title:
                                    <span>
                                        {{ $workHistory['position']}}
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
                                <p>Address1: <span>  
                                {{ $workHistory['address1'] }}</span></p>
                            </td>
                            <td>
                                <p>Address2: <span>
                                @if (isset($workHistory['address2']))
                                            {{ $workHistory['address2'] }}
                                            @endif</span></p>
                            </td>
                            <td>
                                <p>Building: <span> {{ isset($workHistory['building']) ? $workHistory['building'] : '' }}</span></p>
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
                                    @if (isset($workHistory['cityId']))
                                        {{ \App\Models\City::find($workHistory['cityId'])->city }}
                                    @endif
                                    </span></p>
                            </td>
                            <td>
                                <p>State: <span>
                                    @if (isset($workHistory['stateId']))
                                        {{ \App\Models\State::find($workHistory['stateId'])->state }}
                                        @endif
                                    </span></p>
                            </td>
                            <td>
                                <p>Zipcode: <span>{{ isset($workHistory['zipCode']) ? $workHistory['zipCode'] : '' }}</span></p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td style="width: 50%;">
                                <p>Start Date:
                                    <span>
                                        {{ $workHistory['startDate']}}
                                    </span>
                                </p>
                            </td>
                            <td>
                                <p>End Date:<span>{{ $workHistory['endDate']}}</span></p>
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
                                <p>Reason of separation: <span>{{ isset($workHistory['reason']) ? $workHistory['reason'] : '' }}</span></p>
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
                                <p>Record Id:<span>{{ $workHistory['recordId']}}</span></p>
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
    <tr>
        <td>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td>
                        <p>It is been noted that the large gap in your work history is due to taking time off: <span>{{ isset($users->workHistory_detail['gapReason']) ? $users->workHistory_detail['gapReason'] : '' }}</span></p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<!-- page 2 end-->
