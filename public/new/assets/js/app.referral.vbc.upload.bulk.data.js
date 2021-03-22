$(function () {
    $('#uploaded_files').DataTable();
    $('.category-type .box input:radio[name=vbc_select]').change(function () {
        $('.category-type .box input:radio[name=vbc_select]').removeClass("selected");
        $(this).addClass("selected");
        $('.upload-your-files').slideDown();
    });
    $('.box .control input:radio[name=radio]').change(function(){
        $('.box.selected').removeClass('selected');
        $(this).closest('.box').addClass('selected');
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
