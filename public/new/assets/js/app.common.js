$(function () {
    $('[data-toggle="tooltip"]').tooltip();
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
    // Loader
    $('.loader-wrapper').hide();
    function loader() {
        $('.loader-wrapper').show();
        $('body').addClass('loaded').addClass('blurry');
    }
    $(window).on('load', loader);
    setInterval(() => {
        $('.loader-wrapper').hide();
        $('body').removeClass('loaded').removeClass('blurry');
    }, 1500);
    setInterval(() => {
        $('body').removeClass('loaded').removeClass('blurry');
    }, 500);
    // Accept-reject control
    $('input[type="checkbox"]').click(function () {
        if ($(this).is(":checked")) {
            $(".button-control").show();

        } else {
            $(".button-control").hide();
        }
    });
    $('.reject-item').click(function () {
        $(".button-control").hide();
        $('#employee-table td input:checkbox').not(this).prop('checked', false);
    });

    $('.cbp-vimenu li').on('click', function () {
        //Remove any previous active classes
        $('.cbp-vimenu li').removeClass('active');
        //Add active class to the clicked item
        $(this).addClass('active');
        //adding the state for this parent menu
        $(this).parents('li').addClass('active');
    });
    var hoverTimeout, keepOpen = false, stayOpen = $('.notification'); 
    $(document).on('mouseenter','.notify',function(){
        clearTimeout(hoverTimeout);
        stayOpen.addClass('show');
    }).on('mouseleave','.notify',function(){
        clearTimeout(hoverTimeout);
        hoverTimeout = setTimeout(function(){
            if(!keepOpen){
                stayOpen.removeClass('show');   
            }
        },1000);
    });
    $(document).on('mouseenter','.notification',function(){
        keepOpen = true;
        setTimeout(function(){
            keepOpen = false;
        },1500);
    }).on('mouseleave','.notification',function(){
        keepOpen = false;
        stayOpen.removeClass('show');
    });
});
