<?php
//getting highlighted products
$posts = get_posts(array(
    'numberposts'   => 9, 
    'post_type'     => 'cm_produtos',
    'meta_key'      => 'is_highlight',
    'meta_value'    => true
));

$posts_information = array();

//getting information from posts
foreach($posts as $post){
	$nome = get_field('nome_produto');
	$descricao = get_field('descricao_produto');
	$imagem = get_field('imagem_produto');
	$preco = get_field('preco_produto');

	$preco = number_format(floatval($preco), 2, ',', '.');

//getting product's color
	$cores_objeto = get_the_terms($post, 'cm_colors');
	$cores = array();
	foreach($cores_objeto as $cor){
		array_push($cores, $cor->name);
	}

	array_push($posts_information, array(
		'nome' => $nome,
		'descricao' => $descricao,
		'imagem' => $imagem,
		'preco' => $preco,
		'cores' => $cores
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
<?= $classe ?>{
	accent-color: <?= $hexa_cor ?>
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
			<dialog class="modal modal--<?= $counter ?>">
				<header>
					<h2 class="regular-text">Confira detalhes sobre o produto</h2>
					<button class="button button--white close-modal modal--<?= $counter ?>">X</button>
				</header>
				<div>
					<img src="<?= $post['imagem'] ?>" alt="<?= $post['nome'] ?>" />
					<h3 class="title title--extra-small"><?= $post['nome'] ?></h3>
					<p class="description regular-text regular-text--small "><?= $post['descricao'] ?></p>
					<p class="price title title--extra-small ">R$ <?= $post['preco'] ?></p>
					<form>
						<h4>Cores</h4>
						
<?php 
foreach($post['cores'] as $cor):
	$input_name = "input-".str_replace(' ', '-', $post['nome']);
	$input_id = "input-".$cor."-".str_replace(' ', '-', $post['nome']);
	$input_class = 'input-'.strtolower(str_replace(' ', '-', $cor));
?>
						<label for="<?= $input_id ?>"><?= $cor ?></label>
						<input type="radio" value="<?= $cor ?>" id="<?= $input_id ?>" class="<?= $input_class ?>" name="<?= $input_name ?>" />
<?php 
endforeach;
?>
						<label>Tamanho:</label>
						<input type="checkbox" />
						<button>Adicionar à sacola</button>
					</form>
				</div>
			</dialog>
		</li>
<?php
endforeach
?>
   </ul>
</section>