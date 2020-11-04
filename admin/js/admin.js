/**
 * Admin-side JS
 *
 * @package Septera
 */

jQuery(document).ready(function() {

	/* Latest News Content */
    var data = {
        action: 'cryout_feed_action',
    };
	jQuery.post(ajaxurl, data, function(response) {
		jQuery("#cryout-news .inside").html(response);
    });

	/* Confirm modal window on reset to defaults */
	jQuery('#cryout_reset_defaults').click(function() {
		if (!confirm(cryout_admin_settings.reset_confirmation)) { return false;}
	});

});/* document.ready */

/* FIN */
