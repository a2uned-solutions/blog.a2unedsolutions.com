<?php

// Add parent styles
function enqueue_parent_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

// Add custom styles
function custom_styles() {
    wp_enqueue_style( 'screen', '/wp-content/themes/a2uned/assets/stylesheets/screen.css',false,'1.1','all');
}
add_action( 'wp_enqueue_scripts', 'custom_styles' );

// Remove default google fonts
function wpse_dequeue_google_fonts() {
    wp_dequeue_style( 'twentyseventeen-fonts' );
}
add_action( 'wp_enqueue_scripts', 'wpse_dequeue_google_fonts', 20 );

// Add custom google Fonts
function custom_add_google_fonts() {
    wp_enqueue_style( 'custom-google-fonts', 'https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,900', false );
}
add_action( 'wp_enqueue_scripts', 'custom_add_google_fonts' );

?>
