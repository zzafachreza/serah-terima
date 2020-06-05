/*
	Hyperspace by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
*/




(function($) {


    	document.onkeydown = function(e) {
	  if(event.keyCode == 123) {
	     return false;
	  }
	  if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
	     return false;
	  }
	  if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
	     return false;
	  }
	  if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
	     return false;
	  }
	  if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
	     return false;
	  }
	}
// setInterval(function(){
// $("#intro").css('background-image','url("admin/assets/media/bg/bg-1.jpg")').fadeIn()
// },3000)
// setInterval(function(){
// $("#intro").css('background-image','url("admin/assets/media/bg/bg-7.jpg")').fadeIn()
// },6000)


$("#sidebar").css('background-image','url("admin/assets/media/bg/bg-2.jpg")')



$("#footer").css({'background-image':'url("admin/assets/media/bg/bg-7.jpg")','color':'red'})



$("body").on("contextmenu",function(){

       return false;
    }); 

$('body').on("cut copy",function(e) {
      e.preventDefault();
       return false;
   });




	var	$window = $(window),
		$body = $('body'),
		$sidebar = $('#sidebar');

	// Breakpoints.
		breakpoints({
			xlarge:   [ '1281px',  '1680px' ],
			large:    [ '981px',   '1280px' ],
			medium:   [ '737px',   '980px'  ],
			small:    [ '481px',   '736px'  ],
			xsmall:   [ null,      '480px'  ]
		});

	// Hack: Enable IE flexbox workarounds.
		if (browser.name == 'ie')
			$body.addClass('is-ie');

	// Play initial animations on page load.
		$window.on('load', function() {
			window.setTimeout(function() {
				$body.removeClass('is-preload');
			}, 100);
		});

	// Forms.

		// Hack: Activate non-input submits.
			$('form').on('click', '.submit', function(event) {

				// Stop propagation, default.
					event.stopPropagation();
					event.preventDefault();

				// Submit form.
					$(this).parents('form').submit();

			});

	// Sidebar.
		if ($sidebar.length > 0) {

			var $sidebar_a = $sidebar.find('a');

			$sidebar_a
				.addClass('scrolly')
				.on('click', function() {

					var $this = $(this);

					// External link? Bail.
						if ($this.attr('href').charAt(0) != '#')
							return;

					// Deactivate all links.
						$sidebar_a.removeClass('active');

					// Activate link *and* lock it (so Scrollex doesn't try to activate other links as we're scrolling to this one's section).
						$this
							.addClass('active')
							.addClass('active-locked');

				})
				.each(function() {

					var	$this = $(this),
						id = $this.attr('href'),
						$section = $(id);

					// No section for this link? Bail.
						if ($section.length < 1)
							return;

					// Scrollex.
						$section.scrollex({
							mode: 'middle',
							top: '-20vh',
							bottom: '-20vh',
							initialize: function() {

								// Deactivate section.
									$section.addClass('inactive');

							},
							enter: function() {

								// Activate section.
									$section.removeClass('inactive');

								// No locked links? Deactivate all links and activate this section's one.
									if ($sidebar_a.filter('.active-locked').length == 0) {

										$sidebar_a.removeClass('active');
										$this.addClass('active');

									}

								// Otherwise, if this section's link is the one that's locked, unlock it.
									else if ($this.hasClass('active-locked'))
										$this.removeClass('active-locked');

							}
						});

				});

		}

	// Scrolly.
		$('.scrolly').scrolly({
			speed: 1000,
			offset: function() {

				// If <=large, >small, and sidebar is present, use its height as the offset.
					if (breakpoints.active('<=large')
					&&	!breakpoints.active('<=small')
					&&	$sidebar.length > 0)
						return $sidebar.height();

				return 0;

			}
		});

	// Spotlights.
		$('.spotlights > section')
			.scrollex({
				mode: 'middle',
				top: '-10vh',
				bottom: '-10vh',
				initialize: function() {

					// Deactivate section.
						$(this).addClass('inactive');

				},
				enter: function() {

					// Activate section.
						$(this).removeClass('inactive');

				}
			})
			.each(function() {

				var	$this = $(this),
					$image = $this.find('.image'),
					$img = $image.find('img'),
					x;

				// Assign image.
					$image.css('background-image', 'url(' + $img.attr('src') + ')');

				// Set background position.
					if (x = $img.data('position'))
						$image.css('background-position', x);

				// Hide <img>.
					$img.hide();

			});

	// Features.
		$('.features')
			.scrollex({
				mode: 'middle',
				top: '-20vh',
				bottom: '-20vh',
				initialize: function() {

					// Deactivate section.
						$(this).addClass('inactive');

				},
				enter: function() {

					// Activate section.
						$(this).removeClass('inactive');

				}
			});



			 $(document).pagePreloaders({
			
				//Main Options
				preloaderStyle: 'animation',	// Preloader style: animation, logo
				backgroundColor: '', // Preloader background color
				backgroundOpacity: 0.1, // Preloader background opacity: 0.1 to 1
				animationTime: 1.5, // Minimum preloader display time in seconds (prevents the preloader from disappearing too fast)

				//Animation Preloader Options
				animationPreloader: '11', // Choose from 11 preload animations. Enter any value from 1 to 11
				animationPreloaderColor: '#f5f0fd', // Animation color
				animationPreloaderOpacity: '1', // Animation opacity: 0.1 to 1

				//Logo Preloader Options
				imageURL: 'https://fachreza-maulana.com/img/ava.png', // Path to your logo image
				logoSize: '150px', // Size of the displayed logo (image proportions will be constrained to retain the quality)
				logoBackgroundColor: 'transparent', // Logo background color
				logoOpacity: '1', // Logo opacity: 0.1 to 1
				logoBorderWidth: '5px', // Logo stroke color width
				logoBorderColor: '#3cf', // Logo stroke color
				logoBorderRadius: '50%', // Logo corner radius
			});

			 $("#formSaran").submit(function(e){
			 	e.preventDefault();
				var dataForm =	$(this).serialize();
			

							$.ajax({
							    	url:'admin/api/saran_add.php',
							    	type:'POST',
							    	data:dataForm,
							    	success:function(data){
							    		
							    		if (data=200) {
							    			alert('Terima kasih, Saran Anda telah terkirim..');
							    			$("input[name='nama']").val("");
							    			$("input[name='email']").val("");
							    			$("input[name='subjek']").val("");
							    			$("textarea[name='pesan']").val("");
							    		}
							    	}
							    })


			 })


})(jQuery);

