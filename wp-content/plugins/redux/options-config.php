<?php

    /**
     * Theme Options Config
     */

    if ( ! class_exists( 'WPaccountant_Options_Config' ) ) {

        class WPaccountant_Options_Config {

            public $args = array();
            public $sections = array();
            public $theme;
            public $ReduxFramework;

            public function __construct() {

                if ( ! class_exists( 'ReduxFramework' ) ) {
                    return;
                }

                // This is needed. Bah WordPress bugs.  ;)
                if ( true == Redux_Helpers::isTheme( __FILE__ ) ) {
                    $this->initSettings();
                } else {
                    $this->initSettings();
                    //add_action( 'plugins_loaded', array( $this, 'initSettings' ), 10 );
                }

            }

            public function initSettings() {

                // Set the default arguments
                $this->setArguments();

                // Set a few help tabs so you can see how it's done
                $this->setHelpTabs();

                // Create the sections and fields
                $this->setSections();

                if ( ! isset( $this->args['opt_name'] ) ) { // No errors please
                    return;
                }

                $this->ReduxFramework = new ReduxFramework( $this->sections, $this->args );
            }

            public function setHelpTabs() {

                // Custom page help tabs, displayed using the help API. Tabs are shown in order of definition.
                $this->args['help_tabs'][] = array(
                    'id'      => 'redux-help-tab-1',
                    'title'   => __( 'Theme Information 1', 'accountant' ),
                    'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'accountant' )
                );

                $this->args['help_tabs'][] = array(
                    'id'      => 'redux-help-tab-2',
                    'title'   => __( 'Theme Information 2', 'accountant' ),
                    'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'accountant' )
                );

                // Set the help sidebar
                $this->args['help_sidebar'] = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'accountant' );
            }

            /**
             * All the possible arguments for Redux.
             * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
             * */
            public function setArguments() {

                $theme = wp_get_theme(); // For use with some settings. Not necessary.

                $this->args = array(
                    // TYPICAL -> Change these values as you need/desire
                    'opt_name'           => 'wpc_options',
                    // This is where your data is stored in the database and also becomes your global variable name.
                    'display_name'       => $theme->get( 'Name' ),
                    // Name that appears at the top of your panel
                    'display_version'    => false,
                    // Version that appears at the top of your panel
                    'menu_type'          => 'menu',
                    //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
                    'allow_sub_menu'     => true,
                    // Show the sections below the admin menu item or not
                    'menu_title'         => __( 'Theme Options', 'accountant' ),
                    'page_title'         => __( 'Theme Options', 'accountant' ),
                    // You will need to generate a Google API key to use this feature.
                    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
                    'google_api_key'     => '',
                    // Must be defined to add google fonts to the typography module

                    'async_typography'   => false,
                    // Use a asynchronous font on the front end or font string
                    'admin_bar'          => true,
                    // Show the panel pages on the admin bar
                    'global_variable'    => 'wpc_option',
                    // Set a different name for your global variable other than the opt_name
                    'dev_mode'           => false,
                    // Show the time the page took to load, etc
                    'customizer'         => false,
                    // Enable basic customizer support

                    // OPTIONAL -> Give you extra features
                    'page_priority'      => null,
                    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
                    'page_parent'        => 'themes.php',
                    // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
                    'page_permissions'   => 'manage_options',
                    // Permissions needed to access the options panel.
                    'menu_icon'          => '',
                    // Specify a custom URL to an icon
                    'last_tab'           => '',
                    // Force your panel to always open to a specific tab (by id)
                    'page_icon'          => 'icon-themes',
                    // Icon displayed in the admin panel next to your menu_title
                    'page_slug'          => 'wpaccountant_options',
                    // Page slug used to denote the panel
                    'save_defaults'      => true,
                    // On load save the defaults to DB before user clicks save or not
                    'default_show'       => false,
                    // If true, shows the default value next to each field that is not the default value.
                    'default_mark'       => '',
                    // What to print by the field's title if the value shown is default. Suggested: *
                    'show_import_export' => true,
                    // Shows the Import/Export panel when not used as a field.

                    // CAREFUL -> These options are for advanced use only
                    'transient_time'     => 60 * MINUTE_IN_SECONDS,
                    'output'             => true,
                    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
                    'output_tag'         => true,
                    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
                    'footer_credit'     => ' ',                   
                    // Disable the footer credit of Redux. Please leave if you can help it.

                    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
                    'database'           => '',
                    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
                    'system_info'        => false,
                    // REMOVE

                    // HINTS
                    'hints'              => array(
                        'icon'          => 'icon-question-sign',
                        'icon_position' => 'right',
                        'icon_color'    => 'lightgray',
                        'icon_size'     => 'normal',
                        'tip_style'     => array(
                            'color'   => 'light',
                            'shadow'  => true,
                            'rounded' => false,
                            'style'   => '',
                        ),
                        'tip_position'  => array(
                            'my' => 'top left',
                            'at' => 'bottom right',
                        ),
                        'tip_effect'    => array(
                            'show' => array(
                                'effect'   => 'slide',
                                'duration' => '500',
                                'event'    => 'mouseover',
                            ),
                            'hide' => array(
                                'effect'   => 'slide',
                                'duration' => '500',
                                'event'    => 'click mouseleave',
                            ),
                        ),
                    )
                );
                // Panel Intro text -> before the form
                if ( ! isset( $this->args['global_variable'] ) || $this->args['global_variable'] !== false ) {
                    if ( ! empty( $this->args['global_variable'] ) ) {
                        $v = $this->args['global_variable'];
                    } else {
                        $v = str_replace( '-', '_', $this->args['opt_name'] );
                    }
                } else {
                    //$this->args['intro_text'] = __( '<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'accountant' );
                }
            }

            public function setSections() {


                /*--------------------------------------------------------*/
                /* GENERAL SETTINGS
                /*--------------------------------------------------------*/
                $this->sections[] = array(
                    'title'  => __( 'General', 'accountant' ),
                    'desc'   => '',
                    'icon'   => 'el-icon-cog el-icon-large',
                    'submenu' => true, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
                    'fields' => array(

                        array(
                            'id'       =>'site_logo',
                            'url'      => false,
                            'type'     => 'media', 
                            'title'    => __('Site Logo', 'accountant'),
                            'default'  => array( 'url' => get_template_directory_uri() .'/assets/images/logo.png' ),
                            'subtitle' => __('Upload your logo here.', 'accountant'),
                        ),
                        array(
                            'id'       =>'site_logo_sticky',
                            'url'      => false,
                            'type'     => 'media', 
                            'title'    => __('Site Logo for sticky menu', 'accountant'),
                            'default'  => array( 'url' => get_template_directory_uri() .'/assets/images/logo.png' ),
                            'subtitle' => __('Upload your logo here.', 'accountant'),
                        ),
                        array(
                            'id'       =>'site_logo_mobile',
                            'url'      => false,
                            'type'     => 'media', 
                            'title'    => __('Site Logo for mobile', 'accountant'),
                            'default'  => array( 'url' => get_template_directory_uri() .'/assets/images/logo.png' ),
                            'subtitle' => __('Upload your logo here.', 'accountant'),
                        ),
                        array(
                            'id'       =>'site_logo_child',
                            'url'      => false,
                            'type'     => 'media', 
                            'title'    => __('Site Logo for Child Page', 'accountant'),
                            'default'  => array( 'url' => get_template_directory_uri() .'/assets/images/logo.png' ),
                            'subtitle' => __('Upload your logo for Child Page here.', 'accountant'),
                        ),
                        array(
                            'id'       =>'site_logo_footer',
                            'url'      => false,
                            'type'     => 'media', 
                            'title'    => __('Site Logo for Footer', 'accountant'),
                            'default'  => array( 'url' => get_template_directory_uri() .'/assets/images/logo.png' ),
                            'subtitle' => __('Upload your logo for Footer here.', 'accountant'),
                        ),
                        array(
                            'id'             => 'logo_margin',
                            'type'           => 'spacing',
                            'output'         => array('.logo'),
                            'mode'           => 'margin',
                            'units'          => array('px'),
                            'units_extended' => 'false',
                            'title'          => __('Logo Margin', 'accountant'),
                            'subtitle'       => '',
                            'desc'           => __('Set your logo margin in px. ee.g. 20', 'accountant'),
                            'default'        => array(
                                'margin-top'     => '0px', 
                                'margin-right'   => '0px', 
                                'margin-bottom'  => '0px', 
                                'margin-left'    => '0px',
                                'units'          => 'px', 
                            )

                        ),
                        array(
                            'id'       =>'site_favicon',
                            'url'      => false,
                            'type'     => 'media', 
                            'title'    => __('Site Favicon', 'accountant'),
                            'default'  => '',
                            'subtitle' => __('Upload a 16px x 16px .png or .gif image that will be your favicon.', 'accountant'),
                        ),
                        array(
                            'id'       =>'site_iphone_icon',
                            'url'      => false,
                            'type'     => 'media', 
                            'title'    => __('Apple iPhone Icon ', 'accountant'),
                            'default'  => '',
                            'subtitle' => __('Custom iPhone icon (57px x 57px).', 'accountant'),
                        ),
                        
                        array(
                            'id'       =>'site_iphone_icon_retina',
                            'url'      => false,
                            'type'     => 'media', 
                            'title'    => __('Apple iPhone Retina Icon ', 'accountant'),
                            'default'  => '',
                            'subtitle' => __('Custom iPhone retina icon (114px x 114px).', 'accountant'),
                        ),
                        
                        array(
                            'id'       =>'site_ipad_icon',
                            'url'      => false,
                            'type'     => 'media', 
                            'title'    => __('Apple iPad Icon ', 'accountant'),
                            'default'  => '',
                            'subtitle' => __('Custom iPad icon (72px x 72px).', 'accountant'),
                        ),
                        
                        array(
                            'id'       =>'site_ipad_icon_retina',
                            'url'      => false,
                            'type'     => 'media', 
                            'title'    => __('Apple iPad Retina Icon ', 'accountant'),
                            'default'  => '',
                            'subtitle' => __('Custom iPad retina icon (144px x 144px).', 'accountant'),
                        ),
                        array(
                            'id'       => 'page_comments',
                            'type'     => 'switch',
                            'title'    => __('Enable Page Comments?', 'accountant'),
                            'subtitle' => __('Do you want to enable comments on page?', 'accountant'),
                            'default'  => false,
                        ),
                        array(
                            'id'       => 'page_back_totop',
                            'type'     => 'switch',
                            'title'    => __('Enable Back To Top Button?', 'accountant'),
                            'subtitle' => __('Do you want to enable back to top button?', 'accountant'),
                            'default'  => true,
                        ),
                    )
                );

                /*--------------------------------------------------------*/
                /* LAYOUTS
                /*--------------------------------------------------------*/
                $this->sections[] = array(
                    'title'  => __( 'Layout', 'accountant' ),
                    'desc'   => '',
                    'icon'   => 'el-icon-website el-icon-large',
                    'submenu' => true,
                    'fields' => array(
                        array(
                            'id'       => 'archive_layout',
                            'type'     => 'button_set',
                            'title'    => __( 'Archive Layout', 'accountant' ),
                            'subtitle' => __( 'Default archive layout ( front page, category, tag, search, author, archive ).', 'accountant' ),
                            'options'  => array(
                                'left-sidebar'  => 'Left Sidebar',
                                'no-sidebar'    => 'No Sidebar',
                                'right-sidebar' => 'Right Sidebar'
                            ),
                            'default'  => 'right-sidebar'
                        ),
                        array(
                            'id'       => 'blog_layout',
                            'type'     => 'button_set',
                            'title'    => __( 'Single Blog Layout', 'accountant' ),
                            'subtitle' => __( 'Set your blog layout to display single blog post.', 'accountant' ),
                            'options'  => array(
                                'left-sidebar'  => 'Left Sidebar',
                                'no-sidebar'    => 'No Sidebar',
                                'right-sidebar' => 'Right Sidebar'
                            ),
                            'default'  => 'right-sidebar'
                        ),
                    )
                );

                /*--------------------------------------------------------*/
                /* HEADER
                /*--------------------------------------------------------*/

                $this->sections[] = array(
                    'title'  => __( 'Header', 'accountant' ),
                    'desc'   => '',
                    'icon'   => 'el-icon-file',
                    'submenu' => true,
                    'fields' => array(

                        array(
                            'id'       => 'header_fixed',
                            'type'     => 'switch',
                            'title'    => __('Enable fixed header on scroll.', 'accountant'),
                            'default'  => true,
                        ),
                        array(
                            'id'       => 'header_fixed_top',
                            'type'     => 'switch',
                            'title'    => __('Enable fixed header on top scroll.', 'accountant'),
                            'default'  => true,
                            'required' => array('header_fixed','=', true, ),
                        ),

                        array(
                            'id'       => 'header_style',
                            'type'     => 'button_set',
                            'title'    => __( 'Header Style', 'accountant' ),
                            'subtitle' => __( 'Select your header style', 'accountant' ),
                            'options'  => array(
                                'header-default'  => 'Header 1 - Default',
                                'topbar'   => 'Header with topbar',
                            ),
                            'default'  => 'header-default'
                        ),

                        array(
                            'id'       => 'header_topbar_info',
                            'type'     => 'info',
                            'style'    => 'warning',
                            'title'    => __('Header Topbar Setup Guide', 'accountant'),
                            'desc'     => __('You had selected <strong>Header Topbar</strong> style. In order to display top bar elements please go to Widget page and look for TopBar Left / TopBar Right widget areas.', 'accountant'),
                            'required' => array('header_style','=','topbar', ),
                        ),
                        array(
                            'id'       => 'header_search',
                            'type'     => 'switch',
                            'title'    => __('Enable header search', 'accountant'),
                            'default'  => true,
                        ),
                        array(
                            'id'       => 'topbar_custom_style',
                            'type'     => 'switch',
                            'title'    => __('Custom Topbar Style?', 'accountant'),
                            'default'  => false,
                        ),
                        array(
                            'id'       => 'topbar_background',
                            'type'     => 'background',
                            'compiler' => true,
                            'output'   => array('.top-bar'),
                            'title'    => __('Topbar Background', 'accountant'),
                            'desc'     => '',
                            'required' => array('topbar_custom_style','=',true, ),
                            'default'  => array(
                            ),
                        ),
                        array(
                            'id'       => 'topbar_link_color',
                            'type'     => 'color',
                            'compiler' => true,
                            'title'    => __('Topbar Link Color', 'accountant'),
                            'required' => array('topbar_custom_style','=',true, ),
                            'default'  => '',
                            'output'   => array(
                                'color'             => '.top-bar .skype, .top-bar .mail, #lang_sel .lang_sel_sel, .top-bar .sing_in'
                            )
                        ),
                        array(
                            'id'       =>'divider_2',
                            'desc'     => '',
                            'required' => array('topbar_custom_style','=',true, ),
                            'type'     => 'divide'
                        ),
                        array(
                            'id'       => 'header_custom_style',
                            'type'     => 'switch',
                            'title'    => __('Custom Header Style?', 'accountant'),
                            'default'  => false,
                        ),
                        array(
                            'id'       => 'header_background',
                            'type'     => 'background',
                            'compiler' => true,
                            'output'   => array('.header-normal .site-header, #header.single, #header'),
                            'title'    => __('Header Background', 'accountant'),
                            'desc'     => '',
                            'required' => array('header_custom_style','=',true, ),
                            'default'  => array(
                            ),
                        ),
                        array(
                            'id'       => 'header_color',
                            'type'     => 'color_rgba',
                            'compiler' => true,
                            'title'    => __('Header Color', 'accountant'),
                            'required' => array('header_custom_style','=',true, ),
                            'default'  => '',
                            'output'   => array(
                                
                                'color'      => '.category-imgages .title h2, #header.single .navbar-nav > li > a.active'

                            )
                        ),
                        array(
                            'id'       =>'divider_01',
                            'desc'     => '',
                            'required' => array('topbar_custom_style','=',true, ),
                            'type'     => 'divide'
                        ),
                        array(
                            'id'       => 'header_fixed_background',
                            'type'     => 'color_rgba',
                            'compiler' => true,
                            'output'   => array(
                                
                                'background'      => '#header.shadow-fixed.sticky, #header.shadow-fixed.sticky-top'

                            ),
                            'title'    => __('Fixed Header Background', 'accountant'),
                            'desc'     => '',
                            'required' => array('header_custom_style','=',true, ),
                            'default'  => array(
                            ),
                        ),
                    )
                );

                /*--------------------------------------------------------*/
                /* PRIMARY MENU
                /*--------------------------------------------------------*/
                $this->sections[] = array(
                    'title'  => __( 'Menu panel', 'accountant' ),
                    'desc'   => '',
                    'icon'   => 'el-icon-credit-card',
                    'submenu' => true,
                    'fields' => array(
                        array(
                            'id'             =>'primary_menu_typography',
                            'type'           => 'typography', 
                            'title'          => __('Primary Menu Typography', 'accountant'),
                            'compiler'       =>true,
                            'google'         =>true,
                            'font-backup'    =>false,
                            'text-align'     =>false,
                            'text-transform' =>true,
                            'font-weight'    =>true,
                            'all_styles'     =>false,
                            'font-style'     =>true,
                            'subsets'        =>true,
                            'font-size'      =>true,
                            'line-height'    =>false,
                            'word-spacing'   =>false,
                            'letter-spacing' =>true,
                            'color'          =>true,
                            'preview'        =>true,
                            'output'         => array('#header .menu .navbar-nav > li > a'),
                            'units'          =>'px',
                            'subtitle'       => __('Custom typography for primary menu.', 'accountant'),
                            'default'        => array(
                            )
                        ),
                    )
                );

                /*--------------------------------------------------------*/
                /* PAGE
                /*--------------------------------------------------------*/
                $this->sections[] = array(
                    'title'  => __( 'Page', 'accountant' ),
                    'desc'   => '',
                    'icon'   => 'el-icon-file-new',
                    'submenu' => true,
                    'fields' => array(

                        array(
                            'id'       => 'page_404',
                            'type'     => 'select',
                            'data'     => 'pages',
                            'title'    => __( 'Page 404', 'accountant' ),
                            'default'  => '',
                        ),

                    )
                );

                /*--------------------------------------------------------*/
                /* WOOCOMMERCE
                /*--------------------------------------------------------*/
                $this->sections[] = array(
                    'icon' => 'dashicons dashicons-cart',
                    'title' => esc_html__( 'WooCommerce', 'accountant' ),
                    'id'               => 'woo-settings',
                    'customizer_width' => '450px',
                );
                $this->sections[] = array(
                    'icon' => 'dashicons dashicons-cart',
                    'title' => esc_html__( 'Shop', 'accountant' ),
                    'id'               => 'shop-settings',
                    'subsection'       => true,
                    'customizer_width' => '450px',
                    'fields'           => array(
                        array(
                            'id'       => 'prod_per_page',
                            'type'     => 'text',
                            'title'    => esc_html__( 'Products per page', 'accountant' ),
                            'default'  => '10',
                        ),
                        array(
                            'id'      => 'prod_page_columns',
                            'type'    => 'button_set',
                            'title'   => __( 'Shop Columns', 'accountant' ),
                            'desc'    => __( 'Select the number of columns you would like for your shop.', 'accountant' ),
                            'type'    => 'button_set',
                            'default' => '4',
                            'options' => array(
                                '2'   => __( '2 Columns', 'accountant' ),
                                '3'   => __( '3 Columns', 'accountant' ),
                                '4'   => __( '4 Columns', 'accountant' ),
                            ),
                        ),
                        array(
                            'id'       => 'shop_layout',
                            'type'     => 'button_set',
                            'title'    => __( 'Shop Layout', 'accountant' ),
                            'subtitle' => __( 'Set your Shop layout.', 'accountant' ),
                            'options'  => array(
                                'sidebar-left'  => 'Left Sidebar',
                                'no-sidebar'    => 'No Sidebar',
                                'sidebar-right' => 'Right Sidebar'
                            ),
                            'default'  => 'sidebar-left'
                        ),
                        array(
                            'id'       => 'shop_header_bg',
                            'type'     => 'color',
                            'compiler' => true,
                            'title'    => __('Shop header background', 'accountant'),
                            'default'  => '#555',                            
                        ), 
                    )
                );
                $this->sections[] = array(
                    'icon' => 'dashicons dashicons-cart',
                    'title' => esc_html__( 'Product', 'accountant' ),
                    'id'               => 'product-settings',
                    'subsection'       => true,
                    'customizer_width' => '450px',
                    'fields'           => array(
                        array(
                            'id'       => 'product_layout',
                            'type'     => 'button_set',
                            'title'    => __( 'Product Layout', 'accountant' ),
                            'subtitle' => __( 'Set Single Product layout.', 'accountant' ),
                            'options'  => array(
                                'sidebar-left'  => 'Left Sidebar',
                                'no-sidebar'    => 'No Sidebar',
                                'sidebar-right' => 'Right Sidebar'
                            ),
                            'default'  => 'sidebar-left'
                        ),
                        array(
                            'id'       => 'product_reviews',
                            'type'     => 'switch',
                            'title'    => __('Enable reviews on product page.', 'accountant'),
                            'default'  => true,
                        ),
                        array(
                            'id'       => 'product_header_bg',
                            'type'     => 'color',
                            'compiler' => true,
                            'title'    => __('Product header background', 'accountant'),
                            'default'  => '#555',                            
                        ), 
                    )
                );

                /*--------------------------------------------------------*/
                /* STYLING
                /*--------------------------------------------------------*/
                $this->sections[] = array(
                    'title'  => __( 'Styling', 'accountant' ),
                    'desc'   => '',
                    'icon'   => 'el-icon-tint',
                    'submenu' => true,
                    'fields' => array(
                        array(
                            'id'       => 'primary_color',
                            'type'     => 'color',
                            'compiler' => true,
                            'title'    => __('Primary Color Schema', 'accountant'),
                            'default'  => '#fab702',
                            'output'   => array(
                                'color'             => '.case-box .link a::after,.case-box .link a,.case-box h3,.text-block-right h2 strong,.text-block-left h2 strong,.widget .more:hover,a, .post-advisor .boxes-blog a:hover,.boxer-icon .title-number,a:hover, .services-box:hover a ,.faq .open .pull-right, .faq .open .pull-right::after, .vc_custom_heading a:hover, .right-years-box .more:hover, .widgets-list ul li a:hover,.post-advisor h4 a:hover, #header .navbar-nav > li:hover > a, .post-advisor .more:hover, .boxe-border .next:hover::after, .main-profile .soc-box a:hover, .list-advisor .owl-prev:hover, .list-advisor .owl-next:hover, .faq .media h3',
                                'background-color'  => '.widget .tags a:hover,.widget .post-photo a::after,.form-footer input[type="submit"]:hover,.photo-advisor:hover .date-photo,.box-percent .text-year.blue, .post-advisor .title-blog.blue-border span::after, .post-advisor .title-blog.blue-border a::after, .search-main input[type="submit"], .faq .nav-tabs .active > a, .faq .nav-tabs .active a:hover, .faq .nav-tabs li a:hover, .tabs-list li.active a, li.nav-tabs > li.active > a, .nav-tabs > li.active > a:hover, .nav-tabs > li.active > a:focus, .money-box:hover .button a, .career .caper-more, .load-more #load_more, .photo-user .hover-user,#header .menu ul .menu-item-has-children li:hover > a, .main-line, .career-form input[type="submit"], .career-form h3:after, .conact-form input[type="submit"]:hover, .theme-light.introLoader.simpleLoader, .theme-light.introLoader.cssLoader, .doubleLoader.theme-light .doubleLoaderBottom, .doubleLoader.theme-light .doubleLoaderTop, .theme-light.lettersLoader, .theme-light.introLoader.counterLoader, .introLoading, .theme-light.gifLoader .gifLoaderInner,.block-blue .orang',
                                'border-color'      => '.years-box.blue-border,.years-box.blue-border,.soc-box a:hover,.top-block h2, .owl-theme .owl-controls .owl-page.active span, .owl-theme .owl-controls.clickable .owl-page:hover span, .post-advisor .title-blog.blue-border, .wp-pagenevi .page-numbers.current, .wp-pagenevi .page-numbers:hover, .faq .open .pull-right,.text-serv h2,.title-cases h2,.top-head h2,.boder-c h2, .services-box:hover, .main-profile .soc-box a:hover, .years-box .text-year.blue-border, .services-box.box.no-svg-border:hover, .no-svg-border-margin:hover',
                                'border-left-color' => '',
                                'stroke' => '.list-images ul li a:hover svg line, .box:hover svg line, .services-box.box:hover svg line',

                            )
                        ),

                        array(
                            'id'       => 'border_color',
                            'type'     => 'color',
                            'compiler' => true,
                            'default'  => '#f5f5f5',
                            'title'    => __('Border Color', 'accountant'),
                            'output'   => array(
                                'border-color' => '.right-years-box h3, h3, .post-advisor h3, .title-user, .text-l h3, .widgets-list h2, .post-advisor .title-blog, .wp-pagenevi span, .wp-pagenevi .page-numbers, .wp-pagenevi span, .wp-pagenevi .page-numbers, .main-profile .head-user::after, .boxe-border, .boxe-border .borde-first, .career-form, .conact-form .item .file-div, .conact-form .item input[type="tel"], .conact-form .item input[type="email"], .conact-form .item input[type="text"], .conact-form .item textarea, ul.list-post li:after, ul.list-post li:before, .conact-form, .main-profile .soc-box a, .services-box.box.no-svg-border, .no-svg-border',
                                'color' => '.boxe-border .prev::after, .boxe-border .next::after ',
                                'background-color' => '.widgets-list ul li:after, .tagcloud a::after, .post-advisor .title-blog span::after, .post-advisor .title-blog a::after',
                            )
                        ),
                        
                        array(
                            'id'       => 'body_bg',
                            'type'     => 'background',
                            'compiler' => true,
                            'output'   => array('.wrapper'),
                            'title'    => __('Site Background', 'accountant'),
                            'default'  => array(
                                'background-color' => '#ffffff',
                            )
                            
                        ), 
                        array(
                            'id'       => 'enable_preloader_style',
                            'type'     => 'switch',
                            'title'    => __('Show Preloader', 'accountant'),
                            'desc'     => __('Show preloader?', 'accountant'),
                            'default'  => true,
                        ),
                        array(
                            'id'       => 'enable_home_preloader_style',
                            'type'     => 'switch',
                            'title'    => __('Show Preloader only on Home', 'accountant'),
                            'desc'     => __('Show preloader only on Home?', 'accountant'),
                            'default'  => false,
                        ),
                        array(
                            'id'      => 'preloader_style',
                            'type'    => 'button_set',
                            'title'   => __( 'Preloader Style', 'accountant' ),
                            'type'    => 'button_set',
                            'default' => '1',
                            'options' => array(
                                'simpleLoader'   => __( 'Simple Loader', 'accountant' ),
                                'cssLoader'   => __( 'Css Loader', 'accountant' ),
                                'doubleLoader'   => __( 'Double Loader', 'accountant' ),
                                'lettersLoader'   => __( 'Letters Loader', 'accountant' ),
                                'counterLoader'   => __( 'Counter Loader', 'accountant' ),
                                'gifLoader'   => __( 'Gif Loader', 'accountant' ),
                            ),
                        ), 
                        array(
                            'id'       =>'letters_loader_text',
                            'type'     => 'textarea',
                            'title'    => __('Letters Loader Text', 'accountant'),
                            'subtitle' => __('Enter letters loader text', 'accountant'),
                            'required' => array('preloader_style','=','lettersLoader', ), 
                        ), 
                        array(
                            'id'       =>'gif_loader_image',
                            'url'      => false,
                            'type'     => 'media', 
                            'title'    => __('Gif Loader Image', 'accountant'),
                            'default'  => array( 'url' => get_template_directory_uri() .'/assets/img/preloader_1.gif' ),
                            'subtitle' => __('Upload your Gif Loader Image.', 'accountant'),
                            'required' => array('preloader_style','=','gifLoader', ), 
                        ),                  
                    )
                );


                /*--------------------------------------------------------*/
                /* TYPOGRAPHY
                /*--------------------------------------------------------*/
                $this->sections[] = array(
                    'title'      => __('Typography', 'accountant'),
                    'header'     => '',
                    'desc'       => '',
                    'icon_class' => 'el-icon-large',
                    'icon'       => 'el-icon-font',
                    'submenu'    => true,
                    'fields'     => array(
                        array(
                            'id'             =>'font_body',
                            'type'           => 'typography', 
                            'title'          => __('Body', 'accountant'),
                            'compiler'       =>true,
                            'google'         =>true,
                            'font-backup'    =>false,
                            'font-weight'    =>false,
                            'all_styles'     =>true,
                            'font-style'     =>false,
                            'subsets'        =>true,
                            'font-size'      =>true,
                            'line-height'    =>false,
                            'word-spacing'   =>false,
                            'letter-spacing' =>false,
                            'color'          =>true,
                            'preview'        =>true,
                            'output'         => array('body'),
                            'units'          =>'px',
                            'subtitle'       => __('Select custom font for your main body text.', 'accountant'),
                            'default'        => array(
                                'color'       =>"#777777",
                                'font-family' =>'PT Sans', 
                                'font-size'   =>'14px',
                            )
                        ),
                        array(
                            'id'             =>'font_heading',
                            'type'           => 'typography', 
                            'title'          => __('Heading', 'accountant'),
                            'compiler'       =>true,
                            'google'         =>true,
                            'font-backup'    =>false,
                            'all_styles'     =>true,
                            'font-weight'    =>true,
                            'font-style'     =>false,
                            'subsets'        =>true,
                            'font-size'      =>false,
                            'line-height'    =>false,
                            'word-spacing'   =>false,
                            'letter-spacing' =>true,
                            'color'          =>true,
                            'preview'        =>true,
                            'output'         => array('h1,h2,h3,h4,h5,h6'),
                            'units'          =>'px',
                            'subtitle'       => __('Select custom font for heading like h1, h2, h3, ...', 'accountant'),
                            'default'        => array(
                                'color'       =>"#333333",
                                'font-family' =>'Montserrat',
                            )
                        ),  
                    ),
                );

                /*--------------------------------------------------------*/
                /* BLOG SETTINGS
                /*--------------------------------------------------------*/
                $this->sections[] = array(
                    'title'  => __( 'Blog', 'accountant' ),
                    'desc'   => '',
                    'icon'   => 'el-icon-pencil el-icon-pencil',
                    'submenu' => true,
                    'fields' => array(
                        array(
                            'id'       => 'blog_page_title',
                            'type'     => 'switch',
                            'title'    => __('Enable Blog Page Title', 'accountant'),
                            'subtitle' => __('Do you want to enable blog page title?', 'accountant'),
                            'default'  => true,
                        ),
                        array(
                            'id'       => 'blog_single_breadcrumb',
                            'type'     => 'switch',
                            'title'    => __('Enable Breadcrumb For Single Blog Post', 'accountant'),
                            'subtitle' => __('Do you want to enable breadcrumb on single blog post?', 'accountant'),
                            'default'  => true,
                        ),

                        array(
                            'id'       =>'blog_banner',
                            'url'      => false,
                            'type'     => 'media', 
                            'title'    => __('Single Blog banner', 'accountant'),
                            'default'  => array( 'url' => get_template_directory_uri() .'/assets/images/big-bredcrums.jpg' ),
                            'subtitle' => __('Upload your banner here.', 'accountant'),
                        ),

                        array(
                            'id'   =>'divider_1',
                            'desc' => '',
                            'type' => 'divide'
                        ),
                        array(
                            'id'       => 'blog_single_thumb',
                            'type'     => 'switch',
                            'title'    => __('Show Featured Image', 'accountant'),
                            'desc'     => __('Show featured image on single blog post?', 'accountant'),
                            'default'  => true,
                        ),
                        array(
                            'id'       => 'blog_single_author',
                            'type'     => 'switch',
                            'title'    => __('Show Author Box', 'accountant'),
                            'desc'     => __('Show author bio box on single blog post?', 'accountant'),
                            'default'  => true,
                        ),
                        array(
                            'id'       => 'blog_show_comments',
                            'type'     => 'switch',
                            'title'    => __('Show Comments', 'accountant'),
                            'desc'     => __('Show author Comments?', 'accountant'),
                            'default'  => true,
                        ),
                        array(
                            'id'       => 'blog_show_category',
                            'type'     => 'switch',
                            'title'    => __('Show Category', 'accountant'),
                            'desc'     => __('Show post Category?', 'accountant'),
                            'default'  => true,
                        ),
                        array(
                            'id'       => 'blog_show_date',
                            'type'     => 'switch',
                            'title'    => __('Show Date', 'accountant'),
                            'desc'     => __('Show post date?', 'accountant'),
                            'default'  => true,
                        ),
                        array(
                            'id'       => 'blog_read_more',
                            'type'     => 'switch',
                            'title'    => __('Show Read More', 'accountant'),
                            'desc'     => __('Show "read more"?', 'accountant'),
                            'default'  => true,
                        ),
                        array(
                            'id'       => 'blog_title_linkable',
                            'type'     => 'switch',
                            'title'    => __('Enable Title Linkable', 'accountant'),
                            'desc'     => __('Enable title linkable?', 'accountant'),
                            'default'  => true,
                        ),
                        array(
                            'id'       => 'blog_image_linkable',
                            'type'     => 'switch',
                            'title'    => __('Enable Image Linkable', 'accountant'),
                            'desc'     => __('Enable Image Linkable?', 'accountant'),
                            'default'  => true,
                        ),
                        array(
                            'id'   =>'divider_2',
                            'desc' => '',
                            'type' => 'divide'
                        ),
                    )
                );

                /*--------------------------------------------------------*/
                /* FOOTER
                /*--------------------------------------------------------*/
                $this->sections[] = array(
                    'title'  => __( 'Footer', 'accountant' ),
                    'desc'   => '',
                    'icon'   => 'el-icon-photo',
                    'submenu' => true,
                    'fields' => array(
                        array(
                            'id'       => 'footer_widgets',
                            'type'     => 'switch',
                            'title'    => __('Enable footer widgets area.', 'accountant'),
                            'default'  => true,
                        ),
                        array(
                            'id'      => 'footer_columns',
                            'type'    => 'button_set',
                            'title'   => __( 'Footer Columns', 'accountant' ),
                            'desc'    => __( 'Select the number of columns you would like for your footer widgets area.', 'accountant' ),
                            'type'    => 'button_set',
                            'default' => '4',
                            'required' => array('footer_widgets','=',true, ),
                            'options' => array(
                                '1'   => __( '1 Columns', 'accountant' ),
                                '2'   => __( '2 Columns', 'accountant' ),
                                '3'   => __( '3 Columns', 'accountant' ),
                                '4'   => __( '4 Columns', 'accountant' ),
                            ),
                        ),
                        array(
                            'id'       => 'footer_paralax',
                            'type'     => 'switch',
                            'title'    => __('Enable footer paralax effect.', 'accountant'),
                            'default'  => false,
                        ),
                        array(
                            'id'       =>'footer_copyright',
                            'type'     => 'textarea',
                            'title'    => __('Footer Copyright', 'accountant'),
                            'subtitle' => __('Enter the copyright section text.', 'accountant'),
                        ),

                        array(
                            'id'       => 'footer_custom_color',
                            'type'     => 'switch',
                            'title'    => __('Custom your footer style?.', 'accountant'),
                            'default'  => false,
                        ),
                        array(
                            'id'       => 'footer_bg',
                            'type'     => 'background',
                            'compiler' => true,
                            'output'   => array('.footer'),
                            'title'    => __('Footer Background', 'accountant'),
                            'required' => array('footer_custom_color','=',true, ),
                            'default'  => array(
                                'background-color' => '#16181e',
                            )
                        ),
                        array(
                            'id'       => 'footer_widget_title_color',
                            'type'     => 'color',
                            'compiler' => true,
                            'output'   => array('.widget h4, .widget h5'),
                            'title'    => __('Footer Widget Title Color', 'accountant'),
                            'default'  => '#838383',
                            'required' => array('footer_custom_color','=',true, )
                        ),
                        array(
                            'id'       => 'footer_text_color',
                            'type'     => 'color',
                            'compiler' => true,
                            'output'   => array('.widget p, .widget .list-adress li, .widget .date, .copy p, .form-footer input[type="text"]'),
                            'title'    => __('Footer Text Color', 'accountant'),
                            'default'  => '#535353',
                            'required' => array('footer_custom_color','=',true, )
                        ),
                        array(
                            'id'       => 'footer_link_color',
                            'type'     => 'color',
                            'compiler' => true,
                            'output'   => array(
                                'color'             => '.widget .more, .widget a, .soc-box a',
                                
                                'border-color'      => '.soc-box a',
                                'background-color'  => '.form-footer input[type="submit"]'
                            ),
                            'title'    => __('Footer Link Color', 'accountant'),
                            'default'  => '#535353',
                            'required' => array('footer_custom_color','=',true, )
                        ),
                        array(
                            'id'       => 'footer_link_color_hover',
                            'type'     => 'color',
                            'compiler' => true,
                            'output'   => array(
                                'color'             => '.widget .more:hover, .widget a:hover',
                                
                                'border-color'      => '.soc-box a:hover',
                                'background-color'  => '.form-footer input[type="submit"]:hover, .widget .post-photo a, .widget .post-photo span, .widget .tags a:hover'
                            ),
                            'title'    => __('Footer Link Color Hover', 'accountant'),
                            'default'  => '#337AB7',
                            'required' => array('footer_custom_color','=',true, )
                        ),
                    )
                );

                /*--------------------------------------------------------*/
                /* SOCIAL
                /*--------------------------------------------------------*/
                $this->sections[] = array(
                    'title'  => __( 'Social Media', 'accountant' ),
                    'desc'   => 'Enter social url here and then active them in footer or header options. Please add full URLs include "http://".',
                    'icon'   => 'el-icon-address-book',
                    'fields'     => array(
                        array(
                            'id'          => 'opt-slides',
                            'type'        => 'slides',
                            'title'       => __( 'Social media', 'accountant' ),
                            'subtitle'    => __( 'Icon, favicon, link!', 'accountant' ),
                            'placeholder' => array(
                                'title'       => __( 'Sotial name', 'accountant' ),
                                'url'         => __( 'Social link', 'accountant' ),
                                'description'         => __( 'Favicon icon', 'accountant' ),  
                            ),
                        ),                      
                    )
                );

                /*--------------------------------------------------------*/
                /* TRACKING CODE
                /*--------------------------------------------------------*/
                $this->sections[] = array(
                    'icon'       => 'el-icon-screenshot',
                    'icon_class' => 'el-icon-large',
                    'title'      => __('Custom Codes', 'accountant'),
                    'submenu'    => true,
                    'fields'     => array(
                        array(
                            'id'       =>'site_header_tracking',
                            'type'     => 'textarea',
                            'theme'    => 'chrome',
                            'title'    => __('Header Custom Codes', 'accountant'),
                            'subtitle' => __('It will apply to wp_head hook.', 'accountant'),
                        ),
                        array(
                            'id'       =>'site_footer_tracking',
                            'type'     => 'textarea',
                            'theme'    => 'chrome',
                            'title'    => __('Footer Custom Codes', 'accountant'),
                            'subtitle' => __('It will apply to wp_footer hook, recommend for Google Analytic (Remember to include the entire script from google, if you just enter your tracking ID it will not work.) ', 'accountant'),
                        ),
                    )
                );

                /*--------------------------------------------------------*/
                /* CUSTOM CSS
                /*--------------------------------------------------------*/
                $this->sections[] = array(
                    'icon'       => 'el-icon-css',
                    'icon_class' => 'el-icon-large',
                    'title'      => __('Custom CSS', 'accountant'),
                    'submenu'    => true,
                    'fields'     => array(
                        array(
                            'id'       => 'site_css',
                            'type'     => 'ace_editor',
                            'title'    => __( 'CSS Code', 'accountant' ),
                            'subtitle' => __( 'Paste your custom CSS code here.', 'accountant' ),
                            'mode'     => 'css',
                            'theme'    => 'monokai',
                            'desc'     => 'Possible modes can be found at <a href="'. esc_url( 'http://ace.c9.io' ) .'" target="_blank">'. esc_attr( 'http://ace.c9.io' ) .'</a>.',
                            'default'  => ""
                        ),
                    )
                );
                
                /*--------------------------------------------------------*/
                /* Google Maps
                /*--------------------------------------------------------*/
                $this->sections[] = array(
                    'icon' => 'dashicons dashicons-location',
                    'title' => esc_html__( 'Google Maps', 'accountant' ),
                    'id'               => 'google-maps-settings',
                    'customizer_width' => '450px',
                    'fields'           => array(
                        array(
                            'id' => 'google_maps_key',
                            'type' => 'text',
                            'title' => esc_html__('Google Maps API Key', 'accountant'),
                            'default' => '123456789'
                        )
                    )
                );

                /*--------------------------------------------------------*/
                /* AUTO UPDATE
                /*--------------------------------------------------------*/
                $this->sections[] = array(
                    'icon'       => 'el-icon-random',
                    'icon_class' => 'el-icon-large',
                    'title'      => __('One Click Update', 'accountant'),
                    'desc'    => __( 'Let us notify you when new versions of this theme are live on ThemeForest! Update with just one button click and forget about manual updates!<br> If you have any troubles while using auto update ( It is likely to be a permissions issue ) then you may want to manually update the theme as normal.', 'accountant' ),
                    'submenu'    => true,
                    'fields'     => array(
                        array(
                            'id'       =>'tf_username',
                            'type'     => 'text',
                            'title'    => __('ThemeForest Username', 'accountant'),
                            'subtitle' => '',
                            'desc'     => __('Enter here your ThemeForest (or Envato) username account (i.e. accountant).', 'accountant'),
                        ),
                        array(
                            'id'       =>'tf_api',
                            'type'     => 'text',
                            'title'    => __('ThemeForest Secret API Key', 'accountant'),
                            'subtitle' => '',
                            'desc'     => __('Enter here the secret api key you have created on ThemeForest. You can create a new one in the Settings > API Keys section of your profile.', 'accountant'),
                        ),
                        array(
                            'id'    => 'info_warning',
                            'type'  => 'info',
                            'title' => __('One Click Update Note: ', 'accountant'),
                            'style' => 'warning',
                            'desc'  => __('If the one click update does not works for you ( ( It is likely to be a permissions issue ) ) then please do manual update or use <a target="_blank" href="https://github.com/envato/envato-wordpress-toolkit">Envato ToolKit</a>. Thanks!', 'accountant')
                        )
                    )
                );

            }

        }

        global $reduxConfig;
        $reduxConfig = new WPaccountant_Options_Config();

        // Retrieve theme option values
        if ( ! function_exists('accountant_option') ) {
            function accountant_option($id, $fallback = false, $key = false ) {
                global $wpc_option;
                if ( $fallback == false ) $fallback = '';
                $output = ( isset($wpc_option[$id]) && $wpc_option[$id] !== '' ) ? $wpc_option[$id] : $fallback;
                if ( !empty($wpc_option[$id]) && $key ) {
                    $output = $wpc_option[$id][$key];
                }
                return $output;
            }
        }
    }
    /**
 * Output site favicon to wp_head hook.
 */

