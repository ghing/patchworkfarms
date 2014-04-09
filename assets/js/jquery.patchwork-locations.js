(function(window, $) {
  $.fn.patchworkfarms = function(action, opts) {
    var $el = this;

    var defaults = {
      locationLink: '.nav-locations a',
      locations: '.location'
    };

    var settings = $.extend({}, defaults, opts);

    if (action === "locations") {
      $el.find(settings.locationLink).click(function(evt) {
        var $this = $(this);
        var sel = $this.attr('href');
        evt.preventDefault();
        $this.closest('ul').find('li').removeClass('active');
        $this.closest('li').addClass('active');
        $(settings.locations).hide();
        $(sel).show();
      });
    }

    return this;
  };

  $(function() {
    $('.home').patchworkfarms('locations');
  });
})(window, jQuery);
