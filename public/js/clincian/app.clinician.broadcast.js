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
            html+='<option value="4">Broadcast</option>'; 
            $('#broadcast_form').find('#type_id').html(html);
            $('#roadl-request-modal').find("#selectRole1").val('');
            $('#roadl-request-modal').find("#clinician_list_id").val('');
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
$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
    $('.sub_test_id').select2();
});
function getClinicianList(role_id) {
   
        $.ajax({
            beforeSend: function(){
                $("#loader-wrapper").show();
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url:base_url+'clinician-role-list',
            method:'GET',
            data:{
                role_id:role_id
            },
            dataType:'json',
            success:function (response) {
             
                $("#loader-wrapper").hide();

                if(role_id == 1 || role_id == 2) {
                    var html='';
                    html+='<option value="0">Select Clinician</option>';
                    response.clinicianList.map(function (value) {
                        html+='<option value="'+value.id+'">'+value.first_name+' '+value.last_name+'</option>';
                    })
                    html+='<option value="0">Broadcast</option>';
                    $('#roadl-request-modal').find('#clinician_role_list_tr').show();
                    $('#roadl-request-modal').find('#clinician_list_id').html(html);
                } else {
                    $('#roadl-request-modal').find('#clinician_list_id').val('');
                    $('#roadl-request-modal').find('#clinician_role_list_tr').hide();

                    var testnameHtml='';
                    testnameHtml+='<option value="0">Select Test</option>';
                    response.categories.map(function (value) {
                        testnameHtml+='<option value="'+value.id+'">'+value.name+'</option>';
                    })
                    $('#roadl-request-modal').find('#test_name_list_tr').show();
                    $('#roadl-request-modal').find('.js-example-basic-multiple').html(testnameHtml);
                }
            },
            error:function (error,responseText) {
                $("#loader-wrapper").hide();
            }
        })
   
}

function getSubNameList() {
    var test_id = $(".js-example-basic-multiple").val();
    
    $.ajax({
        beforeSend: function(){
            $("#loader-wrapper").show();
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url:base_url+'sub-test-list',
        method:'GET',
        data:{
            category_id:test_id
        },
        dataType:'json',
        success:function (response) {
       
            $("#loader-wrapper").hide();
            var testnameHtml='';
            testnameHtml+='<option value="0">Select Test</option>';
            response.map(function (value) {
                testnameHtml+='<option value="'+value.id+'">'+value.name+'('+ value.sub_test_name.name +')</option>';
            })
            $('#roadl-request-modal').find('#sub_test_name_list_tr').show();
            $('#roadl-request-modal').find('.sub_test_id').html(testnameHtml);
        },
        error:function (error,responseText) {
            $("#loader-wrapper").hide();
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
                $('#roadl-request-modal').find("#clinician_list_id").val('');
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
