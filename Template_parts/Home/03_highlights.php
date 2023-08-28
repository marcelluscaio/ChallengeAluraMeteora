<?php
//getting highlighted products
$posts = get_posts(array(
    'numberposts'   => 9, 
    'post_type'     => 'cm_produtos',
    'meta_key'      => 'is_highlight',
    'meta_value'    => true
));

//getting information from posts
$posts_information = array();
foreach($posts as $post){
	$nome = get_field('nome_produto');
	$descricao = get_field('descricao_produto');
	$imagem = get_field('imagem_produto');
	$preco = get_field('preco_produto');
	$preco = number_format(floatval($preco), 2, ',', '.');
	
	//gets all product types
	$product_instances = [];
	$counter = 1;
	$iterator = 'tipo_produto_'.$counter;
	while(gettype(get_field($iterator)) === "array"){
		array_push($product_instances, 
			array(
				"cor" => get_field($iterator)["cor_tipo_produto"]->name,
				"tamanho" => get_field($iterator)["tamanho_tipo_produto"],
				"quantidade" => get_field($iterator)["quantidade_tipo_produto"]
			)
		);
		$counter++;
		$iterator = 'tipo_produto_'.$counter;
	};
	var_dump($product_instances);
	var_dump(get_field('tipo_produto_1')["cor_tipo_produto"]);
	var_dump(get_field('tipo_produto_1')["tamanho_tipo_produto"]);
	var_dump(get_field('tipo_produto_1')["quantidade_tipo_produto"]);


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
$todas_as_cores = get_terms('cm_colors');
?>

<style>
<?php 
foreach($todas_as_cores as $cor) :
$classe = '.input-'.strtolower(str_replace(' ', '-', $cor->name));
$hexa_cor = get_field('cor','cm_colors'.'_'.$cor->term_id);
?>

.modal__form__color-size <?= $classe ?>:checked{
	background-color: <?= $hexa_cor ?>;
}

label<?= $classe ?>:hover{
	color: <?= $hexa_cor ?>;
}

<?php 
endforeach
?>
</style>

<section class="highlights container">
	<h2 class="title">Produtos que estão bombando</h2>
	<ul>

<?php
$counter = 0;
foreach($posts_information as $post) :
$counter++;
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
get_template_part('Template_parts/Modal/modal', '', 
	array(
		'counter' => $counter,
		'imagem' => $post['imagem'],
		'nome' => $post['nome'],
		'descricao' => $post['descricao'],
		'preco' => $post['preco'],
		'cores' => $post['cores'],
		'sizes' => $post['sizes'],
	)
) 
?>

		</li>

<?php
endforeach
?>
  </ul>
</section>