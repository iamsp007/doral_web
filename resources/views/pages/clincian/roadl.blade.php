@extends('pages.clincian.layouts.app')

@section('title','Clinician Patient List')
@section('pageTitleSection')
    RoadL
@endsection

@section('content')
    <div id="patient-request">

    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
@endpush

@push('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script>
        var patientRequestList='{{ route('clinician.roadl.patientRequestList') }}';
    </script>
    <script src="{{ asset('js/clincian/roadl.js') }}"></script>
@endpush
