<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    TWT_Htaccess_Routing
 * @subpackage TWT_Htaccess_Routing/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    TWT_Htaccess_Routing
 * @subpackage TWT_Htaccess_Routing/public
 * @author     Alexander Dormann, TWT Interactive GmbH <alexander.dormann@twt.de>
 */
class TWT_Htaccess_Routing_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $twt_htaccess_routing    The ID of this plugin.
	 */
	private $twt_htaccess_routing;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $twt_htaccess_routing       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $twt_htaccess_routing, $version ) {

		$this->twt_htaccess_routing = $twt_htaccess_routing;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in TWT_Htaccess_Routing_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The TWT_Htaccess_Routing_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->twt_htaccess_routing, plugin_dir_url( __FILE__ ) . 'css/twt-htaccess-routing-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in TWT_Htaccess_Routing_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The TWT_Htaccess_Routing_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->twt_htaccess_routing, plugin_dir_url( __FILE__ ) . 'js/twt-htaccess-routing-public.js', array( 'jquery' ), $this->version, false );

	}

}
