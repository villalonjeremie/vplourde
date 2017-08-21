<?php
/**
 * accontant functions and definitions
 *
 * @package Accontant
 */

function accountant_header_scripts() {
	// Fonts
  wp_enqueue_style( 'accountant_fonts', accountant_g_fonts(), array(), null );

  wp_enqueue_style( 'introloader', get_template_directory_uri(). '/assets/css/introLoader.min.css', array(), '' );
  wp_enqueue_script( 'introloader_js', get_template_directory_uri() . '/assets/js/jquery.introLoader.pack.min.js', array('jquery'), '', true, true );

  wp_enqueue_style( 'bootstrap', get_template_directory_uri(). '/assets/css/bootstrap.css', array(), '' );
  wp_enqueue_style( 'font-awesome', get_template_directory_uri(). '/assets/css/font-awesome.css', array(), '' );
  wp_enqueue_style( 'icomoon', get_template_directory_uri(). '/assets/css/icomoon.css', array(), '' );
  wp_enqueue_style( 'animate', get_template_directory_uri(). '/assets/css/animate.css', array(), '' );
  wp_enqueue_style( 'slick', get_template_directory_uri(). '/assets/slick/slick.css', array(), '' );
  wp_enqueue_style( 'accountant_style', get_template_directory_uri(). '/style.css', array(), '' );
  wp_enqueue_style( 'owl_carousel', get_template_directory_uri(). '/assets/css/owl.carousel.css', array(), '' );

  if(is_404()){
    $postID  = accountant_option('page_404');
    $vc_template_css = get_post_meta( $postID, '_wpb_shortcodes_custom_css', true );
    wp_add_inline_style( 'accountant_style', $vc_template_css );
  }
  //Theme Options
  if ( !accountant_option('google_maps_key') == '' ){ wp_register_script( 'google-maps', 'https://maps.googleapis.com/maps/api/js?key='.accountant_option('google_maps_key'), array( 'jquery' ), null, true ); }
  else { wp_register_script( 'google-maps', 'http://maps.googleapis.com/maps/api/js?sensor=false&amp;language=en', array( 'jquery' ), null, true ); }    

  wp_enqueue_script( 'accountant_loader', get_template_directory_uri() . '/assets/js/loader.js', array('jquery'), null, true );
  wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.js', array('jquery'), null, true );
  wp_enqueue_script( 'classie', get_template_directory_uri() . '/assets/js/classie.js', array('jquery'), null, true );
  wp_enqueue_script( 'owl_carousel', get_template_directory_uri() . '/assets/js/owl.carousel.js', array('jquery'), null, true );
  wp_enqueue_script( 'slick_js', get_template_directory_uri() . '/assets/slick/slick.js', array('jquery'), null, true );
  wp_enqueue_script( 'accountant_loadmore', get_template_directory_uri() . '/assets/js/loadmore.js', array('jquery'), null, true );
  wp_enqueue_script( 'accountant_plugin_js', get_template_directory_uri() . '/assets/js/plugins.js', array('jquery'),  null, true );
  wp_enqueue_script( 'pagenav', get_template_directory_uri() . '/assets/js/jquery.pagenav.js', array('jquery'),  null, true );
  wp_enqueue_script( 'uisearch', get_template_directory_uri() . '/assets/js/uisearch.js', array('jquery'),  null, true );
  wp_enqueue_script( 'accountant_main_js', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), null, true );
  if (is_singular()) wp_enqueue_script('comment-reply');

}
add_action( 'wp_enqueue_scripts', 'accountant_header_scripts', 1000);

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

if ( !is_plugin_active( 'redux/redux.php' ) ) {
	function accountant_option( ) {}
}

/**
 * Comment form hooks.
 */

add_action( 'comment_form_logged_in_after', 'accountant_after_comment_fields' );
add_action( 'comment_form_after_fields', 'accountant_after_comment_fields' );
function accountant_after_comment_fields()
{
	?>
	<div class="row item">
		<div class=" col-md-12 col-sm-12">
			<textarea class="form-control form-control2" placeholder="<?php esc_html_e( 'Message....', 'accountant-wp' );?> "  id="comment" name="comment" aria-required="true"></textarea>
		</div>
	</div>
	<?php
}


