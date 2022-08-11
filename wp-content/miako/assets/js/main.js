jQuery(document).ready(function($){
	"use strict";

    /* Scroll to top */
    $('.scrollToTop').on('click',function(){
        $('html, body').animate({scrollTop : 0},800);
        return false;
    });
    $(window).scroll(function(){
        if ($(this).scrollTop() > 100) {
            $('.scrollToTop').fadeIn();
        } else {
            $('.scrollToTop').fadeOut();
        }
    });

    /* Nav smooth scroll */
    $('#site-navigation .menu').onePageNav({
        extraOffset: MiakoObj.extraOffset,
    });
	
	/* Search Box */
	$(".search-box-area").on('click', '.search-button, .search-close', function(event){
		event.preventDefault();
		if($('.search-text').hasClass('active')){
			$('.search-text, .search-close').removeClass('active');
		} else {
			$('.search-text, .search-close').addClass('active');
		}
		return false;
	});

    /* Sticky Menu */
    if ( MiakoObj.stickyMenu == 1 || MiakoObj.stickyMenu == 'on' ) {
        $(window).scroll(function() {
            var s = $("body");
            var windowpos = $(window).scrollTop();
            if(windowpos > 0){
                s.removeClass("non-stick");
                s.addClass("stick");
            } 
            else {
                s.removeClass("stick");
                s.addClass("non-stick");
            }
        });
    }

    /* MeanMenu - Mobile Menu */
    $('#site-navigation nav').meanmenu({
        meanMenuContainer: '#meanmenu',
        meanScreenWidth: MiakoObj.meanWidth,
        removeElements: "#masthead",
        siteLogo: MiakoObj.siteLogo
    });

    /* Header Right Menu */
    $('.additional-menu-area').on('click', '.side-menu-trigger', function (e) {
    	e.preventDefault();
        $('.sidenav').width(280);
    });
    $('.additional-menu-area').on('click', '.closebtn', function (e) {
        e.preventDefault();
        $('.sidenav').width(0);
    });

    /* Mega Menu */
    $('.site-header .main-navigation ul > li.mega-menu').each(function() {
        // total num of columns
        var items = $(this).find(' > ul.sub-menu > li').length;
        // screen width
        var bodyWidth = $('body').outerWidth();
        // main menu link width
        var parentLinkWidth = $(this).find(' > a').outerWidth();
        // main menu position from left
        var parentLinkpos = $(this).find(' > a').offset().left;

        var width = items * 220;
        var left  = (width/2) - (parentLinkWidth/2);

        var linkleftWidth  = parentLinkpos + (parentLinkWidth/2);
        var linkRightWidth = bodyWidth - ( parentLinkpos + parentLinkWidth );

        // exceeds left screen
        if( (width/2)>linkleftWidth ){
            $(this).find(' > ul.sub-menu').css({
                width: width + 'px',
                right: 'inherit',
                left:  '-' + parentLinkpos + 'px'
            });        
        }
        // exceeds right screen
        else if ( (width/2)>linkRightWidth ) {
            $(this).find(' > ul.sub-menu').css({
                width: width + 'px',
                left: 'inherit',
                right:  '-' + linkRightWidth + 'px'
            }); 
        }
        else{
            $(this).find(' > ul.sub-menu').css({
                width: width + 'px',
                left:  '-' + left + 'px'
            });            
        }
    });
	
    /* Owl Custom Nav */
    if (typeof $.fn.owlCarousel == 'function') {
        $(".owl-custom-nav .owl-next").on('click', function() {
            $(this).closest('.owl-wrap').find('.owl-carousel').trigger('next.owl.carousel');
        });
        $(".owl-custom-nav .owl-prev").on('click', function() {
            $(this).closest('.owl-wrap').find('.owl-carousel').trigger('prev.owl.carousel');
        });
		
        $(".rt-owl-carousel").each(function() {
            var options = $(this).data('carousel-options');
            if ( MiakoObj.rtl == 'yes' ) {
                options['rtl'] = true; //@rtl
            }
            $(this).owlCarousel(options); 
        });
		

    }
	
	/*VC JS*/
	/* Counter */
	if ( typeof $.fn.counterUp == 'function') {
		$('.rt-vc-counter-1 .rt-counter').counterUp({
			delay: $(this).data('rtSteps'),
			time: $(this).data('rtSpeed')
		});
	}
	if ( typeof $.fn.counterUp == 'function') {
		$('.rt-vc-counter-2 .rt-counter  ').counterUp({
			delay: $(this).data('rtSteps'),
			time: $(this).data('rtSpeed')
		});
	}
	/* Team Slider 3 Detail*/
    $(".rtin-team-box").on({
        mouseenter: function(){
            var bghover = $(this).data('bghover');
            $(this).find(".rtin-single-team").css('background-color', bghover);
        },
        mouseleave: function(){
            var bgcolor = $(this).data('bgcolor');
            $(this).find(".rtin-single-team").css('background-color', bgcolor);          
        }
    }, this);

	/* Infobox 1 */
    $(".rt-info-text").on({
        mouseenter: function(){
            var title_hover = $(this).data('title-hover');
            $(this).find(".media-heading , .media-heading a").css('color', title_hover);
        },
        mouseleave: function(){
            var title_color = $(this).data('title-color');
            $(this).find(".media-heading , .media-heading a").css('color', title_color);			
        }
    }, this);
	/* Pricing Box 1 */
    $(".rt-price-table-box1").on({
        mouseenter: function(){
            var bghover = $(this).data('bghover');
            $(this).css('background-color', bghover);
            $(this).find(".rt-btn a , .price-holder , a.pricetable-btn").css('color', bghover);
			
        },
        mouseleave: function(){
            var bgcolor = $(this).data('bgcolor');
            $(this).css('background-color', bgcolor);
            $(this).find(".rt-btn a").css('color', '');          
            $(this).find(".price-holder").css('color', bgcolor);
			$(this).find("a.pricetable-btn").css('color', '#f8f8f8');
        }
    }, this);
	/* Infobox 5 */	
	$('.rt-infobox-5').each(function() {
        var $column = $(this).closest('.vc_column-inner');
        var bgcolor = $column.css('background-color');
        var bghover = $(this).data('hover');
        $column.on({
            mouseenter: function(){
                $column.attr('style', 'background-color: '+ bghover +' !important');
            },
            mouseleave: function(){
                $column.attr('style', 'background-color: '+ bgcolor +' !important');
            }
        });
    });
	/*Infobox 10*/
    $(".rt-infobox-10").on({
        mouseenter: function(){
            var title_hover = $(this).data('title-hover');
            var icon_hover = $(this).data('hover');
            $(this).find("h3 a").css('color', title_hover);
            $(this).find(".rtin-info-icon a i").css('color', icon_hover);
        },
        mouseleave: function(){
            var title_color = $(this).data('title-color');
			var icon = $(this).data('color');
            $(this).find("h3 a").css('color', title_color);
            $(this).find(".rtin-info-icon a i").css('color', icon);
        }
    }, this);
	
	/* Service Box 6 - grid & slider also */
    $(".rt-service-layout-6").on({
        mouseenter: function(){
            var bghover = $(this).data('bghover');
            $(this).css('background-color', bghover);
        },
        mouseleave: function(){
            var bgcolor = $(this).data('bgcolor');
            $(this).css('background-color', bgcolor);
        }
    }, this);
	
    /* Woocommerce Shop change view */
    $('#shop-view-mode li a').on('click',function(){
        $('body').removeClass('product-grid-view').removeClass('product-list-view');

        if ( $(this).closest('li').hasClass('list-view-nav')) {
            $('body').addClass('product-list-view');
            Cookies.set('shopview', 'list');
        }
        else{
            $('body').addClass('product-grid-view');
            Cookies.remove('shopview');
        }
        return false;
    });
	
	
});

(function($){
    "use strict";

    // Window Load+Resize
    $(window).on('load resize', function () {
        // Define the maximum height for mobile menu
        var wHeight = $(window).height();
        wHeight = wHeight - 50;
        $('.mean-nav > ul').css('max-height', wHeight + 'px');
    });

    // Window Load
    $(window).on('load', function () {
        // Preloader
        $('#preloader').fadeOut('slow', function () {
            $(this).remove();
        });
        
        // Onepage Nav on meanmenu
        $('#meanmenu .menu').onePageNav({
            extraOffset: MiakoObj.extraOffsetMobile,
            end: function() {
                $('.meanclose').trigger('click');
            } 
        });
    });

})(jQuery);