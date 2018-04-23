<?php

class PostType {

	public function __construct() {
		$this->custom_posts = $this->custom_post_types();
		$this->post_fields = $this->post_meta_fields();
	}

	public function custom_post_types() {
		$services = array(
			'name'				=> 'service',
			'slug'				=> 'services',
			'singular_name'		=> 'Service',
			'plural_name'		=> 'Services'
		);

		$pricings = array(
			'name'				=> 'pricing',
			'slug'				=> 'pricings',
			'singular_name'		=> 'Pricing',
			'plural_name'		=> 'Pricings'
		);

		$args = array( $services, $pricings );

		return $args;
	}

	public function custom_post_type_slug() {
		$post_type_data = get_post_type_object( get_post_type() );
		$post_type_slug = $post_type_data->rewrite[ 'slug' ];

		return $post_type_slug;
	}

	public function post_meta_fields() {
		$fontawesome = array(
			'post_slug'		=> 'services',
			'field_name'	=> 'fontawesome',
			'field_type'	=> 'text',
			'field_meta'	=> array(
				'label'		=> 'Font Awesome',
				'name'		=> 'fontawesome',
				'class'		=> 'form-control',
				'rows'		=> ''
			)
		);

		$subheader = array(
			'post_slug'		=> 'pricings',
			'field_name'	=> 'subheader',
			'field_type'	=> 'textarea',
			'field_meta'	=> array(
				'label'		=> 'Sub Header',
				'name'		=> 'subheader',
				'class'		=> 'form-control',
				'rows'		=> 3
			)
		);

		$weekly = array(
			'post_slug'		=> 'pricings',
			'field_name'	=> 'weekly',
			'field_type'	=> 'text',
			'field_meta'	=> array(
				'label'		=> 'Hours per Week',
				'name'		=> 'weekly',
				'class'		=> 'form-control',
			)
		);

		$blog_posting = array(
			'post_slug'		=> 'pricings',
			'field_name'	=> 'blog_posting',
			'field_type'	=> 'select',
			'field_meta'	=> array(
				'label'		=> 'Blog Posting',
				'name'		=> 'blog_posting',
				'class'		=> 'form-control',
				'options'	=> array( 'Yes', 'No' )
			)
		);

		$data_entry = array(
			'post_slug'		=> 'pricings',
			'field_name'	=> 'data_entry',
			'field_type'	=> 'select',
			'field_meta'	=> array(
				'label'		=> 'Data Entry',
				'name'		=> 'data_entry',
				'class'		=> 'form-control',
				'options'	=> array( 'Yes', 'No' )
			)
		);

		$ecommerce = array(
			'post_slug'		=> 'pricings',
			'field_name'	=> 'ecommerce',
			'field_type'	=> 'select',
			'field_meta'	=> array(
				'label'		=> 'E-commerce Development',
				'name'		=> 'ecommerce',
				'class'		=> 'form-control',
				'options'	=> array( 'Yes', 'No' )
			)
		);

		$server = array(
			'post_slug'		=> 'pricings',
			'field_name'	=> 'server',
			'field_type'	=> 'select',
			'field_meta'	=> array(
				'label'		=> 'Server Management',
				'name'		=> 'server',
				'class'		=> 'form-control',
				'options'	=> array( 'Yes', 'No' )
			)
		);

		$templating = array(
			'post_slug'		=> 'pricings',
			'field_name'	=> 'templating',
			'field_type'	=> 'select',
			'field_meta'	=> array(
				'label'		=> 'Templating',
				'name'		=> 'templating',
				'class'		=> 'form-control',
				'options'	=> array( 'Yes', 'No' )
			)
		);

		$wpdev = array(
			'post_slug'		=> 'pricings',
			'field_name'	=> 'wpdev',
			'field_type'	=> 'select',
			'field_meta'	=> array(
				'label'		=> 'WordPress Development',
				'name'		=> 'wpdev',
				'class'		=> 'form-control',
				'options'	=> array( 'Yes', 'No' )
			)
		);

		$args = array( 
			$fontawesome,
			$subheader,
			$weekly,
			$templating,
			$wpdev,
			$data_entry,
			$blog_posting,
			$server,
			$ecommerce,
		);

		return $args;
	}

}

new PostType;

?>