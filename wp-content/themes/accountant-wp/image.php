<?php get_header() ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<div class="row">
			<div class="col-sm-12 no-padding">
				<?php the_title('<h1>', '</h1>');?>
				<?php 
				$attachment_id = get_the_ID();
				if ( wp_attachment_is_image( $attachment_id ) ) { 
				$att_image = wp_get_attachment_image_src( $attachment_id, "full");
				$img_alt = get_post_meta( $attachment_id, '_wp_attachment_image_alt', true); 
				?>
				
					<div class="post-category">
						<div class="post-advisor">
							<div class="photo-advisor">
								<img src="<?php print esc_url($att_image['0']); ?>" width="<?php print esc_attr($att_image['1'] ); ?>" height="<?php print esc_attr($att_image['2'] ); ?>" alt="<?php print esc_html($img_alt); ?>"/>
							</div>
						</div>
					</div>
				
				<?php } ?>

			</div>
		</div>
	<?php endwhile; ?>
<?php get_footer();