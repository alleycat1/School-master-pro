jQuery(document).ready(function($){

  
  /* Mean Menu */
  $('#main-nav').meanmenu({
    meanMenuContainer: '.bottom-header',
    meanScreenWidth: "991"
  });


  //counters
  $('.count').counterUp({
    delay: 10,
    time: 4000
  });



  //for gallery of home page
  $('#education-care-gallery').lightGallery();

  //slick slider starts
  $('.slick-main-slider').slick({
    dots: true,
    infinite: true,
    speed: 300,
    fade: true,
    arrows:true,
    autoplay: true
  });

  $('.testimonial-slider').slick({
    dots: false,
    infinite: false,
    speed: 300,
    fade: true,
    arrows:false,
    autoplay: true
  });

  //slick slider for vertical news ticker
  $('#latest-notices').slick({
    autoplay: true,
    autoplaySpeed: 3000,
    dots: false,
    slidesToShow: 1,
    slidesToScroll: 1,
    vertical: true,
    arrows:false
  });

  /* custom popup starts */
  $(function() {
      //----- OPEN
      $('[data-popup-open]').on('click', function(e)  {
          var targeted_popup_class = jQuery(this).attr('data-popup-open');
          $('[data-popup="' + targeted_popup_class + '"]').fadeIn(350);
  		
  		$('html').addClass("popup-active");
   
          e.preventDefault();
      });
   
      //----- CLOSE
      $('[data-popup-close]').on('click', function(e)  {
          var targeted_popup_class = jQuery(this).attr('data-popup-close');
          $('[data-popup="' + targeted_popup_class + '"]').fadeOut(350);
   
          e.preventDefault();
  		
  		$('html').removeClass("popup-active");
      });
  });

  /* custom popup ends */

  // Go to top.
  var $scroll_obj = $( '#btn-gotop' );
  $( window ).scroll(function(){
    if ( $( this ).scrollTop() > 100 ) {
      $scroll_obj.fadeIn();
    } else {
      $scroll_obj.fadeOut();
    }
  });

  $scroll_obj.click(function(){
    $( 'html, body' ).animate( { scrollTop: 0 }, 600 );
    return false;
  });  

});



