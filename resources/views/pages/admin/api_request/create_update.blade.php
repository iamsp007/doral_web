@extends('pages.layouts.app')
@section('title','Admin - Add Software')
@section('pageTitleSection')
Create a new software
@endsection
@section('content')
<div class="row">
    <div class="col-12 col-sm-4"></div>
    <div class="col-12 col-sm-4">
        <div class="row mt-3">
            <div class="col-12">
                <div class="app-card" id="AdministratorInfo">
                  
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <form id="software_form">
                                    @csrf
                                    <ul class="form-data">
                                        <li>
                                            <h3 class="_title">Api Request</h3>
                                            <select class="form-control" name="api_request" id="api_request">
                                                <option>Select a api request</option>
                                                <option value="1">Automatically</option>
                                                <option value="2">Manually</option>
                                            </select>
                                        </li>
                                        <li>
                                            <h3 class="_title">Software</h3>
                                            <select name="software_id" id="software_id" class="form-control m-input m-input--air">
                                                <option value="default">Select a software</option>
                                            </select>
                                        </li>
                                        <li class="auth-field" style="display:none;">
                                            <label class="label">Authentication Field</label>
                                            <div class="add_more_field">
                                                <table class="table table-bordered" id="dynamic_field"> 
                                                </table> 
                                            </div>
                                        </li>
                                        <li>
                                            <label class="label">Api</label>
                                            <select class="form-control" name="api_id" id="api_id">
                                                <option value="default">Select a api</option>
                                            </select>
                                        </li>
                                        <li class="search-field" style="display:none;">
                                            <label class="label">Search Field</label>
                                            <div class="add_more_field">
                                                <table class="table table-bordered" id="dynamic_search_field"> 
                                                </table> 
                                            </div>
                                        </li>
                                        <li>
                                            <label class="label">Schedule</label>
                                            <div class="d-flex">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="daily" name="schedule" class="custom-control-input" value="1">
                                                    <label class="custom-control-label" for="daily">Daily</label>
                                                </div>
                                                <div class="custom-control custom-radio ml-2">
                                                    <input type="radio" id="weekly" name="schedule" class="custom-control-input" value="2">
                                                    <label class="custom-control-label" for="weekly">Weekly</label>
                                                </div>
                                                <div class="custom-control custom-radio ml-2">
                                                    <input type="radio" id="monthly" name="schedule" class="custom-control-input" value="3">
                                                    <label class="custom-control-label" for="monthly">Monthly</label>
                                                </div>
                                                <div class="custom-control custom-radio ml-2">
                                                    <input type="radio" id="quarterly" name="schedule" class="custom-control-input" value="4">
                                                    <label class="custom-control-label" for="quarterly">Quarterly</label>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="day-of-week">
                                           
                                        </li>
                                        <li>
                                            @if(isset($software))
                                                <input type="hidden" name="_method" value="PUT" class="put_method"/>
                                                <button type="submit" id="add" class="btn btn-primary">Update Software</button>
                                            @else
                                                <button type="submit" id="add" class="btn btn-primary">Add Software</button>
                                            @endif
                                            <!-- <a href="{{ route('referral.edit-profile') }}" class="btn btn-secondary" >Cancel</a> -->
                                        </li>
                                    </ul> 
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </div>
   <div class="col-12 col-sm-4"></div>
