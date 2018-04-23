<?php

class PostTaxonomy extends PostType {

	public function __construct() {
		parent::__construct();

		add_action( 'init', array( $this, 'create_post_category' ) );
		add_action( 'init', array( $this, 'create_post_tag' ) );
	}

	public function create_post_category() {
		if( is_array( $this->custom_posts ) && ! empty( $this->custom_posts ) ) :
			foreach( $this->custom_posts as $post_type ) :
				$name		= $post_type[ 'name' ];
				$slug		= $post_type[ 'slug' ];
				$singular	= $post_type[ 'singular_name' ];
				$plural		= $post_type[ 'plural_name' ];

				$labels = array(
					'name'							=> _x( $singular . ' Categories', 'taxonomy general name' ),
					'singular_name'					=> _x( $singular . ' Category', 'taxonomy singular name' ),
					'search_items'					=> __( 'Search ' . $singular . ' Categories' ),
					'all_items'						=> __( 'All ' . $singular . ' Categories' ),
					'edit_item'						=> __( 'Edit ' . $singular . ' Category' ), 
					'update_item'					=> __( 'Update ' . $singular . ' Category' ),
					'add_new_item'					=> __( 'Add New ' . $singular . ' Category' ),
					'new_item_name'					=> __( 'New ' . $singular . ' Category\'s Name' ),
					'menu_name'						=> __( $singular . ' Categories' ),
					'parent_item'					=> __( 'Parent ' . $singular ),
					'parent_item_colon'				=> __( 'Parent ' . $singular . ':' ),
					'separate_items_with_commas'	=> __( 'Separate ' . $singular . ' Categories with commas' )
				);

				$args = array(
					'hierarchical'				=> TRUE,
					'labels'					=> $labels,
					'show_ui' 					=> TRUE,
					'query_var' 				=> TRUE,
					'show_admin_column' 		=> TRUE,
					'update_count_callback'		=> '_update_post_term_count',
					'rewrite'					=> array( 'slug' => 'our-' . $slug ),
					'show_in_nav_menus'			=> TRUE
				);

				register_taxonomy( $name . '-category', array( $name ), $args );
			endforeach;
		endif;
	}

	public function create_post_tag() {
		if( is_array( $this->custom_posts ) && ! empty( $this->custom_posts ) ) :
			foreach( $this->custom_posts as $post_type ) :
				$name		= $post_type[ 'name' ];
				$slug		= $post_type[ 'slug' ];
				$singular	= $post_type[ 'singular_name' ];
				$plural		= $post_type[ 'plural_name' ];

				$labels = array(
					'name'							=> _x( $singular . ' Tags', 'taxonomy general name' ),
					'singular_name'					=> _x( $singular . ' Tag', 'taxonomy singular name' ),
					'search_items'					=> __( 'Search ' . $singular . ' Tags' ),
					'all_items'						=> __( 'All ' . $singular . ' Tags' ),
					'edit_item'						=> __( 'Edit ' . $singular . ' Tag' ), 
					'update_item'					=> __( 'Update ' . $singular . ' Tag' ),
					'add_new_item'					=> __( 'Add New ' . $singular . ' Tag' ),
					'new_item_name'					=> __( 'New ' . $singular . ' Tag\'s Name' ),
					'menu_name'						=> __( $singular . ' Tags' ),
					'parent_item'					=> __( 'Parent ' . $singular ),
					'parent_item_colon'				=> __( 'Parent ' . $singular . ':' ),
					'separate_items_with_commas'	=> __( 'Separate ' . $singular . ' Tags with commas' )
				);

				$args = array(
					'hierarchical'				=> TRUE,
					'labels'					=> $labels,
					'show_ui' 					=> TRUE,
					'query_var' 				=> TRUE,
					'show_admin_column' 		=> TRUE,
					'update_count_callback'		=> '_update_post_term_count',
					'rewrite'					=> array( 'slug' => 'our-' . $slug ),
					'show_in_nav_menus'			=> TRUE
				);

				register_taxonomy( $name . '-tag', array( $name ), $args );
			endforeach;
		endif;
	}

}

new PostTaxonomy;

?>