// calling google fonts needed for this theme.
if ( ! function_exists( 'accountant_g_fonts' ) ) {
	/**
	 * @return string Google fonts URL for the theme.
	 */
	function accountant_g_fonts() {
		$fonts_url = '';
		$fonts     = array();
		$subsets   = 'latin,latin-ext';

		/* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
		if ( 'off' !== _x( 'on', 'Google font: on or off', 'accountant-wp' ) ) {
			$fonts[] = 'Source+Sans+Pro:400,200,300,600,700,900';
			$fonts[] = 'Roboto:400,100,300,500,700,900';
		}

		if ( $fonts ) {
			$fonts_url = add_query_arg( array(
				'family' => urlencode( implode( '|', $fonts ) ),
				'subset' => urlencode( $subsets ),
			), 'https://fonts.googleapis.com/css' );
		}

		return $fonts_url;
	}
}

/**
 * Content Limit.
 */
/** add this to your function.php child theme to remove ugly short code on excerpt */

/** add by Paolo Rudelli aka Paul Corneille 09-06-2014 */

if(!function_exists('accountant_remove_vc_from_excerpt'))  {
  function accountant_remove_vc_from_excerpt( $excerpt ) {
    $patterns = "/\[[\/]?vc_[^\]]*\]/";
    $replacements = "";
    return preg_replace($patterns, $replacements, $excerpt);
  }
}

/** * Comment reply */
if ( is_singular() ) wp_enqueue_script( "comment-reply" );

/** * Original elision function mod by Paolo Rudelli */

if(!function_exists('accountant_qode_excerpt')) {

/** Function that cuts post excerpt to the number of word based on previosly set global * variable $accountant_word_count, which is defined in qode_set_blog_word_count function */

function accountant_qode_excerpt($limit) {

global $accountant_qode_options_elision, $accountant_word_count, $post;

$accountant_word_count = isset($accountant_word_count) && $accountant_word_count != "" ? $accountant_word_count : $accountant_qode_options_elision['number_of_chars'];

$post_excerpt = $post->post_excerpt != "" ? $post->post_excerpt : strip_tags($post->post_content); $clean_excerpt = strpos($post_excerpt, '...') ? strstr($post_excerpt, '...', true) : $post_excerpt;

/** add by PR */

$clean_excerpt = strip_shortcodes(accountant_remove_vc_from_excerpt($clean_excerpt));

/** end PR mod */

$excerpt_word_array = explode (' ', $clean_excerpt);

$excerpt_word_array = array_slice ($excerpt_word_array, 0, $limit);

$excerpt = implode (' ', $excerpt_word_array).'...'; echo ''.wp_kses_post($excerpt).'';

}

}
function accountant_content($limit) {
  $content = explode(' ', get_the_content(), $limit);
  if (count($content)>=$limit) {
    array_pop($content);
    $content = implode(" ",$content).'&#8230;';
  } else {
    $content = implode(" ",$content);
  }           
  $content = preg_replace('/\[.+\]/','', $content);
  $content = preg_replace('/\[vc_custom_heading text=\"/m','', $content);
  $content = apply_filters('the_content', $content);
  $content = str_replace(']]>', ']]&gt;', $content);
  return $content;
}

function accountant_content_search($content, $limit) {
  $content = explode(' ', $content, $limit);
  if (count($content)>=$limit) {
    array_pop($content);
    $content = implode(" ",$content).'&#8230;';
  } else {
    $content = implode(" ",$content);
  }           
  $content = preg_replace('/\[.+\]/','', $content);
  $content = preg_replace('/\[vc_custom_heading text=\"/m','', $content);
  $content = apply_filters('the_content', $content);
  $content = str_replace(']]>', ']]&gt;', $content);
  return $content;
}

/**
 * Content Limit without points.
 */
function accountant_content_no_points($limit) {
  $content = explode(' ', get_the_content(), $limit);
  if (count($content)>=$limit) {
    array_pop($content);
    $content = implode(" ",$content).'';
  } else {
    $content = implode(" ",$content);
  }           
  $content = preg_replace('/\[.+\]/','', $content);
  $content = apply_filters('the_content', $content);
  $content = str_replace(']]>', ']]&gt;', $content);
  return $content;
}

/**
 * Content Limit without choise text.
 */
function accountant_content_no_elements($limit) {
  $content = explode(' ', get_the_content());
  $new_content = array();
  for ($i=0; $i < count($content); $i++) { 
     if ($i>$limit-2) {
      array_push($new_content, $content[$i]);
    }
  } 
  $content = implode(" ",$new_content);          
  $content = preg_replace('/\[.+\]/','', $content);
  $content = apply_filters('the_content', $content);
  $content = str_replace(']]>', ']]&gt;', $content);
  return $content;
}

/**
 * Breadcrumbs.
 */
function accountant_breadcrumbs_func() {
  echo '<div class="bredcrums">';
  if(function_exists('bcn_display')){
    bcn_display();
  }
  echo '</div>';
}

/**
 * WP Title filter.
 */
add_filter( 'wp_title', 'accountant_wpdocs_hack_wp_title_for_home' );
 
/**
 * Customize the title for the home page, if one is not set.
 *
 * @param string $title The original title.
 * @return string The title to use.
 */
function accountant_wpdocs_hack_wp_title_for_home( $title )
{
  if ( empty( $title ) && ( is_home() || is_front_page() ) ) {
    $title = get_bloginfo();
  }else{    
    $title .= get_bloginfo( 'name', 'display' );
  }
  return $title;
}

/**
 * Search form hooks.
 */
function accountant_my_search_form( ) {
  $form = '<div class="search-main">
          <form role="search" method="get"  action="' . esc_url(home_url( '/' )) . '" >
            <div class="line-search">
              <div class=" col-md-10 col-sm-12 no-padding">
                <input type="text" class="form-control" value="' . get_search_query() . '" name="s"  />
              </div>
              <div class=" col-md-2 col-sm-12 no-padding">
                <input type="submit"  value="search" />
              </div>
            </div>
            <input type="hidden" name="post_type" value="create_chartered" />
          </form>
          </div>';
  return $form;
}

function accountant_header_search_form() {
  $form = '<div id="sb-search" class="sb-search">
              <form role="search" method="get" id="searchform" class="sb-search" action="'.home_url( '/' ).'" >
              <input type="text" class="sb-search-input" placeholder="enter keywords" value="'.get_search_query().'" name="s" id="s" />
              <input type="submit" class="sb-search-submit" id="searchsubmit" value="" />
            </form>
              <span class="search sb-icon-search">
                <i class="fa fa-search"></i>
                <span class="close"></span>
              </span>
              
          </div>';
  return $form;
}

function accountant_header_search_page_form(  ) {
  $form = '<form role="search" method="get"  class="sb-search" action="' . esc_url(home_url( '/' )) . '">
        <input type="text" class="form-control" placeholder="'.esc_html__( 'Search', 'accountant-wp' ).'"
               value="' . get_search_query() . '" name="s" />
        <button type="submit" class="button">
          <i class="fa fa-search"></i>
        </button>
      </form>';
  return $form;
}
add_filter( 'get_search_form', 'accountant_header_search_page_form' );


/**
 * Blog title.
 */
function accountant_blog_title_func() {
  $crumbs = explode("/", esc_url(home_url('/')));
  $output = null;
  $output .= '<div class="bredcrums"><a href="'.esc_url(get_home_url('/')).'">'.esc_html__('Home', 'accountant-wp').'</a>';
  for ($i=1; $i <= count($crumbs)-2; $i++) { 
    $crumb = explode("-",$crumbs[$i]);
    $crumb_result = array();
    foreach ($crumb as $cr) {
      array_push($crumb_result, ucfirst($cr));        
    }
    $crumb_result = implode(' ', $crumb_result);
  }
  // return $output;
  return $crumb_result;
}

/**
 * Menu registration.
 */
function accountant_register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => esc_html__( 'Header Menu', 'accountant-wp' ),
      'header-menu-onepage' => esc_html__( 'Header Menu Onepage', 'accountant-wp' ),
    )
  );
}
add_action( 'init', 'accountant_register_my_menus' );

