@extends('pages.layouts.app')

@section('title','Patient RoadL Running Map')
@section('pageTitleSection')
    RoadL
@endsection

@section('content')
    <div id="map">
        <input type="hidden" name="patient_request_id"  id="patient_request_id" value="{{ $patient_request_id }}"/>
    </div>
@endsection

@push('styles')
    <style type="text/css">
        /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
        #right-panel {
            font-family: "Roboto", "sans-serif";
            line-height: 30px;
            padding-left: 10px;
        }

        #right-panel select,
        #right-panel input {
            font-size: 15px;
        }

        #right-panel select {
            width: 100%;
        }

        #right-panel i {
            font-size: 12px;
        }
        #map {
            /*width:820px !important;*/
            height: 500px !important;
            position: relative !important;
            overflow: scroll;
        }
        #right-panel {
            float: right;
            width: 20%;
            padding-left: 2%;
        }

        #output {
            font-size: 11px;
        }
    </style>
@endpush

@push('scripts')
    <script src="https://socket.doralhealthconnect.com/socket.io/socket.io.js"></script>
    <script src="{{ asset('js/laravel-echo-setup.js') }}" type="text/javascript"></script>
    <script src="https://unpkg.com/@google/markerclustererplus@4.0.1/dist/markerclustererplus.min.js"></script>
    <script src="{{ asset('js/clincian/map.js') }}"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key={{env('MAP_API_KEY')}}&callback=initMap&libraries=&v=weekly"
        defer
    ></script>

@endpush
