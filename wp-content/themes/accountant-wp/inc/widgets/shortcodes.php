<?php
/*------------------------------------------------------*/
/* STAFF
/*------------------------------------------------------*/

add_action( 'vc_before_init', 'staff_VC' );

function staff_VC() {
   vc_map( array(
      "name" => esc_html__( "Staff", 'accountant-wp' ),
      "base" => "staff",
      "class" => "",
      "category" => esc_html__( "Accountant Elements", 'accountant-wp'),
      "params" => array(
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__( "Category name", 'accountant-wp' ),
            "param_name" => "category",
            "value" => "",
            "description" => esc_html__( "Description Category name.", 'accountant-wp' )
         ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__( "Number of posts", 'accountant-wp' ),
            "param_name" => "max_qty",
            "value" => "",
            "description" => esc_html__( "Description Number of posts.", 'accountant-wp' )
         ),
         array(
            "type"        => "dropdown",
            "heading"     => esc_html__("Carusel items/columns.", 'accountant-wp'),
            "description" => esc_html__( "Crusel items/columns count.", 'accountant-wp' ),
            "param_name"  => "carusel_items",
            "value"       => array(
               'Choise design'    => 'choise',
               '1'    => '1', 
               '2'    => '2', 
               '3'    => '3', 
               '4'    => '4', 
            ),
            "std"         => 'choise',
         ),
         array(
            "type"        => "dropdown",
            "heading"     => esc_html__("Staff styles", 'accountant-wp'),
            "param_name"  => "style",
            "value"       => array(
               'Choise design'    => 'choise',
               'First design (slider)'    => 'first', 
               'Second design (NO slider)'    => 'second', 
               'Third design (NO slider)'    => 'third', 
            ),
            "std"         => 'choise',
         ),
         array(
             "type" => "checkbox",
             "heading" => esc_html__( "Disable Links", 'accountant-wp' ),
             "param_name" => "disable_links",
         ),
         array(
             "type" => "checkbox",
             "heading" => esc_html__( "Show title?", 'accountant-wp' ),
             "param_name" => "show_title",
         ),
         array(
             "type" => "checkbox",
             "heading" => esc_html__( "Show description?", 'accountant-wp' ),
             "param_name" => "show_description",
         ),
         array(
             "type" => "checkbox",
             "heading" => esc_html__( "Show 'Read more'?", 'accountant-wp' ),
             "param_name" => "show_read_more",
         ),
      )
   ) );
} 

/*------------------------------------------------------*/
/* TESTIMONIALS
/*------------------------------------------------------*/

add_action( 'vc_before_init', 'testimonials_advisor_VC' );

function testimonials_advisor_VC() {
   vc_map( array(
      "name" => esc_html__( "Testimonials", 'accountant-wp' ),
      "base" => "testimonials_advisor",
      "class" => "",
      "category" => esc_html__( "Accountant Elements", 'accountant-wp'),
      "params" => array(
         array(
            "type"        => "dropdown",
            "heading"     => esc_html__("Testimonial type", 'accountant-wp'),
            "param_name"  => "testimonial_type",
            "value"       => array(
               'Choise testimonial type'    => 'choise',
               'Advisors'    => 'testimonials_advisor_category', 
               'Partners'    => 'testimonials_partners_category', 
               'Clients'    => 'testimonials_client_category', 
            ),
            "std"         => 'choise',
         ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__( "Category name", 'accountant-wp' ),
            "param_name" => "category",
            "value" => esc_html__( "category", 'accountant-wp' ),
            "description" => esc_html__( "Description Category name.", 'accountant-wp' )
         ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__( "Number of posts", 'accountant-wp' ),
            "param_name" => "max_qty",
            "value" => esc_html__( "5", 'accountant-wp' ),
            "description" => esc_html__( "Description Number of posts", 'accountant-wp' )
         ),
      )
   ) );
} 

/*------------------------------------------------------*/
/* COMPANY RESULTS
/*------------------------------------------------------*/

add_action( 'vc_before_init', 'company_results_VC' );

function company_results_VC() {
   vc_map( array(
      "name" => esc_html__( "Company results", 'accountant-wp' ),
      "base" => "company_results",
      "class" => "",
      "category" => esc_html__( "Accountant Elements", 'accountant-wp'),
      "params" => array(
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__( "Title", 'accountant-wp' ),
            "param_name" => "title",
            "value" => esc_html__( "Title", 'accountant-wp' ),
            "description" => esc_html__( "Description Company results.", 'accountant-wp' )
         ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__( "Count", 'accountant-wp' ),
            "param_name" => "count",
            "value" => esc_html__( "Count", 'accountant-wp' ),
            "description" => esc_html__( "Description Company results.", 'accountant-wp' )
         ),
         array(
            "type" => "attach_image",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__( "Icon", 'accountant-wp' ),
            "param_name" => "icon",
            "description" => esc_html__( "Description Company results.", 'accountant-wp' )
         ),
      )
   ));
} 

