<?php get_header() ?>
	<div class="container container-index">
	<div class="row">
<?php get_sidebar() ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post();

	$date_month = get_the_time('M');
	$date_day   = get_the_time('d');
	$comments_link = get_comments_link();
	$comments_number = get_comments_number();
	$post_categories = wp_get_post_categories( get_the_ID() );
	$category_link = get_category_link($post_categories);
	$category_name = get_cat_name($post_categories);

	?>

	<div class="col-sm-12  col-md-8 blog-height ">

		<div <?php post_class('') ?>>

		</div>

		<div class="item">

			<div class="post-advisor">

				<div class="photo-advisor">


						<span class="date-photo">
					                <span class="line-date"><?php print esc_html($date_day); ?></span>
					                <span class="line-date"><?php print esc_html($date_month); ?></span>
				                </span>

					<?php
					$image = wp_get_attachment_image( get_post_thumbnail_id(get_the_ID()), 'accountant_post-thumb' );

						print '<a href="'.esc_url(get_permalink()).'">'.wp_kses_post($image).'</a>';

					?>
				</div>

				<div class="title-blog">
					<?php

							print '<h4><a href="'.esc_url(get_permalink()).'">'.wp_kses_post(get_the_title()).'</a></h4>';

					?>
				</div>
				<div class="boxes-blog">
					<?php

						print ''.wp_kses_post(get_the_author_posts_link()).' <span>/</span>';


						print '<a href="'. esc_url($category_link)  .'" >'.esc_html($category_name).'</a> <span>/</span>';


						print '<a  href="'. esc_url($comments_link)  .'">'. esc_html($comments_number).' '.__('Comments', 'accountant-wp').'</a> <span >/</span>';
					print '<a  href="'. esc_url(get_the_permalink())  .'">'.get_the_tag_list( '', ', ').'</a> ';



					?>
				</div>
				<?php print '<p>'.esc_html(strip_tags(accountant_content(25)), 'img').'</p>'; ?>
			</div>

		</div>

	</div>

<?php endwhile; ?>
	<div class="container test-container">
		<?php
		the_posts_pagination(array(
			'before_page_number' => '<span class="meta-nav screen-reader-text">' . __('Page', 'accountant-wp') . ' </span>',
		));
		?>
	</div>
	<?php print '</div>';
	wp_reset_postdata();

	?>
	</div>
	</div>
	</div>



<?php endif; ?>

<?php get_footer() ?>