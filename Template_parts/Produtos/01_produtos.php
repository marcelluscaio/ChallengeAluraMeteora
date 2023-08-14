<?php
$term = !isset($_GET["produto"]) || empty($_GET["produto"]) ? '' : $_GET["produto"];

$search = !isset($_GET["search"]) || empty($_GET["search"]) ? '' : $_GET["search"];

$posts = get_posts(array(
    'numberposts'   => 9, 
    'post_type'     => 'cm_produtos'
));

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
}

if($search !== ''){
	$posts = get_posts(array(
			'numberposts'   => 9, 
			'post_type'     => 'cm_produtos',
			'meta_key'      => 'nome_produto',
			'meta_value'    => $search
	));
}

$posts_information = array();

foreach($posts as $post){
	$nome = get_field('nome_produto');
	$descricao = get_field('descricao_produto');
	$imagem = get_field('imagem_produto');
	$preco = get_field('preco_produto');

	$preco = number_format(floatval($preco), 2, ',', '.');

	array_push($posts_information, array(
		'nome' => $nome,
		'descricao' => $descricao,
		'imagem' => $imagem,
		'preco' => $preco
		)
	);
}

?>

<section class="highlights container">
	<h2 class="title">Nossos produtos</h2>
	<ul>

<?php 
foreach($posts_information as $post) :
?>
		<li>
			<article>
				<img src="<?= $post['imagem'] ?>" alt="<?= $post['nome'] ?>" />
				<div>
					<h3 class="title title--extra-small"><?= $post['nome'] ?></h3>
					<p class="description regular-text regular-text--small "><?= $post['descricao'] ?></p>
					<p class="price title title--extra-small ">R$ <?= $post['preco'] ?></p>
					<a class="button regular-text" href="">Ver mais</a>
				</div>
			</article>
			
			<dialog class="modal modal--<?= $counter ?>">
				<header>
					<h2 class="regular-text">Confira detalhes sobre o produto</h2>
					<button class="button button--white close-modal modal--<?= $counter ?>">X</button>
				</header>
				<div>
					<img src="<?= $post['imagem'] ?>" alt="<?= $post['nome'] ?>" />
					<div>
						<h3 class="title title--extra-small"><?= $post['nome'] ?></h3>
						<p class="description regular-text regular-text--small "><?= $post['descricao'] ?></p>
						<p class="price title title--extra-small ">R$ <?= $post['preco'] ?></p>
						<form>
							<h4 class="title title--extra-small regular-text--small">Cores</h4>
						
<?php 
foreach($post['cores'] as $cor):
	$input_name = "input-".strtolower(str_replace(' ', '-', $post['nome']));
	$input_id = "input-".$cor."-".strtolower(str_replace(' ', '-', $post['nome']));
	$input_class = 'input-'.strtolower(str_replace(' ', '-', $cor));
?>
							<div class="modal__form__color-size">
								<label for="<?= $input_id ?>" class="<?= $input_class ?> regular-text regular-text--small"><?= $cor ?></label>
								<input type="radio" value="<?= $cor ?>" id="<?= $input_id ?>" class="<?= $input_class ?>" name="<?= $input_name ?>" />
							</div>
<?php 
endforeach;
?>
							<h4 class="title title--extra-small regular-text--small">Tamanho:</h4>
<?php 
foreach($post['sizes'] as $size):
$input_name = "input-size-".strtolower(str_replace(' ', '-', $post['nome']));
?>
							<div class="modal__form__color-size">
								<label class="regular-text regular-text--small"><?= $size ?></label>
								<input type="radio" value="<?= $size ?>" name="<?= $input_name ?>" />
							</div>
<?php 
endforeach
?>
							<button class="button">Adicionar à sacola</button>
						</form>
					</div>
				</div>
			</dialog>

		</li>
<?php
endforeach
?>
   </ul>
</section>