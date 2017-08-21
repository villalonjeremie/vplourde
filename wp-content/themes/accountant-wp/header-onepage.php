<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php wp_head() ?>

</head>
<body  <?php body_class(); ?> >
<?php 
$dataname = accountant_option( 'preloader_style' );
$loadertext = accountant_option( 'letters_loader_text' );
$customGif = accountant_option( 'gif_loader_image' )['url'];
?>
<div id="preloader" class="introLoading" data-name="<?php print esc_attr( $dataname ) ?>"
     data-loaderText="<?php print esc_attr( $loadertext ) ?>" data-customGif="<?php print esc_url($customGif) ?>"></div>


    <?php 
    $header_fixed = accountant_option('header_fixed');
    $site_logo = accountant_option('site_logo');
    $site_logo_sticky = accountant_option('site_logo_sticky');
    $site_logo_child = accountant_option('site_logo_child');
    $header_style = accountant_option('header_style');
    $site_logo_mobile = accountant_option('site_logo_mobile');
    $img_alt = (isset($site_logo["id"])) ? get_post_meta( $site_logo["id"], '_wp_attachment_image_alt', true) : '';
    ?>
    <div class='page-home'>
    <?php if ($header_style == 'header-default' || $header_style == 'topbar'): ?>		
    <div id="header" class="navbar navbar-inverse <?php if($header_fixed == 1){ print esc_html__('shadow-fixed', 'accountant-wp'); }; ?> <?php if(!is_front_page())
    { print esc_html('single'); }; ?> " role="navigation">
    	<?php if ($header_style == 'topbar'): ?>
    	<div class="top-bar">
    		<div class="container">
    			<div class="col-md-6 col-lg-6 col-sm-6 col-xs-6 no-padding">
    				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Top Bar Left") ) : ?>
    			<?php endif; ?>
    		</div>
    		<div class="col-md-6 col-lg-6 col-sm-6 col-xs-6 no-padding">
    			<div class="right-col-bar">
    				<ul>
    					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Top Bar Right") ) : ?>
    				<?php endif; ?>			
    			</ul>
    		</div>
    	</div>
    </div>
</div>
<?php endif; ?>
<nav class="navbar navbar-default">
	<div class="container">
		<div class="row hidden-xs hidden-sm">
			<?php if (!empty($site_logo) && !empty($site_logo_child) && !empty($site_logo_sticky)) : ?>
			<div class="col-md-3 col-lg-3 col-sm-3 col-xs-3">
				<?php if(is_front_page()){ ?>
				<a href="<?php print esc_url(get_home_url('/')); ?>" class="logo no_sticky_logo"><img src="<?php print esc_url($site_logo['url']); ?>" alt="<?php print esc_attr($img_alt); ?>"  /></a>


				<a href="<?php print esc_url(get_home_url('/')); ?>" class="logo sticky_logo"><img src="<?php print esc_url($site_logo_sticky['url']); ?>" alt="<?php print esc_attr($img_alt); ?>"  /></a>
				<?php }else{ ?>
				<a href="<?php print esc_url(get_home_url('/')); ?>" class="logo no_sticky_logo"><img src="<?php print esc_url($site_logo_child['url']); ?>" alt="<?php print esc_attr($img_alt); ?>"  /></a>
				<a href="<?php print esc_url(get_home_url('/')); ?>" class="logo sticky_logo"><img src="<?php print esc_url($site_logo_sticky['url']); ?>" alt="<?php print esc_attr($img_alt); ?>"  /></a>
				<?php } ?>
			</div>
		<?php endif; ?>
		<div class="col-md-9 col-lg-9 col-sm-9 col-xs-3">		
			<?php if (!has_nav_menu( 'header-menu-onepage' )): ?>
			        <span class="no-menu"><?php  esc_html_e( 'Please register Menu from', 'accountant-wp' ) ?> <a href="<?php echo esc_url(admin_url('nav-menus.php')); ?>" target="_blank">
					<?php esc_html_e( 'Appearance &gt; Menus', 'accountant-wp' ) ?>
			        </a></span>
				<?php else: ?>
					<?php wp_nav_menu( array( 'theme_location' => 'header-menu-onepage', 'menu_class' => 'nav navbar-nav smint-menu', 'container_class' => 'menu' ) ); ?>
		        <?php endif;?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 col-lg-12 col-sm-12  visible-xs visible-sm">
			<?php if (!empty($site_logo) && !empty($site_logo_mobile)) : ?>
			<a href="<?php print esc_url(get_home_url('/')); ?>" class="logo no_sticky_logo"><img src="<?php print esc_url($site_logo_mobile['url']); ?>" alt="<?php print esc_attr($img_alt); ?>"  /></a>
		<?php endif; ?>
		<button data-target="#bs-example-navbar-collapse-12" data-toggle="collapse" class="navbar-toggle" type="button">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
	</div>