/**
 * Checking if blog.
 */
function accountant_is_blog () {
  global  $post;
  $posttype = get_post_type($post );
  return ( ((is_archive()) || (is_author()) || (is_category()) || (is_home()) || (is_single()) || (is_tag()) || ($post->post_name == 'blog') || ($post->post_name == 'post'))  ) ? true : false ;
}
/**
 * Add theme support.
 */
add_theme_support( 'automatic-feed-links' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function accountant_register_sidebar(){
	register_sidebar( array(
		'name' => esc_html__( 'Footer 1', 'accountant-wp'),
		'id' => 'footer_1',
		'description'   => esc_html__( 'Widgetized Footer Region 1.', 'accountant-wp'),
	) );

	register_sidebar( array(
		'name' => esc_html__( 'Footer 2', 'accountant-wp'),
		'id' => 'footer_2',
		'description'   => esc_html__( 'Widgetized Footer Region 2.', 'accountant-wp'),
	) );

	register_sidebar( array(
		'name' => esc_html__( 'Footer 3', 'accountant-wp'),
		'id' => 'footer_3',
		'description'   => esc_html__( 'Widgetized Footer Region 3.', 'accountant-wp'),
	) );

	register_sidebar( array(
		'name' => esc_html__( 'Footer 4', 'accountant-wp'),
		'id' => 'footer_4',
		'description'   => esc_html__( 'Widgetized Footer Region 4.', 'accountant-wp'),
	) );


  register_sidebar( array(
    'name' => esc_html__( 'Footer join form', 'accountant-wp'),
    'id' => 'footer_join_form',
    'description'   => esc_html__( 'Widgetized Footer join form region', 'accountant-wp'),
  ) );


  register_sidebar( array(
    'name' => esc_html__( 'Blogging', 'accountant-wp'),
    'id' => 'blogging',
    'description'   => esc_html__( 'Side for blogging', 'accountant-wp'),
  ) );


  register_sidebar( array(
    'name' => esc_html__( 'Sidebar 1', 'accountant-wp'),
    'id' => 'sidebar_1',
    'description'   => esc_html__( 'Default sidebar', 'accountant-wp'),
  ) );

  register_sidebar( array(
    'name' => esc_html__( 'Sidebar Blog', 'accountant-wp'),
    'id' => 'sidebar_blog',
    'description'   => esc_html__( 'Sidebar for blog', 'accountant-wp'),
  ) );


  register_sidebar( array(
    'name' => esc_html__( 'Top Bar Left', 'accountant-wp'),
    'id' => 'top_bar_left',
    'description'   => esc_html__( 'Top Left sidebar', 'accountant-wp'),
  ) );

  register_sidebar( array(
    'name' => esc_html__( 'Top Bar Right', 'accountant-wp'),
    'id' => 'top_bar_right',
    'description'   => esc_html__( 'Top Right sidebar', 'accountant-wp'),
  ) );
  register_sidebar( array(
    'name' => esc_html__( 'Woocommerce Sidebar', 'accountant-wp'),
    'id' => 'woocommerce_sidebar',
    'description'   => esc_html__( 'Woocommerce Sidebar', 'accountant-wp'),
  ) );
}
add_action( 'widgets_init', 'accountant_register_sidebar' );

/**
 * Footer widget responsive block
 */

function footer_widget_responsive_block($sidebar_id){
  $widgets = wp_get_sidebars_widgets();
  $id = $widgets[$sidebar_id][0];
  $wdgtvar = 'widget_'._get_widget_id_base( $id );
  $idvar = _get_widget_id_base( $id );
  $instance = get_option( $wdgtvar );
  $idbs = str_replace( $idvar.'-', '', $id );
  $w_title = $instance[$idbs]['title'];
  if($idbs !== ''){
    if ($w_title == false) {
      $w_title = __('Title', 'accountant');
    }
    echo '<div class="col-sm-12 col-xs-12">
            <div class="dropdown">
              <a data-toggle="dropdown" href="#" class="show-link">'.$w_title.'</a>
              <div class="dropdown-menu" role="menu">';
              if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar($sidebar_id) ) :
              endif;
    echo      '</div>
            </div>
          </div>';
  }
}

