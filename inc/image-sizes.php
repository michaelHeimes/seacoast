<?php
function add_custom_sizes() {
	// Team Photos
	add_image_size( 'event-thumb', 660, 472, true );
	add_image_size( 'tournament-thumb', 580, 454, true );
	add_image_size( 'banner-img', 672, 526, true );
	add_image_size( 'staff-card', 390, 390, true );
}
add_action('after_setup_theme','add_custom_sizes');