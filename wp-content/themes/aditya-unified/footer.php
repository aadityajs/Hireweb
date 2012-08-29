<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

	</div><!-- #main -->

	<footer id="colophon" role="contentinfo" class="footer">

			<?php
				/* A sidebar in the footer? Yep. You can can customize
				 * your footer with three columns of widgets.
				 */
				if ( ! is_404() )
					get_sidebar( 'footer' );
			?>

	<!--start blog-->
<section id="blog">

</section>
<!--end blog-->
<!--start footer-->
 <div class="blog">
    <div class="client_say">
      <h1>What our client say</h1>
      <p>They did an exceptional job on my site. I definitely recommend them. I’m very happy with the quality of the coding. Even though my design team provided them with the theme...</p>
      <p class="paul">- Paul Schiff<br><a href="#">Read more »</a></p>
    </div>
    <div class="blog_news">
      <h1>New on our Blog</h1>
      <div class="post_txt">
      	<img src="<?php bloginfo( 'template_directory' ); ?>/images/arrow.png" alt=""> <strong>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy</strong><br>
        <span>23 July 2012</span><br>
        <a href="#">Read the post »</a>
     </div>
     <div class="post_txt">
      	<img src="<?php bloginfo( 'template_directory' ); ?>/images/arrow.png" alt=""> <strong>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy</strong><br>
        <span>23 July 2012</span><br>
        <a href="#">Read the post »</a>
     </div>
    </div>
    <div class="twitter_bg">
      <h1>Latest Tweet</h1>
      <p>Many Many Happy Birthday to Unified...Happy Birthday...:)<br/>
         <a href="#">http://www.unifiedinfotech.net</a>
      </p>
      <p class="recent">Follow Us<br><a href="#">@unifiedinfotech</a></p>
    </div>
  </div>
  <div class="footerinner">
    <div class="footer_link">
      <ul>
            <li><a href="#">Hire Web Theme Designer</a></li>
            <li><a href="#">Hire WordPress Theme Designer</a></li>
            <li><a href="#">Hire Magento Theme Designer</a></li>
            <li><a href="#">Hire osCommerce Theme Designer</a></li>
            <li><a href="#">Hire Joomla Theme Designer</a></li>
          </ul>
          <ul>
            <li><a href="#">Hire Joomla Developer</a></li>
            <li><a href="#">Hire Drupal Developer</a></li>
            <li><a href="#">Hire Magento Developer</a></li>
            <li><a href="#">Hire WordPress Developer</a></li>
            <li><a href="#">Hire SugarCRM Developer</a></li>
          </ul>
          <ul>
            <li><a href="#">Hire Cakephp Developer</a></li>
            <li><a href="#">Hire Smarty Programmer</a></li>
            <li><a href="#">Best Web Developers Portfolio</a></li>
            <li><a href="#">Hire Magento Developer</a></li>
            <li><a href="#">Hire PHP Developer </a></li>
          </ul>
          <ul style="background:none;">
            <li><a href="#">Hire osCommerce Developer</a></li>
            <li><a href="#">Hire LAMP Developer</a></li>
            <li><a href="#">Hire osCommerce Developer</a></li>
            <li><a href="#">Hire Joomla Developer</a></li>
            <li><a href="#">Hire PHP Developer</a></li>
          </ul>
          <div class="clear"></div>
       </div>
       <div class="footer_bluelink">
       	  <span style="font-size:13px; color:#737373;">Connect with us:</span>
          <span><img src="<?php bloginfo( 'template_directory' ); ?>/images/footer_icon1.png" alt=""> Email</span>
          <span><img src="<?php bloginfo( 'template_directory' ); ?>/images/footer_icon2.png" alt="">  Call 919331727063 / 913340602205</span>
          <span><img src="<?php bloginfo( 'template_directory' ); ?>/images/footer_icon3.png" alt="">  Facebook</span>
          <span><img src="<?php bloginfo( 'template_directory' ); ?>/images/footer_icon4.png" alt="">  Twitter</span>
          <span><img src="<?php bloginfo( 'template_directory' ); ?>/images/footer_icon5.png" alt="">  Linked In</span>
          <span><img src="<?php bloginfo( 'template_directory' ); ?>/images/footer_icon6.png" alt="">  RSS </span>
      </div>
      <div class="copyright">
        <div class="copyright_txt">Copyright © 2011 Unified web development. All Right Reserved</div>
        <div class="hireme"><a href="#"><img src="<?php bloginfo( 'template_directory' ); ?>/images/hireme.png" alt=""/></a></div>
      </div>
  </div>
 <div class="clear"></div>
<!--end footer-->



			<!-- <div id="site-generator">
				<?php do_action( 'twentyeleven_credits' ); ?>
				<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'twentyeleven' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'twentyeleven' ); ?>" rel="generator"><?php printf( __( 'Proudly powered by %s', 'twentyeleven' ), 'WordPress' ); ?></a>
			</div> -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>