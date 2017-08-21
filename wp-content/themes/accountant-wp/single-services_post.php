<?php get_header() ?>
<div class="main-services-category">
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
			<?php the_post(); ?>
					<div class=" col-md-8 col-sm-12">
						<?php the_content(); ?>	
					</div>
				</div>
			</div>
		</div>
<?php get_footer() ?>