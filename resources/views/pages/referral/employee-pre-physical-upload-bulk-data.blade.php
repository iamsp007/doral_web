@extends('layouts.referral.default')
@section('content')
<div class="app-vbc">
    <div class="choose-file-type">
        <h1>Choose File Type</h1>
        <div class="category-type">
            <div class="box">
                <figure>
                    <img src="../assets/img/icons/demographic-files-icon.svg" class="iconSize" />
                </figure>
                <label>Demographic files</label>
            </div>
            <div class="box">
                <figure>
                    <img src="../assets/img/icons/clinical-history.svg" class="iconSize" />
                </figure>
                <label>Clinical History</label>
            </div>
            <div class="box">
                <figure>
                    <img src="../assets/img/icons/order-due-dates-icon.svg" class="iconSize" />
                </figure>
                <label>Order Due Dates</label>
            </div>
            <div class="box">
                <figure>
                    <img src="../assets/img/icons/md-order-icon.svg" class="iconSize" />
                </figure>
                <label>MD Order</label>
            </div>
        </div>
        <div class="upload-your-files">
            <form method="post" id="upload_form" enctype="multipart/form-data">
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
                        <input type="hidden" name="referral_id" id="referral_id" value="1">    
                        <label for="file-1"><svg xmlns="http://www.w3.org/2000/svg" width="20"
                                height="17" viewBox="0 0 20 17">
                                <path
                                    d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
                            </svg> <span>Choose a file&hellip;</span></label>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-pink mt-3 uploadFile">Upload Files</button>
            </form>
        </div>
        <div class="uploaded-file-listing">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h1 class="_t10">Uploaded files (04)</h1>
                </div>
                <div>
                    <select name="" class="form-control form-control-sm" id="">
                        <option value="">Demographic Files</option>
                    </select>
                </div>
            </div>
            <table id="vbc" class="table" style="width:100%">
                <thead>
                    <tr>
                        <th><input type="checkbox" class="selectall" /></th>
                        <th>Patient Name</th>
                        <th>Description</th>
                        <th>Services</th>
                        <th>Uploaded Date</th>
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
                        <td width="20%">Curabitur dignissim tortor.</td>
                        <td>Employee Pre Physical</td>
                        <td>{{ date('F d Y', strtotime($raw['created_at'])) }} <!--Sunday, 4 October 2020--></td>
                        <td class="text-green">Success</span></td>
                        <td width="9%"><a href="javascript:void(0)"><img
                                    src="../assets/img/icons/delete-icon.svg"
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

    /*$(".uploadFile").click(function() {
        var file_name = $("#file-1").val();
        $.ajax({
            method: 'POST',
            url: '/referral/vbc-upload-bulk-data-store',
            data: {file_name},
            success: function( response ){
                if(response.status == 1) {
                    window.location = "/referral/dashboard"; 
                }
                else {
                    $(".alert").show();
                    $("#response").text(response.message);
                    setTimeout(function(){ 
                        $(".alert").hide();
                    }, 1000);    
                }
                
                console.log( response );
            },
            error: function( e ) {
                console.log(e);
            }
        });
        
    });*/

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
       }
      })
     });

});
</script>   
@stop