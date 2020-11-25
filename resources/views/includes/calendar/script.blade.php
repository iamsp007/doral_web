<script src="//cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/moment@2.24.0/min/moment.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/fullcalendar@3.10.2/dist/fullcalendar.min.js"></script>

<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.validate.min.js"></script>
<script src="assets/js/login.min.js"></script>

<script>
    SITEURL = 'http://127.0.0.1:8080/';
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
            defaultView:'agendaWeek',
            firstDay: 1,
            slotEventOverlap:false,
            agendaEventMinHeight:1,
            weekends: true,
            header: {
                left: 'prev,next today custom1',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            customButtons: {
                custom1: {
                    text: 'Add Appointment',
                    click: function() {
                        $("#largeModal").modal("show");
                        
                    }
                }
            },
            events: [{
                    title: 'All Day Event',
                    start: '2020-11-01'
                },
                {
                    title: 'Long Event',
                    start: '2020-10-07',
                    end: '2020-11-10',
                    color: 'purple' // override!
                },
                {
                    groupId: '999',
                    title: 'Repeating Event',
                    start: '2020-11-09T16:00:00'
                },
                {
                    groupId: '999',
                    title: 'Repeating Event',
                    start: '2020-11-16T16:00:00'
                },
                {
                    title: 'Conference',
                    start: '2020-11-11',
                    end: '2020-11-13',
                    color: 'purple' // override!
                },
                {
                    title: 'Meeting',
                    start: '2020-11-12T10:30:00',
                    end: '2020-11-12T12:30:00'
                },
                {
                    title: 'Lunch',
                    start: '2020-11-12T12:00:00'
                },
                {
                    title: 'Meeting',
                    start: '2020-11-12T14:30:00'
                },
                {
                    title: 'Birthday Party',
                    start: '2020-11-13T07:00:00',
                    allDay: false
                },
                {
                    title: 'Click for Google',
                    url: 'http://google.com/',
                    start: '2020-11-28'
                }
            ],
            //events: SITEURL + "calendar",
            eventRender: function(event, element, view) {
                if (event.allDay === 'true') {
                    event.allDay = true;
                } else {
                    event.allDay = false;
                }
            },
            select: function(start, end, allDay) {
                var title = prompt('Event Title:');
                alert("Select");

                if (title) {
                    var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                    var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");

                    $.ajax({
                        url: SITEURL + "/fullcalendareventmaster/create",
                        data: 'title=' + title + '&start=' + start + '&end=' + end,
                        type: "POST",
                        success: function(data) {
                            displayMessage("Added Successfully");
                            $('#calendar').fullCalendar('removeEvents');
                            $('#calendar').fullCalendar('refetchEvents');
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
                }
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
    });
</script>