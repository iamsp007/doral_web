$(function () {
    $('#employee-table').DataTable({
        "order": [],
        'columnDefs': [{
            "targets": [0, 6],
            "orderable": false
        }],
        "pageLength": 10,
        "dom": '<"top"<"float-left pb-3"f><"float-right"l><"float-right pb-3"B>>rt<"bottom"<"float-left"i><"float-right pb-3"p>><"clear">',
        "buttons": [
            {
                text: 'Choose Clinician',
                action: function (e, dt, node, config) {
                    // alert( 'Button activated' );
                    $('#exampleModal').modal({
                        keyboard: false
                    })
                },
                className: 'btn btn-danger text-capitalize btn--sm assign mr-2'
            }
        ]
    });
    $(".selectall").click(function () {
        $('#employee-table td input:checkbox').not(this).prop('checked', this.checked);
    });
    $(".clinician").on("keyup", function () {
        var value = $(this).val().toLowerCase();
        $(".clinician_listing a").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
    var listing_clinician = $('.listing_clinician'),
        clinician = $('._clinician');
    listing_clinician.on('click', 'li a', function () {
        var clinician_name = $(this).find('[data-name="name"]').text();
        // alert(clinician_name)
        clinician.val(clinician_name);
    })
    listing_clinician.on('click', 'li a', function () {
        if ($(this).not('.selected')) {
            $(this).addClass('selected').parent().siblings().children().removeClass('selected');
        }
    })
    _total_no_records = $('.listing_clinician li').length;
    $('.total_records').html(_total_no_records);
});