<?php

class PostMeta extends PostType {

	public function __construct() {
		parent::__construct();

		add_action( 'admin_init', array( $this, 'admin_init_meta_box' ) );
		add_action( 'save_post', array( $this, 'update_meta_values' ) );
	}

	public function admin_init_meta_box() {
		if( is_array( $this->custom_posts ) && ! empty( $this->custom_posts ) ) :
			foreach( $this->custom_posts as $post_type ) :
				$name		= $post_type[ 'name' ];
				$singular	= $post_type[ 'singular_name' ];

				add_meta_box( $name . '-meta', $singular . ' Detail', array( $this, 'meta_box_option' ), $name, 'normal', 'low' );
			endforeach;
		endif;
	}

	public function meta_box_option() {
		global $post;
		$post_ID 		= get_post_custom( $post->ID );
		$fields_meta	= array();
		$fields_value	= array();

		// Get array of field meta from PostType class
		if( is_array( $this->post_fields ) && ! empty( $this->post_fields ) ) : // Check post_fields validity
			foreach( $this->post_fields as $value ) : // The loop
				$post_type_data = get_post_type_object( get_post_type() ); // Something something from stackoverflow
				$post_type_slug = $post_type_data->rewrite[ 'slug' ]; // Get current custom post type slug

				if( $value[ 'post_slug' ] == $post_type_slug ) : // If post_slug is equals to current post type slug
					array_push( $fields_meta, $value ); // Store post_fields value to fields array
					// Someone wrote the code for me here
					array_push( $fields_value, [ 'field_value' => $post_ID[ $value[ 'field_name' ] ][ 0 ] ] );
				endif;
			endforeach;
		endif;

		$this->meta_option_fields( $fields_meta, $fields_value ); // Pass the value to meta_option_fields
	}

	public function meta_option_fields( $meta, $values ) {
		$post_field	= new PostField;

		foreach( $meta as $index => $value ) :
			$post_field->meta_fields( $value[ 'field_type' ], $value[ 'field_meta' ], $values[ $index ][ 'field_value' ] );
		endforeach;
	}

	public function update_meta_values() {
		global $post;

		?><table>
			<tbody><?php
		if( is_array( $this->post_fields ) && ! empty( $this->post_fields ) ) :
			foreach( $this->post_fields as $index => $value ) :
				$post_type_data = get_post_type_object( get_post_type() ); // Something something from stackoverflow
				$post_type_slug = $post_type_data->rewrite[ 'slug' ]; // Get current custom post type slug

				if( $value[ 'post_slug' ] == $post_type_slug ) : // If post_slug is equals to current post type slug
					// Update values
					update_post_meta( $post->ID, $value[ 'field_meta' ][ 'name' ], $_POST[ $value[ 'field_meta' ][ 'name' ] ] );
				endif;
			endforeach;
		endif;
				
			?></tbody>
		</table><?php
	}

}

new PostMeta;

?>