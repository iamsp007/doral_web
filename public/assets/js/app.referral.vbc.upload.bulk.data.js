$(function () {
    $('#uploaded_files').DataTable();
    $('.category-type .box').click(function () {
        $('.category-type .box').removeClass("selected");
        $(this).addClass("selected");
        $('.upload-your-files').slideDown();
    });
    $('#vbc').DataTable({
        "order": [],
        'columnDefs': [{
            "targets": [0, 6],
            "orderable": false,
            'checkboxes': {
                selectAll: false
            }
        }],
        "pageLength": 10,
        "dom": '<"top"<"float-left pb-3"f><"float-right"l>>rt<"bottom"<"float-left"i><"float-right pb-3"p>><"clear">'
    })
});
