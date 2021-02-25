var table;

$(function () {
    table = $('#appointmentScheduled').DataTable({
        "processing": true,
        "language": {
            processing: '<div id="loader-wrapper"><div class="overlay"></div><div class="pulse"></div></div>'
        },
        "serverSide": false,
        ajax: scheduleAppointmentAjax,
        columns:[
            {data:'id',name:'id'},
            {
                data:'patients.first_name',
                name:'patients.first_name',
                "bSortable": true,
                render:function(data, type, row, meta){
                    data = '<a class="text-green" href="'+patient_detail_url+'/'+row.patients.id+'">' + row.patients.first_name +' '+ row.patients.last_name + '</a>';
                    return data;
                }
            },
            {
                data:'patients.gender_name',
                name:'patients.gender_name',
                bSortable: true
            },
            {data:'service.name',name:'service.name',"bSortable": true},
            {
                data:'cancel_by_user',
                name:'cancel_by_user',
                bSortable: true,
                render:function(data, type, row, meta){
                    data = '<a class="text-green" href="'+patient_detail_url+'/'+data.id+'">' + data.first_name +' '+ data.last_name + '</a>';
                    return data;
                }
            },
            {
                data:'cancel_appointment_reasons',
                name:'cancel_appointment_reasons',
                bSortable: true,
                render:function(data, type, row, meta){
                    var html='';
                    if (data){
                        return data.reason;
                    }
                    return row.reason_notes;
                }
            },
            {data:'status',name:'status',"bSortable": true}
        ],
        "order": [[ 1, "desc" ]],
        'columnDefs': [{
            "targets": [0, 5],
            "orderable": false
        }],
        "pageLength": 10,
        "dom": '<"top"<"float-left pb-3"f><"float-right"l>>rt<"bottom"<"float-left"i><"float-right pb-3"p>><"clear">'
    });

     table.on( 'draw', function () {
            $('.dataTables_wrapper .dataTables_paginate .paginate_button').addClass('custompagination');
        });
    $(".selectall").click(function () {
        $('#appointmentScheduled td input:checkbox').not(this).prop('checked', this.checked);
    });
    function countdown(row, data) {
        // Fetch the display element
        var el = document.getElementById(row.id);
        // Set the timer
        var interval = setInterval(function () {
            var beforeOneHour = moment(data).subtract(1,'hours').format('YYYY-MM-DD HH:mm:ss');
            var datetime = moment(data).format('YYYY-MM-DD HH:mm:ss');
            if (moment().isBetween(beforeOneHour,datetime)){
                var x = moment(data).fromNow();
                $('#countdown'+row.id).html(x);
                $('#start-call-'+row.id).hide();
            }else if (moment().isBefore(datetime)) {
                clearInterval(interval)
                var x = moment(data).fromNow();
                $('#countdown'+row.id).parent().removeClass('blink_me');
                $('#start-call-'+row.id).hide();
                $('#countdown'+row.id).html(x);
            }else {
                clearInterval(interval)
                $('#countdown'+row.id).parent().removeClass('blink_me');
                if (row.status==="open"){
                    $('#start-call-'+row.id).show();
                }else {
                    $('#start-call-'+row.id).hide();
                }
                $('#countdown'+row.id).html(row.status);
            }
        }, 1000);
    }

    $('.app-video').hide();


    $('.scheduled-call').on('click', function () {

    })
    $('.closeAppointment').on('click', function () {
        $('.app-video').removeClass('scale-up-center');
        $('.app-video').hide();
        $('.app-video').addClass('scale-down-center');
    })
    $('.form_btn_click').on('click', function () {
        $('._formcontainer').show();
        $('.videoSection').hide();
        $('.app-video-nav li:not(.inactive)').addClass("inactive");
        $('.app-video-nav li').removeClass("active");
        $(this).removeClass("inactive");
        $(this).addClass("active");
    })

    tail.select(".reulsts", {
        search: false
    });
    tail.select(".testcase", {
        search: true
    });
    tail.select(".physicalCondition", {
        search: true
    });
    tail.select(".symptoms", {
        search: true
    });
    tail.select(".rubeola_measles_titer", {
        search: true
    });
    tail.select(".mumps_titer", {
        search: true
    });
    tail.select(".PPD_QFT", {
        search: true
    });
    tail.select(".result1", {
        search: true
    });
    tail.select(".result2", {
        search: true
    });
    tail.select(".Chest_XRay", {
        search: true
    });
    tail.select(".drug_screening", {
        search: true
    });
    tail.select(".hepatitis_B", {
        search: true
    });
    $('.promptBox').hide(),
        $('.reasonBox').hide(),
        $('.areyousure').on('click', function () {
            $('.promptBox').show()
        })
    $('.yesimsure').on('click', function () {
        $('.promptBox').remove(),
            $('.reasonBox').show()
    })
    $('.rubeola_measles_titer_block').hide();
    $('.mumps_titer_block').hide();
    $('.PPD_QFT_block').hide();
    $('.Chest_XRay_block').hide();
    $('.drug_screening_block').hide();
    $('.hepatitis_B_block').hide();
    $('.testcase').on('change', function () {
        var countries = [];
        $.each($('.testcase option:selected'), function () {
            countries.push(this.value);
        });
        var text = "";
        var i;
        for (i = 0; i < countries.length; i++) {
            if (countries[i] == "Rubeola/Measles Titer") {
                // text += countries[i];
                $('.rubeola_measles_titer_block').show();
            }
            if (countries[i] == "Mumps Titer") {
                // text += countries[i];
                $('.mumps_titer_block').show();
            }
            if (countries[i] == "PPD Or QFT(Circle One)") {
                // text += countries[i];
                $('.PPD_QFT_block').show();
            }
            if (countries[i] == "Chest X-Ray") {
                // text += countries[i];
                $('.Chest_XRay_block').show();
            }
            if (countries[i] == "Drug Screening") {
                // text += countries[i];
                $('.drug_screening_block').show();
            }
            if (countries[i] == "Hepatitis B") {
                // text += countries[i];
                $('.hepatitis_B_block').show();
            }
        }
    })
});
function startVideoCall(id) {
    $('.app-video').addClass('scale-up-center');
    $("#loader-wrapper").show();
    $.ajax({
        url:base_url+'clinician/start-meeting',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data:{
            appointment_id:id
        },
        method:'POST',
        dataType:'json',
        success:function (response) {
            $("#loader-wrapper").hide();
            const sources = response.data;
            setVideoCallinginformation(sources);
            // var meetingConfig={
            //     leaveUrl:base_url+'/clinician/scheduled-appointment',
            //     meetingNumber:sources.meeting.meetingNumber
            // };
            //
            // startMeeting();
        },
        error:function (error) {
            $("#loader-wrapper").hide();
            console.log(error)
        }
    })

    setTimeout(() => {
        $("#loader-wrapper").hide();
        $('.app-video').show();
        $('.app-video').removeClass('scale-down-center');
    }, 1000);
}

