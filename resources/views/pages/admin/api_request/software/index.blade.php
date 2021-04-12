@extends('pages.layouts.app')

@section('title','Software List')
@section('pageTitleSection', 'Software')

@section('content')
    <form id="search_form" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <div class="row">
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
                    <select class="form-control" name="software_id" id="software_id">
                        <option value="">Select a software</option>
                        @foreach ($softwares as $software)
                            <option value="{{ $software->id }}">{{ $software->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-3 col-sm-3 col-md-3">
                    <button class="btn btn-primary" type="button" id="filter_btn">Apply</button>
                    <button class="btn btn-primary reset_btn" type="button" id="reset_btn">Reset</button>
                </div>
            </div>
        </div>
    </form>
    <div class="button-control mt-4 mb-4">
        <a href="{{ route('software.create') }}" class="btn btn-primary btn-view  text-capitalize shadow-sm btn--sm mr-2"  title="Add Software">Create a new Software</a>
    </div>
    
    <table class="display responsive nowrap" style="width:100%" id="get-software">
        <thead>
            <tr>
                <th>Sr No.</th>
                <th>Software Name</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
@endsection

@push('scripts')
    <script>
        $('#get-software').DataTable({
            "processing": true,
            "serverSide": true,
            "language": {
                processing: '<div id="loader-wrapper"><div class="overlay"></div><div class="pulse"></div></div>'
            },
            ajax: {
                'type': 'POST',
                'url': "{{ route('software.getAll') }}",
                'headers': {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                
                data: function (d) {
                    d.status = $('select[name="status"]').val();
                    d.software_id = $('select[name="software_id"]').val();
                },
                'headers': {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            },
            columns:[
                { data: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'name' },
                { data: 'status' },
                { data: 'action' }
            ],
        });

        $('body').on('click', '.delsing', function () {
            var t = $(this);
            var id = t.attr("id");
            alert(id);
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
                  $.ajax({
                     'type': 'delete',
                     'url': '{{url("admin/software")}}/' + id,
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
                     },
                     "error":function () {
                        alertText("Server Timeout! Please try again",'warning');
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

        function refresh() {
            $("#get-software").DataTable().ajax.reload(null, false);
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
