<?php

// Add parent styles
function enqueue_parent_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

// Add custom styles and scripts
function custom_styles() {
    wp_enqueue_style( 'screen', '/wp-content/themes/a2uned/assets/stylesheets/screen.css',false,'1.1','all');
    wp_enqueue_script( 'a2uned', '/wp-content/themes/a2uned/assets/js/a2uned.js', array( 'jquery' ));
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

// Add our function to the post content filter
add_action( 'the_content', 'wpb_author_info_box' );

// Allow HTML in author bio section
remove_filter('pre_user_description', 'wp_filter_kses');

// Add author bio to post page
function wpb_author_info_box( $content ) {

    global $post;

    if ( is_single() && isset( $post->post_author ) ) {

        $display_name = get_the_author_meta( 'display_name', $post->post_author );

        if ( empty( $display_name ) )
            $display_name = get_the_author_meta( 'nickname', $post->post_author );

        $user_description = get_the_author_meta( 'user_description', $post->post_author );

        $user_website = get_the_author_meta('url', $post->post_author);

        $user_posts = get_author_posts_url( get_the_author_meta( 'ID' , $post->post_author));

        if ( ! empty( $display_name ) )

            $author_details = '<h4 class="author-name">About ' . $display_name . '</h4>';

        if ( ! empty( $user_description ) )

            $author_details .= '<p class="author-details">' . get_avatar( get_the_author_meta('user_email') , 90 ) . nl2br( $user_description ). '</p>';

        $author_details .= '<p class="author-links"><a href="'. $user_posts .'">View all articles by ' . $display_name . '</a></p>';

        $content = $content . '<footer class="author-bio-section" >' . $author_details . '</footer>';
    }
    return $content;
}

?>
