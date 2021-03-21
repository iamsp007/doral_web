$(document).ready(function(){
    $("#loader-wrapper").hide();

    if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register(base_url+'js/firebase-messaging-sw.js')
            .then(function(registration) {
                // console.log('Registration successful, scope is:', registration.scope);
                const config = {
                    apiKey: "AIzaSyCRAJgZT7W43PSBlhKIu_0uN58Onqb_o7w",
                    projectId: "doctorapp-b4032",
                    messagingSenderId: "409560615341",
                    appId: "1:409560615341:web:5d352036d35e5a5aed3924"
                };
                firebase.initializeApp(config);
                const messaging = firebase.messaging();
                messaging.useServiceWorker(registration)
                messaging
                    .requestPermission()
                    .then(function () {
                        // console.log("Notification permission granted.");

                        // get the token in the form of promise
                        return messaging.getToken()
                    })
                    .then(function(token) {
                        // print the token on the HTML page
                        $("#loader-wrapper").show();
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url:save_token_url,
                            method:'POST',
                            dataType:'json',
                            data:{
                                device_token:token
                            },
                            success:function (response) {
                                $("#loader-wrapper").hide();
                            },
                            error:function (error) {
                                // console.log(error.responseJSON.status+': '+error.responseJSON.message);
                                $("#loader-wrapper").hide();
                            }
                        })
                    })
                    .catch(function (err) {
                        // console.log("Unable to get permission to notify.", err);
                    });

                messaging.onMessage(function(payload) {
                    // var data = JSON.parse(payload.notification.body);
                    const noteTitle = payload.notification.title;
                    const noteOptions = {
                        body: noteTitle,
                        icon: payload.notification.icon,
                    };

                    new Notification(noteTitle, noteOptions).onclick = function (event) {

                        if (payload.data['gcm.notification.notification_type']==='1'){
                            window.location.href=base_url+'clinician/start-roadl/'+payload.data.id;
                        }else if (payload.data['gcm.notification.notification_type']==="2"){
                            window.location.href=base_url+'clinician/running-roadl/'+payload.data.id;
                        }else if (payload.data['gcm.notification.notification_type']==="3"){
                            window.location.href=base_url+'clinician/scheduled-appointment';
                        }else if (payload.data['gcm.notification.notification_type']==="4"){
                            window.location.href=base_url+'clinician/scheduled-appointment';
                        }
                    };
                });

            }).catch(function(err) {
            // console.log('Service worker registration failed, error:', err);
        });
    }

    var patientResult = $('#patientResultTable').DataTable({
        searching: false,
        "processing": true,
        "language": {
            processing: '<div id="loader-wrapper"><div class="overlay"></div><div class="pulse"></div></div>'
        },
        "serverSide": true,
        ajax: base_url+'all-patient-list',
        columns:[
//            {data:'id',name:'id'},
            {data:'id',name:'id',"bSortable": true},
            {
                data:'full_name',
                name:'first_name',
                "bSortable": true,
                render:function(data, type, row, meta){
                    return '<a href="'+base_url+'patient-details/'+row.id+'">'+data+'</a>';
                }
            },
            {
                data:'patient_detail.ssn',
                name:'patient_detail.ssn',
                "bSortable": false,
                render:function(data, type, row, meta){
                    if (data){
                        return data;
                    }
                    return '--';
                }
            },
            {
                data:'dob',
                name:'dob',
                "bSortable": true,
                render:function(data, type, row, meta){
                    if (data){
                        return data;
                    }
                    return '--';
                }
            },
            {
                data:'patient_detail.service.name',
                name:'patient_detail.service.name',
                "bSortable": false
            },
            {
                data:'gender_name',
                name:'gender_name',
                "bSortable": false,
            },
            {
                data:'patient_detail.address_1',
                name:'patient_detail.address_1',
                "bSortable": false,
                render:function(data, type, row, meta){
                    if (data){
                        return data;
                    }
                    return '--';
                }
            },
            {
                data:'patient_detail.city',
                name:'patient_detail.city',
                "bSortable": false,
                render:function (data, type, row, meta) {
                    if (row.patient_detail){
                        return row.patient_detail.city+ ' - '+row.patient_detail.state;
                    }
                    return '-';
                }
            },
            {
                data:'patient_detail.Zip',
                name:'patient_detail.Zip',
                "bSortable": false,
                render:function(data, type, row, meta){
                    if (data){
                        return data;
                    }
                    return '--';
                }
            },
            {
                data:'id',
                name:'id',
                "bSortable": true,
                render:function(data, type, row, meta){
                    return ' <div class="d-flex justify-content-end">\n' +
                        '                                    <button type="button" class="btn btn--active btn--fixed--w mr-2">Active</button>\n' +
                        '                                    <button type="button" class="btn btn--call mr-2">\n' +
                        '                                        <img src="'+base_url+'new/assets/img/icons/call.svg" class="actives" alt="" srcset="">\n' +
                        '                                        <img src="'+base_url+'new/assets/img/icons/active_call.svg" class="inactives" alt=""\n' +
                        '                                             srcset="">\n' +
                        '                                    </button>\n' +
                        '                                    <button type="button" class="btn btn--video mr-2">\n' +
                        '                                        <img src="'+base_url+'new/assets/img/icons/video.svg" class="actives" alt="" srcset="">\n' +
                        '                                        <img src="'+base_url+'new/assets/img/icons/active_video.svg" class="inactives" alt=""\n' +
                        '                                             srcset=""></button>\n' +
                        '                                    <button type="button" class="btn btn--dark" onclick="onBroadCastOpen('+row.id+')">Rodal Start</button>\n' +
                        '                                </div>';
                }
            },
        ],
        "order": [[ 1, "desc" ]],
        "pageLength": 10,
        "lengthMenu": [ [5, 10,20, 25,100, -1], [5, 10,20, 25,100, "All"] ],
        'columnDefs': [
            {
                targets: 0,
                'searchable': false,
                'orderable': false,
                'width': '1%',
                'className': 'dt-body-center',
                'render': function (data, type, full, meta){
                    return '<input type="checkbox">';
                }
            }
        ],
        'select': {
            'style': 'multi'
        },
    });

    patientResult.on( 'draw', function () {
        $('.dataTables_wrapper .dataTables_paginate .paginate_button').addClass('custompagination');
    });
});
