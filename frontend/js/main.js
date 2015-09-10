(function($) {
    "use strict";

    var $body = $('body'),
    $wrapper = $('.body-innerwrapper'),
    $toggler = $('#offcanvas-toggler'),
    $close = $('.close-offcanvas'),
    $offCanvas = $('.offcanvas-menu');

    $toggler.on('click', function(event){
        event.preventDefault();
        stopBubble (event);
        setTimeout(offCanvasShow, 50);
    });

    $close.on('click', function(event){
        event.preventDefault();
        offCanvasClose();
    });

    var offCanvasShow = function(){
        $body.addClass('offcanvas');
        $wrapper.on('click',offCanvasClose);
        $close.on('click',offCanvasClose);
        $offCanvas.on('click',stopBubble);

    };

    var offCanvasClose = function(){
        $body.removeClass('offcanvas');
        $wrapper.off('click',offCanvasClose);
        $close.off('click',offCanvasClose);
        $offCanvas.off('click',stopBubble);
    };

    var stopBubble = function (e) {
        e.stopPropagation();
        return true;
    };

    //Mega Menu
    $('.sp-megamenu-wrapper').parent().parent().css('position','static').parent().css('position', 'relative');
    $('.sp-menu-full').each(function(){
        $(this).parent().addClass('menu-justify');
    });

    //Tooltip
    $('[data-toggle="tooltip"]').tooltip();
    
    $(document).on('click', '.sp-rating .star', function(event) {
        event.preventDefault();

        var data = {
            'action':'voting',
            'user_rating' : $(this).data('number'),
            'id' : $(this).closest('.post_rating').attr('id')
        };

        var request = {
                'option' : 'com_ajax',
                'plugin' : 'helix3',
                'data'   : data,
                'format' : 'json'
            };

        $.ajax({
            type   : 'POST',
            data   : request,
            beforeSend: function(){
                $('.post_rating .ajax-loader').show();
            },
            success: function (response) {
                var data = $.parseJSON(response.data);

                $('.post_rating .ajax-loader').hide();

                if (data.status == 'invalid') {
                    $('.post_rating .voting-result').text('You have already rated this entry!').fadeIn('fast');
                }else if(data.status == 'false'){
                    $('.post_rating .voting-result').text('Somethings wrong here, try again!').fadeIn('fast');
                }else if(data.status == 'true'){
                    var rate = data.action;
                    $('.voting-symbol').find('.star').each(function(i) {
                        if (i < rate) {
                           $( ".star" ).eq( -(i+1) ).addClass('active');
                        }
                    });

                    $('.post_rating .voting-result').text('Thank You!').fadeIn('fast');
                }

            },
            error: function(){
                $('.post_rating .ajax-loader').hide();
                $('.post_rating .voting-result').text('Failed to rate, try again!').fadeIn('fast');
            }
        });
    });




    $(document).ready(function($){

        // for sticky menu
        $("body.sticky-header").find('#sp-header').sticky({topSpacing:0})

        // Parallax script
        $.stellar({
            responsive:true,
            horizontalScrolling: false,
            verticalScrolling: true
        });
        $('#lan_donate').attr('data-stellar-background-ratio', '0.5');


        // latest news script

        $('#ns2-art-wrap110').nssp2({
            interval: 5000
        })


        // latest event script

        $('#ns2-art-wrap123').nssp2({
            interval: 5000
        })


        // tab script
        $('#myTab a').click(function(e) {
            e.preventDefault()
            jQuery(this).tab('show');
            jQuery(".tab_img").addClass("animated slideUp");
        });


        // progress status
        $('#myStathalf1').circliful();
        $('#myStathalf2').circliful();
        $('#myStathalf3').circliful();
        $('#myStat1').circliful();
        $('#myStat2').circliful();
        $('#myStat3').circliful();
        $('#myStat4').circliful();


        // team member hover effect
        $('.boxgrid.caption').hover(function() {
            $(".cover", this).stop().animate({
                top: '0px'
            }, {
                queue: false,
                duration: 420
            });
        }, function() {
            $(".cover", this).stop().animate({
                top: '295px'
            }, {
                queue: false,
                duration: 420
            });
        });

    });

})(jQuery);








