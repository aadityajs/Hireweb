<?php
/**
 * The Sidebar containing the main widget area.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

$options = twentyeleven_get_theme_options();
$current_layout = $options['theme_layout'];

if ( 'content' != $current_layout ) :
?>
		<div id="secondary" class="widget-area" role="complementary">

		<div class="body_right">
		       	   <div class="latest_work">
		       	     <div class="latest_work_box">
		           	    <h1>Latest <span>work</span> <img src="<?php bloginfo( 'template_directory' ); ?>/images/plus.png" alt=""><a href="#">more</a></h1>
		                <div class="latest_img"><img src="<?php bloginfo( 'template_directory' ); ?>/images/latest_img.png" alt=""></div>
		                <div class="center_align"><img src="<?php bloginfo( 'template_directory' ); ?>/images/pagination.png" alt=""></div>
		             </div>
		           </div>
		           <div class="latest_work" style="margin-bottom:0px;">
		       	     <div class="facebook_box">
		           	    <h2>Facebook</h2>
		                <p class="facebook_txt">Experienced tremendous response at Mobile World Congress 2012 at Barcelona, Spain.</p>
		                <p class="facebook_txt">Successful participation in Mobile Developer Summit 2011 held at Bangalore, India...</p>
		             </div>
		           </div>
		       </div>
		      <div class="clear"></div>
		   </section>
		  <!--end body-->
		  <div class="clear"></div>
		</div>
		<!--end maincontainer-->


		</div><!-- #secondary .widget-area -->
<?php endif; ?>