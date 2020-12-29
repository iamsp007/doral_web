var session = OT.initSession(apiKey, sessionId),
    publisher = OT.initPublisher('publisher'),
    archiveID = null;

session.connect(token, function(error) {
    if (error) {
        console.error('Failed to connect', error);
    } else {
        session.publish(publisher, function(error) {
            if (error) {
                console.error('Failed to publish', error);
            }
        });
    }
});

session.on('streamCreated', function(event) {
    session.subscribe(event.stream, 'subscribers', {
        insertMode: 'append'
    }, function(error) {
        if (error) {
            console.error('Failed to subscribe', error);
        }
    });
});

session.on('archiveStarted', function(event) {
    archiveID = event.id;
    console.log('ARCHIVE STARTED');
    $('.start').hide();
    $('.stop').show();
    disableForm();
});

session.on('archiveStopped', function(event) {
    archiveID = null;
    console.log('ARCHIVE STOPPED');
    $('.start').show();
    $('.stop').hide();
    enableForm();
});

$(document).ready(function() {
    $('.start').click(function(event) {
        var options = $('.archive-options').serialize();
        disableForm();
        console.log(options)
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url:'http://localhost/doral_web/public/start',
            data: {
                sessionId:$('input[name="sessionId"]').val()
            },
            method:'POST',
            dataType:'json',
            success:function (response) {
                console.log(response)
            },
            error:enableForm()
        })
        // $.post('http://localhost/doral_web/public/start', options).fail(enableForm);
    }).show();
    $('.stop').click(function(event){
        $.get('stop/' + archiveID);
    }).hide();
});


function disableForm() {
    $('.archive-options-fields').attr('disabled', 'disabled');
}

function enableForm() {
    $('.archive-options-fields').removeAttr('disabled');
}
