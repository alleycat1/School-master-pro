jQuery(document).ready(function($){
    wp.customize( 'enlighten_header_text', function( value ) {
		value.bind( function( newval ) {
			$( '.text_wrap' ).html( newval );
		} );
	} );
    wp.customize( 'enlighten_phone_header', function( value ) {
		value.bind( function( newval ) {
			$( '.phone_header .phone' ).html( newval );
		} );
	} );
    wp.customize( 'enlighten_email_header', function( value ) {
		value.bind( function( newval ) {
			$( '.email_header .email_address' ).html( newval );
		} );
	} );
    wp.customize( 'enlighten_localtion_header', function( value ) {
		value.bind( function( newval ) {
			$( '.location_header .location' ).html( newval );
		} );
	} );
    wp.customize( 'enlighten_news_slide_title', function( value ) {
		value.bind( function( newval ) {
			$( '.news_slider_title' ).html( newval );
		} );
	} );
    wp.customize( 'enlighten_portfolio_title', function( value ) {
		value.bind( function( newval ) {
			$( '#section_portfolio .title_one' ).html( newval );
		} );
	} );
    wp.customize( 'enlighten_portfolio_title_sub', function( value ) {
		value.bind( function( newval ) {
			$( '#section_portfolio .title_two' ).html( newval );
		} );
	} );
    wp.customize( 'enlighten_service_title', function( value ) {
		value.bind( function( newval ) {
			$( '#section_service .title_one' ).html( newval );
		} );
	} );
    wp.customize( 'enlighten_service_title_sub', function( value ) {
		value.bind( function( newval ) {
			$( '#section_service .title_two' ).html( newval );
		} );
	} );
    wp.customize( 'enlighten_video_title', function( value ) {
		value.bind( function( newval ) {
			$( '#section_video .title_one' ).html( newval );
		} );
	} );
    wp.customize( 'enlighten_video_title_sub', function( value ) {
		value.bind( function( newval ) {
			$( '#section_video .title_two' ).html( newval );
		} );
	} );
    wp.customize( 'enlighten_achieve_title', function( value ) {
		value.bind( function( newval ) {
			$( '#section_achieve .title_one' ).html( newval );
		} );
	} );
    wp.customize( 'enlighten_achieve_title_sub', function( value ) {
		value.bind( function( newval ) {
			$( '#section_achieve .title_two' ).html( newval );
		} );
	} );
    wp.customize( 'enlighten_cta_section_title', function( value ) {
		value.bind( function( newval ) {
			$( '.title_section_cta' ).html( newval );
		} );
	} );
    wp.customize( 'enlighten_cta_title', function( value ) {
		value.bind( function( newval ) {
			$( '.cta_title' ).html( newval );
		} );
	} );
    wp.customize( 'enlighten_cta_description', function( value ) {
		value.bind( function( newval ) {
			$( '.cta_desc' ).html( newval );
		} );
	} );
    wp.customize( 'enlighten_cta_button_text', function( value ) {
		value.bind( function( newval ) {
			$( '.button_cta a' ).html( newval );
		} );
	} );
    wp.customize( 'enlighten_faq_title', function( value ) {
		value.bind( function( newval ) {
			$( '.faq_title' ).html( newval );
		} );
	} );
    wp.customize( 'enlighten_testimonial_title', function( value ) {
		value.bind( function( newval ) {
			$( '.title_test' ).html( newval );
		} );
	} );
    wp.customize( 'enlighten_news_title', function( value ) {
		value.bind( function( newval ) {
			$( '.recent_news .rn_title' ).html( newval );
		} );
	} );
    wp.customize( 'enlighten_message_title', function( value ) {
		value.bind( function( newval ) {
			$( '.messag_wrap .rn_title' ).html( newval );
		} );
	} );
    wp.customize( 'enlighten_client_title', function( value ) {
		value.bind( function( newval ) {
			$( '#section_client .title_two' ).html( newval );
		} );
	} );
    wp.customize( 'enlighten_client_title_sub', function( value ) {
		value.bind( function( newval ) {
			$( '#section_client .title_two' ).html( newval );
		} );
	} );
    wp.customize( 'enlighten_achieve_title_one', function( value ) {
		value.bind( function( newval ) {
			$( '.counter_one_wrap .counter_title' ).html( newval );
		} );
	} );
    wp.customize( 'enlighten_achieve_title_two', function( value ) {
		value.bind( function( newval ) {
			$( '.counter_two_wrap .counter_title' ).html( newval );
		} );
	} );
    wp.customize( 'enlighten_achieve_title_three', function( value ) {
		value.bind( function( newval ) {
			$( '.counter_three_wrap .counter_title' ).html( newval );
		} );
	} );
    wp.customize( 'enlighten_achieve_title_four', function( value ) {
		value.bind( function( newval ) {
			$( '.counter_fout_wrap .counter_title' ).html( newval );
		} );
	} );
});