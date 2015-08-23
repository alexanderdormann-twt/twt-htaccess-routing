<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://example.com
 * @since             1.0.0
 * @package           TWT_Htaccess_Routing
 *
 * @wordpress-plugin
 * Plugin Name:       TWT .htaccess Routing
 * Plugin URI:        http://twt.de
 * Description:       Dump all your rewrite rules to htaccess
 * Version:           1.0.1
 * Author:            Alexander Dormann, TWT Interactive GmbH
 * Author URI:        http://twt.de
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       twt-htaccess-routing
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-twt-htaccess-routing-activator.php
 */
function activate_twt_htaccess_routing() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-twt-htaccess-routing-activator.php';
	TWT_Htaccess_Routing_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-twt-htaccess-routing-deactivator.php
 */
function deactivate_twt_htaccess_routing() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-twt-htaccess-routing-deactivator.php';
	TWT_Htaccess_Routing_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_twt_htaccess_routing' );
register_deactivation_hook( __FILE__, 'deactivate_twt_htaccess_routing' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-twt-htaccess-routing.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_twt_htaccess_routing() {

	$plugin = TWT_Htaccess_Routing::get_instance();
	$plugin->run();

}
run_twt_htaccess_routing();
