<?php
/**
 * Plugin Name:  CMB2
 * Plugin URI:   https://github.com/WebDevStudios/CMB2
 * Description:  CMB2 will create metaboxes and forms with custom fields that will blow your mind.
 * Author:       WebDevStudios
 * Author URI:   http://webdevstudios.com
 * Contributors: WebDevStudios (@webdevstudios / webdevstudios.com)
 *               Justin Sternberg (@jtsternberg / dsgnwrks.pro)
 *               Jared Atchison (@jaredatch / jaredatchison.com)
 *               Bill Erickson (@billerickson / billerickson.net)
 *               Andrew Norcross (@norcross / andrewnorcross.com)
 *
 * Version:      2.0.5
 *
 * Text Domain:  cmb2
 * Domain Path:  languages
 *
 *
 * Released under the GPL license
 * http://www.opensource.org/licenses/gpl-license.php
 *
 * This is an add-on for WordPress
 * http://wordpress.org/
 *
 * **********************************************************************
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * **********************************************************************
 */

/************************************************************************
                  You should not edit the code below
                  (or any code in the included files)
                  or things might explode!
*************************************************************************/

if ( ! class_exists( 'cmb2_bootstrap_205', false ) ) {

	/**
	 * Check for newest version of CMB
	 */
	class cmb2_bootstrap_205 {

		/**
		 * Current version number
		 * @var   string
		 * @since 1.0.0
		 */
		const VERSION = '2.0.4';

		/**
		 * Current version hook priority
		 * Will decrement with each release
		 *
		 * @var   int
		 * @since 2.0.0
		 */
		const PRIORITY = 9994;

		public static $single = null;

		public static function go() {
			if ( null === self::$single ) {
				self::$single = new self();
			}
			return self::$single;
		}

		private function __construct() {
			/**
			 * A constant you can use to check if CMB2 is loaded
			 * for your plugins/themes with CMB2 dependency
			 */
			if ( ! defined( 'CMB2_LOADED' ) ) {
				define( 'CMB2_LOADED', true );
			}
			add_action( 'init', array( $this, 'include_cmb' ), self::PRIORITY );
		}

		public function include_cmb() {
			if ( ! class_exists( 'CMB2', false ) ) {

				if ( ! defined( 'CMB2_VERSION' ) ) {
					define( 'CMB2_VERSION', self::VERSION );
				}

				if ( ! defined( 'CMB2_DIR' ) ) {
					define( 'CMB2_DIR', trailingslashit( get_template_directory_uri() .'/inc/meta/' ) );
				}

				$this->l10ni18n();

				// Include helper functions
				get_template_part( '/inc/meta/includes/helper-functions' );
				// Now kick off the class autoloader
				spl_autoload_register( 'cmb2_autoload_classes' );
				// Kick the whole thing off
				get_template_part( '/inc/meta/bootstrap' );
			}
		}

		/**
		 * Load CMB text domain
		 * @since  2.0.0
		 */
		public function l10ni18n() {
			$loaded = load_plugin_textdomain( 'accountant-wp', false, '/languages/' );
			if ( ! $loaded ) {
				$loaded = load_muplugin_textdomain( 'accountant-wp', '/languages/' );
			}
			if ( ! $loaded ) {
				$loaded = load_theme_textdomain( 'accountant-wp', '/languages/' );
			}

			if ( ! $loaded ) {
				$locale = apply_filters( 'plugin_locale', get_locale(), 'accountant-wp' );
				$mofile = '';
				load_textdomain( 'accountant-wp', $mofile );
			}
		}

	}
	cmb2_bootstrap_205::go();

} // class exists check
