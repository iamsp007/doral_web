$(function () {
    $(".collapse.show").each(function () {
        $(this).prev(".accordion-header").find(".las").addClass("la-angle-down").removeClass("la-angle-right");
    });
    $(".collapse").on('show.bs.collapse', function () {
        $(this).prev(".accordion-header").find(".las").removeClass("la-angle-right").addClass("la-angle-down");
        $(this).prev(".accordion-header").find(".heading").addClass('active');
    }).on('hide.bs.collapse', function () {
        $(this).prev(".accordion-header").find(".las").removeClass("la-angle-down").addClass("la-angle-right");
        $(this).prev(".accordion-header").find(".heading").removeClass('active');
    });
    $('#clinicianData').DataTable({
        "order": [],
        'columnDefs': [{
            "targets": [0, 4],
            "orderable": false
        }],
        "pageLength": 10,
        "dom": '<"top"<"float-left pb-3"f><"float-right"l>>rt<"bottom"<"float-left"i><"float-right pb-3"p>><"clear">'
    });
    $(".selectall").click(function () {
        $('#clinicianData td input:checkbox').not(this).prop('checked', this.checked);
    });
});