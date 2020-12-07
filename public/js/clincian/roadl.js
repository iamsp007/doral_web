var base_url = $('#base_url').val();
$(document).ready(function (){
   $.ajax({
       headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       },
       url:patientRequestList,
       method:'POST',
       dataType:'json',
       success:function (response) {
           var html='<ul>';
           $.each(response,function (key,value) {

           });
           html+='</ul>';
           $('#patient-request').html(html);
       },
       error:function (error) {
           console.log(error)
       }
   })
});

function onStartBroadCast(id) {
    window.location.href=base_url+'clinician/start-roadl';
}

function onRunningBroadCast(id) {
    window.location.href=base_url+'clinician/start-roadl';
}

