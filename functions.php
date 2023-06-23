<?php
//https://ralphjsmit.com/cleanup-wordpress-head-tag
//https://www.webdesignvista.com/remove-unnecessary-scripts-from-header-in-wordpress/

//Remove generator
remove_action( 'wp_head', 'wp_generator' );

//Remove RSD Link
remove_action( 'wp_head', 'rsd_link' );

//Remove REST API link tag
remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
 
//Remove oEmbed links
remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
 
//Remove REST API in HTTP Headers
remove_action( 'template_redirect', 'rest_output_link_header', 11, 0 );

//Remove WLW Manifest
remove_action( 'wp_head', 'wlwmanifest_link' );

//Remove rss feed links
remove_action('wp_head', 'feed_links', 2);

//Remove extra feed links
remove_action('wp_head', 'feed_links_extra', 3); 

//Remove post relational links
remove_action('wp_head', 'adjacent_posts_rel_link');   

//Remove emoji related scripts & Styles
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

//Remove shortlink tag
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);


/*https://smartwp.com/remove-gutenberg-css/*/
function remove_wp_block_library_css(){
wp_dequeue_style( 'wp-block-library' );
wp_dequeue_style( 'wp-block-library-theme' );
}
add_action( 'wp_enqueue_scripts', 'remove_wp_block_library_css', 100 );


/*https://generatepress.com/forums/topic/remove-classic-themes-css-completely/*/
add_action( 'wp_enqueue_scripts', function() {
    wp_dequeue_style( 'classic-theme-styles' );
}, 20 );

/*https://wordpress.org/support/topic/how-to-disable-inline-styling-style-idglobal-styles-inline-css/*/
function wps_deregister_styles() {
    wp_dequeue_style( 'global-styles' );
}
add_action( 'wp_enqueue_scripts', 'wps_deregister_styles', 100 );

remove_action('wp_head', '_admin_bar_bump_cb');





function cm_add_style(){
   wp_register_style('cm_general-style', get_template_directory_uri().'/style.css');

   wp_enqueue_style('cm_general-style');
}
add_action('wp_enqueue_scripts', 'cm_add_style')


//Criar pasta Functions
//require  get_template_directory().'/functions/funcao.php'

//Hooks
//add_action()
?>