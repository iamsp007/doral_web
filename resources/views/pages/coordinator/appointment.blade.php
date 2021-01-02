@extends('pages.layouts.app')
@section('title','Book Appointment')
@section('pageTitleSection')
    Book Appointment
@endsection

@section('content')
    <div id="calendar"></div>
@endsection
@section('popup')
    <div id="book_app_popup"></div>
@endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/daterangepicker.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.css">
@endpush

@push('scripts')
    <script src="{{ asset('assets/js/daterangepicker.min.js') }}"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
    <script>
        $(document).ready(function() {


            $('#calendar').fullCalendar({
                defaultView: 'agendaDay',
                selectable: true,
                defaultTimedEventDuration: '00:15:00',
                minTime: "08:00:00",
                maxTime: "23:00:00",
                slotDuration: '00:30:00',
                slotLabelInterval: 15,
                slotLabelFormat: 'h(:mm)a',
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'agendaDay,agendaWeek,agendaMonth'
                },
                businessHours: [{
                    dow: [1, 2, 3, 4, 5], // Monday - Friday
                    start: '08:00',
                    end: '12:00',
                }, {
                    dow: [1, 2, 3, 4, 5], // Monday - Friday (if adding lunch hours)
                    start: '13:00',
                    end: '17:00',
                }],
                selectConstraint: "businessHours",
                select: function(start, end, jsEvent, view) {
                    if (start.isAfter(moment())) {

                        var eventTitle = prompt("Provide Event Title");
                        if (eventTitle) {
                            $("#calendar").fullCalendar('renderEvent', {
                                title: eventTitle,
                                start: start,
                                end: end,
                                stick: true
                            });
                            alert('Appointment booked at: ' + start.format("h(:mm)a"));
                        }
                    } else {
                        alert('Cannot book an appointment in the past');
                    }
                },
                eventClick: function(calEvent, jsEvent, view) {
                    alert('Event: ' + calEvent.title);
                }
            });
        });
    </script>
    @endpush
