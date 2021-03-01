@extends('pages.layouts.app')

@section('title','MD Order - Import Patients')
@section('pageTitleSection')
    MD Order - Import Patients
@endsection
@section('content')

<div class="app-vbc">
    <div class="add-new-patient section1">
        <div class="margin-60">
            <!--<a href="javascript:void(0)" onclick="sectionSteps(2,1)"><img src="../assets/img/icons/previous.svg" class="mr-2"></a>-->
            <!--<a href="javascript:void(0)" onclick="sectionSteps(1,2)"><img src="../assets/img/icons/next.svg"></a>-->
        </div>
        <div class="icon"><img src="{{ asset('assets/img/icons/form.svg') }}" class="img-fluid"/></div>
        <h1 class="pt-4 _title1">Patient's Enrollment Status</h1>
        <div class="category-type pt-4 control-group">
            <div class="box">
                <label class="control control-radio block">
                    <span class="_title3">On Boarding Patient</span>
                    <input type="radio" value="1" name="enrollstatus" class="enrollstatus" />
                    <div class="control_indicator"></div>
                </label>
                <!--<input type="radio" value="1" name="formName" class="formName"/><br/>HCSP - M11Q-->
            </div>
            <div class="box">
                <label class="control control-radio block">
                    <span class="_title3">Existing Patient</span>
                    <input type="radio" value="2" name="enrollstatus" class="enrollstatus" />
                    <div class="control_indicator"></div>
                </label>
                <!--<input type="radio" value="1" name="formName" class="formName"/><br/>HCSP - M11Q-->
            </div>
        </div>
        <div class="d-flex pt-4 justify-content-center">
            <button type="button" class="continue-btn mr-2 openSection1" onclick="sectionSteps(1,2)" name="Continue">Continue</button>
                <button type="button" class="cancel-btn" name="Cancel">Cancel</button>
        </div>
    </div>
    <div class="add-new-patient section2" style="display: none;">
        <div class="margin-60">
            <a href="javascript:void(0)" onclick="sectionSteps(2,1)"><img src="../assets/img/icons/previous.svg" class="mr-2"></a>
            <a href="javascript:void(0)" id="section2NextArrow" style="display: none;" onclick="sectionSteps(2,3)"><img src="../assets/img/icons/next.svg"></a>
        </div>
        <div class="icon"><img src="{{ asset('assets/img/icons/form.svg') }}" class="img-fluid"/></div>
        <h1 class="pt-4 _title1">Type of Services</h1>
        <div class="category-type pt-4 control-group">
            <div class="box">
                <label class="control control-radio block">
                    <span class="_title3">CDPAP</span>
                    <input type="radio" value="cdpap" name="services" class="services" />
                    <div class="control_indicator"></div>
                </label>
                <!--<input type="radio" value="1" name="formName" class="formName"/><br/>HCSP - M11Q-->
            </div>
            <div class="box">
                <label class="control control-radio block">
                    <span class="_title3">LHCSA</span>
                    <input type="radio" value="lhcsa" name="services" class="services" />
                    <div class="control_indicator"></div>
                </label>
                <!--<input type="radio" value="1" name="formName" class="formName"/><br/>HCSP - M11Q-->
            </div>
        </div>
        <div class="d-flex pt-4 justify-content-center">
            <button type="button" class="continue-btn mr-2 openSection2" onclick="sectionSteps(2,3)" name="Continue">Continue</button>
                <button type="button" class="cancel-btn" name="Cancel">Cancel</button>
        </div>
    </div>
    <div class="add-new-patient section3" style="display: none;">
        <div class="margin-60">
            <a href="javascript:void(0)" onclick="sectionSteps(3,2)"><img src="../assets/img/icons/previous.svg" class="mr-2"></a>
            <a href="javascript:void(0)" id="section3NextArrow" onclick="sectionSteps(3,4)"><img src="../assets/img/icons/next.svg"></a>
        </div>
        <div class="icon"><img src="{{ asset('assets/img/icons/form.svg') }}" class="img-fluid"/></div>
        <h1 class="pt-4 _title1">Select your form</h1>
        <div class="category-type pt-4 control-group">
            @foreach($data->mdforms as $value)
            <div class="box form-{{$value->id}}" style="display: none;">
                <label class="control control-radio block">
                    <span class="_title3">{{$value->name}}</span>
                    <input type="radio" value="{{$value->id}}" name="formName" class="formName" />
                    <div class="control_indicator"></div>
                </label>
                <!--<input type="radio" value="1" name="formName" class="formName"/><br/>HCSP - M11Q-->
            </div>
            @endforeach
        </div>
        <div class="d-flex pt-4 justify-content-center">
            <button type="button" class="continue-btn mr-2 openSection3" onclick="sectionSteps(3,4)" name="Continue">Continue</button>
                <button type="button" class="cancel-btn" name="Cancel">Cancel</button>
        </div>
    </div>
    <div class="choose-file-type section4" style="display: none;">
        <div class="margin-60">
            <a href="javascript:void(0)" onclick="sectionSteps(4,3)"><img src="../assets/img/icons/previous.svg" class="mr-2"></a>
            <!--<a href="javascript:void(0)" onclick="sectionSteps(2,3)"><img src="../assets/img/icons/next.svg"></a>-->
        </div>
        <h1>Choose File Type</h1>
        <div class="category-type control-group">
            <div class="box">
                <label class="control control-radio block">
                    <figure>
                        <img src="{{ asset('assets/img/icons/demographic-files-icon.svg') }}" class="iconSize" />
                    </figure>
                    <input type="radio" id="demographic" name='vbc_select' value="1">
                    <div class="control_indicator"></div>
                    <span class="_title3">Demographic Info</span>
                </label>
            </div>
            <div class="box">
                <label class="control control-radio block">
                    <figure>
                        <img src="{{ asset('assets/img/icons/order-due-dates-icon.svg') }}" class="iconSize" />
                    </figure>
                    <input type="radio" id="demographic" name='vbc_select' value="3">
                    <div class="control_indicator"></div>
                    <span class="_title3">Compliance Due Dates</span>
                </label>
            </div>
        </div>
        <div class="upload-your-files dropzone" id="dropzone-file-vbc">
            <h1>Upload your files</h1>
            <p>Upload from your computer (.xls, .xlsx, .csv,.pdf)</p>
            <div class="upload-files">

                <input type="hidden" name="formSelect" id="formSelect" value="">
                <input type="hidden" name="enrollstatus" id="enrollstatus" value="">
                <input type="hidden" name="services" id="services" value="">
                <div class="upload_icon"></div>
                <div>
                    <h1 class="_title">Drag & Drop</h1>
                    <p>Or</p>
                    <div class="mt-3">
                        <label for="file-1"><svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                 height="17" viewBox="0 0 20 17">
                                <path
                                    d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
                            </svg> <span>Choose a file&hellip;</span></label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('styles')
    <link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.dataTables.min.css" rel="stylesheet">
    <link type="text/css" href="https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/css/dataTables.checkboxes.css" rel="stylesheet" />
    <link href="{{ asset('css/dropzone.css') }}" rel="stylesheet" />
