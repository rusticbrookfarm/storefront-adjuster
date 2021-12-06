<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://rusticbrookfarm.com/
 * @since      1.0.0
 *
 * @package    Storefront_Adjuster
 * @subpackage Storefront_Adjuster/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Storefront_Adjuster
 * @subpackage Storefront_Adjuster/includes
 * @author     Rustic Brook Farm <ryan@rusticbrookfarm.com>
 */
class Storefront_Adjuster_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'storefront-adjuster',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
