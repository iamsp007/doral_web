$('.update-icon').hide();
function editAllField(sectionId) {
    $('a[data-toggle="pill"]').on('show.bs.tab', function (e) { localStorage.setItem('activeTab', $(e.target).attr('href')); });
    var activeTab = localStorage.getItem('activeTab');
    $('#' + sectionId + ' [data-id]').removeClass('form-control-plaintext').addClass('form-control');
    $('#' + sectionId + ' [data-id]').attr('readOnly', false)
    if (activeTab) {
        $(activeTab).find('.edit-icon').hide()
        $(activeTab).find('.update-icon').show();
    } else {
    }
}
function updateAllField(sectionId) {
    $('a[data-toggle="pill"]').on('show.bs.tab', function (e) { localStorage.setItem('activeTab', $(e.target).attr('href')); });
    var activeTab = localStorage.getItem('activeTab');
    $('#' + sectionId + ' [data-id]').addClass('form-control-plaintext').removeClass('form-control')
    $('#' + sectionId + ' [data-id]').attr('readOnly', false)
    if (activeTab) {
        $(activeTab).find('.edit-icon').show();
        $(activeTab).find('.update-icon').hide();
    } else {
    }
}
function validateEmail(emailField) {
    var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
    if (reg.test(emailField.value) == false) {
        alert('Invalid Email Address');
        return false;
    }
    return true;
}
function add_option(select_id, text) {
    var select = document.getElementById(select_id);
    select.options[select.options.length] = new Option(text);
}
function load_combo(select_id, option_array) {
    for (var i = 0; i < option_array.length; i++) {
        add_option(select_id, option_array[i]);
    }
}
var planets = new Array("RoadL", "Lab", "X-Ray", "CHHA", "Home Oxygen", "Home Infusion", "Wound Care", "DME");
function clear_combo(select_id) {
    var select = document.getElementById(select_id);
    select.options.length = 0;
}
load_combo("roadlrequest1", planets)
load_combo("roadlrequest2", planets)
load_combo("roadlrequest3", planets)
load_combo("roadlrequest4", planets)
load_combo("roadlrequest5", planets)
load_combo("roadlrequest6", planets)
load_combo("roadlrequest7", planets)
load_combo("roadlrequest8", planets)
load_combo("roadlrequest9", planets)
load_combo("roadlrequest10", planets)
function exploder(params) {
    $('#' + params).closest("tr").next("tr").toggleClass("d-none");
    $('#' + params).find('.la-plus').removeClass('la-plus').addClass('la-minus');
    if ($('#' + params).closest("tr").next("tr").hasClass("d-block")) {
        $('#' + params).closest("tr").next("tr").children("td").slideUp();
    }
    else {
        $('#' + params).closest("tr").next("tr").children("td").slideDown(350);
    }
    if ($('#' + params).closest("tr").next("tr").hasClass("d-none")) {
        $('#' + params).find('.la-minus').removeClass('la-minus').addClass('la-plus');
    }
}
function openRoadL(act) {
    $('#' + act).removeClass('d-table').addClass('d-none');
    $('#' + act).next("div").removeClass("d-none").addClass('mt-3');
}
setTimeout(() => {
    $('#myTable').DataTable({
        "order": [],
        "dom": '<"top d-flex align-items-center justify-content-between"<f><"d-flex align-items-center justify-content-between width250"Bl>>rt<"bottom"<"float-left"i><"float-right pb-3"p>><"clear">',
        'columnDefs': [{
            "targets": [0, 14],
            "orderable": true
        }],
        "pageLength": 5,
        buttons: [
            'print', {
                text: 'Add',
                action: function (e, dt, node, config) {
                    // alert( 'Button activated' );
                    $('#patientMedicateInfo').modal('toggle')
                }
            }
        ],
        scrollY: "380px",
        scrollX: true,
        paging: true,
        fixedColumns: {
            leftColumns: 4
        }
    });
}, 5000);
function addMore(item) {
    var refEl = document.getElementById(item);
    var clone = refEl.cloneNode(true);
    for (i = 0; i < 50; i++) {
        refEl.parentNode.insertBefore(clone, refEl.nextSibling);
    }
}
$('.insurance_company').hide();
$('._add_new_company').on('click', function (e) {
    e.preventDefault();
    $('.insurance_company').show();
});
$('.save_item').on('click', function (e) {
    e.preventDefault();
    $('.insurance_company').hide();
});
$('.dt-delete').each(function () {
    $(this).on('click', function (evt) {
        $this = $(this);
        var dtRow = $this.parents('tr');
        if (confirm("Are you sure to delete this row?")) {
            var table = $('#myTable').DataTable();
            table.row(dtRow[0].rowIndex - 1).remove().draw(false);
        }
    });
});
tail.select("#frequency1", {
    search: true
})
tail.select("#type1", {
    search: true
})
tail.select(".roadlrequest", {
    search: true
})
$('.box .control input:radio[name=radio]').change(function () {
    $('.box.selected').removeClass('selected');
    $(this).closest('.box').addClass('selected');
});
$('input[name="xraydate"]').daterangepicker({
    singleDatePicker: true,
    showDropdowns: true,
    minYear: 1901,
    maxYear: parseInt(moment().format('YYYY'), 10)
}, function (start, end, label) {
    var years = moment().diff(start, 'years');
    alert("You are " + years + " years old!");
});