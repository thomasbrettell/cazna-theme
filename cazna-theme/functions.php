<?php

function cazna_files() {
  wp_enqueue_style('boostrap', "https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css");
  wp_enqueue_script("bootstrap_js", "https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js", null, '1.0', true);
  wp_enqueue_style('cazna_main_styles', get_stylesheet_uri());
  wp_enqueue_script("jQuery", "https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js", NULL, '1.0', true);
  wp_enqueue_script("main_js", get_theme_file_uri("/index.js"), NULL, "1.0", true);
}
add_action('wp_enqueue_scripts','cazna_files');


function my_favicon() { 
  ?> <link rel="shortcut icon" href="/wp-content/themes/cazna-theme/assets/cazna-logo-vector.svg" > <?php
}
add_action('wp_head', 'my_favicon');


function cazna_custom_posts() {

  // Products post type
  register_post_type('product', array(
    'hierarchical' => true,
    "show_in_rest" => true,
    "supports" => array("title", "editor", "excerpt", 'page-attributes', "thumbnail"),
    "rewrite" => array("slug" => "products"),
    'public' => true,
    'labels' => array(
      "name" => "Products",
      "add_new_item" => "Add New Product",
      "edit_item" => "Edit Product",
      "all_items" => "All Products",
      "singular_name" => "Product"
    ),
    "menu_icon" => "dashicons-products"
  ));

  // Services post type
  register_post_type('service', array(
    'hierarchical' => true,
    "show_in_rest" => true,
    "supports" => array("title", "editor", "excerpt", 'page-attributes', "thumbnail"),
    "rewrite" => array("slug" => "services"),
    'public' => true,
    'labels' => array(
      "name" => "Services",
      "add_new_item" => "Add New Service",
      "edit_item" => "Edit Service",
      "all_items" => "All Service",
      "singular_name" => "Service"
    ),
    "menu_icon" => "dashicons-admin-generic"
  ));
}
add_action("init", "cazna_custom_posts");


function cazna_features()
{
  add_theme_support("title-tag");
  add_theme_support("post-thumbnails");
  register_nav_menu("headerMenuLocation", "Head Menu Location");

}
add_action("after_setup_theme", "cazna_features");

function remove_admin_login_header() {
    remove_action('wp_head', '_admin_bar_bump_cb');
}
add_action('get_header', 'remove_admin_login_header');

?>