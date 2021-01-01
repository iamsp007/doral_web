$(function () {
    var referralTypeCombo = $(".js-example-matcher-start"),
        ReferralTypeInsurance = $("#ReferralTypeInsurance"),
        ReferralTypeOther = $("#ReferralTypeOther"),
        insurance = $('#insurance'),
        homecare = $('#homecare'),
        other = $('#other');
    insurance.show(),
        homecare.hide(),
        other.hide()
    tail.select(".js-example-matcher-start", {
        search: true
    });
    tail.select(".hsbc", {
        search: true
    });
    referralTypeCombo.on('change', function () {
        this.value == 'Insurance' && (insurance.show(), homecare.hide(), other.hide());
        this.value == 'Home Care' && (insurance.hide(), homecare.show(), other.hide())
        this.value == 'Others' && (insurance.hide(), homecare.hide(), other.show());
    })
    $.validator.setDefaults({
        submitHandler: function () {
            alert("submitted!");
        }
    });
    ReferralTypeInsurance.validate({
        onkeyup: function (element) {
            console.log(element)
        },
        rules: {
            referralType: {
                required: true
            },
            company: "required",
            email: {
                required: true,
                email: true
            }
        },
        messages: {
            referralType: "Please select refferal type",
            company: "Please enter company name",
            email: "Please enter a valid email address"
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


    ReferralTypeOther.validate({
        onkeyup: function (element) {
            console.log(element)
        },
        rules: {
            fname: {
                required: true
            },
            lname: {
                required: true
            },
            email1: {
                required: true,
                email: true
            }
        },
        messages: {
            fname: "Please enter first name",
            lname: "Please enter last name",
            email1: "Please enter a valid email address"
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