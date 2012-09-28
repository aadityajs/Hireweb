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

		<div class="howitworks_right">
          <div class="center_align" style="margin-top:-9px;"><img src="<?php bloginfo('template_directory')?>/images/quick_facts.png" alt=""></div>
          <div class="wrapper">
             <ul class="keys2">
                <?php dynamic_sidebar('two-column-right-sidebar'); ?>

             </ul>
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