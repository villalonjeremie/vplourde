<?php
/*
Plugin Name: Post Types +
Plugin URI: http://accountant.azelab.com
Description: Declares a plugin that will create a custom post type, shortcode, taxonomy.
Version: 1.0
Author: Azelab
Author URI: http://azelab.com
*/
?>
<?php
/**
 * Advisor post type registration.
 */
add_action( 'init', 'create_staff' );

function create_staff() {
    register_post_type( 'create_staff',
        array(
            'labels' => array(
                'name' => 'Staff',
                'singular_name' => 'Staff',
                'add_new' => 'Add New Staff',
                'add_new_item' => 'Add New Staff',
                'edit' => 'Edit',
                'edit_item' => 'Edit Staff',
                'new_item' => 'New Staff',
                'view' => 'View',
                'view_item' => 'View Staff',
                'search_items' => 'Search Staff',
                'not_found' => 'No Staff found',
                'not_found_in_trash' => 'No Staff found in Trash',
                'parent' => 'Parent Staff'
            ),
            'public' => true,
            'menu_position' => 15,
            'supports' => array( 'title', 'editor', 'thumbnail'), 
            'taxonomies' => array( 'staff_category'),        
        )
    );
}

add_action( 'init', 'staff_category', 0 );

function staff_category()
{
    register_taxonomy('staff_category',array('cat'),array(
        'hierarchical' => true,
        'label' => 'Staff Categories',
        'singular_name' => 'Staff Category',
        'show_ui' => true,
        'query_var' => true,
    ));
}

/**
 * Testimonials post type registration.
 */
add_action( 'init', 'create_testimonials' );

function create_testimonials() {
    register_post_type( 'testimonials',
        array(
            'labels' => array(
                'name' => 'Testimonials',
                'singular_name' => 'Testimonial',
                'add_new' => 'Add New Testimonial',
                'add_new_item' => 'Add New Testimonial',
                'edit' => 'Edit',
                'edit_item' => 'Edit Testimonial',
                'new_item' => 'New Testimonial',
                'view' => 'View',
                'view_item' => 'View Testimonial',
                'search_items' => 'Search Testimonial',
                'not_found' => 'No Testimonial found',
                'not_found_in_trash' => 'No Testimonial found in Trash',
                'parent' => 'Parent Testimonial'
            ),
            'public' => true,
            'menu_position' => 15,
            'supports' => array( 'title', 'editor', 'thumbnail'), 
            'taxonomies' => array( 'testimonials_advisor_category','testimonials_partners_category','testimonials_client_category'),        
        )
    );
}

add_action( 'init', 'testimonials_advisor_category', 0 );

function testimonials_advisor_category()
{
    register_taxonomy('testimonials_advisor_category',array('cat'),array(
        'hierarchical' => true,
        'label' => 'Advisor Categories',
        'singular_name' => 'Advisor Category',
        'show_ui' => true,
        'query_var' => true,
    ));
}

add_action( 'init', 'testimonials_partners_category', 0 );

function testimonials_partners_category()
{
    register_taxonomy('testimonials_partners_category',array('cat'),array(
        'hierarchical' => true,
        'label' => 'Partner Categories',
        'singular_name' => 'Partner Category',
        'show_ui' => true,
        'query_var' => true,
    ));
}

add_action( 'init', 'testimonials_client_category', 0 );

function testimonials_client_category()
{
    register_taxonomy('testimonials_client_category',array('cat'),array(
        'hierarchical' => true,
        'label' => 'Clients Categories',
        'singular_name' => 'Client Category',
        'show_ui' => true,
        'query_var' => true,
    ));
}

/**
 * Years satistic post type registration.
 */
add_action( 'init', 'years_satistic' );

function years_satistic() {
    register_post_type( 'years_satistic',
        array(
            'labels' => array(
                'name' => 'Years',
                'singular_name' => 'Year',
                'add_new' => 'Add New Year',
                'add_new_item' => 'Add New Year',
                'edit' => 'Edit',
                'edit_item' => 'Edit Year',
                'new_item' => 'New Year',
                'view' => 'View',
                'view_item' => 'View Year',
                'search_items' => 'Search Year',
                'not_found' => 'No Year found',
                'not_found_in_trash' => 'No Year found in Trash',
                'parent' => 'Parent Year'
            ),
            'public' => true,
            'menu_position' => 15,
            'supports' => array( 'title', 'editor'), 
            'register_meta_box_cb' => 'accountant_add_percent_metaboxes',
        )
    );
}

/**
 * Chartered (FAQ) post type registration.
 */
add_action( 'init', 'create_chartered' );

function create_chartered() {
    register_post_type( 'create_chartered',
        array(
            'labels' => array(
                'name' => 'FAQ',
                'singular_name' => 'FAQ',
                'add_new' => 'Add New FAQ',
                'add_new_item' => 'Add New FAQ',
                'edit' => 'Edit',
                'edit_item' => 'Edit FAQ',
                'new_item' => 'New FAQ',
                'view' => 'View',
                'view_item' => 'View FAQ',
                'search_items' => 'Search FAQ',
                'not_found' => 'No FAQ',
                'not_found_in_trash' => 'No FAQ found in Trash',
                'parent' => 'Parent FAQ'
            ),
            'public' => true,
            'menu_position' => 15,
            'supports' => array( 'title', 'editor', 'thumbnail'), 
            'taxonomies' => array( 'chartered_category'),        
        )
    );
}

add_action( 'init', 'chartered_category', 0 );

function chartered_category()
{
    register_taxonomy('chartered_category',array('cat'),array(
        'hierarchical' => true,
        'label' => 'Chartered Categories',
        'singular_name' => 'Charter Category',
        'show_ui' => true,
        'query_var' => true,
    ));
}

/**
 * Services post type registration.
 */
add_action( 'init', 'create_services' );

function create_services() {
    register_post_type( 'services_post',
        array(
            'labels' => array(
                'name' => 'Services',
                'singular_name' => 'Service',
                'add_new' => 'Add New Service',
                'add_new_item' => 'Add New Service',
                'edit' => 'Edit',
                'edit_item' => 'Edit Service',
                'new_item' => 'New Service',
                'view' => 'View',
                'view_item' => 'View Service',
                'search_items' => 'Search Service',
                'not_found' => 'No Service',
                'not_found_in_trash' => 'No Service found in Trash',
                'parent' => 'Parent Service'
            ),
            'public' => true,
            'menu_position' => 15,
            'supports' => array( 'title', 'editor', 'thumbnail'),         
        )
    );
}

/**
 * Capabilities post type registration.
 */
add_action( 'init', 'create_capabilities' );