/*------------------------------------------------------*/
/* SERVICES
/*------------------------------------------------------*/

add_action( 'vc_after_init', 'services_VC' );

function services_VC() {
   vc_map( array(
      "name" => esc_html__( "Services", 'accountant-wp' ),
      "base" => "services",
      "class" => "",
      "category" => esc_html__( "Accountant Elements", 'accountant-wp'),
      "params" => array(
      	array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__( "Max count of services", 'accountant-wp' ),
            "param_name" => "max_count",
            "value" => esc_html__( "-1", 'accountant-wp' ),
            "description" => esc_html__( "-1 - Show all services", 'accountant-wp' )
         ),
         array(
            "type"        => "dropdown",
            "heading"     => esc_html__("Services styles", 'accountant-wp'),
            "param_name"  => "style",
            "value"       => array(
               'Choise design'    => 'choise',
               'First design'    => 'first', 
               'Second design'    => 'second', 
               'Third design'    => 'third', 
               'Fourth design'    => 'fourth', 
            ),
            "std"         => 'choise',
         ),
         array(
             "type" => "checkbox",
             "heading" => esc_html__( "Show icon?", 'accountant-wp' ),
             "param_name" => "show_icon",
         ),
         array(
             "type" => "checkbox",
             "heading" => esc_html__( "Show description?", 'accountant-wp' ),
             "param_name" => "show_description",
         ),
         array(
             "type" => "checkbox",
             "heading" => esc_html__( "Title linkable?", 'accountant-wp' ),
             "param_name" => "title_link",
         ),
         array(
             "type" => "checkbox",
             "heading" => esc_html__( "Image linkable?", 'accountant-wp' ),
             "param_name" => "image_link",
         ),
      )
   ));
}

/*------------------------------------------------------*/
/* YEARS STATISTIC
/*------------------------------------------------------*/

add_action( 'vc_after_init', 'statistic_VC' );

function statistic_VC() {
   vc_map( array(
      "name" => esc_html__( "Statistic", 'accountant-wp' ),
      "base" => "statistic",
      "class" => "",
      "category" => esc_html__( "Accountant Elements", 'accountant-wp'),
      "params" => array(
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__( "Statistic count", 'accountant-wp' ),
            "param_name" => "count",
            "description" => esc_html__( "Description Statistic.", 'accountant-wp' )
         ),
         array(
            "type"        => "dropdown",
            "heading"     => esc_html__("Statistic styles", 'accountant-wp'),
            "param_name"  => "style",
            "value"       => array(
               'Choise design'    => 'choise',
               'First design'    => 'first', 
               'Second design'    => 'second',  
            ),
            "std"         => 'choise',
         ),
      )
   ));
}


/*------------------------------------------------------*/
/* BLOG POSTS
/*------------------------------------------------------*/

add_action( 'vc_after_init', 'blog_posts_VC' );

function blog_posts_VC() {
   vc_map( array(
      "name" => esc_html__( "Blog Posts", 'accountant-wp' ),
      "base" => "blog_posts",
      "class" => "",
      "category" => esc_html__( "Accountant Elements", 'accountant-wp'),
      "params" => array(
         array(
            "type"        => "dropdown",
            "heading"     => esc_html__("Statistic styles", 'accountant-wp'),
            "param_name"  => "style",
            "value"       => array(
               'Choise design'    => 'choise',
               'First design'    => 'first', 
               'Second design (slider)'    => 'second',  
            ),
            "std"         => 'choise',
         ),
         array(
            "type"        => "dropdown",
            "heading"     => esc_html__("Carusel items/columns", 'accountant-wp'),
            "param_name"  => "carusel_items",
            "value"       => array(
               'Choise number of items/columns'    => 'choise',
               '1'    => '1', 
               '2'    => '2',
               '3'    => '3', 
               '4'    => '4',   
            ),
            "std"         => 'choise',
         ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__( "Number of posts", 'accountant-wp' ),
            "param_name" => "max_qty",
            "value" => "",
         ),
      )
   ));
}

/*------------------------------------------------------*/
/* CHARTERED
/*------------------------------------------------------*/

add_action( 'vc_after_init', 'chartered_VC' );

function chartered_VC() {
   vc_map( array(
      "name" => esc_html__( "Chartered", 'accountant-wp' ),
      "base" => "chartered",
      "class" => "",
      "category" => esc_html__( "Accountant Elements", 'accountant-wp'),
      "params" => array(
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__( "Title", 'accountant-wp' ),
            "param_name" => "title",
            "value" => esc_html__( "Title", 'accountant-wp' ),
            "description" => esc_html__( "Your Chartered.", 'accountant-wp' )
         ),
      )
   ));
}

