// Trigger CSS animations on scroll.
jQuery(function($) {

  // Function which adds the 'animated' class to any '.animatable' in view
  var doAnimations = function() {

    // Calc current offset and get all animatables
    var offset = $(window).scrollTop() + $(window).height() - 100,
        $animatables = $('.animatable');

    // Unbind scroll handler if we have no animatables
    if ($animatables.size() == 0) {
      $(window).off('scroll', doAnimations);
    }

    // If Mobile Menu is visible...
    // Check all animatables and animate them if necessary
    $animatables.each(function(i) {
      var $animatable = $(this);
      // Effect happens as soon as object comes into view.
			if ( $animatable.offset().top < offset) {
        // Replace bounceIn with fadeIn
        $animatable.removeClass('animatable').addClass('animated');
			}
    });
	};

  // Hook doAnimations on scroll, and trigger a scroll
	$(window).on('scroll', doAnimations);
  $(window).trigger('scroll');

});
//# sourceURL=pen.js
