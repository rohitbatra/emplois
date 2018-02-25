(function($) {
	"use strict";

	$(window).load(function() {
		$("#loader").fadeOut("slow");
	});

	

	$(document).ready(function() {

		// ====================================================================
		// Header scroll function

		setInterval(function(){ 

			$( ".owl-next" ).trigger( "click" );

		}, 3000);

		//$(".salary").prepend("&#8377; ")


// This is done to trim location with 40 chars length only
$('.location').each(function() {
    var that = $(this),
        title = that.text(),
        chars = title.length;

    if (chars > 40) {
        var newTitle = title.substring(0, 37) + "...";
        that.text(newTitle);
    }
});


		$(window).scroll(function() {    
			var scroll = $(window).scrollTop();
			if (scroll > 50) {
				$("#header-background").slideDown(300);
			} else {
				$("#header-background").slideUp(300);
			}
		});

		// ====================================================================
		// Flex Menu

		$('.fm-container > .menu').flexMenu({
			breakpoint: 3000,
			responsivePattern: 'off-canvas',
			animationSpeed: 300
		});

		$(".fm-button").click(function(){
			if($("header").css('left') == '0px'){
				$("header").stop().animate({left:'240px'},300);
			};
			if($("header").css('left') == '240px'){
				$("header").stop().animate({left:'0px'},300);
			};
		 });

		// ====================================================================
		// Counterup

		if( $().counterUp ) {
			$('.number').counterUp({
				delay: 10, // the delay time in ms
				time: 1000 // the speed time in ms
			});
		}

		// ====================================================================
		// Carousels

		if( $().owlCarousel ) {

			// Blog Posts Carousel

			$(".recent-blog-posts").each( function(){

				var columns  = parseInt( $(this).attr('data-columns') );
				var autoplay = parseInt( $(this).attr('data-autoplay') );

	            switch (columns) {
	               case 2:
	                  var responsive = { 0:{ items: 1 }, 767:{ items: 2 }, 992:{ items: columns }, 1200:{ items: columns }, 1600:{ items: columns } }
	                  break
	               case 3:
	                  var responsive = { 0:{ items: 1 }, 767:{ items: 2 }, 992:{ items: columns }, 1200:{ items: columns }, 1600:{ items: columns } }
	                  break
	               default:
	                  var responsive = { 0:{ items: 1 }, 767:{ items: 3 }, 992:{ items: columns }, 1200:{ items: columns }, 1600:{ items: columns } }
	                  break
	            }

	            if( !autoplay ) {
	            	autoplay = true;
	            }

				// Recent Blog Posts Carousel
				$(".recent-blog-posts").owlCarousel({
					margin: 20,
					loop: true,
					dots: false,
					nav: true,
					navText: ['<i class="fa fa-arrow-left fa-2x"></i>','<i class="fa fa-arrow-right fa-2x"></i>'],
					autoPlay: autoplay,
					responsive: responsive
				});

			} );

			// Logo Carousel

	        $(".logo-carousel").each(function(){

				var columns  = parseInt( $(this).attr('data-columns') );
				var autoplay = parseInt( $(this).attr('data-autoplay') );

	            if( !autoplay ) {
	            	autoplay = true;
	            }
	            
	            switch ( columns ) {
	               case 1:
	                  var responsive = { 0:{ items: 1 }, 767:{ items: 1 }, 992:{ items: columns }, 1200:{ items: columns }, 1600:{ items: columns } }
	                  break
	               case 2:
	                  var responsive = { 0:{ items: 2 }, 767:{ items: 2 }, 992:{ items: columns }, 1200:{ items: columns }, 1600:{ items: columns } }
	                  break
	               case 3:
	                  var responsive = { 0:{ items: 2 }, 767:{ items: 2 }, 992:{ items: columns }, 1200:{ items: columns }, 1600:{ items: columns } }
	                  break
	               case 4:
	                  var responsive = { 0:{ items: 2 }, 767:{ items: 3 }, 992:{ items: columns }, 1200:{ items: columns }, 1600:{ items: columns } }
	                  break
	               case 5:
	                  var responsive = { 0:{ items: 2 }, 767:{ items: 3 }, 992:{ items: columns }, 1200:{ items: columns }, 1600:{ items: columns } }
	                  break
	               default:
	                  var responsive = { 0:{ items: 2 }, 767:{ items: 3 }, 992:{ items: columns }, 1200:{ items: columns }, 1600:{ items: columns } }
	                  break
	            }

	            $(this).owlCarousel({
	                margin: 50,
					loop: true,
					dots: false,
					nav: true,
					navText: ['<i class="fa fa-arrow-left fa-2x"></i>','<i class="fa fa-arrow-right fa-2x"></i>'],
	                autoplay: autoplay,
	                responsive: responsive
	            });

	        });

		}

		// Testimonials Carousel

		$(".testimonials-carousel").each( function(){


			$(this).owlCarousel({
				items: 1,
				margin: 50,
				loop: true,
				dots: false,
				nav: false,
				autoPlay:true,
				autoplaySpeed: 2500,
				autoplayHoverPause:true,
			});

		} );

		// ====================================================================
		// Add Job/Resume login link

		if( $("#header .cjfm-show-login-form").size() ) {
			$(".field.account-sign-in .button").click(function(event){
				event.preventDefault();
				$("#header .cjfm-show-login-form").click();
			});
		}

		// ====================================================================
		// CSS classes fixing with JS

		$(".paging a").addClass("btn btn-primary");

		// Widget titles icons
		$(".widget_recent_entries > h5, .widget_recent_comments > h5").prepend('<span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-flag fa-stack-1x fa-inverse"></i></span>');
		$(".widget_archive > h5").prepend('<span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-archive fa-stack-1x fa-inverse"></i></span>');
		$(".widget_categories > h5").prepend('<span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-folder fa-stack-1x fa-inverse"></i></span>');
		$(".widget_meta > h5").prepend('<span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-coffee fa-stack-1x fa-inverse"></i></span>');
		$(".widget_search h5").prepend('<span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-search fa-stack-1x fa-inverse"></i></span>');
		$(".widget_nav_menu h5").prepend('<span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-navicon fa-stack-1x fa-inverse"></i></span>');
		$(".widget_calendar h5").prepend('<span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-calendar fa-stack-1x fa-inverse"></i></span>');
		$(".widget_pages h5").prepend('<span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-file-text-o fa-stack-1x fa-inverse"></i></span>');
		$(".widget_text h5").prepend('<span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-info fa-stack-1x fa-inverse"></i></span>');

		$("#wp-calendar").addClass("table table-bordered");

		// ====================================================================
		// Applying Form Popup

		$(".application_details .close").click(function() {
			$(".application_details").fadeOut();
			$("body").removeClass("no-scroll");
		});
		
		$(".application_details .apply_ok").click(function() {
			$(".application_details").fadeOut();
			$("body").removeClass("no-scroll");
		});		

		$(".application_button").click(function() {
										
			var user_id		=	$("#user_id").val();
			var job_id		=	$("#job_id").val();
			
					$.ajax({
						type		:	"POST",
						url			:	"//sezplus.com/jobs/wp-content/themes/jobseek/add_applied_job_details.php",						
						data		:	$("#job_apply_details").serialize(),
						success		: 	function(res){
										if(jQuery.trim(res) == 1)
										{
											$("body").addClass("no-scroll");
											$(".application_button").remove();
											location.reload();
											
										}else {
											//alert('error');
										}
						}
						});
												
			
		});

		// ====================================================================
		// Job & Resume Dashboards

		$(".job-manager-jobs, .resume-manager-resumes").addClass("table table-striped");

		$("#job-manager-job-dashboard table").wrap("<div class='table-responsive'></div>");

		$("input[type=submit], input[type=button], .bookmark-notice").not(".apply-with-facebook, .apply-with-linkedin, .apply-with-xing").addClass("btn btn-primary");

	})

// Adding Check for Phone numbers in Resgitration process -- RB
$('#phone_no').attr('maxlength','10');
$("#phone_no, #phone-no").keypress(function (e) {
          if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                                         return false;
          }
});

})(jQuery);
