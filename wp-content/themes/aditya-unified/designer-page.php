<?php
/**
 * Template Name: Designer Template
 * @author Aditya Jyoti Saha
 */

get_header(); ?>

		<div id="primary">
			<div id="content" role="main">
<!-- Customizzed HTML -->
	<section id="body">



		<div class="designer_level">

        	<?php //dynamic_sidebar('designer'); ?>

        	<?php if ( !dynamic_sidebar('designer') ) : ?>

			<?php if ( have_posts() ) : ?>

				<?php twentyeleven_content_nav( 'nav-above' ); ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', get_post_format() ); ?>

				<?php endwhile; ?>

				<?php twentyeleven_content_nav( 'nav-below' ); ?>

			<?php else : ?>

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'twentyeleven' ); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'twentyeleven' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; ?>

			<?php endif; ?>

      	</div>

      <div class="clear"></div>
   </section>

<!-- End -->
			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_footer(); ?>