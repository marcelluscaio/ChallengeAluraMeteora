<?php
$posts_information = $args['posts_information']
/* Receber produtos */
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