/**
 * Loginout hooks
 */
add_filter('accountant_loginout','loginout_text_change');
function accountant_loginout_text_change($text) {
$login_text_before = esc_html__('Log in', 'accountant-wp');
$login_text_after = esc_html__('Sign In', 'accountant-wp');

$logout_text_before = esc_html__('Log out', 'accountant-wp');
$logout_text_after = esc_html__('Sign Off', 'accountant-wp');

$selector = 'class="sing_in"';

$text = str_replace('<a ', '<a '.$selector, $text);
$text = str_replace($login_text_before, $login_text_after ,$text);
$text = str_replace($logout_text_before, $logout_text_after ,$text);
return $text;
}

/**
 * Add post thumbnails size.
 */
if ( function_exists( 'add_image_size' ) ) add_theme_support( 'post-thumbnails' );

function accountant_theme_setup() {
  add_theme_support( 'title-tag' );
  add_image_size( 'accountant_footer-thumb', 140, 140, true );
  add_image_size( 'accountant_post-thumb', 700, 570, true );
}
add_action( 'after_setup_theme', 'accountant_theme_setup' );

/**
 * Add SVG file type.
 */
function accountant_custom_mtypes( $m ){
    $m['svg'] = 'image/svg+xml';
    $m['svgz'] = 'image/svg+xml';
    return $m;
}
add_filter( 'upload_mimes', 'accountant_custom_mtypes' );



