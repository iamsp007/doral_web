$(function () {
    $('#employee-table').DataTable({
        "order": [],
        'columnDefs': [{
            "targets": [0, 4],
            "orderable": false
        }],
        "pageLength": 10
    });
    $('[data-toggle="tooltip"]').tooltip(); 
});