function create_capabilities() {
    register_post_type( 'capabilities',
        array(
            'labels' => array(
                'name' => 'Capabilities',
                'singular_name' => 'Capabilitie',
                'add_new' => 'Add New Capabilitie',
                'add_new_item' => 'Add New Capabilitie',
                'edit' => 'Edit',
                'edit_item' => 'Edit Capabilitie',
                'new_item' => 'New Capabilitie',
                'view' => 'View',
                'view_item' => 'View Capabilitie',
                'search_items' => 'Search Capabilitie',
                'not_found' => 'No Capabilitie',
                'not_found_in_trash' => 'No Capabilitie found in Trash',
                'parent' => 'Parent Capabilitie'
            ),
            'public' => true,
            'menu_position' => 15,
            'supports' => array( 'title', 'editor', 'thumbnail'),       
        )
    );
}

/**
 * Career post type registration.
 */
add_action( 'init', 'create_career' );

function create_career() {
    register_post_type( 'career_post',
        array(
            'labels' => array(
                'name' => 'Careers',
                'singular_name' => 'Career',
                'add_new' => 'Add New Career',
                'add_new_item' => 'Add New Career',
                'edit' => 'Edit',
                'edit_item' => 'Edit Career',
                'new_item' => 'New Career',
                'view' => 'View',
                'view_item' => 'View Career',
                'search_items' => 'Search Career',
                'not_found' => 'No Career',
                'not_found_in_trash' => 'No Career found in Trash',
                'parent' => 'Parent Career'
            ),
            'public' => true,
            'menu_position' => 15,
            'supports' => array( 'title', 'editor', 'thumbnail'),       
        )
    );
}

/**
 * Cases post type registration.
 */
add_action( 'init', 'create_cases' );

function create_cases() {
    register_post_type( 'cases_post',
        array(
            'labels' => array(
                'name' => 'Cases',
                'singular_name' => 'Case',
                'add_new' => 'Add New Case',
                'add_new_item' => 'Add New Case',
                'edit' => 'Edit',
                'edit_item' => 'Edit Case',
                'new_item' => 'New Case',
                'view' => 'View',
                'view_item' => 'View Case',
                'search_items' => 'Search Case',
                'not_found' => 'No Case',
                'not_found_in_trash' => 'No Case found in Trash',
                'parent' => 'Parent Case'
            ),
            'public' => true,
            'menu_position' => 15,
            'supports' => array( 'title', 'editor', 'thumbnail'),       
        )
    );
}

/*------------------------------------------------------*/
/* STAFF
/*------------------------------------------------------*/
function staff( $atts ) {
 extract( shortcode_atts( array(
     'category' => '',
     'max_qty' => '',
     'carusel_items' => '',
     'style' => '',
     'disable_links' => '',
     'show_title' => '',
     'show_description' => '',
     'show_read_more' => '',
 ), $atts ) );
 $staff = new WP_Query(array(
     'post_type'=> 'create_staff',
     'tax_query' => array(
         'relation' => 'AND',                  
           array(
             'taxonomy' => 'staff_category',
             'field' => 'slug',
             'terms' => array(esc_attr($category)),
             'include_children' => false,
             'operator' => 'IN'
         ),
     ),
     'showposts' => esc_attr($max_qty),
     'order' => 'ASC',
     'orderby'   => 'meta_value_num',
     'meta_key'  => 'staff_order',
 ));
 $output = null;
 $style = esc_attr($style);
 $show_title_val = esc_attr($show_title);
 $show_description_val = esc_attr($show_description);
 $show_read_more = esc_attr($show_read_more);
 $carusel_items = esc_attr($carusel_items);
 $disable_links = esc_attr($disable_links);
 
 if (empty($carusel_items)):
    $carusel_items = 2;
 endif;

    if ($carusel_items == 1):
        $boot_class = '12';
    elseif($carusel_items == 2):
        $boot_class = '6';
    elseif($carusel_items == 3):
        $boot_class = '4';
    elseif($carusel_items == 4):
        $boot_class = '3';
    endif;

 if($style == 'first'):
    if($staff->have_posts()): 
         $output .=  '<div id="own-advisor-box" class="list-advisor block-1">';
         while($staff->have_posts()): $staff->the_post();
             $src = wp_get_attachment_image_src( get_post_thumbnail_id(), array(320,240), false, '' );
             $title = get_the_title();
             $content = accountant_content(20);
             $permalink = get_the_permalink();
             $staff_name = get_post_meta( get_the_ID(), 'staff_name', true );
             $output .= '<div class="item">';
             $output .= '<div class="photo-advisor photo-user"><img src="'.$src[0].'" alt="" title="" />';
             $output .= '<div class="hover-user">
                            <div class="table-user">
                                <div class="in-block-ser">
                                    <div class="title-user">';
                                        if($disable_links == true):
                                            $output .= '<h3>'.$staff_name.'</h3>';
                                        else:
                                            $output .= '<h3><a href="'.$permalink.'">'.$staff_name.'</a></h3>';
                                        endif; 
                if ($show_title_val == true):  
                    $output .=                              '<p>'.$title.'</p>';
                endif;                                                        
             $output .=             '</div>
                                </div>
                            </div>
                        </div>
                    </div>';
            $output .= '<div class="post-advisor">'; 
            if ($show_title_val == true): 
                if($disable_links == true):
                    $output .= '<h3>'.$title.'</h3>';
                 else:
                    $output .= '<h3><a href="'.$permalink.'" class="more">'.$title.'</a></h3>';
                 endif;           
            endif;
            if ($show_description_val == true): 
                $output .= ''.$content.'';
            endif;
            if ($show_read_more == true && $disable_links != true):
                $output .= '<div><a href="'.$permalink.'" class="more">'.__('Read more', 'accountant-wp').' <i class="fa fa-long-arrow-right"></i></a></div>';
            endif;
             $output .= '</div></div>';      
         endwhile;
         $output .= '</div>';
    endif;
    wp_reset_postdata();
    elseif ($style == 'second'):
        if($staff->have_posts()): 
            $output .=  '<div class="row block-2">';
            while($staff->have_posts()): $staff->the_post();
                $src = wp_get_attachment_image_src( get_post_thumbnail_id(), array(320,240), false, '' );
                $title = get_the_title();
                $content = accountant_content(20);
                $permalink = get_the_permalink();
                $staff_name = get_post_meta( get_the_ID(), 'staff_name', true );
                $output .= '<div class="col-sm-6 col-xs-12 height-marg col-md-'.$boot_class.' col-lg-'.$boot_class.'"><div>';
                $output .= '<div class="photo-advisor photo-user"><img src="'.$src[0].'" alt="" title="" />';
                $output .= '<div class="hover-user">
                                <div class="table-user">
                                    <div class="in-block-ser">
                                        <div class="title-user">';
                                        if($disable_links == true):
                                            $output .= '<h3>'.$staff_name.'</h3>';
                                        else:
                                            $output .= '<h3><a href="'.$permalink.'">'.$staff_name.'</a></h3>';
                                        endif; 
                if ($show_title_val == true):  
                    $output .=                              '<p>'.$title.'</p>';
                endif;                                                        
                    $output .=              '</div>
                                        </div>
                                    </div>
                                </div>';
                $output .= '</div>'; 
                $output .= '<div class="post-advisor">';            
                if ($show_title_val == true):
                    if($disable_links == true):
                        $output .= '<h3 class="bold">'.$title.'</h3>';
                     else:
                        $output .= '<h3 class="bold"><a href="'.$permalink.'" class="more">'.$title.'</a></h3>';
                     endif;           
                endif;
                if ($show_description_val == true): 
                    $output .= ''.$content.'';
                endif;
                if ($show_read_more == true && $disable_links != true):
                    $output .= '<div><a href="'.$permalink.'" class="more">'.__('Read more', 'accountant-wp').' <i class="fa fa-long-arrow-right"></i></a></div>';
                endif;
                $output .= '</div></div></div>';      
            endwhile;
            $output .= '</div>';
        endif; wp_reset_postdata();
    elseif ($style == 'third'):
        if($staff->have_posts()): 
            $output .= '<div class="profile"><div class="row block-3">';
            while($staff->have_posts()): $staff->the_post();
                $image = wp_get_attachment_image( get_post_thumbnail_id($staff->ID), 'post-thumb' );
                $title = get_the_title();
                $content = accountant_content(15);
                $permalink = get_the_permalink();
                $staff_name = get_post_meta( get_the_ID(), 'staff_name', true );
                $staff_facebook = get_post_meta( get_the_ID(), 'staff_facebook', true );
                $staff_twitter = get_post_meta( get_the_ID(), 'staff_twitter', true );
                $staff_linkedin = get_post_meta( get_the_ID(), 'staff_linkedin', true );
                $staff_mail = get_post_meta( get_the_ID(), 'staff_mail', true );
                $output .= '<div class="col-xs-12 col-md-4 col-lg-'.$boot_class.' col-sm-6">
                                <div class="user-post">
                                    <div class="photo-user">
                                        '.$image.'
                                        <div class="hover-user">
                                            <div class="table-user">
                                               
                                                    <div class="title-user">';
                                                    if($disable_links == true):
                                                        $output .= '<h3>'.$staff_name.'</h3>';
                                                    else:
                                                        $output .= '<h3><a href="'.$permalink.'">'.$staff_name.'</a></h3>';
                                                    endif; 
                if ($show_title_val == true):  
                    $output .=                              '<p>'.$title.'</p>';
                endif;
                $output .=                      '</div>
                                                    <div class="soc-box">';
                                                        if(!empty($staff_facebook)):
                                                            $output .= '<a class="facebook" href="'.$staff_facebook.'"><i class="fa fa-facebook"></i></a>';
                                                        endif;
                                                        if(!empty($staff_twitter)):
                                                            $output .= '<a class="twitter" href="'.$staff_twitter.'"><i class="fa fa-twitter"></i></a>';
                                                        endif;
                                                        if(!empty($staff_linkedin)):
                                                            $output .= '<a class="linkedin" href="'.$staff_linkedin.'"><i class="fa fa-linkedin"></i></a>';
                                                        endif;
                                                        if(!empty($staff_mail)):
                                                            $output .= '<a class="mail" href="mailto:'.$staff_mail.'"><i class="fa fa-envelope"></i></a>';
                                                        endif;
                                                        
                $output .=                          '</div> 
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="title-user">';
                if($disable_links == true):
                    $output .=              '<h3>'.$staff_name.'</h3>';
                else:
                    $output .=              '<h3><a href="'.$permalink.'">'.$staff_name.'</a></h3>';
                endif;
                $output .=              '<p>'.$title.'</p>
                                    </div>
                                </div>
                            </div>';
            endwhile;
            $output .= '</div></div>';    
        endif; wp_reset_postdata();
    endif;
    return $output;
}
add_shortcode( 'staff', 'staff' );

