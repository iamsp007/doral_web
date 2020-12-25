$(function () {
    $("#datepicker").datepicker();
    $('.app-appoinment-popup').hide();
    $('#dragable-popup').draggabilly();
    $('.app-appoinment').on('click', function () {
        var elem = $(this).attr('id');
        // alert(elem);
        $('#' + elem).each(function () {
            var x = $('#' + elem).offset().left;
            var y = $('#' + elem).offset().top;
            var offset = $('.app-appoinment-popup').offset();
            console.log('x: ' + x + ' y: ' + y);
            $('.app-appoinment-popup').css('position', 'fixed').css('top', y + 38).css('right', '25px');
            $('.app-appoinment-popup').show();
        });
    })
    $(document).mouseup(function (e) {
        var popup = $('.app-appoinment-popup');
        if (!$('.app-appoinment').is(e.target) && !popup.is(e.target) && popup.has(e.target).length == 0) {
            popup.hide();
        }
    });
    $('.closepopup').on('click', function () {
        var popup = $('.app-appoinment-popup');
        popup.hide()
    })
    $(".clinician").on("keyup", function () {
        var value = $(this).val().toLowerCase();
        $(".clinician_listing a").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
    $(".timeslot").on("keyup", function () {
        var value = $(this).val().toLowerCase();
        $(".clinician_listing a").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});