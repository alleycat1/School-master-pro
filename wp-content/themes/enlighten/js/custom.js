jQuery(document).ready (function($){
    
    // Counter Achievement
    $('.counter_count').counterUp({
        delay: 10,
        time: 1000
    });
    //Fish Menu JS
    var example = $('#primary-menu').superfish({
		//add options here if required
	});
    //Entrance WOW JS
    var wow = new WOW(
        {
            boxClass: 'wow', // animated element css class (default is wow)
            animateClass: 'animated', // animation css class (default is animated)
            offset: 150, // distance to the element when triggering the animation (default is 0)
            mobile: true, // trigger animations on mobile devices (default is true)
            live: true, // act on asynchronously loaded content (default is true)
            callback: function (box) {
                // the callback is fired every time an animation is started
                // the argument that is passed in is the DOM node being animated
            }
        }
    );
    wow.init();
    //Sickey Sidebar
    $('.secondary, #primary').theiaStickySidebar();
    //Portfolio slide JS
    $('.portfolio_slider_wrap').owlCarousel({
        margin:30,
        nav:false,
        responsive:{
          0:{
                items:1
            },
            360:{
                items:1
            },
             411:{
                items:1
            },
            435:{
                items:1
            },
            500:{
                items:2
            },
            650:{
                items:2
            },
            1000:{
                items:3
            }
        }
    });
    
    //Service Content Slide
    $('.service_slider').owlCarousel({
        nav: true,
        navText: ['<i class="fa fa-long-arrow-left" aria-hidden="true"></i>','<i class="fa fa-long-arrow-right" aria-hidden="true"></i>'],
        margin:10,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    });
    //Home Slider JS
    $('.header_slider').bxSlider({
        pager: false,
        nextText: '',
        prevText: '',
        auto:true,
    });
    
    //Home Video Section
    var myPlayer;
    myPlayer = $('.js-video').YTPlayer();
    $('#togglePlay').click(function(){
        $('#container-1').YTPTogglePlay(function(){});
        $("#togglePlay").toggleClass('play');
        $('#section_video .section_title').toggleClass('play');
        $('.video_wrap').toggleClass('play');
        return false;
    });
    $('.YTPOverlay').click(function(){
        $("#togglePlay").toggleClass('play');
        $('#section_video .section_title').toggleClass('play');
        $('.video_wrap').toggleClass('play');
        return false;
    });

    //News Slide Section JS
    $('.news_slide').bxSlider({
        pager:false,
        mode: 'vertical',
        auto:true,
    });
    
    //Testimonial Slider JS
    $('.test_loop_wrap').bxSlider({
        controls: false,
    });
    
    // FAQS JS
   	$(".faq_ans").hide();
    $(".faq_question").click(function () {
        $(this).siblings(".faq_ans").slideToggle(500);
        $(this).toggleClass("expanded");
        
    });
    $(".plus_minus_wrap").click(function () {
         var id_faq = this.id;
        $('li.'+id_faq).toggleClass('faq_qa_wrap')
    });
    
    //Client List Slide
    $('.client_cat_loop').owlCarousel({
        margin:10,
        nav: true,
        navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>'],
        lazyLoad: true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:7
            }
        }
    });

    $('.mb-ham').on('click', function (){
        $("#primary-menu").slideToggle();
    });

    /** Youtube video BG **/
    var vid_id = $('.background-video').attr('vid');
    if(vid_id != '') {
        $('.background-video').YTPlayer({
          videoId: vid_id,
          callback: function() {
            console.log("playerFinshed");
          }
        });
    }
});