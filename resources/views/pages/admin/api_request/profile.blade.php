@extends('pages.layouts.app')

@section('title','Edit profile')

@section('pageTitleSection')
    Edit profile
@endsection

@section('content')
<div class="row">
  
   <div class="col-12 col-sm-12">
      <div class="row">
         <div class="col-12">
            <!-- Company Information Start Here -->
            <div class="app-card" id="CompanyInfo">
               <div class="card-header d-flex justify-content-between align-items-center">
                  <h1>Company Information</h1>
                  <div>
                     <img src="{{ asset('assets/img/icons/edit-field.svg') }}" data-toggle="tooltip"
                        data-placement="bottom" title="Edit" class="cursor-pointer edit-icon"
                        alt="" onclick="editAllProfileField('CompanyInfo')" id="editCompany">
                     <img src="{{ asset('assets/img/icons/update-icon.svg') }}" data-toggle="tooltip"
                        data-placement="bottom" title="Update"
                        class="cursor-pointer update-icon" alt=""
                         id="upateCompany">
                  </div>
               </div>
               <div class="card-body">
                  <div class="row">
                     <div class="col-12 col-sm-6">
                        <ul class="form-data">
                           <li>
                              <h3 class="_title">Api Request</h3>
                              <select class="form-control" name="api_request" id="api_request">
                                 <option>Select a api request</option>
                                 <option value="1">Automatically</option>
                                 <option value="2">Manually</option>
                              </select>
                           </li>
                           <li>
                              <h3 class="_title">Software</h3>
                                          <select name="software" id="software" class="form-control m-input m-input--air">
                                             <option value="default">Select a software</option>
                                          </select>
                           </li>
                        </ul>
                     </div>
                 
                  </div>
               </div>
            </div>
            <!-- Company Information End Here -->
         </div>
      </div>

    
      
   </div>
</div>

  
@endsection
@push('scripts')
   <script>
      /*@Fetch category of department on change event of department */
      $(document).on('change', '#api_request', function () {
         var temp = $(this);
         var request_type_is = temp.val();
       
         if (request_type_is == 1) {
            $.ajax({
               type: "GET",
               url: "{{route('referral.get-software')}}",
               dataType: "JSON",
               success: function (data) {
                  $("#software").html('');
                  if (data.status == 200) {
                     if (data.result != '') {
                        $.each(data.result, function (key, value) {
                              var id = value['id'];
                              var name = value['name'];
                              $("#software").append('<option value="' + id + '">' + name + '</option>');
                        });
                     }
                  }
               },
            });
         }
      });
   </script>
@endpush