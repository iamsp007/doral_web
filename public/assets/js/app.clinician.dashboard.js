$(function () {
    $("#datepicker").datepicker({
        altField: '#sendDate',
        onSelect: function (date) {
            appointments(date);
        }
    });
    owlCarousel();
    appointments($("#sendDate").val());
});
function appointments(date) {
    $("#loader-wrapper").show();
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url:"clinician/appointments",
        method:'POST',
        dataType: 'json',
        data: {
            date: date
        },
        success: function (response) {
            $("#loader-wrapper").hide();
            setAppointment(date, response);
        },
        error:function (error) {
            $("#loader-wrapper").hide();
            console.log(error)
        }
    });
}
function setAppointment(date, response) {
    html = '';
    html += '<div class="d-flex align-items-center justify-content-between mb-3">' +
        '<h1 class="appointment-title">Appointment</h1>' +
        '<h3 class="appointment-date">' + getOrdinalNum(date) + '</h3>' +
    '</div>';
    
    if (response.data.length) {
            html += '<div class="detail">' +
            '<ul>';
        $.each(response.data, function (index, val) {
            html += '<li>' +
                '<div class="block">' +
                '<div class="img-30">' +
                '<img src="' + val.booked_details.avatar_image + '" alt="Welcome to Doral" srcset="' + val.booked_details.avatar_image + '" class="img-fluid">' +
                '</div>' +
                '<h1 class="patient-name">' + val.booked_details.first_name + ' ' + val.booked_details.last_name + '</h1>' +
                '<h3 class="title">Cause Of Appointment : <span>' + val.service.name + '</span>' +
                '</h3>' +
                '<h3 class="timing"><i class="las la-clock la-2x clock"></i>' + getHourMinute(val.start_datetime) + '-' + getHourMinute(val.end_datetime) + ' (' + getHourMinuteDiff(val.start_datetime, val.end_datetime) + ')</h3>' +
                '<a href="javascript:void(0)" class="patient-chart-btn">View Patient Chart</a>' +
                '</div>' +
                '</li>';
        });
        html += '</ul>' +
            '</div>';
    }
    $('#appointments').html(html)
}
function getOrdinalNum(n) {
    const nth = function(d) {
        if (d > 3 && d < 21) return 'th';
        switch (d % 10) {
            case 1:  return "st";
            case 2:  return "nd";
            case 3:  return "rd";
            default: return "th";
        }
    }

    const fortnightAway = new Date(n);
    const date = fortnightAway.getDate();
    const month = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"][fortnightAway.getMonth()];

    return `${ date }<sup>${nth(date)}</sup> ${ month } ${ fortnightAway.getFullYear() }`;
}
function getHourMinute(n) {
    var date = new Date(n);
    var hour = date.getHours()<10?'0'+date.getHours():date.getHours();
    var minutes = date.getMinutes()<10?'0'+date.getMinutes():date.getMinutes();
    return hour+':'+minutes;
}
function getHourMinuteDiff(a, b) {
    var a = new Date(a);
    var b = new Date(b);
    // get total seconds between the times
    var delta = Math.abs(b - a) / 1000;

    // calculate (and subtract) whole hours
    var hours = Math.floor(delta / 3600) % 24;
    delta -= hours * 3600;

    // calculate (and subtract) whole minutes
    var minutes = Math.floor(delta / 60) % 60;

    var hours = hours<10?'0'+hours:hours;
    var minutes = minutes<10?'0'+minutes:minutes;

    return hours+':'+minutes;
}
function owlCarousel() {
    $('.owl-carousel').owlCarousel({
        loop: false,
        autoplay: false,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        margin: 0,
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
}
$(document).ready(function(){
    $("#loader-wrapper").show();
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url:"clinician/ccm-reading-level-high",
        method:'GET',
        dataType:'json',
        success:function (response) {
            //console.log(response.data);
            $("#loader-wrapper").hide();
            if (typeof response.data['high'][1] !== undefined || response.data['low_midium'][1] !== undefined) {
                bloodPressure(response.data['high'][1], 'bloodPressure', response.data['low_midium'][1], 'bloodPressuredailyupdate', 'Blood Pressure');
            } else {
                $('#bloodPressure').html('No data found!');
            }
            if (typeof response.data['high'][2] !== undefined || response.data['low_midium'][2] !== undefined) {
                bloodPressure(response.data['high'][2], 'bloodSugar', response.data['low_midium'][2], 'bloodSugardailyupdate', 'Blood Sugar');
            } else {
                $('#bloodSugar').html('No data found!');
            }

            if (typeof response.data['high'][3] !== undefined || response.data['low_midium'][3] !== undefined) {
                bloodPressure(response.data['high'][3], 'weight', response.data['low_midium'][3], 'weightdailyupdate', 'Weight');
            } else {
                $('#weight').html('No data found!');
            }

            if (typeof response.data['high'][4] !== undefined || response.data['low_midium'][4] !== undefined) {
                bloodPressure(response.data['high'][4], 'pulseOxymeter', response.data['low_midium'][4], 'pulseOxymeterdailyupdate', 'Pulse Oxymeter');
            } else {
                $('#pulseOxymeter').html('No data found!');
            }
            
        },
        error:function (error) {
            $("#loader-wrapper").hide();
            console.log(error)
        }
    });
});

