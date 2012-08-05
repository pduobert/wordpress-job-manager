<?php namespace jobman;

// ************ Form-building helpers ************

// Echoes the beginning of a <form> tag, and throws in some hidden <input>s to help recognize submission
function form_open( $action, $nonce ) {
	?>
		<form action="<?php echo $action ?>" enctype="multipart/form-data" method="post">
			<input type="hidden" name="jobmansubmit" value="1" />
	<?php
	wp_nonce_field( $nonce ); 
}

// Echoes the opening table row line appropriate for an admin form	
function field_open( $label, $div_class = '', $col_span = 1 ) {
	?>
		<tr>
			<th scope="row"><?php echo $label ?></th>
			<td colspan="<?php echo $col_span ?>">
				<div class="<?php echo $div_class ?>">
	<?php
}

// Echoes the closing table row line appropriate for an admin form
function field_close( $description = '' ) {
	?>
				</div>
			</td>
			<?php if ( '' != $description ) { ?>
				<td>
					<span class="description">
						<?php echo $description ?>
					</span>
				</td>
			<?php } ?>
		</tr>
	<?php
}	

// Render a set of radio buttons, with a preselected entry
function render_radio_list( $name, $selected_option, $options ) {
	foreach ( $options as $option ) {
		$checked = ( $selected_option == $option[0] ) ? 'checked="checked"' : '';
		?>
			<label>
				<input type="radio" name="<?php echo $name ?>" value="<?php echo $option[0] ?>" <?php echo $checked ?> />
				<?php echo $option[1] ?>
			</label>
		<?php
	}
}

// Render a text field
function render_text_field( $name, $value = '' ) {
	?>
		<input type="text" name="<?php echo $name ?>" value="<?php echo $value ?>" />
	<?php
}

// Render a date picker
function render_date_picker( $name, $value = '' ) {
	?>
		<input type="text" class="datepicker" name="<?php echo $name ?>" value="<?php echo $value ?>" />
	<?php
}

// Render a textarea
function render_text_area( $name, $value = '' ) {
	if( user_can_richedit() && version_compare( $wp_version, '3.3-aortic-dissection', '<' )) {
		?>
			<p id="field-toolbar-<?php echo $name ?>" class="jobman-editor-toolbar">
				<a class="toggleHTML">
					<?php _e( 'HTML', 'jobman' ) ?>
				</a>
				<a class="active toggleVisual">
					<?php _e( 'Visual', 'jobman' ) ?>
				</a>
			</p>
			<textarea class="large-text code jobman-editor <?php echo $name ?>" name="<?php echo $name ?>" id="<?php echo $name ?>" rows="7"><?php echo $value ?></textarea>
		<?php
	}
	else {
		wp_editor( $value, $name, array(
			'editor_class' => "large-text code jobman-editor $name"
		) );
	}
}
