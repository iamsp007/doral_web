ZoomMtg.setZoomJSLib('https://source.zoom.us/1.8.5/lib', '/av');

ZoomMtg.preLoadWasm();
ZoomMtg.prepareJssdk();

const zoomMeeting = document.getElementById("zmmtg-root")
function startMeeting(meetConfig){
    $("#loader-wrapper").show();

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url:base_url+'zoom-generate_signature',
        method:'POST',
        data:meetConfig,
        dataType:'json',
        success:function (response) {
            console.log(response)
            ZoomMtg.init({
                leaveUrl: 'http://localhost/doral_web/public/clinician/scheduled-appointment',
                isSupportAV: true,
                success: function(resp) {
                    console.log(resp)
                    ZoomMtg.join({
                        meetingNumber: response.meetingNumber,
                        userName: 'Sunil Karmur',
                        signature: response.signature,
                        apiKey: response.api_key,
                        userEmail: 'response.userEmail',
                        role:response.role,
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
                error(res) {
                    console.log(res)
                }
            })

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
