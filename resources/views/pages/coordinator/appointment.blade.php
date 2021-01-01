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
     
@endpush

@push('scripts')
    
    
    <script>
        var SITEURL = "@php echo url('/');@endphp";    
        var appointments = @php echo json_encode($appointments);@endphp;
        var calendernew;

        document.addEventListener("DOMContentLoaded", function() {
            var calendarEl = document.getElementById('calendar');
            
            calendernew = new FullCalendar.Calendar(calendarEl, {

                height: "100%",
                themeSystem: "bootstrap4",
                aspectRatio: 2,
                windowResizeDelay: 100,
                stickyHeaderDates: !0,
                headerToolbar: {
                    left: "title",
                    center: "",
                    right: "dayGridMonth today prev,next"
                },                
                buttonText: {
                    today: "Today",
                    month: "Month",
                    week: "Week",
                    day: "Day",
                    list: "List"
                },
                views: {                    
                    dayGridMonth: {
                        titleFormat: {
                            year: "numeric",
                            month: "short",
                            day: "numeric"
                        }
                    } 
                },
                initialDate: "2020-09-12",
                expandRows: !0,
                navLinks: !0,
                selectable: !0,
                selectMirror: !0,
                selectHelper: !0,
                businessHours: !0,
                eventColor: "#008591",
                slotDuration: '00:30:00',
                editable: !0,
                dayMaxEvents: !0,                
                eventLimit: !0,
                events: appointments,                
                select: function(t, e, n, a) {
                    var start = t.start;
                    var end = t.end;
                    var d2 = new Date( start );
                    var s_mnth = ("0" + (d2.getMonth() + 1)).slice(-2),
                     s_day = ("0" + d2.getDate()).slice(-2);
                     s_hours  = ("0" + d2.getHours()).slice(-2);
                     s_minutes = ("0" + d2.getMinutes()).slice(-2);
                     new_start_date = [d2.getFullYear(), s_mnth, s_day].join("-")+' '+s_hours+':'+s_minutes+':00';

                    
                    var d1 = new Date( end );
                    var e_mnth = ("0" + (d1.getMonth() + 1)).slice(-2),
                     e_day = ("0" + d1.getDate()).slice(-2);
                     e_hours  = ("0" + d1.getHours()).slice(-2);
                     e_minutes = ("0" + d1.getMinutes()).slice(-2);
                     new_end_date = [d1.getFullYear(), e_mnth, e_day].join("-")+' '+e_hours+':'+e_minutes+':00';

                    var diffMs = ( d2- d1);
                    var diffMins = Math.round(((diffMs % 86400000) % 3600000) / 60000);
                    var patient_id = @php echo $patientId; @endphp;
                    if( diffMins != 0 ){                        
                        var provider_pa_ma = 1;
                        var provider = 1;
                        $.ajax({
                            url: "{{ route('coordinator.appointment.create') }}",
                            data: 'start=' + new_start_date + '&end=' + new_end_date + '&patient_id=' + patient_id + '&provider_pa_ma=' + provider_pa_ma + '&provider=' + provider,
                            type: "get",
                            success: function(data) {
                                $("#book_app_popup").html(data);
                                //$("#book_app_popup").html("Book Appoinment");
                                //displayMessage("Added Successfully");
                                //$('#calendar').fullCalendar('removeEvents');
                                //$('#calendar').fullCalendar('refetchEvents');
                                setTimeout( function(){
                                    $("#largeModal").modal("show");    
                                },500 );
                                
                                //$(".dialogue").modal("show");

                            }
                        });
                        
                    }else{ 
                        calendernew.changeView( 'timeGrid', {
                          start: start,
                          end: end
                        })
                         //$('#calendar').fullCalendar('changeView', 'agendaDay'); 
                        //calendernew.changeView("timeGridDay");
                        //calendernew.agendaDay("2017-06-01");
                    }
                },
                eventClick: function(t, e, n) {},
                eventRender: function(t, e) {},
                eventDidMount: function(t) {
                    console.log(t.el.innerText)
                },                
                eventDrop: function (event, delta) {
                        alert(event.title + ' was moved ' + delta + ' days\n' +
                            '(should probably update your database)');
                }
            });
        calendernew.render();
        
    }), $(function() {
        $('input[name="_datetime"]').daterangepicker({
            timePicker: !0,
            startDate: moment().startOf("hour"),
            endDate: moment().startOf("hour").add(32, "hour"),
            locale: {
                format: "M/DD hh:mm"
            }
        }); 
    });


        $( "body" ).on("click","#btn_create_appointment",function( e ){

            e.preventDefault();
            
            $( '#btn_create_appointment' ).attr('disabled','disabled');
            var frm_data = $("#create_appointment_frm").serialize();            
            $.ajax({
                url: SITEURL + '/co-ordinator/appointment/store',
                data: frm_data,
                type: "POST",
                success: function(response) {

                    if( response.data !== undefined && response.data.appointment !== undefined && response.data.appointment.title !== undefined ){
                        calendernew.addEvent( {
                            title: response.data.appointment.title,
                            start: response.data.appointment.start_datetime,
                            end: response.data.appointment.end_datetime
                        });
                        calendernew.render();
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
            });
        });

    </script>
    @endpush