function bloodPressure(high_level, selector1,low_midium_level, selector2, label) {
       if(high_level){
        if (typeof high_level !== undefined) {
            html = '';
            html += '<div class="request-roadl">' +
                '<ul class=" owl-carousel owl-theme">';
            $.each(high_level , function(index, val) {
               
                html += '<li class="item">' +
                        '<div class="patient-detail">' +
                        '<div class="p-20">' +
                        '<div class="img-50">' +
                        '<img src="'+val.user_device.user.avatar_image+'" alt="Welcome to Doral" srcset="'+val.user_device.user.avatar_image+'" class="img-fluid">' +
                        '</div>' +
                        '<h1 class="patient-name">'+val.user_device.user.first_name+' '+val.user_device.user.last_name+'</h1>' +
                        '</div>' +
                        '<div class="emergency-detail p-20">' +
                        '<h3 class="title">'+label+'</h3>' +
                        '<h1 class="counts">'+val.value+'</h1>' +
                        '<a href="javascript:void(0)" onclick="onBroadCastOpen('+ val.user_device.patient_id +')" class="roadl-btn">' +
                        '<span></span>' +
                        '</a>' +
                        '</div>' +
                        '</div>' +
                    '</li>';
            });
            html += '</ul>'+
                '</div>';
            $('#'+selector1).html(html);
            owlCarousel();
        }
    }
    if (typeof low_midium_level !== undefined) {
        console.log(low_midium_level);
        html = '';
        html += '<div>' +
            '<div class="form-group"><div class="row"><div class="col-6 col-sm-6 col-md-6"><h1 class="reports-title">'+label+'</h1></div><div class="col-6 col-sm-6 col-md-6"><div class="d-flex"><a href="'+user_device_url+'" class="bulk-upload-btn float-right">View All</a></div></div></div></div>' +
            '<div class="detail">' +
            '<ul>';
        $.each(low_midium_level , function(index, val) {
            html += '<li>' +
                '<div class="Level-2">' +
                '<div class="img-30">' +
                '<img src="'+val.user_device.user.avatar_image+'" alt="Welcome to Doral" srcset="'+val.user_device.user.avatar_image+'" class="img-fluid">' +
                '</div>' +
                '<h1 class="patient-name">'+val.user_device.user.first_name+' '+val.user_device.user.last_name+'</h1>' +
                '<h3 class="title">'+label+': '+val.value+'</h3>' +
                '<a href="javascript:void(0)" class="Level-2-btn">Level '+val.level+'</a>' +
                '<a href="javascript:void(0)" class="level2-btn">Seek emergency care</a>' +
                '</div>' +
                '</li>';
        });
        html += '</ul>' +
            '</div>' +
            '</div>';                     
        $('#'+selector2).html(html);
        owlCarousel();
    }
}

// function bloodSugar(data) {
   
