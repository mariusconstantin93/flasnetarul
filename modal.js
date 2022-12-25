jQuery(document).ready(function($) {
  if ($.cookie('cacher-modal')) {
    $('#popupMaintenanceModal').remove();
  } else {
    $('#popupMaintenanceModal').modal('show');
  }

  $('#popupMaintenanceCheckbox').click(function() {
    if ($(this).is(':checked')) {
        $('#popupMaintenanceModal').modal('hide');
        $.cookie('cacher-modal', true);
    } else {
      $.cookie('cacher-modal', false);
    }
  })
});