/*------------------------------------------------------*/
/* TESTIMONIALS
/*------------------------------------------------------*/
function testimonials_advisor( $atts ) {
    extract( shortcode_atts( array(
        'testimonial_type' => '',
        'category' => '',
        'max_qty' => '',
    ), $atts ) );
    $testimonials = new WP_Query(array(
        'post_type'=> 'testimonials',
        'tax_query' => array(
            'relation' => 'AND',                  
              array(
                'taxonomy' => esc_attr($testimonial_type),
                'field' => 'slug',
                'terms' => array(esc_attr($category)),
                'include_children' => false,
                'operator' => 'IN'
            ),
        ),
        'showposts' => esc_attr($max_qty),
        'order' => 'ASC',
    ));
    $output = null;

    if($testimonials->have_posts()):
        if (esc_attr($testimonial_type) == 'testimonials_advisor_category'): 
            $output .= '<div id="owl-advisor" class="owl-carousel comments-icon">';
            while($testimonials->have_posts()): $testimonials->the_post(); 
                $output .= '<div class="item">'.accountant_content(20).'</div>';
            endwhile; 
            $output .= '</div>';
        elseif (esc_attr($testimonial_type) == 'testimonials_partners_category'):
            $output .= '<div id="owl-partners" class="owl-carousel comments-icon">';
            while($testimonials->have_posts()): $testimonials->the_post(); 
                $output .= '<div class="item">'.accountant_content(20);
                $output .= '<p><strong class="name">- '.get_the_author().'</strong></p>';
                $output .= '</div>';        
            endwhile; 
            $output .= '</div>'; 
        elseif (esc_attr($testimonial_type) == 'testimonials_client_category'): 
            $output .=  '<div class="client-says">
                            <div class="photos">
                                <div class="slick-slider slider-nav">';
            while($testimonials->have_posts()): $testimonials->the_post();
                $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), "large"); 
                $output .=          '<div><img src="'.$thumbnail[0].'" alt="" title="" /></div>';       
            endwhile; 
            $output .= '        </div>
                            </div>
                            <div class="slick-slider slider-for">';
            while($testimonials->have_posts()): $testimonials->the_post(); 
                $output .=      '<div>
                                    <div class="cooment-client">
                                        '.accountant_content(20).'
                                    </div>
                                </div>';        
            endwhile;
            $output .=      '</div>
                        </div>';
        endif;  
    endif; wp_reset_postdata();

    return $output;
}
add_shortcode( 'testimonials_advisor', 'testimonials_advisor' );

/*------------------------------------------------------*/
/* COMPANY RESULTS
/*------------------------------------------------------*/
function company_results( $atts ) {
    extract( shortcode_atts( array(
        'title' => '',
        'count' => '',
        'icon' => 'icon',
    ), $atts ) );
        $output = null;
        global $post;
        $postID = $post->ID;
        $border = get_post_meta( $postID, '_wpc_enable_page_svg_borders', true );
        $icon = wp_get_attachment_image_src(esc_attr($icon), "large");
        $output .=  '<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">';
        if ($border == true):
            $output .=  '<div class="boxer-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%"><line class="top" x1="0" y1="0" x2="100%" y2="0"/><line class="left" x1="0" y1="100%" x2="0" y2="-920"/><line class="bottom" x1="100%" y1="100%" x2="0" y2="100%"/><line class="right" x1="100%" y1="0" x2="100%" y2="1380"/></svg>';
        else:
            $output .=  '<div class="boxer-icon no-svg-border">';
        endif;
        $output .=  '<div class="boxe-center">
                        <div class="boxe-tab">
                            <div class="icon">
                                <div class="line-box">
                                    <div class="cent-cent">
                                        <img src="'.$icon[0].'" alt="" title="" />
                                    </div>
                                </div>
                            </div>  
                            <strong class="title-number">'.esc_attr($count).'</strong>
                            <strong class="name">'.esc_attr($title).'</strong>
                        </div>
                    </div>
                </div>
            </div>';
    return $output;
}
add_shortcode( 'company_results', 'company_results' );

