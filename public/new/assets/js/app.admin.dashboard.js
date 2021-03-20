$(function () {
    var create = $('._create'),
        delet = $('._delete'),
        update = $('._update');
    var np = $('._np'),
        physio = $('._physio'),
        sa = $('._sa');
    // Designation list
    tail.select(".designation_list", {
        search: !0,
        placeholder: "Select Designation"
    });
    np.show();
    physio.hide();
    sa.hide();
    $(".designation_list").on("change", function () {
        "Physiotherapy" == $(".designation_list").val() ? (np.hide(), physio.show(),sa.hide()) : 
        ("Nurse Practitioner" == $(".designation_list").val()) ? (np.show(), physio.hide(),sa.hide()) :     
        (sa.show(),np.hide(), physio.hide());
        console.log('hi')
    });
    // Permission list
    tail.select(".permission_list", {
        search: !0,
        placeholder: "Select Designation"
    });
    create.show();
    delet.hide();
    update.hide();
    $(".permission_list").on("change", function () {
        "Delete" == $(".permission_list").val() ? (create.hide(), delet.show(),update.hide()) : 
        ("Update" == $(".permission_list").val()) ? (create.hide(), delet.hide(),update.show()) :     
        (update.hide(),create.show(), delet.hide())
    });
});
