$(function () {
    var e = $("#checkAll_2"),
        c = $("#checkAll_1"),
        o = $("#checkAll_3"),
        t = $("#searchItem"),
        s = $("#searchItem1"),
        l = $("#searchItem2"),
        a = $(".collapse.show"),
        r = $(".collapse"),
        i = $(".card-body"),
        n = $(".role-card-2 input:checkbox"),
        h = $(".role-card-1 input:checkbox"),
        d = $(".role-card-3 input:checkbox"),
        p = $(".scroll-1 div"),
        u = $(".scroll-2 div"),
        f = $(".scroll-3 div"),
        k = $(".card-header"),
        l = $('.noOfCoordinator'),
        m = $('.scroll-1 input[type="checkbox"]'),
        b = $('#count-checked-checkboxes');
    m.on('change', function () {
        _a = m.filter(':checked').length;
        b.html("(" + _a + ")");
        _a > 0 ? $('.accordion').find('.role-card').addClass('border-primary border-green') : $('.accordion').find('.role-card').removeClass('border-primary border-green')
    }),
         t.on("keyup", function () {
            var e = $(this).val().toLowerCase();
            p.filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(e) > -1)
            })
        }), s.on("keyup", function () {
            var e = $(this).val().toLowerCase();
            u.filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(e) > -1)
            })
        }), l.on("keyup", function () {
            var e = $(this).val().toLowerCase();
            f.filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(e) > -1)
            })
        }), a.each(function () {
            $(this).prev(".card-header").find(".las").addClass("la-minus").removeClass("la-plus")
        }), r.on("show.bs.collapse", function () {
            $(this).prev(".card-header").find(".las").removeClass("la-plus").addClass("la-minus"), k.css("border-bottom", "1px solid #e4e4e4")
        }).on("hide.bs.collapse", function () {
            $(this).prev(".card-header").find(".las").removeClass("la-minus").addClass("la-plus")
        }), i.parents(".card-header").css("border-bottom", "none"), tail.select("#department", {
            search: !0,
            placeholder: "Select Roles"
        }), tail.select("#rolesOfUser", {
            search: !0,
            placeholder: "Select Users"
        }),
        tail.select("#designation", {
            search: !0,
            placeholder: "Select Designation"
        })
        _a = m.filter(':checked').length;
        b.html("(" + _a + ")");
        _a > 0 ? $('.accordion').find('.role-card').addClass('border-primary border-green') : $('.accordion').find('.role-card').removeClass('border-primary border-green')

});

function checkall(j) {
    var j = parseInt(j)+1;
    var e = $("#checkAll_"+j)
    var h = $(".role-card-"+j+" input:checkbox")
    e.on("change", function () {
            h.not(this).prop("checked", this.checked)
        })
    
}

