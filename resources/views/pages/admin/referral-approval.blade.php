@extends('pages.layouts.app')
@section('title','Admin - Referrals')
@section('pageTitleSection')
    Admin - Refrrals
@endsection
@section('content')

        <table id="referral-table" class="display responsive nowrap" style="width:100%">
            <thead>
                <tr> 
                    <th></th>
                    <th></th>
                    <th><select class="item1 form-control" name="item1" data-id='2'>
                            <option value="">select company name</option>
                        @foreach($record as $row)
                            <option value="{{ $row['name'] }}" >{{ $row['name'] }}</option>
                        @endforeach
                    </select></th>
                    <th><select class="item2 form-control" name="item2" data-id='3'>
                            <option value="">select email</option>
                        @foreach($record as $row)
                            <option value="{{ $row['email'] }}" >{{ $row['email'] }}</option>
                        @endforeach
                    </select></th>
                    <th></th>
                </tr>
                <tr>
                    <th><input value="1" type="checkbox"></th>
                    <th>Refferral Type</th>
                    <th>Company Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>

@endsection

@push('styles')
    <link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.dataTables.min.css" rel="stylesheet">
    <link type="text/css" href="https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/css/dataTables.checkboxes.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
@endpush

@push('scripts')
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
<script src="https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/js/dataTables.checkboxes.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script>
        if("{{Request::is('admin/referral-approval')}}"){
            var referralurl = '{{  route('admin.referral.approval.list') }}';
        } else if("{{Request::is('admin/referral-active')}}"){
            var referralurl = '{{  route('admin.referral.active.list') }}';
        } else if("{{Request::is('admin/referral-rejected')}}") {
            var referralurl = '{{  route('admin.referral.rejected.list') }}';
        }

        $(document).ready(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(".acceptid").click(function() {
                $("#loader-wrapper").show();
                var company_id = $(this).attr('id');
                var status = "1";
                $.ajax({
                    method: 'POST',
                    url: '{{ route('admin.updateStatus') }}',
                    data: {company_id, status},
                    success: function( response ){
                        $("#loader-wrapper").hide();
                        if(response.status == 1) {
                            $(".alert-success").show();
                            $(".alert-danger").hide();
                            $("#successResponse").text(response.message);
                            setTimeout(function(){
                                window.location.reload();
                            }, 1000);
                        }
                        else {
                            $(".alert-danger").show();
                            $(".alert-success").hide();
                            $("#errorResponse").text(response.message);
                            setTimeout(function(){
                                window.location.reload();
                            }, 1000);
                        }
                       
                    },
                    error: function( e ) {
                        $("#loader-wrapper").hide();
                        alert('Something went wrong!');
                    }
                });

            });

            $(".rejectid").click(function() {
                $("#loader-wrapper").show();
                var company_id = $(this).attr('id');
                var status = "3";
                //alert(company_id);
                $.ajax({
                    method: 'POST',
                    url: '{{ route("admin.updateStatus") }}',
                    data: {company_id, status},
                    success: function( response ){
                        $("#loader-wrapper").hide();
                        if(response.status == 1) {
                            $(".alert-success").show();
                            $(".alert-danger").hide();
                            $("#successResponse").text(response.message);
                            setTimeout(function(){
                                $(".alert-success").hide();
                                window.location.reload();
                            }, 1000);
                        }
                        else {
                            $(".alert-danger").show();
                            $(".alert-success").hide();
                            $("#errorResponse").text(response.message);
                            setTimeout(function(){
                                $(".alert-danger").hide();
                                window.location.reload();
                            }, 1000);
                        }
                    },
                    error: function( e ) {
                        $("#loader-wrapper").hide();
                        alert('error');
                    }
                });

            });

            $('.item1').on('change', function () {
                table
                    .columns( $(this).attr('data-id'))
                    .search( this.value )
                    .draw();
            });

            $('.item2').on('change', function () {
                table
                    .columns( $(this).attr('data-id'))
                    .search( this.value )
                    .draw();
            });

           /* $('.itemName').select2({
              placeholder: 'Select an item',
              
            });*/
            
        });

        
        var table = $('#referral-table').DataTable({
            "processing": true,
            "language": {
                processing: '<div id="loader-wrapper">  <div class="overlay"></div> <div class="pulse"></div></div>'
            },
            "serverSide": true,
            drawCallback: function(dt) {
              console.log("draw() callback; initializing Select2's.");
              $('.item1').select2({tags: true,width : '15rem'});
              $('.item2').select2({tags: true,width : '15rem'});
            },
            ajax: referralurl,
            columns:[
                {data:'id',name:'id',"bSortable": false},
                // {data:'id',name:'id'},
                {
                    data:'referal_id',
                    name:'referal_id',
                    "bSortable": true,
                },
               {data:'name',name:'name',"bSortable": true,

                    render:function(data, type, row, meta){
                        data = "<a href={{ url('/admin/referral-profile/') }}/" + row.id + ">" + row.name+"</a>";
                        return data;
                    }
               
                },
                {
                    data:'email',
                    name:'email',
                    "bSortable": true
                },
                {data: 'action',name: 'action',"bSortable": false}
            ],
            // "order": [[ 1, "desc" ]],
            // "pageLength": 5,
            // "lengthMenu": [ [5, 10,20, 25,100, -1], [5, 10,20, 25,100, "All"] ],
            'columnDefs': [
                {
                    'targets': 0,
                    'checkboxes': {
                        'selectRow': true
                    }
                }
            ],
            'select': {
                'style': 'multi'
            },
        });

         table.on( 'draw', function () {
            $('.dataTables_wrapper .dataTables_paginate .paginate_button').addClass('custompagination');
        });

        function changeReferralStatus(id,status) {
            $("#loader-wrapper").show();
            var company_id = id;
            var status = status;
            $.ajax({
                method: 'POST',
                url: '{{ route('admin.updateStatus') }}',
                data: {company_id, status},
                success: function( response ){
                    $("#loader-wrapper").hide();
                    if(response.status == 1) {
                        $(".alert-success").show();
                        $(".alert-danger").hide();
                        $("#successResponse").text(response.message);
                        setTimeout(function(){
                            window.location.reload();
                        }, 1000);
                    }
                    else {
                        $(".alert-danger").show();
                        $(".alert-success").hide();
                        $("#errorResponse").text(response.message);
                        setTimeout(function(){
                            window.location.reload();
                        }, 1000);
                    }
                   
                },
                error: function( e ) {
                    $("#loader-wrapper").hide();
                    alert('Something went wrong!');
                }
            });
        }

    </script>
@endpush
