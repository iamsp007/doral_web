@extends('pages.layouts.app')

@section('title','Patient RoadL Request')
@section('pageTitleSection','Roadl')
@section('upload-btn')
    <div class="d-flex">
        <select class="form-control" name="filter" id="filter">
            <option value="latest" {{ request()->type==="latest"?"selected":"" }}>Last Hour</option>
            <option value="pending" {{ request()->type==="pending"?"selected":"" }}>Pending</option>
            <option value="running" {{ request()->type==="running"?"selected":"" }}>Running</option>
            <option value="complete" {{ request()->type==="complete"?"selected":"" }}>Complete</option>
        </select>
    </div>

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
                                        @if(isset($value->patient_detail->detail->address_1) && !empty($value->patient_detail->detail->address_1))
                                            {{ $value->patient_detail->detail->address_1 }}
                                        @elseif(isset($value->patient_detail->detail->address_2) && !empty($value->patient_detail->detail->address_2))
                                            {{ $value->patient_detail->detail->address_2 }}
                                        @elseif(isset($value->patient_detail->detail->address_latlng) && !empty($value->patient_detail->detail->address_latlng))
                                            {{ 'latitude : '.$value->patient_detail->detail->address_latlng->lat.', longitude : '.$value->patient_detail->detail->address_latlng->lng }}
                                        @else
                                            {{ 'latitude : '.$value->patient_detail->latitude.'  ,  longitude :'.$value->patient_detail->longitude }}
                                        @endif
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
                                                    <li class="sugar"><img src="{{ asset('assets/img/icons/sugar.svg') }}" class="mr-2" alt="">Blood Sugar : {{ $cvalue->reading_value }}</li>
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
                                        @if(isset($value->patient_detail->detail->referral) && !empty($value->patient_detail->detail->referral))
                                            <li>
                                                <ul class="specification">
                                                    <li class="referralCompany"><img src="{{ asset('assets/img/icons/sugar.svg') }}" class="mr-2" alt="">Referral Company:&nbsp;&nbsp;<span>{{ $value->patient_detail->detail->referral->name }}</span></li>
                                                    <li class="referralCompany"><img src="{{ asset('assets/img/icons/sugar.svg') }}" class="mr-2" alt="">Request Type:&nbsp;&nbsp;<span>{{ isset($value->appointment_type->referral_type)?$value->appointment_type->referral_type:'Default' }}</span></li>
                                                </ul>
                                            </li>
                                        @else
                                            <li>
                                                <ul class="specification">
                                                    <li class="referralCompany"><img src="{{ asset('assets/img/icons/sugar.svg') }}" class="mr-2" alt="">Referral Company:&nbsp;&nbsp;<span>Doral</span></li>
                                                    <li class="referralCompany"><img src="{{ asset('assets/img/icons/sugar.svg') }}" class="mr-2" alt="">Request Type:&nbsp;&nbsp;<span>{{ isset($value->appointment_type->referral_type)?$value->appointment_type->referral_type:'Default' }}</span></li>
                                                </ul>
                                            </li>
                                        @endif

                                            <li>
                                                <button type="button"
                                                    onclick="window.location.href = '{{ route('start.call',['patient_request_id'=>$value->id]) }}'"
                                                    class="btn btn-start-call ml-5">Start
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
        @else
            <li>
                <h1>No Roadl Request Found</h1>
            </li>
        @endif

    </ul>
@endsection

@push('styles')
    <style>
        .app .app-content .app-body .app-broadcasting .rside ._lside {width: 300px;}
        .app .app-content .app-body .app-broadcasting .rside .specification li.referralCompany{color: #000;font-weight: 600;}
        .app .app-content .app-body .app-broadcasting .rside .specification li.referralCompany span{color: #006c76;font-weight: 600;}
    </style>
@endpush

@push('scripts')
    <script src="{{ asset('js/clincian/app.clinician.broadcast.js') }}"></script>
    <script>
        var patientRequestList='{{ route('clinician.roadl.patientRequestList') }}';
        $('#filter').on('change',function (event) {
            event.preventDefault();
            window.location.href='{{ url("/clinician/roadl/") }}'+'?type='+event.target.value;
            console.log(event.target.value)
        })
    </script>
    <!--<script src="{{ asset('js/clincian/roadl.js') }}"></script>-->
@endpush

