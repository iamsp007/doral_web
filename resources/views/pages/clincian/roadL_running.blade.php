@extends('pages.layouts.app')
@section('title','Patient RoadL Running Map')
@section('pageTitleSection')
    RoadL
@endsection
@section('content')
    <nav class="navbar navbar-light bg-light shadow-sm border pl-2">
        <div style="width:85%">
            <div class="btn-group" role="group" aria-label="Basic example" id="btn-roadl-group">
                <button type="button" class="btn btn-outline-info font-weight-bold active">All</button>
                <button type="button" class="btn btn-outline-info font-weight-bold">LAB</button>
                <button type="button" class="btn btn-outline-info font-weight-bold">Radiology</button>
                <button type="button" class="btn btn-outline-info font-weight-bold">CHHA</button>
                <button type="button" class="btn btn-outline-info font-weight-bold">HOME OXYGEN</button>
                <button type="button" class="btn btn-outline-info font-weight-bold">HOME INFUSION</button>
                <button type="button" class="btn btn-outline-info font-weight-bold">WOUND CARE</button>
                <button type="button" class="btn btn-outline-info font-weight-bold">DME</button>
            </div>
        </div>
        <div>
            <div>
                <select class="form-control form-control-lg">
                    <option value="">--Select--</option>
                    <option value="All">All</option>
                    <option value="Lab">Lab</option>
                    <option value="Radiology">Radiology</option>
                    <option value="CHHA">CHHA</option>
                    <option value="HOME OXYGEN">HOME OXYGEN</option>
                    <option value="HOME INFUSION">HOME INFUSION</option>
                    <option value="WOUND CARE">WOUND CARE</option>
                    <option value="DME">DME</option>
                </select>
                <!-- <select id="referral_type" class="form-control form-control-lg">
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
                </select> -->
            </div>
        </div>
    </nav>
    <!-- <button class="btn btn-broadcast" id="re-center">Re-Center</button> -->
    <div style="display:block;position:relative;width:100%;height:100%"">
        <div id="map">
           <input type="hidden" name="patient_request_id"  id="patient_request_id" value="{{ $patient_request_id }}"/>
        </div>
        <div style="width:20%;position:absolute;right:0;top:0;">
            <!-- <div id="infoPanel"></div> -->
        </div>
    </div>
@endsection
@push('styles')
    <style>
       .combobox{display:grid;place-self:start center}
        html,body{width:100%;height:100%}
        #map{height:100%;width:100%;margin-top:25px;position:relative}
        .btn-broadcast{padding-top:7px;padding-bottom:7px;font-size:14px}
        .btn-broadcast:hover{color:#006C76;padding-top:7px;padding-bottom:7px;font-size:14px}
        .app .app-content .app-body{overflow:hidden}
        #right-panel{font-family:"Roboto","sans-serif";line-height:30px;padding-left:10px}
        #right-panel select,#right-panel input{font-size:15px}
        #right-panel select{width:100%}
        #right-panel i{font-size:12px}
        #right-panel{float:right;width:20%;padding-left:2%}
        #output{font-size:11px}
        .gm-style .gm-style-iw-c{padding:0}
        .gm-style-iw{width:350px!important;overflow:hidden}
        .gm-style-iw-d{overflow:hidden!important}
        .gm-style-iw{overflow-y:auto!important;overflow-x:hidden!important}
        .gm-style-iw > div{overflow:visible!important}
        .infoWindow{overflow:hidden!important}
        .poi-info-window{padding:15px}
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
