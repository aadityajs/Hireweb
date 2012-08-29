<?php
/*
Plugin Name: TheThe Sliding Panels
Plugin URI: http://thethefly.com/wp-plugins/thethe-sliding-panels/
Description: Creates Javascript powered panels/windows that float above the Web page. 
Version: 1.1.3
Author: TheThe Fly
Author URI: http://thethefly.com
License: GNU GPL v2
*/

$TheTheSP = array(
	'wp_plugin_dir' => WP_PLUGIN_DIR . '/thethe-sliding-panels',
	'wp_plugin_dir_url' => WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__)),	
	'wp_plugin_name' => 'TheThe Sliding Panels',
	'wp_plugin_base_name' => plugin_basename(__FILE__),	
	'wp_plugin_version' => '1.1.3'
);

/**
 * Require
 */
require_once $TheTheSP['wp_plugin_dir'] . '/lib/lib.php';
require_once $TheTheSP['wp_plugin_dir'] . '/lib/template.php';
add_filter('after_setup_theme', 'TheTheSP_hook_after_setup_theme');

/**
 * Install/deInstall
 */
register_activation_hook( __FILE__, 'TheTheSP_Activate' );
register_deactivation_hook( __FILE__, 'TheTheSP_deActivate' );

if (is_admin()) {			
	require_once $TheTheSP['wp_plugin_dir'] . '/thethe-admin.php';
	add_filter('admin_menu','TheTheSP_Menu');	
	
} else {	
	/**
 	 * hook it!
	 */
	add_filter('wp_head','ttsp_head');
	add_filter('wp_footer','ttsp_footer');
	add_filter('init','TheTheSP_Init');
}



/**
 * 
 * @var array
 */
$ttsp_def = array();
$ttsp_def['t'] = array(
	'is_active' => true,
	'cookiesName' => '',
	'width' => '400',
	'widthUnit' => 'px',	
	'height' => '200',
	'speed' => 500,	
	'theme' => 'black',
	'bgColor' => '',
	'opacity' => 0,			
	'borderColor' => '',
	'borderWidth' => 1,	
	'textColor' => '',
	'radius' => 0,
	'tabRadius' => 0,
	'shadowSize' => '',
	'shadowColor' => '',	
	'autoOpen' => true,
	'openIn' => 10,
	'autoClose' => false,
	'closeAfter' => 30,
	'showCloseButton' => true,
	'closeButtonText' => 'Close',
	'showTab' => true,
	'tabText' => 'Top Panel',
	'firstVisitShow' => true,
	'regularity' => 'always',
	'backLink' => true
);
$ttsp_def['b'] = $ttsp_def['t'];
$ttsp_def['b']['tabText'] = 'Bottom Panel';

$ttsp_def['l'] = array(
	'is_active' => true,
	'cookiesName' => '',
	'width' => '200',
	'height' => '400',
	'heightUnit' => 'px',	
	'speed' => 500,	
	'theme' => 'black',
	'bgColor' => '',
	'opacity' => 0,
	'borderColor' => '',
	'borderWidth' => 1,	
	'textColor' => '',
	'radius' => 0,
	'tabRadius' => 0,
	'shadowSize' => '',
	'shadowColor' => '',
	'autoOpen' => true,
	'openIn' => 10,
	'autoClose' => false,
	'closeAfter' => 30,
	'showCloseButton' => true,
	'closeButtonText' => 'Close',
	'showTab' => true,
	'tabText' => 'Left Panel',
	'firstVisitShow' => true,
	'regularity' => 'always',
	'backLink' => true
);
$ttsp_def['r'] = $ttsp_def['l'];
$ttsp_def['r']['tabText'] = 'Right Panel';

$ttsp_def['m'] = array(
	'is_active' => true,	
	'theme' => 'black',	
	'bgColor' => '',
	'opacity' => 0,			
	'textColor' => '',
	'borderColor' => '',
	'borderWidth' => 1,
	'overlayColor' => '',
	'overlayOpacity' => 35,
	'shadowSize' => '',
	'shadowColor' => '',
	
	'radius' => '',	
	'width' => '400',
	'height' => '300',
	'left' => '100',
	'top' => '100',
	'right' => '',
	'bottom' => '',	
	'showCloseButton' => true,
	'closeButtonText' => 'Close',	
	'effect' => 'slideDown',
	'speed' => '1000',
	'center' => true,
	'openIn' => '2',
	'autoClose' => false,
	'closeAfter' => '30',
	'firstVisitShow' => true,
	'regularity' => 'always',
	'backLink' => true
);
$GLOBALS['ttsp_def'] = $ttsp_def;
if(!get_option('ttsp_options')) {
	update_option('ttsp_options', $GLOBALS['ttsp_def']);
}


