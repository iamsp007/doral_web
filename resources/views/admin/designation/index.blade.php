@extends('pages.layouts.app')

@section('title','Designation List')
@section('pageTitleSection')
    All Designation Lists
@endsection

@section('content')
    <form id="search_form" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <div class="row">
                <div class="col-3 col-sm-3 col-md-3">
                    <div class="input-group">
                        <x-text name="name" class="name" id="name" placeholder="Name"/></td>
                    </div>
                </div>
                <div class="col-3 col-sm-3 col-md-3">
                    <div class="input-group">
                        <select name="status" id="status" class="form-control form-control-lg">
                            <option value="">Select a status</option>
                            @foreach (config('select.status') as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-3 col-sm-3 col-md-3">
                    <button class="btn btn-primary" type="button" id="filter_btn">Apply</button>
                    <button class="btn btn-primary reset_btn" type="button" id="reset_btn">Reset</button>
                </div>
            </div>
        </div>
    </form>

    <table class="display responsive nowrap data-table" style="width:100%">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
@endsection

@push('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
@endpush
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script> 
    <script>
        $(document).ready(function () {
            $('.data-table').DataTable({
                "processing": true,
                "serverSide": true,
                "language": {
                    processing: '<div id="loader-wrapper"><div class="overlay"></div><div class="pulse"></div></div>'
                },
                ajax: {
                    'type': 'POST',
                    'url': "{{ route('designation.getList') }}",
                    'headers': {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data: function (d) {
                        d.name = $('input[name="name"]').val();
                    },
                    'headers': {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                },
                columns:[
                    {data:'id',"bSortable": true},
                    {data:'name', "bSortable": true},
                    {data: 'action', name: 'action'}
                ],
        
                "lengthMenu": [ [10, 20, 50, 100, -1], [10, 20, 50, 100, "All"] ],
                'columnDefs': [
                    {
                        "order": [ 1, "desc"],
                    }
                ],
            });
            
            $('body').on('click', '.deleting', function () {
                var t = $(this);
                var id = t.attr("id");
              
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
                text: "Are you sure want to delete this record?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, change it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        $("#loader-wrapper").show();
                        $.ajax({
                            'type': 'delete',
                            'url': "{{url('partner/designation')}}/" + id,
                            'headers': {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            'success': function (data) {
                                if(data.status == 400) {
                                    alertText(data.message,'error');
                                } else {
                                    t.parents("tr").fadeOut(function () {
                                        $(this).remove();
                                    });
                                    alertText(data.message,'success');
                                }
                                $("#loader-wrapper").hide();
                            },
                            "error":function () {
                                alertText("Server Timeout! Please try again",'warning');
                                $("#loader-wrapper").hide();
                            }
                        });
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        alertText("Your record is safe :)",'cancelled');
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

            /*@ Change admin status */
            $("body").on('click', '.user_status', function (event) {
                var t = $(this);
                var id = t.attr("id");
                var status_name = t.attr("data-id");

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
                text: "Are you sure want to "+ status_name +" the record?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, change it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        $("#loader-wrapper").show();
                        $.ajax({
                            'type': 'get',
                            'url': '{{url("partner/designation/status")}}/' + id,
                            'headers': {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            'success': function (data) {
                                if (data.status == 400) {
                                    alertText(data.message,'error');
                                } else {
                                    refresh()
                                    alertText(data.message,'success');
                                }
                                $("#loader-wrapper").hide();
                            },
                            "error": function () {
                                swal("Server Timeout!", "Please try again", "warning");
                                $("#loader-wrapper").hide();
                            }
                        });
                    } else if (result.dismiss === 'cancel') {
                        alertText("Your record is safe :)",'cancelled');
                    }
                });
            });
        });
        function refresh() {
            $(".data-table").DataTable().ajax.reload(null, false);
        }
    </script>
@endpush
