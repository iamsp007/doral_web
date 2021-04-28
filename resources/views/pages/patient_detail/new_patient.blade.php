@extends('pages.layouts.app')

@section('title','Patient Detail')
@section('pageTitleSection')
    {{ ucwords(str_replace("-"," ",$serviceStatus)) }} - Patient
@endsection
@push('styles')
<style type="text/css">
table.dataTable thead th, table.dataTable thead td{
    padding: 10px !important;
}
</style>
@endpush
@hasrole('referral')
    @section('upload-btn')
        @if (request()->segment(count(request()->segments())) == "occupational-health")
            <div class="d-flex">
                <a href="{{ url('referral/service/initial') }}" class="bulk-upload-btn">
                    <img src="{{ asset('assets/img/icons/bulk-upload-icon.svg') }}" class="icon mr-2" />
                    Pending Patients</a>
                <a href="{{ route('referral.occupational-health-upload-bulk-data') }}" class="bulk-upload-btn" style="margin-left: 10px;">
                    <img src="{{ asset('assets/img/icons/bulk-upload-icon.svg') }}" class="icon mr-2" />
                    Import Patients</a>
                <a href="javascript:void(0)" class="bulk-upload-btn autoImportPatient" data-url="import-caregiver-from-hha">
                    <img src="{{ asset('assets/img/icons/bulk-upload-icon.svg') }}" class="icon mr-2" />
                    Auto Import</a>
            </div>
        @elseif (request()->segment(count(request()->segments())) == "initial")
            <div class="d-flex">
                <a href="{{ url('referral/service/occupational-health') }}" class="bulk-upload-btn">
                    <img src="{{ asset('assets/img/icons/bulk-upload-icon.svg') }}" class="icon mr-2" />
                    ACTIVE Patients</a>
                <a href="{{ route('referral.occupational-health-upload-bulk-data') }}" class="bulk-upload-btn" style="margin-left: 10px;">
                    <img src="{{ asset('assets/img/icons/bulk-upload-icon.svg') }}" class="icon mr-2" />
                    Import Patients</a>
            </div>
        @elseif (request()->segment(count(request()->segments())) == "occupational-health-upload-bulk-data")
            <div class="d-flex">
                <a href="{{ url('referral/service/initial') }}" class="bulk-upload-btn">
                    <img src="{{ asset('assets/img/icons/bulk-upload-icon.svg') }}" class="icon mr-2" />
                    Pending Patients</a>
                <a href="{{ url('referral/service/occupational-health') }}" class="bulk-upload-btn">
                    <img src="{{ asset('assets/img/icons/bulk-upload-icon.svg') }}" class="icon mr-2" />
                    ACTIVE Patients</a>
                  
            </div>
        @elseif (request()->segment(count(request()->segments())) == "covid-19")
            <div class="d-flex">
                <a href="{{ url('search-caregivers') }}" class="bulk-upload-btn">
                        <img src="{{ asset('assets/img/icons/bulk-upload-icon.svg') }}" class="icon mr-2" />
                        Pending Patients</a>
                <a href="{{ route('referral.covid-19') }}" class="bulk-upload-btn" style="margin-left: 10px;"><img src="{{ asset('assets/img/icons/bulk-upload-icon.svg') }}" class="icon mr-2" />
                        Import Patients</a>
            </div>
        @elseif (request()->segment(count(request()->segments())) == "md-order")
            <div class="d-flex">
                <a href="{{ url('referral/service/initial') }}" class="bulk-upload-btn">
                    <img src="{{ asset('assets/img/icons/bulk-upload-icon.svg') }}" class="icon mr-2" />
                    Pending Patients</a>
                    <!-- {{ url('hha-exchange') }} -->
                    <a href="javascript:void(0)" class="bulk-upload-btn autoImportPatient" data-url="import-patient-from-hha">
                    <img src="{{ asset('assets/img/icons/bulk-upload-icon.svg') }}" class="icon mr-2" />
                    Auto Import</a>
            </div>
        @endif
    @endsection
@endrole

