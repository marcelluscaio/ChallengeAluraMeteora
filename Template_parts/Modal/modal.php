<?php 
	$counter = $args['counter'];
	$imagem = $args['imagem'];
	$nome = $args['nome'];
	$descricao = $args['descricao'];
	$preco = $args['preco'];
	$cores = $args['cores'];
	$sizes = $args['sizes'];
?>

<dialog class="modal modal--<?= $counter ?>">
	<header>
		<h2 class="regular-text">Confira detalhes sobre o produto</h2>
		<button class="button button--white close-modal modal--<?= $counter ?>">X</button>
	</header>
	<div>
		<img src="<?= $imagem ?>" alt="<?= $nome ?>" />
		<div>
			<h3 class="title title--extra-small"><?= $nome ?></h3>
			<p class="description regular-text regular-text--small "><?= $descricao ?></p>
			<p class="price title title--extra-small ">R$ <?= $preco ?></p>
			<form>
<?php
	get_template_part('Template_parts/Modal/modal__options', '', 
		array(
			"title" => "Cor",
			"feature_list" => $cores,
			"product" => $nome
		)
	)
?>
<?php
	get_template_part('Template_parts/Modal/modal__options', '', 
		array(
			"title" => "Tamanho",
			"feature_list" => $sizes,
			"product" => $nome
		)
	)
?>
				<div class="modal__form__quantity">
					<label class="title title--extra-small regular-text--small">Quantidade</label>
					<select class="regular-text regular-text--small">
						<option> </option>
					</select>
				</div>	

				<button class="button">Adicionar à sacola</button>
			</form>
		</div>
	</div>
</dialog>