/*------------------------------------------------------*/
/* SEARCH FORM
/*------------------------------------------------------*/

add_action( 'vc_after_init', 'search_form_VC' );

function search_form_VC() {
   vc_map( array(
      "name" => esc_html__( "Search form", 'accountant-wp' ),
      "base" => "search_form",
      "class" => "",
      "category" => esc_html__( "Accountant Elements", 'accountant-wp'),
      "params" => array(
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__( "Title", 'accountant-wp' ),
            "param_name" => "title",
            "value" => esc_html__( "Title", 'accountant-wp' ),
            "description" => esc_html__( "Search form.", 'accountant-wp' )
         ),
      )
   ));
}

/*------------------------------------------------------*/
/* CAPABILITIES
/*------------------------------------------------------*/

add_action( 'vc_after_init', 'capabilities_VC' );

function capabilities_VC() {
   vc_map( array(
      "name" => esc_html__( "Capabilities", 'accountant-wp' ),
      "base" => "capabilities",
      "class" => "",
      "category" => esc_html__( "Accountant Elements", 'accountant-wp'),
      "params" => array(
         array(
            "type"        => "dropdown",
            "heading"     => esc_html__("Capabilities styles", 'accountant-wp'),
            "param_name"  => "style",
            "value"       => array(
               'Choise design'    => 'choise',
               'First design'    => 'first', 
               'Second design'    => 'second',  
            ),
            "std"         => 'choise',
         ),
      )
   ));
}

/*------------------------------------------------------*/
/* CAREER
/*------------------------------------------------------*/

add_action( 'vc_after_init', 'career_VC' );

function career_VC() {
   vc_map( array(
      "name" => esc_html__( "Career", 'accountant-wp' ),
      "base" => "career",
      "class" => "",
      "category" => esc_html__( "Accountant Elements", 'accountant-wp'),
      "params" => array(
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__( "Max count of careers", 'accountant-wp' ),
            "param_name" => "max_count",
            "value" => esc_html__( "-1", 'accountant-wp' ),
            "description" => esc_html__( "-1 - Show all careers", 'accountant-wp' )
         ),
      )
   ));
}

/*------------------------------------------------------*/
/* CASES
/*------------------------------------------------------*/

add_action( 'vc_after_init', 'cases_VC' );

function cases_VC() {
   vc_map( array(
      "name" => esc_html__( "Cases", 'accountant-wp' ),
      "base" => "cases",
      "class" => "",
      "category" => esc_html__( "Accountant Elements", 'accountant-wp'),
      "params" => array(
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__( "Max count of cases", 'accountant-wp' ),
            "param_name" => "max_count",
            "value" => esc_html__( "-1", 'accountant-wp' ),
            "description" => esc_html__( "-1 - Show all cases", 'accountant-wp' )
         ),
      )
   ));
}

/*------------------------------------------------------*/
/* SINGLE SERVICES 
/*------------------------------------------------------*/

add_action( 'vc_after_init', 'single_services_VC' );

function single_services_VC() {
   vc_map( array(
      "name" => esc_html__( "Single Related Services", 'accountant-wp' ),
      "base" => "single_services",
      "class" => "",
      "category" => esc_html__( "Accountant Elements", 'accountant-wp'),
      "params" => array(
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__( "Max count of cases", 'accountant-wp' ),
            "param_name" => "max_count",
            "value" => esc_html__( "-1", 'accountant-wp' ),
            "description" => esc_html__( "-1 - Show all cases", 'accountant-wp' )
         ),
         array(
            "type"        => "dropdown",
            "heading"     => esc_html__("Columns count.", 'accountant-wp'),
            "param_name"  => "carusel_items",
            "value"       => array(
               'Choise column count'    => 'choise',
               '2'    => '2', 
               '3'    => '3', 
            ),
            "std"         => 'choise',
         ),
         array(
             "type" => "checkbox",
             "heading" => esc_html__( "Disable Links", 'accountant-wp' ),
             "param_name" => "disable_links",
         ),
         array(
             "type" => "checkbox",
             "heading" => esc_html__( "Show title?", 'accountant-wp' ),
             "param_name" => "show_title",
         ),
         array(
             "type" => "checkbox",
             "heading" => esc_html__( "Show description?", 'accountant-wp' ),
             "param_name" => "show_description",
         ),
         array(
             "type" => "checkbox",
             "heading" => esc_html__( "Show 'Read more'?", 'accountant-wp' ),
             "param_name" => "show_read_more",
         ),
      )
   ));
}