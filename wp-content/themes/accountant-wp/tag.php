<?php get_header() ?>
	<div class="container">
	<div class="row">
<?php get_sidebar() ?>
<?php
$blog_page_title = accountant_option('blog_page_title');
$blog_show_comments = accountant_option('blog_show_comments');
$blog_show_date = accountant_option('blog_show_date');
$blog_show_category = accountant_option('blog_show_category');
$blog_read_more = accountant_option('blog_read_more');
$blog_title_linkable = accountant_option('blog_title_linkable');
$blog_image_linkable = accountant_option('blog_image_linkable');
$blog_single_author = accountant_option('blog_single_author');

$page_layout = accountant_option('archive_layout');
if($page_layout == 'left-sidebar' || $page_layout == 'right-sidebar'):
	$boot_class_parent = '8';
	$boot_class = '6';
else:
	$boot_class_parent = '12';
	$boot_class = '4';
endif;
?>


<?php if(get_option('page_on_front') > 1) {  ?>
<div class=" col-md-<?php print esc_html($boot_class_parent); ?> col-sm-12">

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post();

		$date_month = get_the_time('M');
		$date_day   = get_the_time('d');
		$comments_link = get_comments_link();
		$comments_number = get_comments_number();
		$post_categories = wp_get_post_categories( get_the_ID() );
		$category_link = get_category_link($post_categories);
		$category_name = get_cat_name($post_categories);

		?>

		<div class=" col-md-<?php print esc_html($boot_class); ?> col-sm-<?php print esc_html($boot_class); ?> blog-height">

			<div class="item">

				<div class="post-advisor">

					<div class="photo-advisor ">

						<?php if ($blog_show_date == true): ?>
							<span class="date-photo">
					                <span class="line-date"><?php print esc_html($date_day); ?></span>
					                <span class="line-date"><?php print esc_html($date_month); ?></span>
				                </span>
						<?php endif; ?>
						<?php
						$image = wp_get_attachment_image( get_post_thumbnail_id(get_the_ID()), 'accountant_post-thumb' );
						if ($blog_image_linkable == true):
							print '<a href="'.esc_url(get_permalink()).'">'.wp_kses_post( $image ).'</a>';
						else:
							print wp_kses_post( $image );
						endif;
						?>
					</div>

					<div class="title-blog">
						<?php
						if ($blog_page_title == true):
							if ($blog_title_linkable == true):
								print '<h4><a href="'.esc_url(get_permalink()).'">'.wp_kses_post(get_the_title()).'</a></h4>';
							else:
								print '<h4>'.wp_kses_post(get_the_title()).'</h4>';
							endif;
						endif;
						?>
					</div>
					<div class="boxes-blog">
						<?php
						if($blog_single_author == true):
							print ''.wp_kses_post(get_the_author_posts_link()).' <span>/</span>';
						endif;
						if($blog_show_category == true):
							print '<a href="'.esc_url($category_link).'">'.esc_html($category_name).'</a> <span>/</span>';
						endif;
						if ($blog_show_comments == true):
							print '<a href="'.esc_url($comments_link).'">'.esc_html($comments_number).' Comments</a>';
						endif;
						?>
					</div>
					<?php print '<p>'.esc_html(strip_tags(accountant_content(25)), 'img').'</p>'; ?>
				</div>

			</div>

		</div>

	<?php endwhile;
		paginate_comments_links();
		$res = paginate_links(array(
			'base' => str_replace( $big = 999999999, '%#%', get_pagenum_link( $big ) ),
			'current' => max( 1, get_query_var('paged') ),
			'total' => $post->max_num_pages,
			'show_all' => true,
			'prev_text'    => esc_html__('&#8592; Prev', 'accountant-wp'),
			'next_text'    => esc_html__('Next &#8594;', 'accountant-wp'),
		));
		$res = str_replace( '/page/1', '', $res );
		print '<div class="wp-pagenevi">'.wp_kses_post( $res ).'</div>';
		print '</div>';
		wp_reset_postdata();

		?>
		</div>
		</div>
		</div>

	<?php endif; ?>
<?php } else { ?>

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


						print '<a>'.esc_html($category_name).'</a> <span>/</span>';


						print '<a >'.esc_html($comments_number).' Comments</a>';

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
<?php	}?>


<?php get_footer() ?>