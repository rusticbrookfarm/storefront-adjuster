<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://rusticbrookfarm.com/
 * @since      1.0.0
 *
 * @package    Storefront_Adjuster
 * @subpackage Storefront_Adjuster/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Storefront_Adjuster
 * @subpackage Storefront_Adjuster/admin
 * @author     Rustic Brook Farm <ryan@rusticbrookfarm.com>
 */
class Storefront_Adjuster_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The options name to be used in this plugin
	 *
	 * @since  	1.0.0
	 * @access 	private
	 * @var  	string 		$option_name 	Option name of this plugin
	 */
	private $option_name = 'storefront_adjuster';

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
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
		 * defined in Storefront_Adjuster_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Storefront_Adjuster_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/storefront-adjuster-admin.css', array(), $this->version, 'all' );

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
		 * defined in Storefront_Adjuster_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Storefront_Adjuster_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/storefront-adjuster-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Add an options page under the Settings submenu
	 *
	 * @since  1.0.0
	 */
	public function add_options_page() {
	
		$this->plugin_screen_hook_suffix = add_options_page(
			__( 'Storefront Adjuster Settings', 'storefront-adjuster' ),
			__( 'Storefront Adjuster', 'storefront-adjuster' ),
			'manage_options',
			$this->plugin_name,
			array( $this, 'display_options_page' )
		);
	
	}

	/**
	 * Render the options page for plugin
	 *
	 * @since  1.0.0
	 */
	public function display_options_page() {
		include_once 'partials/storefront-adjuster-admin-display.php';
	}

	/**
	 * Register all related settings of this plugin
	 *
	 * @since  1.0.0
	 */
	public function register_setting() {

		add_settings_section(
			$this->option_name . '_general',
			__( 'General', 'storefront-adjuster' ),
			array( $this, $this->option_name . '_general_cb' ),
			$this->plugin_name
		);

		add_settings_field(
			$this->option_name . '_display_footer_privacy_policy_link',
			__( 'Display privacy policy link in footer', 'storefront-adjuster' ),
			array( $this, $this->option_name . '_display_footer_privacy_policy_link_cb' ),
			$this->plugin_name,
			$this->option_name . '_general',
			array( 'label_for' => $this->option_name . '_display_footer_privacy_policy_link' )
		);

		add_settings_field(
			$this->option_name . '_display_footer_credits',
			__( 'Display WooCommerce/Storefront credits in footer', 'storefront-adjuster' ),
			array( $this, $this->option_name . '_display_footer_credits_cb' ),
			$this->plugin_name,
			$this->option_name . '_general',
			array( 'label_for' => $this->option_name . '_display_footer_credits' )
		);

		register_setting( $this->plugin_name, $this->option_name . '_display_footer_privacy_policy_link', 'boolean' );
		register_setting( $this->plugin_name, $this->option_name . '_display_footer_credits', 'boolean' );
	}

	/**
	 * Render the text for the general section
	 *
	 * @since  1.0.0
	 */
	public function storefront_adjuster_general_cb() {
		echo '<p>' . __( 'Advanced settings for the WooCommerce Storefront theme. <br/><b>Note: Clear cache after making changes.</b>', 'storefront-adjuster' ) . '</p>';
	}

	/**
	 * Render the setting input
	 *
	 * @since  1.0.0
	 */
	public function storefront_adjuster_display_footer_privacy_policy_link_cb() {
		$day = get_option( $this->option_name . '_display_footer_privacy_policy_link' );
		echo '<input type="checkbox" name="' . $this->option_name . 
			'_display_footer_privacy_policy_link' . '" id="' . $this->option_name . 
			'_display_footer_privacy_policy_link' . '" ' . checked( 'on', $day, false ) . '> ';
	}

	/**
	 * Render the setting input
	 *
	 * @since  1.0.0
	 */
	public function storefront_adjuster_display_footer_credits_cb() {
		$day = get_option( $this->option_name . '_display_footer_credits' );
		echo '<input type="checkbox" name="' . $this->option_name . '_display_footer_credits' . 
			'" id="' . $this->option_name . '_display_footer_credits' . '" ' . 
			checked( 'on', $day, false ) . '> ';
	}
}
