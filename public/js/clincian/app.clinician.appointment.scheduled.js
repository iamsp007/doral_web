var table;
var appointment_title;
$(function () {
    table = $('#appointmentScheduled').DataTable({
        processing: true,
        serverSide: true,
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
                data:'patients.gender',
                name:'patients.gender',
                bSortable: true,
                render:function(data, type, row, meta){
                    if (data==="1"){
                        return 'Male';
                    }else if (data==="2"){
                        return 'Female';
                    }
                    return 'Other';
                }
            },
            {data:'service.name',name:'service.name',"bSortable": true},
            {
                data:'patients.dob',
                name:'patients.dob',
                bSortable: true,
                render:function(data, type, row, meta){
                    if (data){
                        return '<div class="text-info">'
                            +data
                            +'</div>';
                    }
                    return '-';
                }
            },
            {
                data:'start_datetime',
                name:'start_datetime',
                bSortable: true,
                render:function (data, type, row, meta) {
                    countdown(row,data);
                    return '<div class="blink_me"><div id="countdown'+row.id+'"></div></div>';
                }
            },
            {data:'status',name:'status',"bSortable": true},
            {
                data:'id',
                name:'id',
                bSortable: false,
                render:function (data, type, row, meta) {

                    var html='';
                    if (row.status!=="completed"){
                        appointment_title = row.title;
                        html+='<button type="button" id="start-call-'+row.id+'" class="single-upload-btn mr-2 scheduled-call" style="display: block;" onclick="startVideoCall('+row.id+',0)">\n' + '<img src="'+base_url+'assets/img/icons/start-vedio.svg" class="icon mr-2">\n' +'Start Meeting</button>';
                        html+='<button type="button" onclick="onAppointmentBroadCast('+row.patient_id+')"'+ 'class="btn btn-broadcast">RoadL Broadcast<span></span>'+'</button>';
                        if (row.status!=="cancel"){
                            html+='<div class="popbox">\n' +
                                '                        <div class="popovers promptBox" id="areyousuredialog'+row.id+'" style="display: none">\n' +
                                '                            <input type="hidden" id="appointment_id" name="appointment_id">\n' +
                                '                            <div class="popovers-inner">\n' +
                                '                                <h3 class="popovers-title mb-2">Are You Sure?</h3>\n' +
                                '                                <div class="popovers-content">\n' +
                                '                                    <div class="d-flex justify-content-start">\n' +
                                '                                        <button type="submit" onclick="onCancelBtn('+row.id+')"\n' +
                                '                                                class="btn btn-outline-purple btn-outline-admin mr-2 yesimsure"\n' +
                                '                                                name="yes">YES</button>\n' +
                                '                                        <button type="submit" onclick="onCancelBtn('+row.id+')"\n' +
                                '                                                class="btn btn-outline-red btn-outline-admin"\n' +
                                '                                                name="no">NO</button>\n' +
                                '                                    </div>\n' +
                                '                                </div>\n' +
                                '                            </div>\n' +
                                '                        </div>\n' +
                                '                        <div class="popovers reasonBox" id="cancel-appointment-model'+row.id+'" style="display: none">\n' +
                                '                            <div class="popovers-inner">\n' +
                                '                                <h3 class="popovers-title mb-2">Reason</h3>\n' +
                                '                                <div class="popovers-content">\n' +
                                '                                          <textarea class="form-control" name="" id="appointment_reason_'+row.id+'" cols="30"\n' +
                                '                                                       rows="5" placeholder="Write your reason"></textarea>\n' +
                                '                                    <button type="submit"\n' +
                                '                                            class="btn btn-primary btn-pink btn-block mt-3"\n' +
                                '                                            onclick="saveCancelAppointment('+row.id+')" name="signup">Save Reason</button>\n' +
                                '                                </div>\n' +
                                '                            </div>\n' +
                                '                        </div>\n' +
                                '                        <button type="button" class="bulk-upload-btn areyousure" onclick="onCancelPopup('+row.id+')">\n' +
                                '                                                            <img src="'+base_url+'assets/img/icons/cancel-button.svg" class="icon mr-2">\n' +
                                '                                                            Cancel</button>\n' +
                                '                    </div>';
                        }

                    }

                    return '<div class="d-flex">'+html+'</div>';
                }
            }
        ],
        "order": [[ 1, "desc" ]],
        'columnDefs': [{
            "targets": [0, 7],
            "orderable": false
        }],
        "pageLength": 10,
        "dom": '<"top"<"float-left pb-3"f><"float-right"l>>rt<"bottom"<"float-left"i><"float-right pb-3"p>><"clear">'
    });
    $(".selectall").click(function () {
        $('#appointmentScheduled td input:checkbox').not(this).prop('checked', this.checked);
    });
    function countdown(row, data) {
        // Fetch the display element
        var el = document.getElementById(row.id);
        var x = moment(data).fromNow();
        $('#countdown'+row.id).parent().removeClass('blink_me');
        $('#start-call-'+row.id).show();
        $('#countdown'+row.id).html(x);
        // Set the timer
        // var interval = setInterval(function () {
        //     var beforeOneHour = moment(data).subtract(1,'hours').format('YYYY-MM-DD HH:mm:ss');
        //     var datetime = moment(data).format('YYYY-MM-DD HH:mm:ss');
        //     console.log(datetime)
        //     if (moment().isBetween(beforeOneHour,datetime)){
        //         var x = moment(data).fromNow();
        //         $('#countdown'+row.id).html(x);
        //         $('#start-call-'+row.id).show();
        //     }else if (moment().isBefore(datetime)) {
        //         clearInterval(interval)
        //         var x = moment(data).fromNow();
        //         $('#countdown'+row.id).parent().removeClass('blink_me');
        //         $('#start-call-'+row.id).show();
        //         $('#countdown'+row.id).html(x);
        //     }else {
        //         clearInterval(interval)
        //         $('#countdown'+row.id).parent().removeClass('blink_me');
        //         // if (row.status==="open"){
        //             $('#start-call-'+row.id).show();
        //         // }else if (row.status==="running"){
        //             $('#join-call-'+row.id).show();
        //         // }else {
        //         //     // $('#start-call-'+row.id).hide();
        //         // }
        //         $('#countdown'+row.id).html(row.status);
        //     }
        // }, 1000);
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
function startVideoCall(id,role) {
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
            if (response.status===true){
                const meeting = response.data.meeting;
                const sources = response.data.appointment;

                setVideoCallinginformation(sources);
                const meetConfig = {
                    apiKey: meeting.apiKey,
                    meetingNumber:parseInt(meeting.meetingNumber),
                    leaveUrl: meeting.leaveUrl,
                    userName: meeting.userName,
                    userEmail: meeting.userEmail, // required for webinar
                    passWord: meeting.passWord, // if required
                    lang: meeting.lang,
                    china: meeting.china,
                    role: parseInt(meeting.role, 10) // 1 for host; 0 for attendee or webinar
                };
                //
                startZoomMeeting(meetConfig);
                setTimeout(() => {
                    $('.app-video').show();
                    $('.app-video').removeClass('scale-down-center');
                }, 1000);
            }else {
                alert(response.message);
            }
        },
        error:function (error) {
            console.log(error)
        }
    })
}

