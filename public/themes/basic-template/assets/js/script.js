$(document).foundation();

$(document).ready(function() {
  if ($('.alert-box').length >= 1) {
    setTimeout(function() {
      $('.alert-box .close').trigger('click');
    }, 3000)
  }

  if ($('.date-picker').length >= 1) {
    $('.date-picker').fdatepicker({
      "format" : 'yyyy-mm-dd'
    });

    $(".fa").removeClass (function (index, css) {
      return (css.match (/(^|\s)fa-\S+/g) || []).join(' ');
    });
  }

  lazyLoading.init();
  scrollUp.init();
});
