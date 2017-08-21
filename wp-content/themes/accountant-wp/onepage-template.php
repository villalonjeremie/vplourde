<?php
/*
Template Name: Onepage
*/
?>
<?php get_header('onepage') ?>
<?php get_sidebar() ?>
<?php the_post() ?>
<?php 
global $post;
$postID = $post->ID;
$page_layout = get_post_meta( $postID, '_wpc_page_layout', true );
?>
<?php if ($page_layout == 'right-sidebar' || $page_layout == 'left-sidebar'): ?>
	<div class=" col-md-8 col-sm-12">
		<?php the_content() ?>
	</div>
<?php else: ?>
	<div class="onepage">
		<?php the_content() ?>
	</div>
<?php endif; ?>
<?php if (accountant_option('page_comments') == true): ?>
	<?php 
	comments_template(); 
	?> 
<?php endif; ?>

<?php get_footer('onepage') ?>