function setVideoCallinginformation(data) {
    var userImg = data.patients.avatar_image;

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
        '                                <div class="d-flex align-items-center">\n' +
        '                                    <div class="mr-2">\n' +
        '                                        <img src="'+userImg+'" class="user_photo" alt="'+data.patients.first_name+'"\n' +
        '                                             srcset="'+userImg+'">\n' +
        '                                    </div>\n' +
        '                                    <div>\n' +
        '                                        <h1 class="title text-info p-0" style="padding:0!important;margin:0!important">'+data.patients.first_name+' '+data.patients.last_name+'</h1>\n' +
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
    $('#cancel-appointment-model'+id).hide();
    $.ajax({
        url:base_url+'clinician/change-appointment-status',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data:{
            appointment_id:id,
            reason_notes:appointment_reason
        },
        method:'POST',
        dataType:'json',
        success:function (response) {
            // $.toast({
            //     heading: 'Cancel Appointment',
            //     text: response.message,
            //     showHideTransition: 'slide',
            //     icon: 'success'
            // })
            table.ajax.reload();
        },
        error:function (error) {
            $.toast({
                heading: 'Cancel Appointment',
                text: 'Invalid Appointment',
                showHideTransition: 'slide',
                icon: 'error'
            })
            console.log(error)
        }
    })
}

$('#md-form').on('change',function (e) {
    $('#green').show();
    $('#orange').hide();
})

function Tabs() {
    var bindAll = function () {
        var menuElements = document.querySelectorAll('[data-tab]');
        for (var i = 0; i < menuElements.length; i++) {
            menuElements[i].addEventListener('click', change, false);
        }
    }
    var clear = function () {
        var menuElements = document.querySelectorAll('[data-tab]');
        for (var i = 0; i < menuElements.length; i++) {
            menuElements[i].classList.remove('active');
            var id = menuElements[i].getAttribute('data-tab');
            document.getElementById(id).classList.remove('active');
        }
    }
    var change = function (e) {
        clear();
        e.target.classList.add('active');
        var id = e.currentTarget.getAttribute('data-tab');
        document.getElementById(id).classList.add('active');
    }
    bindAll();
}
var connectTabs = new Tabs();

function onSavePatientInformation(element) {
    console.log($('input[name="physical_examination_report"]:checked').serialize());
}

function onAppointmentBroadCast(patient_id) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url:base_url+'clinician/patient-request',
        method:'POST',
        data:{
            patient_id:patient_id,
            reason:appointment_title
        },
        dataType:'json',
        success:function (response) {
            alert(response.message)
        },
        error:function (error,responseText) {
            const sources = JSON.parse(error.responseText);
            alert(sources.message)
        }
    })
}
