$(function () {
    let example = $('#vbc').DataTable({
        "order": [],
        'columnDefs': [{
            "targets": [0,6],
            "orderable": false,
            'checkboxes': {
                selectAll: false
           }
        }],
        "pageLength": 10,
        "dom": '<"top"<"float-left pb-3"f><"float-right"l>>rt<"bottom"<"float-left"i><"float-right pb-3"p>><"clear">'
    });
    $(".selectall").click(function () {
        $('#vbc td input:checkbox').not(this).prop('checked', this.checked);
    });
});