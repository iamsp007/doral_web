$(document).ready(function () {
    var current_fs, next_fs, previous_fs; //fieldsets
    var opacity;
    var current = 1;
    var steps = $("fieldset").length;
    setProgressBar(current);
    $(".next").click(function () {

        if ( ! $('[name="service"]').is(':checked') && $(this).attr('id') == 'service' ) {
            $("span.service").text('Please Select Service').addClass('d-flex justify-content-center align-items-center mt-4');
            return false;
        } else {
            $("span.enrollment").text('').removeClass('d-flex justify-content-center align-items-center mt-4');
        }
//        if ( ! $('[name="services"]').is(':checked') && $(this).attr('id') == 'service' ) {
//            $("span.services").text('Please Select Type Of Services').addClass('d-flex justify-content-center align-items-center mt-4');
//            return false;
//        } else {
//            $("span.services").text('').removeClass('d-flex justify-content-center align-items-center mt-4');
//        }
//        if ( ! $('[name="insurance"]').is(':checked') && $(this).attr('id') == 'ins' ) {
//            $("span.insuran").text('Please Select Insurance Type').addClass('d-flex justify-content-center align-items-center mt-4');
//            return false;
//        } else {
//            $("span.insuran").text('').removeClass('d-flex justify-content-center align-items-center mt-4');
//   
   
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
    $(".submit").click(function () {
        return false;
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
        $("span.insuran").text('').removeClass('d-flex justify-content-center align-items-center mt-4');
    })
    $('select, input').change(function(){
        if ($(this).val() != "") {
            $('span.'+$(this)[0]['name']).text('');
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
        errorPlacement: function(error, element) {
            $("."+element.attr("name")).text(error[0]['innerText']).css('color', 'red');
        },
        submitHandler: function(form) {
            form.submit();
        }
    });
    $('#state').change( function() {
        var val = $(this).val();
        $("#loader-wrapper").show();
        $.ajax({
            url: "filter-cities",
            dataType: 'html',
            data: { state : val },
            success: function(response) {
                $("#loader-wrapper").hide();
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