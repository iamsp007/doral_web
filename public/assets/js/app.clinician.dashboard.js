$(function () {
    $("#datepicker").datepicker();
    $('.owl-carousel').owlCarousel({
        loop: false,
        autoplay: false,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        margin: 10,
        nav: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 5
            }
        }
    })
});
$(document).ready(function(){
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url:"clinician/ccm-reading-level-high",
        method:'GET',
        dataType:'json',
        success:function (response) {
            if (typeof response.data[0] !== undefined) {
                bloodPressure(response.data[0]);
            } else {
                $('#bloodPressure').html('No data found!');
            }
            if (typeof response.data[1] !== undefined) {
                bloodSugar(response.data[1]);
            } else {
                $('#bloodSugar').html('No data found!');
            }
            if (typeof response.data[2] !== undefined) {
                pulseOxymeter(response.data[2]);
            } else {
                $('#pulseOxymeter').html('No data found!');
            }
        },
        error:function (error) {
            console.log(error)
        }
    });
});

function bloodPressure(data) {
    html = '';
    html += '<div class="request-roadl">' +
        '<ul class=" owl-carousel owl-theme">';
    $.each(data , function(index, val) {
        if (index == 3) {
            html += '<li class="item">' +
                    '<div class="patient-detail">' +
                    '<div class="p-20">' +
                    '<div class="img-50">' +
                    '<img src="'+val.user.avatar_image+'" alt="Welcome to Doral" srcset="'+val.user.avatar_image+'" class="img-fluid">' +
                    '</div>' +
                    '<h1 class="patient-name">'+val.user.first_name+' '+val.user.last_name+'</h1>' +
                    '</div>' +
                    '<div class="emergency-detail p-20">' +
                    '<h3 class="title">Diastolic Blood Pressure</h3>' +
                    '<h1 class="counts">'+val.reading_value+'</h1>' +
                    '<a href="javascript:void(0)" class="roadl-btn">' +
                    '<span></span>' +
                    '</a>' +
                    '</div>' +
                    '</div>' +
                '</li>';
        }
    });
    html += '</ul>'+
        '</div>';
    $('#bloodPressure').html(html);
}

function bloodSugar(data) {
    html = '';
    html += '<div class="request-roadl">' +
        '<ul class=" owl-carousel owl-theme">';
    $.each(data , function(index, val) {
        if (index == 3) {
            html += '<li class="item">' +
                    '<div class="patient-detail">' +
                    '<div class="p-20">' +
                    '<div class="img-50">' +
                    '<img src="'+val.user.avatar_image+'" alt="Welcome to Doral" srcset="'+val.user.avatar_image+'" class="img-fluid">' +
                    '</div>' +
                    '<h1 class="patient-name">'+val.user.first_name+' '+val.user.last_name+'</h1>' +
                    '</div>' +
                    '<div class="emergency-detail p-20">' +
                    '<h3 class="title">Diastolic Blood Pressure</h3>' +
                    '<h1 class="counts">'+val.reading_value+'</h1>' +
                    '<a href="javascript:void(0)" class="roadl-btn">' +
                    '<span></span>' +
                    '</a>' +
                    '</div>' +
                    '</div>' +
                '</li>';
        }
    });
    html += '</ul>'+
        '</div>';
    $('#bloodSugar').html(html);
}

function pulseOxymeter(data) {
    html = '';
    html += '<div class="request-roadl">' +
        '<ul class=" owl-carousel owl-theme">';
    $.each(data , function(index, val) {
        if (index == 3) {
            html += '<li class="item">' +
                    '<div class="patient-detail">' +
                    '<div class="p-20">' +
                    '<div class="img-50">' +
                    '<img src="'+val.user.avatar_image+'" alt="Welcome to Doral" srcset="'+val.user.avatar_image+'" class="img-fluid">' +
                    '</div>' +
                    '<h1 class="patient-name">'+val.user.first_name+' '+val.user.last_name+'</h1>' +
                    '</div>' +
                    '<div class="emergency-detail p-20">' +
                    '<h3 class="title">Diastolic Blood Pressure</h3>' +
                    '<h1 class="counts">'+val.reading_value+'</h1>' +
                    '<a href="javascript:void(0)" class="roadl-btn">' +
                    '<span></span>' +
                    '</a>' +
                    '</div>' +
                    '</div>' +
                '</li>';
        }
    });
    html += '</ul>'+
        '</div>';
    $('#pulseOxymeter').html(html);
}