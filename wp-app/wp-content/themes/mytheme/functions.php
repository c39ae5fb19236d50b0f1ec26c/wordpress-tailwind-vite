<?php

# adding tailwind styles
function enqueue_tailwind_styles() {
    $manifest_path = get_stylesheet_directory() . '/dist/manifest.json';

    if (file_exists($manifest_path)) {
        $manifest = json_decode(file_get_contents($manifest_path), true);
        $css_file_uri = get_stylesheet_directory_uri() . '/dist/' . $manifest['style.css']['file'];
        wp_enqueue_style( 'tailwind', $css_file_uri, [], null );
    } else {
        error_log('Manifest file not found: ' . $manifest_path);
    }
}
add_action( 'wp_enqueue_scripts', 'enqueue_tailwind_styles' );

# registering menu on admin console
function register_my_menu() {
    register_nav_menu('main-menu',__( 'Main menu' ));
  }
  add_action( 'init', 'register_my_menu' );

