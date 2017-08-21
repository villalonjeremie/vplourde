<?php
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.4.0
 * @author     Thomas Griffin <thomasgriffinmedia.com>
 * @author     Gary Jones <gamajo.com>
 * @copyright  Copyright (c) 2014, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/thomasgriffin/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 */
require get_template_directory() .'/inc/tgm/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function register_required_plugins() {

    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(

        array(
            'name'              => esc_html__('WPBakery Visual Composer','accountant-wp' ),
            'slug'              => 'js_composer', 
            'source'            => get_template_directory() . '/inc/plugins/js_composer.zip',
            'required'          => true,
            'force_activation'  => false,
            'external_url'      => 'http://codecanyon.net/item/visual-composer-page-builder-for-wordpress/242431?ref=Azelab',
        ),

        array(
            'name'               => esc_html__('Slider Revolution', 'accountant-wp' ),
            'slug'               => 'revslider', 
            'source'             => get_template_directory() . '/inc/plugins/revslider.zip',
            'required'           => true,
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => 'http://codecanyon.net/item/slider-revolution-responsive-wordpress-plugin/2751380?ref=Azelab',
        ),

        array(
            'name'               => esc_html__('Post Types +', 'accountant-wp' ),
            'slug'               => 'post_type', 
            'source'             => get_template_directory() . '/inc/plugins/post_type.zip',
            'required'           => true,
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => 'http://accountant.azelab.com',
        ),

        array(
            'name'               => esc_html__('Redux', 'accountant-wp' ),
            'slug'               => 'redux', 
            'source'             => get_template_directory() . '/inc/plugins/redux.zip',
            'required'           => true,
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => 'http://accountant.azelab.com',
        ),

        array(
            'name'              => esc_html__('WooCommerce', 'accountant-wp' ),
            'slug'              => 'woocommerce',
            'required'          => false,
            'force_activation'  => false,
        ),

        array(
            'name'              => esc_html__('Breadcrumb NavXT', 'accountant-wp' ),
            'slug'              => 'breadcrumb-navxt', 
            'required'          => false,
            'force_activation'  => false,
        ),

        array(
            'name'              => esc_html__('MailChimp for WordPress', 'accountant-wp' ),
            'slug'              => 'mailchimp-for-wp', 
            'required'          => false,
            'force_activation'  => false,
        ),
        array(
            'name'              => esc_html__('Snazzy Maps', 'accountant-wp' ),
            'slug'              => 'snazzy-maps',
            'required'          => true,
            'force_activation'  => false,
        ),
        array(
            'name'              => esc_html__('Visual Composer Maced Google Maps', 'accountant-wp' ),
            'slug'              => 'visual-composer-maced-google-maps',
            'required'           => true,
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => 'http://accountant.azelab.com',
            'source'             => get_template_directory() . '/inc/plugins/visual-composer-maced-google-maps.zip',
        ),
        array(
            'name'              => esc_html__('Contact Form 7', 'accountant-wp' ),
            'slug'              => 'contact-form-7', 
            'required'          => false,
            'force_activation'  => false,
        ),
        array(
            'name'              => esc_html__('Clone Posts', 'accountant-wp'),
            'slug'              => 'clone-posts', 
            'required'          => false,
            'force_activation'  => false,
        )

    );

    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'      => array(
            'page_title'                      => esc_html__( 'Install Required Plugins', 'accountant-wp' ),
            'menu_title'                      => esc_html__( 'Install Plugins', 'accountant-wp' ),
            'installing'                      => esc_html__( 'Installing Plugin: %s', 'accountant-wp' ), // %s = plugin name.
            'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'accountant-wp' ),
            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'accountant-wp' ), // %1$s = plugin name(s).
            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'accountant-wp' ), // %1$s = plugin name(s).
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'accountant-wp' ), // %1$s = plugin name(s).
            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'accountant-wp' ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'accountant-wp' ), // %1$s = plugin name(s).
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'accountant-wp' ), // %1$s = plugin name(s).
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'accountant-wp' ), // %1$s = plugin name(s).
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'accountant-wp' ), // %1$s = plugin name(s).
            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'accountant-wp' ),
            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins', 'accountant-wp' ),
            'return'                          => esc_html__( 'Return to Required Plugins Installer', 'accountant-wp' ),
            'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'accountant-wp' ),
            'complete'                        => esc_html__( 'All plugins installed and activated successfully. %s', 'accountant-wp' ), // %s = dashboard link.
            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );

    tgmpa( $plugins, $config );

}