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
@endpush

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
{{--    <script src="{{ asset('js/clincian/app.clinician.broadcast.js') }}"></script>--}}
    <script>
        var patientRequestList='{{ route('clinician.roadl.patientRequestList') }}';
    </script>
    <script src="{{ asset('js/clincian/roadl.js') }}"></script>
@endpush
