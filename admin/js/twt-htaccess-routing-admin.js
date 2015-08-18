(function( $ ) {
	'use strict';

	$(document).ready(function() {
		var $tabs = $('.twt-htaccess-routing .nav-tab');
		var $tab_container = $('.twt-htaccess-routing [rel="tab-content"]');
		var initial_open_tab_selector = $tabs.filter('.nav-tab-active').attr('href');

		$tab_container.hide();
		$(initial_open_tab_selector).show();

		$tabs.on('click', function(e) {
			e.preventDefault();

			var $target_tab = $(this);
			var target_container_selector = $target_tab.attr('href');
			var $target_container = $(target_container_selector);

			$tab_container.hide();
			$target_container.show();

			$tabs.removeClass('nav-tab-active');
			$target_tab.addClass('nav-tab-active');
		});
	});
})( jQuery );
