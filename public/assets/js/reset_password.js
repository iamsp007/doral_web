$(function () {
    $.validator.setDefaults({
        submitHandler: function () {
            alert("submitted!");
        }
    });
    $("#resetPasswordForm").validate({
        rules: {
            emailaddress: {
                required: true,
                email: true
            }
        },
        messages: {
            emailaddress: "That address is not a verified primary email or is not associated with a personal user account. Organization billing emails are only for notifications."
        },
        errorElement: "em",
        errorPlacement: function (error, element) {
            // Add the `invalid-feedback` class to the error element
            error.addClass("invalid-feedback");
            if (element.prop("type") === "checkbox") {
                error.insertAfter(element.next("label"));
            } else {
                error.insertAfter(element);
            }
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass("is-invalid").removeClass("is-valid");
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).addClass("is-valid").removeClass("is-invalid");
        }
    });
});