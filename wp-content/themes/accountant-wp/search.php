
<?php get_header(); ?>

<div class="main-search">
	<div class="container">
		<div class="search-title">
			<h2><?php printf( esc_html__( 'Search Results for: %s', 'accountant-wp' ), '<strong>' . get_search_query() . '</strong>' ); ?></h2>
		</div>

		<?php
		if (get_post_type() == 'create_chartered'):
			get_search_form();
		else:
			print accountant_my_search_form();
		endif;
		?>

		<div class="faq">
			<div class="bs-example bs-example-tabs">
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane active">
						<?php $accountant_i = 1;
						if (have_posts()):
							while(have_posts()): the_post(); 

							$accountant_media_open_class = ($accountant_i == 1) ? 'open' : ''; ?>

								<div class="media <?php print esc_attr($accountant_media_open_class); ?>">
									<div class="hidden-xs hidden-sm"></div>
									<div class="media-body hidden-xs hidden-sm">

										<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
										<?php accountant_qode_excerpt(50); ?>

									</div>

									<div class="media-body width_auto visible-xs visible-sm">
										<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
										<div class="hide-part"><div class="hide-part-content"><?php accountant_qode_excerpt(50); ?></div></div>
									</div>

								</div>	
							<?php 
							$accountant_i++;
							endwhile;					      		

							else:

								print '<div class="media"><h3>'.esc_html__( 'No Records!', 'accountant-wp' ).'</h3></div>';

							endif;

							?>

						</div>

					</div>

				</div>

			</div>

			<?php 
				global $wp_query;
				$res = paginate_links(array(
                    'base' => str_replace( $big = 999999999, '%#%', get_pagenum_link( $big ) ),
                    'current' => max( 1, get_query_var('paged') ),
                    'total' => $wp_query->max_num_pages,
                    'show_all' => true,
                    'prev_text'    => esc_html__('&#8592; Prev', 'accountant-wp'),
                    'next_text'    => esc_html__('Next &#8594;', 'accountant-wp'),
                ));
                $res = str_replace( '/page/1', '', $res );
                print '<div class="wp-pagenevi">'. wp_kses_post($res) .'</div>';
            	print '</div>';
				wp_reset_postdata();
			?>

		</div>	

	</div>

	<?php get_footer(); ?>