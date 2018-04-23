<?php

class PostField extends PostMeta {

	public function __construct() {
		parent::__construct();
	}

	public function meta_fields( $type, $meta = array(), $value ) {
		switch ( $type ):
			case "text":
				$this->field_text( $meta, $value );
				break;

			case "password":
				$this->field_password( $meta, $value );
				break;

			case "hidden":
				$this->field_hidden( $meta, $value );
				break;

			case "textarea":
				$this->field_textarea( $meta, $value );
				break;

			case "select":
				$this->field_select( $meta, $value );
				break;

			case "radio":
				$this->field_radio( $meta, $value );
				break;

			case "checkbox":
				$this->field_checkbox( $meta, $value );

			default:
				echo "Invalid field type";
		endswitch;
	}

	public function field_text( $meta, $value ) {
		?>
		<div class="form-group">
			<label class="meta-label" for="<?php echo $meta[ 'name' ] ?>"><?php echo $meta[ 'label' ] ?>: </label>
			<input type="text" id="<?php echo $$meta[ 'name' ] ?>" name="<?php echo $meta[ 'name' ] ?>" class="<?php echo $meta[ 'class' ] ?>" value="<?php echo $value ?>" />
		</div>
		<?php
	}

	public function field_password( $meta, $value ) {
		?>
		<div class="form-group">
			<label class="meta-label" for="<?php echo $meta[ 'name' ] ?>"><?php echo $meta[ 'label' ] ?>: </label>
			<input type="password" id="<?php echo $$meta[ 'name' ] ?>" name="<?php echo $meta[ 'name' ] ?>" class="<?php echo $meta[ 'class' ] ?>" value="<?php echo $value ?>" />
		</div>
		<?php
	}

	public function field_hidden( $meta, $value ) {
		?>
		<input type="hidden" id="<?php echo $$meta[ 'name' ] ?>" name="<?php echo $meta[ 'name' ] ?>" class="<?php echo $meta[ 'class' ] ?>" value="<?php echo $value ?>" />
		<?php
	}

	public function field_textarea( $meta, $value ) {
		?>
		<div class="form-group">
			<label class="meta-label" for="<?php echo $meta[ 'name' ] ?>"><?php echo $meta[ 'label' ] ?>: </label>
			<textarea id="<?php echo $meta[ 'name' ] ?>" name="<?php echo $meta[ 'name' ] ?>" class="<?php echo $meta[ 'class' ] ?>" rows="<?php echo $meta[ 'rows' ] ?>"><?php echo $value ?></textarea>
		</div>
		<?php
	}

	public function field_select( $meta, $value ) {
		?>
		<div class="form-group">
			<label class="meta-label" for="<?php echo $meta[ 'name' ] ?>"><?php echo $meta[ 'label' ] ?>: </label>
			<select id="<?php echo $meta[ 'name' ] ?>" name="<?php echo $meta[ 'name' ] ?>" class="<?php echo $meta[ 'class' ] ?>">
				<option></option>
				<?php foreach( $meta[ 'options' ] as $options ) : ?>
					<option value="<?php echo $options ?>" <?php echo ( $options === $value ? 'selected' : '' ); ?> ><?php echo $options ?></option>
				<?php endforeach; ?>
			</select>
		</div>
		<?php
	}

	public function field_radio( $meta, $value ) {
		echo "Radio button field not implemented yet";
	}

	public function field_checkbox( $meta, $value ) {
		echo "Checkbox field not implemented yet";
	}

}

new PostField;

?>