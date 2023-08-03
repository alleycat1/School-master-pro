(function ($) {
    $(function () {
        //all backend js goes here

        //For uploading icon image
        $('#ap-icon-upload-button').click(function () {
            $(this).closest('.aps-field-wrapper').find('.aps-error').html('');
            formfield = jQuery('#aps-icon-image').attr('name');
            tb_show('', 'media-upload.php?type=image&TB_iframe=true');
            return false;

        });
        window.send_to_editor = function (html) {
            imgurl = jQuery('img', html).attr('src');
            jQuery('#aps-icon-image').val(imgurl);
            jQuery('.aps-image-icon-preview').html('<img src="' + imgurl + '"/>');
            tb_remove();
        }

        //Adding icon to list 
        $('#aps-icon-add-trigger').click(function () {
            error_flag = 0;
            if ($('#aps-icon-title').val() == '')
            {
                error_flag = 1;
                var error_html = $('#aps-icon-title').attr('data-error-msg');
                $('#aps-icon-title').closest('.aps-field-wrapper').find('.aps-error').html(error_html);
            }
            if ($('#aps-icon-link').val() == '')
            {
                error_flag = 1;
                var error_html = $('#aps-icon-link').attr('data-error-msg');
                $('#aps-icon-link').closest('.aps-field-wrapper').find('.aps-error').html(error_html);
            }
            if ($('#aps-icon-type').val() == 'image-icons' && $('#aps-icon-image').val() == '')
            {
                error_flag = 1;
                var error_html = $('#aps-icon-image').attr('data-error-msg');
                $('#aps-icon-image').closest('.aps-field-wrapper').find('.aps-error').html(error_html);

            }

            if ($('#aps-icon-type').val() == 'font-awesome' && $('#aps-font-awesome-icon').val() == '')
            {
                error_flag = 1;
                var error_html = $('#aps-font-awesome-icon').attr('data-error-msg');
                $('#aps-font-awesome-icon').closest('.aps-field-wrapper').find('.aps-error').html(error_html);
            }



            if (error_flag == 0)
            {
                var icon_counter = $('#aps-icon-counter').val();
                icon_counter++;
                $('#aps-icon-counter').val(icon_counter);
                var icon_title = $('#aps-icon-title').val();
                var icon_image = $('#aps-icon-image').val();
                var icon_width = $('#aps-icon-width').val();
                var icon_height = $('#aps-icon-height').val();
                var icon_link = $('#aps-icon-link').val();
                var icon_link_target = $('#aps-icon-link-target').val();
                var icon_tooltip_text = $('#aps-tooltip-text').val();
                var border_type = $('#aps-border-type').val();
                var border_thickness = $('#aps-border-thickness').val();
                var border_color = $('#aps-border-color').val();
                var shadow = $('input[name="aps-icon-shadow"]').val();
                var shadow_offset_x = $('#aps-shadow-offset-x').val();
                var shadow_offset_y = $('#aps-shadow-offset-y').val();
                var shadow_blur = $('#aps-shadow-blur').val();
                var shadow_color = $('#aps-shadow-color').val();
                var padding = $('#aps-border-spacing').val();
                var append_html =
                        '<li class="aps-sortable-icons">' +
                        '<div class="aps-drag-icon"></div>' +
                        '<div class="aps-icon-head"><span class="aps-icon-name">' + icon_title + '</span><span class="aps-icon-list-controls"><span class="aps-arrow-down aps-arrow button button-secondary"><i class="dashicons dashicons-arrow-down"></i></span>&nbsp;&nbsp;<span class="aps-delete-icon button button-secondary" aria-label="delete icon"><i class="dashicons dashicons-trash"></i></span></span></div>' +
                        '<div class="aps-icon-body" style="display: none;">' +
                        '<div class="aps-icon-preview">' +
                        '<label>' + aps_script_variable.icon_preview + '</label>';
                append_html += $('.aps-image-icon-preview').html();//'<img src="' + icon_image + '"/>';
                append_html += '</div>' +
                        '<div class="aps-icon-detail-wrapper">' +
                        '<div class="aps-icon-each-detail">' +
                        '<label>' + aps_script_variable.icon_link + '</label>' +
                        '<div class="aps-icon-detail-text">' + icon_link + '</div>' +
                        '</div>' +
                        '<div class="aps-icon-each-detail">' +
                        '<label>' + aps_script_variable.icon_link_target + '</label>' +
                        '<div class="aps-icon-detail-text">' + icon_link_target + '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '<input type="hidden" name="icons[' + icon_title + '][title]" value="' + icon_title + '"/>' +
                        '<input type="hidden" name="icons[' + icon_title + '][image]" value="' + icon_image + '"/>' +
                        '<input type="hidden" name="icons[' + icon_title + '][icon_width]" value="' + icon_width + '"/>' +
                        '<input type="hidden" name="icons[' + icon_title + '][icon_height]" value="' + icon_height + '"/>' +
                        '<input type="hidden" name="icons[' + icon_title + '][link]" value="' + icon_link + '"/>' +
                        '<input type="hidden" name="icons[' + icon_title + '][link_target]" value="' + icon_link_target + '"/>' +
                        '<input type="hidden" name="icons[' + icon_title + '][tooltip_text]" value="' + icon_tooltip_text + '"/>' +
                        '<input type="hidden" name="icons[' + icon_title + '][border_type]" value="' + border_type + '"/>' +
                        '<input type="hidden" name="icons[' + icon_title + '][border_thickness]" value="' + border_thickness + '"/>' +
                        '<input type="hidden" name="icons[' + icon_title + '][border_color]" value="' + border_color + '"/>' +
                        '<input type="hidden" name="icons[' + icon_title + '][padding]" value="' + padding + '"/>' +
                        '<input type="hidden" name="icons[' + icon_title + '][shadow]" value="' + shadow + '"/>' +
                        '<input type="hidden" name="icons[' + icon_title + '][shadow_offset_x]" value="' + shadow_offset_x + '"/>' +
                        '<input type="hidden" name="icons[' + icon_title + '][shadow_offset_y]" value="' + shadow_offset_y + '"/>' +
                        '<input type="hidden" name="icons[' + icon_title + '][shadow_blur]" value="' + shadow_blur + '"/>' +
                        '<input type="hidden" name="icons[' + icon_title + '][shadow_color]" value="' + shadow_color + '"/>' +
                        '</li>';
                //alert(append_html);
                $('.aps-icon-list').append(append_html);
                if (!$('.aps-icon-theme-expand').is(':visible'))
                {
                    $('.aps-icon-theme-expand').show();
                }
                if ($('.aps-icon-list-wrapper p').is(':visible'))
                {
                    $('.aps-icon-list-wrapper p').hide();
                }
                $('.aps-icon-adder input[type="text"]').each(function () {
                    $(this).val('');
                });
                    
                $('.aps-image-icon-preview').html('Icon Preview');
                reset_styles();
            }
        });
        $('.aps-icon-adder input').keyup(function () {
            $(this).closest('.aps-field-wrapper').find('.aps-error').html('');
        });

        $('.aps-icon-list').on('click', '.aps-icon-head', function (e) {
            if ($(this).parent().find('.aps-arrow i').hasClass('dashicons-arrow-down'))
            {
                $(this).parent().find('i.dashicons-arrow-down').removeClass('dashicons-arrow-down').addClass('dashicons-arrow-up');
            }
            else
            {
                $(this).parent().find('i.dashicons-arrow-up').removeClass('dashicons-arrow-up').addClass('dashicons-arrow-down');

            }
            $(this).closest('.aps-sortable-icons').find('.aps-icon-body').slideToggle(500);
            //e.stopPropagation();
        });

        $('.aps-icon-list').on('click', '.aps-delete-icon', function () {
            if (confirm(aps_script_variable.icon_delete_confirm))
            {
                var icon_counter = $('#aps-icon-counter').val();
                icon_counter--;
                $('#aps-icon-counter').val(icon_counter);
                var selector = $(this);
                $(this).closest('.aps-sortable-icons').fadeOut(800, function () {
                    selector.closest('.aps-sortable-icons').remove();
                });
                return false;
            }
        });

        //sortable initialization
        $('.aps-icon-list').sortable({
             containment: "parent" 
        });

        $('#aps_icon_set_submit').click(function () {
            var error_flag = 0;
            if ($('input[name="set_name"]').val() == '')
            {
                error_flag = 1;
                $('input[name="set_name"]').closest('.aps-field-wrapper').find('.aps-error').html(aps_script_variable.set_name_required_message);
            }
            if ($('.aps-sortable-icons').length < 1)
            {
                error_flag = 1;
                $(this).parent().find('.aps-main-error').html(aps_script_variable.min_icon_required_message)
            }
            if (error_flag == 1)
            {
                return false;
            }
            else
            {
                return true;
            }
        });

        //icon select switcher
        $('#aps-icon-type').change(function () {
            if ($(this).val() == 'font-awesome')
            {
                $('.aps-font-awesome-icon').show();
                $('.aps-image-icon').hide();
            }
            else
            {
                $('.aps-font-awesome-icon').hide();
                $('.aps-image-icon').show();
            }
        });

        //Pre available icon selector
        $('#aps-icon-chooser').click(function () {
            var inner_html = $('.aps-pre-available-icons').html();
            inner_html = $.trim(inner_html);
            if (inner_html == '')
            {
                var i;
                $('#aps-ajax-loader').show();
                $.ajax({
                    url: aps_script_variable.ajax_url,
                    type: 'post',
                    data: 'action=aps_icon_list_action&_wpnonce=' + aps_script_variable.ajax_nonce,
                    success: function (res)
                    {   
                        var set_filter="<div class='aps-clear aps-filter-wrap'><span class='aps-filter-label'>Filter By</span>";
                        set_filter += '<select id="aps-set-filter" class="aps-popup-filter"><option value="all">All</option>';
                        for (i = 1; i <= 12; i++)
                        {
                            set_filter += '<option value="' + i + '">Set ' + i + '</option>';
                        }
                        set_filter += '</select></div>';
                        var html = '<div class="aps-lightbox">\
    <div class="aps-lightbox-inner-wrap">\
        <div class="aps-lightbox-inner-content">\
            <a href="javascript:void(0)" class="aps-close-font aps-close-pre" aria-label="font close button"><span class="dashicons dashicons-no-alt"></span></a><div class="aps-icon-preview-wrap">' + set_filter + res + '</div></div></div>';
                        $('.aps-pre-available-icons').show().html(html);
                        $('#aps-ajax-loader').hide();

                    }
                });
            }
            else
            {
                $('.aps-pre-available-icons').show();
            }

        });

        //pre available icons wrapper close
        $('.aps-pre-available-icons').on('click', '.aps-close-pre', function () {
            $('.aps-pre-available-icons').fadeOut(500);
        });
        $('.aps-pre-available-icons').on('click', '.aps-set-image-wrapper', function () {
            var src = $(this).find('img').attr('src');
            $('#aps-icon-image').val(src);
            $('.aps-image-icon-preview').html('<img src="' + src + '"/>');
            $('.aps-pre-available-icons').fadeOut(500);
        });



        //font awesome icons chooser
        $('#aps-font-icon-chooser').click(function () {
            $('.aps-font-awesome-icons').show();
        });

        //fontawesome icon chooser close
        $('.aps-close-font').click(function () {
            $('.aps-font-awesome-icons').hide();
        });

        $('.aps-color-picker').wpColorPicker();



        //tooltip reference fields show hide
        $('input[name="tooltip"]').click(function () {
            if ($(this).val() == 0)
            {
                $('.aps-tooltip-options').hide();
            }
            else
            {
                $('.aps-tooltip-options').show();
            }
        });

        //tooltip refernce show hide on document.ready
        if ($('input[name="tooltip"]').length > 0) {
            if ($('input[name="tooltip"]:checked').val() == 0)
            {
                $('.aps-tooltip-reference').hide();
            }
            else
            {
                $('.aps-tooltip-reference').show();
            }
        }

        //Number of rows show hide
        $('input[name="display"]').click(function () {
            if ($(this).val() == 'horizontal')
            {
                $('.display-horizontal-reference').show();
                $('.display-vertical-reference').hide();
            }
            else
            {
                $('.display-horizontal-reference').hide();
                $('.display-vertical-reference').show();
            }
        });
        if ($('input[name="display"]').length > 0)
        {
            if ($('input[name="display"]:checked').val() == 'horizontal')
            {
                $('.display-horizontal-reference').show();
            }
            else
            {
                $('.display-horizontal-reference').hide();
            }
        }
        $('input[name="icon_set_type"]').click(function () {
            var pre_set_type = $('#aps-icon-group-type').val();
            if (pre_set_type != $(this).val())
            {
                if ($('.aps-icon-list li').length > 0)
                {
                    if (confirm(aps_script_variable.icon_warning))
                    {
                        $('.aps-icon-list').html('');
                        $('.aps-icon-note').html('');
                        if ($(this).val() == 1)
                        {
                            $('.aps-theme-chooser').hide();
                            $('.aps-icon-adder').show();

                        }
                        else
                        {
                            $('.aps-theme-chooser .aps-theme').removeAttr('checked');
                            $('.aps-theme-chooser').show();
                            $('.aps-icon-adder').hide();
                        }
                    }
                    else
                    {
                        return false;
                    }
                }
                else
                {
                    if ($(this).val() == 1)
                    {
                        $('.aps-theme-chooser').hide();
                        $('.aps-icon-adder').show();

                    }
                    else
                    {
                        $('.aps-theme-chooser .aps-theme').removeAttr('checked');
                        $('.aps-theme-chooser').show();
                        $('.aps-icon-adder').hide();
                    }
                }
                $('#aps-icon-group-type').val($(this).val());
            }
            else
            {
                return false;
            }

        });
        var prev_theme = '';
        $('.aps-theme').click(function () {
            var already_icons = $('.aps-sortable-icons').length;
            var clicked_theme = $(this).val();
            if (prev_theme != clicked_theme)
            {
                var check = 1;
                if (already_icons > 0 && already_icons!=21)
                {
                    check = 0;
                    if (confirm(aps_script_variable.icon_warning))
                    {
                        check = 1;
                    }

                }
                if (check == 1)
                {
                    $('#aps-icon-theme-loader').show();
                    
                    var url_only = (already_icons==21)?'yes':'no';
                    prev_theme = clicked_theme;
                    $('.aps-icon-list .aps-icon-note').remove();
                    var sub_folder = 'png';
                    var folder = $(this).val();
                    $('#icon_theme_type').val(sub_folder);
                    $('#icon_theme_id').val(folder);
                    $.ajax({
                        type: 'post',
                        url: aps_script_variable.ajax_url,
                        data: 'sub_folder=' + sub_folder + '&folder=set' + folder + '&_wpnonce=' + aps_script_variable.ajax_nonce + '&action=get_theme_icons&url_only='+url_only,
                        success: function (res)
                        {
                            if(url_only=='yes')
                            {
                                var image_array = $.parseJSON(res);
                                 var image_name;
                                    for(image_name in image_array)
                                    {
                                        $('img[data-image-name="'+image_name+'"]').attr('src',image_array[image_name]);
                                        $('input[data-image-name="'+image_name+'"]').attr('value',image_array[image_name]);
                                    }
                                
                            }
                            else
                            {
                                $('.aps-icon-list').html(res);
                                $('.aps-icon-note').show();
                                var total_icons = $('.aps-icon-list li').length;
                                $('#aps-icon-counter').val(total_icons);
                                $('.aps-color-picker').wpColorPicker();
                                
                                $('.aps-icon-list-wrapper p').hide();
                                if (!$('.aps-icon-theme-expand').is(':visible'))
                                {
                                    $('.aps-icon-theme-expand').show();
                                }    
                            }
                            $('#aps-icon-theme-loader').hide();
                            
                        }
                    });
                }
                else
                {
                    return false;
                }
            }
            else
            {
                return false;
            }
        });
        if ($('input[name="icon_set_type"]').length > 0)
        {
            if ($('input[name="icon_set_type"]:checked').val() == 1)
            {
                $('.aps-theme-chooser').hide();
                $('.aps-icon-adder').show();
            }
            if ($('input[name="icon_set_type"]:checked').val() == 2)
            {

                $('.aps-theme-chooser').show();
                $('.aps-icon-adder').hide();
            }

        }



        //lists all the id that need to increment on key press up and decrement on key press down
        var
                incrementorIdArray = "#aps-icon-size";//font-awesome icon size
        incrementorIdArray += ",#aps-border-thickness,#radius-top-left,#radius-top-right,#radius-bottom-left,#radius-bottom-right";//border-radius
        incrementorIdArray += ",#aps-vertical-padding,#aps-horizontal-padding";//space inside icons
        incrementorIdArray += ",#aps-shadow-offset-x,#aps-shadow-offset-y,#aps-shadow-blur";//icon shadow
        incrementorIdArray += ",#aps-icon-width,#aps-icon-height,#aps-border-spacing,.aps_theme_icon_width,.aps_theme_icon_height";

        //adds event to increment value by on if keup is pressed and decrement if kedown is pressed
        $('body').on('keyup',incrementorIdArray,function (e) {
            var keyCode = e.keyCode, temp;
            if (keyCode === 38) {
                temp = $(this).val().replace('px', '');
                ++temp;
                //apsIconSize=temp+"px";
                $(this).val(temp + "px");
            } else if (keyCode === 40) {
                temp = $(this).val().replace('px', '');
                --temp;
                //apsIconSize=temp+"px";
                $(this).val(temp + "px");
            }
        });

        //Border references show hide
        $('#aps-border-type').change(function () {
            var border_type = $(this).val();
            if ($(this).val() !== 'none')
            {
                $('.aps-border-refernce').show();
                var border_thickness = ($('#aps-border-thickness').val() === '') ? '1px' : $('#aps-border-thickness').val();
                var border_color = ($('#aps-border-color').val() === '') ? '#000' : $('#aps-border-color').val();
                var border_css = border_thickness + ' ' + border_type + ' ' + border_color;
                $('.aps-image-icon-preview img').css({
                    'border': border_css
                });
            }
            else
            {
                $('.aps-border-refernce').hide();
                $('.aps-image-icon-preview img').css({
                    'border': ''
                });
            }
        });

        //shadow reference
        $('input[name="aps-icon-shadow"]').click(function () {
            if ($(this).val() === 'yes')
            {
                $('.aps-shadow-reference').show();
            }
            else
            {
                $('.aps-shadow-reference').hide();
                $('#aps-shadow-offset-x,#aps-shadow-offset-y,#aps-shadow-blur,#aps-shadow-color').val('');
                $('#aps-shadow-color').closest('.wp-picker-container').find('.wp-color-result').css({'background-color':''});
                $('.aps-image-icon-preview img').css({
                    '-moz-box-shadow': '',
                '-webkit-box-shadow': '',
                'box-shadow': ''
                });
            }
        });

        //border color wpColorPicker initialization
        $('#aps-border-color').wpColorPicker({
            change: function (event, ui) {
                var border_type = $('#aps-border-type').val();
                var border_thickness = $('#aps-border-thickness').val();
                if (border_type !== 'none')
                {
                    var border_color = ui.color.toString();
                    var border_css = border_thickness + ' ' + border_type + ' ' + border_color;
                    $('.aps-image-icon-preview img').css({
                        'border': border_css
                    });
                }
            }
        });

        //icon width preview
        $('#aps-icon-width').keyup(function () {
            $('.aps-image-icon-preview img').css({
                'width': $(this).val()
            });
        });

        //border style preview
        $('#aps-icon-height').keyup(function () {
            $('.aps-image-icon-preview img').css({
                'height': $(this).val()
            });
        });

        $('#aps-border-thickness').keyup(function () {
            var border_type = $('#aps-border-type').val();
            var border_thickness = $(this).val();
            if (border_type !== 'none')
            {
                var border_color = ($('#aps-border-color').val() === '') ? '#000' : $('#aps-border-color').val();
                var border_css = border_thickness + ' ' + border_type + ' ' + border_color;
                $('.aps-image-icon-preview img').css({
                    'border': border_css
                });

            }
        });
        
        $('#aps-border-spacing').keyup(function(){
            var padding = $(this).val();
           $('.aps-image-icon-preview img').css({
                    'padding': padding
                });
        });

        //border style preview ends

        //shadow style preview
        $('#aps-shadow-offset-x,#aps-shadow-offset-y,#aps-shadow-blur').keyup(function () {
            var offset_x = ($('#aps-shadow-offset-x').val() === '') ? '0' : $('#aps-shadow-offset-x').val();
            var offset_y = ($('#aps-shadow-offset-y').val() === '') ? '0' : $('#aps-shadow-offset-y').val();
            var blur = ($('#aps-shadow-blur').val() === '') ? '1px' : $('#aps-shadow-blur').val();
            var color = $('#aps-shadow-color').val();
            $('.aps-image-icon-preview img').css({
                '-moz-box-shadow': offset_x + ' ' + offset_y + ' ' + blur + ' ' + '0' + ' ' + color,
                '-webkit-box-shadow': offset_x + ' ' + offset_y + ' ' + blur + ' ' + '0' + ' ' + color,
                'box-shadow': offset_x + ' ' + offset_y + ' ' + blur + ' ' + '0' + ' ' + color
            });

        });

        $('#aps-shadow-color').wpColorPicker({
            change: function (event, ui) {
                var offset_x = ($('#aps-shadow-offset-x').val() === '') ? '0' : $('#aps-shadow-offset-x').val();
                var offset_y = ($('#aps-shadow-offset-y').val() === '') ? '0' : $('#aps-shadow-offset-y').val();
                var blur = ($('#aps-shadow-blur').val() === '') ? '1px' : $('#aps-shadow-blur').val();
                var color = ui.color.toString();
                $('.aps-image-icon-preview img').css({
                    '-moz-box-shadow': offset_x + ' ' + offset_y + ' ' + blur + ' ' + '0' + ' ' + color,
                    '-webkit-box-shadow': offset_x + ' ' + offset_y + ' ' + blur + ' ' + '0' + ' ' + color,
                    'box-shadow': offset_x + ' ' + offset_y + ' ' + blur + ' ' + '0' + ' ' + color
                });

            }
        });
        //shadow style preview ends

        //Theme Icon Height Width Preview
        $('.aps-icon-list ').on('keyup', '.aps_theme_icon_width', function () {
            $(this).closest('.aps-row').find('.aps-icon-preview img').css('width', $(this).val());
        });

        $('.aps-icon-list ').on('keyup', '.aps_theme_icon_height', function () {
            $(this).closest('.aps-row').find('.aps-icon-preview img').css('height', $(this).val());
        });



        //add animation on icon hover inside preview box
        $('.aps-preview-holder').on('hover', '.aps-image-icon-preview,.aps-font-icon-preview', function (e) {
            var animationType = $('#aps-icon-animation').val();
            if (animationType !== "") {
                if (!$(this).find('img,.fa').hasClass('animated')) {
                    $(this).find('img,.fa').addClass('animated');
                }
                $(this).find('img,.fa').toggleClass(animationType);
            }
            e.stopPropagation();
            e.preventDefault();
        });

        //social sidebar display type toggle
        $('select[name="set_display_type"]').change(function () {
            var display_type = $(this).val();
            if (display_type == 'button_display')
            {
                $('.aps-set-display-reference').show();
            }
            else
            {
                $('.aps-set-display-reference').hide();
            }
        });

        //pre available icons setwise filter
        $('.aps-pre-available-icons').on('change', '#aps-set-filter', function () {
            var set_id = $(this).val();
            if (set_id != 'all')
            {
                $('.aps-set-wrapper').hide();
                $('#aps-set-' + set_id).show();
            }
            else
            {
                $('.aps-set-wrapper').show();
            }

        });

        //Theme icons expand collapse trigger
        $('.aps-icon-theme-expand').click(function () {
            if ($(this).html() === aps_script_variable.icon_expand)
            {
                $('.aps-icon-body').slideDown(500)
                $(this).html(aps_script_variable.icon_collapse)
                $('i.dashicons-arrow-down').removeClass('dashicons-arrow-down').addClass('dashicons-arrow-up');
            }
            else
            {
                $('.aps-icon-body').slideUp(500)
                $('i.dashicons-arrow-up').removeClass('dashicons-arrow-up').addClass('dashicons-arrow-down');
                $(this).html(aps_script_variable.icon_expand);
            }
        });
        
        function reset_styles()
        {
            $('#aps-border-type option[value="none"]').attr('selected','selected');
            $('.aps-icon-adder .wp-color-result').css({'background-color':''});
        }
    });//document.ready close
}(jQuery));