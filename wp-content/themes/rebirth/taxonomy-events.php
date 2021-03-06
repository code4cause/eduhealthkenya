<?php get_header(); ?>

	<section id="main">
		<article>
		
			<section class="shadow"></section>
			<br />

			<?php js_breadcrumbs($post->ID); ?>
			
			<section id="content" class="full">
				<?php
				// Get the Event category and display the title.
				$cat = get_query_var('events');
				$category_name = get_term_by('slug',$cat,'events'); ?>
								
				<?php echo '<h1 class="bitter">'.$category_name->name.'</h1>'; ?>
	
				<?php
				
				if ( get_query_var('paged') ) { $paged = get_query_var('paged'); } 
				elseif ( get_query_var('page') ) { $paged = get_query_var('page'); } 
				else { $paged = 1; }
				
				if ($paged == 1){ the_content(); }
				
				$current_timestamp = time();
				$current_timestamp = date('M d, Y',$current_timestamp);
				$current_timestamp = strtotime($current_timestamp) * 1000;
				$counter = 0;
				
				$all_posts = array(
					'post_type' => 'event-items',
				    'posts_per_page' => get_option('posts_per_page'),
				    'orderby' => 'meta_value',
				    'meta_key' => '_start_date',
				    'order' => 'ASC',
				    'events' => $cat,
				    'meta_query' => array(
				    	array(
				    		'key' => '_start_date',
				    		'compare' => '>=',
				    		'value' => $current_timestamp,
				    		'type' => 'NUMERIC')
				    	),
				    'paged'=> $paged,
				);
				query_posts($all_posts);
								
				if ( have_posts() ) : ?>
				
					<section id="upcoming" class="cols">
		
						<section class="three-quarters full">
						
							<ul>
								
								<?php while ( have_posts() ) : the_post(); global $post;
								
								$start_date = strtotime(get_post_meta($post->ID,'_start_date_visual',true));
								$end_date = strtotime(get_post_meta($post->ID,'_end_date_visual',true));
								$address = get_post_meta($post->ID,'_address',true);
								$custom_title = get_post_meta($post->ID,'_custom_title',true);
								$custom_text = get_post_meta($post->ID,'_custom_text',true);
								$counter++;
								
								?>
								
								<?php
								if (of_get_option('js_time_format') && of_get_option('js_time_format') == '24h'){
									$date_format = 'G:i';
								} else {
									$date_format = 'g:ia';
								}		
								?>
								
								<li<?php if ($counter == 4) { echo ' class="last"'; } ?>>
									<a href="<?php the_permalink(); ?>">
										<?php if ($start_date){ ?><span class="date"><?php echo strftime('%b',$start_date); ?> <strong><?php echo date('d',$start_date); ?></strong></span><?php } ?>
										<span class="thumbnail">
											<?php
											if (has_post_thumbnail($post->ID)){
												echo get_the_post_thumbnail($post->ID,'event-thumbnail');
											} else {
												echo '<img width="220" height="98" src="'.get_template_directory_uri().'/_theme_styles/images/default_event_thumb.jpg" />';
											}
											?>
											<span class="overlay"></span>
											<?php if ($start_date){ ?><strong class="time"><?php echo date($date_format,$start_date); ?></strong><?php } ?>
										</span>
				
										<strong class="bitter"><?php the_title(); ?></strong>
				
										<?php if ($start_date){ ?><strong class="row"><span class="right"><?php echo strftime('%B %d',$start_date).' @ '.date($date_format,$start_date); ?></span> <?php _e('Starts:','rebirth'); ?></strong><?php } ?>
										<?php if ($end_date){ ?><strong class="row"><span class="right"><?php echo strftime('%B %d',$end_date).' @ '.date($date_format,$end_date); ?></span> <?php _e('Ends:','rebirth'); ?></strong><?php } ?>
										<?php if ($address){ ?><strong class="row"><span class="right"><?php echo nl2br($address); ?></span> <?php _e('Location:','rebirth'); ?></strong><?php } ?>
									</a>
									
									<?php if ($custom_title && $custom_text){ ?>
										<strong class="custom-row"><span class="right"><?php echo $custom_text; ?></span> <?php echo $custom_title; ?>:</strong>
									<?php } ?>
									
								</li>
									
								<?php if ($counter == 4) { echo '<div class="cl"></div>'; $counter = 0; }
			
							endwhile;
							
							?></ul>
						
						</section>
						
					</section>
					
				<?php endif; ?>
				
				<?php js_get_pagination(); wp_reset_query(); ?>
				
			</section>
			
		</article>
	</section>

<?php get_footer(); ?>