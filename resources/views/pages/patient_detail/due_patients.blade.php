@extends('pages.layouts.app')

@section('title','Patient Report Details')
@section('pageTitleSection')
Patient Report Details
@endsection

@section('content')
    <table class="display responsive nowrap" style="width:100%" id="get_due_patient_table">
     
        <thead>
       
        <tr>
            <th>Sr No.</th>
            <th>Patient Name</th>
            <th>Gender</th>
            <th>SSN</th>
            <th>Home Phone</th>
            <th>Services</th>
            <th>Doral Id</th>
            <th>City - State</th>
            <th>DOB</th>
            <th>Action</th>
         </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
  
  
@endsection

@push('scripts')
    <script src="https://unpkg.com/@google/markerclustererplus@4.0.1/dist/markerclustererplus.min.js"></script>
    <script>
        
      $('#get_due_patient_table').DataTable({
            "processing": true,
            "serverSide": true,
            "language": {
                processing: '<div id="loader-wrapper"><div class="overlay"></div><div class="pulse"></div></div>'
            },
            ajax: {
                'type': 'POST',
                'url': "{{ route('clinician.due-patient-detail.ajax') }}",
                'headers': {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: {
                  due_user_id: $(document).find(".due_user_id").val(),
                },
            },
            columns:[
                {data: 'DT_RowIndex', orderable: false, searchable: false},
                {data: 'full_name'},
                {data: 'gender', name:'gender', orderable: true, searchable: true},
                {data: 'demographic.ssn'},
                {data: 'phone', class: 'editable text'},
                {data: 'service_id'},
                {data: 'demographic.doral_id'},
                {data: 'city_state'},
                {data: 'dob',name:'dob'},
                {data: 'action'}
            ],
       
            "lengthMenu": [ [10, 20, 50, 100, -1], [10, 20, 50, 100, "All"] ],
            'columnDefs': [
                {
                    "order": [ 1, "desc"],
                    // targets: [0, 8],
                    // 'searchable': false,
                    // 'orderable': false,
                }
            ],
        });


         /*Open message in model */
         $("body").on('click','.viewMessage',function () {
            var user_id = $(this).attr('id');
            var url = '{{url("get-patient-due-detail")}}/' + user_id;
          
            $.ajax({
               url : url,
               type: 'GET',
               headers: {
                  'X_CSRF_TOKEN':'{{ csrf_token() }}',
               },  
               success:function(data, textStatus, jqXHR){
                 
                  $(document).find(".messageViewModel").html(data);
                  $(document).find(".messageViewModel").modal('show');
               },
               error: function(jqXHR, textStatus, errorThrown){
                 
                 alert('error');
               }
            });
      });
    </script>
@endpush
