@extends('pages.clincian.layouts.app')

@section('title','Patient RoadL Request')
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
                                    <p class="address">{!! !empty($value->patientDetail)?$value->patientDetail->address1:'' !!}</p>
                                    <p class="emergency_contact mb-2"> Emergency Contact
                                        <a href="tel:9966246684" class="primary_tel">{!! !empty($value->patientDetail)?$value->patientDetail->emg_phone:'' !!}</a></p>
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
                                            @if($value->clincial_id===null)
                                                <a href="{{ route('clinician.start.roadl',['patient_request_id'=>$value->id]) }}" class="btn btn-start-call">Start BroadCast<span></span></a>
                                            @elseif($value->status==='complete')
{{--                                                <a  class="btn btn-start-call">Running BroadCast<span></span></a>--}}
                                            @else
                                                <a href="{{ route('clinician.start.running',['patient_request_id'=>$value->id]) }}" class="btn btn-start-call">Running BroadCast<span></span></a>
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
    </ul>
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
