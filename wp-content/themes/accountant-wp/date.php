<?php get_header() ?>
<?php get_sidebar() ?>

<div class=" col-md-8 col-sm-12">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
	$archive_year  = get_the_time('Y');
	$archive_month = get_the_time('m');
	$archive_day   = get_the_time('d');
	$day_link = get_day_link($archive_year, $archive_month, $archive_day);
	$date = get_the_date( 'jS M');
	$blog_show_comments = accountant_option('blog_show_comments');
	$blog_show_date = accountant_option('blog_show_date');
	?>
	<div class=" col-md-6 col-sm-6">
		<div class="item">
			<div class="post-advisor">
				<div class="photo-advisor">
					<?php $image = wp_get_attachment_image( get_post_thumbnail_id($post->ID), 'accountant_post-thumb' );
					print '<a href="'.esc_url(get_permalink()).'">'.wp_kses_post($image).'</a>';
					?>
				</div>
				<div class="title-blog">
					<?php
					if ($blog_show_date == true): ?>
					<div class="col-md-3 col-sm-3 col-xs-4 no-padding">
						<a class="date" href="<?php print esc_url($day_link); ?>"><?php print esc_html($date); ?></a>
					</div>
					<?php
					endif;
					?>
					<div class="col-md-4 col-sm-4 col-xs-4 author no-padding">
						<?php the_author_posts_link(); ?>
					</div>
					<?php
					if ($blog_show_comments == true): ?>
					<div class="col-md-5 col-sm-5 col-xs-4 comments no-padding">
						<a href="<?php comments_link(); ?>"><?php comments_number(); ?></a>
					</div>
					<?php
					endif;
					?>
				</div>
				<?php print '<h4><a href="'.esc_url(get_permalink()).'">'.esc_html(get_the_title()).'</a></h4>'; ?>
				<?php print '<p>'.esc_html(strip_tags(accountant_content(25), 'img')).'</p>'; ?>
				<div>
					<a class="more" href="<?php the_permalink(); ?>"><?php esc_html_e('Read More &#8594;', 'accountant-wp') ?></a>
				</div>
			</div>
		</div>
	</div>
	<?php endwhile;
	wp_reset_postdata();
	?>
</div>
<?php endif; ?>
<?php get_footer() ?>