$(function () {
    $('#uploaded_files').DataTable();
    $('.category-type .box').click(function () {
        $('.category-type .box').removeClass("selected");
        $(this).addClass("selected");
        $('.upload-your-files').slideDown();
    });
});