@section('content')
    @if(!$serviceStatus)
        <form id="search_form" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <div class="row">
                    <div class="col-3 col-sm-3 col-md-3">
                        <div class="input-group">
                            <select name="status" id="status" class="form-control form-control-lg">
                                <option value="">Select a status</option>
                                @foreach (config('select.userStatus') as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-3 col-sm-3 col-md-3">
                        <div class="input-group">
                            <x-text name="lab_due_date" class="lab_due_date" id="lab_due_date" placeholder="Due Date"/></td>
                        </div>
                    </div>
                    <div class="col-3 col-sm-3 col-md-3">
                        <div class="input-group">
                            <select class="user_name form-control select2_dropdown" id="user_name" name="user_name"></select>
                        </div>
                    </div>
                    <div class="col-3 col-sm-3 col-md-3">
                        <select class="form-control" name="service_id" id="service_id">
                            <option value="">Select service</option>
                            <option value="1">VBC</option>
                            <option value="2">MD Order</option>
                            <option value="3">Occupational Health</option>
                            <option value="6">Covid-19</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-3 col-sm-3 col-md-3">
                        <select class="form-control" name="gender" id="gender">
                            <option value="">Select gender</option>
                            <option value="1">Male</option>
                            <option value="2">Female</option>
                            <option value="3">Other</option>
                        </select>
                    </div>
                    <div class="col-3 col-sm-3 col-md-3">
                        <input type="text" class="form-control" name="dob" id="dob" placeholder="DOB">
                    </div>
                    <div class="col-3 col-sm-3 col-md-3">
                        <button class="btn btn-primary" type="button" id="filter_btn">Apply</button>
                        <button class="btn btn-primary reset_btn" type="button" id="reset_btn">Reset</button>
                    </div>
                </div>
            </div>
        </form>
    @elseif($serviceStatus === 'covid-19')
        <form id="search_form" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <div class="row">
                    <div class="col-3 col-sm-3 col-md-3">
                        <div class="input-group">
                        <input type="zip_code" class="form-control" name="zip_code" id="zip_code" placeholder="Zipcode">
                        </div>
                    </div>
                    <div class="col-3 col-sm-3 col-md-3">
                        <button class="btn btn-primary" type="button" id="filter_btn">Apply</button>
                        <button class="btn btn-primary reset_btn" type="button" id="reset_btn">Reset</button>
                    </div>
                </div>
            </div>
        </form>
    @endif
    <div class="button-control mt-4 mb-4" id="acceptRejectBtn" style="display: none;">
        <button type="button" onclick="doaction('1')" class="btn btn-primary btn-view  text-capitalize shadow-sm btn--sm mr-2" data-toggle="tooltip" data-placement="left" title="" data-original-title="Accept">Accept</button>
        <button type="button" onclick="doaction('3')" class="btn btn-danger text-capitalize shadow-sm btn--sm mr-2 reject-item" data-toggle="tooltip" data-placement="left" title="" data-original-title="Reject">Reject</button>
    </div>
    
    <table class="display responsive nowrap" style="width:100%" id="get_patient-table">
        <input type="hidden" value="{{ $serviceStatus }}" id="serviceStatus" name="serviceStatus" />
        <thead>
            <tr>
                @if($serviceStatus === 'pending')
                <th><div class="checkbox"><label><input class="mainchk" type="checkbox" /><span class="checkbtn"></span></label></div></th>
                @endif
                <th>Sr No.</th>
                <th>Patient Name</th>
                <th>Gender</th>
                <th>SSN</th>
                <th>Home Phone</th>
                @if(!$serviceStatus || $serviceStatus === 'pending')
                <th>Services</th>
                @endif
                <th>Doral Id</th>
                <th>City - State</th>
                <th>DOB</th>
                @if(!$serviceStatus)
                <th>Status</th>
                @endif
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
  
    <div class="modal fade messageViewModel" id="modal" role="dialog"></div>
@endsection

@push('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
    <style>
    input, .label {
        color: black;
    }
    .phone-text, .fullname-text, .ssn-text, .address-text,  .while_edit {
        display: none;
    }
</style>
@endpush

@push('scripts')
    <script src="https://unpkg.com/@google/markerclustererplus@4.0.1/dist/markerclustererplus.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script> 
    <script>
        var serching = false;
        var status = $("#serviceStatus").val();
        if(status === "pending"){
            var serching = true;
        }
        var columnDaTa = [];
        if(status === 'pending'){
            columnDaTa.push(
                {data:'checkbox_id',"className": "text-center"},
            );
        }
        columnDaTa.push(
            {data: 'DT_RowIndex', orderable: false, searchable: false,"className": "text-left"},
            {data: 'full_name',"className": "text-left"},
            {data: 'gender', name:'gender', orderable: true, searchable: true,"className": "text-left"},
            {data: 'ssn_data',"className": "text-left"},
            {data: 'phone', class: 'editable text',"className": "text-left"},
        );
        if(status == "" || status === 'pending'){
            columnDaTa.push({data: 'service_id',"className": "text-left"},);
        }
        columnDaTa.push({data: 'doral_id',"className": "text-left"},
            {data: 'city_state',"className": "text-left"},
            {data:'dob',name:'dob',"className": "text-left"},
        );
        if(status == ""){
            columnDaTa.push({data: 'status',"className": "text-left"},);
        }
        columnDaTa.push({data: 'action',"className": "text-left"});

        $('#get_patient-table').DataTable({
            "processing": true,
            "serverSide": true,
            "searching": serching,
            "language": {
                processing: '<div id="loader-wrapper"><div class="overlay"></div><div class="pulse"></div></div>'
            },
            ajax: {
                'type': 'POST',
                'url': "{{ route('clinician.caregiver.ajax') }}",
                'headers': {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                
                data: function (d) {
                    d.due_date = $('input[name="daterange"]').val();
                    d.status = $('select[name="status"]').val();
                    d.lab_due_date = $('input[name="lab_due_date"]').val();
                    d.user_name = $('select[name="user_name"]').val();
                    d.service_id = $('select[name="service_id"]').val();
                    d.gender = $('select[name="gender"]').val();
                    d.dob = $('input[name="dob"]').val();
                    d.serviceStatus = $('input[name="serviceStatus"]').val();
                    d.zip_code = $('input[name="zip_code"]').val();
                    
                },
                'headers': {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            },
            columns:columnDaTa,
       
            "lengthMenu": [ [10, 20, 50, 100, -1], [10, 20, 50, 100, "All"] ],
            'columnDefs': [
                {
                    "order": [ 1, "desc"],
                    // targets: [0, 8],
                    // 'searchable': false,
                    // 'orderable': false,
                }
            ],
        });

        
        $(".autoImportPatient").click(function () {
          
            var url = $(this).attr('data-url');
            $("#loader-wrapper").show();
            $.ajax({
                type:"GET",
                url:url,
                success: function(data) {
                    if(data.status == 200) {
                        alertText(data.message,'success');
                        refresh();
                    } else {
                        alertText(data.message,'error');
                    }
                    $("#loader-wrapper").hide();
                },
                error: function()
                {
                    alertText("Server Timeout! Please try again",'warning');
                    $("#loader-wrapper").hide();
                }
            });
        });

        /*table reload at filter time*/
        $("#filter_btn").click(function () {
            refresh();
        });
        
        $("#reset_btn").click(function () {
            $('#search_form').trigger("reset");
            $('#user_name').html('');
             refresh();
        })

        $('input[name="lab_due_date"]').daterangepicker({
            autoUpdateInput: false,
        });

        $('input[name="lab_due_date"]').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('MM-DD-YYYY') + ' - ' + picker.endDate.format('MM-DD-YYYY'));
        });

        $('input[name="dob"]').daterangepicker({
            autoUpdateInput: false,
            singleDatePicker: true,
            // showDropdowns: true,
            // minYear: 1901,
            // maxYear: parseInt(moment().format('YYYY'), 10)
        });

        $('input[name="dob"]').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('MM-DD-YYYY'));
        });

        $('#user_name').select2({
            minimumInputLength: 3,
            placeholder: 'Select a name',
            ajax: {
                type: "POST",
                url: "{{ route('clinician.get-user-data') }}",
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    return {
                        results:  $.map(data, function (item) {
                            return {
                                text: item.first_name + ' ' + item.last_name,
                                id: item.id
                            }
                        })
                    };
                },
                cache: true
            }
        });

        $("body").on('click','.edit_btn',function () {
            $(this).parents("tr").find(".phone-text, .fullname-text, .ssn-text, .address-text, .while_edit").css("display",'block');
            $(this).parents("tr").find("span, .normal").css("display",'none');
        });

        $("body").on('click','.cancel_edit',function () {
            $(this).parents("tr").find(".phone-text, .fullname-text, .ssn-text, .address-text, .while_edit").css("display",'none');
            $(this).parents("tr").find("span, .normal").css("display",'block');
        });

        $("body").on('click','.save_btn',function () {
            var first_name = $(document).find('.first_name').val();
            var last_name = $(document).find('.last_name').val();
            var ssn = $(document).find('.ssn').val();
            var phone = $(document).find('.phone').val();
            var city = $(document).find('.city').val();
            var state = $(document).find('.state').val();
            
            var id = $(this).attr("data-id");
            if (phone == '') {
                alert('Please enter phone number');
                return false;
            }
            
            $.ajax({
                'type': 'POST',
                'url': "{{ route('referral.updatePhone') }}",
                'headers': {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: {
                    "id": id,
                    "first_name" : first_name,
                    "last_name" : last_name,
                    "ssn" : ssn,
                    "phone" : phone,
                    "city" : city,
                    "state" : state,
                },
                'success': function (data) {
                    if(data.status == 400) {
                        alertText(data.message,'error');
                    } else {
                        alertText(data.message,'success');
                        $('#acceptRejectBtn').hide();
                        refresh();
                    }
                    $("#loader-wrapper").hide();
                },
                "error":function () {
                    alertText("Server Timeout! Please try again",'error');
                    $("#loader-wrapper").hide();
                }
            });
        });
        
        $('body').on('click', '.update-status', function () {
            var status = $(this).attr("data-status");
            $(".innerallchk, .mainchk").prop("checked","");
            $(this).parents("tr").find(".innerallchk").prop("checked",true);
            doaction(status) 
        });

        $(".mainchk").click(function () {
            var ch = $(this).prop("checked");
            if(ch == true) {
                $(".innerallchk").prop("checked","checked");
                $('#acceptRejectBtn').show();
            } else {
                $(".innerallchk").prop("checked","");
                $('#acceptRejectBtn').hide();
            }
        });

        function chkmain() {
            var ch = $(".innerallchk").prop("checked");
            if(ch == true) {
                $('#acceptRejectBtn').show();
                var len = $(".innerallchk:unchecked").length;
                if(len == 0) {
                    $(".mainchk").prop("checked","checked");
                } else {
                    $(".mainchk").prop("checked","");
                }
            } else {
                var len = $(".innerallchk:checked").length;
                if(len == 0) {
                    $('#acceptRejectBtn').hide();
                } else {
                    $('#acceptRejectBtn').show();
                    var len = $(".innerallchk:unchecked").length;
                    if(len == 0) {
                        $(".mainchk").prop("checked","checked");
                    } else {
                        $(".mainchk").prop("checked","");
                    }
                }
            }
        }

        function doaction(status) 
        {
            var len = $(".innerallchk:checked").length;
            if (len == 0) {
                alertText('Please select at least one record to continue.','warning');
            } else {
                var val = $('.innerallchk:checked').map(function () {
                    return this.value;
                }).get();
                postdataforaction(status, val);
            }
        }
            
        function postdataforaction(status,val) {
           
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: true,
                timer: 3000,
                timerProgressBar: true,
                buttonsStyling: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                title: 'Are you sure?',
                text: "Are you sure want to update status of this patient?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, change it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        $("#loader-wrapper").show();
                        $.ajax({
                            'type': 'POST',
                            'url': "{{ route('caregiver.changePatientStatus') }}",
                            'headers': {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            data: {
                                "id": val,
                                "status" : status
                            },
                            'success': function (data) {
                                if(data.status == 400) {
                                    alertText(data.message,'error');
                                } else {
                                    alertText(data.message,'success');
                                    $('#acceptRejectBtn').hide();
                                    refresh();
                                }
                                $("#loader-wrapper").hide();
                            },
                            "error":function () {
                                alertText("Server Timeout! Please try again",'error');
                                $("#loader-wrapper").hide();
                            }
                        });
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        alertText("Your file file is safe :)",'warning');
                        $(".innerallchk, .mainchk").prop("checked","");
                        $('#acceptRejectBtn').hide();
                    }
            });
        }

        function refresh() {
            $("#get_patient-table").DataTable().ajax.reload(null, false);
        }

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
