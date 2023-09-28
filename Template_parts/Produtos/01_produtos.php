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

//get post information
$posts_information = array();
foreach($posts as $post){
	$nome = get_field('nome_produto');
	$descricao = get_field('descricao_produto');
	$imagem = get_field('imagem_produto');
	$preco = get_field('preco_produto');
	$preco = number_format(floatval($preco), 2, ',', '.');

	//getting product's color - Custom taxonomy
	$cores_object = get_the_terms($post, 'cm_colors');
	$cores = array();
	foreach($cores_object as $cor){
		array_push($cores, $cor->name);
	};

	//getting product's size - Custom taxonomy
	$sizes_object = get_the_terms($post, 'cm_sizes');
	$sizes = array();
	foreach($sizes_object as $size){
		array_push($sizes, $size->name);
	};

	array_push($posts_information, array(
		'nome' => $nome,
		'descricao' => $descricao,
		'imagem' => $imagem,
		'preco' => $preco,
		'cores' => $cores,
		'sizes' => $sizes
		)
	);
}

//getting all color to create styles
/* $todas_as_cores = get_terms('cm_colors'); */
?>

<?php 
get_template_part( 'Template_parts/General/produtos', '', array('posts_information' => $posts_information))
?>

<!-- <style>
<?php 
/* foreach($todas_as_cores as $cor) :
$classe = '.input-'.strtolower(str_replace(' ', '-', $cor->name));
$hexa_cor = get_field('cor','cm_colors'.'_'.$cor->term_id); */
?>

.modal__form__color-size <?= $classe ?>:checked{
	background-color: <?= $hexa_cor ?>;
}

label<?= $classe ?>:hover{
	color: <?= $hexa_cor ?>;
}

<?php 
/* endforeach */
?>
</style>

<section class="highlights container">
	<h2 class="title">Nossos produtos</h2>
	<ul>

<?php
/* $counter = 0;
foreach($posts_information as $post) :
$counter++; */
?>
		<li>
			<article>
				<img src="<?= $post['imagem'] ?>" alt="<?= $post['nome'] ?>" />
				<div>
					<h3 class="title title--extra-small"><?= $post['nome'] ?></h3>
					<p class="description regular-text regular-text--small "><?= $post['descricao'] ?></p>
					<p class="price title title--extra-small ">R$ <?= $post['preco'] ?></p>
					<button class="button regular-text open-modal modal--<?= $counter ?>">Ver mais</button>
				</div>
			</article>
			
<?php 
/* get_template_part('Template_parts/Modal/modal', '', 
	array(
		'counter' => $counter,
		'imagem' => $post['imagem'],
		'nome' => $post['nome'],
		'descricao' => $post['descricao'],
		'preco' => $post['preco'],
		'cores' => $post['cores'],
		'sizes' => $post['sizes'],
	)
)  */
?>

		</li>
<?php
/* endforeach */
?>
   </ul>
</section> -->