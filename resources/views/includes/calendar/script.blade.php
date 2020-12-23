<script src="//cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/moment@2.24.0/min/moment.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/fullcalendar@3.10.2/dist/fullcalendar.min.js"></script>

<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.validate.min.js"></script>
<script src="assets/js/login.min.js"></script>

<script>
    SITEURL = 'http://127.0.0.1:8080/';
    appointments = @php echo json_encode($appointments);
    @endphp;
    console.log(appointments);
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
            eventLimit: true, // allow "more" link when too many events
            displayEventTime: true,
            editable: true,
            eventColor: 'green',
            slotDuration: '00:15:00',
            //defaultView: 'agendaWeek',
            defaultView: 'month',
            firstDay: 1,
            slotEventOverlap: false,
            agendaEventMinHeight: 1,
            weekends: true,
            slotLabelFormat:"HH:mm",
            header: {
                left: 'prev,next today custom1',
                center: 'title',
                //right: 'month,agendaWeek,agendaDay'
                right: 'month,agendaDay'
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
                var patient_id = 1;
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
                calendar.fullCalendar('renderEvent', {
                        title: title,
                        start: start,
                        end: end,
                        allDay: allDay
                    },
                    true
                );

                calendar.fullCalendar('unselect');
            },
            eventDrop: function(event, delta) {
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
                var deleteMsg = confirm("Do you really want to delete?");
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
                }
            }
        });

        $( "body" ).on("click","#btn_create_appointment",function( e ){            
            
            e.preventDefault();
            var frm_data = $("#create_appointment_frm").serialize();
            console.log( frm_data );//$( this ).serialize() );
        
            SITEURL = "http://localhost/project/doral_web/public";
            $.ajax({
                url: SITEURL + '/appointment/store',
                data: frm_data,
                type: "POST",
                success: function(response) {
                    displayMessage("Updated Successfully");
                }
            });

            /*calendar.fullCalendar('renderEvent', {
                    title: "test",
                    start: start,
                    end: end,
                    allDay: allDay
                },
                true
            );*/
            /*$.ajax({
                url: SITEURL + '/fullcalendareventmaster/update',
                data: 'title=' + event.title + '&start=' + start + '&end=' + end + '&id=' + event.id,
                type: "POST",
                success: function(response) {
                    displayMessage("Updated Successfully");
                }
            });*/
        });
    });
</script>