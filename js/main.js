;(function($) {

	window.main = {
		vars: {},
		init: function(){

			var header = main.vars.header = $('#header'),
				footer = main.vars.footer = $('#footer'),
				sidebar = main.vars.sidebar = $('#sidebar'),
				templates = main.vars.templates = {},
				sidebarTemplate = main.vars.templates.sidebar = $('#template-sidebar'),
				headerNavigation = main.vars.header.navigation = $('.main-navigation', header),
				footerNavigation = main.vars.footer.navigation = $('.main-navigation', footer);


			$('.share-popup-btn').on('click', function(){
				var url = $(this).attr('href'),
					width = 640,
					height = 305,
					left = ($(window).width() - width) / 2,
					top = ($(window).height() - height) / 2;
				window.open(url, 'sharer', 'toolbar=0,status=0,width='+width+',height='+height+',left='+left+', top='+top);
				return false;
			});

			$('.print-btn').on('click', function(e){
				e.preventDefault();
				window.print();
			});

			$('.mobile-navigation-btn').on('click', function(){
				$(this).parent().find('.main-navigation').slideToggle();
			});

			if(sidebar.length) {
				$('.mobile-sidebar-btn', sidebar).on('click', function(){
					if(sidebarTemplate.hasClass('open')){
						sidebarTemplate.removeClass('open-complete');

						setTimeout(function(){
							sidebarTemplate.removeClass('open');
						}, 500)
					} else {
						sidebarTemplate.addClass('open');
						setTimeout(function(){
							sidebarTemplate.addClass('open-complete');
						}, 500);	
					}
					
				});
			}

			if($.fn.datepicker) {
				$('.datepicker').each(function(){
					var datepicker = $(this),
						altField = datepicker.find('.datepicker-input').attr('id');
					datepicker.datepicker({
						altField: '#'+altField,
						altFormat: 'd-mm-yy'
					});	
				});
			}
			
			if($.fn.slider){
				$('.slider').each(function(){
					var slider = $(this);
					console.log(slider);
					slider.slider({
						steps: 5,
						min: 0,
						range: 'min',
						value: 60,
						max: 100,
						animate: false,
						slide: function(e, ui){
							console.log(ui);
						}
					});
				});
			}
			this.lightbox.init();
			this.ajaxPage.init();
			this.scroller.init();
			this.testimonials.init();
			this.product.init();
			this.checkout.init();
			this.accordion.init();
			
			

			$(window).on('resize', this.resize).trigger('resize');

		},

		loaded: function(){
			$('body').addClass('loaded');
			this.equalHeight();
		},

		lightbox: {
			init: function(){
				var container = main.lightbox.container = $('#lightbox'),
					overlay = main.lightbox.overlay = $('.overlay', container),
					content = main.lightbox.content = $('.content', container),
					loader = main.lightbox.loader = $('.loader', container);

				$('.lightbox-btn').on('click', main.lightbox.open);
				overlay.on('click', main.lightbox.close);
				$(document).on('click', '#lightbox .close-btn', main.lightbox.close);
			},
			open: function(e){
				e.preventDefault();
				main.lightbox.load($(this).attr('href'));
			},
			load: function(url){
				var container = main.lightbox.container,
					overlay = main.lightbox.overlay,
					content = main.lightbox.content,
					loader = main.lightbox.loader,
					documentHeight = $(document).height(),
					windowHeight = $(window).height(),
					scrollTop = $(window).scrollTop(),
					ajaxUrl = main.addToUrl(url, 'ajax'),
					ajaxUrl = main.addToUrl(ajaxUrl, 'lightbox');

				container.height(documentHeight);
				container.show();
				loader.fadeIn();
				content.hide();
				overlay.fadeIn('slow', function(){
					
					$.get(ajaxUrl, function(data) {
						content.html(data)
						loader.fadeOut(function(){
							
							if($.fn.imagesLoaded){
								content.imagesLoaded(function(){
									var top = scrollTop + (windowHeight - content.height()) / 2;
									if(top + content.height() > documentHeight - 60){
										top = documentHeight - content.height() - 60;
									}
									content.animate({top: top}, function(){
										content.fadeIn();
									});
								});
							} else {
								var top = scrollTop + (windowHeight - content.height()) / 2;
								if(top + content.height() > documentHeight - 60){
									top = documentHeight - content.height() - 60;
								}
								container.animate({top: top}, function(){
									content.fadeIn();
								});
							}	
						});	
						
					});
				});	

			},
			close: function(){
				var container = main.lightbox.container,
					overlay = main.lightbox.overlay,
					content = main.lightbox.content;

				content.fadeOut(function(){
					overlay.fadeOut(function(){
						container.hide();
					});
					content.html();
				});
			}
		},

		scroller: {
			init: function(){

				if($.fn.scroller){
					$('.scroller').each(function(){
						var scroller = $(this);
						scroller.scroller(scroller.data('scroller-options'));
					});
				}
			}
		},

		ajaxPage: {
			init: function(){
				var container = main.ajaxPage.container = $('#ajax-page'),
					//currUrl = main.ajaxPage.currUrl = window.location.href;
					pageUrl = main.ajaxPage.pageUrl = window.location.href;
				
				$('.ajax-btn').on('click', function(e){
					main.ajaxPage.load($(this).attr('href'));
					return false;
				});

				$(document).on('click', '#ajax-page .close-btn', function(){
					main.ajaxPage.close();
				});

			},
			load: function(url){

				var container = main.ajaxPage.container,
					ajaxUrl = main.addToUrl(url, 'ajax');

				
				//container.slideDown(2000);
			    if($('.content', container).length == 0){
			    	container.show();
			    	loader = $('<div class="loader"></div>');
					loader.hide();
					container.html(loader);

					container.animate({height: loader.actual('outerHeight')}, function(){
						loader.fadeIn();

						$.get(ajaxUrl, function(data) {
							var content = $('<div class="content"></div>');
							content.hide();
							container.append(content);
							content.html(data);
							loader.fadeOut(function(){
								if($.fn.imagesLoaded){
									content.imagesLoaded(function(){
										container.animate({'height': content.height()}, function(){
											container.css({'height': 'auto'});
											content.fadeIn();
											container.slideDown('slow');
											//main.facebook.setCanvasHeight();
										});
									});
								} else {
									container.animate({'height': content.actual('height')}, function(){
										container.css({'height': 'auto'});
										content.fadeIn();
										// main.facebook.setCanvasHeight();
									});
								}	
							});

						});
					});
				} else {
					var content = $('.content', container),
						loader = $('<div class="loader"></div>').hide();
					container.prepend(loader);
					content.fadeTo(300, 0, function(){
						loader.fadeIn();
						$.get(ajaxUrl, function(data) {
							content.html(data);
							loader.fadeOut(function(){
								container.animate({'height': content.actual('height')}, function(){
									content.fadeTo(300, 1);
									container.css({'height': 'auto'});
									// main.facebook.setCanvasHeight();
								});
							});
						});
					});
				}

				//main.ajaxPage.currUrl = url;
			}, 
			close: function(){
				var container = main.ajaxPage.container;

				container.slideUp(function(){
					container.html('');
				});

				//if(Modernizr.history) history.pushState(null, null, main.ajaxPage.pageUrl);
			}
		},

		addToUrl: function(url, query){
			var regex = new RegExp('(\\?|\\&)'+query+'=.*?(?=(&|$))'),
		        qstring = /\?.+$/;

			if (regex.test(url)){
		        url = url.replace(regex, '$1'+query+'=true');
		    } else if (qstring.test(url)) {
		        url = url + '&'+query+'=true';
		    } else {
		        url =  url + '?'+query+'=true';
		    }

		    return url;		
		},

		equalHeight: function(){
			if($('.equal-height').length !== 0){
		
				var currTallest = 0,
				currRowStart = 0,
				rowDivs = new Array(),
				topPos = 0;

				$('.equal-height').each(function() {

					var element = $(this);
					topPos = element.position().top;
					if (currRowStart != topPos) {

						for (i = 0 ; i < rowDivs.length ; i++) {
							rowDivs[i].height(currTallest);
						}

						rowDivs.length = 0;
						currRowStart = topPos;
						currTallest = element.height();
						rowDivs.push(element);

					} else {
						rowDivs.push(element);
						currTallest = (currTallest < element.height()) ? (element.height()) : (currTallest);
					}

					for (i = 0 ; i < rowDivs.length ; i++) {
						rowDivs[i].height(currTallest);
					}

				});
			}
		},

		resize: function(){
			var windowWidth = $(window).width(),
				headerNavigation = main.vars.header.navigation,
				footerNavigation = main.vars.footer.navigation,
				sidebarTemplate = main.vars.templates.sidebar;

			
			if(windowWidth <= 1200 && headerNavigation.is(':visible')){
				headerNavigation.hide();
			} else if(windowWidth > 1200 && !headerNavigation.is(':visible')) {
				headerNavigation.show();
			}

			if(windowWidth <= 800 && footerNavigation.is(':visible')){
				footerNavigation.hide();
			} else if(windowWidth > 800 && !footerNavigation.is(':visible')) {
				footerNavigation.show();
			}
			if(sidebarTemplate.length){
				if(windowWidth > 1100 && sidebarTemplate.hasClass('open')){
					sidebarTemplate.removeClass('open open-complete')
				}
			}
		},

		scrollTo: function(target){
			if(target.length){
				$('html, body').animate({scrollTop: target.offset().top});
			}
		},

		tabs: {
			init: function() {
				var container = main.tabs.container = $('.tabs'),
					content = main.tabs.content = $('.tab-content', container),
					navigationItems = main.tabs.navigationItems = $('.tab-navigation li', container);

				$('a', navigationItems).on('click', function(){
					main.tabs.goto($(this).data('id'));
				});
			},
			goto: function(id){
				var navigationItems = main.tabs.navigationItems,
					content = main.tabs.content;
				navigationItems.removeClass('current');
				$('a[data-id='+id+']').parent().addClass('current');

				$('.tab', content).hide();
				$('.tab[data-id='+id+']', content).fadeIn();


			}
		},

		testimonials: {
			init: function() {
				var container = main.testimonials.container = $('.testimonials');

				if(container.length){
					var openBtn = $('.open-testimonials-btn', container),
						more = $('.more-testimonials', container),
						testimonials = $('.testimonial', container),
						isOpen = false;
						
					openBtn.on('click', function(){
						var btn = $(this),
							text = btn.text();
							replaceText = btn.data('replace-text');
						if(isOpen){
							main.scrollTo(container);
							setTimeout(function(){
								container.toggleClass('open');
							}, 200)
						} else {
							container.toggleClass('open');
						}
						
						btn.text(replaceText);
						btn.data('replace-text', text);
						btn.toggleClass('is-open');
						
						isOpen = !isOpen;
					});
				}
			}
		},

		product: {
			init: function(){
				var container = main.product.container = $('.product');
				
				if($('body').hasClass('single-product')){
					$('.change-postcode-btn', container).on('click', function(){
						$('.change-postcode', container).slideToggle();
					});
				}	
			}
		},

		checkout: {
			init: function(){
				var container = main.checkout.container = $('form.checkout');
				
				if($('body').hasClass('woocommerce-checkout')){
					$('.accordion-btn', container).on('click', function(){
						var id = $(this).data('id');
						$('body').trigger('update_checkout');

						$('.checkout-progress li').removeClass('current').filter('[data-id='+id+']').addClass('current');
					});
				}	
			}
		},
		accordion: {
			init: function(){
				var container = main.accordion.container = $('.accordion');
				
				if(container.length){
					var items = $('li', container);
					$('.accordion-btn', container).on('click', function(){
						var id = $(this).data('id'),
							currItem = items.filter('[data-id='+id+']');


						$('.accordion-content', items).slideUp(function(){
							items.not(currItem).removeClass('current');
						});

						$('.accordion-content', currItem).slideDown(function(){
							currItem.addClass('current');
						});

					});
				}	
			}
		}
	}

	$(function(){
		main.init();
	});

	$(window).load(function(){
		main.loaded();
	});
})(jQuery);