/*------------------------------------------------------*/
/* SERVICES
/*------------------------------------------------------*/
function services( $atts ) {
    extract( shortcode_atts( array(
        'max_count' => '',
        'style' => '',
        'border' => '',
        'show_icon' => '',
        'show_description' => '',
        'title_link' => '',
        'image_link' => '',
    ), $atts ) );
    $output = null;
    $services = new WP_Query(array(
        'post_type'=> 'services_post',
        'showposts' => esc_attr($max_count),
        'order' => 'ASC',
        'orderby' => 'title',
        'orderby'   => 'meta_value_num',
        'meta_key'  => 'services_order',
    ));
    global $post;
    $postID = $post->ID;
    $border = get_post_meta( $postID, '_wpc_enable_page_svg_borders', true );
    if (esc_attr($style) == 'first'):
        $output .= '<div class="row block-1">';
        while($services->have_posts()): $services->the_post();
            $icon   = get_post_meta( get_the_ID(), 'services_icon', true );
            $title = get_the_title();
            $permalink = get_the_permalink();
            $services_previous = get_post_meta( get_the_ID(), 'services_previous', true );
            $output .= '<div class="col-xs-12 col-md-4 col-sm-12">';
            if ($border == true):
                $output .=      '<div class="services-box box">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%"><line class="top" x1="0" y1="0" x2="900" y2="0"/><line class="left" x1="0" y1="100%" x2="0" y2="-920"/><line class="bottom" x1="100%" y1="100%" x2="-600" y2="100%"/><line class="right" x1="100%" y1="0" x2="100%" y2="1380"/></svg>';
            else:
                $output .=      '<div class="services-box box no-svg-border">';
            endif;
                if (esc_attr($show_icon) == true):
                    if (esc_attr($image_link) == true):
                        $output .= '<div class="icons"><a href="'.$permalink.'"><img src="'.$icon.'" alt="" title="" /></a></div>';
                    else:
                        $output .= '<div class="icons"><img src="'.$icon.'" alt="" title="" /></div>';
                    endif;
                endif;
                if (esc_attr($title_link) == true):
                    $output .= '<h4><a href="'.$permalink.'">'.$title.'</a></h4>';
                else:
                    $output .= '<h4>'.$title.'</h4>';
                endif;
                if (esc_attr($show_description) == true):
                    $output .= '<p>'.$services_previous.'</p>';
                endif;
                $output .= '<div class="more"><a href="'.$permalink.'">'.__('Read More', 'accountant-wp').' <i class="fa fa-long-arrow-right"></i></a></div>';
            $output .=  '</div></div>';
        endwhile;
        $output .= '</div>';
    elseif (esc_attr($style) == 'second'):
        $output .= '<div class="main-services-b2">
                        <div>
                            <div class="row block-2">';
        while($services->have_posts()): $services->the_post();
            $title = get_the_title();
            $permalink = get_the_permalink();
            $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), "large");
            $icon   = get_post_meta( get_the_ID(), 'services_icon', true );
            $services_previous = get_post_meta( get_the_ID(), 'services_previous', true );
            $output .= '<div class="col-sm-6 col-md-4 col-xs-12">
                            <div class="services-boxer">
                                <div class="photo-serv">';
                                    if (esc_attr($image_link) == true):
                                        $output .= '<div class="icons"><span class="shadows"></span><a href="'.$permalink.'"><img src="'.$thumbnail[0].'" alt="" title="" /></a></div>';
                                    else:
                                        $output .= '<div class="icons"><img src="'.$thumbnail[0].'" alt="" title="" /></div>';
                                    endif;                                   
            $output .=      '</div>
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-xs-12">
                                        <h3 '; 
                                        if (esc_attr($show_icon) == true): $output .= 'style="background: url('.$icon.') no-repeat 0 50%;background-size:auto 18px;"';
                                        else:
                                            $output .= 'class="icon-none"';
                                        endif;
            if (esc_attr($title_link) == true):
                $output .= '><a href="'.$permalink.'">'.$title.'</a></h3>';
            else:
                $output .= '>'.$title.'</h3>';
            endif;                           
            $output .=                  '</div>
                                </div>';
                                if (esc_attr($show_description) == true):
                                    $output .= '<p>'.$services_previous.'</p>';
                                endif;
            $output .=      '</div>
                        </div>';
        endwhile;
        $output .=          '</div>
                        </div>
                    </div>';
    elseif (esc_attr($style) == 'third'):
        $output .= '<div class="row block-3">';
        while($services->have_posts()): $services->the_post();
            $title = get_the_title();
            $permalink = get_the_permalink();
            $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), "large");
            $services_previous = get_post_meta( get_the_ID(), 'services_previous', true );
            $output .=  '<div class="col-xs-12 col-md-6 col-sm-12">
                            <div class="post-advisor">';
                                
                                if (esc_attr($image_link) == true):
                                    $output .= '<div class="photo-advisor">
                                                    <a href = "'.$permalink.'"><img src="'.$thumbnail[0].'" alt="" title=""></a>
                                                </div>';
                                else:
                                    $output .= '<div class="photo-advisor">
                                                    <img src="'.$thumbnail[0].'" alt="" title="">
                                                </div>';
                                endif;
                                if (esc_attr($title_link) == true):
                                    $output .= '<div class="serv-title"><h3><a href="'.$permalink.'">'.$title.'</a></h3></div>';
                                else:
                                    $output .= '<div class="serv-title"><h3>'.$title.'</h3></div>';
                                endif;
                                if (esc_attr($show_description) == true):
                                    $output .= '<p>'.$services_previous.'</p>';
                                endif;
            $output .=      '<div>
                                    <a href="'.$permalink.'" class="more">'.__('Read More', 'accountant-wp').' <i class="fa fa-long-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>';
        endwhile;
        $output .=  '</div>';
    elseif (esc_attr($style) == 'fourth'):
        $output .= '<div class="main-services-b2">
                        <div>
                            <div class="row block-4">';
        while($services->have_posts()): $services->the_post();
            $title = get_the_title();
            $permalink = get_the_permalink();
            $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), "large");
            $icon   = get_post_meta( get_the_ID(), 'services_icon', true );
            $services_previous = get_post_meta( get_the_ID(), 'services_previous', true );
            $output .= '<div class="col-sm-6 col-md-4 col-xs-12">
                            <div class="services-boxer">
                                <div class="photo-serv">';
                                    if (esc_attr($image_link) == true):
                                        $output .= '<div class="icons"><a href="'.$permalink.'"><span class="shadows"></span><img src="'.$thumbnail[0].'" alt="" title="" /></a></div>';
                                    else:
                                        $output .= '<div class="icons"><img src="'.$thumbnail[0].'" alt="" title="" /></div>';
                                    endif;                                   
            $output .=      '</div>
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-xs-12">
                                        <h3 '; 
                                        if (esc_attr($show_icon) == true): $output .= 'style="background: url('.$icon.') no-repeat 0 50%;background-size:auto 18px;"';
                                        else:
                                            $output .= 'class="icon-none"';
                                        endif;
            if (esc_attr($title_link) == true):
                $output .= '><a href="'.$permalink.'">'.$title.'</a></h3>';
            else:
                $output .= '>'.$title.'</h3>';
            endif;                           
            $output .=                  '</div>
                                </div>';
                                if (esc_attr($show_description) == true):
                                    $output .= '<p>'.$services_previous.'</p>';
                                endif;
            $output .=      '</div>
                        </div>';
        endwhile;
        $output .=          '</div>
                        </div>
                    </div>';
        endif; 
        return $output;
}
add_shortcode( 'services', 'services' );

