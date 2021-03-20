$(function () {
    tail.select(".hsbc", {
        search: !0
    });
    var e = 10,
        t = $(".case_manager"),
        a = $(".add_more"),
        l = 1;
    $(a).click(function (a) {
        a.preventDefault(), l < e ? (l++, $(t).append('<div class="mt-4"><label for="Phone" class="label">Case Manager Instructions</label><div class="input-group"><textarea name="" id="" class="form-control" cols="30" rows="1"></textarea><a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="Add More Instruction" class="input-group-text input-group-text-custom-1 delete"><i class="las la-minus-circle"></i></a></div></div>')) : alert("You Reached the limits")
    }), $(t).on("click", ".delete", function (e) {
        e.preventDefault(), $(this).parent("div").parent().remove(), l--
    })
    let select = tail.select(".alergy", {
        search: !0
    });
    $('._add_alergy').hide();
         var myCallback = tail.select(".alergy", {
            search: true
         })
         $('.alergy').on('change', function () {
            var countries = [];
            $.each($('.alergy option:selected'), function () {
               countries.push(this.value);
            });
            var text = "";
            var i;
            for (i = 0; i < countries.length; i++) {
               text +=
                  '<div class="col-12 col-sm-4 mt-2">' +
                  '<div class="d-flex align-items-center">' +
                  '<div>' +
                  '<i class="las la-angle-double-right circle-icon-small"></i>' +
                  '</div>' +
                  '<div>' +
                  '<h1 class="_detail">' + countries[i] + '</h1>' +
                  '</div>' +
                  '</div>' +
                  '</div>'
            }
            $('.alergy_box').html(text)
         })
});