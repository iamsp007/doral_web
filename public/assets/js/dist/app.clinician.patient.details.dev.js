"use strict";

function editAllField(sectionId) {
  $('#' + sectionId + ' [data-id]').removeClass('form-control-plaintext').addClass('form-control').addClass('p-new');
  this.contentEditable = 'true';
  $('#' + sectionId + ' [data-id]').attr('readOnly', false);
  $('.edit-icon').fadeOut("slow").removeClass('d-block').addClass('d-none');
  $('.update-icon').fadeIn("slow").removeClass('d-none').addClass('d-block');
}

function updateAllField(sectionId) {
  $('.update-icon').fadeOut("slow").removeClass('d-block').addClass('d-none');
  $('#' + sectionId + ' [data-id]').addClass('form-control-plaintext').removeClass('form-control').addClass('p-new');
  $('#' + sectionId + ' [data-id]').attr('readOnly', false);
  $('.edit-icon').fadeIn("slow").removeClass('d-none').addClass('d-block');
}

var editableField = function editableField(f) {
  var x = $("#" + f);
  x.attr("onclick", "updateField('" + f + "')");
  x.removeAttr("readOnly").removeClass('form-control-plaintext').addClass('form-control').addClass('p-new');
  x.focus();

  if (x.val() == "") {
    x.addClass('is-invalid');
    x.focus();
  } else {}
};

var updateField = function updateField(f) {
  var y = $("#" + f);
  y.attr('value', y.val()), y.attr('placeholder', y.val());
  y.removeClass('form-control').removeClass('p-new').addClass('form-control-plaintext').addClass('_detail');
  y.attr('readOnly', true).attr("onclick", "editableField('" + f + "')");
  y.focus();
};

setTimeout(function () {
  $('#myTable').DataTable({
    "order": [],
    "dom": '<"top d-flex align-items-center justify-content-between"<f><"d-flex align-items-center justify-content-between width250"Bl>>rt<"bottom"<"float-left"i><"float-right pb-3"p>><"clear">',
    'columnDefs': [{
      "targets": [0, 14],
      "orderable": true
    }],
    "pageLength": 5,
    buttons: ['print', {
      text: 'Add',
      action: function action(e, dt, node, config) {
        // alert( 'Button activated' );
        $('#patientMedicateInfo').modal('toggle');
      }
    }],
    scrollY: "380px",
    scrollX: true,
    paging: true,
    fixedColumns: {
      leftColumns: 4
    }
  });
}, 5000);
var arr = ['<div class="app-card frequency_tab mb-3" style="min-height: inherit;">', '<div class="app-card-body">', '<div class="p-3">', '<div>', '<div class="row">', '<div class="col-12 col-sm-1">', '<label for="range" class="label pb-2">&nbsp;</label>', '<div class="custom-control custom-checkbox">', '<input type="checkbox" id="range1" name="range1" class="custom-control-input">', '<label class="custom-control-label" for="range1">Range</label>', '</div>', '</div>', ' <div class="col-12 col-sm-2">', '<label for="from" class="label">From</label>', '<input type="text" class="form-control form-control-lg" id="from" name="from" aria-describedby="fromHelp">', '</div>', '<div class="col-12 col-sm-2">', '<label for="to1" class="label">To</label>', '<input type="text" class="form-control form-control-lg" id="to1" name="to1" aria-describedby="toHelp1">', '</div>', '<div class="col-12 col-sm-1">', '<label for="amount1" class="label">Amount</label>', '<input type="text" class="form-control form-control-lg" id="amount1" name="amount1" aria-describedby="amountHelp1">', '</div>', '<div class="col-12 col-sm-1">', '<label for="frequency1" class="label">Frequency</label>', '<select name="frequency1" id="frequency1" class="form-control" multiple>', '<option value="Sun">Sun</option>', '<option value="Mon">Mon</option>', '<option value="Tue">Tue</option>', '<option value="Wed">Wed</option>', '<option value="Thu">Thu</option>', '<option value="Fri">Fri</option>', '<option value="Sat">Sat</option>', '</select>', '</div>', '<div class="col-12 col-sm-1">', '<label for="duration" class="label">Duration</label>', '<input type="text" class="form-control form-control-lg" id="duration" name="duration" aria-describedby="durationHelp">', '</div>', '<div class="col-12 col-sm-1">', '<label for="type1" class="label">Type</label>', '<select name="type1" id="type1" class="form-control">', '<option value="Visit">Visit</option>', '</select>', '</div>', '<div class="col-12 col-sm-1">', '<label for="hours1" class="label">Hours</label>', '<input type="text" class="form-control form-control-lg" id="hours1" name="hours1" aria-describedby="hoursHelp1">', '</div>', '<div class="col-12 col-sm-1">', '<label for="dates" class="label">Dates</label>', '<input type="text" class="form-control form-control-lg" id="dates" name="dates" aria-describedby="datesHelp">', '</div>', '<div class="col-12 col-sm-1">', '<label for="dates" class="label">&nbsp;</label>', '<div class="d-flex align-items-center">', '<a href="javascript:void(0)" class="mt-1 mr-2 add_frequency" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add Row">', '<img src="../assets/img/icons/add_more_item.svg" alt="">', '</a>', '<a href="javascript:void(0)" class="mt-1" data-toggle="tooltip" data-placement="left" title="" data-original-title="Remove Row">', '<img src="../assets/img/icons/remove_row.svg" alt="">', '</a>', '</div>', '</div>', '</div>', '</div>', '</div>', '</div>', '</div>'];

function addMore(item) {
  var refEl = document.getElementById(item);
  var clone = refEl.cloneNode(true);

  for (i = 0; i < 50; i++) {
    refEl.parentNode.insertBefore(clone, refEl.nextSibling);
  }
}

$(function () {
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
  });
  tail.select("#type1", {
    search: true
  });
});