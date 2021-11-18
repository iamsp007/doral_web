$(".autoImportPatient").click(function () {
          
    var url = $(this).attr('data-url');
    var action = $(this).attr('data-action');
    
    $("#loader-wrapper").show();
    $.ajax({
        type:"GET",
        url:url,
        data:{action:action},
        success: function(data) {
          
            if(data.status == 200) {
                if (action == 'check-caregiver') {
                    console.log('get caregiver data');
                    console.log(data.data);
                    console.log('get caregiver data');
                    var html = '<tr><td>' + data.data.phoneNumber + '</td><td>' + data.data.scheduleStartTime + '</td><td>' + data.data.scheduleEndTime + '</td><td>' + data.data.name + '</td></tr>';

                    $('.caregiver-list-order tr:last').before(html);
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