function setVideoCallinginformation(data) {
    var userImg = base_url+'assets/img/user/01.png';
    if (data.patients.avatar){
        userImg = base_url+'assets/img/user/'+data.patients.avatar;
    }

    var interval = setInterval(function () {
        var beforeOneHour = moment(data.start_datetime).subtract(1,'hours').format('YYYY-MM-DD HH:mm:ss');
        var datetime = moment(data.start_datetime).format('YYYY-MM-DD HH:mm:ss');
        if (moment().isBetween(beforeOneHour,datetime)){
            var x = moment(data.start_datetime).fromNow();
            $('#countdown-patient').html(x);
        }else if (moment().isBefore(datetime)) {
            var x = moment(data.start_datetime).fromNow();
            $('#countdown-patient').html(x);
        }else {
            clearInterval(interval)
            $('#countdown-patient').html(data.status);
        }
    }, 1000);

    var html='<div class="col-12 col-sm-3">\n' +
        '                                <div class="d-flex">\n' +
        '                                    <div class="mr-2">\n' +
        '                                        <img src="'+userImg+'" class="user_photo" alt="'+data.patients.first_name+'"\n' +
        '                                             srcset="'+userImg+'">\n' +
        '                                    </div>\n' +
        '                                    <div>\n' +
        '                                        <h1 class="title text-info">'+data.patients.first_name+' '+data.patients.last_name+'</h1>\n' +
        '                                        <p class="mt-1">Gender: '+data.patients.gender_name+'</p>\n' +
        '                                    </div>\n' +
        '                                </div>\n' +
        '                            </div>';
    html+='<div class="col-12 col-sm-3">\n' +
        '                                <p><span class="font-weight-bold text-info">Cause Of Appointment:</span> '+data.service.name+'\n' +
        '                                </p>\n' +
        '                                <p class="mt-2"><span class="font-weight-bold text-info">Date & Time:</span>  '+moment(data.start_datetime).format("MM/DD/YYYY HH:mm:ss")+'\n' +
        '                                    </p>\n' +
        '                            </div>';

    html+='<div class="col-12 col-sm-3">\n' +
        '                                <div class="d-flex align-items-center">\n' +
        '                                    <p><span class="font-weight-bold text-info">Duration:</span></p>\n' +
        '                                    <div class="blink_me ml-1">\n' +
        '                                        <div id=\'countdown-patient\'></div>\n' +
        '                                    </div>\n' +
        '                                </div>\n' +
        '                            </div>';

    html+='<div class="col-12 col-sm-3">\n' +
        '                                <p><span class="font-weight-bold text-info">Cause Of Appointment:</span> '+data.service.name+'\n' +
        '                                </p>\n' +
        '                                <p class="mt-2"><span class="font-weight-bold text-info">Date & Time:</span> '+moment(data.start_datetime).format("MM/DD/YYYY HH:mm:ss")+'</p>\n' +
        '                            </div>';

    var htmlAppend='<div class="row">'+html+'</div>';
    $('#patient-information').html(htmlAppend);
}

function onCancelPopup(id) {
    $('#areyousuredialog'+id).show()
}
function onCancelBtn(id) {
    $('#cancel-appointment-model'+id).show();
    $('#areyousuredialog'+id).hide()
}
function saveCancelAppointment(id) {
    var appointment_reason = $("#appointment_reason_"+id).val();
    console.log(appointment_reason,id)
    $('#cancel-appointment-model'+id).hide();
    $("#loader-wrapper").show();
    $.ajax({
        url:base_url+'clinician/change-appointment-status',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data:{
            appointment_id:id,
            reason:appointment_reason
        },
        method:'POST',
        dataType:'json',
        success:function (response) {
            $("#loader-wrapper").hide();
            alert(response.message);
        },
        error:function (error) {
            $("#loader-wrapper").hide();
            console.log(error)
        }
    })
}
