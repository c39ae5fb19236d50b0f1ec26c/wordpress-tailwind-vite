<?php
/**
 * Plugin Name: My Custom Block
 * Version: 1.0.0
 * Author: Your Name
 * Text Domain: my-custom-block
 */

 function my_custom_block_enqueue() {
    wp_register_style(
        'my-custom-block',
        plugins_url( 'index.css', __FILE__ ),
        array(),
        filemtime( plugin_dir_path( __FILE__ ) . 'index.css' )
    );

    wp_register_script(
        'my-custom-block',
        plugins_url( 'build/index.js', __FILE__ ),
        array( 'wp-blocks', 'wp-element', 'wp-editor' ),
        filemtime( plugin_dir_path( __FILE__ ) . 'build/index.js' )
    );

    register_block_type( 'my-custom-block/my-block', array(
        'editor_script' => 'my-custom-block',
        'editor_style'  => 'my-custom-block',
        'style'         => 'my-custom-block',
    ) );
}

add_action( 'init', 'my_custom_block_enqueue' );


# simple animation for this block
function my_custom_block_enqueue_scripts() {
    wp_enqueue_script(
        'my-custom-block-script',
        plugins_url( 'animation.js', __FILE__ ),
        array(),
        '1.0.0',
        true
    );
}
add_action( 'wp_enqueue_scripts', 'my_custom_block_enqueue_scripts' );