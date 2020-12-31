$(function () {
    var table = $('#appointment-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: scheduleAppointmentAjax,
        columns:[
            {data:'id',name:'id'},
            {
                data:'patients.first_name',
                name:'patients.first_name',
                "bSortable": true,
                render:function(data, type, row, meta){
                    data = '<a class="text-green" href="'+patient_detail_url+'/'+row.id+'">' + row.patients.first_name +' '+ row.patients.last_name + '</a>';
                    return data;
                }
            },
            {
                data:'patients.gender',
                name:'patients.gender',
                bSortable: true,
                render:function(data, type, row, meta){
                    if (data==="1"){
                        return 'Male';
                    }else if (data==="2"){
                        return 'Female';
                    }
                    return 'Other';
                }
            },
            {data:'service.name',name:'service.name',"bSortable": true},
            {
                data:'patients.dob',
                name:'patients.dob',
                bSortable: true,
                render:function(data, type, row, meta){
                    if (data){
                        return '<div class="text-info">'
                            +data
                            +'</div>';
                    }
                    return '-';
                }
            },
            {
                data:'book_datetime',
                name:'book_datetime',
                "bSortable": true,
                render:function (data, type, row, meta) {
                    if (row.meeting){
                        var interval= setInterval(function(){
                            if (moment(data)>moment(new Date())){
                                var x = moment(data).fromNow(new Date());
                                $("#countdown"+row.id).html(x);
                            }else {
                                $('#meeting-btn-'+row.id).show();
                                $("#countdown"+row.id).html('START!');
                            }
                        }, 1000);
                        return '<div class="blink_me"><div id="countdown'+row.id+'"></div></div>';
                    }
                    return '-';
                }
            },
            {data:'book_datetime',name:'book_datetime',"bSortable": true},
            {data:'action',name:'action',"bSortable": false}
        ],
        "order": [[ 1, "desc" ]],
        'columnDefs': [{
            "targets": [0, 7],
            "orderable": false
        }],
        "pageLength": 10,
        "dom": '<"top"<"float-left pb-3"f><"float-right"l>>rt<"bottom"<"float-left"i><"float-right pb-3"p>><"clear">'
    });
    $(".selectall").click(function () {
        $('#appointment-table td input:checkbox').not(this).prop('checked', this.checked);
    });

    window.onload = function () {
        // setTimeout(function () {
        //     countdown('countdown1', 2, 15);
        //     countdown('countdown2', 12, 60);
        // },1000)

    }

});
$('.app-video').hide();
$('.scheduled-call').on('click', function () {
    console.log(123456)
    $('.app-video').addClass('scale-up-center');
    setTimeout(() => {
        $('.app-video').show();
        $('.app-video').removeClass('scale-down-center');
    }, 1000);
})
$('.closeAppointment').on('click', function () {
    $('.app-video').removeClass('scale-up-center');
    $('.app-video').hide();
    $('.app-video').addClass('scale-down-center');
})
function countdown(element, minutes, seconds) {
    // Fetch the display element
    var el = document.getElementById(element);
    console.log(el)
    // Set the timer
    var interval = setInterval(function () {
        if (seconds == 0) {
            if (minutes == 0) {
                (el.innerHTML = "STOP!");
                clearInterval(interval);
                return;
            } else {
                minutes--;
                seconds = 60;
            }
        }
        if (minutes > 0) {
            var minute_text = (('0' + minutes).slice(-2)) + (minutes > 1 ? ' :' : ' :');
        } else {
            var minute_text = '';
        }
        var second_text = seconds > 1 ? '' : '';
        el.innerHTML = minute_text + ' ' + (('0' + seconds).slice(-2)) + ' ' + second_text + '';
        seconds--;
    }, 1000);
}
