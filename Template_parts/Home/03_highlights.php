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
	$cores_object = get_the_terms($post, 'cm_colors');
	$cores = array();
	foreach($cores_object as $cor){
		array_push($cores, $cor->name);
	}

	//getting product's size
	$sizes_object = get_the_terms($post, 'cm_sizes');
	$sizes = array();
	foreach($sizes_object as $size){
		array_push($sizes, $size->name);
	}

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
			<?php get_template_part('Template_parts/Modal/modal', '', 
				array(
					'counter' => $counter,
					'imagem' => $post['imagem']
				)
			) ?>



			<?php 
				if(1>2):
			?>
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
		<?php
			endif
		?>
		</li>
<?php
endforeach
?>
   </ul>
</section>