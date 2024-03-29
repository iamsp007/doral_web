﻿﻿$(function () {
    var ajaxURL = "https://app.doralhealthconnect.com/";
  alert('hi');
    var speakerDevices = document.getElementById('speaker-devices');
    var ringtoneDevices = document.getElementById('ringtone-devices');
    var outputVolumeBar = document.getElementById('output-volume');
    var inputVolumeBar = document.getElementById('input-volume');
    var volumeIndicators = document.getElementById('volume-indicators');

    log('Requesting Capability Token...');
    var identity = prompt("Please enter your name", "Jack"); // Geting name of Client

    document.getElementById('button-call').onclick = function () {
    // get the phone number to connect the call to
        var params = {
          To: document.getElementById('phone-number').value,
          outgoing_caller_id : identity
        };

        console.log('Calling ' + params.To + '...');
        Twilio.Device.connect(params);
    };

  
    window.onload = function () { // We will get token on load.
        // get the Client name to connect the call to
    
        if(identity){ // identity is a client name.
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            alert(ajaxURL+"token");
            $.ajax({
                url : ajaxURL+"token", // route
                type : "post",
                dataType : "json",
                data : {
                   identity : identity
                },
                success : function(data){

                    Twilio.Device.setup(data.token);

                    Twilio.Device.ready(function (device) {
                        log('Twilio.Device Ready!');
                        document.getElementById('call-controls').style.display = 'block';
                    });

                    Twilio.Device.error(function (error) {
                        log('Twilio.Device Error: ' + error.message);
                    });

                    Twilio.Device.connect(function (conn) {
                        log('Successfully established call!');
                        document.getElementById('button-call').style.display = 'none';
                        document.getElementById('button-hangup').style.display = 'inline';
                        volumeIndicators.style.display = 'block';
                        bindVolumeIndicators(conn);
                    });

                    Twilio.Device.disconnect(function (conn) {
                        log('Call ended.');
                        document.getElementById('button-call').style.display = 'inline';
                        document.getElementById('button-hangup').style.display = 'none';
                        volumeIndicators.style.display = 'none';
                    });

                    /*Twilio.Device.incoming(function (conn) {
                        
                    });*/

                    Twilio.Device.on('incoming', function(conn) {
                        log('Incoming connection from ' + conn.parameters.From);
                        console.log(conn);
                        
                        // i passed custom param and get through loop
                        conn.customParameters.forEach((val,key) => {
                            if(key == "outgoing_caller_id"){ // calling by. 
                                // We will show name on Popup :
                                document.getElementById("dialog-confirm").title = "Calling from "+ val;

                            }
                        });


                        var archEnemyPhoneNumber = '+12099517118';
                        // console.log();
                        $( "#dialog-confirm" ).dialog({ //jQuery dialog box
                            resizable: false,
                            height: "auto",
                            width: 400,
                            modal: true,
                            buttons: {
                                "Accept": function() {
                                    // accept the incoming connection and start two-way audio
                                    conn.accept();
                                    $( this ).dialog( "close" );
                                },
                                "Reject": function() {
                                    conn.reject();
                                    $( this ).dialog( "close" );
                                }
                              }
                        });
                    });

                    setClientNameUI(data.identity); //print name

                    Twilio.Device.audio.on('deviceChange', updateAllDevices);

                      // Show audio selection UI if it is supported by the browser.
                    if (Twilio.Device.audio.isSelectionSupported) {
                        document.getElementById('output-selection').style.display = 'block';
                    }

                },
                error : function(err){
                    alert("err");
                    log('Could not get a token from server!');
                }
            })
        }else{
            alert("Please choose name");
        }
    };

  // Bind button to hangup call
    document.getElementById('button-hangup').onclick = function () {
        log('Hanging up...');
        Twilio.Device.disconnectAll();
    };

    document.getElementById('get-devices').onclick = function() {
        navigator.mediaDevices.getUserMedia({ audio: true })
          .then(updateAllDevices);
    };

    speakerDevices.addEventListener('change', function() {
        var selectedDevices = [].slice.call(speakerDevices.children)
          .filter(function(node) { return node.selected; })
          .map(function(node) { return node.getAttribute('data-id'); });
        
        Twilio.Device.audio.speakerDevices.set(selectedDevices);
    });

    ringtoneDevices.addEventListener('change', function() {
        var selectedDevices = [].slice.call(ringtoneDevices.children)
          .filter(function(node) { return node.selected; })
          .map(function(node) { return node.getAttribute('data-id'); });
        
        Twilio.Device.audio.ringtoneDevices.set(selectedDevices);
    });

    function bindVolumeIndicators(connection) {
        connection.volume(function(inputVolume, outputVolume) {
          var inputColor = 'red';
          if (inputVolume < .50) {
            inputColor = 'green';
          } else if (inputVolume < .75) {
            inputColor = 'yellow';
          }

          inputVolumeBar.style.width = Math.floor(inputVolume * 300) + 'px';
          inputVolumeBar.style.background = inputColor;

          var outputColor = 'red';
          if (outputVolume < .50) {
            outputColor = 'green';
          } else if (outputVolume < .75) {
            outputColor = 'yellow';
          }

          outputVolumeBar.style.width = Math.floor(outputVolume * 300) + 'px';
          outputVolumeBar.style.background = outputColor;
        });
    }

    function updateAllDevices() {
        updateDevices(speakerDevices, Twilio.Device.audio.speakerDevices.get());
        updateDevices(ringtoneDevices, Twilio.Device.audio.ringtoneDevices.get());
    }
});

// Update the available ringtone and speaker devices
function updateDevices(selectEl, selectedDevices) {
    selectEl.innerHTML = '';
    Twilio.Device.audio.availableOutputDevices.forEach(function(device, id) {
        var isActive = (selectedDevices.size === 0 && id === 'default');
        selectedDevices.forEach(function(device) {
          if (device.deviceId === id) { isActive = true; }
        });

        var option = document.createElement('option');
        option.label = device.label;
        option.setAttribute('data-id', id);
        if (isActive) {
          option.setAttribute('selected', 'selected');
        }
        selectEl.appendChild(option);
    });
}

// Activity log
function log(message) {
    var logDiv = document.getElementById('log');
    logDiv.innerHTML += '<p>&gt;&nbsp;' + message + '</p>';
    logDiv.scrollTop = logDiv.scrollHeight;
}

// Set the client name in the UI
function setClientNameUI(clientName) {
    var div = document.getElementById('client-name');
    div.innerHTML = 'Your client name: <strong>' + clientName +
    '</strong>';
}