// $('.promptBox').hide()

$(document).ready(function () {

    $('input[name="dob"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        minYear: 1901,
        maxYear: parseInt(moment().format('YYYY'), 10)
    }, function (start, end, label) {
        var years = moment().diff(start, 'years');
        alert("You are " + years + " years old!");
    })

    $('select, input').change(function(){
        if ($(this).val() != "") {
            $('span.'+$(this)[0]['name']).text('');
        }
    })

    $("#addEmployee,#editEmployee").validate({
        rules: {
            employeeID: "required",
            firstName: "required",
            lastName: "required",
            emailID: "required",
            phoneNumber: "required",
            dlNumber: "required",
            dob: "required",
        },
        errorPlacement: function(error, element) {
            $("span."+element.attr("name")).text(error[0]['innerText']).css('color', 'red');
        },
        submitHandler: function(form) {
            form.submit();
        }
    })

    $('#close,#android,#ios').on('click', function () {
        $('.promptBox').hide();
    })
});
