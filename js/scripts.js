$(document).ready(function() {
	/*.campaigns-area,*/
	$('.home-banner .image-bg,  .project-box .img-box .bg-image, .project-visual, .gallery-image, .info-section .img .image-block, .campaigns-slideshow .slide').each(function(e) {
		var bg = 'url(' + $(this).find('> img').attr('src') + ')';
		var bg_ie = $(this).find('> img').attr('src');
		$(this).find('> img').hide();
		$(this).css('background-image', bg);
	});
	appear({
		elements: function elements() {
			return document.getElementsByClassName('appear');
		},
		appear: function appear(el) {
			var item = $(el);
			item.addClass('visible-element');
		},
		bounds: 0,
		reappear: true
	});

	$('.campaigns-slideshow').slick({
		dots: true,
		arrows: true,
		infinite: true,
		fade: false,
		slidesToShow: 1,
		slidesToScroll: 1,
		autoplaySpeed: 8000,
		autoplay: true,
		useCSS: true
	});
	$('.news-carousel').slick({
		dots: false,
		arrows: false,
		infinite: false,
		speed: 500,
		fade: false,
		slidesToShow: 3,
		slidesToScroll: 1,
		autoplay: true,
		useCSS: false,
		cssEase: 'linear',
		responsive: [{
			breakpoint: 768,
			settings: {
				dots: true,
				slidesToShow: 1,
				infinite: true
			}
		}]
	});
	$('#footer .txt-block').clone().removeClass('hidden-xs').addClass('visible-xs-block').prependTo('#footer .bottom');
	var TIMEOUT = 300;
	$('<span class="fader"/>').appendTo('.page-area').css('opacity', 0);
	$('.btn-menu').click(function() {
		if (!$('body').hasClass('open-menu')) {
			$('body').addClass('open-menu');
		} else {
			$('body').removeClass('open-menu');
		};
		return false;
	});
	$('#header .close-menu').on('click', function(e) {
		e.preventDefault();
		$('body').removeClass('open-menu');
	});
	$('.fader').click(function() {
		$('.fader').animate({
			opacity: 0,
			right: 0
		}, TIMEOUT, function() {
			$(this).css('display', 'none');
			$('body').removeClass('open-menu');
		});
		$('#wrapper').animate({
			right: 0
		}, TIMEOUT);
		$('#header').animate({
			left: '0',
			right: '0'
		}, TIMEOUT);
		$('.main-menu').animate({
			'margin-right': '-80%'
		}, TIMEOUT);
	});

	$('.how-carousel').slick({
		dots: false,
		arrows: false,
		infinite: false,
		speed: 500,
		fade: false,
		slidesToShow: 3,
		slidesToScroll: 1,
		autoplay: false,
		useCSS: false,
		cssEase: 'linear',
		responsive: [{
			breakpoint: 768,
			settings: {
				dots: true,
				slidesToShow: 1,
				infinite: true
			}
		}]
	});
	$('.consortium-logos').slick({
		dots: false,
		arrows: false,
		infinite: false,
		speed: 500,
		fade: false,
		slidesToShow: 6,
		slidesToScroll: 1,
		autoplay: false,
		useCSS: false,
		cssEase: 'linear'
	});
	$('.consortium-content').on('init', function(event, slick) {
			$('.consortium-logos .logo-item').eq(0).addClass('active');
		}).slick({
			dots: false,
			arrows: false,
			infinite: false,
			speed: 500,
			fade: true,
			slidesToShow: 1,
			slidesToScroll: 1,
			autoplay: false,
			useCSS: false,
			cssEase: 'linear'
		}).on('beforeChange', function(event, slick, currentSlide, nextSlide) {
			$('.consortium-logos .logo-item').eq(nextSlide).addClass('active').siblings('.logo-item').removeClass('active');
		})
		/*.on('afterChange', function(event, slick, currentSlide) {
				$('.consortium-logos .logo-item').eq(currentSlide).addClass('active').siblings('.logo-item').removeClass('active');
			})*/
	;
	$('.consortium-logos a').on('click', function() {
		var ix = $(this).closest('.logo-item').index();
		$('.consortium-content').slick('slickGoTo', ix);
		return false;
	});
	$('.twitter-slideshow').slick({
		dots: true,
		arrows: true,
		infinite: true,
		speed: 500,
		fade: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		autoplay: true,
		useCSS: false,
		cssEase: 'linear'
	});
	$('.contacts-logos').slick({
		dots: false,
		arrows: false,
		infinite: false,
		draggable: false,
		speed: 500,
		fade: false,
		slidesToShow: 6,
		slidesToScroll: 1,
		autoplay: false,
		useCSS: false,
		cssEase: 'linear',
		responsive: [{
			breakpoint: 768,
			settings: {
				slidesToShow: 3
			}
		}]
	});
	$('.contacts-slideshow').on('init', function(event, slick) {
		$('.contacts-logos .logo-item').eq(0).addClass('active');
	}).slick({
		dots: false,
		arrows: false,
		infinite: false,
		speed: 200,
		fade: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		autoplay: false,
		useCSS: false,
		cssEase: 'linear'
	}).on('afterChange', function(event, slick, currentSlide) {
		$('.contacts-logos .logo-item').eq(currentSlide).addClass('active').siblings('.logo-item').removeClass('active');
	});
	$('.contacts-logos a').on('click', function() {
		var ix = $(this).closest('.logo-item').index();
		$('.contacts-slideshow').slick('slickGoTo', ix);
		return false;
	});

	function mapLocationInitialize(map_) {
		var coords_ = $('#' + map_).data('coords');
		if (coords_) {
			var latitude = coords_.split(',')[0];
			var longtitude = coords_.split(',')[1];
		}


		var latlng = new google.maps.LatLng(latitude, longtitude);
		var style =
			[{
				"featureType": "administrative",
				"elementType": "labels.text.fill",
				"stylers": [{
					"color": "#444444"
				}]
			}, {
				"featureType": "landscape",
				"elementType": "all",
				"stylers": [{
					"color": "#f2f2f2"
				}]
			}, {
				"featureType": "poi",
				"elementType": "all",
				"stylers": [{
					"visibility": "off"
				}]
			}, {
				"featureType": "road",
				"elementType": "all",
				"stylers": [{
					"saturation": -100
				}, {
					"lightness": 45
				}]
			}, {
				"featureType": "road.highway",
				"elementType": "all",
				"stylers": [{
					"visibility": "simplified"
				}]
			}, {
				"featureType": "road.arterial",
				"elementType": "labels.icon",
				"stylers": [{
					"visibility": "off"
				}]
			}, {
				"featureType": "transit",
				"elementType": "all",
				"stylers": [{
					"visibility": "off"
				}]
			}, {
				"featureType": "water",
				"elementType": "all",
				"stylers": [{
					"color": "#46bcec"
				}, {
					"visibility": "on"
				}]
			}, {
				"featureType": "water",
				"elementType": "geometry.fill",
				"stylers": [{
					"gamma": "3.47"
				}, {
					"weight": "0.01"
				}, {
					"saturation": "-28"
				}]
			}, {
				"featureType": "water",
				"elementType": "labels.text.fill",
				"stylers": [{
					"saturation": "-100"
				}, {
					"lightness": "-100"
				}, {
					"gamma": "0.00"
				}, {
					"weight": "0.01"
				}, {
					"visibility": "off"
				}]
			}];
		var myOptions = {
			zoom: 15,
			center: latlng,
			scrollwheel: false,
			zoomControl: true,
			disableDefaultUI: true,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		};

		var map = new google.maps.Map(document.getElementById(map_), myOptions);

		var mapType = new google.maps.StyledMapType(style, {
			name: "Grayscale"
		});
		map.mapTypes.set('grey', mapType);
		map.setMapTypeId('grey');

		var marker = new google.maps.Marker({
			position: latlng,
			icon: script_object.home_path + '/images/ico-marker-gray-01.png',
			map: map
		});
	}
	$('.contacts-slideshow .map').each(function() {
		var map_ = $(this).attr('id');
		mapLocationInitialize(map_);
	});
	setOffsetOfContactsMap();
	if (!isTouchDevice()) {
		if ($(window).width() > 1024) {
			parallaxInit();
		}
	};
	$('.project-gallery').slick({
		dots: false,
		arrows: false,
		infinite: true,
		speed: 500,
		fade: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		autoplay: true,
		useCSS: false,
		cssEase: 'linear'
	});

	var p_;

	if ($('#particles-01').length) {
		window.particlesJS.load('particles-01', script_object.home_path + '/js/particlesjs-config-1.json', function() {});
	}
	if ($('#particles-02').length) {
		window.particlesJS.load('particles-02', script_object.home_path + '/js/particlesjs-config-2.json', function() {

		});
	}
	if ($('#particles-03').length) {
		window.particlesJS.load('particles-03', script_object.home_path + '/js/particlesjs-config-3.json', function() {

		});
	}
	if ($('#particles-04').length) {
		window.particlesJS.load('particles-04', script_object.home_path + '/js/particlesjs-config-4.json', function() {

		});
	}
	if ($('#particles-05').length) {
		window.particlesJS.load('particles-05', script_object.home_path + '/js/particlesjs-config-5.json', function() {

		});
	}
	if ($('#particles-06').length) {
		window.particlesJS.load('particles-06', script_object.home_path + '/js/particlesjs-config-6.json', function() {
			p_ = pJSDom;
		});
	}

	if ($('#particles-20').length) {
		window.particlesJS.load('particles-20', script_object.home_path + '/js/particlesjs-config-20.json', function() {

		});
	}
	if ($('#particles-21').length) {
		window.particlesJS.load('particles-21', script_object.home_path + '/js/particlesjs-config-21.json', function() {

		});
	}
	if ($('#particles-22').length) {
		window.particlesJS.load('particles-22', script_object.home_path + '/js/particlesjs-config-22.json', function() {

		});
	}
	if ($('#particles-23').length) {
		window.particlesJS.load('particles-23', script_object.home_path + '/js/particlesjs-config-23.json', function() {

		});
	}
	if ($('#particles-24').length) {
		window.particlesJS.load('particles-24', script_object.home_path + '/js/particlesjs-config-24.json', function() {

		});
	}
	if ($('#particles-25').length) {
		window.particlesJS.load('particles-25', script_object.home_path + '/js/particlesjs-config-25.json', function() {
			p_ = pJSDom;
		});
	}

	if ($('#particles-01').length || $('#particles-20').length) {
		setTimeout(function() {
			var ix = p_.length;
			for (var i = 0; i < ix; i++) {
				p_[i].pJS.fn.particlesRefresh();
			}
		}, 2000);
	}
	$('.fancybox').fancybox({
		padding: 0,
		maxWidth: 1000,
		nextEffect: 'fade',
		prevEffect: 'fade',
		helpers: {
			title: {
				type: 'inside'
			},
			thumbs: {
				width: 8,
				height: 8
			}
		},
		beforeLoad: function() {
			this.title = $(this.element).attr('title');
		}
	});
	if ($('span.twit-clear-hash').length) {
		$('span.twit-clear-hash').each(function() {
			var postText = $(this).text();
			var regexp = new RegExp('#([^\\s]*)', 'g');
			postText = postText.replace(regexp, '');
			$(this).text(postText);
		});
	};

	if ($('#menu-toolkit-nav li').hasClass('active')) {
		$('#menu-main-nav .publication-resources').addClass('active');
	};

	if ($('.consortium-content .slide').length) {
		$('.consortium-content .slide').each(function() {
			var $container = $(this).find('.mobile-logo');
			var $index = $(this).index();
			var $logoImage = $(this).parents('.consortium-area').find('.consortium-logos .logo-item').eq($index).find('img').clone();
			$logoImage.appendTo($container)
		});
	}

	window.stop_load = true;
	window.flag_first = true;
	$('#menu-toolkit-nav li').each(function() {
		if ($(this).find('a').text() == 'All') {
			$(this).addClass('active');
		} else {
			$(this).removeClass('active');
		}
	});
	var cat_init = '-1';
	window.offset_flag = true;
	load_publication_post(cat_init);

	

	$('#menu-toolkit-nav li a').each(function() {
		$(this).on('click', function() {
			$(this).closest('ul').find('li.active').removeClass('active');
			$(this).closest('li').addClass('active');
			
			window.offset_flag = true;
			$('#container_publications').html('');
			$('.prelouder-load-more').css('display', 'block');
			var cat_name = $(this).text();
			if (cat_name == 'All') {
				cat_name = -1;
			};
			window.stop_load = true;
			$('#container_publications').attr('data-offset', parseInt($('#container_publications').attr('data-ppp')));
			CountCategory(cat_name);
			setTimeout(function() {
				load_publication_post(cat_name);
			}, 1000);
			
			return false;
		});
	});

	function CountCategory(cat_name) {
		var $elm = $('#container_publications');
		$elm.attr('data-cat', cat_name);
		$.ajax({
			type: "POST",
			url: script_object.ajax_url,
			dataType: 'text',
			data: ({
				action: script_object.action_count_category_post,
				cat_name: cat_name
			}),
			success: function(data) {
				$elm.attr('data-count', data);
				var offset = parseInt($elm.attr('data-offset'));
				if (offset >= parseInt(data)) {
					window.stop_load = false;
				}
			}
		});


	};

	function load_publication_post(cat_name) {

		var $elm = $('#container_publications'),
			offset = $elm.attr('data-offset'),
			ppp = $elm.attr('data-ppp'),
			count = $elm.attr('data-count');


		if (window.offset_flag) {
			offset = parseInt(offset) - parseInt(ppp);
			window.offset_flag = false;
		};
		$.ajax({
			type: "POST",
			url: script_object.ajax_url,
			dataType: 'html',
			data: ({
				action: script_object.action_load_post,
				cat_name: cat_name,
				offset: offset
			}),
			success: function(data) {
				$('.prelouder-load-more').hide();
				if (parseInt(offset) >= parseInt(count)) {
					window.stop_load = false;					
				}
				$('#container_publications').append(data);
				window.flag_first = true;
				$elm.attr('data-offset', parseInt(offset) + parseInt(ppp));
				appear({
					elements: function elements() {
						return document.getElementsByClassName('appear');
					},
					appear: function appear(el) {
						var item = $(el);
						item.addClass('visible-element');
					},
					bounds: 0,
					reappear: true
				});

			}
		});

	}

	function isScrolledIntoView(elem) {
		var $elem = $(elem);
		var $window = $(window);

		var docViewTop = $window.scrollTop();
		var docViewBottom = docViewTop + $window.height();

		var elemTop = $elem.offset().top;
		var elemBottom = elemTop + $elem.height();

		return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
	}


	if ($('#container_publications').length) {

		if (isScrolledIntoView($('#lbl-01')) && window.stop_load) {
			var cat = $('#container_publications').attr('data-cat');
			load_publication_post(cat);
			window.flag_first = false;
		}
		$(window).scroll(function() {
			if (isScrolledIntoView($('#lbl-01')) && window.stop_load && window.flag_first) {
				var cat = $('#container_publications').attr('data-cat');
				load_publication_post(cat);
				window.flag_first = false;
			}
		});
	}



	$.urlParam = function(name) {
		var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
		if (results == null) {
			return null;
		} else {
			return results[1] || 0;
		}
	}

	$('#inactive .wp-pagenavi a').each(function() {
		$(this).on('click', function() {
			var href = script_object.home_url + '/project?paged_inactive=' + $(this).text();
			if ($.urlParam('paged_active')) {
				href = href + '&paged_active=' + $.urlParam('paged_active')
			};
			window.location.href = href;
			return false;
		});
	});

	$('#active .wp-pagenavi a').each(function() {
		$(this).on('click', function() {
			var href = script_object.home_url + '/project?paged_active=' + $(this).text();
			if ($.urlParam('paged_inactive')) {
				href = href + '&paged_inactive=' + $.urlParam('paged_inactive')
			};
			window.location.href = href;
			return false;
		});
	});

	$('figure.news-widget .img').each(function() {
		var $this = $(this),
			$el = $this.find('img');
		if ($el.length) {
			$this.css('background-image', 'url(' + $el.attr('src') + ')');
		}
	});
	if ($('body').hasClass('page-template-default') && !$('body').hasClass('home')) {
		$('#header').addClass('type3');
	};
	if ($('body').hasClass('single-post')) {
		$('#menu-main-nav li').each(function() {
			if ($(this).find('a').text().toLowerCase() == 'blog') {
				$(this).addClass('active');
			};
		});
	};
	if ($('#active-helper').length) {
		if ($('#active-helper').attr('data-tag')) {
			$('ul.tags-list li').each(function() {
				if ($(this).find('a').text() == $('#active-helper').attr('data-tag')) {
					$(this).addClass('active');
				};
			});
		};
		if ($('#active-helper').attr('data-cat')) {
			$('ul.posts-categories li').each(function() {
				if ($(this).find('a').text() == $('#active-helper').attr('data-cat')) {
					$(this).addClass('active');
				};
			});
		};
		if ($('#active-helper').attr('data-month')) {
			var year = $('#active-helper').attr('data-year'),
				month = $('#active-helper').attr('data-month');
			$('h4.data-year').each(function() {
				if ($(this).text() == year) {
					$ul = $(this).next();
					$ul.find('li').each(function() {
						if ($(this).find('.archive-month').text() == month) {
							$(this).addClass('active');
						};
					});
				};
			});
		};
	};



	var didScroll_,
		lastScrollTop_ = 0,
		delta_ = 5,
		navbarHeight_ = $('#header').outerHeight();

	$(window).scroll(function(event) {
		didScroll_ = true;
	});

	$(window).on('resize', function() {
		navbarHeight_ = $('#header').outerHeight();
	});

	setInterval(function() {
		if (didScroll_) {
			hasScrolled();
			didScroll_ = false;
		}
	}, 250);

	function hasScrolled() {
		var st = $(window).scrollTop();

		// Make sure they scroll more than delta
		if (Math.abs(lastScrollTop_ - st) <= delta_)
			return;

		// If they scrolled down and are past the navbar, add class .nav-up.
		// This is necessary so you never see what is "behind" the navbar.
		if (st > lastScrollTop_ && st > navbarHeight_) {
			// Scroll Down
			$('#header').removeClass('nav-down').addClass('nav-up');
		} else {
			// Scroll Up
			if (st + $(window).height() < $(document).height()) {
				$('#header').removeClass('nav-up').addClass('nav-down');
			} else {
				$('#header').removeClass('nav-down');
			}
		}
		if (st < navbarHeight_) {
			$('#header').removeClass('nav-up nav-down');
		}
		lastScrollTop_ = st;
	}

	$('.go-to-next').on('click', function(e) {
		var $href = $(this).closest('.home-banner').next(),
			offsetTop = ($href.length) ? $href.offset().top : 0;
		$('html, body').stop().animate({
			scrollTop: offsetTop
		}, 500);
		e.preventDefault();
	});

	jQuery.validator.addMethod("validEmail", function(value, element) {
		if (value == '')
			return true;
		var temp1;
		temp1 = true;
		var ind = value.indexOf('@');
		var str2 = value.substr(ind + 1);
		var str3 = str2.substr(0, str2.indexOf('.'));
		if (str3.lastIndexOf('-') == (str3.length - 1) || (str3.indexOf('-') != str3.lastIndexOf('-')))
			return false;
		var str1 = value.substr(0, ind);
		if ((str1.lastIndexOf('_') == (str1.length - 1)) || (str1.lastIndexOf('.') == (str1.length - 1)) || (str1.lastIndexOf('-') == (str1.length - 1)))
			return false;
		str = /(^[a-zA-Z0-9]+[\._-]{0,1})+([a-zA-Z0-9]+[_]{0,1})*@([a-zA-Z0-9]+[-]{0,1})+(\.[a-zA-Z0-9]+)*(\.[a-zA-Z]{2,3})$/;
		temp1 = str.test(value);
		return temp1;
	}, "Please enter valid email.");

	$('.subscribe-section form').each(function() {
		var $form = $(this);

		$form.validate({
			errorPlacement: function(error, element) {
				error.insertAfter(element.closest('.subscribe-form'));
			},
			rules: {
				email: {
					required: true,
					validEmail: true
				}
			}
		});
	});
	if ($('.particles-area').length) {
		$('.particles-area').css('opacity', 0);
	}
});
$(window).load(function() {
	setEqHeight();
	//if (!script_object.data_session) {
		
	if($('.loading-area').length){
		setTimeout(function() {
			$('.loading-area').fadeOut(500);
			$.ajax({
				type: "POST",
				url: script_object.ajax_url,
				dataType: 'text',
				data: ({
					action: script_object.action_close_prelouder
				}),
				success: function(data) {
					//console.log(data);
				}
			});
		}, 2000);
	}
	//};
	$('#header').addClass('show-header');
	setOffsetOfInfoSectionImage();
	equalheight('.how-carousel .block');
	equalheight('.news-widget figcaption .block');
	if ($('.particles-area').length) {
		setTimeout(function(){
			$('.particles-area').animate({'opacity': 1}, 300);
		}, 1800);
	}
});
$(window).resize(function() {
	setEqHeight();
	setOffsetOfContactsMap();
	setOffsetOfInfoSectionImage();
	setTimeout(function() {
		equalheight('.how-carousel .block');
		equalheight('.news-widget figcaption .block');
	}, 1000);
});
$(window).scroll(function() {
	$(window).scrollTop() > $('#header').outerHeight() ? $('body').addClass('scrolled') : $('body').removeClass('scrolled');
});

