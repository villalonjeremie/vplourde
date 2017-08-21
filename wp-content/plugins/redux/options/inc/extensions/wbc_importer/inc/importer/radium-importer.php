<?php

/**
 * Class Radium_Theme_Importer
 *
 * This class provides the capability to import demo content as well as import widgets and WordPress menus
 *
 * @since 2.2.0
 *
 * @category RadiumFramework
 * @package  NewsCore WP
 * @author   Franklin M Gitonga
 * @link     http://radiumthemes.com/
 *
 *
 * Modified to work with Reduxframework/Wbc_importer extension
 *
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// Don't duplicate me!
if ( !class_exists( 'Radium_Theme_Importer' ) ) {

  class Radium_Theme_Importer {

    /**
     * Holds a copy of the object for easy reference.
     *
     * @since 2.2.0
     *
     * @var object
     */
    public $theme_options_file;

    /**
     * Holds a copy of the object for easy reference.
     *
     * @since 2.2.0
     *
     * @var object
     */
    public $widgets;

    /**
     * Holds a copy of the object for easy reference.
     *
     * @since 2.2.0
     *
     * @var object
     */
    public $content_demo;

    /**
     * Flag imported to prevent duplicates
     *
     * @since 2.2.0
     *
     * @var object
     */
    public $flag_as_imported = array();

    /**
     * Holds a copy of the object for easy reference.
     *
     * @since 2.2.0
     *
     * @var object
     */
    private static $instance;

    /**
     * Constructor. Hooks all interactions to initialize the class.
     *
     * @since 2.2.0
     */
    public function __construct() {

      self::$instance = $this;

      $this->theme_options_file = $this->demo_files_path . $this->theme_options_file_name;
      $this->widgets            = $this->demo_files_path . $this->widgets_file_name;
      $this->content_demo       = $this->demo_files_path . $this->content_demo_file_name;

      add_filter( 'add_post_metadata', array( $this, 'check_previous_meta' ), 10, 5 );

      add_action( 'import_end', array( $this, 'after_wp_importer' ) );

      $this->process_imports();

    }

    /**
     * Avoids adding duplicate meta causing arrays in arrays from WP_importer
     *
     * @param null    $continue
     * @param unknown $post_id
     * @param unknown $meta_key
     * @param unknown $meta_value
     * @param unknown $unique
     * @return
     */
    public function check_previous_meta( $continue, $post_id, $meta_key, $meta_value, $unique ) {

      $old_value = get_metadata( 'post', $post_id, $meta_key );

      if ( count( $old_value ) == 1 ) {
        if ( $old_value[0] === $meta_value ) {
          return false;
        }elseif ( $old_value[0] !== $meta_value ) {
          update_post_meta( $post_id, $meta_key, $meta_value );
          return false;
        }
      }

      return null;
    }

    public function after_wp_importer() {

      $imported_demos = get_option( 'wbc_imported_demos' );

      $this->active_import[$this->active_import_id]['imported'] = 'imported';

      if ( empty( $imported_demos ) ) {
        $imported_demos = $this->active_import;
      }else {
        $imported_demos = array_merge( $imported_demos , $this->active_import );
      }

      do_action( 'wbc_importer_after_content_import', $this->active_import, $this->demo_files_path );

      update_option( 'wbc_imported_demos', $imported_demos );
    }


    public function process_imports() {

      if ( !empty( $this->content_demo ) && is_file( $this->content_demo ) ) {
        $this->set_demo_data( $this->content_demo );
      }

      if ( !empty( $this->theme_options_file ) && is_file( $this->theme_options_file ) ) {
        $this->set_demo_theme_options( $this->theme_options_file );
      }

      $this->set_demo_menus();
	  $this->clean_default_widgets();
	    $this->set_home_and_blog();
	    $this->update_mailchimp_options();
      $this->import_widgets($this->widgets);
      $this->import_rev_slider();
//      if ( !empty( $this->widgets ) && is_file( $this->widgets ) ) {
//        $this->process_widget_import_file( $this->widgets );
//      }

    }

    /**
     * add_widget_to_sidebar Import sidebars
     *
     * @param string  $sidebar_slug    Sidebar slug to add widget
     * @param string  $widget_slug     Widget slug
     * @param string  $count_mod       position in sidebar
     * @param array   $widget_settings widget settings
     *
     * @since 2.2.0
     *
     * @return null
     */
    public function add_widget_to_sidebar( $sidebar_slug, $widget_slug, $count_mod, $widget_settings = array() ) {

      $sidebars_widgets = get_option( 'sidebars_widgets' );

      if ( !isset( $sidebars_widgets[$sidebar_slug] ) )
        $sidebars_widgets[$sidebar_slug] = array( '_multiwidget' => 1 );

      $newWidget = get_option( 'widget_'.$widget_slug );

      if ( !is_array( $newWidget ) )
        $newWidget = array();

      $count = count( $newWidget )+1+$count_mod;
      $sidebars_widgets[$sidebar_slug][] = $widget_slug.'-'.$count;

      $newWidget[$count] = $widget_settings;

      update_option( 'sidebars_widgets', $sidebars_widgets );
      update_option( 'widget_'.$widget_slug, $newWidget );

    }

    public function set_demo_data( $file ) {

      if ( !defined( 'WP_LOAD_IMPORTERS' ) ) define( 'WP_LOAD_IMPORTERS', true );

      require_once ABSPATH . 'wp-admin/includes/import.php';

      $importer_error = false;

      if ( !class_exists( 'WP_Importer' ) ) {

        $class_wp_importer = ABSPATH . 'wp-admin/includes/class-wp-importer.php';

        if ( file_exists( $class_wp_importer ) ) {

          require_once $class_wp_importer;

        } else {

          $importer_error = true;

        }

      }

      if ( !class_exists( 'WP_Import' ) ) {

        $class_wp_import = dirname( __FILE__ ) .'/wordpress-importer.php';

        if ( file_exists( $class_wp_import ) )
          require_once $class_wp_import;
        else
          $importer_error = true;

      }

      if ( $importer_error ) {

        die( "Error on import" );

      } else {

        if ( !is_file( $file ) ) {

          echo "The XML file containing the dummy content is not available or could not be read .. You might want to try to set the file permission to chmod 755.<br/>If this doesn't work please use the Wordpress importer and import the XML file (should be located in your download .zip: Sample Content folder) manually ";

        } else {

          $wp_import = new WP_Import();
          $wp_import->fetch_attachments = true;
          $wp_import->import( $file );



        }

      }

    }

    public function set_demo_menus() {}
  public function set_home_and_blog() {}
  public function update_mailchimp_options() {}


    public function set_demo_theme_options( $file ) {

      // File exists?
      if ( ! file_exists( $file ) ) {
        wp_die(
          __( 'Theme options Import file could not be found. Please try again.', 'radium' ),
          '',
          array( 'back_link' => true )
        );
      }

      // Get file contents and decode
      $data = file_get_contents( $file );
      $data = json_decode( $data, true );
      $data = maybe_unserialize( $data );


      // Only if there is data
      if ( !empty( $data ) || is_array( $data ) ) {
         
          // Hook before import
          $data = apply_filters( 'radium_theme_import_theme_options', $data );


          update_option( $this->theme_option_name, $data );
      }

      do_action( 'wbc_importer_after_theme_options_import', $this->active_import, $this->demo_files_path );

    }


	  public function clean_default_widgets() {}

	  public function import_rev_slider() {}


    /**
     * Available widgets
     *
     * Gather site's widgets into array with ID base, name, etc.
     * Used by export and import functions.
     *
     * @since 2.2.0
     *
     * @global array $wp_registered_widget_updates
     * @return array Widget information
     */
	  /**
	   * Available widgets
	   *
	   * Gather site's widgets into array with ID base, name, etc.
	   * Used by export and import functions.
	   *
	   * @since 2.2.0
	   *
	   * @global array $wp_registered_widget_updates
	   * @return array Widget information
	   */
	  function available_widgets() {

		  global $wp_registered_widget_controls;

		  $widget_controls = $wp_registered_widget_controls;

		  $available_widgets = array();

		  foreach ( $widget_controls as $widget ) {

			  if ( ! empty( $widget['id_base'] ) && ! isset( $available_widgets[$widget['id_base']] ) ) { // no dupes

				  $available_widgets[$widget['id_base']]['id_base'] = $widget['id_base'];
				  $available_widgets[$widget['id_base']]['name'] = $widget['name'];

			  }

		  }

		  return apply_filters( 'radium_theme_import_widget_available_widgets', $available_widgets );

	  }
	  /**
	   * Import Widgets Data
	   *
	   * @param $zip_path
	   *
	   * @return bool|WP_Error
	   */
	  function import_widgets( $file ) {

		  //$this->clear_widgets(); // clear all current widgets , before import current widget data
		  $file_1 = explode('/', $file);
		  $file_1 = $file_1[count($file_1)-1];
		  $file_1 = get_site_url ().'/wp-content/plugins/redux/options/inc/extensions/wbc_importer/demo-data/demo/'.$file_1;

		  $widgets_data = json_decode( wp_remote_fopen( $file_1 ), true );

		  foreach ( $widgets_data as $k => $v ) {
			  foreach ( $v as $key => $val ) {
				  if ( is_array( $val ) ) {
					  foreach ( $val as $val_key => $val_value ) {
						  $arr[ $key ][ $val_key ] = 'on';
					  }
				  }
			  }
		  }

		  $widgets      = $arr;
		  $sidebar_data = $widgets_data[0];
		  $widget_data  = $widgets_data[1];

		  foreach ( $sidebar_data as $title => $sidebar ) {
			  $count = count( $sidebar );
			  for ( $i = 0; $i < $count; $i ++ ) {
				  $widget               = array();
				  $widget['type']       = trim( substr( $sidebar[ $i ], 0, strrpos( $sidebar[ $i ], '-' ) ) );
				  $widget['type-index'] = trim( substr( $sidebar[ $i ], strrpos( $sidebar[ $i ], '-' ) + 1 ) );

				  if ( ! isset( $widgets[ $widget['type'] ][ $widget['type-index'] ] ) ) {
					  unset( $sidebar_data[ $title ][ $i ] );
				  }
			  }
			  $sidebar_data[ $title ] = array_values( $sidebar_data[ $title ] );
		  }
		  foreach ( $widgets as $widget_title => $widget_value ) {
			  foreach ( $widget_value as $widget_key => $widget_value ) {
				  if( isset( $widget_data[ $widget_title ][ $widget_key ] ) ) {
					  $widgets[ $widget_title ][ $widget_key ] = $widget_data[ $widget_title ][ $widget_key ];
				  }
			  }
		  }
		  $sidebar_data = array( array_filter( $sidebar_data ), $widgets );

		  return ( $this->import_widget_data( $sidebar_data ) ) ? true : new WP_Error( 'widget_import_submit', 'Unknown Error' );
	  }

	  /**
	   * Performs widgets importing
	   *
	   * @param $import_array
	   *
	   * @return bool
	   */
	  function import_widget_data( $import_array ) {
		  global $wp_registered_sidebars;

		  $sidebars_data    = $import_array[0];
		  $widget_data      = $import_array[1];
		  $current_sidebars = get_option( 'sidebars_widgets' );
		  $new_widgets      = array();

		  // Add all registered sidebars
		  foreach ( $wp_registered_sidebars as $sidebar => $params ) {
			  if( ! isset( $current_sidebars[ $sidebar ] ) ) {
				  $current_sidebars[ $sidebar ] = array();
			  }
		  }

		  foreach ( $sidebars_data as $import_sidebar => $import_widgets ) {
			  foreach ( $import_widgets as $import_widget ) {
				  //if the sidebar exists
				  if ( isset( $current_sidebars[ $import_sidebar ] ) ) {
					  $title               = trim( substr( $import_widget, 0, strrpos( $import_widget, '-' ) ) );
					  $index               = trim( substr( $import_widget, strrpos( $import_widget, '-' ) + 1 ) );
					  $current_widget_data = get_option( 'widget_' . $title );
					  $new_widget_name     = $this->get_new_widget_name( $title, $index );
					  $new_index           = trim( substr( $new_widget_name, strrpos( $new_widget_name, '-' ) + 1 ) );

					  if ( ! empty( $new_widgets[ $title ] ) && is_array( $new_widgets[ $title ] ) ) {
						  while ( array_key_exists( $new_index, $new_widgets[ $title ] ) ) {
							  $new_index ++;
						  }
					  }
					  $current_sidebars[ $import_sidebar ][] = $title . '-' . $new_index;
					  if ( array_key_exists( $title, $new_widgets ) ) {
						  $new_widgets[ $title ][ $new_index ] = $widget_data[ $title ][ $index ];
						  $multiwidget                         = $new_widgets[ $title ]['_multiwidget'];

						  unset( $new_widgets[ $title ]['_multiwidget'] );

						  $new_widgets[ $title ]['_multiwidget'] = $multiwidget;

					  } else {

						  $current_widget_data[ $new_index ] = $widget_data[ $title ][ $index ];
						  $current_multiwidget               = isset( $current_widget_data['_multiwidget'] ) ? $current_widget_data['_multiwidget'] : false;
						  $new_multiwidget                   = isset( $widget_data[ $title ]['_multiwidget'] ) ? $widget_data[ $title ]['_multiwidget'] : false;
						  $multiwidget                       = ( $current_multiwidget != $new_multiwidget ) ? $current_multiwidget : 1;

						  unset( $current_widget_data['_multiwidget'] );

						  $current_widget_data['_multiwidget'] = $multiwidget;
						  $new_widgets[ $title ]               = $current_widget_data;
					  }
				  }
			  }
		  }

		  if ( isset( $new_widgets ) && isset( $current_sidebars ) ) {
			  update_option( 'sidebars_widgets', $current_sidebars );

			  foreach ( $new_widgets as $title => $content ) {
				  $content = apply_filters( 'widget_data_import', $content, $title );
				  update_option( 'widget_' . $title, $content );
			  }

			  return true;
		  }

		  return false;
	  }

	  /**
	   * Get new widget name
	   *
	   * $widget_name - widget name
	   * $widget_index - widget index
	   */
	  function get_new_widget_name( $widget_name, $widget_index ) {
		  $current_sidebars = get_option( 'sidebars_widgets' );
		  $all_widget_array = array();
		  foreach ( $current_sidebars as $sidebar => $widgets ) {
			  if ( ! empty( $widgets ) && is_array( $widgets ) && $sidebar != 'wp_inactive_widgets' ) {
				  foreach ( $widgets as $widget ) {
					  $all_widget_array[] = $widget;
				  }
			  }
		  }

		  while ( in_array( $widget_name . '-' . $widget_index, $all_widget_array ) ) {
			  $widget_index ++;
		  }

		  $new_widget_name = $widget_name . '-' . $widget_index;

		  return $new_widget_name;
	  }

  }//class
}//function_exists
?>
