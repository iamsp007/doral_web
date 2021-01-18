ZoomMtg.setZoomJSLib("https://jssdk.zoomus.cn/1.8.3/lib", "/av"); // china cdn option
ZoomMtg.preLoadWasm();
ZoomMtg.prepareJssdk();

const zoomMeeting = document.getElementById("zmmtg-root")

function startZoomMeeting(meetConfig) {
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
            beginJoin(response.signature,meetConfig)
        },
        error:function (error) {
            console.log(error)
        }
    })
}

function beginJoin(signature,meetingConfig) {
    console.log(JSON.stringify(ZoomMtg.checkSystemRequirements()));
    ZoomMtg.init({
        leaveUrl: meetingConfig.leaveUrl,
        webEndpoint: meetingConfig.webEndpoint,
        success: function () {
            $.i18n.reload(meetingConfig.lang);
            ZoomMtg.join({
                meetingNumber: meetingConfig.meetingNumber,
                userName: meetingConfig.userName,
                signature: signature,
                apiKey: meetingConfig.apiKey,
                userEmail: meetingConfig.userEmail,
                passWord: meetingConfig.passWord,
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
                    console.log(res);
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
        alert(123)
        console.log('inMeetingServiceListener onUserLeave', data);
    });

    ZoomMtg.inMeetingServiceListener('onUserIsInWaitingRoom', function (data) {
        console.log('inMeetingServiceListener onUserIsInWaitingRoom', data);
    });

    ZoomMtg.inMeetingServiceListener('onMeetingStatus', function (data) {
        console.log('inMeetingServiceListener onMeetingStatus', data);
    });
}
