@extends('pages.clincian.layouts.app')

@section('title','Patient RoadL Request Map')
@section('pageTitleSection')
    RoadL
@endsection

@section('content')
    <ul>
        @if(count($patientRequestList)>0)
            @foreach($patientRequestList as $key=>$value)
                <li>
                    <div class="app-card raduis_5 mb-2">
                        <div class="app-broadcasting">
                            <div class="lside">
                                <div>
                                    <img src="{{ asset('assets/img/user/01.png') }}" class="user_photo" alt=""
                                         srcset="{{ asset('assets/img/user/01.png') }}">
                                </div>
                                <div class="content">
                                    <h1 class="_t11">{!! $value->detail->first_name !!} {!! $value->detail->last_name !!} </h1>
                                    <p class="address">{!! $value->patientDetail->address1 !!}</p>
                                    <p class="emergency_contact mb-2"> Emergency Contact
                                        <a href="tel:9966246684" class="primary_tel">{!! $value->patientDetail->emg_phone !!}</a></p>
                                    <p class="contact"><a href="tel:8866246684" class="secondary_tel">{!! $value->detail->phone !!}</a>
                                    </p>
                                </div>
                                <!-- <a href="javascript:void(0)"><i class="las la-ellipsis-v la-2x"></i></a> -->
                                <div id="_dropdown">
                                    <div class="dropdown user-dropdown">
                                        <a class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown"
                                           aria-haspopup="true" aria-expanded="false" href="javascript:void(0)"><i
                                                class="las la-ellipsis-v la-2x"></i></a>
                                        <div class="dropdown-menu shadow" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="#">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="rside">
                                <div class="_lside">
                                    <ul class="specification">
                                        @if(count($value->ccrm)>0)
                                            @foreach($value->ccrm as $ckey=>$cvalue)
                                                <li class="blood">
                                                    <img src="{{ asset('assets/img/icons/pressure.svg') }}"
                                                         class="mr-2" alt="">
                                                    {!! $cvalue->reading_type !!} : {!! $cvalue->reading_value !!}
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                                <div class="_rside">
                                    <ul class="actionBar">
                                        <li>
                                            <div class="search-clinician">
                                                <input type="text" class="form-control clinician" name="animal"
                                                       id="searchField" placeholder="Assign Manually">
                                            </div>
                                        </li>
                                        <li>
                                            <button type="button" class="btn btn-start-call">Start
                                                Call<span></span></button>
                                        </li>
                                        <li>
                                            <button type="button" class="btn btn-emergency">emergency
                                                (911)<span></span></button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
        @endif
    </ul>
    <div id="map"></div>
@endsection

@push('styles')
    <style type="text/css">
        /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
        #map {
            /*width:820px !important;*/
            height: 500px !important;
            position: relative !important;
            overflow: scroll;
        }
        #pano {
            float: left;
            height: 100%;
            width: 50%;
        }
    </style>
@endpush

@push('scripts')
    <script src="https://unpkg.com/@google/markerclustererplus@4.0.1/dist/markerclustererplus.min.js"></script>
    <script src="{{ asset('js/clincian/map.js') }}"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key={{env('MAP_API_KEY')}}&callback=initMap&libraries=&v=weekly"
        defer
    ></script>

@endpush