function accountant_admin_head() {
	print '<style>.redux-message.redux-notice {display: none !important;}</style>';
}
add_action( 'admin_head', 'accountant_admin_head' );

/**
 * Add header code hook.
 */
add_action('wp_head','accountant_hook_header_code');

function accountant_hook_header_code() {

	$output = accountant_option('site_header_tracking');

	print  $output;

}

/**
 * Add footer code hook.
 */
add_action('wp_footer','accountant_hook_footer_code');

function accountant_hook_footer_code() {

	$output = accountant_option('site_footer_tracking');

	print   $output;

}



/**
 * Add css hook.
 */
add_action('wp_head','accountant_hook_css');

function accountant_hook_css() {

	$output = '<style type="text/css">'.accountant_option('site_css').'</style>';

	print   $output;

}



function wpaccountant_favicons() {
    $favicons = null;

   if ( accountant_option('site_favicon', '', 'url') ) $favicons .= '
    <link rel="shortcut icon" href="'. esc_url(accountant_option('site_favicon', '', 'url')) .'">';

    if ( accountant_option('site_iphone_icon', '', 'url') ) $favicons .= '
    <link rel="apple-touch-icon" sizes="57x57" href="'. esc_url(accountant_option('site_iphone_icon', '', 'url')) .'">';

    if ( accountant_option('site_iphone_icon', '', 'url') ) $favicons .= '
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="'. esc_url(accountant_option('site_iphone_icon', '', 'url')) .'">';

    if ( accountant_option('site_iphone_icon_retina', '', 'url') ) $favicons .= '
    <link rel="apple-touch-icon" sizes="114x114" href="'. esc_url(accountant_option('site_iphone_icon_retina', '', 'url')) .'">';

    if ( accountant_option('site_ipad_icon', '', 'url') ) $favicons .= '
    <link rel="apple-touch-icon" sizes="72x72" href="'. esc_url(accountant_option('site_ipad_icon', '', 'url')) .'">';

    if ( accountant_option('site_ipad_icon_retina', '', 'url') ) $favicons .= '
    <link rel="apple-touch-icon" sizes="114x114" href="'. esc_url(accountant_option('site_ipad_icon_retina', '', 'url')) .'">';

    echo $favicons;
}
add_action( 'wp_head', 'wpaccountant_favicons' );
