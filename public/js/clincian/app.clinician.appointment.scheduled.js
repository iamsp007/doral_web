$(function () {
    var table = $('#appointment-table').DataTable({
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
                    data = '<a class="text-green" href="'+patient_detail_url+'/'+row.id+'">' + row.patients.first_name +' '+ row.patients.last_name + '</a>';
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
                "bSortable": true,
                render:function (data, type, row, meta) {
                    setInterval(function(){
                        var x = moment(data).fromNow();
                        $("#countdown"+row.id).html(x);
                    }, 1000);
                    return '<div class="blink_me"><div id="countdown'+row.id+'"></div></div>';
                }
            },
            {data:'start_datetime',name:'start_datetime',"bSortable": true},
            {data:'action',name:'action',"bSortable": false}
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
        $('#appointment-table td input:checkbox').not(this).prop('checked', this.checked);
    });
    $('.app-video').hide();
    $('.scheduled-call').on('click', function () {

    })
    $('.closeAppointment').on('click', function () {
        $('.app-video').removeClass('scale-up-center');
        $('.app-video').hide();
        $('.app-video').addClass('scale-down-center');
    })
});

function openMeetingDialog(appointment_id) {
    $("#loader-wrapper").show();
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url:base_url+'clinician/start-meeting',
        method:'POST',
        data:{
            appointment_id:appointment_id
        },
        dataType:'json',
        success:function (response) {
            if (response.status===true){
                const sources = response.data;
                var booking_date = moment(sources.start_datetime).format('MM/DD/YYYY HH:mm:ss')
                setPatientVideoHtml(sources.patients,sources.service,booking_date)
                $("#loader-wrapper").hide();
                $('.app-video').addClass('scale-up-center');
                console.log(JSON.parse(sources.meeting.zoom_response))
                setTimeout(() => {
                    const meetConfig = {
                        lang:'en',
                        apiKey: 'cQacFfoJ9uQwgJQA06eYliJgoC1WkCoQ8FP1',
                        meetingNumber: sources.meeting.meeting_id.toString(),
                        leaveUrl: base_url+'clinician/scheduled-appointment',
                        userName: sources.title,
                        passWord: JSON.parse(sources.meeting.zoom_response).encrypted_password,
                        role: "1" // 1 for host
                    };

                    startMeeting(meetConfig);
                    $('.app-video').show();
                    $('.app-video').find('.app-video-body').find('.app-video-right').show();
                    $('.app-video').removeClass('scale-down-center');
                }, 1000);
            }
        },
        error:function (error) {
            console.log(error)
        }
    });

}

function setPatientVideoHtml(data,service,booking_date) {
    var user_img =base_url+'assets/img/user/01.png';
    var html='<div class="row">\n' +
        '                            <div class="col-12 col-sm-3">\n' +
        '                                <div class="d-flex">\n' +
        '                                    <div class="mr-2">\n' +
        '                                        <img src="'+user_img+'" class="user_photo" alt=""\n' +
        '                                             srcset="'+user_img+'">\n' +
        '                                    </div>\n' +
        '                                    <div>\n' +
        '                                        <h1 class="title text-info">'+data.first_name+' '+data.last_name+'</h1>\n' +
        '                                        <p class="mt-1">Gender: '+data.gender_name+'</p>\n' +
        '                                    </div>\n' +
        '                                </div>\n' +
        '                            </div>\n' +
        '                            <div class="col-12 col-sm-3">\n' +
        '                                <p><span class="font-weight-bold text-info">Cause Of Appointment:</span> '+service.name+'</p>\n' +
        '                                <p class="mt-2"><span class="font-weight-bold text-info">Date & Time:</span> '+booking_date+'</p>\n' +
        '                            </div>\n' +
        '                            <div class="col-12 col-sm-3">\n' +
        '                                <div class="d-flex align-items-center">\n' +
        '                                    <p><span class="font-weight-bold text-info">Duration:</span></p>\n' +
        '                                    <div class="blink_me ml-1">\n' +
        '                                        <div id=\'countdown3\'></div>\n' +
        '                                    </div>\n' +
        '                                </div>\n' +
        '                            </div>\n' +
        '                            <div class="col-12 col-sm-3">\n' +
        '                                <p><span class="font-weight-bold text-info">Cause Of Appointment:</span> '+service.name+'\n' +
        '                                </p>\n' +
        '                                <p class="mt-2"><span class="font-weight-bold text-info">Date & Time:</span> '+booking_date+'</p>\n' +
        '                            </div>\n' +
        '                        </div>';
    $('#patient-information').html(html);
    $('#patient_detail_url').attr('href',patient_detail_url+'1');
}
