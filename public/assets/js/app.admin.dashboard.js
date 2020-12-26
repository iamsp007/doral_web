$(function () {
    var np = $('_np'),
    physio = $('._physio');
    var x = document.getElementById("mySelect").value;
    document.getElementById("demo").innerHTML = "You selected: " + x;
    np.show();
    physio.hide();
    tail.select(".designation_list", {
        search: !0,
        placeholder: "Select Designation"
    });
    // $('.designation_list').change(function(){
    //     $('.left-side').hide();
    //     $('#' + $(this).val()).show();
    //   });
    $('.designation_list').on('change', function (item, state) {
        var countries = [];
        $.each($('.designation_list option:selected'), function () {
            countries.push(this.value);
        });
        var text = "";
        var i;
        for (i = 0; i < countries.length; i++) {
            text +=
                countries[i]
        }
        if (text == "Physiotherapy") {
            // alert('Physiotherapy')
            np.hide()
            physio.show();
        }
       else if (text == "Nurse Practitioner") {
            // alert('Nurse Practitioner')
            physio.hide(),
            np.show()
        }
    })
});
// function myFunction() {
//     var x = document.getElementsByClassName("designation_list").value;
//     document.getElementsByClassName("_np").innerHTML = "You selected: " + x;
//   }