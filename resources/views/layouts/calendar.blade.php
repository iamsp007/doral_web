<!DOCTYPE html>
<html lang="en">

<head>
    <script type="text/javascript">
    var appoinments = '{{ $record }}';
    var appoinments = [{
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
            ];
    </script>
    @include('includes.calendar.head')
</head>

<body>
    <!-- Header Section Start -->
    @include('includes.header')
    <!-- Header Section End -->
    <!-- Middle Section Start -->
    <section>
        <div class="container">
            <div class="response alert alert-success mt-2" style="display: none;"></div>
            <div id='calendar'></div>
        </div>
        <!-- Large modal -->
        <button class="btn btn-lg btn-primary">Large modal</button>

        <div id="largeModal" class="modal fade" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Large Modal</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>Add the <code>.modal-lg</code> class on <code>.modal-dialog</code> to create this large modal.</p>
                    </div>                    
                </div>
            </div>
        </div>
        
        @yield('content')
    </section>
    <!-- Middle Section End -->
    <!-- Footer Section Start -->
    @include('includes.footer')
    <!-- Footer Section End -->
    @include('includes.calendar.script')
</body>

</html>