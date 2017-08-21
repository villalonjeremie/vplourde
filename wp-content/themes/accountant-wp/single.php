<?php get_header() ?>
<?php if(get_option('page_on_front') > 1) {  ?>
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
					print '<div class=" col-md-8 col-sm-12 no-padding">';
				else:
					print '<div class=" col-md-8 col-sm-12 no-padding col-md-offset-2">';
				endif;
				?>
				<div class="post-category">
					<div class="post-advisor">
						<?php if ($blog_single_thumb == true && $post_show_thubnail !== 'on'): ?>
							<div class="photo-advisor">
								<?php the_post_thumbnail(); ?>
							</div>
						<?php endif; ?>							
							<?php if ($blog_show_date == true || $blog_single_author == true || $blog_show_comments == true): ?>
								<div class="row">
									<div class="col-md-8 col-lg-8 ">
										<div class="title-blog">
											<?php 
											if ($blog_show_date == true): ?>
												<div class="col-md-4 col-sm-12  no-padding">
													<a class="date" href="<?php print esc_url($day_link); ?>"><?php print esc_html($date); ?></a>
												</div>
											<?php	
												endif;
											?>
											<?php if ($blog_single_author == true): ?>
												<div class="col-md-4 col-sm-12  author no-padding">
													<?php the_author_posts_link(); ?>
												</div>
											<?php endif; ?>
											<?php if ($blog_show_comments == true): ?>
												<div class="col-md-4 col-sm-12  comments no-padding">
													<a href="<?php comments_link(); ?>"><?php comments_number(); ?></a>
												</div>
											<?php endif; ?>
										</div>
									</div>
								</div>
							<?php endif; ?>	
							<?php the_content(); wp_link_pages('before=<div class="post_nav"><span>'.__( "Pages:", "accountant-wp" ).' </span>&after=</div>'); ?>				
						</div>

						<div class="post-categories-container">
							<?php if(get_the_tags()) {
								the_tags(); ?><br><br>
							<?php }
							_e('Categories: ', 'accountant-wp'); the_category(', ');?>
						</div>

						<?php comments_template(); ?> 
					</div>
			<?php endwhile;?>
			</div>
		</div>
	</div>
<?php wp_link_pages(); ?>
<?php } else { ?>
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
					print '<div class=" col-md-12 col-sm-12 ">';
				else:
					print '<div class=" col-md-12 col-sm-12 ">';
				endif;
				?>
				<div class="post-category">
					<div class="post-advisor">
						<?php if ($blog_single_thumb == true && $post_show_thubnail !== 'on'): ?>
							<div class="photo-advisor">
								<?php the_post_thumbnail(); ?>
							</div>
						<?php endif; ?>
						<?php if ($blog_show_date == true || $blog_single_author == true || $blog_show_comments == true): ?>
							<div class="row">
								<div class="col-md-8 col-lg-8 ">
									<div class="title-blog">
										<?php
										if ($blog_show_date == true): ?>
											<div class="col-md-4 col-sm-12  no-padding">
												<a class="date" href="<?php print esc_url($day_link); ?>"><?php print esc_html($date); ?></a>
											</div>
											<?php
										endif;
										?>
										<?php if ($blog_single_author == true): ?>
											<div class="col-md-4 col-sm-12  author no-padding">
												<?php the_author_posts_link(); ?>
											</div>
										<?php endif; ?>
										<?php if ($blog_show_comments == true): ?>
											<div class="col-md-4 col-sm-12  comments no-padding">
												<a href="<?php comments_link(); ?>"><?php comments_number(); ?></a>
											</div>
										<?php endif; ?>
									</div>
								</div>
							</div>
						<?php endif; ?>
						<?php the_content(); wp_link_pages('before=<div class="post_nav"><span>'.__( "Pages:", "accountant-wp" ).' </span>&after=</div>'); ?>
					</div>

					<div class="row">
						<?php if(get_the_tags()) {
							the_tags(); ?><br><br>
						<?php }
						_e('Categories: ', 'accountant-wp'); the_category(', ');?>
					</div>
					<?php comments_template(); ?>
				</div>
			<?php endwhile;?>
		</div>
	</div>
	</div>
<?php	}?>
<?php get_footer() ?>