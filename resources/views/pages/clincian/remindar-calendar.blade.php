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

foreach($response['dataremindar'] as $dtr){
$time = explode('-',$dtr->start_end_time);
$starttime = trim($time[0]);
$endtime = trim($time[1]);
$event[] = array('id'=>$dtr->id,'title'=>$dtr->title,'start'=>$dtr->startdate.'T'.$starttime,'end'=>$dtr->startdate.'T'.$endtime,'startTimeORG'=>$starttime,'endTimeORG'=>$endtime,'notes'=>$dtr->notes,'cat_id'=>$dtr->cat_id,'sub_cat_id'=>$dtr->sub_cat_id); 
}
$event=json_encode($event);
@endphp
<div class="modal fade fade2 dialogue" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Remindar</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row gutter">
                            <div class="col-12 col-sm-12">
                                <label for="_title" class="label">Title</label>
                                <div class="input-group">
                                    <span class="input-group-text input-group-text-custom" id="admissionId">
                                        <i class="las la-heading"></i>
                                    </span>
                                    <input type="text" class="form-control form-control-lg" id="_title" name="_title"
                                        aria-describedby="_titleHelp">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                         <div class="row gutter">
                            <div class="col-12 col-sm-6">
                                <label for="_patient" class="label">Category</label>
                                <div class="input-group">
                                    <select class="form-control form-control-lg" name="cat_id" id="_cat_id">
                                        <option value="">-Select-</option>
                                        @foreach($response['datacat'] as $datacat)
                                        @if($datacat->parent_id == 0)
                                        <option value="{{$datacat->id}}">{{$datacat->name}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                             <div class="col-12 col-sm-6">
                                <label for="_patient" class="label">Sub category</label>
                                <div class="input-group">
                                    <select class="form-control form-control-lg" name="sub_cat_id" id="_sub_cat_id">
                                        <option value="">-Select-</option>
                                    </select>
                                </div>
                            </div>
                         </div>
                    </div>
                    <div class="form-group">
                         <div class="row gutter">
                            <div class="col-12 col-sm-6">
                                <label for="_datetime" class="label"> Date</label>
                                <div class="input-group">
                                    <span class="input-group-text input-group-text-custom" id="admissionId">
                                        <i class="las la-calendar-alt"></i>
                                    </span>
                                    <input  type="text" class="form-control form-control-lg" id="_datetime"
                                        name="_datetime" aria-describedby="_datetimeHelp">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <label for="_datetime" class="label"> Start End Time </label>
                                <div class="input-group">
                                    <span class="input-group-text input-group-text-custom" id="admissionId">
                                        <i class="las la-calendar-alt"></i>
                                    </span>
                                    <input  type="text" class="form-control form-control-lg _time" id="_time"
                                        name="_time" aria-describedby="__timemeHelp">
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
                    <input type="hidden" name="id" id="_id" value="">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="save-event">Save changes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
</div>
<link rel="stylesheet" href="{{asset('assets/css/daterangepicker.min.css')}}">

<script src="{{asset('assets/js/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/daterangepicker.min.js')}}"></script>

<script>
    var now = new Date();
    var sel_time = [] ;
    var myArray = [] ;
     var myArray = <?php echo $event;?>;
        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                timeZone: 'EST',
                defaultView: 'day',
                initialView: 'timeGridDay',
                height: '1000px',
                themeSystem: 'bootstrap4',
                aspectRatio: 2,
                windowResizeDelay: 100,
                stickyHeaderDates: true,
                headerToolbar: {
                    left: 'title',
                    center: '',
                    right: 'dayGridMonth timeGridWeek timeGridDay today prev,next'
                },
                initialDate: '<?php echo base64_decode(request()->route("date"));?>',
                expandRows: true,
                navLinks: true, 
                selectable: true,
                selectMirror: true,
                selectHelper: true,
                businessHours: false,
                eventColor: '#008591',
                select: function (arg, start, end, allDay) {
                $("#_id").val('');
                $("#_title").val('');
                $("#_cat_id").val('');
                $("#_sub_cat_id").html('');
                $("#_notes").val('');
                var current_date = new Date();
                    var selectDate = arg.startStr.split('T')[0];
                    $("#_datetime").val(moment(selectDate).format("M/DD/YYYY"));
                    $('#_time').val('');
                    jQuery.noConflict();
                    $('.dialogue').modal('show');
                    var now = new Date(arg.start);
                   var utc = new Date(now.getTime() + now.getTimezoneOffset() * 60000);
                   var utcDate_start = new Date(new Date(arg.startStr).toUTCString());
                   var utcDate_end = new Date(new Date(arg.endStr).toUTCString());
                   var start_time = utcDate_start.toTimeString();
                   start_time = start_time.split(' ')[0];

                   var end_time = utcDate_end.toTimeString();
                   end_time = end_time.split(' ')[0];
                   var current_sel_date = moment(utc).format("HH:mm:ss")+'-'+end_time;

                  $('#_time').val(current_sel_date);

                },
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
                    timeGridFourDay: {
                        type: 'timeGrid',
                        duration: { days: 6 },
                        buttonText: '4 day'
                    }
                },
                
                eventClick: function (event, jsEvent, view) {
                     var result = $.grep(myArray, function(e){  
                         return e.id == event.event._def.publicId; 
                     });
                     $("#_id").val(event.event._def.publicId);
                     $("#_title").val(result[0].title);
                     $("#_notes").val(result[0].notes);
                     $("#_cat_id").val(result[0].cat_id);
                     var cat_id = $('#_cat_id').val();
                        
                            $("#_sub_cat_id").html('');
                             var datacat = <?php echo json_encode($response['datacat']);?>;
                            var html = '';
                            for(i=0;i<datacat.length;i++){
                                if(cat_id == datacat[i].parent_id){
                                 html+='<option value="'+datacat[i].id+'">'+datacat[i].name+'</option>';
                                }
                            }
                            $("#_sub_cat_id").html(html);
                     
                     $("#_sub_cat_id").val(result[0].sub_cat_id);
                      var main_date = result[0].start+"-"+result[0].end;

                    var d = new Date(result[0].start);
                    var years = d.getFullYear();
                    var month = d.getMonth()+1;
                    var day = d.getDate();
                    
                        var orignal_startdate = month+"/"+day+"/"+years;
                        var odate = orignal_startdate;
                        var otime = result[0].startTimeORG+'-'+result[0].endTimeORG;
                        
                        $("#_datetime").val(odate)
                        $("#_time").val(otime)
                        jQuery.noConflict();
                        if(event.event._def.publicId !=''){
                            $('.dialogue').modal('show');
                        }
                },
                eventRender: function (event, element) {
                },
                eventDidMount: function (info) {
                    console.log(info.el.innerText)
                },
                editable: true,
                dayMaxEvents: true,
                events: <?php echo $event;?>
            });
            calendar.render();
        });
        $(function () {
        var base_url = "<?php echo url('/');?>";
            $('input[name="_datetime"]').daterangepicker({
                singleDatePicker: true,
                 defaultDate: moment().format("M/DD/YYYY"),
                locale: {
                   format: 'M/DD/YYYY'
                }
            });

            $('input[name="_time"]').daterangepicker({
                timePicker: true,
                timePicker24Hour: true,
                timePickerIncrement: 1,
                timePickerSeconds: true,
                locale: {
                   format : 'HH:mm:ss'
                }
            }).on('show.daterangepicker', function (ev, picker) {
            picker.container.find(".calendar-table").hide()});
        });
        
        $("#save-event").click(function(){
            var id = $('#_id').val();
            var user_id = '1';
            var title = $('#_title').val();
            var cat_id = $('#_cat_id').val();
            var sub_cat_id = $('#_sub_cat_id').val();
            var notes = $('#_notes').val();
            var time = $('#_time').val();
            var orignal_startdate = $("#_datetime").val();
            var orignal_startdate = moment(orignal_startdate).format('YYYY-MM-DD');
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
           //url:base_url+"clinician/save-calendar",
           url:'http://127.0.0.1:8000/clinician/save-calendar',
           method:"POST",
           data:{'id':id,'user_id':user_id,'title':title,'cat_id':cat_id,'sub_cat_id':sub_cat_id,'notes':notes,'start_end_time':time,'startdate':orignal_startdate},
           success:function(data)
           {
             alertText(data.message);
             //window.location = base_url+"calendar";
             //window.location = "http://127.0.0.1:8000/clinician/calendar";
             location.reload();
           }
          });

        })
         $(function () {
            var i=0;
            $('#_cat_id').change(function(){
                $("#_sub_cat_id").html('');
                 var datacat = <?php echo json_encode($response['datacat']);?>;
                var html = '';
                for(i=0;i<datacat.length;i++){
                    if($(this).val() == datacat[i].parent_id){
                     html+='<option value="'+datacat[i].id+'">'+datacat[i].name+'</option>';
                    }
                }
                $("#_sub_cat_id").html(html);
            });
         });
    </script>
    
@endpush