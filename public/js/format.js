$("body").on('keypress','.phone_format',function(event) {
    if(event.which != 8 && isNaN(String.fromCharCode(event.which))){
        event.preventDefault();
    }
    $(this).val($(this).val().replace(/^(\d{3})(\d{3})(\d+)$/, "($1) $2-$3"));
});

$('.email_format').on('change', function() {
    if (this.value) {
        var re = /([A-Z0-9a-z_-][^@])+?@[^$#<>?]+?\.[\w]{2,4}/.test(this.value);
        if(!re) {
            $('span.error-keyup-7').remove();
            $(this).after('<span class="error error-keyup-7"><font color="red">Invalid Email Format test.</font></span>');
        } else {
            $('span.error-keyup-7').remove();
        }
    }
});

