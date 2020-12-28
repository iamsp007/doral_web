ZoomMtg.setZoomJSLib('https://dmogdx0jrul3u.cloudfront.net/1.8.5/lib', '/av');

ZoomMtg.preLoadWasm();
ZoomMtg.prepareJssdk();

const zoomMeeting = document.getElementById("zmmtg-root")
function startMeeting(meetingNumber){
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url:base_url+'zoom-generate_signature',
        method:'POST',
        data:{
            meeting_number:meetingNumber
        },
        dataType:'json',
        success:function (response) {
            // console.log(response)
            const meetConfig = {
                apiKey: response.apiKey,
                meetingNumber: response.meetingNumber,
                leaveUrl: base_url+'clinician/roadl',
                userName: response.userName,
                userEmail: response.userEmail,
                passWord: 'password', // if required
                role: 0 // 1 for host; 0 for attendee
            };
            var signature = ZoomMtg.generateSignature({
                meetingNumber: meetConfig.meetingNumber,
                apiKey: meetConfig.apiKey,
                apiSecret: response.api_secret,
                role: meetConfig.role,
                success: function (res) {
                    // console.log(res);
                    meetConfig.signature = res.result;
                    meetConfig.apiKey = response.apiKey;
                    beginJoin(signature,meetConfig)
                },
                error:function (error) {
                    console.log(error)
                }
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
        webEndpoint: meetingConfig.leaveUrl,
        success: function () {
            console.log(meetingConfig);
            ZoomMtg.join({
                meetingNumber: meetingConfig.meetingNumber,
                userName: meetingConfig.userName,
                signature: meetingConfig.signature,
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
