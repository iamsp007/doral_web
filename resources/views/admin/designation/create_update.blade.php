@extends('pages.layouts.app')

@section('content')
@php
    /*Fetching data while editing records*/

    $name = '';
    if(!empty($designation)):
        $name = $designation->name;
    endif;
@endphp
<div class="p-3 app-partner">
    <div class="row">
        <div class="col-12 col-sm-12">
            <form class="myForm">
                @csrf
                <div class="app-card no-minHeight">
                    <div class="app-card-header">
                        <div class="titleBox">
                            <div class="title">
                                Add Designation
                            </div>
                        </div>
                    </div>
                    <div class="p-4">
                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <div class="form-group">
                                    <label for="Name" class="label"><span class="mendate">*</span> Name</label>
                                    <div class="input-group">
                                        <span class="input-group-text input-group-text-custom"><i class="las la-user-tie"></i></span>
                                        <input type="text" class="form-control form-control-lg" placeholder="Name" id="name" value="{{ $name }}" name="name">
                                    </div>
                                    <span class="errorText name_error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                @if(isset($designation))
                                    <input type="hidden" name="_method" value="PUT" class="put_method"/>
                                @endif
                                <input type="submit" id="submit" name="submit" class="btn btn-outline-green" value="Submit" />
                                <a href="{{route('designation.index')}}" class="btn btn-secondary text-uppercase">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        
        /*@ Store / Update admin */
        validator = $(".myForm").validate({
            rules:{
                name: {required: true},
            },
            messages: {
                name: {
                    required: "Please enter name."
                },
            },
            errorPlacement: function(error, element) {
                var el_id = element.attr("name");
                $('#'+el_id+'-error').remove();
                error.insertAfter(element.parents(".input-group")).css({"color" : "red"});
            },
            invalidHandler: function (event,validator) {
                
            },
            submitHandler: function (form,event) {
                event.preventDefault();

                var url = "@if(!isset($designation)){{ Route('designation.store') }} @else {{ Route('designation.update',[$designation->id]) }} @endif";
                var fdata = new FormData($(".myForm")[0]);

                $.ajax({
                    type:"POST",
                    url:url,
                    data:fdata,
                    headers: {
                        'X_CSRF_TOKEN': '{{ csrf_token() }}',
                    },
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        if(data.status == 400) {
                            alertText(data.message,'error');
                        } else {
                            alertText(data.message,'success');
                            setTimeout(function () {
                                window.location= "{{ Route('designation.index') }}";
                            }, 2000);
                        }
                    },
                    error: function()
                    {
                        alertText("Server Timeout! Please try again",'warning');
                    }
                });
            }
        });

        $('input[name="dateofbirth"]').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 1901,
                maxYear: parseInt(moment().format('YYYY'), 10)
            }, function (start, end, label) {
                var years = moment().diff(start, 'years');
                alert("You are " + years + " years old!");
            });
          
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
