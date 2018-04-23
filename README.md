# Dynamic Post Type
A dynamic WordPress custom post type with custom fields

# Installation
Include **init.php** from your **functions.php**

# Usage
### Adding Post Types
In *class.post.php* under ```custom_post_types()``` function, declare an array of values for your post type - name, slug, singular name, plural name

```
$your_post_type = array(
		'name'			=> 'your_post_type',
		'slug'			=> 'your_post_types',
		'singular_name'		=> 'Your Post Type',
		'plural_name'		=> 'Your Post Types'
	);
```

Include your custom post type in ```$post_types``` array

```
$post_types = array( $your_post_type, $your_other_post_type, $another_post_type );
```

### Adding Post Types
In *class.post.php* under ```post_meta_fields()``` function, declare an array of meta for your custom fields.

- *post_slug* - where you want this field to appear
- *field_name* - name of your field
- *field_type* - type of your field - text, textarea, hidden, password, select
- *field_meta*
  - *label* - label of your field
  - *name* - name of your input field
  - *class* - class name of your input field

```
$your_custom_field = array(
		'post_slug'	=> 'your_post_type',
		'field_name'	=> 'your_custom_field',
		'field_type'	=> 'text',
		'field_meta'	=> array(
			'label'	=> 'Username',
			'name'	=> 'name',
			'class'	=> 'form-control',
	);
```

Include your custom field in ```$post_fields``` array

```
$post_types = array( $your_custom_field, $your_other_custom_field, $another_custom_field );
```

# Notes
The following fields are not yet supported:
- *select mutiple*
- *radio buttons*
- *checkboxes*

These fields will be implemented in the future development.