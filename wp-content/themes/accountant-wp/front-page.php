<?php if(get_option('page_on_front') > 1) {  ?>
<?php get_header() ?>
<?php get_sidebar() ?>
<?php the_post() ?>
<?php
global $post;
$postID = $post->ID;
$page_layout = get_post_meta( $postID, '_wpc_page_layout', true );
?>
<?php if ($page_layout == 'right-sidebar' || $page_layout == 'left-sidebar'): ?>
	<div class="col-xs-12 col-md-8 col-sm-12">
		<?php the_content() ?>
	</div>
<?php else: ?>
	<?php the_content() ?>
<?php endif; ?>
<?php if (accountant_option('page_comments') == true): ?>
	<?php
	comments_template();
	?>
<?php endif; ?>
<?php get_footer() ?>
<?php } else {
	get_template_part('index');
}?>


