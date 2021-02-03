$(function () {
    $("#datepicker").datepicker();
    $('.owl-carousel').owlCarousel({
        loop: true,
        autoplay: true,
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
            console.log(response)
        },
        error:function (error) {
            console.log(error)
        }
    });
});