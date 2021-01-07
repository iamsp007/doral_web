$(function () {
    $("[data-toggle='tooltip']").tooltip();
    tail.select(".assign_clinician", {
        search: true
    })
    $('.assign_clinician').on('change', function () {
        var countries = [];
        $.each($('.assign_clinician option:selected'), function () {
            countries.push(this.value);
    });
        var text = "";
        var i;
        for (i = 0; i < countries.length; i++) {
            text +=
                '<button type="button" class="btn btn-broadcast btn-block">' +
                countries[i] +
                ' Boradcast' +
                '<span></span>' +
                '</button>'
        }
        $('.broadcast_box').html(text)
    })
})
