@extends('pages.clincian.layouts.app')

@section('title','Patient RoadL Request')
@section('pageTitleSection')
    RoadL
@endsection

@section('content')
    <div id="patient-request">

    </div>
@endsection

@push('styles')
    <style>
        #map {
            height: 100%;
        }
        #floating-panel {
            position: absolute;
            top: 10px;
            left: 25%;
            z-index: 5;
            background-color: #fff;
            padding: 5px;
            border: 1px solid #999;
            text-align: center;
            font-family: 'Roboto','sans-serif';
            line-height: 30px;
            padding-left: 10px;
        }
    </style>
@endpush

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
{{--    <script src="{{ asset('js/clincian/app.clinician.broadcast.js') }}"></script>--}}
    <script>
        var patientRequestList='{{ route('clinician.roadl.patientRequestList') }}';
    </script>
    <script src="{{ asset('js/clincian/roadl.js') }}"></script>
@endpush
