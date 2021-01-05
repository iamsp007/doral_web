$(function () {
    $('.ccm_table').DataTable({
        "order": [],
        'columnDefs': [{
            "targets": [0, 5],
            "orderable": false
        }],
        "pageLength": 10,
        "dom": '<"top"<"float-left pb-3"f><"float-right"l>>rt<"bottom"<"float-left"i><"float-right pb-3"p>><"clear">'
    });
    $(".selectall").click(function () {
        $('.ccm_table td input:checkbox').not(this).prop('checked', this.checked);
    });
});