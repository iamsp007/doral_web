$(function () {
    $('#employee-table').DataTable({
        "order": [],
        'columnDefs': [{
            "targets": [0, 6],
            "orderable": false
        }],
        "pageLength": 10,
        "dom": '<"top"<"float-left pb-3"f><"float-right"l>>rt<"bottom"<"float-left"i><"float-right pb-3"p>><"clear">'
    });
    $(".selectall").click(function () {
        $('#employee-table td input:checkbox').not(this).prop('checked', this.checked);
    });
    function countdown(element, minutes, seconds) {
        // Fetch the display element
        var el = document.getElementById(element);
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
    window.onload = function () {
        countdown('countdown1', 2, 15);
        countdown('countdown2', 12, 60);
    }
});
