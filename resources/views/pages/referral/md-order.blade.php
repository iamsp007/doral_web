@extends('layouts.referral.default')
@section('content')
<div class="app-vbc">
    <table id="vbc" class="table" style="width:100%">
        <thead>
            <tr>
                <th><input type="checkbox" class="selectall"/></th>
                <th>Patient Name</th>
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
                <td><input type="checkbox"/></td>
                <td class="text-green">{{$raw['first_name']}} {{$raw['middle_name']}} {{$raw['last_name']}}</td>
                <td>{{$raw['gender']}}</td>
                <td>{{$raw['phone1']}}</td>
                <td>{{$raw['city']}}-{{$raw['state']}}</td>
                <td>{{$raw['Zip']}}</td>
                <td>{{ date('F d Y', strtotime($raw['created_at'])) }}</td>
                <td><span class="status-pending">Success</span></td>
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