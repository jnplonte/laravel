var lazyLoading = (function($) {
  var defaults = {
      selector: 'img.lazy'
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

var scrollUp = (function($) {
  var defaults = {
      color: '#008CBA',
      image: '/themes/basic-template/assets/img/up-arrow.png'
  };

  return {
    init: function(data) {
      data = $.extend(defaults, data);
      scrollUp.runScroll();

      $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
            $('.scrollup').fadeIn();
        } else {
            $('.scrollup').fadeOut();
        }
      });
    },

    runScroll: function() {
        $("body").append("<a href='javascript:void(0);' class='scrollup'>&nbsp;</a>");
        $(".scrollup").css({
            "position":"fixed",
            "bottom":"25px",
            "right":"25px",
            "display":"none",
            "background-color": defaults.color,
            "width": "50px",
            "height": "50px",
            "background-position": "center center",
            "background-repeat": "no-repeat",
            "background-image": "url('"+defaults.image+"')",
            "opacity": "0.8",
            "filter": "alpha(opacity = 80)",
            "-webkit-border-radius": "8px",
            "-moz-border-radius": "8px",
            "border-radius": "8px"
        });

        $("body").on('click', '.scrollup', function () {
            $("html, body").animate({ scrollTop: 0 }, 'slow');
            return false;
        });
    }
  };
})(jQuery);
