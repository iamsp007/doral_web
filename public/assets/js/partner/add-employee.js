$('.promptBox').hide(),
$('input[name="dob"]').daterangepicker({
    singleDatePicker: true,
    showDropdowns: true,
    minYear: 1901,
    maxYear: parseInt(moment().format('YYYY'), 10)
}, function (start, end, label) {
    var years = moment().diff(start, 'years');
    alert("You are " + years + " years old!");
});
$('select, input').change(function(){
    if ($(this).val() != "") {
        $('span.'+$(this)[0]['name']).text('');
    }
});
$("#addEmployee").validate({
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
        // $("#loader-wrapper").show();
        // $.ajax({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     },
        //     url:"/partner/save-employee",
        //     method:'POST',
        //     dataType:'json',
        //     data:{
        //         linkType:linkType,
        //         employeeID:employeeID,
        //         firstName:firstName,
        //         lastName:lastName,
        //         emailID:emailID,
        //         phoneNumber:phoneNumber,
        //         dlNumber:dlNumber,
        //         dob:dob
        //     },
        //     success:function (response) {
        //         $("#loader-wrapper").hide();
        //         alert('Employee successfully saved & Sent link registered employee mobile number.');
        //         location.reload();
        //     }
        //     ,
        //     error:function (error) {
        //         $("#loader-wrapper").hide();
        //         alert('Employee successfully saved & Sent link registered employee mobile number.');
        //         location.reload();
        //     }
            

        // });
    }
});
$('.shareBox').on('click', 'a', function (params) {
    $(this).addClass('active');
    $(this).prev().removeClass('active');
    $(this).next().removeClass('active');
})
$('.closeBox').on('click', function () {
    $('.promptBox').hide();
})
function directSendLink() {
    var phoneNumber = $("#directLinkPhoneNumber").val();
    if(phoneNumber == '') {
        alert('Please Enter Phone Number');
    }else {
        alert('Mobile Application Link Successfully Sent.');
    }
}
function saveLinkType (type) {
    $("#linkType").val(type);
}