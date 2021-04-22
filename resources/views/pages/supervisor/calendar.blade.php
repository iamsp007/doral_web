@extends('pages.layouts.app')
@section('title','calendar')
@section('pageTitleSection')
    calendar
@endsection
@section('content')
@include('includes.calendar.head')
<div id='calendar'></div>
@endsection
@push('scripts')
<script src="{{asset('assets/js/jquery.min.js')}}" type="text/javascript"></script>
<script>
        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                timeZone: 'IST',
                defaultView: 'month',
                initialView: 'timeGridDay',
                height: '1000px',
                themeSystem: 'bootstrap4',
                aspectRatio: 2,
                windowResizeDelay: 100,
                stickyHeaderDates: true,
                headerToolbar: {
                    left: 'title',
                    center: '',
                    right: 'dayGridMonth timeGridDay today prev,next'
                },
                initialDate: '2021-04-07',
                expandRows: true,
                navLinks: true, // can click day/week names to navigate views
                selectable: true,
                selectMirror: true,
                selectHelper: true,
                businessHours: false,
                eventColor: '#008591',
//                select: function (arg, start, end, allDay) {
//                    $('.dialogue').modal('show');
//                },
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
//                    timeGridFourDay: {
//                        type: 'timeGrid',
//                        duration: { days: 6 },
//                        buttonText: '4 day'
//                    }
                },
                eventClick: function (arg, event, element) {

                },
                eventRender: function (event, element) {
                },
                eventDidMount: function (info) {
                    console.log(info.el.innerText)
                },
                editable: true,
                dayMaxEvents: true, // allow "more" link when too many events
                events: [
                    {
                        id: 'a',
                        title: 'Blood Pressure',
                        start: '2021-04-08'
                    },
                    {
                        id: 'b',
                        title: 'Blood Sugar',
                        start: '2021-04-08'
                    },{
                        id: 'c',
                        title: 'Plus Oxymeter',
                        start: '2021-04-08'
                    },{
                        id: 'd',
                        title: 'ECG',
                        start: '2021-04-08'
                    },
//                    
//                    {
//                        title: 'Long Event',
//                        start: '2021-02-07',
//                        end: '2021-02-10'
//                    },
                    // {
                    //     groupId: 1,
                    //     title: 'Repeating Event',
                    //     start: '2020-09-09T16:00:00'
                    // },
                    // {
                    //     groupId: 1,
                    //     title: 'Repeating Event',
                    //     start: '2020-09-16T16:00:00'
                    // },
                    // {
                    //     title: 'Conference',
                    //     start: '2020-09-11',
                    //     end: '2020-09-13'
                    // },
                    // {
                    //     title: 'Meeting',
                    //     start: '2020-09-12T10:30:00',
                    //     end: '2020-09-12T12:30:00'
                    // },
                    // {
                    //     title: 'Lunch',
                    //     start: '2020-09-12T12:00:00'
                    // },
                    // {
                    //     title: 'Meeting',
                    //     start: '2020-09-12T14:30:00'
                    // },
                    // {
                    //     title: 'Happy Hour',
                    //     start: '2020-09-12T17:30:00'
                    // },
                    // {
                    //     title: 'Dinner',
                    //     start: '2020-09-12T20:00:00'
                    // },
                    // {
                    //     title: 'Birthday Party',
                    //     start: '2020-09-13T07:00:00'
                    // },
                    // {
                    //     title: 'Click for Google',
                    //     url: 'http://google.com/',
                    //     start: '2020-09-28'
                    // }
                ]
            });
            calendar.render();
        });
        $(function () {
            $(".fc-dayGridMonth-button").trigger('click');
                $(".fc-timeGridDay-button").prop( "disabled", true );
        });
        
    </script>
    
@endpush