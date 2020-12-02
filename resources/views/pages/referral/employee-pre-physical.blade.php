@extends('layouts.referral.default')
@section('content')
<div class="app-vbc">
    <table id="vbc" class="table" style="width:100%">
        <thead>
            <tr>
                <th><input type="checkbox" class="selectall"/></th>
                <th>Patient Name</th>
                <th>Description</th>
                <th>Services</th>
                <th>Uploaded Date</th>
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
                <td>Curabitur dignissim tortor.</td>
                <td>Employee Pre Physical</td>
                <td>{{ date('F d Y', strtotime($raw['created_at'])) }}</td>
                <td width="22%"><span class="status-pending">Success</span></td>
                <td width="8%"><a href="javascript:void(0)"><img src="../assets/img/icons/delete-icon.svg"
                            class="action-delete" /></a>
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div>
@stop