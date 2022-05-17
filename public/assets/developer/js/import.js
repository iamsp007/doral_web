$(".autoImportPatient").click(function () {
          
    var url = $(this).attr('data-url');
    var action = $(this).attr('data-action');
     var patientId = $(this).attr('data-id');
   
    $("#loader-wrapper").show();
    $.ajax({
        type:"GET",
        url:url,
        data:{
        "action":action,
        "patient_id":patient_id
        },
        success: function(data) {
          	alert(data.status);
            if(data.status == 200) {
                if (action == 'check-caregiver') {
                    console.log('get caregiver data');
                    console.log(data.data);
                    console.log('get caregiver data');

                    if (data.data != '') {
                        $.each(data.data, function (key, value) {
                            var html = '<tr><td>' + value.phoneNumber + '</td><td>' + value.scheduleStartTime + '</td><td>' + value.scheduleEndTime + '</td><td>' + value.name + '</td></tr>';

                            $('.caregiver-list-order tr:last').before(html);
                        });
                    }
                }
                alertText(data.message,'success');
            
                refresh();
            } else {
                alertText(data.message,'error');
            }
            $("#loader-wrapper").hide();
        },
        error: function()
        {
            alertText("Server Timeout! Please try again",'warning');
            $("#loader-wrapper").hide();
        }
    });
});