/**
 * Automatic theme updates notifications
 *
 */
if ( ! function_exists( 'accountant_updater' ) ) {
  function accountant_updater() {
    global $wpc_option;
    $username = trim( $wpc_option['tf_username'] );
    $api_key  = trim( $wpc_option['tf_api'] );
    if ( ! empty( $username ) && ! empty( $api_key ) ) {
      load_template( get_template_directory() . '/inc/updater/envato-theme-update.php' );

      if ( class_exists( 'Envato_Theme_Updater' ) ) {
        Envato_Theme_Updater::init( $username, $api_key, 'accountant-wp' );
      }
    }
  }
  add_action( 'after_setup_theme', 'accountant_updater' );
}

function accountant_true_load_posts(){
  $args = unserialize(stripslashes($_POST['query']));
  $args['paged'] = $_POST['page'] + 1;
  $args['post_status'] = 'publish';
  $q = new WP_Query($args);
  if( $q->have_posts() ):
    while($q->have_posts()): $q->the_post();
      $title = get_the_title();
      $content = accountant_content(50);
      $permalink = get_the_permalink(); ?>
      <div class="col-sm-12 col-md-6 ">
          <div class="career">
              <h3>
	              <?php print wp_kses_post(get_the_title()); ?></h3>
                  <?php print wp_kses_post(accountant_content(50)); ?>
              <div class="caper-more">
                  <div class="abs-link"><a href="<?php print esc_url(get_the_permalink()); ?>" class="more"><?php esc_html_e('apply now', 'accountant-wp'); ?></a></div>
              </div>
          </div>
      </div>
    <?php
    endwhile;
  endif;
  wp_reset_postdata();
  die();
}
 
 
add_action('wp_ajax_loadmore', 'accountant_true_load_posts');
add_action('wp_ajax_nopriv_loadmore', 'accountant_true_load_posts');


/**
 * Shop products per page
 */

add_filter( 'loop_shop_per_page', 'new_loop_shop_per_page', 20 );

function new_loop_shop_per_page( $cols ) {

  $cols = accountant_option('prod_per_page');
  return $cols;

}

/**
 * Change number or products per row
 */