/**
 * Global config setup
 */
$GLOBALS['ttsp'] = get_option('ttsp_options');
$GLOBALS['liveTemplate'] = array();

$o = get_option('ttsp_options');
function TheTheSP_hook_after_setup_theme()
{
	$o = get_option('ttsp_options'); 
	if (isset($o['t']['is_active']) && $o['t']['is_active']) {
		register_sidebar(array(
			'name' => 'Top Sliding Panel',
			'id' => 'thethe-top-panel',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'		
		));
	}
	if (isset($o['l']['is_active']) && $o['l']['is_active']) {
		register_sidebar(array(
			'name' => 'Left Sliding Panel',
			'id' => 'thethe-left-panel',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'		
		));
	}
	if (isset($o['b']['is_active']) && $o['b']['is_active']) {
		register_sidebar(array(
			'name' => 'Bottom Sliding Panel',
			'id' => 'thethe-bottom-panel',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'		
		));
	}
	if (isset($o['r']['is_active']) && $o['r']['is_active']) {
		register_sidebar(array(
			'name' => 'Right Sliding Panel',
			'id' => 'thethe-right-panel',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'		
		));
	}

	if (isset($o['m']['is_active']) && $o['m']['is_active']) {
		register_sidebar(array(
			'name' => 'Modal Window',
			'id' => 'thethe-modal-window',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'		
		));
	}
}
/**
 * Custom wordpress header
 */
