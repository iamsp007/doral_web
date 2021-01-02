ZoomMtg.setZoomJSLib('https://source.zoom.us/1.8.5/lib', '/av');

ZoomMtg.i18n.load('en-US');
// other: if you joined meeting and want change language, you need add another api
ZoomMtg.reRender({lang: 'zoom support language or you-lang-name' });


ZoomMtg.preLoadWasm();
ZoomMtg.prepareJssdk();

const zoomMeeting = document.getElementById("zmmtg-root")
function startMeeting(meetingConfig){
    $("#loader-wrapper").show();

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url:base_url+'zoom-generate_signature',
        method:'POST',
        data:meetingConfig,
        dataType:'json',
        success:function (response) {
            $("#loader-wrapper").hide();
            ZoomMtg.init({
                leaveUrl: meetingConfig.leaveUrl,
                webEndpoint: meetingConfig.webEndpoint,
                meetingInfo: ['topic', 'host'],
                isSupportAV: true,
                disableInvite: true,
                success: function () {

                    ZoomMtg.inMeetingServiceListener('onMeetingStatus', function (data) {
                        console.log("onMeetingStatus, status = ",data.meetingStatus);
                    });

                    ZoomMtg.join({
                        meetingNumber: response.meetingNumber,
                        userName: 'userName',
                        signature: response.signature,
                        apiKey: meetingConfig.apiKey,
                        apiSecret: response.apiSecret,
                        userEmail: 'meetingConfig.userEmail',
                        passWord: meetingConfig.passWord,
                        role:meetingConfig.role,
                        success: function (res) {

                            ZoomMtg.getCurrentUser({
                                success: function (res) {
                                    console.log("success getCurrentUser", res.result.currentUser);
                                },
                            });
                            ZoomMtg.inMeetingServiceListener('onUserLeave', function (data) {
                                console.log("onUserLeave");
                            });
                        },
                        error: function (res) {
                            console.log('failed join.', res);
                        },
                    });
                },
                error: function (res) {
                    console.log('failed initialized.', res);
                },
            });

        },
        error:function (error) {
            console.log(error)
        }
    })
}

function beginJoin(signature,meetingConfig) {

    ZoomMtg.init({
        debug:true,
        leaveUrl: meetingConfig.leaveUrl,
        webEndpoint: meetingConfig.webEndpoint,
        success: function (resp) {
            console.log(resp);
            ZoomMtg.join({
                meetingNumber: meetingConfig.meetingNumber,
                userName: meetingConfig.userName,
                signature: signature,
                apiKey: meetingConfig.apiKey,
                userEmail: meetingConfig.userEmail,
                success: function (res) {
                    console.log("join meeting success");
                    console.log("get attendeelist");
                    ZoomMtg.getAttendeeslist({});
                    ZoomMtg.getCurrentUser({
                        success: function (res) {
                            console.log("success getCurrentUser", res.result.currentUser);
                        },
                    });
                },
                error: function (res) {
                    console.log(res,"test");
                },
            });
        },
        error: function (res) {
            console.log(res);
        },
    });

    ZoomMtg.inMeetingServiceListener('onUserJoin', function (data) {
        console.log('inMeetingServiceListener onUserJoin', data);
    });

    ZoomMtg.inMeetingServiceListener('onUserLeave', function (data) {
        console.log('inMeetingServiceListener onUserLeave', data);
    });

    ZoomMtg.inMeetingServiceListener('onUserIsInWaitingRoom', function (data) {
        console.log('inMeetingServiceListener onUserIsInWaitingRoom', data);
    });

    ZoomMtg.inMeetingServiceListener('onMeetingStatus', function (data) {
        console.log('inMeetingServiceListener onMeetingStatus', data);
    });
}

ZoomMtg.inMeetingServiceListener('onUserJoin', function (data) {
    console.log('inMeetingServiceListener onUserJoin', data);
});

ZoomMtg.inMeetingServiceListener('onUserLeave', function (data) {
    console.log('inMeetingServiceListener onUserLeave', data);
});

ZoomMtg.inMeetingServiceListener('onUserIsInWaitingRoom', function (data) {
    console.log('inMeetingServiceListener onUserIsInWaitingRoom', data);
});

ZoomMtg.inMeetingServiceListener('onMeetingStatus', function (data) {
    console.log('inMeetingServiceListener onMeetingStatus', data);
});
