@extends('pages.layouts.app')
@section('title','Patient RoadL Running Map')
@section('pageTitleSection')
    RoadL
@endsection
@section('content')
    <nav class="navbar navbar-light bg-light shadow-sm border pl-2">
        <div style="width:85%">
            <div class="btn-group" role="group" aria-label="Basic example" id="btn-roadl-group">
                {{-- <button type="button" class="btn btn-outline-info font-weight-bold active">All</button>
                <button type="button" class="btn btn-outline-info font-weight-bold">LAB</button>
                <button type="button" class="btn btn-outline-info font-weight-bold">Radiology</button>
                <button type="button" class="btn btn-outline-info font-weight-bold">CHHA</button>
                <button type="button" class="btn btn-outline-info font-weight-bold">HOME OXYGEN</button>
                <button type="button" class="btn btn-outline-info font-weight-bold">HOME INFUSION</button>
                <button type="button" class="btn btn-outline-info font-weight-bold">WOUND CARE</button>
                <button type="button" class="btn btn-outline-info font-weight-bold">DME</button> --}}
            </div>
        </div>
    </nav>
    <!-- <button class="btn btn-broadcast" id="re-center">Re-Center</button> -->
    <div style="display:block;position:relative;width:100%;height:100%"">
        <div id="map">
           <input type="hidden" name="patient_request_id"  id="patient_request_id" value="{{ $patient_request_id }}"/>
        </div>
    </div>
