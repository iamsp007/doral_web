ZoomMtg.setZoomJSLib('https://source.zoom.us/1.8.5/lib', '/av');


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
                debug: true, //optional
                leaveUrl: 'http://www.zoom.us', //required
                webEndpoint: 'PSO web domain', // PSO option
                showMeetingHeader: false, //option
                disableInvite: false, //optional
                disableCallOut: false, //optional
                disableRecord: false, //optional
                disableJoinAudio: false, //optional
                audioPanelAlwaysOpen: true, //optional
                showPureSharingContent: false, //optional
                isSupportAV: true, //optional,
                isSupportChat: true, //optional,
                isSupportQA: true, //optional,
                isSupportPolling: true, //optional
                isSupportBreakout: true, //optional
                isSupportCC: true, //optional,
                screenShare: true, //optional,
                rwcBackup: '', //optional,
                videoDrag: true, //optional,
                sharingMode: 'both', //optional,
                videoHeader: true, //optional,
                isLockBottom: true, // optional,
                isSupportNonverbal: true, // optional,
                isShowJoiningErrorDialog: true, // optional,
                inviteUrlFormat: '', // optional
                loginWindow: {  // optional,
                    width: 400,
                    height: 380
                },
                meetingInfo: [ // optional
                    'topic',
                    'host',
                    'mn',
                    'pwd',
                    'telPwd',
                    'invite',
                    'participant',
                    'dc',
                    'enctype',
                    'report'
                ],
                disableVoIP: false, // optional
                disableReport: false, // optional
            });

            ZoomMtg.join({
                meetingNumber: response.meetingNumber,
                userName: 'User name',
                userEmail: '',
                passWord: '',
                apiKey: response.api_key,
                signature: response.signature,
                success: function(res){console.log(res)},
                error: function(res){console.log(res)}
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
