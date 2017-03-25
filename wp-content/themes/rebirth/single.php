<?php get_header(); ?>
		
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<section id="main">
		<article>
		
			<?php $featured_caption = get_the_title(get_post_thumbnail_id(get_the_ID())); ?>
			<?php $featured_image = get_the_post_thumbnail($post->ID,'large-full-banner', array('title'=>$featured_caption)); ?>
		
			<?php if ($featured_image){ ?>
				<section id="main-image">
					<section class="top"></section>
					<section class="bottom"></section>
					<?php echo get_the_post_thumbnail($post->ID,'large-full-banner', array('title'=>$featured_caption)); ?>
				</section>
			<?php } else { ?>
				<section class="shadow"></section>
				<br />
			<?php } ?>

			<?php js_breadcrumbs($post->ID); ?>

			<section id="content" class="left">
				<h1 class="bitter"><?php the_title(); ?></h1>

				<section class="entry">
					<section class="shadow"></section>

					<?php the_content(); ?>
					
					<?php if ( get_the_author_meta( 'description' )) : // If a user has filled out their description and this is a multi-author blog, show a bio on their entries ?>
					<div id="author-info">
						<h2><?php printf( __( 'About %s', 'flip' ), get_the_author() ); ?></h2>
						<div class="avatar-wrap">
							<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'twentyeleven_author_bio_avatar_size', 55 ) ); ?>
						</div><!-- #author-avatar -->
						<div class="description">
							<p class="author-desc"><?php the_author_meta( 'description' ); ?></p>
							<p class="author-link"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
								<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'flip' ), get_the_author() ); ?>
							</a></p>
						</div>
					</div><!-- #author-info -->
					<?php endif; ?>
					
					<?php comments_template(); ?>
					
				</section>
			</section>

			<section id="sidebar" class="right">
				
				<?php get_sidebar(); ?>
				
			</section>
		</article>
	</section>
	
	<?php endwhile; endif; ?>

<?php get_footer(); ?>