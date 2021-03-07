var base_url = $('#base_url').val();
$(document).ready(function (){
    $("#loader-wrapper").show();
   $.ajax({
       headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       },
       url:patientRequestList,
       method:'POST',
       dataType:'json',
       success:function (response) {
          $("#loader-wrapper").hide();
           var html='<ul>';
           $.each(response,function (key,value) {

           });
           html+='</ul>';
           $('#patient-request').html(html);
       },
       error:function (error) {
          $("#loader-wrapper").hide();
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
$(function () {
     tail.select("#partner-services", {
            search: !0,
            placeholder: "Select partner-services"
        })
})

