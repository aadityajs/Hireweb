<?php
/**
 * Plugin Name: Facebook Recent Status Widget
 * Plugin URI: http://aditya.com/widget
 * Description: This plugin activates a Facebook user feed widget. It will help you to show the latest feeds of your facebook account suing Graph API. You can also customize the design easily.
 * Version: 0.1
 * Author: Aditya Jyoti Saha
 * Author URI: http://iamaadi.wordpress.com/
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 */
require("facebook_sdk/facebook.php");
ob_start();
/**
 * Add function to widgets_init that'll load our widget.
 * @since 0.1
 */
add_action( 'widgets_init', 'aditya_load_widgets' );

/**
 * Register our widget.
 * 'Aditya_Widget' is the widget class used below.
 *
 * @since 0.1
 */
function aditya_load_widgets() {
	register_widget( 'Aditya_Widget' );
}


/**
 * Aditya Widget class.
 * This class handles everything that needs to be handled with the widget:
 * the settings, form, display, and update.  Nice!
 *
 * @since 0.1
 */
class Aditya_Widget extends WP_Widget {


	/**
	 * Widget setup.
	 */
	function Aditya_Widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'aditya', 'description' => __('This widget displays the recent post of your facebook account.', 'aditya') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'aditya-widget' );

		/* Create the widget. */
		$this->WP_Widget( 'aditya-widget', __('Facebook Recent Status by AadityaJS', 'aditya'), $widget_ops, $control_ops );
	}

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );

			//facebook application
		   // $fbconfig['appid' ]     = "456353311075895";
		   // $fbconfig['secret']     = "caa39c9957893b20112e479d8cb07b81";
		   // $fbconfig['baseurl']    = plugin_dir_url(__FILE__)."aditya-widget.php";

		    $fbconfig['appid' ]     = $instance['fb_app_id'];
		    $fbconfig['secret']     = $instance['fb_app_secret'];
		    $fbconfig['baseurl']    = plugin_dir_url(__FILE__)."aditya-widget.php";

		    $fbID = $instance['fb_user_id'];	//1765554621	100002133693091
			$fbLimit = $instance['fb_post_limit'];
			//set timezone (change this to your timezone)
			date_default_timezone_set("India/Kolkata");


		    // Create our Application instance.
		    $facebook = new Facebook(array(
		      'appId'  => $fbconfig['appid'],
		      'secret' => $fbconfig['secret'],
		      'cookie' => true,
		    ));

		    //Facebook Authentication part
		    $access_token       = $facebook->getAccessToken();

			//be sure to update this access token
			$myFBToken = $access_token;

			//must be https when using an access token
			$url="https://graph.facebook.com/".$fbID."/feed?access_token=".$myFBToken."&limit=20";

			//load and setup CURL
			$c = curl_init($url);
			curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
			//don't verify SSL (required for some servers)
			curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($c, CURLOPT_SSL_VERIFYHOST, false);
			//get data from facebook and decode JSON
			$page = json_decode(curl_exec($c));
			//var_dump($page->data);
			//close the connection
			curl_close($c);
			//return the data as an object
			//return $page->data;


		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );


		/* Before widget (defined by themes). */
		echo $before_widget;

		if (is_front_page()) {


		echo '<div class="body_right"><div class="latest_work" style="margin-bottom:0px;">
		       	     <div class="facebook_box">
		           	    <h2>'. $title .'</h2>';


		$fbCount=0;

		//call the function and get the posts from facebook
		$myPosts = $page->data;

		//loop through all the posts we got from facebook
		foreach($myPosts as $dPost){
			//only show posts that are posted by the page admin
			if($dPost->from->id==$fbID){
				//get the post date / time and convert to unix time
				$dTime = strtotime($dPost->created_time);
				//format the date / time into something human readable

				//if you want it formatted differently look up the php date function
				$myTime=date("M d, Y, h:i A",$dTime);

				//output the message body
		        echo '<p class="facebook_txt">'.$dPost->story.'<br/> <span style="font-size: 10px;">-- '.$myTime.'</span></p>';
				//echo '<pre>'.print_r($dPost, true).'</pre>';

				//increment counter
				$fbCount++;

				//if we've outputted the number set above in fblimit we're done
				if($fbCount >= $fbLimit) break;
			}
		}

		echo '</div>
		      </div>
		      </div>
		      <div class="clear"></div>';


		/* After widget (defined by themes). */
		echo $after_widget;
		}
	}

	/**
	 * Update the widget settings.
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['fb_app_id'] = strip_tags( $new_instance['fb_app_id'] );
		$instance['fb_app_secret'] = strip_tags( $new_instance['fb_app_secret'] );
		$instance['fb_post_limit'] = strip_tags( $new_instance['fb_post_limit'] );
		$instance['fb_user_id'] = strip_tags( $new_instance['fb_user_id'] );

		return $instance;

	}

	/**
	 * Displays the widget settings controls on the widget panel.
	 * Make use of the get_field_id() and get_field_name() function
	 * when creating your form elements. This handles the confusing stuff.
	 */
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => __('Aditya', 'aditya'), 'name' => __('Aditya', 'aditya'), 'sex' => 'male', 'show_sex' => true );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'hybrid'); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:95%;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'fb_app_id' ); ?>"><?php _e('Facebook App id:', 'aditya'); ?></label>
			<input id="<?php echo $this->get_field_id( 'fb_app_id' ); ?>" name="<?php echo $this->get_field_name( 'fb_app_id' ); ?>" value="<?php echo $instance['fb_app_id']; ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'fb_app_secret' ); ?>"><?php _e('Facebook App Secret:', 'aditya'); ?></label>
			<input id="<?php echo $this->get_field_id( 'fb_app_secret' ); ?>" name="<?php echo $this->get_field_name( 'fb_app_secret' ); ?>" value="<?php echo $instance['fb_app_secret']; ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'fb_post_limit' ); ?>"><?php _e('Facebook post to show:', 'aditya'); ?></label>
			<input id="<?php echo $this->get_field_id( 'fb_post_limit' ); ?>" name="<?php echo $this->get_field_name( 'fb_post_limit' ); ?>" value="<?php echo $instance['fb_post_limit']; ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'fb_user_id' ); ?>"><?php _e('Facebook user id:', 'aditya'); ?></label>
			<input id="<?php echo $this->get_field_id( 'fb_user_id' ); ?>" name="<?php echo $this->get_field_name( 'fb_user_id' ); ?>" value="<?php echo $instance['fb_user_id']; ?>" style="width:100%;" />
		</p>

		<div class="widget-control-actions alignright">
		<p><small><a href="http://iamaadi.wordpress.com/"><?php esc_attr_e('By AadityaJS', 'aditya')?></a></small></p>
		</div>


	<?php
	}




}

?>