@extends('pages.layouts.app')

@section('title','Welcome to Doral')
@section('pageTitleSection')
    Occupational Health - Bulk Patient Upload
@endsection
@section('content')
    <div class="app-vbc">
        <div class="choose-file-type">
            <h1>Choose File Type</h1>
            <div class="category-type control-group">
                <div class="box">
                    <label class="control control-radio block">
                        <figure>
                            <img src="{{ asset('assets/img/icons/demographic-files-icon.svg') }}" class="iconSize" />
                        </figure>
                        <input onchange="chooseFile(this)" type="radio" name="vbc_select" value="1" />
                        <div class="control_indicator"></div>
                        <span class="_title3">Demographic Info</span>
                    </label>
                </div>
                <div class="box">
                    <label class="control control-radio block">
                        <figure>
                            <img src="{{ asset('assets/img/icons/clinical-history.svg') }}" class="iconSize" />
                        </figure>
                        <input type="radio" onchange="chooseFile(this)" name="vbc_select" value="2" />
                        <div class="control_indicator"></div>
                        <span class="_title3">Clinical Info</span>
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
                <div class="box">
                    <label class="control control-radio block">
                        <figure>
                            <img src="{{ asset('assets/img/icons/order-due-dates-icon.svg') }}" class="iconSize" />
                        </figure>
                        <input type="radio" id="demographic" name='vbc_select' value="5">
                        <div class="control_indicator"></div>
                        <span class="_title3">Wage Parity</span>
                    </label>
                </div>
            </div>
            <div class="upload-your-files dropzone" id="dropzone-file-vbc">
                <h1>Upload your files</h1>
                <p>Upload from your computer (.xls, .xlsx, .csv,.pdf)</p>
                <div class="upload-files">
                    <input type="hidden" name="service_id" id="service_id" value="1">
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
        var fileType = $('input[name="vbc_select"]').val();
        var myDropzone = new Dropzone("#dropzone-file-vbc", {
            url:'{{ route('referral.vbc-upload-bulk-data-store') }}',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method:'POST',
            params:{
                vbc_select:fileType,
                service_id:3
            },
            maxFiles: 1,
            autoProcessQueue: true,
            progress:true,
            accept: function(file, done) {
                console.log("uploaded");
                done();
            },
            init: function() {
                this.on("maxfilesexceeded", function(file){
                    $.toast({
                        heading: 'Error',
                        text: 'Only one file allowed',
                        showHideTransition: 'fade',
                        icon: 'error'
                    })
                    return false
                });
                this.on("success", function(file, responseText) {
                    $.toast({
                        heading: responseText.status===0?'Error':'Success',
                        text: responseText.message,
                        showHideTransition: 'slide',
                        icon: responseText.status===0?'error':'success'
                    })
                    setTimeout(function () {
                       // window.location.reload();
                    },3000)
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
            console.log(fileType)
        }
    </script>
@endpush
