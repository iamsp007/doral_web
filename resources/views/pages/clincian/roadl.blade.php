@extends('pages.layouts.app')

@section('title','Patient RoadL Request')
@section('pageTitleSection')
    RoadL
@endsection

@section('content')
    <ul class="boradcast-list">
        @if(count($patientRequestList)>0)
            @foreach($patientRequestList as $key=>$value)
{{--                {{ dd($value) }}--}}
                <li class="mt-3">
                    <span class="badge rounded-pill bg-danger _ccm">C</span>
                    <div class="app-card app-card-broadcast raduis_5">
                        <div class="app-broadcasting">
                            <div class="lside">
                                <div>
                                    @if(isset($value->patient_detail->avatar))
                                        <img src="{{ asset('assets/img/user/'.$value->patient_detail->avatar) }}" class="user_photo" alt=""
                                             srcset="{{ asset('assets/img/user/'.$value->patient_detail->avatar) }}">
                                    @else
                                        <img src="{{ asset('assets/img/user/01.png') }}" class="user_photo" alt=""
                                             srcset="{{ asset('assets/img/user/01.png') }}">
                                    @endif
                                </div>
                                <div class="content">
                                    <h1 class="_t11">
                                        <a href="{{ route('patient.detail',['patient_id'=>$value->patient_detail->id]) }}">
                                            {{ $value->patient_detail->first_name }} {{ $value->patient_detail->last_name }}
                                        </a>
                                        <span class="contact"><a href="tel:8866246684" class="secondary_tel"></a>
                                            </span>
                                    </h1>
                                    <p class="address">{{ isset($value->patient_detail->detail)?$value->patient_detail->detail->address_1.','.$value->patient_detail->detail->address_2:'latitude : '.$value->patient_detail->latitude.'  ,  longitude :'.$value->patient_detail->longitude }}</p>
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
                                            <div class="search-clinician">
                                                <input type="text" class="form-control clinician" name="animal"
                                                       id="searchField" placeholder="Assign Manually">
                                            </div>
                                        </li>
                                        <li>
                                            <button type="button"
                                                    onclick="window.location.href = '{{ route('start.call',['patient_request_id'=>$value->id]) }}'"
                                                    class="btn btn-start-call">Start
                                                Call<span></span></button>
                                        </li>
                                        <li>
                                            @if($value->clincial_id===null)
                                                <button type="button"
                                                        onclick="window.location.href = '{{ route('clinician.start.roadl',['patient_request_id'=>$value->id]) }}'"
                                                        class="btn btn-broadcast">Start Broadcast<span></span></button>
                                            @elseif($value->status==='complete')
                                                <button type="button"
                                                        class="btn btn-broadcast">Complete<span></span></button>
                                            @else
                                                <button type="button"
                                                        onclick="window.location.href = '{{ route('clinician.start.running',['patient_request_id'=>$value->id]) }}'"
                                                        class="btn btn-broadcast">Running Broadcast<span></span></button>
                                            @endif
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
{{--        <li class="mt-3">--}}
{{--            <span class="badge rounded-pill bg-danger _ccm">C</span>--}}
{{--            <div class="app-card app-card-broadcast raduis_5">--}}
{{--                <div class="app-broadcasting">--}}
{{--                    <div class="lside">--}}
{{--                        <div>--}}
{{--                            <img src="../assets/img/user/01.png" class="user_photo" alt=""--}}
{{--                                 srcset="../assets/img/user/01.png">--}}
{{--                        </div>--}}
{{--                        <div class="content">--}}
{{--                            <h1 class="_t11">--}}
{{--                                <a href="javascript:void(0)">--}}
{{--                                    Shashikant Parmar--}}
{{--                                </a>--}}
{{--                                <span class="contact"><a href="tel:8866246684" class="secondary_tel"></a>--}}
{{--                                            </span>--}}
{{--                            </h1>--}}
{{--                            <p class="address">1797 Pitkin Avenue Brooklyn,--}}
{{--                                NY 11212</p>--}}
{{--                            <p class="emergency_contact mb-2 d-none"> Emergency Contact--}}
{{--                                <a href="tel:9966246684" class="primary_tel d-none">9966246684</a>--}}
{{--                            </p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="rside">--}}
{{--                        <div class="_lside">--}}
{{--                            <ul class="specification">--}}
{{--                                <li class="blood"><img src="../assets/img/icons/pressure.svg" class="mr-2"--}}
{{--                                                       alt="">Blood Pressure : 250</li>--}}
{{--                                <li class="sugar"><img src="../assets/img/icons/sugar.svg" class="mr-2"--}}
{{--                                                       alt="">Blood Sugar : 250</li>--}}
{{--                                <li class="caregiver" data-container="body" data-toggle="popover"--}}
{{--                                    data-placement="top"--}}
{{--                                    data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">--}}
{{--                                    <img src="../assets/img/icons/caregiver.svg" class="mr-2"--}}
{{--                                         alt="">Caregiver :&nbsp;<a title="8866246684"--}}
{{--                                                                    href="javascript:void(0)" class="secondary_tel">Akshita</a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                        <div class="_rside">--}}
{{--                            <ul class="actionBar">--}}
{{--                                <li>--}}
{{--                                    <div class="search-clinician">--}}
{{--                                        <input type="text" class="form-control clinician" name="animal"--}}
{{--                                               id="searchField" placeholder="Assign Manually">--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <button type="button" class="btn btn-start-call">Start--}}
{{--                                        Call<span></span></button>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <button type="button"--}}
{{--                                            onclick="window.location.href = 'broadcast_send_message.html'"--}}
{{--                                            class="btn btn-broadcast">Broadcast<span></span></button>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <button type="button" class="btn btn-emergency">emergency--}}
{{--                                        (911)<span></span></button>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </li>--}}
{{--        <li class="mt-3">--}}
{{--            <span class="badge rounded-pill bg-danger _ccm">C</span>--}}
{{--            <div class="app-card app-card-broadcast raduis_5">--}}
{{--                <div class="app-broadcasting">--}}
{{--                    <div class="lside">--}}
{{--                        <div>--}}
{{--                            <img src="../assets/img/user/01.png" class="user_photo" alt=""--}}
{{--                                 srcset="../assets/img/user/01.png">--}}
{{--                        </div>--}}
{{--                        <div class="content">--}}
{{--                            <h1 class="_t11">--}}
{{--                                <a href="javascript:void(0)">--}}
{{--                                    Shashikant Parmar--}}
{{--                                </a>--}}
{{--                                <span class="contact"><a href="tel:8866246684" class="secondary_tel"></a>--}}
{{--                                            </span>--}}
{{--                            </h1>--}}
{{--                            <p class="address">1797 Pitkin Avenue Brooklyn,--}}
{{--                                NY 11212</p>--}}
{{--                            <p class="emergency_contact mb-2 d-none"> Emergency Contact--}}
{{--                                <a href="tel:9966246684" class="primary_tel d-none">9966246684</a>--}}
{{--                            </p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="rside">--}}
{{--                        <div class="_lside">--}}
{{--                            <ul class="specification">--}}
{{--                                <li class="blood"><img src="../assets/img/icons/pressure.svg" class="mr-2"--}}
{{--                                                       alt="">Blood Pressure : 250</li>--}}
{{--                                <li class="sugar"><img src="../assets/img/icons/sugar.svg" class="mr-2"--}}
{{--                                                       alt="">Blood Sugar : 250</li>--}}
{{--                                <li class="caregiver" data-container="body" data-toggle="popover"--}}
{{--                                    data-placement="top"--}}
{{--                                    data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">--}}
{{--                                    <img src="../assets/img/icons/caregiver.svg" class="mr-2"--}}
{{--                                         alt="">Caregiver :&nbsp;<a title="8866246684"--}}
{{--                                                                    href="javascript:void(0)" class="secondary_tel">Akshita</a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                        <div class="_rside">--}}
{{--                            <ul class="actionBar">--}}
{{--                                <li>--}}
{{--                                    <div class="search-clinician">--}}
{{--                                        <input type="text" class="form-control clinician" name="animal"--}}
{{--                                               id="searchField" placeholder="Assign Manually">--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <button type="button" class="btn btn-start-call">Start--}}
{{--                                        Call<span></span></button>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <button type="button"--}}
{{--                                            onclick="window.location.href = 'broadcast_send_message.html'"--}}
{{--                                            class="btn btn-broadcast">Broadcast<span></span></button>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <button type="button" class="btn btn-emergency">emergency--}}
{{--                                        (911)<span></span></button>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </li>--}}
    </ul>
{{--    <ul>--}}
{{--        @if(count($patientRequestList)>0)--}}
{{--            @foreach($patientRequestList as $key=>$value)--}}
{{--                <li>--}}
{{--                    <div class="app-card raduis_5 mb-2">--}}
{{--                        <div class="app-broadcasting">--}}
{{--                            <div class="lside">--}}
{{--                                <div>--}}
{{--                                    <img src="{{ asset('assets/img/user/01.png') }}" class="user_photo" alt=""--}}
{{--                                         srcset="{{ asset('assets/img/user/01.png') }}">--}}
{{--                                </div>--}}
{{--                                <div class="content">--}}
{{--                                    <h1 class="_t11">{!! $value->detail->first_name !!} {!! $value->detail->last_name !!} </h1>--}}
{{--                                    <p class="address">{!! !empty($value->patient_detail) ?!empty($value->patient_detail->address1)?$value->patient_detail->address1:'-':'' !!}</p>--}}
{{--                                    <p class="emergency_contact mb-2"> Emergency Contact--}}
{{--                                        <a href="tel:9966246684" class="primary_tel">{!! $value->detail->phone !!}</a></p>--}}
{{--                                    <p class="contact"><a href="tel:8866246684" class="secondary_tel">{!! $value->detail->phone !!}</a>--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                                <!-- <a href="javascript:void(0)"><i class="las la-ellipsis-v la-2x"></i></a> -->--}}
{{--                                <div id="_dropdown">--}}
{{--                                    <div class="dropdown user-dropdown">--}}
{{--                                        <a class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown"--}}
{{--                                           aria-haspopup="true" aria-expanded="false" href="javascript:void(0)"><i--}}
{{--                                                class="las la-ellipsis-v la-2x"></i></a>--}}
{{--                                        <div class="dropdown-menu shadow" aria-labelledby="dropdownMenuButton">--}}
{{--                                            <a class="dropdown-item" href="#">View Profile</a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            @if(count($value->ccrm)>0)--}}
{{--                            <div class="rside">--}}
{{--                                <div class="_lside">--}}
{{--                                    <ul class="specification">--}}
{{--                                            @foreach($value->ccrm as $ckey=>$cvalue)--}}
{{--                                                <li class="blood">--}}
{{--                                                    <img src="{{ asset('assets/img/icons/pressure.svg') }}"--}}
{{--                                                         class="mr-2" alt="">--}}
{{--                                                        {!! $cvalue->reading_type !!} : {!! $cvalue->reading_value !!}--}}
{{--                                                </li>--}}
{{--                                            @endforeach--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                                @endif--}}
{{--                                <div class="_rside">--}}
{{--                                    <ul class="actionBar">--}}
{{--                                        <li>--}}
{{--                                            <div class="search-clinician">--}}
{{--                                                <input type="text" class="form-control clinician" name="animal"--}}
{{--                                                       id="searchField" placeholder="Assign Manually">--}}
{{--                                            </div>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <button type="button" class="btn btn-start-call">Start--}}
{{--                                                Call<span></span></button>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            @if($value->clincial_id===null)--}}
{{--                                                <a href="{{ route('clinician.start.roadl',['patient_request_id'=>$value->id]) }}" class="btn btn-start-call">Start BroadCast<span></span></a>--}}
{{--                                            @elseif($value->status==='complete')--}}
{{--                                                <a  class="btn btn-start-call">Running BroadCast<span></span></a>--}}
{{--                                            @else--}}
{{--                                                <a href="{{ route('clinician.start.running',['patient_request_id'=>$value->id]) }}" class="btn btn-start-call">Running BroadCast<span></span></a>--}}
{{--                                            @endif--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <button type="button" class="btn btn-emergency">emergency--}}
{{--                                                (911)<span></span></button>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--            @endforeach--}}
{{--        @endif--}}
{{--    </ul>--}}
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