add_filter('loop_shop_columns', 'loop_columns');
if (!function_exists('loop_columns')) {
  function loop_columns() {
    $columns = accountant_option('prod_page_columns');
    return $columns;
  }
}

/**
 * Change shop products post class
 */

function category_id_class( $classes ) {
  $columns = accountant_option('prod_page_columns');
  $classes[] = 'item-width-'.$columns;
  return $classes;
}
add_filter( 'post_class', 'category_id_class' );

/**
 * Add woo support
 */

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

/**
 * Hide woo add to cart button
 */

add_action( 'woocommerce_after_shop_loop_item', 'remove_add_to_cart_buttons', 1 );

function remove_add_to_cart_buttons() {
  remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart' );
}

/**
 * Hide woo breadcrumbs
 */

add_action( 'init', 'jk_remove_wc_breadcrumbs' );

function jk_remove_wc_breadcrumbs() {
    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
}

/**
 * Hide woo page title
 */

add_filter( 'woocommerce_show_page_title' , 'woo_hide_page_title' );

function woo_hide_page_title() {  
  return false; 
}

/**
 * Hide standard product title
 */

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);

/**
 * Opening div for our content wrapper
 */
add_action('woocommerce_before_main_content', 'iconic_open_div', 5);
 
function iconic_open_div() {
  $page_layout = accountant_option( 'shop_layout' );
  if (is_product()) {
    $page_layout = accountant_option( 'product_layout' );
  }
  if ($page_layout !== 'no-sidebar'):
    echo '<div class=" col-md-4 '.$page_layout.' col-sm-12 side-bar">';
      dynamic_sidebar( 'woocommerce_sidebar' );
    echo '</div>
          <div class=" col-md-8 col-sm-12 no-padding">';
  endif;
}
 
/**
 * Closing div for our content wrapper
 */
add_action('woocommerce_after_main_content', 'iconic_close_div', 50);
 
function iconic_close_div() {
  $page_layout = accountant_option( 'shop_layout' );
  if ($page_layout !== 'no-sidebar'):
    echo '</div>';
  endif;
}

/**
 * Hide classic woo sidebar
 */

remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

/**
 * Enable woo lightbox
 */

add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );

/**
 * Enable/disable product reviews
 */

add_filter( 'woocommerce_product_tabs', 'wcs_woo_remove_reviews_tab', 98 );
function wcs_woo_remove_reviews_tab($tabs) {
  $product_reviews = accountant_option( 'product_reviews' );
  if (!$product_reviews) {
    unset($tabs['reviews']);
  }
  return $tabs;
}

/**
 * Change catalog image size
 */

if (class_exists( 'WooCommerce' ) && !get_option( 'shop_catalog_image_size_changed')) {
  $shop_catalog_image_size = array('width' => '300','height' => '400','crop' => 1);
  update_option( 'shop_catalog_image_size', $shop_catalog_image_size);
  update_option( 'shop_catalog_image_size_changed', 1 );
}

/**
 * Content width.
 */
if ( ! isset( $content_width ) ) $content_width = 1140;
//Load custom header widgets.
get_template_part('/inc/widgets/header-widgets');

//Load custom footer widgets.
get_template_part('/inc/widgets/footer-widgets');

//Load custom sidebar widgets.
get_template_part('/inc/widgets/sidebar-widgets');

//Load custom VC shortcodes.
get_template_part('/inc/widgets/shortcodes');

//Load post metaboxes.
get_template_part('/inc/widgets/metaboxes');

//Load custom metaboxes and fields.
get_template_part('/inc/meta/usage');

//Recomend plugins via TGM activation class
get_template_part('/inc/tgm/plugin-activation');

// Disable Visual Composer registraiton requirements
setcookie('vchideactivationmsg', '1', strtotime('+3 years'), '/');
setcookie('vchideactivationmsg_vc11', (defined('WPB_VC_VERSION') ? WPB_VC_VERSION : '1'), strtotime('+3 years'), '/');

function accountant_my_theme_setup(){
	load_theme_textdomain('accountant-wp', get_template_directory() . '/languages');
}
add_action('after_setup_theme', 'accountant_my_theme_setup');