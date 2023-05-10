import { resize } from './resize.js';
import { tabs } from './tabs.js';
import { archive_filters } from './archive-filters.js';

(function ($) {

	$(".site-header").on(
		"click",
		"[data-toggle-nav]",
		function (event) {
			event.preventDefault();
			$(".site-header").toggleClass("nav-is-visible");
		}
	)

	function setMenuOpen(e) {
		let setNavHeight = e.css("height", "auto").height();
		e.css("height", "0"),
			setTimeout(
				function () {
					e.css("height", setNavHeight)
				},
				10
			)
		setTimeout(
			function () {
				e.css("height", "auto")
			},
			300
		)
	}
	function setMenuClose(e) {
		let setNavCloseHeight = e.height();
		e.css("height", setNavCloseHeight),
			setTimeout(
				function () {
					e.css("height", "0")
				},
				10
			)
		setTimeout(
			function () {
				! function (e, n) { e.css(n, "") }(e, "height")
			},
			300
		)
	}

	$(".menu .menu-item-has-children").click(
		function (e) {
			let menuItem, subMenu;
			"A" !== e.target.tagName && (menuItem = $(this),
				subMenu = $(this).find(".sub-menu"),
				subMenu.hasClass("open") ? setMenuClose(subMenu) : setMenuOpen(subMenu),
				menuItem.toggleClass("open"),
				subMenu.toggleClass("open"))
		}
	);

	var header = $(".site-header");
	$(window).scroll(function () {
		let scroll = $(window).scrollTop();

		if ( scroll > 0 ) {
			header.addClass("sticky");
		} else {
			header.removeClass("sticky");
		}

	});

	$('.menu-item-description').closest("li").addClass("has-description");
	$('.menu-item-description').closest("ul").addClass("has-description");

	$('.toggle-accordion').click(function (e) {
		e.preventDefault();

		var $this = $(this);

		if ($this.hasClass('toggle')) {
			$this.removeClass('toggle');
		} else {
			$this.toggleClass('toggle');
		}

		if ($this.next().hasClass('show')) {
			$this.attr('aria-expanded', 'false')
			$this.next().removeClass('show');
			$this.next().slideUp(350);
		} else {
			$this.attr('aria-expanded', 'true')
			$this.parent().parent().find('li .inner').removeClass('show');
			$this.parent().parent().find('li .inner').slideUp(350);
			$this.next().toggleClass('show');
			$this.next().slideToggle(350);
		}
	});

	if ($(window).width() < 993) {
		$('.block-features ul.row-container li.no-link').click(function (e) {
			$(this).toggleClass('open-acc');
		});
	}


	$('.grid-of-text-items-block .wp-block-column .wp-block-image, .our-products-block .wp-block-column .wp-block-image').each(function() {
		$(this).nextAll().wrapAll('<div class="texts">');
	});

	$('.single .content br').remove();

	$('.single .content p, .single .content p span').each(function () {
		var set_case = $.trim($(this).html());
		if (set_case === '&nbsp;' || set_case === '' || set_case === '&nbsp; &nbsp;' ) {
			$(this).remove();
		}
	});


	$('.product-button.clustercontrol').click(function() {
		if ($('body').hasClass('ccx')) {
			$('body').removeClass('ccx');
		}
		if ($('body').hasClass('clustercontrol')) {
			$('body').removeClass('clustercontrol');
		}
		$('body').removeClass("docker-image script-installation");
		$('body').addClass("clustercontrol");
	})

	$('.product-button.ccx').click(function () {
		if ($('body').hasClass('clustercontrol')) {
			$('body').removeClass('clustercontrol');
		}
		if ($('body').hasClass('ccx')) {
			$('body').removeClass('ccx');
		}
		$('body').removeClass("docker-image script-installation");
		$('body').addClass("ccx");
	})

	if (location.href.indexOf("#") != -1) {
		if ($('body').hasClass('clustercontrol')) {
			$('body').removeClass('clustercontrol');
		}
		$('body').addClass(location.hash.slice(1));
	}

	$('#service-select').change(function () {
		var selected = $(this).val();
		$('.ccx-prices-block .wp-block-group').fadeOut();
		$('.ccx-prices-block .wp-block-group' + '.' + selected).fadeIn();
	});

	$('select option').each(function () {
		if ($(this).is(':selected') && ($(this).data('type') != 'all')) {
			$(this).closest('.select-wrapper').addClass('selected');
		}
	});
		
	$('#s9s_modal').hide();
	$(document).on('click', '.block.tabs .tabs-wrapper img', function(e){
		$('#s9s_modal-content').attr('src', $(this).attr('src'));
		$('#s9s_modal').show();
	});
	$(document).on('click', '#s9s_modal-close', function(){
		$('#s9s_modal').hide();
	});
	$(document).on('click', '.show_button_popup', function(e){
		e.preventDefault();
		var id = $(this).attr('data-button-id');
		$("#"+id).show();
	});
	$(document).on('click', '.show_footer_popup', function(e){
		e.preventDefault();
		$("#footer_form").show();
	});
	$(document).on('click', '.modal-close', function(){
		$(this).parent().hide();
	});
	/* if( $('.cst_gravity_desc').length > 0 ){
	    let target = $('.cst_gravity_desc').parents('.gform_wrapper').parent();
	    $('.cst_gravity_desc').detach().prependTo($(target));
	} */
}(jQuery));