</div>
<div class="row visible-xs visible-sm">				          
	<div class="col-md-12 col-lg-12 col-sm-12 ">
		<div class="row">		
			<div id="bs-example-navbar-collapse-12" class="collapse navbar-collapse">
				<?php
					$header_search = accountant_option( 'header_search' );
					if ( $header_search ) echo accountant_header_search_form(); 
				?>

				<?php if (!has_nav_menu( 'header-menu-onepage' )): ?>
			        <span class="no-menu"><?php  esc_html_e( 'Please register Menu from', 'accountant-wp' ) ?> <a href="<?php echo esc_url(admin_url('nav-menus.php')); ?>" target="_blank">
					<?php esc_html_e( 'Appearance &gt; Menus', 'accountant-wp' ) ?>
			        </a></span>
				<?php else: ?>
					<?php wp_nav_menu( array( 'menu_id' => 'mb-main-menu', 'theme_location' => 'header-menu-onepage', 'menu_class' => 'nav navbar-nav smint-menu', 'container_class' => '' ) ); ?>
		        <?php endif;?>
			</div>
		</div>
	</div>
</div>
</div>		      
</nav>
</div>
<?php elseif ($header_style == 'centered'): ?>
	<div id="header" class="navbar navbar-inverse <?php if($header_fixed == 1){ print esc_html__('shadow-center', 'accountant-wp'); }; ?>" role="navigation">
		<nav role="navigation" class="navbar navbar-default">
			<div class="container">
				<div class="row hidden-xs hidden-sm">
					<div class="col-md-12 col-lg-12 col-sm-12 ">
						<?php
							$header_search = accountant_option( 'header_search' );
							if ( $header_search ) echo accountant_header_search_form(); 
						?>			
						<?php wp_nav_menu( array( 'theme_location' => 'header-menu-onepage', 'menu_class' => 'nav navbar-nav smint-menu center-logo', 'container_class' => 'menu' ) ); ?>

						<li class="logo-li"><?php if (!empty($site_logo) && !empty($site_logo_child) && !empty($site_logo_sticky)) : ?>
							<?php if(is_front_page()){ ?>
							<a href="<?php print esc_url(get_home_url('/')); ?>" class="logo no_sticky_logo"><img src="<?php print esc_url($site_logo['url']); ?>" alt="<?php print esc_attr($img_alt); ?>"  /></a>
							<a href="<?php print esc_url(get_home_url('/')); ?>" class="logo sticky_logo"><img src="<?php print esc_url($site_logo_sticky['url']); ?>" alt="<?php print esc_attr($img_alt); ?>"  /></a>
							<?php }else{ ?>
							<a href="<?php print esc_url(get_home_url('/')); ?>" class="logo no_sticky_logo"><img src="<?php print esc_url($site_logo_child['url']); ?>" alt="<?php print esc_attr($img_alt); ?>"  /></a>
							<a href="<?php print esc_url(get_home_url('/')); ?>" class="logo sticky_logo"><img src="<?php print esc_url($site_logo_sticky['url']); ?>" alt="<?php print esc_attr($img_alt); ?>"  /></a>
							<?php } ?>
						<?php endif; ?>
					</li>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-lg-12 col-sm-12  visible-xs visible-sm">
					<?php if (!empty($site_logo) && !empty($site_logo_mobile)) : ?>
					<a href="<?php print esc_url(get_home_url('/')); ?>" class="logo no_sticky_logo"><img src="<?php print esc_url($site_logo_mobile['url']); ?>" alt="<?php print esc_attr($img_alt); ?>"  /></a>
				<?php endif; ?>
				<button data-target="#bs-example-navbar-collapse-12" data-toggle="collapse" class="navbar-toggle" type="button">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
		</div>
		<div class="row visible-xs visible-sm">				          
			<div class="col-md-12 col-lg-12 col-sm-12 ">
				<div class="row">		
					<div id="bs-example-navbar-collapse-12" class="collapse navbar-collapse">	
						<?php
							$header_search = accountant_option( 'header_search' );
							if ( $header_search ) echo accountant_header_search_form(); 
						?>
					
						<?php if (!has_nav_menu( 'header-menu-onepage' )): ?>
				        <span class="no-menu"><?php  esc_html_e( 'Please register Menu from', 'accountant-wp' ) ?> <a href="<?php echo esc_url(admin_url('nav-menus.php')); ?>" target="_blank">
						<?php esc_html_e( 'Appearance &gt; Menus', 'accountant-wp' ) ?>
				        </a></span>
						<?php else: ?>
							<?php wp_nav_menu( array( 'theme_location' => 'header-menu-onepage', 'menu_class' => 'nav navbar-nav smint-menu', 'container_class' => '' ) ); ?>
				        <?php endif;?>
					</div>
				</div>
			</div>
		</div>
	</div>		      
