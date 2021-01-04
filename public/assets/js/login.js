$(function () {
    $.validator.setDefaults({
        submitHandler: function () {
            alert("submitted!");
        }
    });
    $("#loginForm").validate({
        rules: {
            username: {
                required: true,
                minlength: 2
            },
            password: {
                required: true,
                minlength: 5
            }
        },
        messages: {
            username: {
                required: "Please enter a username",
                minlength: "Your username must consist of at least 2 characters"
            },
            password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long"
            }
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
$(".toggle-password").click(function() {
    $('.pass-show').click(function (event) {
        $(".pass-hide").addClass('d-block').removeClass('d-none');
        $(".pass-show").addClass('d-none').removeClass('d-block');

    });
    $('.pass-hide').click(function (event) {
        $(".pass-hide").addClass('d-none').removeClass('d-block');
        $(".pass-show").addClass('d-block').removeClass('d-none');

    });
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
      input.attr("type", "text");
    } else {
      input.attr("type", "password");
    }
});