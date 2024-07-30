<?php

class Depoimento
{
	public function __construct()
	{
		add_action('init', array($this, 'create_custom_post_type_depoimento'));
	}

	public function create_custom_post_type_depoimento()
	{
		$labels = [
			'name' => _x('Depoimentos', 'post type general name'),
			'singular_name' => _x('depoimento', 'post type singular name'),
			'add_new' => _x('Adicionar', 'depoimento'),
			'add_new_item' => __('Adicionar novo Depoimento'),
			'edit_item' => __('Editar depoimento'),
			'new_item' => __('Novo depoimento'),
			'view_item' => __('View depoimento'),
			'search_items' => __('Search depoimento'),
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
			'menu_position'         => 2,
			'show_in_admin_bar'     => true,
			'rewrite' 				=> true,
			'show_in_nav_menus'     => true,
			'can_export'			=> true,
			'menu_icon'             => 'dashicons-media-text',
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'     	=> array('post', 'depoimento'),
			'map_meta_cap'        => true,
		];
		register_post_type('depoimento', $args);
	}

	public function activate()
	{
		$this->create_custom_post_type_depoimento();
		flush_rewrite_rules();
	}

	public function deactivate()
	{
		flush_rewrite_rules();
	}
}

//Roles for Admin, Editor
function role_caps_depoimento()
{
	$roles = array('editor', 'administrator');
	foreach ($roles as $the_role) {
		$role = get_role($the_role);
		$role->add_cap('read');
		$role->add_cap('read_depoimento');
		$role->add_cap('read_private_depoimento');
		$role->add_cap('edit_depoimento');
		$role->add_cap('edit_others_depoimento');
		$role->add_cap('edit_published_depoimento');
		$role->add_cap('publish_depoimento');
		$role->add_cap('delete_others_depoimento');
		$role->add_cap('delete_private_depoimento');
		$role->add_cap('delete_published_depoimento');
	}
}
add_action('admin_init', 'role_caps_depoimento', 999);

// POSTMETA ************************************************
include ABSPATH . '/wp-content/plugins/retinaweb/includes/types/postmeta/postmeta-depoimento.php';
