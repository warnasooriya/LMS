/*
# mod_sp_quickcontact - Ajax based quick contact Module by JoomShaper.com
# -----------------------------------------------------------------------	
# Author    JoomShaper http://www.joomshaper.com
# Copyright (C) 2010 - 2014 JoomShaper.com. All Rights Reserved.
# License - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Websites: http://www.joomshaper.com
*/

(function ($) {
    "use strict";
    $(document).ready(function() {

        $('#sp-quickcontact-form').submit(function() {
            var value   = $(this).serializeArray(),
            request = {
                'option' : 'com_ajax',
                'module' : 'sp_quickcontact',
                'data'   : value,
                'format' : 'jsonp'
            };
            $.ajax({
                type   : 'POST',
                data   : request,
                beforeSend: function(){
                    $('#sp_qc_submit').before('<p class="sp_qc_loading"></p>');
                },
                success: function (response) {
                    $('#sp_qc_status').hide().html(response).fadeIn().delay(2000).fadeOut(500);
                    $('.sp_qc_loading').fadeOut(function(){
                        $(this).remove();
                    });
                }
            });
            return false;
        });

    });
})(jQuery);