</div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function (argument) {
            
            /*Store locker*/
            $("#add").click(function (e) {
                e.preventDefault();
            
                var url = "{{ Route('api-request.store') }}";
             
                var fdata = new FormData($("#software_form")[0]);
                
                $.ajax({
                    "type":"POST", 
                    "url":url,
                    "data": fdata,
                    headers: {
                        'X_CSRF_TOKEN': '{{ csrf_token() }}',
                    },
                    contentType: false,
                    processData: false,
                    "success":function (data) {
                      
                        if(data.status == 200) {
                            alertText(data.message,'success')
                            setTimeout(function () {
                                location.href = "{{ Route('api-request.index') }}";
                            },2000);
                        } else {
                            alertText(data.message,'error')
                        }
                    },
                    "error":function () {
                        alertText('Something went wrong','error')
                    }
                });
            });

            $(document).on('change', '#api_request', function () {
                var temp = $(this);
                var request_type_is = temp.val();
            
                if (request_type_is == 1) {
                    $.ajax({
                        type: "GET",
                        url: "{{route('referral.get-software')}}",
                        dataType: "JSON",
                        success: function (data) {
                            $("#software_id").html('<option value="default">Select a software</option>');
                            if (data.status == 200) {
                                if (data.result != '') {
                                    $.each(data.result, function (key, value) {
                                        var id = value['id'];
                                        var name = value['name'];
                                        $("#software_id").append('<option value="' + id + '">' + name + '</option>');
                                    });
                                }
                            }
                        },
                    });
                }
            });

            $(document).on('change', '#software_id', function () {
                var temp = $(this);
                var request_type_is = temp.val();
            
                if (request_type_is == 1) {
                    $.ajax({
                        type: "GET",
                        url: "{{url('referral/api')}}/"+request_type_is,
                        dataType: "JSON",
                        success: function (data) {
                            $("#api_id").html('<option value="default">Select a api</option>');
                            
                            if (data.status == 200) {
                                if (data.result != '') {
                                    $.each(data.result, function (key, value) {
                                        var id = value['id'];
                                        var name = value['name'];
                                        $("#api_id").append('<option value="' + id + '">' + name + '</option>');
                                    });
                                }
                                if (data.authnticationField != '') {
                                    $(".auth-field").css({"display" : "block"});
                                    $.each(data.authnticationField, function (key, value) {
                                        var name = value['authentication_field']['name'];
                                    
                                        $.each(value['authentication_field']['label'], function (key, value) {
                                            $("#dynamic_field").append('<tr><td><input type="text" name="authentication_field['+name[key]+']" placeholder="'+value+'" class="form-control name_list" value=""/></td></tr>');
                                        });
                                    });
                                }
                            }
                        },
                    });
                }
            });

            $(document).on('change', '#api_id', function () {
                var temp = $(this);
                var request_type_is = temp.val();
            
                if (request_type_is == 1) {
                    $.ajax({
                        type: "GET",
                        url: "{{url('referral/get-field')}}/"+request_type_is,
                        dataType: "JSON",
                        success: function (data) {
                            if (data.status == 200) {
                                if (data.result != '') {
                                    $(".search-field").css({"display" : "block"});
                                    $.each(data.result, function (key, value) {
                                        var name = value['field']['name'];

                                        $.each(value['field']['label'], function (key, value) {
                                            $("#dynamic_search_field").append('<tr><td><input type="text" name="search_field['+name[key]+']" placeholder="'+value+'" class="form-control name_list" value=""/></td></tr>');
                                        });
                                    });
                                }
                            }
                        },
                    });
                }
            });
           
            $(document).on('change', 'input[type=radio][name=schedule]', function () {
                var picker = $("<input/>", {
                type: 'text',
                id: 'date',
                name: 'date',
                class: 'form-control',
                value: ''
                }).daterangepicker({
                    singleDatePicker: true,
                });

                if (this.value == '2') {
                   $('.day-of-week').html('<div class="custom-control custom-checkbox"><input type="checkbox" id="monday" name="extra_schedule[]" class="custom-control-input" value="monday"><label class="custom-control-label" for="monday">Monday</label></div><div class="custom-control custom-checkbox"><input type="checkbox" id="tuesday" name="extra_schedule[]" class="custom-control-input" value="tuesday"><label class="custom-control-label" for="tuesday">Tuesday</label></div><div class="custom-control custom-checkbox"><input type="checkbox" id="wednesday" name="extra_schedule[]" class="custom-control-input" value="wednesday"><label class="custom-control-label" for="wednesday">Wednesday</label></div><div class="custom-control custom-checkbox"><input type="checkbox" id="thursday" name="extra_schedule[]" class="custom-control-input" value="thursday"><label class="custom-control-label" for="thursday">Thursday</label></div><div class="custom-control custom-checkbox"><input type="checkbox" id="friday" name="extra_schedule[]" class="custom-control-input" value="friday"><label class="custom-control-label" for="friday">Friday</label></div><div class="custom-control custom-checkbox"><input type="checkbox" id="saturday" name="extra_schedule[]" class="custom-control-input" value="saturday"><label class="custom-control-label" for="saturday">Saturday</label></div><div class="custom-control custom-checkbox"><input type="checkbox" id="sunday" name="extra_schedule[]" class="custom-control-input" value="sunday"><label class="custom-control-label" for="sunday">Sunday</label></div>');
                } else if (this.value == '3') {
                    // $('.day-of-week').html(picker);
                     $('.day-of-week').append('<h3 class="_title">Date</h3><select class="form-control" name="extra_schedule[]" id="extra_schedule_day" multiple><option>Select a date</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option></select>');
                } else if (this.value == '4') {
                    // $('.day-of-week').html('<div class="custom-control custom-checkbox"><input type="checkbox" id="january" name="extra_schedule[]" class="custom-control-input" value="january"><label class="custom-control-label" for="january">January</label></div><div class="custom-control custom-checkbox"><input type="checkbox" id="february" name="extra_schedule[]" class="custom-control-input" value="february"><label class="custom-control-label" for="february">February</label></div><div class="custom-control custom-checkbox"><input type="checkbox" id="march" name="extra_schedule[]" class="custom-control-input" value="march"><label class="custom-control-label" for="march">March</label></div><div class="custom-control custom-checkbox"><input type="checkbox" id="april" name="extra_schedule[]" class="custom-control-input" value="april"><label class="custom-control-label" for="april">April</label></div><div class="custom-control custom-checkbox"><input type="checkbox" id="may" name="extra_schedule[]" class="custom-control-input" value="may"><label class="custom-control-label" for="may">May</label></div><div class="custom-control custom-checkbox"><input type="checkbox" id="june" name="extra_schedule[]" class="custom-control-input" value="june"><label class="custom-control-label" for="june">June</label></div><div class="custom-control custom-checkbox"><input type="checkbox" id="july" name="extra_schedule[]" class="custom-control-input" value="july"><label class="custom-control-label" for="july">July</label></div><div class="custom-control custom-checkbox"><input type="checkbox" id="august" name="extra_schedule[]" class="custom-control-input" value="august"><label class="custom-control-label" for="august">August</label></div><div class="custom-control custom-checkbox"><input type="checkbox" id="september" name="extra_schedule[]" class="custom-control-input" value="september"><label class="custom-control-label" for="september">September</label></div><div class="custom-control custom-checkbox"><input type="checkbox" id="october" name="extra_schedule[]" class="custom-control-input" value="october"><label class="custom-control-label" for="october">October</label></div><div class="custom-control custom-checkbox"><input type="checkbox" id="november" name="extra_schedule[]" class="custom-control-input" value="november"><label class="custom-control-label" for="november">November</label></div><div class="custom-control custom-checkbox"><input type="checkbox" id="december" name="extra_schedule[]" class="custom-control-input" value="december"><label class="custom-control-label" for="december">December</label></div>')
                }   
                else {
                    $('.day-of-week').html('');
                }
            });
            // $(".day-of-week").on("input[name='date']").daterangepicker({
                // singleDatePicker: true,
            // });
            // var i=1;  
            // $(".day-of-week").on("click", "button.addMore", function(){
            // i++;  
            // $('.day-of-week').append(picker);
            // $('.day-of-week').append('<input type="text" id="date" name="date" class="form-control" value=""><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button>');  
            //});
            // $('input[name="date"]').on('apply.daterangepicker', function(ev, picker) {
            //     alert();
            // });
        });

        function alertText(text,status) {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: status,
                title: text
            })
        }
    </script>
@endpush
