@extends('layouts.referral.default')
@section('content')

<div class="app-vbc">
    <section class="app-body bg_grey section1">
        <div class="app-vbc">
            <div class="add-new-patient">
                <div class="patient_img_65"><img src="{{ asset('assets/img/icons/form.svg') }}" class="img_65"/></div>
                <h1 class="pt-4">Select your form</h1>
                <div class="category-type pt-4">
                    <div class="box">
                        <input type="radio" value="1" name="formName" class="formName"/><br/>HCSP - M11Q
                    </div>
                    <div class="box">
                        <input type="radio" value="2" name="formName" class="formName"/><br/>DOH-4359 (2010)
                    </div>
                    <div class="box">
                        <input type="radio" value="3" name="formName" class="formName"/><br/>HCSP - M12Q
                    </div>
                    <div class="box">
                        <input type="radio" value="4" name="formName" class="formName"/><br/>DOH-4359 (2011)
                    </div>
                </div>
                <div class="d-flex pt-4 justify-content-center">
                    <button type="button" class="continue-btn mr-2 openSection2" name="Continue">Continue</button>
                        <button type="button" class="cancel-btn" name="Cancel">Cancel</button>
                </div>
            </div>
        </div>
    </section>
    <div class="choose-file-type section2" style="display: none;">
        <h1>Choose File Type</h1>
        <form method="post" id="upload_form" enctype="multipart/form-data">
        <div class="category-type">
            <div class="box">
                <figure>
                    <img src="{{ asset('assets/img/icons/demographic-files-icon.svg') }}" class="iconSize" />
                </figure>
                <input type="radio" id="demographic" name='vbc_select' value="1" class="mt-3">
                <label for="demographic">Demographic Info</label>
            </div>
            <div class="box">
                <figure>
                    <img src="{{ asset('assets/img/icons/clinical-history.svg') }}" class="iconSize" />
                </figure>
                <input type="radio" id="demographic" name='vbc_select' value="2" class="mt-3">
                <label for="demographic">Clinical Info</label>
            </div>
            <div class="box">
                <figure>
                    <img src="{{ asset('assets/img/icons/order-due-dates-icon.svg') }}" class="iconSize" />
                </figure>
                <input type="radio" id="demographic" name='vbc_select' value="3" class="mt-3">
                <label for="demographic">Compliance Due Dates</label>
            </div>
            <div class="box">
                <figure>
                    <img src="{{ asset('assets/img/icons/md-order-icon.svg') }}" class="iconSize" />
                </figure>
                <input type="radio" id="demographic" name='vbc_select' value="4" class="mt-3">
                <label for="demographic">Previous MD Order</label>
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
                        <input type="hidden" name="service_id" id="service_id" value="2"> 
                        <input type="hidden" name="formSelect" id="formSelect">   
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
        
    </div>
</div>
<script>
$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".openSection2").click(function() {
        var formName = $(".formName:checked").val();
        $("#formSelect").val(formName);
        $(".section1").hide();
        $(".section2").show();

    });

    $('#upload_form').on('submit', function(event){
      event.preventDefault();
      $.ajax({
       url:'/referral/md-order-upload-bulk-data-store',
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
        window.location = "/referral/md-order";
       }
      })
     });

});
</script>   
@stop