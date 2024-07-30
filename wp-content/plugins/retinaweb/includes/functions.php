<?php

define("IP_UNICAMP", "143.106.16.153");
define("IP_CASA", "177.55.129.170");

// ***************** Add style & script for Admin
function style_and_script()
{
	wp_enqueue_style("stilos1", "https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/css/bootstrap-select.css");
	wp_enqueue_style("stilos2", "https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css");
	wp_enqueue_style("stilos3", "https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css");
	wp_enqueue_style("stilos4", "https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css");
	wp_enqueue_style("stilos5", "https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css");
	wp_enqueue_style("stilos6", "/wp-content/plugins/retinaweb/assets/retinaweb.css");
	wp_enqueue_script("scripts1", "https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js");
	wp_enqueue_script("scripts2", "https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/js/bootstrap-select.js");
	wp_enqueue_script("scripts3", "https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js");
	wp_enqueue_script("scripts4", "https://code.jquery.com/jquery-3.5.1.js");
	wp_enqueue_script("scripts5", "https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js");
	wp_enqueue_script("scripts6", "https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js");
	wp_enqueue_script("scripts7", "/wp-content/plugins/retinaweb/assets/retinaweb.js");
}
add_action("admin_enqueue_scripts", "style_and_script");

// ***************** Add in Menu
function menu_retinaweb()
{
	add_menu_page('retinaweb', 'Retina WEB', 'edit_posts', 'retinaweb', 'function_about', 'dashicons-welcome-view-site', 1);
	add_submenu_page('retinaweb', 'Acessos','Acessos', 'edit_posts', 'acess', 'function_access', 1);
	add_submenu_page('retinaweb', 'Login','Login', 'edit_posts', 'login', 'function_login', 2);
}
add_action('admin_menu', 'menu_retinaweb');

// ***************** Add About
function function_about()
{
	include ABSPATH . '/wp-content/plugins/retinaweb/includes/about.php';
}
add_action('function_about', 'function_about');

// ***************** Add Access
function function_access()
{
	include ABSPATH . '/wp-content/plugins/retinaweb/includes/access.php';
}
add_action('function_access', 'function_access');

// ***************** Add Login
function function_login()
{
	include ABSPATH . '/wp-content/plugins/retinaweb/includes/login.php';
}
add_action('function_login', 'function_login');

// ***************** Add Media
function load_media_files()
{
	wp_enqueue_media();
}
add_action('admin_enqueue_scripts', 'load_media_files');

//************* Add thumbnails
add_theme_support('post-thumbnails', array('depoimento','vantagem'));

//************* Login_redirect
function admin_default_page()
{
	return '/wp-admin/admin.php?page=retinaweb';
}
add_filter('login_redirect', 'admin_default_page');

//************* Remove tags support from posts
function myprefix_unregister_tags()
{
	unregister_taxonomy_for_object_type('post_tag', 'post');
}
add_action('init', 'myprefix_unregister_tags');

//************* Data Base
function registerdb($ip, $url) // register in db
{
	if ($ip != IP_UNICAMP && $ip != IP_CASA) {
		if($url == NULL){
			$url = "/";
		}
		global $wpdb;
		$table_name = $wpdb->prefix . 'access';
		$resp = $wpdb->insert($table_name, array('ipadress' => $ip, 'url' => $url, 'time' => current_time('mysql')));
		if ($resp == 1) {
			return "register db: SUCESS";
		} else {
			return "register db: ERROR";
		}
	}
}
add_action('registerdb', 'registerdb');

function registerdb2($user, $ip, $url) // register in db
{
	if (is_user_logged_in() && $ip != IP_UNICAMP && $ip != IP_CASA) {
		if($url == NULL){
			$url = "/";
		}
		global $wpdb;
		$table_name = $wpdb->prefix . 'login';
		$resp = $wpdb->insert($table_name, array('user' => $user, 'ipadress' => $ip, 'url' => $url, 'time' => current_time('mysql')));
		if ($resp == 1) {
			return "register db: SUCESS";
		} else {
			return "register db: ERROR";
		}
	}
}
add_action('registerdb2', 'registerdb2');

function list_access($table) // list access
{
	global $wpdb;
	$table_name = $wpdb->prefix . $table;
	$results = $wpdb->get_results(
		"SELECT * FROM $table_name ORDER BY id DESC"
	);
	return $results;
}
add_action('list_access', 'list_access');