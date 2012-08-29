<?php
/**
 * Function _thethe_valid_field_size
 * @param string $k
 */
function _thethe_valid_field_size($k) {
	$k = strtolower(trim($k));
	$k = str_replace(' ', '', $k);
	if (false !== strpos($k, '%')) {
		return $k;
	} elseif (false !== strpos($k, 'px')) {
		return $k;
	} else {
		return intval($k) . "px";
	}
} // end func _thethe_valid_field_size

/**
 * Check empty value
 * @param string $key
 * @param array $o
 * @param array $def
 */
function _thethe_valid_field_empty($key,$o,$def = array())
{
	if (!isset($o[$key])) {
		return $def[$key];
	} elseif ($o[$key] == '') {
		return $def[$key];
	} else {
		return $o[$key];
	}
}
function TheTheSP_head_scripts(){
    wp_deregister_script( 'jquery' );
   	wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js', false, 'latest');
    wp_enqueue_script( 'jquery' );
		
	wp_deregister_script( 'jquery-ui' );
	wp_register_script( 'jquery-ui', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js');
	wp_enqueue_script( 'jquery-ui' );

	wp_deregister_script( 'jquery-cookie' );
	wp_register_script( 'jquery-cookie', $GLOBALS['TheTheSP']['wp_plugin_dir_url'].'style/js/jquery.cookie.min.js');
	wp_enqueue_script( 'jquery-cookie' );
	
	wp_deregister_script( 'jquery-ttsp' );
	wp_register_script( 'jquery-ttsp', $GLOBALS['TheTheSP']['wp_plugin_dir_url'].'style/js/jquery.ttsp.js');
	wp_enqueue_script( 'jquery-ttsp' );	
}
/**
 * Init
 */
function TheTheSP_Init()
{
	$jQuery['jquery-version'] = '1.6.4';
	$jQuery['jqueryui-version'] = '1.8';
	add_action('wp_print_scripts', "TheTheSP_head_scripts");	
	
	wp_deregister_style( 'ttsp-all' );
	wp_register_style( 'ttsp-all', $GLOBALS['TheTheSP']['wp_plugin_dir_url'].'style/css/ttsp.all.css');
	wp_enqueue_style('ttsp-all');
	
	
}


/**
 * Install
 */
function TheTheSP_Activate()
{
	
}
/**
 * UnInstall
 */
function TheTheSP_deActivate()
{
	delete_option('ttsp_options');
}