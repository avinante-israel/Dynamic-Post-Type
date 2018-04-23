<?php

class PostColumn extends PostType {

	public function __construct() {
		parent::__construct();

		add_action( 'init', array( $this, 'init_post_column' ) );
	}

	public function init_post_column() {
		if( is_array( $this->custom_posts ) && ! empty( $this->custom_posts ) ) :
			foreach( $this->custom_posts as $post_type ) :
				$name 		= $post_type[ 'name' ];

				add_filter( 'manage_edit-' . $name . '_columns', array( $this, 'post_columns' ), 5 );
				add_action( 'manage_' . $name . '_posts_custom_column', array( $this, 'custom_column' ), 1, 1);
				add_filter( 'manage_edit-' . $name . '_sortable_columns', array( $this, 'sortable_column' ) );
			endforeach;
		endif;
	}

	public function post_columns( $columns ) {
		if( is_array( $this->custom_posts ) && ! empty( $this->custom_posts ) ) :
			foreach( $this->custom_posts as $post_type ) :
				$name		= $post_type[ 'name' ];
				$singular	= $post_type[ 'singular_name' ];

				$post_columns[ 'cb' ]					= '<input type="checkbox" />';
				$post_columns[ 'title' ] 				= _x( 'Title', 'column name' );
				$post_columns[ 'author' ] 				= __( 'Author' );
				$post_columns[ $name . '-category' ]	= __( $singular . ' Category' );
				$post_columns[ 'date' ] 				= _x( 'Date', 'column name' );
				return $post_columns;
			endforeach;
		endif;
	}

	public function custom_column( $column ) {
		if( is_array( $this->custom_posts ) && ! empty( $this->custom_posts ) ) :
			foreach( $this->custom_posts as $post_type ) :
				$name		= $post_type[ 'name' ];
				$singular	= $post_type[ 'singular_name' ];

				switch( $column ) :
					case $name . "-category":
						$terms =  get_the_terms( $post->ID, $name . '-category');
						if ( $terms ) :
							$i = 0;
							$total = count( $terms ) ;
							foreach ( $terms as $term => $customterm ) :
								echo '<a href="'.get_bloginfo( 'url' ).'/wp-admin/edit.php?post_type=' . $name . '&' . $name . '-category='.$customterm->slug.'">'.$customterm->name.'</a>';
								if ( $i < $total-1 ) { echo ', ' ; }
								$i++ ;
							endforeach;
						else :
							echo 'Not linked to a ' . $singular . ' Category' ;
						endif;
					break;
				endswitch;
			endforeach;
		endif;
	}

	public function sortable_column( $columns ) {
		if( is_array( $this->custom_posts ) && ! empty( $this->custom_posts ) ) :
			foreach( $this->custom_posts as $post_type ) :
				$name		= $post_type[ 'name' ];

				$columns[ $name . '-category' ] = $name . '-category';
				return $columns;
			endforeach;
		endif;
	}

}

new PostColumn;

?>