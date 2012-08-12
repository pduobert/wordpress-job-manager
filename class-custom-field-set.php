<?php namespace jobman;


class Custom_Field_Set {

	private $option_key;  // Key within jobman_options this field set is stored in.
	private $definitions; // Array of raw field definition arrays, as stored in options.
	private $fields;      // Array of nice Custom_Field objects
	
	function __construct( $option_key ) {
		$this->option_key = $option_key;
	}
	
	// Returns an associative array of Custom_Field objects that apply to this set.
	function get_fields() {
		$this->load_fields();
		return $this->fields;
	}
	
	// Adds a new field to this set, assigning it a new id automagically.
	function add_field( $field ) {
		$this->load_fields();
		
		$next_id = $this->get_next_id();
		$field->id = $next_id;
		
		// Insert this field into both the raw config, and the nice Custom_Field list
		$this->fields[ $next_id ] = $field;
		$this->definitions[ $next_id ] = $field->get_definition();
		
		// My definition array is a child of the options; tell the options that they need to be saved.		
		Options::save_later();
	}
	
	// Renders this field-set into a form
	function render( $values, $errors ) {
		$this->load_fields();
		if ( count( $this->fields ) == 0 )
			return;

		// Sort by 'sortorder'
		uasort( $this->fields, function( $a, $b ) {
			return $a->sortorder == $b->sortorder ? 0 : ( $a->sortorder < $b->sortorder ? -1 : 1 );
		} );

		// Render each field
		foreach ($this->get_fields() as $field) {
			$field_id = 'jobman-field-' . $field->id;
			$field->render( $values[$field_id], $errors[$field_id] );
		}
	}
	
	// Validates a set of field values for this field set
	function validate( $values ) {
		$this->load_fields();		
		$errors = array();	
	
		// Only check fields that start with 'jobman-field-'
		foreach ( $values as $key => $value ) {
			if ( preg_match( '/^jobman-field-([0-9]+)$/', $key, $matches ) ) {
				$field_id = $matches[1];
				$error = $this->fields[$field_id]->validate( $value );
				if ( ! is_null( $error ) )
					$errors[$key] = $error;
			}
		}
		
		return $errors;
	}
	
	// ************ Private members ************
	
	// Lazy-load custom fields the first time they're needed.
	private function load_fields() {
		if ( ! is_null( $this->fields ) )
			return;
			
		//	Load the raw configuration data
		$this->definitions = &Options::get( $this->option_key, array() );

		//	Generate a nice array of Custom_Fields to play with later
		$this->fields = array();
		foreach ( $this->definitions as $id => &$definition ) {
			$field = Custom_Field::wrap_existing( $this, $definition );
			$field->id = $id;
			$this->fields[ $id ] = $field;
		}
	}
	
	//	Returns the next unused id for a new field
	private function get_next_id() {
		return empty( $this->fields ) ? 0 : max( array_keys( $this->fields ) ) + 1;
	}
}

?>