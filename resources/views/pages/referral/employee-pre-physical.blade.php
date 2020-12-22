@extends('layouts.referral.default')
@section('content')
<div class="app-vbc">
    <table id="vbc" class="table" style="width:100%">
        <thead>
            <tr>
                <th><input type="checkbox" class="selectall"/></th>
                <th>Patient Name</th>
                <th>File</th>
                <th>Gender</th>
                <th>Phone</th>
                <th>City</th>
                <th>Zip Code</th>
                <th>Created Date</th>
                <th>Status</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @if(isset($record) && count($record) > 0)
            @foreach($record['patientReferral'] as $raw)
            <tr>
                <tr>
                <td><input type="checkbox"/></td>
                <td class="text-green"><a href='{{ url("/referral/patient-detail/$raw[id]") }}'>{{$raw['first_name']}} {{$raw['middle_name']}} {{$raw['last_name']}}</a></td>
                <td>
                    @if($raw['file_type'] == 1)
                    Demographic Info
                    @elseif($raw['file_type'] == 2)
                    Clinical Info
                    @elseif($raw['file_type'] == 3)
                    Compliance Due Dates
                    @elseif($raw['file_type'] == 4)
                    Previous MD Order
                    @endif
                </td>
                <td>{{$raw['gender']}}</td>
                <td>{{$raw['phone1']}}</td>
                <td>{{$raw['city']}}-{{$raw['state']}}</td>
                <td>{{$raw['Zip']}}</td>
                <td>{{ date('F d Y', strtotime($raw['created_at'])) }}</td>
                <td><span class="status-pending">{{$raw['status']}}</span></td>
                <td width="8%"><a href="javascript:void(0)"><img src="{{asset('assets/img/icons/delete-icon.svg')}}"
                            class="action-delete" /></a>
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div>
@stop