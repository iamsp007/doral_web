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