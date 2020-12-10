$(function () {
    var sidebar = $('.sidebar'),
        navbarToggler = $('.navbar-toggler');
    function responsiveView() {
        var wSize = $(window).width();
        if (wSize <= 768) {
            sidebar.addClass('collapse'),
                navbarToggler.addClass('d-block')
        }
        if (wSize > 767) {
            sidebar.removeClass('collapse show'),
                navbarToggler.removeClass('d-block').addClass('d-none')
        }
    }
    $(window).on('load', responsiveView);
    $(window).on('resize', responsiveView);
    // Click outside menu closed
    $(document).click(function (event) {
        if (!$(event.target).closest(".navbar-toggler").length) {
            sidebar.addClass('slide-out');
            setTimeout(() => {
                sidebar.removeClass('show');
            }, 500);
        }
    });
    // Navigation Slide in out effect
    navbarToggler.on('click', function () {
        sidebar.removeClass('slide-out').addClass('slide-in');
    })
    // Close Menu Slide in out effect
    $('#closeMenu').on('click', function () {
        sidebar.removeClass('slide-in').addClass('slide-out');
    })
    // notification details 

    $("#more-best").click(function () {
        $(".more-menu.bell").toggleClass("showmenu");
    });
    $('[data-toggle="tooltip"]').tooltip();
});