/*------------------------------------------------------*/
/* YEARS STATISTIC
/*------------------------------------------------------*/
function statistic( $atts ) {
    extract( shortcode_atts( array(
        'style' => '',
        'count' => '',
    ), $atts ) );
    $crumbs = explode("/",$_SERVER["REQUEST_URI"]);
    $output = null;
    wp_reset_query();
    global $post;
    $postID = $post->ID;
    $border = get_post_meta( $postID, '_wpc_enable_page_svg_borders', true );

    $years = new WP_Query(array(
        'post_type'=> 'years_satistic',
        'showposts' => esc_attr($count),
        'order' => 'ASC',
        'orderby'   => 'meta_value_num',
        'meta_key'  => 'years_order',
    ));
    $count = $years->post_count;
    if($years->have_posts()): 
        if (esc_attr($style) == 'first'):
            $output .= '<div class="row"><div class="col-xs-12 col-md-6 col-sm-12"><div class="box-percent">';
            $k = 1;
            while($years->have_posts()): $years->the_post(); 
                $percent = get_post_meta(get_the_ID(), '_percent', true);
                $active_class = ($k == $count) ? 'blue' : '' ;
                $output .= '<div class="years-percent  '.$active_class.' year_box_'.$k.'" data-years="year_box_'.$k.'"><span class="percent">'.$percent.'%</span>
                                <span class="text-year '.$active_class.' year_box_'.$k.'" data-years="year_box_'.$k.'" style="height:'.$percent.'%"></span>
                            </div>';
                $k++;
            endwhile; 
            $output .= '</div>';
            $output .= '<div class="border-top-box">';
            $j = 1;
            while($years->have_posts()): $years->the_post(); 
                $title = get_the_title();
                $active_class = ($j == $count) ? 'blue-border' : '' ;
                $output .= '<div class="years-box '.$active_class.' year_box_'.$j.'" data-years="year_box_'.$j.'">
                                <span class="text-year">'.$title.'</span>
                            </div>';
            $j++;
            endwhile; 
            $output .= '</div>
                        </div>';
            $output .= '<div class="col-xs-12 col-md-1 col-sm-12">&nbsp;</div>';
            $output .= '<div class="col-xs-12 col-md-5 col-sm-12">
                            <div class="right-years-box">';
            $i = 1;
            while($years->have_posts()): $years->the_post();
                $title = get_the_title();
                $content = accountant_content(70);
                $permalink = get_the_permalink();
                $active_class = ($i == $count) ? 'active' : '' ;
                $output .= '<div class="years '.$active_class.' year_box_'.$i.'">
                                <div class="over">
                                    <h3 class="col-xs-12 col-md-6 col-sm-12">'.$title.'</h3>
                                </div>
                                '.$content.'
                                <div>
                                    <a href="'.$permalink.'" class="more">'.__('Read More', 'accountant-wp') .' <i class="fa fa-long-arrow-right"></i></a>
                                </div>
                            </div>';
            $i++;                       
            endwhile; 
            $output .= '</div></div></div>';
        elseif (esc_attr($style) == 'second'):
            $output .= '<div class="main-history">
                <div>
                    <div class="row">';
            while($years->have_posts()): $years->the_post(); 
                $title = get_the_title();
                $content = strip_tags(accountant_content(12));
                $permalink = get_the_permalink();   
                $output .= '<div class="col-sm-12 col-md-4 col-xs-12">';
                if($border == true):
                    $output .=      '<div class="services-box none-marg box">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%"><line class="top" x1="0" y1="0" x2="900" y2="0"/><line class="left" x1="0" y1="100%" x2="0" y2="-920"/><line class="bottom" x1="100%" y1="100%" x2="-600" y2="100%"/><line class="right" x1="100%" y1="0" x2="100%" y2="1380"/></svg>';
                else:
                    $output .=      '<div class="services-box none-marg box no-svg-border">';
                endif;
                $output .=      '<h4>'.$title.'</h4>
                                <p>'.$content.'</p>
                                <div class="more">
                                    <a href="'.$permalink.'">'.__('Read More', 'accountant-wp').' <i class="fa fa-long-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>';
            endwhile; 
                $output .= '</div>
                </div>
            </div>';
        endif;

    endif; wp_reset_postdata();
    return $output;
}
add_shortcode( 'statistic', 'statistic' );

