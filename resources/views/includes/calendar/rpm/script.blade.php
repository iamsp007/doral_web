@include('includes.calendar.head')

<div id='calendar2'></div>
<div class="modal fade fade2 dialogue" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Book Appointment</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row gutter">
                            <div class="col-12 col-sm-3">
                                <label for="_title" class="label">Title</label>
                                <div class="input-group">
                                    <span class="input-group-text input-group-text-custom" id="admissionId">
                                        <i class="las la-heading"></i>
                                    </span>
                                    <input type="text" class="form-control form-control-lg" id="_title" name="_title"
                                        aria-describedby="_titleHelp">
                                </div>
                            </div>
                            <div class="col-12 col-sm-3">
                                <label for="_patient" class="label">Patient Name</label>
                                <div class="input-group">
                                    <span class="input-group-text input-group-text-custom" id="admissionId">
                                        <i class="las la-user-tie"></i>
                                    </span>
                                    <input type="text" class="form-control form-control-lg" id="_patient"
                                        name="_patient" aria-describedby="_patientHelp">
                                </div>
                            </div>
                            <div class="col-12 col-sm-3">
                                <label for="_provider" class="label">Provider</label>
                                <div class="input-group">
                                    <span class="input-group-text input-group-text-custom" id="admissionId">
                                        <i class="las la-microscope"></i>
                                    </span>
                                    <input type="text" class="form-control form-control-lg" id="_provider"
                                        name="_provider" aria-describedby="_providerHelp">
                                </div>
                            </div>
                            <div class="col-12 col-sm-3">
                                <label for="_provider1" class="label">Provider PA/MA</label>
                                <div class="input-group">
                                    <span class="input-group-text input-group-text-custom" id="admissionId">
                                        <i class="las la-microscope"></i>
                                    </span>
                                    <input type="text" class="form-control form-control-lg" id="_provider1"
                                        name="_provider1" aria-describedby="_provider1Help">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row gutter">
                            <div class="col-12 col-sm-6">
                                <label for="_service" class="label">Service</label>
                                <div class="input-group">
                                    <span class="input-group-text input-group-text-custom" id="admissionId">
                                        <i class="las la-capsules"></i>
                                    </span>
                                    <input type="text" class="form-control form-control-lg" id="_service"
                                        name="_service" aria-describedby="_serviceHelp">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <label for="_datetime" class="label">Start Date & Time - End Date & Time</label>
                                <div class="input-group">
                                    <span class="input-group-text input-group-text-custom" id="admissionId">
                                        <i class="las la-calendar-alt"></i>
                                    </span>
                                    <input type="text" class="form-control form-control-lg" id="_datetime"
                                        name="_datetime" aria-describedby="_datetimeHelp">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="row">
                            <div class="col-12">
                                <label for="_notes" class="label">Notes</label>
                                <textarea class="form-control form-control-lg" name="_notes" id="_notes"
                                    rows="5"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="save-event">Save changes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
   
<script>
        var phpVar = <?php echo json_encode($userDeviceLogs); ?>;
        var columnDaTa = [];

        $.each(phpVar, function (key, value) {
            columnDaTa.push(
                {
                    id: value['id'],
                    url: value['user_device']['patient_id'],
                    title: value['user_device']['device_result'] + '(' + value['value'] + ')',
                    start: value['view_date']
                },
            );
        });
       
        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar2');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                timeZone: 'IST',
                initialView: 'timeGridDay',
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
                initialDate: '2021-09-01',
                expandRows: true,
                navLinks: true,
                selectable: true,
                selectMirror: true,
                selectHelper: true,
                businessHours: false,
                eventColor: '#008591',

                buttonText: {
                    today: 'Today',
                    month: 'Month',
                    week: 'Week',
                    day: 'Day',
                    list: 'List'
                },
                views: {
                    dayGridMonth: {
                        titleFormat: { year: 'numeric', month: 'short', day: 'numeric' }
                    },
                },
                eventClick: function(info) {
                    // var eventObj = info.event;
                    // location.href = "{{ Route('ccm.index') }}";
                    // alert("{{url('ccm')}}/" + eventObj.url + "/" + eventObj.start);
                    // $.ajax({
                    //     type: "GET",
                    //     url: "{{url('ccm')}}",
                      
                    //     // success: function (data) {
                    //     //    alert(data);
                    //     // },
                    // });
                },
                eventRender: function (event, element) {
                },
                eventDidMount: function (info) {
                    console.log(info.el.innerText)
                },
                editable: true,
                dayMaxEvents: true,
                events: 
                    columnDaTa
                    
            });
            calendar.render();
        });
        $(function () {
            $('input[name="_datetime"]').daterangepicker({
                timePicker: true,
                startDate: moment().startOf('hour'),
                endDate: moment().startOf('hour').add(32, 'hour'),
                locale: {
                    format: 'M/DD hh:mm A'
                }
            });
        });
        function calendarClick() {
            setTimeout(function(){ 
                $(".fc-dayGridMonth-button").trigger('click');
                $(".fc-timeGridDay-button").prop( "disabled", true );
            }, 1000);
        }
    </script>
    
    <style>
        .fc-non-business{pointer-events: none!important;}
    </style>