function setEqHeight() {
	equalheight('.projects-list .project-box .description');
	equalheight('.campaigns-slideshow .slide');
}

function setOffsetOfContactsMap() {
	$('.contacts-slideshow .map-block .offset-block').each(function() {
		var $this = $(this);
		var $screenWidth = $(window).width();
		var $wrappPadding = 15;
		var $containerWidth = $('.container').outerWidth();
		var $sideSpace = (($screenWidth - $containerWidth) / 2) + $wrappPadding;
		$this.css('margin-right', '-' + $sideSpace + 'px');
	});
}

function parallaxInit() {
	$('.parallax').each(function() {
		$(this).parallax("50%", 0.2, false);
	});

	$('.subscribe-section, .join-section').each(function() {
		$(this).parallax("50%", 0.9, true);
	});
}

function isTouchDevice() {
	var el = document.createElement('div');
	el.setAttribute('ongesturestart', 'return;');
	if (typeof el.ongesturestart == "function") {
		return true;
	} else {
		return false
	}
}

function setOffsetOfInfoSectionImage() {
	$('.info-section').each(function() {
		var $this = $(this);
		var $screenWidth = $(window).width();
		var $wrappPadding = 15;
		var $containerWidth = $('.container').outerWidth();
		var $sideSpace = (($screenWidth - $containerWidth) / 2) + $wrappPadding;
		$this.find('.img .offset-block').css('right', '-' + $sideSpace + 'px');
		$this.find('.img .offset-block').css('left', '-' + $sideSpace + 'px');
	});
}
