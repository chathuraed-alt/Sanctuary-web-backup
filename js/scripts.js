jQuery(document).ready(function($) {
  if ($.fn.owlCarousel) {
    var owlConfigs = {
      '.owl-one': { autoplayTimeout: 2000 },
      '.owl-two': { autoplayTimeout: 2000 },
      '.owl-three': { autoplayTimeout: 5000 }
    };

    $.each(owlConfigs, function(selector, overrides) {
      var $carousel = $(selector);
      if (!$carousel.length) return;

      $carousel.owlCarousel($.extend({
        loop: true,
        margin: 60,
        autoplay: true,
        autoplayHoverPause: false,
        responsiveClass: true,
        autoWidth: true,
        center: true,
        responsive: {
          0: { items: 1, nav: true },
          600: { items: 3, nav: true },
          1000: { items: 5, nav: true, loop: true, margin: 60 }
        }
      }, overrides));
    });
  }

  $('.count').each(function() {
    $(this).prop('Counter', 0).animate({
      Counter: $(this).text()
    }, {
      duration: 4000,
      easing: 'swing',
      step: function(now) {
        $(this).text(Math.ceil(now));
      }
    });
  });

  if ($.fn.carousel && $('.carousel').length) {
    $('.carousel').carousel({ interval: 1000 });
  }
});
