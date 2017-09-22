
// remap jQuery to $
(function ($) {

	/* trigger when page is ready */ 
	$(document).ready(function (){

		// your functions go here

		console.log('ready');

		
		$(document).on('click','.navbar-collapse .in',function(e) {
			console.log('test');
    	if( $(e.target).is('a') && $(e.target).attr('class') != 'dropdown-toggle' ) {
        $(this).collapse('hide');    
    	}
		});

		$('.dropdown-toggle').dropdown();


		$('#nwmn-btn').on('click', function() {
				if( $('#nwmv-collapse').hasClass('in') ){
					console.log('!!!');
					$('#nwmv-collapse').removeClass('in');
				} else {
					$('#nwmv-collapse').addClass('in');
				}
		});


		/*********************************************** 
     *	INTEGRATE ADMINBAR IN HEADDER 
	   ***********************************************/

		if(!$('#wpadminbar').length){
				$('#adm').remove();
			} else {
			$('#wpadminbar').css({
				'top': '0',
			 	'position': 'fixed',
			 	'background-color': 'rgb(50, 71, 91)'
			});	
			var admheight = $('#wpadminbar').outerHeight();
			$("#header").css({
				'top': admheight
			});	
			$('#wpadminbar').appendTo("#adm");

			correct_navbar();
		}

		/*********************************************** 
     *	HEADER FADE ON SCROLL
		 ***********************************************/

		var height_to_fade = $("#header").height() - 10;
		matchWidth(".submenu-panel", "#navcnt");
		submenuPanelOffset();

		function matchWidth(toMatch, template){
			var width = $( template ).width();
		  	$( toMatch ).width(width);
		}
		function submenuPanelOffset(){
			var navbar = $('#navbar-woms').outerHeight();
			var admbar = $('#admbar').outerHeight();
			var offSet = navbar + admbar;
		  	$( 'submenu-panel' ).css({
		  		top: offSet
		  	});
		  	//alert(offSet);
		}

		$( window ).resize(function() {
			matchWidth(".submenu-panel", "#navcnt");
		});

		$(window).on("scroll", function(e) {
	       
			if ($(window).scrollTop() >= height_to_fade){
				$("#header").fadeOut(500);
				$('.navbar-fixed-top').css({ 
					top: '0px',
					WebkitTransition : 'opacity 2s ease-in-out',
				    MozTransition    : 'opacity 2s ease-in-out',
				    MsTransition     : 'opacity 2s ease-in-out',
				    OTransition      : 'opacity 2s ease-in-out',
				    transition       : 'opacity 2s ease-in-out'
				});

				correct_navbar_scrolled();

			} else {
				correct_navbar()
			}

		});

		function correct_navbar_scrolled(){
			if(!$('#wpadminbar').length){
				$('.navbar-fixed-top').css({ 
					top: '0px'
				});
			} else {
				$('.navbar-fixed-top').css({ 
					top: '32px'
				});
			}
		}

		function correct_navbar(){
			$("#header").fadeIn(500)
			if(!$('#wpadminbar').length){
				$('.navbar-fixed-top').css({ 
					top: '100px'
				});
			} else {
				$('.navbar-fixed-top').css({ 
					top: '132px'
				});
			}
		}

		/*********************************************** 
     *	GET RID OF '... SAYS:'
		 ***********************************************/

 		$('span.says').html('sagt:');


		/*********************************************** 
     *	SUBMENU
	   ***********************************************/

		function rm_modal(target){
			$(target).modal("hide");
		    $('.submenu-toggle[data-target="'+target+'"]').css({
				'color': 'white',
	   			'background-color': 'rgb(37, 55, 70)' 
			});
		    $('.modal-backdrop').remove();
		}


		$('.submenu-toggle').click(function(){
			target = $(this).attr('data-target');

			$('.submenu-toggle').not(this).each(function(){
		        not_target = $(this).attr('data-target');
		        rm_modal(not_target);
		    });

		    if($(target).hasClass('in')){
		    	$(target).modal("toggle");
		    	rm_modal(target);
		    	$(this).css({
					'color': 'white', 
		   			'background-color': 'rgb(37, 55, 70)' 
				});
		    } else {
		    	$(target).modal("toggle");
		    	$(this).css({
					'color': 'rgb(88, 89, 91)',
		   			'background-color': 'white'
				});	
				$('.modal-backdrop').attr('menu-active', target);
		    }	
		});


		$(document).click(function (e) {
		    if (e.target === $('.modal-backdrop')[0] && $('body').hasClass('modal-open')) {
		        target = $(e.target).attr('menu-active');
		        rm_modal(target);
		    }
		})

		$('.submenu-dismiss').click(function(){
			var target = '#'+$(this).parent().attr('id');
			rm_modal(target);
		});

	});

}(window.jQuery || window.$));








