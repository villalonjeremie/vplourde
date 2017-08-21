
<?php get_header() ?>
<?php 
	$postID  = accountant_option('page_404');
	$vc_template_css = get_post_meta( $postID, '_wpb_shortcodes_custom_css', true );
	$page_breadcrumb = get_post_meta( $postID, '_wpc_hide_breadcrumb', true );
	$hide_page_title = get_post_meta( $postID, '_wpc_hide_page_title', true );
	$enable_page_header      = get_post_meta( $postID, '_wpc_enable_page_header', true );
	$header_title            = get_post_meta( $postID, '_wpc_header_title', true );
	$header_alignment        = get_post_meta( $postID, '_wpc_header_alignment', true );
	$header_bg 				 = get_post_meta( $postID, '_wpc_header_bg', true );
	$header_height			 = get_post_meta( $postID, '_wpc_header_height', true );

	$blog_single_breadcrumb = accountant_option('blog_single_breadcrumb');
			
?>
<?php	if ( $enable_page_header == 'on' || is_single()): ?>
	<div class="category-imgages" style="background: url(<?php print esc_url($header_bg); ?>)  50% 0 no-repeat;background-size: cover;
		height: <?php print esc_html($header_height); ?>;">
		<div class="container" style='text-align: <?php print esc_html($header_alignment); ?>;'>
			<?php	if ( $hide_page_title !== 'on' ): ?>
			<div class="title">
				<h2><?php print esc_html($header_title);  ?></h2>
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
<?php if ( is_category() || is_tag() || is_author() || is_archive()): ?>
<div class="category-imgages" style="background: url(<?php print esc_url($header_bg); ?>)  50% 0 no-repeat;background-size: cover; height: <?php print esc_html($header_height); ?>;">
	<div class="container" style='text-align: <?php  print esc_html($header_alignment); ?>;'>
		<?php	if ( $hide_page_title !== 'on' ): ?>
		<div class="title">
			<h2><?php print esc_html($header_title);  ?></h2>
		</div>
		<?php endif; ?>		
		<?php if ( $page_breadcrumb !== 'on'): 
		accountant_breadcrumbs_func();
		endif; ?>			
	</div>		
</div>
<?php endif; ?>		
<div class="main container <?php if ( $hide_page_title == 'on' && $page_breadcrumb == 'on' ){ print esc_html__('no-banner-content', 'accountant-wp'); } ?>">
<?php 
	if($postID){
		$query = new WP_Query('page_id='.$postID);
		while ($query->have_posts()) : $query->the_post();
		the_content();
		endwhile;
	} else { ?>
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-12 col-sm-12 no-padding">
					<div class="post-category">
						<div class="wpb_wrapper default404">
							<h1><?php esc_html_e('404', 'accountant-wp'); ?></h1>
							<h2><?php esc_html_e('Page not found', 'accountant-wp'); ?></h2>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
</div>
<?php get_footer();