/*------------------------------------------------------*/
/* BLOG POSTS
/*------------------------------------------------------*/
function blog_posts( $atts ) {
    extract( shortcode_atts( array(
        'style' => '',
        'carusel_items' => '',
        'max_qty' => '',
    ), $atts ) );

    global $post;
    $postID = $post->ID;
    $page_layout = get_post_meta( $postID, '_wpc_page_layout', true );
    $carusel_items = esc_attr($carusel_items);
    $blog_post_count = accountant_option('blog_post_count');
    $blog_page_title = accountant_option('blog_page_title');

    $blog_show_comments = accountant_option('blog_show_comments');
    $blog_show_date = accountant_option('blog_show_date');
    $blog_show_category = accountant_option('blog_show_category');
    $blog_read_more = accountant_option('blog_read_more');
    $blog_title_linkable = accountant_option('blog_title_linkable');
    $blog_image_linkable = accountant_option('blog_image_linkable');
    $blog_single_author = accountant_option('blog_single_author');

    $output = null;
    if (esc_attr($style) == 'first'):
            global $post;
            $postID = $post->ID;
            $page_layout = get_post_meta( $postID, '_wpc_page_layout', true );

            $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
            $sticky_posts = get_option( 'sticky_posts' );
            $blog_posts = new WP_Query( apply_filters( 'widget_posts_args', array(
                'posts_per_page' => $blog_post_count,
                'post_status'         => 'publish',
                'ignore_sticky_posts' => 0,
                'showposts' => esc_attr($max_qty),
                'paged' => $paged
            ) ) );
            if($blog_posts->have_posts()): 
                $output .= '<div class="col-xs-12 col-md-12 col-sm-12">';
             ?>
            <?php   while($blog_posts->have_posts()): $blog_posts->the_post();
                    $date_month = get_the_time('M'); 
                    $date_day   = get_the_time('d');
                    $author_posts_link = get_the_author_link();
                    $comments_link = get_comments_link();
                    $comments_number = get_comments_number();
                    $post_categories = wp_get_post_categories( get_the_ID() );
                    $category_link = get_category_link($post_categories);
                    $category_name = get_cat_name($post_categories);

                    $boot_class = '4';
                    $full_title = '';
            ?>
            <?php 
                if ($carusel_items == 1):
                    $output .= '<div class="col-xs-12 col-md-12 col-sm-12 blog-height">';
                elseif ($carusel_items == 2):
                    $output .= '<div class="col-xs-12 col-md-6 col-sm-6 blog-height">';
                elseif ($carusel_items == 3):
                    $output .= '<div class="col-xs-12 col-md-4 col-sm-4 blog-height">';
                    if ($page_layout == 'right-sidebar' || $page_layout == 'left-sidebar'):
                        $boot_class = '12 blog-height';
                        $full_title = 'full-width-title';
                    endif;
                elseif ($carusel_items == 4):
                    $output .= '<div class="col-xs-12 col-md-3 col-sm-6 blog-height">';
                    if ($page_layout == 'right-sidebar' || $page_layout == 'left-sidebar'):
                        $boot_class = '12 blog-height';
                        $full_title = 'full-width-title';
                    endif;
                endif;
            $output .= '<div class="item">
                        <div class="post-advisor">
                            <div class="photo-advisor">';
            if ($blog_show_date == true): 
                $output .= '<span class="date-photo">';               
                $output .=      '<span class="line-date">'.$date_day.'</span>
                                <span class="line-date">'.$date_month.'</span>';
                $output .= '</span>';                
            endif;
                                    $image = wp_get_attachment_image( get_post_thumbnail_id($blog_posts->ID), 'post-thumb' );
                                    if ($blog_image_linkable == true):
                                        $output .= '<a href="'.get_permalink().'">'.$image.'</a>';
                                    else:
                                        $output .= $image;
                                    endif;
                            if (is_sticky($blog_posts->ID)) : $sticky = 'blue-border'; else: $sticky = ''; endif;
                            $output .= '</div>';                            
                            $output .= '<div class="title-blog '.$sticky.'">';
                            if ($blog_page_title == true):  
                                if ($blog_title_linkable == true):
                                    $output .= '<h4><a href="'.get_permalink().'">'.get_the_title().'</a></h4>';
                                else:
                                    $output .= '<h4>'.get_the_title().'</h4>'; 
                                endif;
                            endif;
                            $output .=  '</div>';
                            $output .= '<div class="boxes-blog '.$full_title.'">';
                                    if($blog_single_author == true):
                                        $output .= ''.$author_posts_link.' <span>/</span>';
                                    endif;
                                    if($blog_show_category == true):
                                        $output .= '<a href="'.$category_link.'">'.$category_name.'</a> <span>/</span>';
                                    endif;
                                    if ($blog_show_comments == true):
                                        $output .= '<a href="'.$comments_link.'">'.$comments_number.' Comments</a>';
                                    endif;                                
                            $output .= '</div>';
                            $output .= '<p>'.strip_tags(accountant_content(25), 'img').'</p>';
                $output .=  '</div>
                    </div>
                </div>';                                         
                endwhile;
                paginate_comments_links();
                $res = paginate_links(array(
                    'base' => str_replace( $big = 999999999, '%#%', get_pagenum_link( $big ) ),
                    'current' => max( 1, get_query_var('paged') ),
                    'total' => $blog_posts->max_num_pages,
                    'show_all' => true,
                    'prev_text'    => __('&#8592; Prev', 'accountant-wp'),
                    'next_text'    => __('Next &#8594;', 'accountant-wp'),
                ));
                $res = str_replace( '/page/1', '', $res );
                $output .= '<div class="wp-pagenevi">'.$res.'</div>';
                $output .= '</div>';
                $output .= '<script type="text/javascript">jQuery(".main.container").addClass("main-category")</script>';
            endif;
    elseif (esc_attr($style) == 'second'):
        $blog_posts = new WP_Query( apply_filters( 'widget_posts_args', array(
            'post_status'         => 'publish',
            'posts_per_page'      => -1,
        ) ) );
        if ($carusel_items == 3 || $carusel_items == 4):
            $boot_class = '12';
        else:
            $boot_class = '4';
        endif;
        if($blog_posts->have_posts()): 
            $output .= '<div id="own-blog-box" class="list-advisor list-blog">';
            while($blog_posts->have_posts()): $blog_posts->the_post();
                $day_link = get_day_link('', '', '');
                $date_day = get_the_date( 'j');
                $date_month = get_the_date( 'M');
                $author_posts_link = get_the_author_link();
                $comments_link = get_comments_link();
                $comments_number = get_comments_number();
                $the_title = get_the_title();
                $permalink = get_the_permalink();
                $post_categories = wp_get_post_categories( get_the_ID() );
                $category_link = get_category_link($post_categories);
                $category_name = get_cat_name($post_categories);

                $output .= '<div class="item">
                                    <div class="post-advisor">';
                if ($blog_image_linkable == true):
                    $output .= '<div class="photo-advisor">
                                <span class="date-photo">';
                    if ($blog_show_date == true):                
                        $output .=      '<span class="line-date">'.$date_day.'</span>
                                        <span class="line-date">'.$date_month.'</span>';
                    endif;
                    $output .=      '</span>
                                <a href="'.$permalink.'">'.wp_get_attachment_image( get_post_thumbnail_id($blog_posts->ID), 'post-thumb' ).'</a>
                    </div>';
                else:
                    $output .= '<div class="photo-advisor">'.wp_get_attachment_image( get_post_thumbnail_id($blog_posts->ID), 'post-thumb' ).'</div>';
                endif;                    
                
                $output .= '<div class="title-blog">';
                if ($blog_page_title == true):  
                    if ($blog_title_linkable == true):
                        $output .= '<h4><a href="'.get_permalink().'">'.get_the_title().'</a></h4>';
                    else:
                        $output .= '<h4>'.get_the_title().'</h4>'; 
                    endif;
                endif;
                $output .=  '</div>';
                
                $content = strip_tags(accountant_content(10));
                if (empty($content)):
                    $content = strip_tags(accountant_content(27));
                else:
                    $content = strip_tags(accountant_content(17));
                endif;
                $output .= '<div class="boxes-blog">';
                    if($blog_single_author == true):
                        $output .= ''.$author_posts_link.' <span>/</span>';
                    endif;
                    if($blog_show_category == true):
                        $output .= '<a href="'.$category_link.'">'.$category_name.'</a> <span>/</span>';
                    endif;
                    if ($blog_show_comments == true):
                        $output .= '<a href="'.$comments_link.'">'.$comments_number.' Comments</a>';
                    endif;
                $output .=  '</div>';
                $output .= '<p>'.$content.'</p>';
                $output .=  '</div>';    
            $output .= '</div>';                                        
            endwhile; 
            $output .= '</div>';
        endif; 
        wp_reset_postdata();
        if (empty($carusel_items)):
            $carusel_items = 2;
        endif;
    endif;
    return $output;
}
add_shortcode( 'blog_posts', 'blog_posts' );

