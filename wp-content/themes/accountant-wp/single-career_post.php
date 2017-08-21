<?php get_header() ?>
	<div class="container">
		<div class="row">
			<?php
				$blog_single_thumb = accountant_option('blog_single_thumb');
				$blog_single_author = accountant_option('blog_single_author');
				$page_layout = accountant_option('blog_layout');

				$blog_show_comments = accountant_option('blog_show_comments');
				$blog_show_date = accountant_option('blog_show_date');
				$blog_read_more = accountant_option('blog_read_more');
				$blog_title_linkable = accountant_option('blog_title_linkable');
				$blog_image_linkable = accountant_option('blog_image_linkable');
			?>
			<?php get_sidebar() ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php
					$archive_year  = get_the_time('Y'); 
					$archive_month = get_the_time('m'); 
					$archive_day   = get_the_time('d');
					$day_link = get_day_link($archive_year, $archive_month, $archive_day);
					$date = get_the_date( 'jS M');
					global $post;
					$postID = $post->ID;
					$post_show_thubnail = get_post_meta( $postID, 'post_show_thubnail', true );
				if ($page_layout == 'right-sidebar' || $page_layout == 'left-sidebar'):
					print '<div class="col-md-8 col-sm-12 no-padding">';
				else:
					print '<div class="col-md-8 col-sm-12 no-padding col-md-offset-2">';
				endif;
				?>
				<div class="post-category">
					<div class="post-advisor">
					<?php if ($blog_single_thumb == true && $post_show_thubnail !== 'on' && get_the_post_thumbnail()): ?>
						<div class="photo-advisor">
							<?php the_post_thumbnail(); ?>
						</div>
					<?php endif; ?>							
						<?php the_content(); ?>				
					</div>
					<?php 
						if ($blog_show_comments == true && $post->post_type == 'post'):
							comments_template(); 
						endif;
					?> 
				</div>
			<?php endwhile;?>
			</div>
		</div>
	</div>
<?php wp_link_pages(); ?>
<?php get_footer() ?>