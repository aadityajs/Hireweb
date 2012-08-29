<?php
/**
 * Plugin Name: Hireweb Widgets
 * Plugin URI: http://aditya.com/widget
 * Description: This plugin activates all the widgets which are used in Hireweb Theme.
 * Version: 0.1
 * Author: Aditya Jyoti Saha
 * Author URI: http://iamaadi.wordpress.com/
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 */

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
		$widget_ops = array( 'classname' => 'aditya', 'description' => __('This widget displays the Facebook widget required for Hireweb Theme.', 'aditya') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'aditya-widget' );

		/* Create the widget. */
		$this->WP_Widget( 'aditya-widget', __('Hireweb - Facebook Widget', 'aditya'), $widget_ops, $control_ops );
	}

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$name = $instance['name'];
		$sex = $instance['sex'];
		$show_sex = isset( $instance['show_sex'] ) ? $instance['show_sex'] : false;


		/* Before widget (defined by themes). */
		echo $before_widget;

		if (is_front_page()) {

			echo '<div class="body_right"><div class="latest_work" style="margin-bottom:0px;">
		       	     <div class="facebook_box">
		           	    <h2>'. $title .'</h2>
		                <p class="facebook_txt">Experienced tremendous response at Mobile World Congress 2012 at Barcelona, Spain.</p>
		                <p class="facebook_txt">Successful participation in Mobile Developer Summit 2011 held at Bangalore, India...</p>
		             </div>
		           </div>
		           </div>
		      <div class="clear"></div>';


		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $title )
			//echo $before_title . $title . $after_title;

		/* Display name from widget settings if one was input. */
		if ( $name )
			//printf( '<p>' . __('Hello. My name is %1$s.', 'aditya') . '</p>', $name );

		/* If show sex was selected, display the user's sex. */
		if ( $show_sex )
			//printf( '<p>' . __('I am a %1$s.', 'aditya.') . '</p>', $sex );

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
		$instance['name'] = strip_tags( $new_instance['name'] );

		/* No need to strip tags for sex and show_sex. */
		$instance['sex'] = $new_instance['sex'];
		$instance['show_sex'] = $new_instance['show_sex'];

		return $instance;
	}

	/**
	 * Displays the widget settings controls on the widget panel.
	 * Make use of the get_field_id() and get_field_name() function
	 * when creating your form elements. This handles the confusing stuff.
	 */
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => __('Hireweb', 'aditya'), 'name' => __('Aditya', 'aditya'), 'sex' => 'male', 'show_sex' => true );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'hybrid'); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
		</p>

		<!-- Your Name: Text Input
		<p>
			<label for="<?php echo $this->get_field_id( 'name' ); ?>"><?php _e('Your Name:', 'aditya'); ?></label>
			<input id="<?php echo $this->get_field_id( 'name' ); ?>" name="<?php echo $this->get_field_name( 'name' ); ?>" value="<?php echo $instance['name']; ?>" style="width:100%;" />
		</p>-->

		<!-- Sex: Select Box
		<p>
			<label for="<?php echo $this->get_field_id( 'sex' ); ?>"><?php _e('Sex:', 'aditya'); ?></label>
			<select id="<?php echo $this->get_field_id( 'sex' ); ?>" name="<?php echo $this->get_field_name( 'sex' ); ?>" class="widefat" style="width:100%;">
				<option <?php if ( 'male' == $instance['format'] ) echo 'selected="selected"'; ?>>male</option>
				<option <?php if ( 'female' == $instance['format'] ) echo 'selected="selected"'; ?>>female</option>
			</select>
		</p>-->

		<!-- Show Sex? Checkbox
		<p>
			<input class="checkbox" type="checkbox" <?php checked( $instance['show_sex'], true ); ?> id="<?php echo $this->get_field_id( 'show_sex' ); ?>" name="<?php echo $this->get_field_name( 'show_sex' ); ?>" />
			<label for="<?php echo $this->get_field_id( 'show_sex' ); ?>"><?php _e('Display sex publicly?', 'aditya'); ?></label>
		</p>-->

	<?php
	}
}

?>