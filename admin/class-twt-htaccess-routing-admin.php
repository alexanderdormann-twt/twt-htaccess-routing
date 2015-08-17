<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    TWT_Htaccess_Routing
 * @subpackage TWT_Htaccess_Routing/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    TWT_Htaccess_Routing
 * @subpackage TWT_Htaccess_Routing/admin
 * @author     Alexander Dormann, TWT Interactive GmbH <alexander.dormann@twt.de>
 */
class TWT_Htaccess_Routing_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

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
	 *
	 * @param      string    $plugin_name  The name of this plugin.
	 * @param      string    $version      The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/twt-htaccess-routing-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/twt-htaccess-routing-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Register the administration pages
	 *
	 * @since 1.0.0
	 */
	public function admin_menu() {
		add_options_page(
			__( 'Routing', $this->plugin_name ),
			__( 'Routing', $this->plugin_name ),
			'manage_options',
			$this->plugin_name,
			[ $this, 'option_page' ]
		);
	}

	/**
	 * admin_init hook. Checks for form submission.
	 *
	 * @since 1.0.0
	 */
	public function admin_init() {
		if ( isset( $_GET['flush'] ) && isset( $_GET['page'] ) && $_GET['page'] == $this->plugin_name && intval( $_GET['flush'] ) === 1 ) {
			$this->handle_submission();
		}
	}

	/**
	 * Render our option page
	 *
	 * @since 1.0.0
	 */
	public function option_page() {
		include plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/twt-htaccess-routing-admin-display.php';
	}

	/**
	 * Returns the WP_Rewrite API from global namespace, configured by the
	 * user via Settings -> Permalinks and WordPress' own auto detection.
	 *
	 * This object may or may not have verbose_rules enabled. WP_Rewrite::$use_verbose_rules
	 * controls whether all WP Rewrites are persisted into our htaccess file. Normally,
	 * this is done based on the permastruct specified by the WordPress administrator.
	 *
	 * As a rule of thumb, Permastructs beginning with or only consisting of %postname%
	 * will result in WP_Rewrite::$use_verbose_rules = true.
	 *
	 * @since  1.0.0
	 * @return WP_Rewrite  An unmodified instance of the global WP_Rewrite object
	 */
	public function get_wp_rewrite() {
		global $wp_rewrite;
		return $wp_rewrite;
	}

	/**
	 * WP_Rewrite may or may not have verbose_rules enabled. WP_Rewrite::$use_verbose_rules
	 * controls whether all WP Rewrites are persisted into our htaccess file. Normally,
	 * this is done based on the permastruct specified by the WordPress administrator.
	 *
	 * However, in order to let WordPress generate all Apache Rewrite rules, we need to ensure
	 * WP_Rewrite::$use_verbose_rules and WP_Rewrite::$use_verbose_page_rules are set to
	 * true.
	 *
	 * As a result, this method clones the global WP_Rewrite object and modified those two
	 * properties.
	 *
	 * @since  1.0.0
	 * @return WP_Rewrite  A potentially modified instance of WP_Rewrites with verbose_rules enabled
	 */
	public function get_verbose_wp_rewrite() {
		global $wp_rewrite;

		$rewrites = clone $wp_rewrite;
		$rewrites->use_verbose_rules = true;
		$rewrites->use_verbose_page_rules = true;

		return $rewrites;
	}

	/**
	 * @since  1.0.0
	 * @return string Returns the text domain used in localization methods
	 */
	public function get_text_domain() {
		return TWT_Htaccess_Routing::get_instance()->get_plugin_name();
	}

	/**
	 * Fetch the complete .htaccess content
	 *
	 * @since  1.0.0
	 * @return string  .htaccess content
	 */
	public function get_htaccess() {
		return file_get_contents( $this->get_htaccess_path() );
	}

	/**
	 * Returns the path to WordPress' main .htaccess file
	 *
	 * @since  1.0.0
	 * @return string   The path to WordPress' main .htaccess file
	 */
	public function get_htaccess_path() {
		return trailingslashit( ABSPATH ) . '.htaccess';
	}

	/**
	 * Construct an URL to flush rules into our htaccess
	 *
	 * @return string
	 */
	public function get_flush_action_url() {
		return '?page=' . $this->plugin_name . '&' . 'flush=1';
	}

	protected function handle_submission() {
		global $wp_rewrite;

		$original_wp_rewrite = $this->get_wp_rewrite();
		$verbose_wp_rewrite = $this->get_verbose_wp_rewrite();

		$wp_rewrite = $verbose_wp_rewrite;
		$wp_rewrite->flush_rules(true);

		$wp_rewrite = $original_wp_rewrite;
		echo "success!!!";

		//die('lol');
	}
}
