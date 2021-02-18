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
$("#submit").click(function (event) {
    event.preventDefault();
    var employeeID = $("#employeeID").val();
    var firstName = $("#firstName").val();
    var lastName = $("#lastName").val();
    var emailID = $("#emailID").val();
    var phoneNumber = $("#phoneNumber").val();
    var dlNumber = $("#dlNumber").val();
    var dob = $("#dob").val();
    if(employeeID == '') {
        alert('Please Enter Employee ID');
    }else if (firstName == '') {
        alert('Please Enter First Name');
    }else if (lastName == '') {
        alert('Please Enter Last Name');
    }else if (emailID == '') {
        alert('Please Enter Email ID');
    }else if (phoneNumber == '') {
        alert('Please Enter Phone Number');
    }else if (dlNumber == '') {
        alert('Please Enter Driving Licence NUmber');
    }else if (dob == '') {
        alert('Please Enter DOB');
    }else {
        $('.promptBox').show();
    }
})
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
function employeeSave(linkType) {
    $('.promptBox').hide()
    var linkType = $("#linkType").val();
    var employeeID = $("#employeeID").val();
    var firstName = $("#firstName").val();
    var lastName = $("#lastName").val();
    var emailID = $("#emailID").val();
    var phoneNumber = $("#phoneNumber").val();
    var dlNumber = $("#dlNumber").val();
    var dob = $("#dob").val();
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url:"/partner/save-employee",
        method:'POST',
        dataType:'json',
        data:{
            linkType:linkType,
            employeeID:employeeID,
            firstName:firstName,
            lastName:lastName,
            emailID:emailID,
            phoneNumber:phoneNumber,
            dlNumber:dlNumber,
        },
        success:function (response) {
            alert('Employee successfully saved & Sent link registered employee mobile number.');
            location.reload();
        }
        ,
        error:function (error) {
            alert('Employee successfully saved & Sent link registered employee mobile number.');
            location.reload();
        }
        

    });
}
