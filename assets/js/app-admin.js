(function ($) {

	/*
	Baseline font-size doesn't exits by default in Gutenberg html tag. We need to add the baseline manually here,
	because we can't do it in the admin.scss file(since it extends every class with .editor-wrapper-styles).
	Without this the font-sizes(with rems) don't look the same in the backend, so this is a workaround for the issue.
	FYI https://github.com/WordPress/gutenberg/issues/11043
	*/

	if ($('body').hasClass('block-editor-page')) {
		$('html').css('font-size', '16px');
	}

	if ($('#acf-field_625fe01ea30ab').next().hasClass('-on')) {
		$('body').addClass('clustercontrol');
	} else {
		$('body').addClass('ccx');
	}

	$('#acf-field_625fe01ea30ab').change(function () {
		if ($(this).next().hasClass('-on')) {
			$('body').addClass('ccx');
			$('body').removeClass('clustercontrol');
		} else {
			$('body').addClass('clustercontrol');
			$('body').removeClass('ccx');
		}

	});

}(jQuery));
