<?php get_header() ?>

<?php if(get_option('page_on_front') > 1) {  ?>
	<?php get_sidebar() ?>
<?php } ?>




<?php the_post() ?>
<?php 
global $post;
$postID = $post->ID;
$page_layout = get_post_meta( $postID, '_wpc_page_layout', true );
?>
	<?php

	$content = get_the_content();
	if (!stristr($content, 'vc_')) { ?>
		<h1 class=""><?php  the_title() ?></h1>
	<?php } ?>



<?php if ($page_layout == 'right-sidebar' || $page_layout == 'left-sidebar'): ?>
	<div class=" col-md-8 col-sm-12">
		<?php the_content(); wp_link_pages('before=<div class="post_nav"><span>'.__( "Pages:", "accountant-wp" ).' </span>&after=</div>'); ?>
	</div>
<?php else: ?>
	<?php the_content(); wp_link_pages('before=<div class="post_nav"><span>'.__( "Pages:", "accountant-wp" ).' </span>&after=</div>'); ?>

<?php endif; ?>
<?php if (accountant_option('page_comments') == true): ?>
	<?php 
	comments_template(); 
	?> 
<?php endif; ?>


<?php if(get_option('page_on_front') < 1) {  ?>
	<?php
	comments_template();
	?>
<?php	}?>


<?php get_footer();