@extends('pages.layouts.app')

@section('title','User Device Logs')
@section('pageTitleSection', 'User Device Logs')
@push('styles')
<style type="text/css">
table.dataTable thead th, table.dataTable thead td{
    padding: 10px !important;
}
</style>
@endpush

@section('content')
@php    
    $bloodPressure = $glucometer = $digitalWeight = $pulseoxymeter = $date = '';
    if($input):
        $bloodPressure = ($input['device_type'] == '1') ? 'selected=""' : '';
        $glucometer = ($input['device_type'] == '2') ? 'selected=""' : '';
        $digitalWeight = ($input['device_type'] == '3') ? 'selected=""' : '';
        $pulseoxymeter = ($input['device_type'] == '4') ? 'selected=""' : '';
        $date = $input['date'];
    endif;
@endphp
    <form id="search_form" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <div class="row">
                <div class="col-3 col-sm-3 col-md-3">
                    <div class="input-group">
                        <select class="user_name form-control" id="user_name" name="user_name"></select>
                        <input type="hidden" id="patient_id" name="patient_id" value="{{ $input['patient_id'] ?? '' }}">
                        <input type="hidden" id="patient_name" name="patient_name" value="{{ $full_name }}">
                    </div>
                </div>
                <div class="col-3 col-sm-3 col-md-3">
                    <select class="form-control" name="level" id="level">
                        <option value="">Select a level</option>
                        <option value="1">Normal</option>
                        <option value="2">Medium</option>
                        <option value="3">Emergency</option>
                    </select>
                </div>
                
                <div class="col-3 col-sm-3 col-md-3">
                    <select class="form-control" name="device_type" id="device_type">
                        <option value="">Select a device type</option>
                        <option value="1" {{ $bloodPressure }}>BloodPressure</option>
                        <option value="2" {{ $glucometer }}>Glucometer</option>
                        <option value="3" {{ $digitalWeight }}>Digital Weight Machine</option>
                        <option value="4" {{ $pulseoxymeter }}>Pulse oxymeter</option>
                    </select>	
                </div>
                <div class="col-3 col-sm-3 col-md-3">
                    <!-- <input type="text" class="form-control" name="reading_time" id="reading_time"> -->
                    <input type="text" class="form-control" name="reading_time" id="reading_time" value="{{ $date }}">
                </div>
                <div class="col-3 col-sm-3 col-md-3">
                    <button class="btn btn-primary" type="button" id="filter_btn">Apply</button>
                    <button class="btn btn-primary reset_btn" type="button" id="reset_btn">Reset</button>
                </div>
            </div>
        </div>
    </form>
    
    <table class="display responsive nowrap" style="width:100%" id="get-data-table">
        <thead>
            <tr>
                <th>Sr No.</th>
                <th>Name</th>
                <th>Value</th>
                <th>Device Type</th>
                <th>Readning Time</th>
                <th>Created At</th>
                <th>Level</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
  
    
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
        var columnDaTa = [];
       
        columnDaTa.push(
            {data: 'DT_RowIndex', orderable: false, searchable: false,"className": "text-left"},
            {data: 'full_name', orderable: true, searchable: true,"className": "text-left"},
            {data: 'value', name:'value', orderable: true, searchable: true,"className": "text-left"},
            {data: 'device_type', orderable: true, searchable: true,"className": "text-left"},
            {data: 'reading_time', orderable: true, searchable: true,"className": "text-left"},
            {data: 'created_at', orderable: true, searchable: true,"className": "text-left"},
            {data: 'level', orderable: true, searchable: true,"className": "text-left"},
            {data: 'action',"className": "text-left"},
        );
       
        $('#get-data-table').DataTable({
            "processing": true,
            "serverSide": true,
        
            "language": {
                processing: '<div id="loader-wrapper"><div class="overlay"></div><div class="pulse"></div></div>'
            },
            ajax: {
                'type': 'POST',
                'url': "{{ route('clinician.ccm.ajax') }}",
                'headers': {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                
                data: function (d) {
                    d.user_name = $('select[name="user_name"]').val();
                    d.level = $('select[name="level"]').val();
                    d.device_type = $('select[name="device_type"]').val();
                    d.patient_id = $('input[name="patient_id"]').val();
                    d.reading_time = $('input[name="reading_time"]').val();
                },
                'headers': {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            },
            columns:columnDaTa,
            "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
                console.log(aData);
                    if (aData['level'] == '<p class="text-danger">Level 3</p>') {
                        $('td', nRow).css({'border': '1px solid red', 'color': 'red'});
                    }
                
            },
            "pageLength": 50,
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

        /*table reload at filter time*/
        $("#filter_btn").click(function () {
            refresh();
        });
        
        $("#reset_btn").click(function () {
            $('#search_form').trigger("reset");
            $('#user_name').html('');
             refresh();
        })

        $('input[name="reading_time"]').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            minYear: 1901,
            maxYear: parseInt(moment().format('YYYY'), 10)
        });

        var patient_id = $('#patient_id').val();
        var full_name = $('#patient_name').val();
        var $newOption = $("<option selected='selected'></option>").val(patient_id).text(full_name)
 
        $("#user_name").append($newOption).trigger('change');

        $('#user_name').select2({
            minimumInputLength: 3,
            placeholder: 'Select a name',
            ajax: {
                type: "POST",
                url: "{{ route('clinician.get-request-user') }}",
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
       
       

        /*Open message in model */
        $("body").on('click','.viewNote',function () {
            var log_id = $(this).attr('id');
            var url = '{{url("ccm/getnote")}}/' + log_id;
            $("#loader-wrapper").show();
            $.ajax({
                url : url,
                type: 'GET',
                headers: {
                    'X_CSRF_TOKEN':'{{ csrf_token() }}',
                },  
                success:function(data, textStatus, jqXHR){
                    $("#loader-wrapper").hide();
                    $(".messageViewModel").html(data);
                    $(".messageViewModel").modal('show');
                },
                error: function(jqXHR, textStatus, errorThrown){
                    swal("Server Timeout!", "Please try again", "warning");
                    $("#loader-wrapper").hide();
                }
            });
        });

        function refresh() {
            $("#get-data-table").DataTable().ajax.reload(null, false);
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