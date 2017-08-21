<?php if(get_option('page_on_front') > 1) {  ?>
<div id='comments' class="post-comments">

	<?php
	if (get_comments_number()>0) { ?>
		<div class="title-comment">

			<h3><?php esc_html_e('Comments', 'accountant-wp'); ?></h3>

		</div>
	<?php } ?>

	<div class="bs-example">

		<?php foreach ($comments as $key => $comment) { ?>

		<div class="media">

			<div class="media-body">

				<div class="boxer-comment">

					<div class="top-comment">

						<h4 class="media-heading"><?php print esc_html(comment_author()); ?> </h4>

						<span class="date"><?php print esc_html(comment_date()); ?></span>

						<?php comment_reply_link( array( 'reply_text'=>'Reply &#8594;', 'depth' => '1', 'max_depth'=>'2' )

							, $comment->comment_ID

							, $comment->comment_post_ID

							); ?>

						</div>

						<p><?php print wp_kses_post( $comment->comment_content ); ?></p>

						<?php if(empty($comments[$key+1]->comment_parent)):

						print '</div></div>';

						endif;

						if(!empty($comment->comment_parent)):

							print '</div></div>';

						endif;

						?>

					</div>

					<?php } ?>

				</div>

				<?php

				$commenter = wp_get_current_commenter();

				$req      = get_option( 'require_name_email' );

				$aria_req = ( $req ? " aria-required='true'" : '' );

				$html_req = ( $req ? " required='required'" : '' );

				$html5    = 'html5' === 'email';



				$comments_args = array(

					'fields'               => array(

						'author' => '<div class="row item">
						<div class=" col-md-6 col-sm-6 comment-form-author">' . '' .

						'<input id="author" class="form-control" placeholder="'.__("Name*", "accountant-wp").'" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . $html_req . ' /></div>',

						'email'  => '<div class=" col-md-6 col-sm-6 comment-form-email">' .

						'<input id="email" class="form-control" name="email" placeholder="'.__("Email*", "accountant-wp").'" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" aria-describedby="email-notes"' . $aria_req . $html_req  . ' /></div>
						</div>',
						),


					'label_submit' => __("Send", "accountant-wp"),

					'title_reply'=>__("LEAVE A COMMENT", "accountant-wp"),

					'class_form' => 'comment-form',

					'class_submit' =>'col-md-3 col-xs-4 col-sm-4',

					'comment_field' => '',

					);

					?>


					<div style="display:none;"><?php wp_list_comments(); paginate_comments_links(); ?></div>
					<?php if(comments_open()){?>
						<div class="block-leave-comment">
							<?php comment_form( $comments_args,  get_the_ID()); ?>
						</div>
					<?php } ?>

				</div>
		<?php } else { ?>
			<div id="comments" class="comments-area">

				<?php if ( have_comments() ) : ?>
					<h2 class="comments-title">
						<?php
						$comments_number = get_comments_number();
						if ( 1 === $comments_number ) {
							/* translators: %s: post title */
							printf( _x( 'One thought on &ldquo;%s&rdquo;', 'comments title', 'accountant-wp' ), wp_kses_post(get_the_title()) );
						} else {
							printf(
							/* translators: 1: number of comments, 2: post title */
								_nx(
									'%1$s thought on &ldquo;%2$s&rdquo;',
									'%1$s thoughts on &ldquo;%2$s&rdquo;',
									$comments_number,
									'comments title',
									'accountant-wp'
								),
								number_format_i18n( $comments_number ),
								get_the_title()
							);
						}
						?>
					</h2>

					<?php the_comments_navigation(); ?>

					<ol class="comment-list">
						<?php
						wp_list_comments( array(
							'style'       => 'ol',
							'short_ping'  => true,
							'avatar_size' => 42,
						) );
						?>
					</ol><!-- .comment-list -->

					<?php the_comments_navigation(); ?>

				<?php endif; // Check for have_comments(). ?>

				<?php
				// If comments are closed and there are comments, let's leave a little note, shall we?
				if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'accountant-wp' ) ) :
					?>
					<p class="no-comments"><?php _e( 'Comments are closed.', 'accountant-wp' ); ?></p>
				<?php endif; ?>

				<?php
				comment_form( array(
					'title_reply_before' => '<h2 id="reply-title" class="comment-reply-title">',
					'title_reply_after'  => '</h2>',
				) );
				?>

			</div><!-- .comments-area -->

		<?php	}?>
