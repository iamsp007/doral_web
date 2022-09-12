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
         console.log(response);
            $("#loader-wrapper").hide();
            var html='';
            html+='<option value="">Select type</option>';
            response.data.map(function (value) {
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
    $('.js-example-basic-multiple').select2({
    // dropdownAutoWidth: true,
   // multiple: true,
   // width: '100%',
   // height: '30px',
    placeholder: "Select a test",
    allowClear: true
});
//$('.select2-search__field').css('width', '100%');
    $('.sub_test_id').select2({
    placeholder: "Select a sub test",
    allowClear: true
    });
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
               $('.select2-selection__rendered').attr('style', ' display: flex !important;flex-direction: row-reverse !important;padding-top: 2px !important;align-items: center !important;');
                if(role_id == 1 || role_id == 2 || role_id == 4) {

                    var testnameHtml='';
                    testnameHtml+='<option value="" disabled="" selected="">Select Test</option>';
                    response.data.dieses.map(function (value) {
                        testnameHtml+='<option value="'+value.id+'">'+value.name+'</option>';
                    })
                    $('#roadl-request-modal').find('.js-example-basic-multiple').removeAttr("multiple");

                    $('#roadl-request-modal').find('#test_name_list_tr').show();
                    $('#roadl-request-modal').find('.js-example-basic-multiple').html(testnameHtml);

                    $("#patient_roles_name").val('patient_roles_name');
                    var html='';
                    html+='<option value="">Select Clinician</option>';
                    response.data.clinicianList.map(function (value) {
                        html+='<option value="'+value.id+'">'+value.first_name+' '+value.last_name+'</option>';
                    })
                    html+='<option value="0">Broadcast</option>';
                    $('#roadl-request-modal').find('#clinician_role_list_tr').show();
                    $('#roadl-request-modal').find('#clinician_list_id').html(html);
                } else {
                    $('#roadl-request-modal').find('#clinician_list_id').val('');
                    $('#roadl-request-modal').find('#clinician_role_list_tr').hide();

                    var testnameHtml='';
                    testnameHtml+='<option value="" disabled="" selected="">Select Test</option>';
                    response.data.categories.map(function (value) {
                        testnameHtml+='<option value="'+value.id+'">'+value.name+'</option>';
                    })
                    $('#roadl-request-modal').find('#test_name_list_tr').show();
                    $('#roadl-request-modal').find('.js-example-basic-multiple').html(testnameHtml);
                    $(document).find('#roadl-request-modal').find('.js-example-basic-multiple').attr("multiple","multiple");
                }
            },
            error:function (error,responseText) {
                $("#loader-wrapper").hide();
            }
        })

}

$('body').on('change', '.sub_test_id', function () {
$(this).closest('table').find('.select2-selection__rendered').attr('style', 'display: block !important;flex-direction: row-reverse !important;padding-top: 2px !important;align-items: center !important;');
});

$('body').on('change', '.disease_select', function () {

    var test_id = $(".js-example-basic-multiple").val();
    var patient_roles_name = $("#patient_roles_name").val();

    $(this).closest('table').find('.select2-selection__rendered').attr('style', 'display: block !important;flex-direction: row-reverse !important;padding-top: 2px !important;align-items: center !important;');

     $(this).parents('.main-table-class').find('#sub_test_name_list_tr').find('.select2-selection__rendered').attr('style', 'display: flex !important;flex-direction: row-reverse !important;padding-top: 2px !important;align-items: center !important;');

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
            category_id:test_id,
            patient_roles_name: patient_roles_name
        },
        dataType:'json',
        success:function (response) {

            $("#loader-wrapper").hide();
            if (patient_roles_name != '') {
                $('#roadl-request-modal').find('.sub_test_id').removeAttr("multiple");
            }

            var testnameHtml='';
            testnameHtml+='<option value="" disabled="" selected="">Select Test</option>';
            response.data.map(function (value) {
                if (value.sub_test_name) {
                    testnameHtml+='<option value="'+value.id+'">'+value.name+'('+ value.sub_test_name.name +')</option>';
                } else {
                    testnameHtml+='<option value="'+value.id+'">'+value.name+'</option>';
                }

            })
            $('#roadl-request-modal').find('#sub_test_name_list_tr').show();
            $('#roadl-request-modal').find('.sub_test_id').html(testnameHtml);
        },
        error:function (error,responseText) {
            $("#loader-wrapper").hide();
        }
    })
});

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
                 //alert(response.code);
                if(response.code == 200) {

                	// $('#roadl-request-modal').find("#clinician_list_id").val('');
		        // $('#roadl-request-modal').find("#selectRole1").val('');
		        // $('#roadl-request-modal').find("input[name='reason']").val('');
		        // $('#roadl-request-modal').modal('hide');

		        $('#roadl-request-modal').find(".js-example-basic-multiple").empty().trigger('change');
		        $('#roadl-request-modal').find(".sub_test_id").empty().trigger('change');

		        $('#broadcast_form')[0].reset();

		        $('#roadl-request-modal').modal('hide');
		        pendocall(response.data);
                }
            },
            error:function (error,responseText) {
           // alert('error fun');
                $("#loader-wrapper").hide();
               // const sources = JSON.parse(error.responseText);
                alert("Server Timeout! Please try again");
            }
        })
    }
}

function pendocall(response) {

	var roadl_request_id = response.requestData.id;
	var patient_name = response.requestData.patient.full_name;
	var patient_lat_long = response.requestData.latitude+ ' - ' + response.requestData.longitude;

	   console.log('roadl_request_id=: ' + roadl_request_id);
	   console.log('patient_name=: ' + patient_name);
	   console.log('patient_lat_long=: ' + patient_lat_long);
	    (function(apiKey){

		(function(p,e,n,d,o){var v,w,x,y,z;o=p[d]=p[d]||{};o._q=o._q||[];
		v=['initialize','identify','updateOptions','pageLoad','track'];for(w=0,x=v.length;w<x;++w)(function(m){
		    o[m]=o[m]||function(){o._q[m===v[0]?'unshift':'push']([m].concat([].slice.call(arguments,0)));};})(v[w]);
		    y=e.createElement(n);y.async=!0;y.src='https://cdn.pendo.io/agent/static/'+apiKey+'/pendo.js';
		    z=e.getElementsByTagName(n)[0];z.parentNode.insertBefore(y,z);})(window,document,'script','pendo');

		    pendo.initialize({
		        visitor: {
		            id: roadl_request_id,
		            patient_name: patient_name,
		            patient_lat_long: patient_lat_long,
		        },

		        account: {
		            id: '1234'
		        }
		    });
	    })('71322162-1bf1-4bcd-72de-1d93c59ab919');
}

function closeReferralPopup() {
    var getVal = $("#currentRoadLClick").val();
    $("#"+getVal).attr('checked',false);
    $("#selectRole1").val('');
    $("#modal").hide();
}