tail.select("#department", {
    search: !0,
    placeholder: "Select Roles"
});
tail.select("#rolesOfUser", {
    search: !0,
    placeholder: "Select Users"
});
tail.select("#designation", {
    search: !0,
    placeholder: "Select Designation"
});
tail.select("#selectRoles", {
    search: !0,
    placeholder: "Select Roles"
});
tail.select("#selectUsers", {
    search: !0,
    placeholder: "Select User"
});
function myFunction() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}
$(function () {
    var e = $("#checkAll"),
        c = $("#checkAll_1"),
        o = $("#checkAll_3"),
        t = $("#searchItem"),
        s = $("#searchItem1"),
        l = $("#searchItem2"),
        a = $(".collapse.show"),
        r = $(".collapse"),
        i = $(".card-body"),
        n = $(".role-card input:checkbox"),
        h = $(".role-card-2 input:checkbox"),
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
        e.on("change", function () {
            n.not(this).prop("checked", this.checked),
                _a = m.filter(':checked').length;
            b.html("(" + _a + ")");
            _a > 0 ? $('.accordion').find('.role-card').addClass('border-primary border-green') : $('.accordion').find('.role-card').removeClass('border-primary border-green')
        }),
        c.on("change", function () {
            h.not(this).prop("checked", this.checked)
        }), o.on("change", function () {
            d.not(this).prop("checked", this.checked)
        }), t.on("keyup", function () {
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
        }), i.parents(".card-header").css("border-bottom", "none"),
        _a = m.filter(':checked').length;
    b.html("(" + _a + ")");
    _a > 0 ? $('.accordion').find('.role-card').addClass('border-primary border-green') : $('.accordion').find('.role-card').removeClass('border-primary border-green')
});