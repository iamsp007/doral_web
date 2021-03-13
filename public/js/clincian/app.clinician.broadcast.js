$(function () {
    $("[data-toggle='tooltip']").tooltip();
    tail.select(".assign_clinician", {
        search: true
    })
    $('.assign_clinician').on('change', function () {
        var countries = [];
        $.each($('.assign_clinician option:selected'), function () {
            countries.push(this.value);
    });
        var text = "";
        var i;
        for (i = 0; i < countries.length; i++) {
            text +=
                '<button type="button" class="btn btn-broadcast btn-block">' +
                countries[i] +
                ' Boradcast' +
                '<span></span>' +
                '</button>'
        }
        $('.broadcast_box').html(text)
    })
})

function onBroadCastOpen(patient_id) {
    // console.log($('#broadcast_form').find('input[name="patient_id"]'))
    $('#broadcast_form').find('input[name="patient_id"]').val(patient_id)
    $.ajax({
        beforeSend: function(){
            $("#loader-wrapper").show();
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url:base_url+'roadl-vendor-list',
        method:'GET',
        data:{
            patient_id:patient_id
        },
        dataType:'json',
        success:function (response) {
            $("#loader-wrapper").hide();
            var html='';
            response.map(function (value) {
                html+='<option value="'+value.role_id+'">'+value.name+'</option>';
            })
            $('#broadcast_form').find('#type_id').html(html);
            $('#roadl-request-modal').find("#selectRole1").val('');
            $('#roadl-request-modal').find("input[name='reason']").val('');
            $('#roadl-request-modal').modal('show');
        },
        error:function (error,responseText) {
            $("#loader-wrapper").hide();
            const sources = JSON.parse(error.responseText);
            alert(sources.message)
        }
    })
}


function onAppointmentBroadCastSubmit() {
    var data = $('#broadcast_form').serializeArray();
    var confirm = window.confirm('Are you sure Create your RoadL Request?');
    if (confirm){
        $.ajax({
            beforeSend: function(){
                $("#loader-wrapper").show();
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url:base_url+'clinician/patient-request',
            method:'POST',
            data:data,
            dataType:'json',
            success:function (response) {
                $("#loader-wrapper").hide();
                alert(response.message)
                $('#roadl-request-modal').find("#selectRole1").val('');
                $('#roadl-request-modal').find("input[name='reason']").val('');
                $('#roadl-request-modal').modal('hide');
            },
            error:function (error,responseText) {
                $("#loader-wrapper").hide();
                const sources = JSON.parse(error.responseText);
                alert(sources.message)
            }
        })
    }
}

function closeReferralPopup() {
    var getVal = $("#currentRoadLClick").val();
    $("#"+getVal).attr('checked',false);
    $("#selectRole1").val('');
    $("#modal").hide();
}