@endsection
@section('app-video')
    <!-- Add Permission Start Here -->
    <div class="permissonControl">
        <a href="javascript:void(0)" class="lab_icon _addpermission" id="addPatientToggle">
            <img src="{{ asset('assets/icon/vendor/icons_lab.svg') }}" alt="Roadl Request">
        </a>
    </div>
    <section id="slider" class="addPermission _addPermission slideout d-none">
        <div class="permissonControl _open">
            <a href="javascript:void(0)" class="close_menu_icon close_add_permission">
                <img src="{{ asset('assets/icon/closed_icon.svg') }}" alt="">
            </a>
        </div>
        <div class="pt-4 pb-4 pl-4 custom-shadow custom-border bg-white">
            <div class="_title4 mb-3" id="patient-name">Shashikant Parmar</div>
            <div class="scrollbar100">
                <ul class="requestBox" id="requestInfo">
                    <li>
                        <div class="requestInfo labBlock">
                            <div class="p-3 border-bottom">
                                <div class="name">Doral Lab</div>
                                <div class="role">Role: Lab Technician</div>
                            </div>
                            <div class="pt-2 pb-3 pl-3 pr-3 bg-white">
                                <div class="status"><span class="mr-2">Duration:</span>0.6KM</div>
                                <div class="status mt-1"><span class="mr-2">Distance:</span>2 Mins</div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="requestInfo labBlock">
                            <div class="p-3 border-bottom">
                                <div class="name">Doral Radiology</div>
                                <div class="role">Role: Radiology Technician</div>
                            </div>
                            <div class="pt-2 pb-3 pl-3 pr-3 bg-white">
                                <div class="status"><span class="mr-2">Duration:</span>0.6KM</div>
                                <div class="status mt-1"><span class="mr-2">Distance:</span>2 Mins</div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="requestInfo labBlock">
                            <div class="p-3 border-bottom">
                                <div class="name">Doral Chha</div>
                                <div class="role">Role: Chha Technician</div>
                            </div>
                            <div class="pt-2 pb-3 pl-3 pr-3 bg-white">
                                <div class="status"><span class="mr-2">Duration:</span>0.6KM</div>
                                <div class="status mt-1"><span class="mr-2">Distance:</span>2 Mins</div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="requestInfo labBlock">
                            <div class="p-3 border-bottom">
                                <div class="name">Shashikant Parmar</div>
                                <div class="role">Role: Lab Technician</div>
                            </div>
                            <div class="pt-2 pb-3 pl-3 pr-3 bg-white">
                                <div class="status"><span class="mr-2">Duration:</span>0.6KM</div>
                                <div class="status mt-1"><span class="mr-2">Distance:</span>2 Mins</div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="requestInfo labBlock">
                            <div class="p-3 border-bottom">
                                <div class="name">Shashikant Parmar</div>
                                <div class="role">Role: Lab Technician</div>
                            </div>
                            <div class="pt-2 pb-3 pl-3 pr-3 bg-white">
                                <div class="status"><span class="mr-2">Duration:</span>0.6KM</div>
                                <div class="status mt-1"><span class="mr-2">Distance:</span>2 Mins</div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>
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
    <style>
        .addPermission{position:fixed;right:0;top:10%;z-index:9999999!important;width:421px;min-height:500px}
        .addPermission.slideout{animation:slide-outt .5s forwards;-webkit-animation:slide-outt .5s forwards}
        .addPermission.slidein{animation:slide-inn .5s forwards;-webkit-animation:slide-inn .5s forwards}
        .addPermission ._title4{font-style:normal;font-weight:700;font-size:18px;color:#000}
        .addPermission ._title4 span{font-weight:500}
        .addPermission p{font-style:normal;font-weight:400;font-size:14px;color:#AAA7A7;line-height:1.6em}
        .requestBox{display:block;padding:0;margin:0}
        .requestBox li{padding:0;margin:0 0 10px}
        .requestBox li .requestInfo{border:1px solid rgba(21,171,82,1);padding:0;background:rgba(201,255,222,0.15);border-radius:5px;margin:0}
        .requestBox li .requestInfo .name{font-size:18px;font-weight:600;color:#006C76}
        .requestBox li .requestInfo .role{font-size:14px;font-weight:600;color:#000;padding-top:8px}
        .requestBox li .requestInfo .status{font-size:15px;font-weight:700;color:#006C76;padding-top:8px}
        .requestBox li .requestInfo .status span{color:#000}
        .requestBox li .requestInfo.radiologyBlock{border: 1px solid #EF9B14;background:#fffcf7}
        .requestBox li .requestInfo.radiologyBlock .name{color: #EF9B14;}
        .requestBox li .requestInfo.labBlock{border: 1px solid #DA1BDE;background:#fff9ff}
        .requestBox li .requestInfo.labBlock .name{color: #DA1BDE;}
        .requestBox li .requestInfo.chaaBlock{border: 1px solid #1BD639;background:#f4fff6}
        .requestBox li .requestInfo.chaaBlock .name{color: #01a11c;}
        .requestBox li .requestInfo.homeOxygenBlock{border: 1px solid #252F63;background:#f5f7ff}
        .requestBox li .requestInfo.homeOxygenBlock .name{color: #252F63;}
        @keyframes slide-inn {
            100%{transform:translateX(120%)}
        }
        @-webkit-keyframes slide-inn {
            100%{-webkit-transform:translateX(120%)}
        }
        @keyframes slide-outt {
            0%{transform:translateX(100%)}
            100%{transform:translateX(0%)}
        }
        @-webkit-keyframes slide-outt {
            0%{-webkit-transform:translateX(100%)}
            100%{-webkit-transform:translateX(0%)}
        }
        .close_menu_icon{background: linear-gradient(114.52deg, #077883 0.1%, #2EC2D0 65.66%);display: block;width:60px;height: 50px;-webkit-border-top-left-radius: 40px;-webkit-border-bottom-left-radius: 40px;-moz-border-radius-topleft: 40px;-moz-border-radius-bottomleft: 40px;border-top-left-radius: 40px;border-bottom-left-radius: 40px;display: flex;align-items: center;justify-content: center;}
        .close_menu_icon:hover{background:var(--sidebar-color);transition: 1s;}
        .scrollbar100{margin:0;height:700px;width:100%;background:none;overflow:hidden;overflow-y:scroll;padding-right:10px}
        .lab_icon{padding-right: 5px;background: #fff;border:2px solid #DA1BDE;border-right:1px solid transparent;display: block;width:60px;height: 50px;-webkit-border-top-left-radius: 40px;-webkit-border-bottom-left-radius: 40px;-moz-border-radius-topleft: 40px;-moz-border-radius-bottomleft: 40px;border-top-left-radius: 40px;border-bottom-left-radius: 40px;display: flex;align-items: center;justify-content: flex-end;}
        .radiology_icon{padding-right: 5px;background: #fff;border:2px solid #EF9B14;border-right:1px solid transparent;display: block;width:60px;height: 50px;-webkit-border-top-left-radius: 40px;-webkit-border-bottom-left-radius: 40px;-moz-border-radius-topleft: 40px;-moz-border-radius-bottomleft: 40px;border-top-left-radius: 40px;border-bottom-left-radius: 40px;display: flex;align-items: center;justify-content: flex-end;}
        .chaa_icon{padding-right: 5px;background: #fff;border:2px solid #1BD639;border-right:1px solid transparent;display: block;width:60px;height: 50px;-webkit-border-top-left-radius: 40px;-webkit-border-bottom-left-radius: 40px;-moz-border-radius-topleft: 40px;-moz-border-radius-bottomleft: 40px;border-top-left-radius: 40px;border-bottom-left-radius: 40px;display: flex;align-items: center;justify-content: flex-end;}
        .homeOxygen_icon{padding-right: 5px;background: #fff;border:2px solid #252F63;border-right:1px solid transparent;display: block;width:60px;height: 50px;-webkit-border-top-left-radius: 40px;-webkit-border-bottom-left-radius: 40px;-moz-border-radius-topleft: 40px;-moz-border-radius-bottomleft: 40px;border-top-left-radius: 40px;border-bottom-left-radius: 40px;display: flex;align-items: center;justify-content: flex-end;}
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
    <script src="{{ asset('js/clincian/map.js?vers=4') }}"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key={{env('MAP_API_KEY')}}&callback=initMap&libraries=&v=weekly"
        defer
    ></script>
    <script>
        var addPatientToggle = $('#addPatientToggle'),
            _addPermission = $('._addPermission'),
            close_add_permission = $('.close_add_permission');
        // Lab Show/Hide Script Start Here
        addPatientToggle.on('click', function () {
            _addPermission.removeClass('d-none')
            _addPermission.removeClass('slidein');
            _addPermission.addClass('slideout');
        })
        close_add_permission.on('click', function () {
            _addPermission.addClass('slidein');
            _addPermission.removeClass('slideout');
        })
        // Lab Show/Hide Script Start Here
    </script>
@endpush
