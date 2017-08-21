<?php get_header() ?>
<?php the_post(); ?>
		<?php 		
			$main_id = get_the_ID();
            $title = get_the_title();
            $permalink = get_the_permalink();
            $staff_name = get_post_meta( get_the_ID(), 'staff_name', true );
            $staff_single_image = get_post_meta( get_the_ID(), 'staff_single_image', true ); 
            $staff_facebook = get_post_meta( get_the_ID(), 'staff_facebook', true );
            $staff_twitter = get_post_meta( get_the_ID(), 'staff_twitter', true );
            $staff_linkedin = get_post_meta( get_the_ID(), 'staff_linkedin', true );
            $staff_mail = get_post_meta( get_the_ID(), 'staff_mail', true );
        ?>
		<div class="main-profile">
			<div class="container">
				<div class="row border-b">
					<div class="col-md-6 col-sm-12 ">
						<div class="poster-user">
							<img src="<?php print esc_url($staff_single_image); ?>">
						</div>
					</div>
					<div class="col-md-6 col-sm-12 ">
						<div class="single">
							<div class="head-user">
								<h2><?php print  esc_html($staff_name); ?></h2>
								<p><?php the_title(); ?></p>
							</div>
							<?php the_content(); ?>
							<div class="soc-box">
								<?php
								if(!empty($staff_facebook)):
                                    print '<a class="facebook" href="'.esc_url($staff_facebook).'"><i class="fa fa-facebook"></i></a>';
                                endif;
                                if(!empty($staff_twitter)):
                                    print '<a class="twitter" href="'.esc_url($staff_twitter).'"><i class="fa fa-twitter"></i></a>';
                                endif;
                                if(!empty($staff_linkedin)):
                                    print '<a class="linkedin" href="'.esc_url($staff_linkedin).'"><i class="fa fa-linkedin"></i></a>';
                                endif;
                                if(!empty($staff_mail)):
                                    print '<a class="mail" href="mailto:'.esc_url($staff_mail).'"><i class="fa fa-envelope"></i></a>';
                                endif;
                                ?>
							</div>
						</div>
					</div>
				</div>
				<?php 	
					$create_staff = new WP_Query( array(
						'post_type' => 'create_staff'
					) ); 
					$ids = array();
					while($create_staff->have_posts()): $create_staff->the_post();
						$ids[] = get_the_ID();
					endwhile;
					$i = 0;
					$count_ids = count($ids)-1;
					foreach ($ids as $id) {
						if ($main_id == $id) {
							if ($i-1 < 0):
								$id1 = $ids[$count_ids];
								$id2 = $ids[$i+1];
							elseif ($i+1 > $count_ids):
								$id1 = $ids[$i-1];
								$id2 = $ids[0];
							else:
								$id1 = $ids[$i-1];
								$id2 = $ids[$i+1];
							endif;
						}
						$i++;
					}
					 $links = new WP_Query( 
					 	array( 'post_type' => 'create_staff', 'post__in' => array( $id1,$id2 ) ) 
					 );
					 
					 $arrayPost = array();
					  while($links->have_posts()){
					  	$links->the_post();
					  	if($post->ID == $id1){
					  		$arrayPost['0'] = $post;
					  	}else{
					  		$arrayPost['1'] = $post;
					  	}
					  } 
					ksort($arrayPost);					
				?>
				<div class="row boxe-border">
				<?php $j = 0; ?>
				<?php foreach ($arrayPost as $myPost){
					$staff_name_id = get_post_meta( $myPost->ID, 'staff_name', true );
					if ($j == 0):
						$class_1 = 'borde-first';
						$class_2 = 'prev';
					else:
						$class_1 = ' ';
						$class_2 = 'next';
					endif;
				?>	
					<div class="col-md-6 col-sm-6 col-xs-6 <?php print esc_html($class_1); ?>">
						<a href="<?php print esc_url(get_permalink($myPost->ID)); ?>" class="<?php print esc_html($class_2); ?> link-page">
							<strong><?php print esc_html($staff_name_id); ?></strong>
							<span>(<?php print  esc_html(get_the_title( $myPost->ID )); ?>)</span>
						</a>
					</div>
				<?php 
					$j++;
					}
				?>
				</div>
			</div>
		</div>
<?php get_footer() ?>