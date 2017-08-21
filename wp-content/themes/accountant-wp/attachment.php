<?php get_header() ?>
<div id="container">
	<div id="content">

		<?php the_post() ?>

		<h2 class="page-title"><a href="<?php print esc_url( get_permalink($post->post_parent) );?>" rev="attachment"><?php print esc_html( get_the_title($post->post_parent) ); ?></a></h2>
		<div id="post-<?php the_ID(); ?>" class="<?php sandbox_post_class() ?>">
			<h3 class="entry-title"><?php the_title() ?></h3>
			<div class="entry-content">
				<div class="entry-attachment"><a href="<?php  print esc_url( wp_get_attachment_url($post->ID)); ?>" title="<?php print esc_html( get_the_title($post->ID), 1 ) ?>" rel="attachment">
						<?php print esc_html( basename($post->guid) ); ?></a></div>
				<div class="entry-caption"><?php if ( !empty($post->post_excerpt) ) the_excerpt(); ?></div>
				<?php the_content(''.wp_kses( __( 'Read More <span class="meta-nav">&raquo;</span>', 'accountant-wp' ), array( 'span' => array(
							'class' => array(),
					), ) ) .'') ?>

			</div>
			<?php if ( wp_attachment_is_image($post->ID) ) { ?>
			<div id="nav-images" class="navigation">
				<div class="nav-previous"><?php previous_image_link() ?></div>
				<div class="nav-next"><?php next_image_link() ?></div>
			</div>
			<?php } ?>
			<div class="entry-meta">
				<?php printf(esc_html__('Posted by %1$s, on <abbr class="published" title="%2$sT%3$s">
%4$s at %5$s</abbr>. Bookmark the <a href="%6$s" title="Permalink to %7$s" rel="bookmark">permalink</a>. Follow any comments here with the <a href="%8$s" title="Comments RSS to %7$s" rel="alternate" type="application/rss+xml">RSS feed for this post</a>.', 'accountant-wp'),
					'<span class="author vcard"><a class="url fn n" href="'.get_author_link(false, $authordata->ID, $authordata->user_nicename).'" title="' . sprintf(esc_html__('View all posts by %s', 'accountant-wp'), $authordata->display_name) . '">'.get_the_author().'</a></span>',
					get_the_time('Y-m-d'),
					get_the_time('H:i:sO'),
					the_date( '', '', '', false ),
					get_the_time(),
					get_permalink(),
					esc_html( get_the_title(), 'double' ),
					get_post_comments_feed_link() ) ?>

					<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) : // Comments and trackbacks open ?>
					<?php printf(esc_html__('<a class="comment-link" href="#respond" title="Post a comment">Post a comment</a> or leave a trackback: <a class="trackback-link" href="%s" title="Trackback URL for your post" rel="trackback">Trackback URL</a>.', 'accountant-wp'), get_trackback_url()) ?>
				<?php elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) : // Only trackbacks open ?>
				<?php printf(esc_html__('Comments are closed, but you can leave a trackback: <a class="trackback-link" href="%s" title="Trackback URL for your post" rel="trackback">Trackback URL</a>.', 'accountant-wp'), get_trackback_url()) ?>
			<?php elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) : // Only comments open ?>
			<?php printf(esc_html__('Trackbacks are closed, but you can <a class="comment-link" href="#respond" title="Post a comment">post a comment</a>.', 'accountant-wp')) ?>
		<?php elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) : // Comments and trackbacks closed ?>
		<?php esc_html_e('Both comments and trackbacks are currently closed.', 'accountant-wp' ) ?>
	<?php endif; ?>
	<?php edit_post_link(esc_html__('Edit', 'accountant-wp'), "\n\t\t\t\t\t<span class=\"edit-link\">", "</span>"); ?>

</div>
</div><!-- .post -->

<?php comments_template(); ?>

</div><!-- #content -->
</div><!-- #container -->

<?php get_sidebar() ?>
<?php get_footer() ?>