<?php
/**
 * Template Name: Home page template
 * @author Aditya Jyoti Saha
 */

get_header(); ?>

		<div id="primary">
			<div id="content" role="main">
<!-- Customizzed HTML -->
	<section id="body">
		<div class="body_left">
          <div class="wrapper">
		<?php dynamic_sidebar('home-design'); ?>
		<?php dynamic_sidebar('home-dev'); ?>
		<?php dynamic_sidebar('home-seo'); ?>
          	  <!--<div class="design">
                 <h2>Web Designer</h2>
                     <ul class="design_txt">
                    	<li>Web 2.0 Template Design</li>
                        <li>Joomla Web Design</li>
                        <li>Web 2.0 Logo Design</li>
                        <li>Hire Web Designer</li>
                    </ul>
                   <div class="hour_box">
                      <div class="hour"><span>$10/</span><br/>hr only.</div>
                        <div class="see_detail">See details &amp; <br/>billing models</div>
                    </div>

                  <div class="clear"></div>
                </div>

                <div class="development">
                 <h2 style="color:#82bb00;">Development</h2>
                    <ul class="design_txt2">
                    	<li>PHP Web Development</li>
                        <li>ASP and ASP.Net Development</li>
                        <li>Ecommerce Development</li>
                        <li>Custom Web Programming</li>
                    </ul>
                   <div class="hour_box2">
                      <div class="hour"><span>$10/</span><br/>hr only.</div>
                        <div class="see_detail" style="margin-right:10px;">See details &amp; <br/>billing models</div>
                    </div>
                  <div class="clear"></div>
                </div>

                <div class="design" style="float:right; border-top:3px solid #ff0000;">
                 <h2 style="color:#ff0000;">SEO</h2>
                    <ul class="design_txt">
                    	<li>Web 2.0 Template Design</li>
                        <li>Joomla Web Design</li>
                        <li>Web 2.0 Logo Design</li>
                        <li>Hire Web Designer</li>
                    </ul>
                   <div class="hour_box" style="background: url(<?php bloginfo( 'template_directory' ); ?>/images/see_detail3.png) left center no-repeat;">
                      <div class="hour"><span>$10/</span><br/>hr only.</div>
                        <div class="see_detail">See details &amp; <br/>billing models</div>
                    </div>
                  <div class="clear"></div>
                </div>-->

            <div class="clear"></div>
          </div>

         <!-- Tab Script will be here -->

		  <div class="tab_box" style="margin-bottom: 10px;">
       	   <div class="tab_box_inner" style="height:350px;">


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


       	   </div>
       	  </div>

         <!-- Tab Script End -->

        </div>

<!-- End -->
			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>