@extends('layouts.referral.default')
@section('content')
<div class="app-vbc">
    <div class="choose-file-type">
        <h1>Choose File Type</h1>
        <form method="post" id="upload_form" enctype="multipart/form-data">
        <div class="category-type">
            <div class="box">
                <figure>
                    <img src="{{ asset('assets/img/icons/demographic-files-icon.svg') }}" class="iconSize" />
                </figure>
                <input type="radio" name='r1' value="1">Demographic files</input>
            </div>
            <div class="box">
                <figure>
                    <img src="{{ asset('assets/img/icons/clinical-history.svg') }}" class="iconSize" />
                </figure>
                <input type="radio" name='r1' value="2">Clinical History</input>
                <!--<label>Clinical History</label>-->
            </div>
            <div class="box">
                <figure>
                    <img src="{{ asset('assets/img/icons/order-due-dates-icon.svg') }}" class="iconSize" />
                </figure>
                <input type="radio" name='r1' value="3">Order Due Dates</input>
                <!---<label>Order Due Dates</label>-->
            </div>
            <div class="box">
                <figure>
                    <img src="{{ asset('assets/img/icons/md-order-icon.svg') }}" class="iconSize" />
                </figure>
                <input type="radio" name='r1' value="4">MD Order</input>
                <!--<label>MD Order</label>--->
            </div>
        </div>
        <div class="upload-your-files">
            
            <h1>Upload your files</h1>
            <p>Upload from your computer (.xls, .xlsx, .csv,.pdf)</p>
            <div class="upload-files">
                <div class="upload_icon"></div>
                <div>
                    <h1 class="_title">Drag & Drop</h1>
                    <p>Or</p>
                    <div class="mt-3">
                        <input type="file" name="file_name" id="file_name" class="inputfile inputfile-1"
                            data-multiple-caption="{count} files selected" multiple />
                        <input type="hidden" name="service_id" id="service_id" value="3">    
                        <label for="file-1"><svg xmlns="http://www.w3.org/2000/svg" width="20"
                                height="17" viewBox="0 0 20 17">
                                <path
                                    d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
                            </svg> <span>Choose a file&hellip;</span></label>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-pink mt-3 uploadFile">Upload Files</button>
            
        </div>
        </form>
        <div class="uploaded-file-listing">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h1 class="_t10">Uploaded files </h1>
                </div>
                <div>
                    <select name="fileSelect" class="form-control form-control-sm" id="fileSelect">
                        <option value="1">Demographic Files</option>
                        <option value="2">Clinical History</option>
                        <option value="3">Order Due Dates</option>
                        <option value="4">MD Order</option>
                    </select>
                </div>
            </div>
            <table id="vbc" class="table" style="width:100%">
                <thead>
                    <tr>
                        <th><input type="checkbox" class="selectall" /></th>
                        <th>Patient Name</th>
                        <th>File</th>
                        <th>Gender</th>
                        <th>Phone</th>
                        <th>City</th>
                        <th>Zip Code</th>
                        <th>Created Date</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($record) && count($record) > 0)
                    @foreach($record['patientReferral'] as $raw)
                    <tr>
                        <td><input type="checkbox" /></td>
                        <td class="text-green">{{$raw['first_name']}} {{$raw['middle_name']}} {{$raw['last_name']}}</td>
                        <td>
                            @if($raw['file_type'] == 1)
                            Demographic files
                            @elseif($raw['file_type'] == 2)
                            Clinical History
                            @elseif($raw['file_type'] == 3)
                            Order Due Dates
                            @elseif($raw['file_type'] == 3)
                            MD Order
                            @endif
                        </td>
                        <td>{{$raw['gender']}}</td>
                        <td>{{$raw['phone1']}}</td>
                        <td>{{$raw['city']}}-{{$raw['state']}}</td>
                        <td>{{$raw['Zip']}}</td>
                        <td>{{ date('F d Y', strtotime($raw['created_at'])) }} <!--Sunday, 4 October 2020--></td>
                        <td class="text-green">Success</span></td>
                        <td width="9%"><a href="javascript:void(0)"><img
                                    src="{{asset('assets/img/icons/delete-icon.svg')}}"
                                    class="action-delete" /></a>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $('#upload_form').on('submit', function(event){
      event.preventDefault();
      $.ajax({
       url:'/referral/employee-pre-physical-upload-bulk-data-store',
       method:"POST",
       data:new FormData(this),
       dataType:'JSON',
       contentType: false,
       cache: false,
       processData: false,
       success:function(data)
       {
        $('#message').css('display', 'block');
        $('#message').html(data.message);
        $('#message').addClass(data.class_name);
        $('#uploaded_image').html(data.uploaded_image);
        window.location = "/referral/employee-pre-physical";
       }
      })
     });

    $("#fileSelect").change(function(event) {
        event.preventDefault();

        alert($(this).val());
    })

});
</script>   
@stop