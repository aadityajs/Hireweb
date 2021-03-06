<?php
/*
 Plugin Name: Misiek Page Category
 Version: 2.2
 Plugin URI: http://wordpress.org/extend/plugins/misiek-page-category/
 Description: Creates categories for pages and displays them as widget
 Author: Michal Augustyniak
 Author URI: http://www.maugustyniak.com

 Copyright YEAR  PLUGIN_AUTHOR_NAME  (email : misiek303@gmail.com)

 This program is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation; either version 2 of the License, or
 (at your option) any later version.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with this program; if not, write to the Free Software
 Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

global $wpdb;
define("mpc_path", ABSPATH . 'wp-content/plugins/misiek-page-category/');

define('MPC_CATEGORIES', $wpdb->prefix . "mpc_categories");
define('MPC_PAGES_CATEGORIES', $wpdb->prefix . "mpc_pages_categories");
define('POSTS', $wpdb->prefix . "posts");

if (version_compare($wp_version, '2.8', '>=')) {
	include_once mpc_path . 'widget.php';
} else {
	add_action('widget_init', 'mpc_widget_init');
}

add_action('admin_menu', 'mpc_config');
add_action('admin_menu', 'mpc_attribute');

register_activation_hook( __FILE__, 'mpc_active');

function mpc_active() {

	$categories = array( 'id' => 'int NOT NULL AUTO_INCREMENT',
	'name' => 'varchar(255) NOT NULL',
	'description' => 'text NOT NULL',
	'PRIMARY' => 'KEY (id)'
	);
	mpc_create_table($categories, MPC_CATEGORIES);

	$pages_categories = array( 'id' => 'int NOT NULL AUTO_INCREMENT',
	'category_id' => 'int NOT NULL',
	'post_id' => 'int NOT NULL',
	'PRIMARY' => 'KEY (id)'
	);
	mpc_create_table($pages_categories, MPC_PAGES_CATEGORIES);

	// upgrade table to v2.1
	global $wpdb;
	$wpdb->query("ALTER TABLE " . MPC_CATEGORIES . " ADD COLUMN parent_id int null");
	$wpdb->query("ALTER TABLE " . MPC_CATEGORIES . " ADD COLUMN post_id int null");
}

function mpc_create_table($options, $table) {
	global $wpdb;
	$sql = "CREATE TABLE " . $table . '(';
	foreach($options as $column => $option) {
		$sql .= "{$column} {$option}, ";
	}
	$sql = rtrim($sql, ', ') . ")";

	if($wpdb->get_var("SHOW TABLES LIKE '" . $table . "'") != $table) {
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		dbDelta($sql);
	}
}

function mpc_config() {
	add_submenu_page('edit-pages.php', __('Categories'), __('Categories'), 8, 'add-category', 'mpc_categories_page');
}

function mpc_attribute() {
	add_meta_box('mpc', __('Categories'), 'mpc_attribute_box', 'page', 'side', 'low');
	add_action('edit_post', 'mpc_hook_post_save');
}

function mpc_attribute_box() {
	global $wpdb;
	$categories = mpc_get_categories();

  echo "<ul>";
	foreach((array)$categories as $category) {
		if ($wpdb->get_results("select * from " . MPC_PAGES_CATEGORIES . " where category_id = '{$category->id}' and post_id = '{$_GET['post']}'",'ARRAY_A')) {
			$checked = "checked=''";
		} else {
			$checked = "";
		}

		print "<li><input {$checked} type='checkbox' name='categories[]' value='{$category->id}' /> " . $category->name . "</li>";
	}
  echo "</ul>";
}

function mpc_categories_page() {
	global $wpdb;

	if ($_POST['add_category']) {

		if (isset($_POST['cat_post'])) {
			$post_id = mpc_create_page($_POST['cat_name']);
		}	else {
			$post_id = null;
		}

		$wpdb->query("insert into " . MPC_CATEGORIES . " (name, description, parent_id, post_id) values ('{$_POST['cat_name']}','{$_POST['cat_description']}','{$_POST['parent_id']}', '{$post_id}')");

	} elseif ($_POST['action'] == 'delete') {

		foreach((array)$_POST['cat'] as $id) {
			mpc_delete_category($id);
		}

	} elseif ($_POST['edit_category']) {

		if (isset($_POST['cat_post_del'])) {

			$category_edit = $wpdb->get_row("select * from " . MPC_CATEGORIES . " where id = {$_GET['id']}");

			if (wp_delete_post($category_edit->post_id)) {
				$post_id = 0;
			}

		} elseif (isset($_POST['cat_post'])) {
			$post_id = mpc_create_page($_POST['cat_name']);
		}

		$wpdb->query("update " . MPC_CATEGORIES . " set name = '{$_POST['cat_name']}', description = '{$_POST['cat_description']}', post_id = '{$post_id}' where id = " . $_GET['id']);
		echo '<SCRIPT language="JavaScript">window.location="'.$_SERVER['SCRIPT_URI'].'?post_type=page&page=add-category"</SCRIPT>';

	} elseif ($_GET['edit'] == 'true') {

		$category_edit = $wpdb->get_row("select * from " . MPC_CATEGORIES . " where id = {$_GET['id']}");

	}

	$categories = mpc_get_categories();
	include mpc_path . 'categories.php';
}

function mpc_hook_post_save($ID) {
	global $wpdb;

	mpc_delete_all_pages($_POST['post_ID']);

	foreach((array)$_POST['categories'] as $category_id) {
		$wpdb->query("insert into " . MPC_PAGES_CATEGORIES . " (post_id, category_id) values ('{$_POST['post_ID']}','{$category_id}')");
	}
}

function mpc_widget_categories($title = false, $total = false, $expend = true, $category_names = array(), $category_ids = array(), $desc = false, $catpages_in_uncat = false) {
	global $wpdb;
	global $post;

	$categories = mpc_all_get_page_categories($category_names, $category_ids);

	if ((in_array('Uncategorized', $category_names) || array_key_exists('Uncategorized', $category_names)) || (!$category_names && !$category_ids)) {
		$uncategorized = mpc_get_uncategorized_pages($catpages_in_uncat);
	}

	if(!$title) {
		$title = 'Page Categories';
	}

	//print '<li class="mpc_pages_categories widget-container widget_page_categories"><h3 class="widget-title">' . $title . '</h3><ul>';

	foreach((array)$categories as $category) {
		$p_categories = mpc_get_page_category($category->category_id);

		if (count($p_categories) > 0) {

			if ($category->post_id > 0) {
				$cat_post = get_permalink($category->post_id);
				$class = '';
				if ($post->ID == $category->post_id) {
					$class = 'current';
				}
				//echo "<li class='{$class}' ><a href='{$cat_post}'>$category->name</a> ";
			} else {
				//echo "<li>$category->name";
			}

			if ($total) {
				echo "(" . count($p_categories). ")";
			}

			if ($desc) {
				echo "<p>" . $category->description . "</p>";
			}

			echo "</li><div id='TabbedPanels1' class='VTabbedPanels'><ul class='TabbedPanelsTabGroup'>";

			if (!$expend) {
				foreach((array)$p_categories as $p_category) {
					$inner_post = &get_post($p_category->post_id);
					$link = get_permalink($p_category->post_id);
					$class = '';
					if ($post->ID == $p_category->post_id) {
						$class = 'current';
					}


					print "<li class='TabbedPanelsTab' ><a href='{$link}'> " . $inner_post->post_title . "</a></li>";





				}
			}

			print '</ul><div class=TabbedPanelsContentGroup>

			 <div class="TabbedPanelsContent">
                	<h1>Web Designing</h1>
                    <div class="wrapper">
                       <div class="left_content">
                    	<p>We offer custom iPhone application development and game development services to clients globally. Hire our expert team of iphone app developers for hi-end iphone app development solutions....</p>
                        <p>Game development services to clients globally. Hire our expert team of iphone app developers for hi-end iphone app development solutions...</p>
                    </div>
                    <div class="right_content"><img src="../../themes/images/webdesign.png" alt=""></div>
                  </div>
                </div>

                <div class="TabbedPanelsContent">
	                2
			 	</div>

                <div class="TabbedPanelsContent">3 </div>

                <div class="TabbedPanelsContent">4 </div>

                <div class="TabbedPanelsContent">5 </div>

                <div class="TabbedPanelsContent">6 </div>

                <div class="TabbedPanelsContent">7 </div>

			</div>
              <div class=clear></div>
            </div>';
		}
	}
print "</ul>";
	if ($uncategorized)  {
		echo "<ul><li>Uncategorized ";

		if ($total) {
			echo "(" . count($uncategorized). ")";
		}

		echo "</li><ul>";

		if (!$expend) {

			foreach((array)$uncategorized as $uncat_post) {

				$cat_post = &get_post($uncat_post->id);
				$link = get_permalink($uncat_post->id);

				$class = '';
				if ($post->ID == $uncat_post->id) {
					$class = 'current';
				}

				print "<li class='post_{$cat_post->ID} page_catagory {$class}' ><a href='{$link}' >" . $cat_post->post_title . "</a></li>";
			}

		}
		print "</ul>";
	}

	print "</ul></li>";
}

function mpc_delete_category($id) {
	global $wpdb;
	return $wpdb->query("delete from  " . MPC_CATEGORIES . " where id = '{$id}'");
}

function mpc_get_categories() {
	global $wpdb;
	return $wpdb->get_results("select * from " . MPC_CATEGORIES  . " order by name asc");
}

function mpc_delete_all_pages($id) {
	global $wpdb;
	return $wpdb->query("delete from  " . MPC_PAGES_CATEGORIES . " where post_id = '{$id}'");
}


function mpc_get_childrens_for($category_id) {
	global $wpdb;
	$categories = $wpdb->get_results("select * from " . MPC_CATEGORIES  . " where parent_id = " . $category_id);
	foreach($categories as $category) {
		$childrens[] = $category->id;
	}
	return $childrens;

}

function mpc_all_get_page_categories($category_names = array(), $category_ids = array(), $cascade = false) {
	global $wpdb;

	$conditions = '';

	foreach($category_names as $name) {
		$conditions[] = MPC_CATEGORIES . ".name = '".trim($name)."'";
	}

	foreach($category_ids as $id) {
		$conditions[] = MPC_CATEGORIES . ".id = '".$id."'";
	}

	if ($category_names || $category_ids || $cascade) {
		 $conditions = "WHERE (" . implode(' or ', $conditions) . ")";
	}

	return $wpdb->get_results("select * from " . MPC_PAGES_CATEGORIES . " inner join " . MPC_CATEGORIES . " on " . MPC_CATEGORIES . ".id = " . MPC_PAGES_CATEGORIES . ".category_id {$conditions} group by category_id ;");
}

function mpc_get_page_category($id, $order_by = "post_title") {
	global $wpdb;
	return $wpdb->get_results("select * from " . MPC_PAGES_CATEGORIES . " inner join " . POSTS . " on " . POSTS . ".ID = " . MPC_PAGES_CATEGORIES . ".post_id where post_status = 'publish' and category_id = {$id} order by {$order_by}");
}

function mpc_get_category_page_number($id) {
	global $wpdb;
	$data = $wpdb->get_row("select count(" . MPC_PAGES_CATEGORIES . ".id) as num from " . MPC_PAGES_CATEGORIES . " inner join " . POSTS . " on " . POSTS . ".ID = " . MPC_PAGES_CATEGORIES . ".post_id where category_id = {$id};",'ARRAY_A');
	return $data['num'];
}

function mpc_get_uncategorized_pages($catpages_in_uncat = false) {
	global $wpdb;

	if (!$catpages_in_uncat) {
		$conditions = "and " . POSTS . ".id not in (select post_id from wp_mpc_categories)";
	}

	return $wpdb->get_results("select " . POSTS . ".id as id from " . POSTS . " left join " . MPC_PAGES_CATEGORIES . " on " . POSTS . ".id = " . MPC_PAGES_CATEGORIES . ".post_id where post_type = 'page' and post_status = 'publish' and " . MPC_PAGES_CATEGORIES . ".id is NULL {$conditions} group by " . POSTS . ".id");
}

function mpc_get_category_name($id) {
	if ($id > 0) {
		global $wpdb;

		$category = $wpdb->get_row("select * from " . MPC_CATEGORIES  . " where id = " . $id);
		if ($category) {
			$link = get_permalink($category->post_id);

			if ($link) {
				return "<a href='{$link}'>{$category->name}</a>";
			}

			return $category->name;
		}
	}
}

function mpc_create_page($name) {
	$my_post = array();

	if (file_exists(ABSPATH . WPINC . '/pluggable.php')) {

		require (ABSPATH . WPINC . '/pluggable.php');
		get_currentuserinfo();

		$my_post['post_author'] = $current_user->id;

	} else {
		$my_post['post_author'] = 1;
	}

	$my_post['post_title'] = "Page for the '" . $name . "' Category";
	$my_post['post_status'] = 'publish';

	$my_post['post_type'] = 'page';
	$my_post['page_template'] = 'default';

	return wp_insert_post($my_post);
}

?>