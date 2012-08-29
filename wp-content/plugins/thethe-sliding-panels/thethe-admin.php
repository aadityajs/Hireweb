<?php
if (!function_exists('TheThe_makeAdminPage')) {
	function TheThe_makeAdminPage(){
		include 'inc/view-about-us.php';
	}
}
function TheTheSP_Style(){
	// Nav Menu CSS
	wp_admin_css( 'nav-menu' );
	
	wp_deregister_style( 'thethefly-plugin-panel-interface');
	wp_register_style( 'thethefly-plugin-panel-interface', $GLOBALS['TheTheSP']['wp_plugin_dir_url'].'style/admin/interface.css' );
	wp_enqueue_style( 'thethefly-plugin-panel-interface' );

	wp_enqueue_script( 'postbox');
	wp_enqueue_script( 'post');
	
	wp_register_script( 'thethefly-color-picker', $GLOBALS['TheTheSP']['wp_plugin_dir_url'].'style/admin/js/color-picker.js' );
	// Color picker
	wp_enqueue_style( 'farbtastic' );
	wp_enqueue_script( 'thethefly-color-picker' );
	wp_enqueue_script( 'farbtastic', false, array('thethefly-color-picker'));	
}
function TheTheSP_RegisterPluginLinks($links, $file) {
	$base = $GLOBALS['TheTheSP']['wp_plugin_base_name'];
	if ($file == $base) {
		$links[] = '<a href="admin.php?page=thethe-sliding-panels">' . __('Settings') . '</a>';
		$links[] = '<a href="http://thethefly.com/support/forum/wordpress-plugins-by-thethe-fly-group3/thethe-sliding-panels-forum12.0/">' . __('Support') . '</a>';
		$links[] = '<a href="http://thethefly.com/themes/">' . __('Themes') . '</a>';
		$links[] = '<a href="http://thethefly.com/wordpress-tips-tricks-hacks-newsletter/">' . __('Tips & Tricks') . '</a>';			
		$links[] = '<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=U2DR7CUBZLPFG">' . __('Donate') . '</a>';
	}
	return $links;
}

/**
 * Add menu to admin page
 */
function TheTheSP_Menu()
{
	global $menu;
	
	$flag['makebox'] = true;
	if (is_array($menu)) foreach ($menu as $e) {
		if (isset($e[0]) && (in_array($e[0], array('TheThe Fly','TheTheFly')))) {
			$flag['makebox'] = false;
			break;
		}
	}
	
	if ($flag['makebox']) {
		$icon_url = $GLOBALS['TheTheSP']['wp_plugin_dir_url'].'style/admin/images/favicon.ico';
		// Add a new top-level menu:
		add_menu_page('TheThe Fly', 'TheThe Fly', 8, 'thethefly', 'TheThe_makeAdminPage', $icon_url, 63);
		// Add a submenu to the top-level menu:
         $panelHookAboutUs = add_submenu_page('thethefly', 'TheThe Fly: About the Club', 'About the Club', 8, 'thethefly', 'TheThe_makeAdminPage');
	}
	// Add Sliding Panels
	$panelHook = add_submenu_page('thethefly', 'TheThe Sliding Panels','Sliding Panels',8,'thethe-sliding-panels','TheTheSP_options');
	add_filter( 'admin_print_styles-' . $panelHookAboutUs, 'TheTheSP_Style');
	add_filter( 'admin_print_styles-' . $panelHook, 'TheTheSP_Style');		
	add_filter('plugin_row_meta', 'TheTheSP_RegisterPluginLinks',10,2);		
} // end func wpts_menu

/**
 * Function TheTheSP_options
 */
function TheTheSP_options()
{
	$ttsp_themes = array(
		'black',
		'white',
		'grey'
	);	
	$ttsp_regularity = array(
        'always' => array(
                'title' => 'always',
                'value' => 'always'
        ),
        'once' => array(
                'title' => 'once',
                'value' => 'once'
        ),		
        'every_hour' => array(
                'title' => 'every hour',
                'value' => 'every_hour'
        ),
        'every_3_hours' => array(
                'title' => 'every 3 hours',
                'value' => 'every_3_hours'
        ),
        'every_6_hours' => array(
                'title' => 'every 6 hours',
                'value' => 'every_6_hours'
        ),
        'every_12_hours' => array(
                'title' => 'every 12 hours',
                'value' => 'every_12_hours'
        ),
        'every_day' => array(
                'title' => 'every day',
                'value' => 'every_day'
        ),
        'every_week' => array(
                'title' => 'every week',
                'value' => 'every_week'
        ),
        'every_month' => array(
                'title' => 'every month',
                'value' => 'every_month'
        ),
		
	);	
	/**
	 * Reset vars
	 */
	$message = '';
	$options = $newoptions = get_option('ttsp_options');
	$defoptions = get_option('ttsp_def_options');
	
	
	if(isset($_POST['submit'])) {
		foreach (array('t','b','l','r','m') as $k) {
			if (isset($_POST[$k])) $newoptions[$k] = $_POST[$k];
		}
		if($options != $newoptions) {
			update_option('ttsp_options',$newoptions);
			$message = "Options Saved";
		}
	}
	if(isset($_POST['reset'])) {
		foreach (array('t','b','l','r','m') as $k) {
			if (isset($_POST[$k])) $newoptions[$k] = $GLOBALS['ttsp_def'][$k];
		}
		if($options != $newoptions) {
			update_option('ttsp_options',$newoptions);
			$message = "Options Saved";
		}
	}
	
	$options = get_option('ttsp_options');
	include 'inc/view-tabs.php';
}