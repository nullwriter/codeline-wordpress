<?php

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles()
{
	wp_enqueue_style('unite-style', get_template_directory_uri() . '/style.css');
	wp_enqueue_style('child-style',
		get_stylesheet_directory_uri() . '/style.css',
		array('unite-style'),
		wp_get_theme()->get('Version')
	);
}

function film_cpt() {

	$labels = array(
		'name'                  => _x( 'Film', 'Post Type General Name', 'film_cpt' ),
		'singular_name'         => _x( 'film', 'Post Type Singular Name', 'film_cpt' ),
		'menu_name'             => __( 'Film', 'admin menu', 'film_cpt' ),
		'name_admin_bar'        => __( 'Film', 'add new on admin bar', 'film_cpt' ),
		'all_items'             => __( 'All Films', 'film_cpt' ),
		'add_new_item'          => __( 'Add New Film', 'film_cpt' ),
		'add_new'               => __( 'New Film', 'film_cpt' ),
		'new_item'              => __( 'New Film', 'film_cpt' ),
		'edit_item'             => __( 'Edit Film', 'film_cpt' ),
		'update_item'           => __( 'Update Film', 'film_cpt' ),
		'view_item'             => __( 'View Film', 'film_cpt' ),
		'search_items'          => __( 'Search FIlm', 'film_cpt' ),
		'not_found'             => __( 'No Film found', 'film_cpt' ),
		'not_found_in_trash'    => __( 'No Film found in Trash', 'film_cpt' ),
		'featured_image'        => __( 'Featured Image', 'film_cpt' ),
		'set_featured_image'    => __( 'Set featured image', 'film_cpt' ),
		'remove_featured_image' => __( 'Remove featured image', 'film_cpt' ),
		'use_featured_image'    => __( 'Use as featured image', 'film_cpt' ),
		'insert_into_item'      => __( 'Insert into item', 'film_cpt' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'film_cpt' ),
		'items_list'            => __( 'Items list', 'film_cpt' ),
		'items_list_navigation' => __( 'Items list navigation', 'film_cpt' ),
		'filter_items_list'     => __( 'Filter items list', 'film_cpt' ),
	);
	$args = array(
		'label'                 => __( 'Film', 'film_cpt' ),
		'description'           => __( 'Film Post Type', 'film_cpt' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor',  ),
		'taxonomies'            => array( 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
	);
	register_post_type( 'film', $args );
}
add_action( 'init', 'film_cpt');