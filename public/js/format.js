$("body").on('keypress','.phone_format',function(event) {
    if(event.which != 8 && isNaN(String.fromCharCode(event.which))){
        event.preventDefault();
    }
    $(this).val($(this).val().replace(/^(\d{3})(\d{3})(\d+)$/, "($1) $2-$3"));
});