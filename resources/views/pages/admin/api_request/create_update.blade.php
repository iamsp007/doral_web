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
            
                var url = "@if(!isset($software)){{ Route('software.store') }} @else {{ Route('software.update',[$software->id]) }} @endif";
             
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
                                location.href = "{{ Route('software.index') }}";
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
                                        $("#dynamic_field").append('<tr><td><input type="text" name="authentication_field[]" placeholder="'+value+'" class="form-control name_list" value=""/></td></tr>');
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
                                        $("#dynamic_search_field").append('<tr><td><input type="text" name="field[]" placeholder="'+value+'" class="form-control name_list" value=""/></td></tr>');
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
                   $('.day-of-week').html('<div class="custom-control custom-checkbox"><input type="checkbox" id="monday" name="monday" class="custom-control-input"><label class="custom-control-label" for="monday">Monday</label></div><div class="custom-control custom-checkbox"><input type="checkbox" id="tuesday" name="tuesday" class="custom-control-input"><label class="custom-control-label" for="tuesday">Tuesday</label></div><div class="custom-control custom-checkbox"><input type="checkbox" id="wednesday" name="wednesday" class="custom-control-input"><label class="custom-control-label" for="wednesday">Wednesday</label></div><div class="custom-control custom-checkbox"><input type="checkbox" id="thursday" name="thursday" class="custom-control-input"><label class="custom-control-label" for="thursday">Thursday</label></div><div class="custom-control custom-checkbox"><input type="checkbox" id="friday" name="friday" class="custom-control-input"><label class="custom-control-label" for="friday">Friday</label></div><div class="custom-control custom-checkbox"><input type="checkbox" id="saturday" name="saturday" class="custom-control-input"><label class="custom-control-label" for="saturday">Saturday</label></div><div class="custom-control custom-checkbox"><input type="checkbox" id="sunday" name="sunday" class="custom-control-input"><label class="custom-control-label" for="sunday">Sunday</label></div>');
                } else if (this.value == '3') {
                    $('.day-of-week').html('<div class="add_more_field"><table class="table table-bordered" id="dynamic_field"><tr><td>'+picker+'</td><td><button type="button" name="add" id="addMore" class="btn btn-success">Add More</button></td></tr></table></div>'); 
                } else if (this.value == '4') {
                    $('.day-of-week').html('<div class="custom-control custom-checkbox"><input type="checkbox" id="january" name="january" class="custom-control-input"><label class="custom-control-label" for="january">January</label></div><div class="custom-control custom-checkbox"><input type="checkbox" id="february" name="february" class="custom-control-input"><label class="custom-control-label" for="february">February</label></div><div class="custom-control custom-checkbox"><input type="checkbox" id="march" name="march" class="custom-control-input"><label class="custom-control-label" for="march">March</label></div><div class="custom-control custom-checkbox"><input type="checkbox" id="april" name="april" class="custom-control-input"><label class="custom-control-label" for="april">April</label></div><div class="custom-control custom-checkbox"><input type="checkbox" id="may" name="may" class="custom-control-input"><label class="custom-control-label" for="may">May</label></div><div class="custom-control custom-checkbox"><input type="checkbox" id="june" name="june" class="custom-control-input"><label class="custom-control-label" for="june">June</label></div><div class="custom-control custom-checkbox"><input type="checkbox" id="july" name="july" class="custom-control-input"><label class="custom-control-label" for="july">July</label></div><div class="custom-control custom-checkbox"><input type="checkbox" id="august" name="august" class="custom-control-input"><label class="custom-control-label" for="august">August</label></div><div class="custom-control custom-checkbox"><input type="checkbox" id="september" name="september" class="custom-control-input"><label class="custom-control-label" for="september">September</label></div><div class="custom-control custom-checkbox"><input type="checkbox" id="october" name="october" class="custom-control-input"><label class="custom-control-label" for="october">October</label></div><div class="custom-control custom-checkbox"><input type="checkbox" id="november" name="november" class="custom-control-input"><label class="custom-control-label" for="november">November</label></div><div class="custom-control custom-checkbox"><input type="checkbox" id="december" name="december" class="custom-control-input"><label class="custom-control-label" for="december">December</label></div>')
                }   
                else {
                    $('.day-of-week').html('');
                }
            });
         
            $('input[name="date"]').on('apply.daterangepicker', function(ev, picker) {
                alert();
            // $(this).val(picker.startDate.format('MM-DD-YYYY'));
            });

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
