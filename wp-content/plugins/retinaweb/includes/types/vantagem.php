<?php

class Vantagem
{
	public function __construct()
	{
		add_action('init', array($this, 'create_custom_post_type_vantagem'));
	}

	public function create_custom_post_type_vantagem()
	{
		$labels = [
			'name' => _x('Vantagens', 'post type general name'),
			'singular_name' => _x('vantagem', 'post type singular name'),
			'add_new' => _x('Adicionar', 'vantagem'),
			'add_new_item' => __('Adicionar nova Vantagem'),
			'edit_item' => __('Editar vantagem'),
			'new_item' => __('Novo vantagem'),
			'view_item' => __('View vantagem'),
			'search_items' => __('Search vantagem'),
			'not_found' =>  __('Nothing found'),
			'not_found_in_trash' => __('Nothing found in Trash'),
			'parent_item_colon' => ''
		];
		$args = [
			'labels'				=> $labels,
			'supports'              => ['title', 'thumbnail'/*,'editor' ,'author', 'excerpt'*/],
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'query_var' 			=> true,
			'menu_position'         => 3,
			'show_in_admin_bar'     => true,
			'rewrite' 				=> true,
			'show_in_nav_menus'     => true,
			'can_export'			=> true,
			'menu_icon'             => 'dashicons-megaphone',
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'     	=> array('post', 'vantagem'),
			'map_meta_cap'        => true,
		];
		register_post_type('vantagem', $args);
	}

	public function activate()
	{
		$this->create_custom_post_type_vantagem();
		flush_rewrite_rules();
	}

	public function deactivate()
	{
		flush_rewrite_rules();
	}
}

//Roles for Admin, Editor
function role_caps_vantagem()
{
	$roles = array('editor', 'administrator');
	foreach ($roles as $the_role) {
		$role = get_role($the_role);
		$role->add_cap('read');
		$role->add_cap('read_vantagem');
		$role->add_cap('read_private_vantagem');
		$role->add_cap('edit_vantagem');
		$role->add_cap('edit_others_vantagem');
		$role->add_cap('edit_published_vantagem');
		$role->add_cap('publish_vantagem');
		$role->add_cap('delete_others_vantagem');
		$role->add_cap('delete_private_vantagem');
		$role->add_cap('delete_published_vantagem');
	}
}
add_action('admin_init', 'role_caps_vantagem', 999);

// POSTMETA ************************************************
include ABSPATH . '/wp-content/plugins/retinaweb/includes/types/postmeta/postmeta-vantagem.php';