/*------------------------------------------------------*/
/* CHARTERED
/*------------------------------------------------------*/
function chartered( $atts ) {
    extract( shortcode_atts( array(
        'title' => '',
    ), $atts ) );
    global $post;
    $output = null;
    $args = array(
        'orderby' => 'name',
        'parent' => 0,
        'taxonomy' => 'chartered_category'
    );

    $output .= '<div class="faq">
                    <div class="bs-example bs-example-tabs">
                        <ul class="nav nav-tabs" id="myTab">';
    $categories = get_categories( $args );
    
    $i = 0;
    foreach ($categories as $category) {
        if($i == 0):
            $active_class = 'active';
            $i = 1;
        else:
            $active_class = '';
        endif;
        $output .= '<li class="col-xs-12 col-md-2 col-sm-6 no-padding '.$active_class.'"><a data-toggle="tab" href="#'.$category->slug.'">'.$category->name.'</a></li>';        
    }
    $output .=  '</ul><div class="tab-content" id="myTabContent">';
    $j = 0;
    foreach ($categories as $category) {
        $args = array( 
            'posts_per_page' => -1, 
            'post_type' => 'create_chartered', 
            'tax_query' => array(
                array(
                    'taxonomy' => 'chartered_category',
                    'field'    => 'id',
                    'terms'    => $category->term_id
                )
            )
        );
        $posts_array =  new WP_Query( $args );
        if($posts_array->have_posts()): 
            if($j == 0):
                $active_class_2 = 'active';
                $j = 1;
            else:
                $active_class_2 = '';
            endif;
        $output .= '<div id="'.$category->slug.'" class="tab-pane '.$active_class_2.'">';
        while($posts_array->have_posts()): $posts_array->the_post();
            $src = wp_get_attachment_image_src( get_post_thumbnail_id(), array(320,240), false, '' );
            $title = get_the_title();
            $first_content = accountant_content_no_points(45);
            $permalink = get_the_permalink();
            $output .= '<div class="media">
                            <div class="pull-right hidden-xs hidden-sm"></div>
                            <a class="pull-left hidden-xs hidden-sm" href="#">
                                <img src="'.$src[0].'" alt="" title="" />
                            </a>
                            <div class="media-body hidden-xs hidden-sm">
                                <h3>'.$title.'</h3>
                              '.$first_content.'
                              <div class="hide-part"><div class="hide-part-content">'.accountant_content_no_elements(45).'</div></div>
                            </div>
                            <div class="media-body width_auto visible-xs visible-sm">
                                <h3>'.$title.'</h3>                        
                              <div class="hide-part"><div class="hide-part-content">'.$first_content.' '.accountant_content_no_elements(45).'</div></div>
                            </div>
                        </div>';        
        endwhile;
        $output .= '</div>';
        endif; 
        wp_reset_postdata();
    }
    $output .= '</div></div></div>';
    return $output;
}
add_shortcode( 'chartered', 'chartered' );

/*------------------------------------------------------*/
/* SEARCH FORM
/*------------------------------------------------------*/
function search_form( $atts ) {
    extract( shortcode_atts( array(
        'title' => '',
    ), $atts ) );
    $output = null;
    $output = accountant_my_search_form();
    return $output;
}
add_shortcode( 'search_form', 'search_form' );

/*------------------------------------------------------*/
/* CAPABILITIES
/*------------------------------------------------------*/
function capabilities( $atts ) {
    extract( shortcode_atts( array(
        'style' => '',
    ), $atts ) );
    $crumbs = explode("/",$_SERVER["REQUEST_URI"]);
    $output = null;
    $capabilities = new WP_Query(array(
        'post_type'=> 'capabilities',
        'showposts' => -1,
        'order' => 'ASC',
    ));
    if($capabilities->have_posts()):
        if (esc_attr($style) == 'first'): 
            $output .= '<div class="row">
                            <div class="col-sm-8 col-md-6 col-xs-12">
                                <div class="tab-content block-blue"><div class="orang"></div>';
            $k = 0;
            while($capabilities->have_posts()): $capabilities->the_post(); 
            $active_class = ($k == 0) ? 'active' : '' ;
            global $post; 
            $title = get_the_title();
            $slug = $post->post_name;
            $output .=              '<div class="tab-pane '.$active_class.'" id="'.$slug.'">
                                        <div class="tab-text">
                                            <h3>'.$title.'</h3>
                                            '.accountant_content(300).'
                                        </div>
                                    </div>';
            $k++;
            endwhile; 
            $output .=          '</div>
                            </div>
                            <div class="col-sm-4 col-md-6 col-xs-12">
                                <ul id="tablist" class="nav nav-tabs tabs-list">';
            $j = 0;
            while($capabilities->have_posts()): $capabilities->the_post(); 
                $title = get_the_title();
                global $post; 
                $slug = $post->post_name;
                $active_class = ($j == 0) ? 'active' : '' ;                 
                $output .=          '<li class="'.$active_class.'"><a href="#'.$slug.'" data-toggle="tab">'.$title.'</a></li>';
                $j++;       
            endwhile;
            $output .=          '</ul>
                            </div>
                        </div>';
        elseif (esc_attr($style) == 'second'):
            $j = 0;
            $output .= '<div class="main-tabs">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-4 col-md-5 col-xs-12">
                                        <ul id="tablist" class="nav nav-tabs tabs-list tabs-list-left">';
            while($capabilities->have_posts()): $capabilities->the_post(); 
                $title = get_the_title();
                global $post; 
                $slug = $post->post_name;
                $active_class = ($j == 0) ? 'active' : '' ;                 
                $output .=                  '<li class="'.$active_class.'"><a href="#sec_'.$slug.'" data-toggle="tab">'.$title.'</a></li>';
                $j++;       
            endwhile;
            $output .= '                </ul>
                                    </div>
                                    <div class="col-sm-8 col-md-7 col-xs-12">
                                        <div class="tab-content block-gree">';
            $k = 0;
            while($capabilities->have_posts()): $capabilities->the_post(); 
            $active_class = ($k == 0) ? 'active' : '' ;
            global $post; 
            $slug = $post->post_name;
            $image = wp_get_attachment_image_src(get_post_thumbnail_id(), "large");
            $output .= '    <div class="tab-pane '.$active_class.'" id="sec_'.$slug .'">
                                <div class="tab-text">
                                    <div class="row">
                                        <img class="alignleft" src="'.$image[0].'" alt="" title="" />
                                    
                                        <div class="text-tab">
                                            '.accountant_content(300).'
                                        </div>
                                    </div>
                                </div>
                            </div>';
            $k++;
            endwhile;
            $output .= '                </div>
                                    </div>
                                </div>
                            </div>
                        </div>';
        endif;

    endif; wp_reset_postdata();
    return $output;
}
add_shortcode( 'capabilities', 'capabilities' );

