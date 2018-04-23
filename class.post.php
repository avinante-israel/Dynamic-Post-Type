<?php

class PostType {

	public function __construct() {
		$this->custom_posts = $this->custom_post_types();
		$this->post_fields = $this->post_meta_fields();
	}

	public function custom_post_types() {
		$teams = array(
			'name'				=> 'team',
			'slug'				=> 'teams',
			'singular_name'		=> 'Team',
			'plural_name'		=> 'Teams'
		);

		$potatoes = array(
			'name'				=> 'potato',
			'slug'				=> 'potatoes',
			'singular_name'		=> 'Potato',
			'plural_name'		=> 'Potatoes'
		);

		$post_types = array( $teams, $potatoes );

		return $post_types;
	}

	public function custom_post_type_slug() {
		$post_type_data = get_post_type_object( get_post_type() );
		$post_type_slug = $post_type_data->rewrite[ 'slug' ];

		return $post_type_slug;
	}

	public function post_meta_fields() {
		$username = array(
			'post_slug'		=> 'teams',
			'field_name'	=> 'member_username',
			'field_type'	=> 'text',
			'field_meta'	=> array(
				'label'		=> 'Username',
				'name'		=> 'name',
				'class'		=> 'form-control',
			)
		);

		$email = array(
			'post_slug'		=> 'teams',
			'field_name'	=> 'member_email',
			'field_type'	=> 'text',
			'field_meta'	=> array(
				'label'		=> 'Email',
				'name'		=> 'email',
				'class'		=> 'form-control',
			)
		);

		$post_fields = array( $username, $email );

		return $post_fields;
	}

}

new PostType;

?>