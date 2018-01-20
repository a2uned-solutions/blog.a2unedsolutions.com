<?php

function custom_styles() {
    wp_enqueue_style( 'screen', '/wp-content/themes/a2uned/assets/stylesheets/screen.css',false,'1.1','all');
}
add_action( 'wp_enqueue_scripts', 'custom_styles' );