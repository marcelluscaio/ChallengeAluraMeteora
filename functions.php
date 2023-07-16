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
remove_action( 'template_redirect', 'rest_output_link_header', 11);

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
remove_action('wp_head', 'wp_shortlink_wp_head', 10);


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
	wp_register_style('cm_reset', get_template_directory_uri().'/dist/css/general/style-guide/reset.css');
	wp_enqueue_style('cm_reset');

	wp_register_style('cm_layout', get_template_directory_uri().'/dist/css/general/style-guide/layout.css');
	wp_enqueue_style('cm_layout');

	wp_register_style('cm_fonts', get_template_directory_uri().'/dist/css/general/style-guide/fonts.css');
	wp_enqueue_style('cm_fonts');

	wp_register_style('cm_colors', get_template_directory_uri().'/dist/css/general/style-guide/colors.css');
	wp_enqueue_style('cm_colors');

	wp_register_style('cm_buttons', get_template_directory_uri().'/dist/css/general/components/buttons.css');
	wp_enqueue_style('cm_buttons');

	wp_register_style('cm_header', get_template_directory_uri().'/dist/css/general/header/header.css');
	wp_enqueue_style('cm_header');

	wp_register_style('cm_footer', get_template_directory_uri().'/dist/css/general/footer/footer.css');
	wp_enqueue_style('cm_footer');

	wp_register_style('cm_carousel', get_template_directory_uri().'/dist/css/home/carousel.css');
	wp_enqueue_style('cm_carousel');
}
add_action('wp_enqueue_scripts', 'cm_add_style');

function cm_add_script(){
	wp_register_script('cm_hamburger_menu', get_template_directory_uri().'/dist/js/general/hamburger-menu.js');
	wp_enqueue_script('cm_hamburger_menu', '', array(), '', true);

	wp_register_script('cm_carousel', get_template_directory_uri().'/dist/js/home/carousel.js');
	wp_enqueue_script('cm_carousel', '', array(), '', true);
}
add_action('wp_enqueue_scripts', 'cm_add_script');






//habilitando menu configuravel
add_theme_support('menus');
register_nav_menu( 'primary', 'Menu home' ); /*Nome do menu no PHP, nome do menu no painel administrativo*/


//Criar custom post type
function cm_create_cpt_products(){
	register_post_type('cm_produtos',
		array(
			'labels' => array(
				'name' => __('Produtos'),
				'singular_name' => __('Produto')
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'produtos'),
			'show_in_rest' => true,
			'menu_icon' => 'dashicons-cart'
		)
	);
}

add_action( 'init', 'cm_create_cpt_products' );






/*Colocar JS no footer com true no final*/



//Criar pasta Functions
//require  get_template_directory().'/functions/funcao.php'

//Hooks
//add_action()
?>