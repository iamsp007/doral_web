@extends('pages.layouts.app')
@section('title','Admin - Add Api')
@section('pageTitleSection')
Create a new Api
@endsection
@section('content')
@php
	
	/*Fetching data while editing records*/

	$name = $status = $software_id ='';
	if(!empty($api)):
        $status = $api->status;
		$name = $api->name;
		$software_id = $api->software_id;
	endif;
@endphp
<div class="row">
    <div class="col-12 col-sm-4"></div>
    <div class="col-12 col-sm-4">
        <div class="row mt-3">
            <div class="col-12">
                <div class="app-card" id="AdministratorInfo">
                  
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <form id="api_form">
                                    @csrf
                                    <ul class="form-data">
                                        <li>
                                            <label class="label">Software</label>
                                            <select class="form-control" name="software_id" id="software_id">
                                                <option value="">Select a software</option>
                                                @foreach ($softwares as $software)
                                                    <option value="{{ $software->id }}" @if(isset($api)){{($software_id == $software->id) ? 'selected=""' : ''}} @endif>{{ $software->name }}</option>
                                                @endforeach
                                            </select>
                                        </li>
                                        <li>
                                            <label class="label">Name</label>
                                            <input type="text" class="form-control _detail t5" name="name" id="name" placeholder="Api Name" value="{{ $name }}">
                                        </li>
                                        <li>
                                            <label class="label">Status</label>
                                            <select name="status" id="status" class="form-control form-control-lg">
                                                <option value="">Select a status</option>
                                                @foreach (config('select.status') as $key => $value)
                                                    <option value="{{ $key }}" @if(isset($api)){{($status == $key) ? 'selected=""' : ''}} @endif>{{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </li>
                                        <li>
                                            <label class="label">Field</label>
                                            <div class="add_more_field">
                                                <table class="table table-bordered" id="dynamic_field">  
                                                    <tr>  
                                                        <td><input type="text" name="field[]" placeholder="Search Field Label" class="form-control name_list" /></td>  
                                                        <td><button type="button" name="add" id="addMore" class="btn btn-success">Add More</button></td>  
                                                    </tr>  
                                                </table> 
                                            </div>
                                        </li>
                                        <li>
                                        @if(isset($api))
                                            <input type="hidden" name="_method" value="PUT" class="put_method"/>
                                            <button type="submit" id="add" class="btn btn-primary">Update Api</button>
                                        @else
                                            <button type="submit" id="add" class="btn btn-primary">Add Api</button>
                                        @endif
                                            <a href="{{ route('api.index') }}" class="btn btn-secondary" >Cancel</a>
                                        </li>
                                    </ul>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </div>
   <div class="col-12 col-sm-4"></div>
</div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function (argument) {
            
            /*Store locker*/
            $("#add").click(function (e) {
                e.preventDefault();
            
                var url = "@if(!isset($api)){{ Route('api.store') }} @else {{ Route('api.update',[$api->id]) }} @endif";
             
                var fdata = new FormData($("#api_form")[0]);
                
                $.ajax({
                    "type":"POST", 
                    "url":url,
                    "data": fdata,
                    headers: {
                        'X_CSRF_TOKEN': '{{ csrf_token() }}',
                    },
                    contentType: false,
                    processData: false,
                    "success":function (data) {
                      
                        if(data.status == 200) {
                            alertText(data.message,'success')
                            setTimeout(function () {
                                location.href = "{{ Route('api.index') }}";
                            },2000);
                        } else {
                            alertText(data.message,'error')
                        }
                    },
                    "error":function () {
                        alertText('Something went wrong','error')
                    }
                });
            });

            var i=1;  
            $('#addMore').click(function(){  
                i++;  
                $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="field[]" placeholder="Search Field Label" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
            });  

            $(document).on('click', '.btn_remove', function(){  
                var button_id = $(this).attr("id");   
                $('#row'+button_id+'').remove();  
            }); 
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
