<?php
/*
Plugin Name: Make-Sense Accessibility
Plugin URI: https://mk-sense.com/a-web/
Description: Enables automatic fixes for digital accessibility issues across your site with a user-friendly dashboard and installs an accessibility menu for site visitors.
Author: danrub
Author URI: https://mk-sense.com
Text Domain: make-sense
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Version: 1.0
*/

require_once plugin_dir_path(__FILE__) . 'includes/admin.php';

class mksense_admin_app {
	function register_admin_menu() {
        $menu = new mksense_admin_app_page();
		$menu->register_mksense_menu();
	}

	/**
	 * Load plugin textdomain.
	 */
	function mksense_load_textdomain() {
		load_plugin_textdomain( 'make-sense', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' ); 
	}

	function mksense_Add_Aweb_Link() {
		$user_data_stg = mksense_api::get_mksense_user_data();
		if (!$user_data_stg) {
			return;
		}
		$user_data = json_decode($user_data_stg);

		if (get_option(mksense_options::$mkSenseEnableScriptOpt)) {
			$postStatus = get_post_status();
			if ($postStatus == 'publish')  {
				print($user_data->embedScript);
			}
		}
	}

	function mksense_deactivate() {
		mksense_api::clear_all_mksense_options();
	}
}

/*
 * ADMIN PAGE: Register and Create the Admin Page
 */
$mksense_admin_app = new mksense_admin_app();
$mksense_admin_app->register_admin_menu();

/*
 * Inject a-web script
 */
add_action( 'wp_head', array( $mksense_admin_app, 'mksense_Add_Aweb_Link' ));

add_action( 'init', array( $mksense_admin_app, 'mksense_load_textdomain' ) );

/*
 * Register deactivation hook
 */
register_deactivation_hook( __FILE__, array( $mksense_admin_app, 'mksense_deactivate' ) );