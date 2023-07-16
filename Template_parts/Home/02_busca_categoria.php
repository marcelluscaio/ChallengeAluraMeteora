<?php
$produtos = get_terms('cm_types');
$array_produtos = array();
foreach($produtos as $produto){
	$nome = $produto->name;
	$url = get_field('thumbnail', 'cm_types_'.$produto->term_id);
	array_push($array_produtos, array('nome' => $nome, 'url' =>$url));
}
?>

<section class="container">
	<h2 class="title">Busque por categoria:</h2>
	<!-- Fazer um filtro por categora do WordPress -->
	<!-- Puxar automaticamente por categorias (Categoria -> categoria) -->
	<ul>
<?php
foreach($array_produtos as $produto):
?>
		<li>
				<a href="">
					<img src="<?= $produto['url'] ?>" alt="<?= $produto['nome'] ?>"/>
					<h3 class="title title--extra-small"><?= $produto['nome'] ?></h3>
				</a>
		</li>
<?php
endforeach
?>
		<li>
				<a href="">
					<img src="" alt=""/>
					<h3 class="title title--extra-small">Camisetas</h3>
				</a>
		</li>
		<li>
				<a href="">
					<img src="" alt=""/>
					<h3 class="title title--extra-small">Bolsas</h3>
				</a>
		</li>
		<li>
				<a href="">
					<img src="" alt=""/>
					<h3 class="title title--extra-small">Calçados</h3>
				</a>
		</li>
		<li>
				<a href="">
					<img src="" alt=""/>
					<h3 class="title title--extra-small">Calças</h3>
				</a>
		</li>
		<li>
				<a href="">
					<img src="" alt=""/>
					<h3 class="title title--extra-small">Casacos</h3>
				</a>
		</li>
		<li>
				<a class="" href="">
					<img src="" alt=""/>
					<h3 class="title title--extra-small">Óculos</h3>
				</a>
		</li>
	</ul>
</section>


