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

function film_taxonomies() {

	$label =  array(
		'name'                       => _x( 'Genres', 'taxonomy general name' ),
		'singular_name'              => _x( 'Genre', 'taxonomy singular name' ),
		'search_items'               => __( 'Search Genres' ),
		'all_items'                  => __( 'All Genres' ),
		'parent_item'                => __( 'Parent Genre' ),
		'parent_item_colon'          => __( 'Parent Genre:' ),
		'edit_item'                  => __( 'Edit Genre' ),
		'update_item'                => __( 'Update Genre' ),
		'add_new_item'               => __( 'Add New Genre' ),
		'new_item_name'              => __( 'New Genre Name' ),
		'separate_items_with_commas' => __( 'Separate Genre with commas' ),
		'add_or_remove_items'        => __( 'Add or remove Genres' ),
		'choose_from_most_used'      => __( 'Choose from the most used Genres' ),
		'not_found'                  => __( 'No Genres found.' ),
		'menu_name'                  => __( 'Genres' ),
	);

	$args_genre  = array(
		'hierarchical'          => true,
		'labels'                => $label,
		'show_ui'               => true,
		'show_admin_column'     => true,
		//'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		// 'show_in_nav_menus'  => false,
		'public'                => true,
		'publicly_queryable'    => true,
		'has_archive'           => true,
		'rewrite'               => array( 'slug' => 'film-genre' ),
	);

	$label =  array(
		'name'                       => _x( 'Countries', 'taxonomy general name' ),
		'singular_name'              => _x( 'Country', 'taxonomy singular name' ),
		'search_items'               => __( 'Search Countries' ),
		'all_items'                  => __( 'All Countries' ),
		'parent_item'                => __( 'Parent Country' ),
		'parent_item_colon'          => __( 'Parent Country:' ),
		'edit_item'                  => __( 'Edit Country' ),
		'update_item'                => __( 'Update Country' ),
		'add_new_item'               => __( 'Add New Country' ),
		'new_item_name'              => __( 'New Country Name' ),
		'separate_items_with_commas' => __( 'Separate Country with commas' ),
		'add_or_remove_items'        => __( 'Add or remove Countries' ),
		'choose_from_most_used'      => __( 'Choose from the most used Countries' ),
		'not_found'                  => __( 'No Country found.' ),
		'menu_name'                  => __( 'Countries' ),
	);

	$args_country  = array(
		'hierarchical'          => true,
		'labels'                => $label,
		'show_ui'               => true,
		'show_admin_column'     => true,
		//'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		// 'show_in_nav_menus'  => false,
		'public'                => true,
		'publicly_queryable'    => true,
		'has_archive'           => true,
		'rewrite'               => array( 'slug' => 'film-country' ),
	);

	$labels = array(
		'name'                       => _x( 'Years', 'taxonomy general name' ),
		'singular_name'              => _x( 'Year', 'taxonomy singular name' ),
		'search_items'               => __( 'Search Years' ),
		'all_items'                  => __( 'All Years' ),
		'parent_item'                => __( 'Parent Year' ),
		'parent_item_colon'          => __( 'Parent Year:' ),
		'edit_item'                  => __( 'Edit Year' ),
		'update_item'                => __( 'Update Year' ),
		'add_new_item'               => __( 'Add New Year' ),
		'new_item_name'              => __( 'New Year Name' ),
		'separate_items_with_commas' => __( 'Separate Year with commas' ),
		'add_or_remove_items'        => __( 'Add or remove Years' ),
		'choose_from_most_used'      => __( 'Choose from the most used Years' ),
		'not_found'                  => __( 'No Years found.' ),
		'menu_name'                  => __( 'Years' ),
	);

	$args_year = array(
		'hierarchical'          => true,
		'labels'                => $labels,
		'show_ui'               => true,
		'show_admin_column'     => true,
		//'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		// 'show_in_nav_menus'  => false,
		'public'                => true,
		'publicly_queryable'    => true,
		'has_archive'           => true,
		'rewrite'               => array( 'slug' => 'film-year' ),
	);

	$labels = array(
		'name'                       => _x( 'Actors', 'taxonomy general name' ),
		'singular_name'              => _x( 'Actor', 'taxonomy singular name' ),
		'search_items'               => __( 'Search Actors' ),
		'all_items'                  => __( 'All Actors' ),
		'parent_item'                => __( 'Parent Actor' ),
		'parent_item_colon'          => __( 'Parent Actor:' ),
		'edit_item'                  => __( 'Edit Actor' ),
		'update_item'                => __( 'Update Actor' ),
		'add_new_item'               => __( 'Add New Actor' ),
		'new_item_name'              => __( 'New Actor Name' ),
		'separate_items_with_commas' => __( 'Separate Actor with commas' ),
		'add_or_remove_items'        => __( 'Add or remove Actors' ),
		'choose_from_most_used'      => __( 'Choose from the most used Actors' ),
		'not_found'                  => __( 'No Actors found.' ),
		'menu_name'                  => __( 'Actors' ),
	);

	$args_actor = array(
		'hierarchical'          => true,
		'labels'                => $labels,
		'show_ui'               => true,
		'show_admin_column'     => true,
		//'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		// 'show_in_nav_menus'  => false,
		'public'                => true,
		'publicly_queryable'    => true,
		'has_archive'           => true,
		'rewrite'               => array( 'slug' => 'film-actor' ),
	);


	register_taxonomy( 'film-genre', 'film', $args_genre );
	register_taxonomy( 'film-country', 'film', $args_country );
	register_taxonomy( 'film-year', 'film', $args_year );
	register_taxonomy( 'film-actor', 'film', $args_actor );

}
add_action( 'init', 'film_taxonomies');

function film_list_func( $atts ){
	global $wp_query, $post;

	$atts = shortcode_atts( array(
		'limit' => ''
	), $atts );

	if (!isset($atts['limit']) || empty($atts['limit'])) {
		$atts['limit'] = 5;
	}

	$loop = new WP_Query( array(
		'posts_per_page'    => $atts['limit'],
		'post_type'         => 'film',
		'orderby'           => 'id',
		'order'             => 'ASC'
	) );

	if( ! $loop->have_posts() ) {
		return 'no';
	}

	?>

	<div><h3>Latest Films</h3></div>

	<?php

	while( $loop->have_posts() ) {
		$loop->the_post();
		echo '<div class="film-link-sidebar"><a href="'.get_the_permalink().'">';
		echo the_title().'</a> - '.strip_tags(get_the_term_list(get_the_ID(), 'film-genre', '', ' / ')).'</div>';
	}

	wp_reset_postdata();
}

function register_shortcodes() {
	add_shortcode( 'film_list', 'film_list_func' );
}
add_action( 'init', 'register_shortcodes');
