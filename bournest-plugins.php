<?php

/*
Plugin Name: Bourne Street Plugins
Plugin URI: http://paulh.biz
Description: A plugin to extend the bournestreet theme
Version: 1.1
Author: PaulH
Author URI: http://paulh.biz
License: GPL2
*/

// allow svg file upload

function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}

add_filter('upload_mimes', 'cc_mime_types');

function jk_woocommerce_breadcrumbs() {
  return array(
      'delimiter'   => '<span class="spacer"> > </span>',
      'wrap_before' => '<nav class="woocommerce-breadcrumb" itemprop="breadcrumb">',
      'wrap_after'  => '</div>',
      'before'      => '<span>',
      'after'       => '</span>',
      'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' )
  );
}

add_filter( 'woocommerce_breadcrumb_defaults', 'jk_woocommerce_breadcrumbs', 20 );

// custom field styles on product pages

function my_acf_admin_head() { get_template_part('acf.css'); }

add_action('acf/input/admin_head', 'my_acf_admin_head');

// remove credit lines from footer

function custom_remove_footer_credit () {
  remove_action( 'storefront_footer', 'storefront_credit', 20 );
}

add_action( 'init', 'custom_remove_footer_credit', 10 );

// remove blog links & pingbacks

remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'feed_links', 2 );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'index_rel_link' );
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 );
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_head', 'rel_canonical');
remove_action( 'wp_head', 'wp_shortlink_wp_head');

remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

?>
