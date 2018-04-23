<?php

class PostRegister extends PostType {

	public function __construct() {
		parent::__construct();

		add_action( 'init', array( $this, 'create_post_type' ) );
		add_action( 'init',	array( $this, 'init_post_type' ) );
	}

	public function create_post_type() {
		if( is_array( $this->custom_posts ) && ! empty( $this->custom_posts ) ) :
			foreach( $this->custom_posts as $post_type ) :
				$name		= $post_type[ 'name' ];
				$slug		= $post_type[ 'slug' ];
				$singular	= $post_type[ 'singular_name' ];
				$plural		= $post_type[ 'plural_name' ];

				register_post_type( $name,
					array(
						'labels'		=> array(
							'name' 					=> __( $plural ),
							'singular_name'			=> __( $singular ),
							'add_new'				=> __( 'Add a ' . $singular ),
							'add_new_item'			=> __( 'Add New ' . $singular ),
							'edit_item'				=> __( 'Edit ' . $plural ),
							'search_items'			=> __( 'Search ' . $plural ),
							'not_found'				=> __( 'Not Found' ),
							'not_found_in_trash'	=> __( 'Not Found in Trash' ),
							'parent_item_colon'		=> __( $plural . ':' ),
							'menu_name'				=> __( $plural )
						),
						'public'		=> TRUE,
						'has_archive'	=> TRUE,
						'rewrite'		=> array( 'slug' => $slug ),
						'menu_postiion'	=> 5,
						// Remove default category and tag
						// 'taxonomies'	=> array( 'category', 'post_tag' ),
						'hierarchical'	=> TRUE
					)
				);
			endforeach;
		endif;
	}

	public function init_post_type() {
		if( is_array( $this->custom_posts ) && ! empty( $this->custom_posts ) ) :
			foreach( $this->custom_posts as $post_type ) :
				$name = $post_type[ 'name' ];

				add_post_type_support( $name, 'title' );
				add_post_type_support( $name, 'editor' );
				add_post_type_support( $name, 'thumbnail' );
				add_post_type_support( $name, 'page-attributes' );
				add_post_type_support( $name, 'post-formats' );
				add_post_type_support( $name, 'custom-fields' );
				add_post_type_support( $name, 'excerpt' );
				add_post_type_support( $name, 'tags');
				add_post_type_support( $name, 'revisions' );
			endforeach;
		endif;
	}

}

new PostRegister;

?>