//     if (typeof data !== undefined) {
//         html = '';
//         html += '<div class="request-roadl">' +
//             '<ul class=" owl-carousel owl-theme">';
//         $.each(data, function (index, val) {
//             html += '<li class="item">' +
//                 '<div class="patient-detail">' +
//                 '<div class="p-20">' +
//                 '<div class="img-50">' +
//                 '<img src="' + val.user_device.user.avatar_image + '" alt="Welcome to Doral" srcset="' + val.user_device.user.avatar_image + '" class="img-fluid">' +
//                 '</div>' +
//                 '<h1 class="patient-name">' + val.user_device.user.first_name + ' ' + val.user_device.user.last_name + '</h1>' +
//                 '</div>' +
//                 '<div class="emergency-detail p-20">' +
//                 '<h3 class="title">Blood Sugar </h3>' +
//                 '<h1 class="counts">' + val.value + '</h1>' +
//                 '<a href="javascript:void(0)" class="roadl-btn">' +
//                 '<span></span>' +
//                 '</a>' +
//                 '</div>' +
//                 '</div>' +
//                 '</li>';
//         });
//         html += '</ul>' +
//             '</div>';
//         $('#bloodSugar').html(html);
//         owlCarousel();
//     }
//     if (typeof data[2] !== undefined) {
//         html = '';
//         html += '<div>' +
//             '<h1 class="reports-title">Blood Sugar</h1>' +
//             '<div class="detail">' +
//             '<ul>';
//         $.each(data[2] , function(index, val) {
//             html += '<li>' +
//                 '<div class="Level-2">' +
//                 '<div class="img-30">' +
//                 '<img src="'+val.user_device.user.avatar_image+'" alt="Welcome to Doral" srcset="'+val.user_device.user.avatar_image+'" class="img-fluid">' +
//                 '</div>' +
//                 '<h1 class="patient-name">'+val.user_device.user.first_name+' '+val.user_device.user.last_name+'</h1>' +
//                 '<h3 class="title">Blood Sugar: '+val.value+'</h3>' +
//                 '<a href="javascript:void(0)" class="Level-2-btn">Level 2</a>' +
//                 '<a href="javascript:void(0)" class="level2-btn">Seek emergency care</a>' +
//                 '</div>' +
//                 '</li>';
//         });
//         html += '</ul>' +
//             '</div>' +
//             '</div>';                     
//         $('#bloodSugardailyupdate').html(html);
//         owlCarousel();
//     }
// }

// function pulseOxymeter(data) {
//     if(data){
//         if (typeof data !== undefined) {
//             html = '';
//             html += '<div class="request-roadl">' +
//                 '<ul class=" owl-carousel owl-theme">';
//             $.each(data , function(index, val) {
//                 html += '<li class="item">' +
//                         '<div class="patient-detail">' +
//                         '<div class="p-20">' +
//                         '<div class="img-50">' +
//                         '<img src="'+val.user_device.user.avatar_image+'" alt="Welcome to Doral" srcset="'+val.user_device.user.avatar_image+'" class="img-fluid">' +
//                         '</div>' +
//                         '<h1 class="patient-name">'+val.user_device.user.first_name+' '+val.user_device.user.last_name+'</h1>' +
//                         '</div>' +
//                         '<div class="emergency-detail p-20">' +
//                         '<h3 class="title">Pulse Oxymeter</h3>' +
//                         '<h1 class="counts">'+val.value+'</h1>' +
//                         '<a href="javascript:void(0)" class="roadl-btn">' +
//                         '<span></span>' +
//                         '</a>' +
//                         '</div>' +
//                         '</div>' +
//                     '</li>';
//             });
//             html += '</ul>'+
//                 '</div>';
//             $('#pulseOxymeter').html(html);
//             owlCarousel();
//         }
//         if (typeof data[2] !== undefined) {
//             html = '';
//             html += '<div>' +
//                 '<h1 class="reports-title">Pulse Oxymeter</h1>' +
//                 '<div class="detail">' +
//                 '<ul>';
//             $.each(data[2] , function(index, val) {
//                 html += '<li>' +
//                     '<div class="Level-2">' +
//                     '<div class="img-30">' +
//                     '<img src="'+val.user_device.user.avatar_image+'" alt="Welcome to Doral" srcset="'+val.user_device.user.avatar_image+'" class="img-fluid">' +
//                     '</div>' +
//                     '<h1 class="patient-name">'+val.user_device.user.first_name+' '+val.user_device.user.last_name+'</h1>' +
//                     '<h3 class="title">Pulse Oxymeter: '+val.value+'</h3>' +
//                     '<a href="javascript:void(0)" class="Level-2-btn">Level 2</a>' +
//                     '<a href="javascript:void(0)" class="level2-btn">Seek emergency care</a>' +
//                     '</div>' +
//                     '</li>';
//             });
//             html += '</ul>' +
//                 '</div>' +
//                 '</div>';                     
//             $('#pulseOxymeterdailyupdate').html(html);
//             owlCarousel();
//         }
//     }
// }