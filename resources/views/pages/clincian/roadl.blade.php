@extends('pages.layouts.app')

@section('title','Patient RoadL Request')
@section('pageTitleSection')
    RoadL
@endsection

@section('content')
    <ul class="boradcast-list">
        @if(count($patientRequestList)>0)
            @foreach($patientRequestList as $key=>$value)
                <li class="mt-3">
                    <span class="badge rounded-pill bg-danger _ccm">C</span>
                    <div class="app-card app-card-broadcast raduis_5">
                        <div class="app-broadcasting">
                            <div class="lside">
                                <div>
                                    <img src="{{ $value->patient_detail->avatar_image }}" class="user_photo" alt=""
                                         srcset="{{ $value->patient_detail->avatar_image }}">
                                </div>
                                <div class="content">
                                    <h1 class="_t11">
                                        <a href="{{ url('/patient-detail/'.$value->patient_detail->id) }}">
                                            {{ $value->patient_detail->first_name }} {{ $value->patient_detail->last_name }}
                                        </a>
                                        <span class="contact"><a href="tel:8866246684" class="secondary_tel"></a>
                                            </span>
                                    </h1>
                                    <p class="address">
                                        {{ isset($value->patient_detail->detail)?$value->patient_detail->detail->address_1.','.$value->patient_detail->detail->address_2:'latitude : '.$value->patient_detail->latitude.'  ,  longitude :'.$value->patient_detail->longitude }}
                                    </p>
                                    <p class="emergency_contact mb-2 d-none"> Emergency Contact
                                        <a href="tel:9966246684" class="primary_tel d-none">{{ $value->patient_detail->phone }}</a>
                                    </p>
                                </div>
                            </div>
                            <div class="rside">
                                <div class="_lside">
                                    <ul class="specification">
                                        @if(count($value->ccrm))
                                            @foreach($value->ccrm as $ckey=>$cvalue)
                                                @if($cvalue->reading_type==='1')
                                                    <li class="blood">
                                                        <img src="{{ asset('assets/img/icons/pressure.svg') }}"
                                                             class="mr-2"  alt="">Blood Pressure : {{ $cvalue->reading_value }}</li>
                                                @elseif($cvalue->reading_type==='2')
                                                    <li class="sugar"><img src="{{ asset('assets/img/icons/sugar.svg') }}" class="mr-2"
                                                                           alt="">Blood Sugar : {{ $cvalue->reading_value }}</li>
                                                @elseif($cvalue->reading_type==='3')
                                                    <li class="caregiver" data-container="body" data-toggle="popover"
                                                        data-placement="top"
                                                        data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
                                                        <img src="{{ asset('assets/img/icons/caregiver.svg') }}" class="mr-2"
                                                             alt="">Caregiver :&nbsp;<a title="{{ $value->patient_detail->phone }}"
                                                                                        href="javascript:void(0)" class="secondary_tel">{{ $cvalue->reading_value }}</a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        @else
                                            <li class="blood">
                                                <img src="{{ asset('assets/img/icons/pressure.svg') }}"
                                                     class="mr-2"  alt="">Blood Pressure : --</li>
                                            <li class="sugar"><img src="{{ asset('assets/img/icons/sugar.svg') }}" class="mr-2"
                                                                   alt="">Blood Sugar : --</li>
                                            <li class="caregiver" data-container="body" data-toggle="popover"
                                                data-placement="top"
                                                data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
                                                <img src="{{ asset('assets/img/icons/caregiver.svg') }}" class="mr-2"
                                                     alt="">Caregiver :&nbsp;<a title="{{ $value->patient_detail->phone }}"
                                                                                href="javascript:void(0)" class="secondary_tel">--</a>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                                <div class="_rside">
                                        <ul class="actionBar">
                                            <li>
                                                <span id="hook-latest"></span>
                                                <div class="search-clinician">
                                                    <!-- <input type="text" class="form-control clinician" name="animal"
                                                        id="searchField" placeholder="Assign Manually"> -->
                                                    <select name="assign_clinician"
                                                        class="form-control select assign_clinician" multiple>
                                                        <option selected="" value="RoadL">RoadL</option>
                                                        <option value="LAB">LAB</option>
                                                        <option value="X-Ray">X-Ray</option>
                                                        <option value="CHHA">CHHA</option>
                                                        <option value="Home Oxygen">Home Oxygen</option>
                                                        <option value="Home Insfusion">Home Insfusion</option>
                                                        <option value="Wound Care">Wound Care</option>
                                                        <option value="DME">DME</option>
                                                    </select>
                                                </div>
                                            </li>
                                            <li>
                                                <button type="button"
                                                    onclick="window.location.href = '{{ route('start.call',['patient_request_id'=>$value->id]) }}'"
                                                    class="btn btn-start-call">Start
                                                Call<span></span></button>
                                            </li>
                                            <li>
                                                <div class="broadcast_box">
                                                    @if($value->clincial_id===null)
                                                        <button type="button"
                                                            onclick="window.location.href = '{{ route('clinician.start.roadl',['patient_request_id'=>$value->id]) }}'"
{{--                                                            onclick="sendLocation(1,'sdfdsfds')"--}}
                                                            class="btn btn-broadcast btn-block">RoadL Broadcast<span></span>
                                                        </button>
                                                    @elseif($value->status==='complete')
                                                        <button type="button"
                                                            class="btn btn-broadcast">Complete<span></span>
                                                        </button>
                                                    @else
                                                        <button type="button"
                                                            onclick="window.location.href = '{{ route('clinician.start.running',['patient_request_id'=>$value->id]) }}'"
                                                            class="btn btn-broadcast">Running Broadcast<span></span>
                                                        </button>
                                                    @endif
                                                </div>
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
@endsection

@push('styles')
@endpush

@push('scripts')
    <script src="{{ asset('js/clincian/app.clinician.broadcast.js') }}"></script>
    <script>
        var patientRequestList='{{ route('clinician.roadl.patientRequestList') }}';

        function sendLocation(token,data) {
            socket.emit('send-location', data);
        }
    </script>
    <!--<script src="{{ asset('js/clincian/roadl.js') }}"></script>-->
@endpush

