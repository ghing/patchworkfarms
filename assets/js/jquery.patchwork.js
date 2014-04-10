(function(window, $) {
  $.fn.patchworkfarms = function(action, opts) {
    var $el = this;

    var defaults = {
      locationLink: 'nav a',
      locations: '.location'
    };

    var settings = $.extend({}, defaults, opts);

    if (action === "locations") {
      $el.find(settings.locationLink).first().parent().addClass('active');
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
    $('#hours-location').patchworkfarms('locations');
  });
})(window, jQuery);
