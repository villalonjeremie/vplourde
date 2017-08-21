<?php
/**
 * Extension-Boilerplate
 * @link https://github.com/ReduxFramework/extension-boilerplate
 *
 * Radium Importer - Modified For ReduxFramework
 * @link https://github.com/FrankM1/radium-one-click-demo-install
 *
 * @package     WBC_Importer - Extension for Importing demo content
 * @author      Webcreations907
 * @version     1.0.1
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// Don't duplicate me!
if ( !class_exists( 'Radium_Theme_Demo_Data_Importer' ) ) {

	require_once dirname( __FILE__ ) . '/importer/radium-importer.php'; //load admin theme data importer

	class Radium_Theme_Demo_Data_Importer extends Radium_Theme_Importer {

		protected $ReduxParent;

		// Protected vars
		protected $parent;


		/**
		 * Holds a copy of the object for easy reference.
		 *
		 * @since 0.0.1
		 *
		 * @var object
		 */
		private static $instance;

		/**
		 * Theme Option name from ReduxFramework
		 *
		 * @var string
		 */
		public $theme_option_name       = '';


		/**
		 * themeoptions file name for ReduxFramework import
		 *
		 * @var string
		 */
		public $theme_options_file_name = '';

		/**
		 * Widgets.json file name
		 *
		 * @var string
		 */
		public $widgets_file_name   =  '';

		/**
		 * Content.xml file for importing sample content
		 *
		 * @var string
		 */
		public $content_demo_file_name  =  '';


		/**
		 * Holds a copy of the widget settings
		 *
		 * @since 0.0.2
		 *
		 * @var object
		 */
		public $widget_import_results;

		/**
		 * Constructor. Hooks all interactions to initialize the class.
		 *
		 * @since 0.0.1
		 */
		public function __construct( $parent, $redux_instance ) {
			$this->parent      = $parent;
			$this->ReduxParent = $redux_instance;

			$this->active_import = $this->parent->active_import;

			$this->active_import_id = $this->parent->active_import_id;

			$this->initSettings();

			self::$instance = $this;


			parent::__construct();

		}

		public function initSettings() {

			if ( is_dir( $this->parent->demo_data_dir ) ) {
				$this->demo_files_path = $this->parent->demo_data_dir;
			}

			if ( isset( $this->active_import_id ) && !empty( $this->active_import_id ) ) {

				$demo_import_array             = $this->parent->wbc_import_files[$this->active_import_id];

				$this->content_demo_file_name  = ( isset( $demo_import_array['content_file'] ) ) ? $demo_import_array['content_file'] : '';

				$this->demo_files_path         = ( isset( $this->demo_files_path ) && !empty( $this->demo_files_path ) ) ? $this->demo_files_path.$demo_import_array['directory'].'/' : '';

				$this->theme_options_file_name = ( isset( $demo_import_array['theme_options'] ) ) ? $demo_import_array['theme_options'] : '';

				$this->widgets_file_name       = ( isset( $demo_import_array['widgets'] ) ) ? $demo_import_array['widgets'] : '';

				$this->theme_option_name       = $this->ReduxParent->args['opt_name'];
			}

		}

		public function set_demo_menus(){

			// Menus to Import and assign - you can remove or add as many as you want
			$header_menu = get_term_by('name', 'header-menu', 'nav_menu');
			$menu_onepage = get_term_by('name', 'header-menu-onepage', 'nav_menu');

			set_theme_mod( 'nav_menu_locations', array(
					'header-menu' => $header_menu->term_id,
					'header-menu-onepage' => $menu_onepage->term_id,
				)
			);

		}



		/**
		 * Update homepage & blog page
		 *
		 * @since 0.0.1
		 */
		public function set_home_and_blog(){
			$page = get_page_by_path( 'homepage' );
			update_option( 'show_on_front', 'page' );
			update_option( 'page_on_front', $page->ID );
			// update_option( 'page_for_posts', '17' );

		}

		/**
		 * Update mailchimp options
		 *
		 * @since 0.0.1
		 */
		public function update_mailchimp_options(){
			add_option( 'mc4wp_default_form_id', '39', '', 'yes' );
		}


		/**
		 * Clean all default widgets that come with WP fresh installation
		 *
		 * @since 0.0.1
		 */
		public function clean_default_widgets() {
			update_option( 'sidebars_widgets', $null );
		}


		/**
		 * Import revolution slider.
		 *
		 * @since 0.0.1
		 */

		public function import_rev_slider(){

			if ( class_exists( 'RevSlider' ) ) {
				$wpc_slider_array = array(
					get_template_directory()."/inc/plugins/revslider/header-slider.zip",
					get_template_directory()."/inc/plugins/revslider/Slider_home_1.zip",
					get_template_directory()."/inc/plugins/revslider/rotating-words13.zip");
				$slider = new RevSlider();
				foreach($wpc_slider_array as $wpc_slider){
					$slider->importSliderFromPost(true,true,$wpc_slider);
				}
			}

		}


	}//class
}//function_exists
?>