/*------------------------------------------------------*/
/* CAREER
/*------------------------------------------------------*/
function career( $atts ) {
    extract( shortcode_atts( array(
        'max_count' => '',
    ), $atts ) );
    $output = null;
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $career = new WP_Query(array(
        'post_type'=> 'career_post',
        'posts_per_page' => esc_attr($max_count),
        'order' => 'ASC',
        'orderby' => 'title',
        'paged' => $paged
    ));
    $output .= '<div class="row">';
    
    while($career->have_posts()): $career->the_post();
        $title = get_the_title();
        $content = accountant_content(50);
        $permalink = get_the_permalink();
        $output .=  '<div class="col-sm-12 col-md-6 col-xs-12">          
                        <div class="career">
                            <h3>'.$title.'</h3>
                            '.$content.'
                            <div class="caper-more">
                                <div class="abs-link"><a href="'.$permalink.'" class="more">'.__('apply now', 'accountant-wp').'</a></div>
                            </div>
                        </div>
                    </div>';
    endwhile;
    if (  $career->max_num_pages > 1 ) :
    $output .= '
    <script>
    var ajaxurl = "'.site_url().'/wp-admin/admin-ajax.php";';
    $output .= "var true_posts = '".serialize($career->query_vars)."';";
    $output .=  'var current_page = '.max( 1, get_query_var('paged') ).';
    var max_pages = '.$career->max_num_pages.';
    </script>
    <div id="load_before">
    <div class="col-sm-12 col-md-12 col-xs-12"> 
        <div class="load-more">
            <div id="load_more">load more</div>
        </div>  
    </div>
    </div>
    ';
    endif;
    $output .=  '</div>';
    return $output;
}
add_shortcode( 'career', 'career' );

/*------------------------------------------------------*/
/* CASES
/*------------------------------------------------------*/
function cases( $atts ) {
    extract( shortcode_atts( array(
        'max_count' => '',
    ), $atts ) );
    $output = null;
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $cases = new WP_Query(array(
        'post_type'=> 'cases_post',
        'posts_per_page' => esc_attr($max_count),
        'paged' => $paged
    ));
    $output .= '<div class="row case-row">';    
    while($cases->have_posts()): $cases->the_post();
        $title = get_the_title();
        $content = accountant_content(11);
        $date = get_the_date( 'd/m/Y');
        $cases_client_name = get_post_meta(get_the_ID(), 'cases_client_name', true);
        $cases_file = get_post_meta(get_the_ID(), 'cases_file', true);
        $src = wp_get_attachment_image_src( get_post_thumbnail_id(), array(370,300), false, '' );
        $output .=  '<div class="col-sm-6 col-md-4 col-xs-12">
                        <div class="case-box height">
                            <div class="img-case" style="background: url('.$src[0].') no-repeat;background-size: cover;">
                                <div class="bg-opacity"></div>
                            </div>
                            <h3>'.$title.'</h3>
                            '.$content.'
                            <div class="row">
                                <div class="col-sm-6 col-md-5 col-xs-12">
                                    <span class="size">'.__('Client : ', 'accountant-wp'). $cases_client_name.'</span>
                                </div>
                                <div class="col-sm-6 col-md-7 col-xs-12">
                                    <span class="size">'.__('Date : ', 'accountant-wp').''.$date.'</span>
                                </div>
                            </div>
                            <div class="link">
                                <a href="'.$cases_file.'" download>'.__('Download Case', 'accountant-wp').'</a>
                            </div>
                            
                        </div>
                    </div>';
    endwhile;
    $output .=  '</div>';
    paginate_comments_links();
    $res = paginate_links(array(
        'base' => str_replace( $big = 999999998, '%#%', get_pagenum_link( $big ) ),
        'current' => max( 1, get_query_var('paged') ),
        'total' => $cases->max_num_pages,
        'show_all' => true,
        'prev_text'    => __('&#8592; Prev', 'accountant-wp'),
        'next_text'    => __('Next &#8594;', 'accountant-wp'),
    ));
    $res = str_replace( '/page/1', '', $res );
    $output .= '<div class="cases-pages"><div class="wp-pagenevi">'.$res.'</div></div>';
    return $output;
}
add_shortcode( 'cases', 'cases' );

/*------------------------------------------------------*/
/* SINGLE SERVICES 
/*------------------------------------------------------*/
function single_services( $atts ) {
    extract( shortcode_atts( array(
        'max_count' => '',
        'carusel_items' => '',
        'disable_links' => '',
        'show_title' => '',
        'show_description' => '',
        'show_read_more' => '',
    ), $atts ) );
    if ($carusel_items == 2):
        $boot_class = '6';
    elseif($carusel_items == 3):
        $boot_class = '4';
    endif;
    $output = null;
    $services = new WP_Query( array(
          'post_type' => 'services_post',
          'post__not_in' => array(get_the_ID()),
          'posts_per_page' => esc_attr($max_count),
          'orderby' => 'rand'
    ) ); 
    $output .= '<div class="row services-posts">
        <div class="col-xs-12 col-md-9 col-sm-12">
            <div class="text-serv">
                <h2>'.__('related <strong>services</strong>', 'accountant-wp').'</h2>
            </div>
        </div>
    </div>
    <div class="row services-posts related-block">';
    while($services->have_posts()): $services->the_post();
        $services_previous = get_post_meta( get_the_ID(), 'services_previous', true );
        $src = wp_get_attachment_image_src( get_post_thumbnail_id(), array(320,240), false, '' );   
    $output .= '<div class="col-xs-12 col-md-'.$boot_class.' col-sm-12">
                    <div class="post-advisor">';
    if (esc_attr($disable_links) == true):
        $output .=          '<div class="photo-advisor">
                                <img src="'.$src[0].'" alt="">
                            </div>';
    else:
        $output .=          '<div class="photo-advisor">
                                <a href="'.get_the_permalink().'"><img src="'.$src[0].'" alt=""></a>
                            </div>';
    endif;

    if (esc_attr($show_title) == true):
        if (esc_attr($disable_links) == true):
            $output .=          '<div class="serv-title">
                                    <h3>'.get_the_title().'</h3>
                                </div>';
        else:
            $output .=          '<div class="serv-title">
                                    <h3><a href="'.get_the_permalink().'">'.get_the_title().'</a></h3>
                                </div>';
        endif;
    endif;
    if (esc_attr($show_description) == true):
        $output .=          '<p>'.$services_previous.'</p>';
    endif;
    if (esc_attr($show_read_more) == true && esc_attr($disable_links) == false):
        $output .=      '<div>
                            <a href="'.get_the_permalink().'" class="more">'.__('Read More', 'accountant-wp').' <i class="fa fa-long-arrow-right"></i></a>
                        </div>';
    endif;
    $output .=      '</div>
                </div>';
    endwhile;
    $output .= '</div>';
    return $output;
}
add_shortcode( 'single_services', 'single_services' );


