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
@php
$event = array();
foreach($response as $dt){
$event[] = array('title'=>'Appoitment Request ('.$dt->total.')','start'=>date('Y-m-d',strtotime($dt->start_datetime)),'end'=>date('Y-m-d',strtotime($dt->end_datetime)));
}
$event=json_encode($event);
@endphp
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
                events: <?php echo $event;?>
            });
            calendar.render();
        });
        $(function () {
            $(".fc-dayGridMonth-button").trigger('click');
                $(".fc-timeGridDay-button").prop( "disabled", true );
        });

    </script>

@endpush