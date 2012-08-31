<?php
/**
 * Template Name: How it works Template
 * @author Aditya Jyoti Saha
 */

get_header(); ?>

		<div id="primary">
			<div id="content" role="main">
<!-- Customizzed HTML -->
	<section id="body">



<div class="designer_level">
        <div class="howitworks_left">


        <?php //dynamic_sidebar('designer'); ?>


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


          <div class="simple_txt">
          	  <strong>4</strong> Simple Steps To Getting Started
          </div>
          <div class="simple_txt2"> It's easy to getting started now. Just follow these four easy steps below and convert your imagination into reality without any headache.</div>
          <div class="step_box">
          	 <div class="step_box_left"><img src="<?php bloginfo('template_directory')?>/images/step_01.png" alt=""></div>
             <div class="step_box_right">
                <h1>Select the Ideal Profile</h1>
                <p>First identify your requirements. Once you recognize your challenges, choose a Web developer/designer from our talent pool.</p>
				<p>Alternatively, you can ask for our professional help. We will assist you in selecting the ideal designer / developer profile to best suit your requirement.</p>
            </div>
           <div class="clear"></div>
          </div>
          <div class="step_box">
             <div class="step_box_right" style="float:left;">
                <h1>Select the Ideal Profile</h1>
                <p>First identify your requirements. Once you recognize your challenges, choose a Web developer/designer from our talent pool.</p>
				<p>Alternatively, you can ask for our professional help. We will assist you in selecting the ideal designer / developer profile to best suit your requirement.</p>
            </div>
          	 <div class="step_box_left" style="float:right;"><img src="<?php bloginfo('template_directory')?>/images/step_02.png" alt=""></div>
           <div class="clear"></div>
          </div>

           <div class="step_box">
          	 <div class="step_box_left"><img src="<?php bloginfo('template_directory')?>/images/step_03.png" alt=""></div>
             <div class="step_box_right">
                <h1>Select the Ideal Profile</h1>
                <p>First identify your requirements. Once you recognize your challenges, choose a Web developer/designer from our talent pool.</p>
				<p>Alternatively, you can ask for our professional help. We will assist you in selecting the ideal designer / developer profile to best suit your requirement.</p>
            </div>
           <div class="clear"></div>
          </div>
          <div class="step_box" style="background: none;">
             <div class="step_box_right" style="float:left;">
                <h1>Select the Ideal Profile</h1>
                <p>First identify your requirements. Once you recognize your challenges, choose a Web developer/designer from our talent pool.</p>
				<p>Alternatively, you can ask for our professional help. We will assist you in selecting the ideal designer / developer profile to best suit your requirement.</p>
            </div>
          	 <div class="step_box_left" style="float:right;"><img src="<?php bloginfo('template_directory')?>/images/step_04.png" alt=""></div>
           <div class="clear"></div>
          </div>

        </div>

        <!-- <div class="howitworks_right">
          <div class="center_align" style="margin-top:-9px;"><img src="<?php bloginfo('template_directory')?>/images/quick_facts.png" alt=""></div>
          <div class="wrapper">
             <ul class="keys2">
                <li>ISO 9001:2000 certified</li>
                <li>India-based Web Design & Development Company</li>
                <li>Offshore Development Partner for Global Companies from USA, UK, Australia, Canada & etc.</li>
                <li>On Time Project Delivery</li>
                <li>Complete Confidentiality Maintained</li>
                <li>Follows industry-leading Practices and Design Standards</li>
                <li>State-of-the-art and Secured Network Infrastructure</li>
                <li>100% Customer Satisfaction Guaranteed</li>
                <li>24/7 Customer Support</li>
             </ul>
          </div>
        </div> -->
      </div>








      <div class="clear"></div>
   </section>

<!-- End -->
			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_sidebar('how-it-works'); ?>
<?php get_footer(); ?>