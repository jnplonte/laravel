var lazyLoading = (function($) {
  var defaults = {
      selector:    'img.lazy'
  };

  return {
    init: function(data) {
      data = $.extend(defaults, data);
      lazyLoading.putImg();
      $(window).scroll(function() {
        lazyLoading.putImg();
      });
    },

    putImg: function(){
      var images = [], query = lazyLoading.runLazy(defaults.selector);
      for (var i = 0; i < query.length; i++) {
        images.push(query[i]);
      }
      lazyLoading.processScroll(images);
    },

    runLazy: function(q, res) {
      if (document.querySelectorAll) {
        res = document.querySelectorAll(q);
      } else {
        var d = document,
          a = d.styleSheets[0] || d.createStyleSheet();
        a.addRule(q, 'f:b');
        for (var l = d.all, b = 0, c = [], f = l.length; b < f; b++)
          l[b].currentStyle.f && c.push(l[b]);
        a.removeRule(0);
        res = c;
      }
      return res;
    },

    processScroll: function(images) {
      for (var i = 0; i < images.length; i++) {
        if (lazyLoading.elementInViewport(images[i])) {
          lazyLoading.loadImage(images[i], function() {
            images.splice(i, i);
          })
        }
      }
    },

    loadImage: function(el, fn) {
      var img = new Image(),
        src = el.getAttribute('data-src');
      img.onload = function() {
        if (!!el.parent){
          el.parent.replaceChild(img, el)
        }else{
          el.src = src;
        }
        el.className = "";
        fn ? fn() : null;
      };
      img.src = src;
    },

    elementInViewport: function(el) {
      var rect = el.getBoundingClientRect();
      return (
        rect.top >= 0 && rect.left >= 0 && rect.top <= (window.innerHeight || document.documentElement.clientHeight)
      );
    }
  };
})(jQuery);
