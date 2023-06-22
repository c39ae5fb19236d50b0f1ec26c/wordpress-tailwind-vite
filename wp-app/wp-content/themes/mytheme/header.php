<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo( 'name' ); ?></title>
	<?php wp_head() ?>
</head>
<body <?php body_class(); ?>  >
<nav class="bg-sky-900 sticky" id="navbar">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="flex h-16 items-center justify-between">
      <div class="flex items-center">
        <div class="flex-shrink-0">
        <h1 class="text-white"><a href="<?php echo get_home_url() ?>">LOGO</a>
        </div>
        <div class="hidden sm:ml-6 sm:block">
          <div class="flex space-x-4">
            <?php
                function add_additional_class_on_li($classes, $item, $args) {
                  if(isset($args->add_li_class)) {
                      $classes[] = $args->add_li_class;
                  }
                  return $classes;
                }
                add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

                function add_menu_link_class( $atts, $item, $args ) {
                  if(isset($args->add_link_class)) {
                      $atts['class'] = $args->add_link_class;
                  }
                  return $atts;
                }
                add_filter( 'nav_menu_link_attributes', 'add_menu_link_class', 1, 3 );

                wp_nav_menu( array(
                  'theme_location' => 'main-menu',
                  'container' => false,
                  'items_wrap' => '<ul class="list-none flex">%3$s</ul>',
                  'add_link_class' => 'rounded-md px-3 py-2 text-sm font-medium text-gray-200 hover:bg-sky-700 hover:text-white',
                ) );
                ?>
          </div>
        </div>
      </div>
</nav>
</div>