@extends('pages.layouts.app')
@section('title','Doral Patients')
@section('pageTitleSection')
    Patients List
@endsection


@section('content')
    <div class="alert alert-success alert-dismissible fade show mt-4" role="alert" style="display: none">
            <strong>Success!</strong> <span id="successResponse"></span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
    </div>
    <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert" style="display: none">
        <strong>Error!</strong> <span id="errorResponse"></span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
    </div>

    <table class="table" style="width:100%" id="patient-table" >
        <thead>
        <tr>
            <th><input type="checkbox" class="selectall"></th>
            <th>Patient Name</th>
            <th>Clinician Name</th>
            <th>Service</th>
            <th>File Type</th>
            <th>Gender</th>
            <th>Date Of Birth</th>
            <!--<th>Zip Code</th>
            <th>City - State</th>-->
            <th width="280px">Status</th>
            <th width="280px">Action</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    <!-- Clinician to Patient pop up -->
   
@endsection
@push('styles')

    
@endpush

@push('scripts')
    
    <script>

      $(function() {
        LoadDatatable();
        $(".choose").hide();
      });

      function LoadDatatable(){
         var table = $('#patient-table').DataTable({
              processing: true,
              "language": {
                  processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>'
              },
              serverSide: true,
              "bDestroy": true,
              ajax: "{{  route('supervisor.assignedpatients.ajax') }}",
              columns:[
                  {data:'id',name:'id'},
                  {
                      data:'first_name',
                      name:'first_name',
                      "bSortable": true,
                      render:function(data, type, row, meta){
                          data = '<a href={{ url('/patient-detail/') }}/' + row.id + '>' + row.first_name +' '+ row.last_name + '</a>';
                          return data;
                      }
                  },
                  {data:'clinician_id',name:'clinician_id',"bSortable": true},
                  {data:'service.name',name:'service.name',"bSortable": true},
                  {data:'filetype.name',name:'filetype.name',"bSortable": true},
                  {data:'gender',name:'gender',"bSortable": true},
                  {
                      data:'dob',
                      name:'dob',
                      "bSortable": true
                  },
                  /*{data:'Zip',name:'Zip',"bSortable": true},
                  {
                      data:'city',
                      name:'city',
                      "bSortable": true,
                      render:function (data, type, row, meta) {

                          return row.city+ ' - '+row.state;
                      }
                  },*/
                  {
                      data:'status',
                      name:'status',
                      "bSortable": true,
                      render:function (data, type, row, meta) {
                          if (row.status==="pending"){

                              return '<span class="status-pending">'+row.status+'</span>';
                          }else if (row.status==="accept"){

                              return '<span class="status-accepted">'+row.status+'</span>'
                          }else if (row.status==="rescheduled"){

                              return '<span class="status-rescheduled">'+row.status+'</span>';
                          }
                          return row.status;
                      }
                  },
                  {
                      data:'id',
                      name:'action',
                      "bSortable": true,
                      render:function (data, type, row, meta) {
                         return '<div class="d-flex"><a href="employee_user_profile.html"class="btn btn-primary btn-view shadow-sm btn--sm mr-2"data-toggle="tooltip" data-placement="left" title="View Patient"><i class="las la-binoculars"></i></a><a class="btn btn-add shadow-sm btn--sm mr-2"data-toggle="tooltip" data-placement="left" title="Edit Patient"><i class="las la-user-edit" data-toggle="modal" data-target="#CaseManagementModal"></i></a><button type="button" class="btn btn-danger shadow-sm btn--sm mr-2"data-toggle="tooltip" data-placement="left" title="Deactivate Patient"><i class="las la-user-times"></i></button><button type="button" class="btn btn-danger text-capitalize btn--sm assign"  title="">Remove From List</button></div>';
                      }
                  }
              ],
              "order": [[ 1, "desc" ]],
             'columnDefs': [
                 {
                     'targets': 0,
                     orderable: false,
                     //className: 'select-checkbox',
                     'render': function (data, type, full, meta){
                       return '<input type="checkbox" name="id[]" onclick="return isCheckedById()" value="' 
                          + $('<div/>').text(data).html() + '">';
                      },
                     'checkboxes': {
                         'selectRow': true
                     }
                 }
             ],
              "dom": '<"top"<"float-left pb-3"f><"float-right"l><"float-right pb-3"B>>rt<"bottom"<"float-left"i><"float-right pb-3"p>><"clear">',
             "buttons": [
              {
                  text: 'Choose Clinician',
                  action: function (e, dt, node, config) {
                      $('#CaseManagementModal').modal({
                          keyboard: false
                      })
                  },
                  className: 'btn btn-danger text-capitalize btn--sm choose mr-2',
                  idName: 'choose_clinician'
              }
              ]
         });

      }
    

      $('button[data-dismiss="modal"]').click(function(event) {
        event.preventDefault();
        $('input:checkbox').removeAttr('checked');

      })

      // show hide choose button -  start
      function isCheckedById(){
      
        if($('input[name="id[]"]:checked').length > 1){
          $(".choose").show();
        }
        else{
          $(".choose").hide();
        }
      }
      // end

      // for single assign clician - start  

      document.addEventListener("click", checkit);

      function checkit(event){
        if(event.target.classList.contains("assign")){
          const row = event.target.closest("TR");
          const checkbox = row.getElementsByTagName("INPUT")[0];
          //if(checkbox.checked){ checkbox.removeAttribute("checked"); }
          //else{
            checkbox.setAttribute("checked", "");
          //}
        }
      }

      // end 

      $(".selectall").click(function () {
          $('#patient-table td input:checkbox').not(this).prop('checked', this.checked);
          if(this.checked){
            $(".choose").show();
          }
          else{
            $(".choose").hide();
          }
      });

      $(".clinician").on("keyup", function () {
          var value = $(this).val().toLowerCase();
          $(".clinician_listing a").filter(function () {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
          });
      });


      var listing_clinician = $('.listing_clinician'),
          clinician = $('._clinician');
      listing_clinician.on('click', 'li a', function () {
          var clinician_name = $(this).find('[data-name="name"]').text();
          var clinician_value = $(this).attr('data-li-value');
          $('._clinician').attr('data-clinician-value',clinician_value);
          clinician.val(clinician_name);
      })


      listing_clinician.on('click', 'li a', function () {
          if ($(this).not('.selected')) {
              $(this).addClass('selected').parent().siblings().children().removeClass('selected');
          }
      })

      _total_no_records = $('.listing_clinician li').length;
      $('.total_records').html(_total_no_records);


      function save_patients(){
        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        var arr_data = [];
         if ($('input[type=checkbox]').is(':checked')) {
            $('input[type=checkbox]').each(function(){
                if ($(this).is(':checked')) 
                {
                  if($(this).val() !='on'){
                    arr_data.push({id:$(this).val()});
                  }
                  //clinician_id.push({clinician_id:$('._clinician').attr('data-clinician-value')});
                }
            });
            $("#loader-wrapper").show();
            $.ajax({
             url:'update-case-management',
             method:"POST",
             data:{arr_data},
             dataType:'JSON',
             //contentType: false,
             //cache: false,
             //processData: false,
             success:function(response)
             {
              $("#loader-wrapper").hide();
              if(response.status == 1) {
                  $(".alert-success").show();
                  $(".alert-danger").hide();
                  $("#successResponse").text(response.message);
                  //alert(response.dataV);
                  //$("#workTab").unbind('click', false);
                  setTimeout(function(){
                      $(".alert-success").hide();
                  }, 2000);
                  LoadDatatable();
              }
              else {
                  $(".alert-danger").show();
                  $(".alert-success").hide();
                  $("#errorResponse").text(response.message);
                  setTimeout(function(){
                      $(".alert-danger").hide();
                  }, 2000);
              }
              $("#CaseManagementModal").modal('hide');
              $(".selectall").prop("checked", false);
              $("#patient-table td input:checkbox").prop("checked", false);
             }
            })
       
          }
      }
    </script>
@endpush
