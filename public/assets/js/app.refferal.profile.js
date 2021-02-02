$('input[name="expiration_date"]').daterangepicker({
    singleDatePicker: true,
    showDropdowns: true,
    minYear: 1901,
    maxYear: parseInt(moment().format('YYYY'),10)
  });
$('.update-icon').hide()
let editAllField = (sectionId) => {
    var activeTab = $('#' + sectionId).closest(".app-card").attr('id')
    $('#' + sectionId + ' [data-id]').removeClass('form-control-plaintext').addClass('form-control').addClass('p-new');
    $('#' + sectionId + ' [data-id]').attr('readOnly', false);
    $('#' + activeTab).find('.update-icon').show();
    $('#' + activeTab).find('.edit-icon').hide();
}
let updateAllField = (sectionId) => {
    var activeTab = $('#' + sectionId).closest(".app-card").attr('id')
    $('#' + sectionId + ' [data-id]').addClass('form-control-plaintext').removeClass('form-control').addClass('p-new');
    $('#' + sectionId + ' [data-id]').attr('readOnly', false);
    $('#' + activeTab).find('.update-icon').hide();
    $('#' + activeTab).find('.edit-icon').show();
} 