@endpush
@push('scripts')
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
    <script src="https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/js/dataTables.checkboxes.min.js"></script>
    <script src="{{ asset('js/dropzone.js') }}"></script>
    <script src="{{ asset('assets/js/app.referral.vbc.upload.bulk.data.min.js') }}"></script>
    <script>
        $(document).ready(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
    </script>
    <script>
        var fileType = $('input[name="vbc_select"]').val();
        var formSelect = $('input[name="formName"]').val();
        var myDropzone = new Dropzone("#dropzone-file-vbc", {
            url:'{{ route('referral.vbc-upload-bulk-data-store') }}',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method:'POST',
            params:{
                vbc_select:fileType,
                service_id:2,
                formSelect:formSelect
            },
            maxFiles: 1,
            autoProcessQueue: true,
            progress:true,
            accept: function(file, done) {
                done();
            },
            init: function() {
                this.on("maxfilesexceeded", function(file){
                    var msgEl = $(file.previewElement).find('.dz-error-message');
                    msgEl.text('Only one file allowed');
                    msgEl.show();
                    msgEl.css("opacity", 1);
                    return false
                });
                this.on("success", function(file, responseText) {
                    alert(responseText.message)
                    setTimeout(function () {
                        window.location.href=base_url+'referral/md-order';
                    },1000)
                });
            },
            paramName: 'file_name',
            clickable: true,
            acceptedFiles: ".xls,.xlsx,.csv",
            addRemoveLinks: true,
            error:function (file, error) {
                if (file && error) {
                    var msgEl = $(file.previewElement).find('.dz-error-message');
                    msgEl.text(error.message?error.message:error);
                    msgEl.show();
                    msgEl.css("opacity", 1);
                }else {
                    var msgEl = $(file.previewElement).find('.dz-error-message');
                    msgEl.text(error);
                    msgEl.show();
                    msgEl.css("opacity", 1);
                }
            }
        });
        function chooseFile(event) {
            fileType = $(event).val();
        }
        function sectionSteps(current,next) {
            var getenrollstatus = $("#enrollstatus").val();
            var getservices = $("#services").val();
            var getformSelect = $("#formSelect").val();
            if(getformSelect != '') {
                $("#section2NextArrow").show();
            }
            if(getformSelect != '') {
                $("#section2NextArrow").show();
            }
            if(current == 1 && next > current) {
                var enrollstatus = $(".enrollstatus:checked").val();
                if(enrollstatus == '1' || enrollstatus == '2') {
                    $("#enrollstatus").val(enrollstatus);
                }else {
                    alert('Please Select Enrollment Status');
                    return false;
                }
            }else if(current == 2 && next > current) {
                var services = $(".services:checked").val();
                if(services == 'cdpap' || services == 'lhcsa') {
                    $("#services").val(services);
                    if(services == 'cdpap') {
                       $(".form-2").show();
                       $(".form-1").hide(); 
                       $(".form-3").hide(); 
                       $(".form-4").hide(); 
                    }else {
                       $(".form-1").show(); 
                       $(".form-2").hide(); 
                       $(".form-3").show(); 
                       $(".form-4").show(); 
                    }
                }else {
                    alert('Please Select Service Type');
                    return false;
                }
            }else if(current == 3 && next > current) {
                var formName = $(".formName:checked").val();
                var getSelServ = $("#services").val();
                if(getSelServ == 'cdpap') {
                    if(formName == '2') {
                        $("#formSelect").val(formName); 
                    }else {
                        alert('Please Select Form');
                        return false;
                    }
                }else {
                    if(formName == '1' || formName == '3' || formName == '4') {
                        $("#formSelect").val(formName); 
                    }else {
                        alert('Please Select Form');
                        return false;
                    }
                }
            }
            $(".section"+current).hide();
            $(".section"+next).show().addClass('fadeIn');
        }
    </script>
@endpush
