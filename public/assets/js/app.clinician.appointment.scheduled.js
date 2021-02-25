$(function () {
     $('#appointmentScheduled').DataTable({
        "order": [],
        'columnDefs': [{
            "targets": [0, 6],
            "orderable": false
        }],
        "pageLength": 10,
        "dom": '<"top"<"float-left pb-3"f><"float-right"l>>rt<"bottom"<"float-left"i><"float-right pb-3"p>><"clear">'
    });
   
    $(".selectall").click(function () {
        $('#appointmentScheduled td input:checkbox').not(this).prop('checked', this.checked);
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
        countdown('countdown3', 5, 60);
        countdown('countdown4', 5, 60);
    }
    $('.app-video').hide();
    $('.scheduled-call').on('click', function () {
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
    $('input[name="datePerformed"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        minYear: 1901,
        maxYear: parseInt(moment().format('YYYY'), 10)
    }, function (start, end, label) {
        var years = moment().diff(start, 'years');
        alert("You are " + years + " years old!");
    });
    $('input[name="datePerformed1"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        minYear: 1901,
        maxYear: parseInt(moment().format('YYYY'), 10)
    }, function (start, end, label) {
        var years = moment().diff(start, 'years');
        alert("You are " + years + " years old!");
    });
    $('input[name="datePerformed2"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        minYear: 1901,
        maxYear: parseInt(moment().format('YYYY'), 10)
    }, function (start, end, label) {
        var years = moment().diff(start, 'years');
        alert("You are " + years + " years old!");
    });
    $('input[name="datePerformed5"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        minYear: 1901,
        maxYear: parseInt(moment().format('YYYY'), 10)
    }, function (start, end, label) {
        var years = moment().diff(start, 'years');
        alert("You are " + years + " years old!");
    });
    $('input[name="datePerformed6"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        minYear: 1901,
        maxYear: parseInt(moment().format('YYYY'), 10)
    }, function (start, end, label) {
        var years = moment().diff(start, 'years');
        alert("You are " + years + " years old!");
    });
    $('input[name="datePerformed7"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        minYear: 1901,
        maxYear: parseInt(moment().format('YYYY'), 10)
    }, function (start, end, label) {
        var years = moment().diff(start, 'years');
        alert("You are " + years + " years old!");
    });
    $('input[name="dateOfExamId"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        minYear: 1901,
        maxYear: parseInt(moment().format('YYYY'), 10)
    }, function (start, end, label) {
        var years = moment().diff(start, 'years');
        alert("You are " + years + " years old!");
    });
    $('input[name="dobID"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        minYear: 1901,
        maxYear: parseInt(moment().format('YYYY'), 10)
    }, function (start, end, label) {
        var years = moment().diff(start, 'years');
        alert("You are " + years + " years old!");
    });
    tail.select(".reulsts", {
        search: false
    });
    tail.select(".testcase", {
        search: true
    });
    tail.select(".physicalCondition", {
        search: true
    });
    tail.select(".symptoms", {
        search: true
    });
    tail.select(".rubeola_measles_titer", {
        search: true
    });
    tail.select(".mumps_titer", {
        search: true
    });
    tail.select(".PPD_QFT", {
        search: true
    });
    tail.select(".result1", {
        search: true
    });
    tail.select(".result2", {
        search: true
    });
    tail.select(".Chest_XRay", {
        search: true
    });
    tail.select(".drug_screening", {
        search: true
    });
    tail.select(".hepatitis_B", {
        search: true
    });
    $('.promptBox').hide(),
        $('.reasonBox').hide(),
        $('.areyousure').on('click', function () {
            $('.promptBox').show()
        })
    $('.yesimsure').on('click', function () {
        $('.promptBox').remove(),
            $('.reasonBox').show()
    })
    $('.rubeola_measles_titer_block').hide();
    $('.mumps_titer_block').hide();
    $('.PPD_QFT_block').hide();
    $('.Chest_XRay_block').hide();
    $('.drug_screening_block').hide();
    $('.hepatitis_B_block').hide();
    $('.testcase').on('change', function () {
        var countries = [];
        $.each($('.testcase option:selected'), function () {
            countries.push(this.value);
        });
        var text = "";
        var i;
        for (i = 0; i < countries.length; i++) {
            if (countries[i] == "Rubeola/Measles Titer") {
                // text += countries[i];
                $('.rubeola_measles_titer_block').show();
            }
            if (countries[i] == "Mumps Titer") {
                // text += countries[i];
                $('.mumps_titer_block').show();
            }
            if (countries[i] == "PPD Or QFT(Circle One)") {
                // text += countries[i];
                $('.PPD_QFT_block').show();
            }
            if (countries[i] == "Chest X-Ray") {
                // text += countries[i];
                $('.Chest_XRay_block').show();
            }
            if (countries[i] == "Drug Screening") {
                // text += countries[i];
                $('.drug_screening_block').show();
            }
            if (countries[i] == "Hepatitis B") {
                // text += countries[i];
                $('.hepatitis_B_block').show();
            }
        }
    })
});
function Tabs() {
    var bindAll = function () {
        var menuElements = document.querySelectorAll('[data-tab]');
        for (var i = 0; i < menuElements.length; i++) {
            menuElements[i].addEventListener('click', change, false);
        }
    }
    var clear = function () {
        var menuElements = document.querySelectorAll('[data-tab]');
        for (var i = 0; i < menuElements.length; i++) {
            menuElements[i].classList.remove('active');
            var id = menuElements[i].getAttribute('data-tab');
            document.getElementById(id).classList.remove('active');
        }
    }
    var change = function (e) {
        clear();
        e.target.classList.add('active');
        var id = e.currentTarget.getAttribute('data-tab');
        document.getElementById(id).classList.add('active');
    }
    bindAll();
}
var connectTabs = new Tabs();