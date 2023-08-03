( function( api ) {
    // Extends our custom "example-1" section.
    api.sectionConstructor['enlighten-pro'] = api.Section.extend( {
        // No events for this type of section.
        attachEvents: function () {},
        // Always make the section active.
        isContextuallyActive: function () {
            return true;
        }
    } );
} )( wp.customize );
jQuery(document).ready(function($){   
    $('.ap-font-group li i.fa').click(function(){
        className = $(this).attr("class");
        
        $('.ap-font-group li i.fa').removeClass('active');
        $(this).addClass('active');        
        $(this).parents(".fa_preview").next('input:hidden').val(className).change();
        $(this).parents(".ap-font-group").prev('#fa_prev').removeClass();
        $(this).parents(".ap-font-group").prev('#fa_prev').addClass(className);
    });
});