</nav>
</div>	
<?php endif ?>
<?php if (have_posts()): ?>
	<?php
	global $post;
	$postID = $post->ID;
	$page_breadcrumb = get_post_meta( $postID, '_wpc_hide_breadcrumb', true );
	$hide_page_title = get_post_meta( $postID, '_wpc_hide_page_title', true );
	$enable_page_header      = get_post_meta( $postID, '_wpc_enable_page_header', true );
	$header_title            = get_post_meta( $postID, '_wpc_header_title', true );
	$header_alignment        = get_post_meta( $postID, '_wpc_header_alignment', true );
	$header_bg 				 = get_post_meta( $postID, '_wpc_header_bg', true );
	$header_height			 = get_post_meta( $postID, '_wpc_header_height', true );

	$blog_single_breadcrumb = accountant_option('blog_single_breadcrumb');

	if(is_single()):
		$header_bg = accountant_option('blog_banner')['url'];
	$header_title = $post->post_title;
	endif;				
	?>
	<?php	if ( $enable_page_header == 'on' || is_single()): ?>
	<div class="category-imgages" style="background: url(<?php print esc_url($header_bg); ?>)  50% 0 no-repeat;background-size: cover; height: <?php print esc_html($header_height); ?>;">
		<div class="container" style='text-align: <?php print esc_html($header_alignment); ?>;'>
			<?php	if ( $hide_page_title !== 'on' ): ?>
			<div class="title">
				<h2><?php print wp_kses_post( $header_title ); ?></h2>
			</div>
		<?php endif; ?>		
		<?php if ( is_single() && $blog_single_breadcrumb == true): 
		accountant_breadcrumbs_func();
		elseif (!is_single() && $page_breadcrumb !== 'on'):
			accountant_breadcrumbs_func();
		endif; ?>			
	</div>		
</div>
<?php endif; ?>
<?php	if ( is_category() || is_tag() || is_author() || is_archive()): 
$header_bg = accountant_option('blog_banner')['url'];
if (is_category()):
	$categorie = get_the_category();
$header_title = esc_html__('Cetegory: ', 'accountant-wp').$categorie[0]->name;
elseif(is_tag()):
	$tag = get_the_tags();
$header_title = esc_html__('Tag: ', 'accountant-wp').$tag[0]->name;
elseif(is_archive()):
	$tag = get_the_tags();
$header_title = esc_html__('Archive', 'accountant-wp');
else:	
	$author = get_the_author();
$header_title = esc_html__('Author: ', 'accountant-wp').$author;
endif;

?>
<div class="category-imgages" style="background: url(<?php print esc_url($header_bg); ?>)  50% 0 no-repeat;background-size: cover;
	height: <?php print esc_html($header_height );?>;">
	<div class="container" style='text-align: <?php print esc_html($header_alignment); ?>;'>
		<?php	if ( $hide_page_title !== 'on' ): ?>
		<div class="title">
			<h2><?php print wp_kses_post( $header_title ); ?></h2>
		</div>
	<?php endif; ?>		
	<?php if ( $page_breadcrumb !== 'on'): 
	accountant_breadcrumbs_func();
	endif; ?>			
</div>		
</div>
<?php endif; ?>
<?php $accountantwp_main_container_class = ( $hide_page_title == 'on' && $page_breadcrumb == 'on' ) ? 'no-banner-content' : ''; ?>
<div class="main container <?php print esc_attr( $accountantwp_main_container_class ); ?>">
<?php endif; ?>	


