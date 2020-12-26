<script src="//cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/moment@2.24.0/min/moment.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/fullcalendar@3.10.2/dist/fullcalendar.min.js"></script>

<script src="{{ asset( 'assets/js/bootstrap.min.js' ) }}"></script>
<script src="{{ asset( 'assets/js/jquery.validate.min.js' ) }}"></script>
<script src="{{ asset( 'assets/js/login.min.js' ) }}"></script>
<script>
    
    var SITEURL = "@php echo url('/');@endphp";    
    var appointments = @php echo json_encode($appointments);@endphp;
    $(document).ready(function() {
        $(".btn").click(function() {
            $("#largeModal").modal("show");
        });
    });
    jQuery(document).ready(function($) {
        var calendar = $('#calendar').fullCalendar({
            editable: true,
            selectable: true,
            
            selectHelper: true,
            navLinks: true, // can click day/week names to navigate views
            editable: true,
            eventLimit: 48, // allow "more" link when too many events
            displayEventTime: true,
            editable: true,
            eventColor: 'green',
            slotDuration: '00:30:00',            
            //defaultView: 'agendaWeek',
            defaultView: 'month',
            firstDay: 1,
            slotEventOverlap: false,
            agendaEventMinHeight: 1,
            weekends: true,
            slotLabelInterval: 30,
            slotLabelFormat:"HH:mm",
            //selectOverlap:true,

            header: {
                left: 'prev,next today custom1',
                center: 'title',
                //right: 'month,agendaWeek,agendaDay'
                right: 'month,agendaDay'
            },
            dayClick: function(date, jsEvent, view) {

                /*alert('Clicked on: ' + date.format());
                alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
                alert('Current view: ' + view.name);
                // change the day's background color just for fun
                $(this).css('background-color', 'red');*/
                $('#calendar').fullCalendar('gotoDate', date);
                $('#calendar').fullCalendar('changeView', 'agendaDay');
                //$('#calendar').fullCalendar( 'unselect' );
                 $('#calendar').fullCalendar('render');
            },

            /*customButtons: {
                custom1: {
                    text: 'Add Appointment',
                    click: function() {
                        $.ajax({
                            url: "{{ route('appointment.create') }}",
                            //data: 'title=' + title + '&start=' + start + '&end=' + end,
                            type: "get",
                            success: function(data) {
                                $("#largeModal .modal-body").html(data);
                                $("#largeModal .modal-title").html("Book Appoinment");
                                //displayMessage("Added Successfully");
                                //$('#calendar').fullCalendar('removeEvents');
                                //$('#calendar').fullCalendar('refetchEvents');
                                $("#largeModal").modal("show");
                            }
                        });
                    }
                }
            },*/
            events: appointments,
            //events: SITEURL + "calendar",
            eventRender: function(event, element, view) {
                if (event.allDay === 'true') {
                    event.allDay = true;
                } else {
                    event.allDay = false;
                }
            },
            select: function(start, end, allDay) {


                var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
                var patient_id = @php echo $patientId; @endphp;
                var d2 = new Date( start );
                var d1 = new Date( end );
                var diffMs = ( d2- d1);
                var diffMins = Math.round(((diffMs % 86400000) % 3600000) / 60000);                
                if( diffMins != 0 ){
                    
                    var provider_pa_ma = 1;
                    var provider = 1;
                    $.ajax({
                        url: "{{ route('appointment.create') }}",
                        data: 'start=' + start + '&end=' + end + '&patient_id=' + patient_id + '&provider_pa_ma=' + provider_pa_ma + '&provider=' + provider,
                        type: "get",
                        success: function(data) {
                            $("#largeModal .modal-body").html(data);
                            $("#largeModal .modal-title").html("Book Appoinment");
                            //displayMessage("Added Successfully");
                            //$('#calendar').fullCalendar('removeEvents');
                            //$('#calendar').fullCalendar('refetchEvents');
                            $("#largeModal").modal("show");

                        }
                    });
                }
                //calendar.fullCalendar('unselect');
            },
            eventDrop: function(event, delta) {
                alert( "test" );
                var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                $.ajax({
                    url: SITEURL + '/fullcalendareventmaster/update',
                    data: 'title=' + event.title + '&start=' + start + '&end=' + end + '&id=' + event.id,
                    type: "POST",
                    success: function(response) {
                        displayMessage("Updated Successfully");
                    }
                });
            },
            eventClick: function(event) {
                /*var deleteMsg = confirm("Do you really want to delete?");
                if (deleteMsg) {
                    $.ajax({
                        type: "POST",
                        url: SITEURL + '/fullcalendareventmaster/delete',
                        data: "&id=" + event.id,
                        success: function(response) {
                            if (parseInt(response) > 0) {
                                $('#calendar').fullCalendar('removeEvents', event.id);
                                displayMessage("Deleted Successfully");
                            }
                        }
                    });
                }*/
            }
        });
        
        $( "body" ).on("click","#btn_create_appointment",function( e ){

            e.preventDefault();
            alert( "asdf" );
            /*$( '#btn_create_appointment' ).attr('disabled','disabled');
            var frm_data = $("#create_appointment_frm").serialize();            
            $.ajax({
                url: SITEURL + '/co-ordinator/appointment/store',
                data: frm_data,
                type: "POST",
                success: function(response) {

                    if( response.data !== undefined && response.data.appointment !== undefined && response.data.appointment.title !== undefined ){
                        calendar.fullCalendar('renderEvent', {
                                title: response.data.appointment.title,
                                start: response.data.appointment.start_datetime,
                                end: response.data.appointment.end_datetime
                            },
                            true
                        );
                        $(".alert-success").show();
                        $(".alert-danger").hide();                        

                        $("#successResponse").text('Inserted Successfully');
                        setTimeout(function(){
                           $("#largeModal").modal("hide");
                        }, 2000);                        
                        //displayMessage("Inserted Successfully");
                    }else{
                        
                        $(".alert-danger").show();
                        $("#errorResponse").text('Required appointment title');
                        $(".alert-success").hide();
                        setTimeout(function(){                            
                            $(".alert-danger").hide();
                        }, 5000);
                    }
                    $( '#btn_create_appointment' ).removeAttr("disabled");
                }
            });*/
        });
        
    });
</script>