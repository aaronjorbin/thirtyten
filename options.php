<?php

add_action('admin_init', 'thirtyten_add_options_page');

function thirtyten_add_options_page(){
	add_theme_page( 'Thirty Ten Options', 'thirty_ten_options', 'edit_themes', 'thirtyten_options_page');

}

function thirtyten_options_page(){
	echo "<h2>Hello</h2>";

}