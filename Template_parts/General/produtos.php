<?php
//get products information
$posts_information = $args['posts_information'];

//get products instances
$product_instances = [];
$counter = 1;
$iterator = 'tipo_produto_'.$counter;
while(gettype(get_field($iterator)) === "array" && 
              get_field($iterator)["tamanho_tipo_produto"] !== false && 
              get_field($iterator)["cor_tipo_produto"] !== false && 
              get_field($iterator)["tamanho_tipo_produto"] !== false
){
  $instance_object = get_field($iterator);

  array_push($product_instances, 
    array(
      "cor" => $instance_object["cor_tipo_produto"]->name,
      "tamanho" => $instance_object["tamanho_tipo_produto"]->name,
      "quantidade" => $instance_object["quantidade_tipo_produto"]
    )
  );
  $counter++;
  $iterator = 'tipo_produto_'.$counter;
};

//generate array and JSON
foreach($posts_information as $post){
	$array_name_instances = [$post['nome'], $product_instances];
	$file_path = get_theme_root()."/meteora/dist/js/general/product-information.js";
	$json_pre_content = substr(file_get_contents($file_path), 0, strpos(file_get_contents($file_path), "=") + 2);
	$json_content = substr(file_get_contents($file_path), strpos(file_get_contents($file_path), "=") + 2);
	$json_content_php = $json_content !== "" ? json_decode($json_content) : array();
	array_push($json_content_php, $array_name_instances);
	$array_json = json_encode($json_content_php);
	file_put_contents($file_path, $json_pre_content.$array_json);
}
?>

<style>
<?php
//getting all color to create styles
$todas_as_cores = get_terms('cm_colors'); 
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
		'sizes' => $post['sizes']
	)
) 
?>

		</li>

<?php
endforeach
?>
  </ul>
</section>