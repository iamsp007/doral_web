@extends('pages.layouts.app')
@section('title','Book Appointment')
@section('pageTitleSection')
    Book Appointment
@endsection

@section('content')
    <div id="calendar"></div>
@endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/daterangepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/calendar/lib/main.css') }}">
    <style>
        #calendar {
            max-width: 1100px;
            margin: 0 auto;
        }
    </style>
@endpush

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="{{ asset('assets/calendar/lib/main.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                timeZone: 'IST',
                initialView: 'dayGridMonth',
                height: '100%',
                themeSystem: 'bootstrap4',
                aspectRatio: 2,
                windowResizeDelay: 100,
                stickyHeaderDates: true,
                headerToolbar: {
                    left: 'title',
                    center: '',
                    right: 'dayGridMonth timeGridDay today prev,next'
                },
                expandRows: true,
                navLinks: true, // can click day/week names to navigate views
                selectable: true,
                selectMirror: true,
                selectHelper: true,
                businessHours: false,
                eventColor: '#008591',
                select: function(arg) {
                    if(moment(arg.start).isBefore(moment())) {
                        calendar.unselect();
                        return false;
                    }

                    if (arg.view.type==="timeGridDay"){

                        return false;
                    }

                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url:'{{ route("coordinator.calender.timeslot") }}',
                        method:'POST',
                        data:{
                            date:moment(arg.start).format('YYYY-MM-DD')
                        },
                        dataType:'json',
                        success:function (response) {
                            var events=[];
                            if (response.status===true){
                                if (response.data.length>0){
                                    response.data.map(function (value) {
                                        events.push({
                                            id:value.id,
                                            start: moment(value.time).format('YYYY-MM-DD HH:mm'),
                                            end:moment(value.time).add(30,'minutes').format('YYYY-MM-DD HH:mm'),
                                            backgroundColor:'#FFFFFF',
                                            allDay: false
                                        })
                                    })
                                    calendar.removeAllEvents();
                                    calendar.addEventSource(events)
                                    calendar.changeView('timeGridDay',moment(arg.start).format('YYYY-MM-DD'))
                                }else {
                                    alert("This Date Clinician Not Available")
                                }
                            }
                        },
                        error:function (error) {

                        }
                    })
                    calendar.unselect()

                },
                eventClick: function(info) {
                    var eventObj = info.event;
                    var date = moment(info.event.startStr).format('YYYY-MM-DD HH:mm');
                    if (eventObj.id){
                        createAppointment(date,eventObj.id);
                    }

                    // $('.dialogue').modal('show');
                },
                eventDidMount: function (info) {
                  //  console.log(info.el)
                },

                editable: true,
                dayMaxEvents: true, // allow "more" link when too many events
                events: [],
                buttonText: {
                    today: 'Today',
                    month: 'Month',
                    week: 'Week',
                    day: 'Day',
                    list: 'List'
                },
                views: {
                    dayGridMonth: { // name of view
                        titleFormat: { year: 'numeric', month: 'short', day: 'numeric' }
                        // other view-specific options here
                    },
                    timeGridFourDay: {
                        type: 'timeGrid',
                        duration: { days: 6 },
                        buttonText: '4 day'
                    }
                },
            });

            calendar.render();
        });

        function createAppointment(date,ids) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url:'{{ route("coordinator.appointment.store") }}',
                method:'POST',
                data:{
                    book_datetime:date,
                    patient_id:'{{ $patientId }}',
                    clinician_ids:ids
                },
                dataType:'json',
                success:function (response) {
                    alert(response.message)
                },
                error:function (request, status, error) {
                    const sources = JSON.parse(request.responseText);
                    alert(sources.message)
                }
            })
        }

    </script>
    @endpush
