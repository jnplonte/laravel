$(document).foundation();

$(document).ready(function() {
  if ($('.alert-box').length >= 1) {
    setTimeout(function() {
      $('.alert-box .close').trigger('click');
    }, 3000)
  }
});
