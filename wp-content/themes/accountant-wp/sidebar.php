<?php 

	global $post;

	$postID = $post->ID;
	$page_layout = get_post_meta( $postID, '_wpc_page_layout', true );

	if(is_single() && $post_type != 'services_post'):
		$page_layout = accountant_option('blog_layout');
	elseif(is_archive() || is_author() || is_category() || is_tag()):
		$page_layout = accountant_option('archive_layout');
	endif;

?>

<?php if(get_option('page_on_front') > 1) {  ?>

<?php if ($page_layout == 'right-sidebar'): ?>

<div class=" col-md-4 sidebar-right col-sm-12 side-bar">
	<ul class="widgets-list">
		<?php if (accountant_is_blog() && $post->post_type !== 'services_post' && $post->post_type !== 'career_post'): ?>
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Sidebar Blog") && is_active_sidebar( 'Sidebar Blog' ) ) : ?>
			<?php endif; ?>
		<?php else: ?>
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Sidebar 1")  && is_active_sidebar( 'Sidebar 1' )) : ?>
			<?php endif; ?>
		<?php endif; ?>
	</ul>
</div>

<?php elseif ($page_layout == 'left-sidebar'): ?>

<div class=" col-md-4 col-sm-12 sidebar-left side-bar">
	<ul class="widgets-list">
		<?php if (accountant_is_blog() && $post->post_type !== 'services_post' && $post->post_type !== 'career_post'): ?>
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Sidebar Blog")  && is_active_sidebar( 'Sidebar Blog' )) : ?>
			<?php endif; ?>
		<?php else: ?>
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Sidebar 1")  && is_active_sidebar( 'Sidebar 1' )) : ?>
			<?php endif; ?>
		<?php endif; ?>
	</ul>
</div>

<?php endif; ?>
<?php if ($page_layout == 'right-sidebar' || $page_layout == 'left-sidebar'): ?>
	<span class="page_layout-sidebar"></span>
<?php endif; ?>
<?php } else { ?>
	<div class=" col-md-4 sidebar-right col-sm-12 side-bar">
		<ul class="widgets-list">
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Sidebar Blog") && is_active_sidebar( 'Sidebar Blog' ) ) : ?>
				<?php endif; ?>
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Sidebar 1")  && is_active_sidebar( 'Sidebar 1' )) : ?>
				<?php endif; ?>
		</ul>
	</div>
<?php	}?>


