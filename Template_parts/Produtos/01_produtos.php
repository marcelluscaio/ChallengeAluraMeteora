<?php
$term = !isset($_GET["produto"]) || empty($_GET["produto"]) ? '' : $_GET["produto"];

$search = !isset($_GET["search"]) || empty($_GET["search"]) ? '' : $_GET["search"];

//get all product posts
$posts = get_posts(array(
    'numberposts'   => 9, 
    'post_type'     => 'cm_produtos'
));

//posts filtered by category - Getting from url query
//Filtering using xustom taxonomy cm_types
if($term !== ''){
	$posts = get_posts(array(
			'numberposts'   => 9, 
			'post_type'     => 'cm_produtos',
			'tax_query' => array(
					array(
						'taxonomy' => 'cm_types',
						'field' => 'slug',
						'terms' => $term,
					)
				)
	));
};

//posts filtered by name - From search field
if($search !== ''){
	$posts = get_posts(array(
			'numberposts'   => 9, 
			'post_type'     => 'cm_produtos',
			'meta_key'      => 'nome_produto',
			'meta_value'    => $search
	));
};

get_template_part( 'Template_parts/General/produtos', '', array('posts' => $posts))
?>