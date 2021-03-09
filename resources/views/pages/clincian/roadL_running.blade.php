@extends('pages.layouts.app')

@section('title','Patient RoadL Running Map')
@section('pageTitleSection')
    RoadL
@endsection

@section('content')
    <div id="floating-panel">
        <select id="referral_type">
            <option value="chicago, il">Chicago</option>
            <option value="st louis, mo">St Louis</option>
            <option value="joplin, mo">Joplin, MO</option>
            <option value="oklahoma city, ok">Oklahoma City</option>
            <option value="amarillo, tx">Amarillo</option>
            <option value="gallup, nm">Gallup, NM</option>
            <option value="flagstaff, az">Flagstaff, AZ</option>
            <option value="winona, az">Winona</option>
            <option value="kingman, az">Kingman</option>
            <option value="barstow, ca">Barstow</option>
            <option value="san bernardino, ca">San Bernardino</option>
            <option value="los angeles, ca">Los Angeles</option>
        </select>
    </div>
    <button class="btn btn-primary" id="re-center">Re-Center</button>
    <div id="right-panel"></div>
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
            width:75% !important;
            height: 850px !important;
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
    <script src="{{ env('SOCKET_IO_URL') }}/socket.io/socket.io.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
   <script>
       var socket = io(socket_url+'?id=1',{
           transport:['polling']
       });
   </script>
    <script src="https://unpkg.com/@google/markerclustererplus@4.0.1/dist/markerclustererplus.min.js"></script>
    <script src="{{ asset('js/clincian/map.js') }}"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key={{env('MAP_API_KEY')}}&callback=initMap&libraries=&v=weekly"
        defer
    ></script>

@endpush
