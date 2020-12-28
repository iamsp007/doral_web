
ZoomMtg.setZoomJSLib('https://dmogdx0jrul3u.cloudfront.net/1.8.5/lib', '/av');

ZoomMtg.preLoadWasm();
ZoomMtg.prepareJssdk

const zoomMeeting = document.getElementById("zmmtg-root")




$.ajax({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    url:base_url+'zoom-generate_signature',
    method:'POST',
    dataType:'json',
    success:function (response) {
        console.log(response)
        const meetConfig = {
            apiKey: response.apiKey,
            meetingNumber: response.meetingNumber,
            leaveUrl: 'https://yoursite.com/meetingEnd',
            userName: response.userName,
            userEmail: response.userEmail,
            passWord: 'password', // if required
            role: 0 // 1 for host; 0 for attendee
        };
        ZoomMtg.init({
            leaveUrl: meetConfig.leaveUrl,
            isSupportAV: true,
            success: function() {
                console.log("succeeded")
                ZoomMtg.join({
                    signature: response.signature,
                    apiKey: meetConfig.apiKey,
                    meetingNumber: meetConfig.meetingNumber,
                    userName: meetConfig.userName,
                    // password optional; set by Host
                    passWord: meetConfig.passWord,
                    error(res) {
                        console.log(res)
                    }
                })
            },
            error: (error) => {
                console.log(error)
            }
        })
        // ZoomMtg.join({
        //     signature: response.signature,
        //     meetingNumber: response.meetingNumber,
        //     userName: response.userName,
        //     apiKey: response.apiKey,
        //     userEmail: response.userEmail,
        //     passWord: response.password,
        //     success: (success) => {
        //         console.log(success)
        //     },
        //     error: (error) => {
        //         console.log(error)
        //     }
        // })
    },
    error:function (error) {
        console.log(error)
    }
})
