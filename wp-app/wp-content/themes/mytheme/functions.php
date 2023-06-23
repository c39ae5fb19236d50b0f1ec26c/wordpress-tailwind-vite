<?php

# add tailwind styles
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

# register menu on admin console
function register_my_menu() {
    register_nav_menu('main-menu',__( 'Main menu' ));
  }
  add_action( 'init', 'register_my_menu' );

# add sticky menu script
function my_theme_scripts() {
    wp_enqueue_script( 'my-script', get_template_directory_uri() . '/js/sticky-menu.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'my_theme_scripts' );

# 5 words excerpt
function custom_excerpt_length($length) {
    return 5; 
}
add_filter('excerpt_length', 'custom_excerpt_length', 999);

# implement google fonts
function add_google_fonts() {
   wp_enqueue_style( 'add_google_fonts', 'https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap', false );
}
add_action( 'wp_enqueue_scripts', 'add_google_fonts' );

# create reviews type post
function create_review_post_type() {
    $args = array(
        'public' => true,
        'label'  => 'Opinie',
        'supports' => array('title', 'editor', 'thumbnail')
    );
    register_post_type('opinie', $args);
}
add_action('init', 'create_review_post_type');

# add fields for review
if(function_exists('acf_add_local_field_group')):

    acf_add_local_field_group(array(
        'key' => 'group_1',
        'title' => 'Opinie',
        'fields' => array(
            array(
                'key' => 'field_1',
                'label' => 'Ocena',
                'name' => 'ocena',
                'type' => 'number',
                'instructions' => '',
                'required' => 1,
                'conditional_logic' => 0,
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'min' => '1',
                'max' => '5',
                'step' => '0.5',
            ),
            array(
                'key' => 'field_2',
                'label' => 'Imię i nazwisko',
                'name' => 'imie_i_nazwisko',
                'type' => 'text',
                'instructions' => '',
                'required' => 1,
                'conditional_logic' => 0,
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_3',
                'label' => 'Stanowisko',
                'name' => 'stanowisko',
                'type' => 'text',
                'instructions' => '',
                'required' => 1,
                'conditional_logic' => 0,
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_4',
                'label' => 'Zdjęcie / Avatar',
                'name' => 'zdjecie_avatar',
                'type' => 'image',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'return_format' => 'array',
                'preview_size' => 'thumbnail',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'opinie',
                ),
            ),
        ),
    ));
    
    endif;