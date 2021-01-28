$(document).ready(function () {
    var current_fs, next_fs, previous_fs; //fieldsets
    var opacity;
    var current = 1;
    var steps = $("fieldset").length;
    setProgressBar(current);
    $(".next").click(function () {
        current_fs = $(this).parent();
        next_fs = $(this).parent().next();
        //Add Class Active
        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
        //show the next fieldset
        next_fs.show();
        //hide the current fieldset with style
        current_fs.animate({ opacity: 0 }, {
            step: function (now) {
                // for making fielset appear animation
                opacity = 1 - now;
                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                next_fs.css({ 'opacity': opacity });
            },
            duration: 500
        });
        setProgressBar(++current);
    });
    $(".previous").click(function () {
        current_fs = $(this).parent();
        previous_fs = $(this).parent().prev();
        //Remove class active
        $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
        //show the previous fieldset
        previous_fs.show();
        //hide the current fieldset with style
        current_fs.animate({ opacity: 0 }, {
            step: function (now) {
                // for making fielset appear animation
                opacity = 1 - now;
                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                previous_fs.css({ 'opacity': opacity });
            },
            duration: 500
        });
        setProgressBar(--current);
    });
    function setProgressBar(curStep) {
        var percent = parseFloat(100 / steps) * curStep;
        percent = percent.toFixed();
        $(".progress-bar")
            .css("width", percent + "%")
    }
    // $(".submit").click(function () {
    //     return false;
    // })
});

$(function () {
    $('input[name="dob"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        minYear: 1901,
        maxYear: parseInt(moment().format('YYYY'), 10)
    }, function (start, end, label) {
        var years = moment().diff(start, 'years');
        alert("You are " + years + " years old!");
    });
    $('.existing_patient').hide()
    $('[name="enrollment"]').on('change', function (e) {
        e.preventDefault();
        if ($(this).val() == 'boarding') {
            // alert('boarding')
            $('.existing_patient').hide()
        }
        if ($(this).val() == 'existing_patient') {
            // alert('boarding')
            $('.existing_patient').show()
        }
    })
    $('input[name="creation_date"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        minYear: 1901,
        maxYear: parseInt(moment().format('YYYY'), 10)
    }, function (start, end, label) {
        var years = moment().diff(start, 'years');
        alert("You are " + years + " years old!");
    });
    $('.if-CDPAP').hide()
    $('[name="services"]').on('change', function (e) {
        e.preventDefault();
        if ($(this).val() == 'cdpap') {
            $('.if-CDPAP').show()
        }
        if ($(this).val() == 'lhcsa') {
            $('.if-CDPAP').hide()
        }
    })
    $('.on_hmo').hide()
    $('[name="insurance"]').on('change', function (e) {
        e.preventDefault();
        if ($(this).val() == 'hmo') {
            $('.on_hmo').show()
        }
        if ($(this).val() == 'mltc') {
            $('.on_hmo').hide()
        }
    })
    $('select, input').change(function(){
        if ($(this).val() != "") {
            if ($(this).attr("name") == 'state') {
                $('span.state_error').text('');
            } else if ($(this).attr("name") == 'city') {
                $('span.city_error').text('');
            } else {
                $('span.'+$(this)[0]['name']).text('');
            }
        }
    });
    $("#msform").validate({
        rules: {
            first_name: "required",
            middle_name: "required",
            last_name: "required",
            gender: "required",
            dob: "required",
            ssn: "required",
            medicare_number: "required",
            medicaid_number: "required",
            address_1: "required",
            city: "required",
            state: "required",
            Zip: "required",
        },
        messages: {},
        errorPlacement: function(error, element) {
            if (element.attr("name") == "city") {
                $(".city_error").text(error[0]['innerText']).css('color', 'red');
            } else if (element.attr("name") == "state") {
                $(".state_error").text(error[0]['innerText']).css('color', 'red');
            } else {
                $("."+element.attr("name")).text(error[0]['innerText']).css('color', 'red');
            }
        },
        submitHandler: function(form) {
            form.submit();
        }
    });
    $('#state').change( function() {
        var val = $(this).val();
        $.ajax({
            url: "filter-cities",
            dataType: 'html',
            data: { state : val },
            success: function(response) {
                var obj = jQuery.parseJSON(response);
                var city_options = [];
                $.each(obj, function(key,value) {
                    var newOption = '<option value="' + value.id + '">' + value.city + '</option>';
                    city_options.push(newOption);
                });
                $('#city').html( city_options );
            }
        });
    });
});