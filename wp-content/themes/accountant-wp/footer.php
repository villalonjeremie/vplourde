	
	</div>
</div>
<div class="hidden-block">	
<?php 
	$footer_widgets = accountant_option('footer_widgets');
	if ($footer_widgets == 1): ?>
	<div id="footer" class="footer">
		<div class="container">
			<div class="row visible-xs visible-sm">
				<?php footer_widget_responsive_block('footer_1'); ?>
				<?php footer_widget_responsive_block('footer_2'); ?>
				<?php footer_widget_responsive_block('footer_3'); ?>
				<?php footer_widget_responsive_block('footer_4'); ?>
			</div>
			<?php
				$footer_columns = accountant_option('footer_columns');
				$bootstrap_col = 4;
				if($footer_columns == '1'):
					$bootstrap_col = 12;
				elseif ($footer_columns == '2'):
					$bootstrap_col = 6;
				elseif ($footer_columns == '3'):
					$bootstrap_col = 4;
				elseif ($footer_columns == '4'):
					$bootstrap_col = 3;
				endif;
			?>
			<div class="row hidden-sm hidden-xs">
				<div class="col-md-<?php print esc_html($bootstrap_col); ?> col-sm-12 ">
					<ul class="footerww">
						<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer 1") && is_active_sidebar( 'Footer 1' )) : ?>
						<?php endif; ?>
					</ul>
				</div>
				<div class="col-md-<?php print esc_html($bootstrap_col); ?> col-sm-12 ">
					<ul class="footerww">
						<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer 2") && is_active_sidebar( 'Footer 2' ) ) : ?>
						<?php endif; ?>
					</ul>
				</div>
				<div class="col-md-<?php print esc_html($bootstrap_col); ?> col-sm-12 ">
					<ul class="footerww">
						<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer 3") && is_active_sidebar( 'Footer 3' ) ) : ?>
						<?php endif; ?>
					</ul>
				</div>
				<div class="col-md-<?php print esc_html($bootstrap_col); ?> col-sm-12 ">
					<ul class="footerww">
						<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer 4") && is_active_sidebar( 'Footer 4' )) : ?>
						<?php endif; ?>
					</ul>
				</div>
			</div>
		</div>	
	</div>
	<?php endif; ?>
	<div class="footer-copy">
		<div class="container">	
			<div class="row">
				<div class="col-md-3 col-sm-12 ">
					<?php
					$opt_slides = accountant_option('opt-slides');
					if (!empty($opt_slides)):
						print '<div class="soc-box">';
						foreach ($opt_slides as $soc) { 
							if (!empty($soc['url']) ){
								if (empty($soc['image'])) :
									print '<a href="'.esc_url($soc['url']).'"><i class="fa '.esc_html($soc['description']).'"></i></a>';
								else :
									print '<a href="'.esc_url($soc['url']).'"><img src="'.esc_url($soc['image']).'"></a>';
								endif;	
							}
						}
						print '</div>';
					endif;
					?>
				</div>
				<div class="col-md-5 col-sm-12 ">
					<div class="copy">
						<p><?php
							if ( accountant_option('footer_copyright') == '' ) {
								printf( esc_html__( 'Accountant &copy; 2016 %1$s - Theme by %2$s', 'accountant-wp' ), get_bloginfo('name'), '<a href="'. esc_url( esc_html__( 'http://www.azelab.com/', 'accountant-wp' ) ) .'" >'.esc_html__( 'Azelab', 'accountant-wp' ).'</a>' );
							} else {
								print wp_kses_post( accountant_option('footer_copyright') );
							}
							?>
						</p>
					</div>
				</div>
				<div class="col-md-4 col-sm-12 ">
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer join form") ) : ?>
					<?php endif; ?>
				</div>
			</div>
		</div>	
	</div>
</div>
<?php if ( accountant_option('page_back_totop') ) { ?>
<div id="btt"><i class="fa fa-angle-double-up"></i></div>
<?php } ?>

<?php 	
	global $post;
    $postID = $post->ID;
    $border = get_post_meta( $postID, '_wpc_enable_page_svg_borders', true );
    if($border == true): 
?>
	    <div class="footer-data2 footer-data2-yes" ></div>

<?php else: ?>
	    <div class="footer-data2 " ></div>
<?php endif; ?> 
<?php $footer_paralax = accountant_option('footer_paralax');
	if ($footer_paralax == 1):
 ?>
<div class="footer-data footer-data-paralax" ></div>

<?php else: ?>
		<div class="footer-data" ></div>
<?php endif; ?>

<?php 
  if(accountant_option('header_fixed_top') == true):
  	$scroll_type = 'sticky-top';
  else:
  	$scroll_type = 'sticky';
  endif;
?>
<span class="scroll-span" data-scroll="<?php print esc_html($scroll_type); ?>"></span>
	</div>
<?php wp_footer() ?>
</body>
</html>