function ttsp_head()
{
	global $liveTemplate,$xTemplate,$ttsp_def;
	
	$o = get_option('ttsp_options');
	
	$i = 0;
	if (isset($o['t']['is_active']) && $o['t']['is_active'] && is_active_sidebar('thethe-top-panel') &&	!(isset($_COOKIE[$o['t']['cookiesName']]))) {
		//if((isset($o['t']['firstVisitShow']) && $o['t']['firstVisitShow']) || ($_COOKIE['thethefly-tp-last-visit']) ){
		
		/**
		 * Пустые и несуществующие значения заполняются значениями по умолчанию
		  *   Empty and inexistent velues are set to default ones

		 */
		if (is_array($ttsp_def['t'])) foreach ($ttsp_def['t'] as $key=>$value) {
			$o['t'][$key] = _thethe_valid_field_empty($key, $o['t'],$ttsp_def['t']);
		}
	
		/**
		 * Ширина и высота корректируются / Width and height are adjusted
		 */
		$o['t']['width'] = _thethe_valid_field_size($o['t']['width']);
		$o['t']['height'] = _thethe_valid_field_size($o['t']['height']);
		
		$html = str_replace('{%title}', $o['t']['title'], $xTemplate['top']);
		ob_start();
		dynamic_sidebar("thethe-top-panel");
		$__content = ob_get_contents();
		ob_end_clean();
		$html = str_replace('{%content}', $o['t']['content'] . $__content, $html);
		$liveTemplate[$i]['html'] = $html;
		
		$js_t = $xTemplate['js_t'];

		foreach (array('theme','bgColor','borderColor','borderWidth','textColor','radius','tabRadius','shadowSize','shadowColor','opacity','width','widthUnit','height','speed','disablePanels','showCloseButton','showTab','tabText','transparent','autoOpen','openIn','autoClose','closeAfter','cookiesName','closeButtonText','firstVisitShow','regularity','backLink') as $k) {
				
			if ((in_array($o['t'][$k],array("null","true","false"))) || (is_numeric($o['t'][$k]))) {
				$replace = $o['t'][$k];
			} else {
				$replace = "'" . $o['t'][$k] . "'";
			}
			$js_t = str_replace("{%{$k}}", $replace , $js_t);			
		}
		$liveTemplate[$i]['js'] = "$('#thetheTopPanel').topPanel({{$js_t}});\n";
		++$i;
		//} //endif on first visit
	}
	if (isset($o['b']['is_active']) && $o['b']['is_active'] && is_active_sidebar('thethe-bottom-panel') && !($_COOKIE[$o['b']['cookiesName']])) {
		/**
		 * Пустые и несуществующие значения заполняются значения по умолчанию
		  *   Empty and inexistent velues are set to default ones

		 */
		if (is_array($ttsp_def['b'])) foreach ($ttsp_def['b'] as $key=>$value) {
			$o['b'][$key] = _thethe_valid_field_empty($key, $o['b'],$ttsp_def['b']);
		}
	
		/**
		 * Ширина и высота корректируются / Width and height are adjusted
		 */
		$o['b']['width'] = _thethe_valid_field_size($o['b']['width']);
		$o['b']['height'] = _thethe_valid_field_size($o['b']['height']);
		
		$html = str_replace('{%title}', $o['b']['title'], $xTemplate['bottom']);
		ob_start();
		dynamic_sidebar("thethe-bottom-panel");
		$__content = ob_get_contents();
		ob_end_clean();
		$html = str_replace('{%content}', $o['b']['content'] . $__content, $html);
		$liveTemplate[$i]['html'] = $html;
		
		$js_b = $xTemplate['js_b'];
		foreach (array('theme','bgColor','borderColor','borderWidth','textColor','radius','tabRadius','shadowSize','shadowColor','opacity','width','widthUnit','height','speed','disablePanels','showCloseButton','showTab','tabText','transparent','autoOpen','openIn','autoClose','closeAfter','cookiesName','closeButtonText','firstVisitShow','regularity','backLink') as $k) {				
			if ((in_array($o['b'][$k],array("null","true","false"))) || (is_numeric($o['b'][$k]))) {
				$replace = $o['b'][$k];
			} else {
				$replace = "'" . $o['b'][$k] . "'";
			}
			$js_b = str_replace("{%{$k}}", $replace , $js_b);
		}
		$liveTemplate[$i]['js'] = "$('#thetheBottomPanel').bottomPanel({{$js_b}});\n";
		++$i;
	}
	
	if (isset($o['l']['is_active']) && $o['l']['is_active'] && is_active_sidebar('thethe-left-panel') && !($_COOKIE[$o['l']['cookiesName']])) {
		/**
		 * Пустые и несуществующие значения заполняются значения по умолчанию
		  *   Empty and inexistent velues are set to default ones
		 */
		if (is_array($ttsp_def['l'])) foreach ($ttsp_def['l'] as $key=>$value) {
			$o['l'][$key] = _thethe_valid_field_empty($key, $o['l'],$ttsp_def['l']);
		}
	
		/**
		 * Ширина и высота корректируются / Width and height are adjusted  / Widh and height are corrected
		 */
		$o['l']['width'] = _thethe_valid_field_size($o['l']['width']);
		$o['l']['height'] = _thethe_valid_field_size($o['l']['height']);
		$title = '';
		if ($o['l']['title']){
			$title = '<h2 class="tspTitle">'.$o['l']['title'].'</h2>';
		}
		$html = str_replace('{%title}', $title, $xTemplate['left']);
		ob_start();		
		dynamic_sidebar("thethe-left-panel");
		$__content = ob_get_contents();
		ob_end_clean();
		$html = str_replace('{%content}', $o['l']['content'] . $__content, $html);
		$liveTemplate[$i]['html'] = $html;
		
		$js_l = $xTemplate['js_l'];
		foreach (array('theme','bgColor','borderColor','borderWidth','textColor','radius','tabRadius','shadowSize','shadowColor','opacity','width','heightUnit','height','speed','disablePanels','showCloseButton','showTab','tabText','transparent','autoOpen','openIn','autoClose','closeAfter','cookiesName','closeButtonText','firstVisitShow','regularity','backLink','regularity','backLink') as $k) {
				
			if ((in_array($o['l'][$k],array("null","true","false"))) || (is_numeric($o['l'][$k]))) {
				$replace = $o['l'][$k];
			} else {
				$replace = "'" . $o['l'][$k] . "'";
			}
			$js_l = str_replace("{%{$k}}", $replace , $js_l);
		}
		$liveTemplate[$i]['js'] = "$('#thetheLeftPanel').leftPanel({{$js_l}});\n";
		++$i;
	}
	if (isset($o['r']['is_active']) && $o['r']['is_active'] && is_active_sidebar('thethe-right-panel') && !($_COOKIE[$o['r']['cookiesName']])) {
			
		/**
		 * Пустые и несуществующие значения заполняются значения по умолчанию
		  *   Empty and inexistent velues are set to default ones

		 */
		if (is_array($ttsp_def['r'])) foreach ($ttsp_def['r'] as $key=>$value) {
			$o['r'][$key] = _thethe_valid_field_empty($key, $o['r'],$ttsp_def['r']);
		}
	
		/**
		 * Ширина и высота корректируются / Width and height are adjusted
		 */
		$o['r']['width'] = _thethe_valid_field_size($o['r']['width']);
		$o['r']['height'] = _thethe_valid_field_size($o['r']['height']);
		$title = '';
		if ($o['r']['title']){
			$title = '<h2 class="tspTitle">'.$o['r']['title'].'</h2>';
		}		
		$html = str_replace('{%title}', $title, $xTemplate['right']);
		ob_start();		
		dynamic_sidebar("thethe-right-panel");
		$__content = ob_get_contents();
		ob_end_clean();
		$html = str_replace('{%content}', $o['r']['content'] . $__content, $html);
		$liveTemplate[$i]['html'] = $html;
		
		$js_r = $xTemplate['js_r'];
		foreach (array('theme','bgColor','borderColor','borderWidth','textColor','radius','tabRadius','shadowSize','shadowColor','opacity','width','heightUnit','height','speed','showCloseButton','showTab','tabText','transparent','autoOpen','openIn','autoClose','closeAfter','cookiesName','closeButtonText','firstVisitShow','regularity','backLink') as $k) {
				
			if ((in_array($o['r'][$k],array("null","true","false"))) || (is_numeric($o['r'][$k]))) {
				$replace = $o['r'][$k];
			} else {
				$replace = "'" . $o['r'][$k] . "'";
			}
			$js_r = str_replace("{%{$k}}", $replace , $js_r);
		}
		$liveTemplate[$i]['js'] = "$('#thetheRightPanel').rightPanel({{$js_r}});\n";
		++$i;
	}
	
	if (isset($o['m']['is_active']) && $o['m']['is_active'] && is_active_sidebar('thethe-modal-window') && !($_COOKIE[$o['m']['cookiesName']])) {
		
		/**
		 * Пустые и несуществующие значения заполняются значения по умолчанию
		  *   Empty and inexistent velues are set to default ones

		 */
		if (is_array($ttsp_def['m'])) foreach ($ttsp_def['m'] as $key=>$value) {
			$o['m'][$key] = _thethe_valid_field_empty($key, $o['m'],$ttsp_def['m']);
		}
		
		/**
		 * Ширина и высота корректируются / Width and height are adjusted
		 */
		$o['m']['width'] = _thethe_valid_field_size($o['m']['width']);
		$o['m']['height'] = _thethe_valid_field_size($o['m']['height']);

		//=#Lexx
		$title = '';
		if ($o['m']['title']){
			$title = '<h2 class="tspTitle">'.$o['m']['title'].'</h2>';
		}		
		$html = str_replace('{%title}', $title, $xTemplate['modal']);
		ob_start();
		dynamic_sidebar("thethe-modal-window");
		$__content = ob_get_contents();
		ob_end_clean();
		$html = str_replace('{%content}', $o['m']['content'] . $__content, $html);
		
		$liveTemplate[$i]['html'] = $html;
		
		$js_m = $xTemplate['js_m'];
		
		$o['m']['width'] = _thethe_valid_field_size($o['m']['width']);
	
		foreach (array('theme','bgColor','opacity','overlayColor','overlayOpacity','textColor','borderWidth','borderColor','radius','shadowSize','shadowColor','width','height','left','top','right','bottom','showCloseButton','closeButtonText','effect','speed','center','openIn','autoClose','closeAfter','cookiesName','firstVisitShow','regularity','backLink') as $k) {
		
			if ((in_array($o['m'][$k],array("null","true","false"))) || (is_numeric($o['m'][$k]))) {
				$replace = $o['m'][$k];
			} else {
				$replace = "'" . $o['m'][$k] . "'";
			}
			$js_m = str_replace("{%{$k}}", $replace , $js_m);
		}		
		
		$liveTemplate[$i]['js'] = "$('#thetheModalWindow').popUp({{$js_m}});\n"; //{{$js_m}}
		++$i;
	}
	
	/**
	 * Custom head
	 */
	echo "<script type='text/javascript'>\n";
    echo "jQuery(document).ready(function($) {\n";

	if(is_array($liveTemplate)) foreach ($liveTemplate as $e) {
		if ($e) {
			echo $e['js'];
		}
	}

	echo "});\n";
	echo '</script>';	 

} // end func ttsp_head

/**
 * 
 */
function ttsp_footer()
{
	global $liveTemplate;
	if (is_array($liveTemplate)) foreach ($liveTemplate as $e) {
		if ($e) {
			echo "\n";
			echo $e['html'];
		}
	}
}