<?php

add_action('admin_menu', 'thirtyten_add_options_page');

function thirtyten_add_options_page(){
	add_options_page( 'Thirty Ten Options', 'Thirty Ten', 'edit_themes', 'thirtyten', 'thirtyten_options_page');
	add_action( 'admin_init', 'thirtyten_settings' );
}

function thirtyten_settings(){
	register_setting( 'thirtyten-group', 'thirtyten');
	add_settings_section('thirtyten_layout', '', 'thirtyten_layout_text', 'thirtyten_layout');
	add_settings_field('thirtyten_layout_field', 'Layout', 'thirtyten_layout_field_display', 'thirtyten_layout', 'thirtyten_layout');
}


function thirtyten_layout_field_display(){
	$option = get_option('thirtyten');
	echo "<input type='radio' name='thirtyten' value='3c-fixed' ";
	if ($option =='3c-fixed'){echo 'checked';}
	echo "  >Three-column layout with one sidebar on each side of content<br />";
	echo "<input type='radio' name='thirtyten' value='3c-r-fixed-primary' ";
	if ($option =='3c-r-fixed-primary'){echo 'checked';}
	echo " >Three-column layout with two sidebars right of content<br />";
	echo "<input type='radio' name='thirtyten' value='3c-l-fixed-primary' ";
	if ($option =='3c-l-fixed-primary'){echo 'checked';}
	echo " >Three-column layout with two sidebars left of content<br />";
}

function thirtyten_layout_text(){
	echo "<p>Choose the layout style you want</p>";

}

function thirtyten_options_page(){

	//if (! current_user_can() )

	echo "<div>";
	echo "<h2>Hello</h2>";
	echo '<form action="options.php" method="post">';
    settings_fields( 'thirtyten-group' );
    do_settings_sections('thirtyten_layout');?>
	<p class="submit">
    <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
    </p>
	</form>
	<?php
	echo "</div>";

}


add_action('init', 'thirtyten_add_layout_css');

function thirtyten_add_layout_css(){
	$option = get_option('thirtyten');
	$src =  get_stylesheet_directory_uri() . "/$option.css";
	wp_enqueue_style( 'thirtyten_layout', $src );
}
