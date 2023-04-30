<?php
function add_custom_sizes() {
	// Team Photos
	add_image_size( 'event-thumb', 622, 446, true );
	add_image_size( 'tournament-thumb', 564, 442, true );
	add_image_size( 'facility-thumb', 774, 436, true );
	add_image_size( 'banner-bg', 2732, 852, false );
	add_image_size( 'banner-img', 834, 652, false );
	add_image_size( 'staff-card', 390, 390, true );
}
add_action('after_setup_theme','add_custom_sizes');