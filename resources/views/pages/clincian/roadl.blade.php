@extends('pages.layouts.app')
@section('title','Patient RoadL Request')
@section('pageTitleSection','Roadl')
@section('upload-btn')
    <div class="d-flex">
        <select class="form-control" name="filter" id="filter">
            <option value="0" {{ request()->type==="0"?"selected":"" }}>All</option>
            <option value="1" {{ request()->type==="1"?"selected":"" }}>Pending</option>
            <option value="2" {{ request()->type==="2"?"selected":"" }}>Accepted</option>
            <option value="3" {{ request()->type==="3"?"selected":"" }}>Arrive</option>
            <option value="4" {{ request()->type==="4"?"selected":"" }}>Complete</option>
            <option value="5" {{ request()->type==="5"?"selected":"" }}>Cancel</option>
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
                                        <a href="{{ route('patient.details',['patient_id'=>$value->patient_detail->id]) }}">
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
                                                    <li class="referralCompany"><img src="{{ asset('assets/img/icons/sugar.svg') }}" class="mr-2" alt="">Request Type:&nbsp;&nbsp;<span>{{ isset($value->request_type->name)?$value->request_type->name:'Default' }}</span></li>
                                                </ul>
                                            </li>
                                        @else
                                            <li>
                                                <ul class="specification">
                                                    <li class="referralCompany"><img src="{{ asset('assets/img/icons/sugar.svg') }}" class="mr-2" alt="">Referral Company:&nbsp;&nbsp;<span>Doral</span></li>
                                                    <li class="referralCompany"><img src="{{ asset('assets/img/icons/sugar.svg') }}" class="mr-2" alt="">Request Type:&nbsp;&nbsp;<span>{{ isset($value->request_type->name)?$value->request_type->name:'Default' }}</span></li>
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
                                                    <button class="btn btn-broadcast btn-block" type="button" data-toggle="collapse" data-target="#collapseExample{{ $key }}" aria-expanded="false" aria-controls="collapseExample">
                                                        BroadCast <span></span>
                                                    </button>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="collapse" id="collapseExample{{ $key }}">
                        @foreach($value->requests as $rkey=>$rval)
                            <div class="row mt-3">
                                <div class="col-9">
                                    <div class="col-3">
                                        <span>Name : {{ isset($rval->detail->first_name)?$rval->detail->first_name:'Not Accepted' }}</span>
                                    </div>
                                    <div class="col-3">
                                        <span>Service Type : {{ isset($rval->request_type)?$rval->request_type->name:'Default' }}</span>
                                    </div>
                                    <div class="col-3">
                                        <span>Status : {{ isset($rval->status)?$rval->status:'Default' }}</span>
                                    </div>
                                </div>
                                <div class="col-3">
                                    @if($rval->status==='active')
                                        <button type="button"
                                                onclick="window.location.href = '{{ route('clinician.start.roadl',['patient_request_id'=>$rval->id]) }}'"
                                                {{--                                                            onclick="sendLocation(1,'sdfdsfds')"--}}
                                                class="btn btn-broadcast btn-block ">Pending<span></span>
                                        </button>
                                    @elseif($rval->status==='accept')
                                        <button type="button"
                                                onclick="window.location.href = '{{ route('clinician.start.running',['patient_request_id'=>$rval->parent_id]) }}'"
                                                class="btn btn-broadcast">Accepted<span></span>
                                        </button>
                                    @elseif($rval->status==='prepare')
                                        <button type="button"
                                                onclick="window.location.href = '{{ route('clinician.start.running',['patient_request_id'=>$rval->parent_id]) }}'"
                                                class="btn btn-broadcast">Prepare Time : {{ $rval->prepare_time }}<span></span>
                                        </button>
                                    @elseif($rval->status==='start')
                                        <button type="button"
                                                onclick="window.location.href = '{{ route('clinician.start.running',['patient_request_id'=>$rval->parent_id]) }}'"
                                                class="btn btn-broadcast">On The Way<span></span>
                                        </button>
                                    @elseif($rval->status==='arrive')
                                        <button type="button"
                                                onclick="window.location.href = '{{ route('clinician.start.running',['patient_request_id'=>$rval->parent_id]) }}'"
                                                class="btn btn-broadcast">Arrived<span></span>
                                        </button>
                                    @elseif($rval->status==='complete')
                                        <button type="button"
                                                class="btn btn-broadcast">Complete<span></span>
                                        </button>
                                    @elseif($rval->status==='cancel')
                                        <button type="button"
                                                class="btn btn-broadcast btn-danger">Cancel<span></span>
                                        </button>
                                    @else
                                        <button type="button"
                                                class="btn btn-broadcast btn-info">Pending<span></span>
                                        </button>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                            <button type="button" onclick="onBroadCastOpen({{ $value->patient_detail->id }})"
                                    class="btn btn-broadcast btn-info">Add New Request <span></span>
                            </button>
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
    <script>
        var patientRequestList='{{ route('clinician.roadl.patientRequestList') }}';
        $('#filter').on('change',function (event) {
            event.preventDefault();
            window.location.href='{{ url("/clinician/roadl/") }}'+'?type='+event.target.value;
        })
    </script>
@endpush
