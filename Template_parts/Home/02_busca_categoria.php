<?php
//QUando clicar em uma categoria, quero mostrar todos os posts daquela categoria
//fazer requisicao mostrando somente aqueles produtos
$query = new WP_Query(
	array('post_type'=>'cm_produtos' ,
				'tax_query' => array(
					array(
						'taxonomy' => 'cm_types',
						'field' => 'slug',
						'terms' => 'Camisa',
					)
				) 
	)
);

while($query->have_posts()){
	$query->the_post();
	$post = $query->post;
	$title = $query->post->post_title;
}

//Mostra todos os tipos de produto
$produtos = get_terms('cm_types');
$array_produtos = array();
foreach($produtos as $produto){
	$nome = $produto->name;
	$url = get_field('thumbnail', 'cm_types_'.$produto->term_id);
	array_push($array_produtos, array('nome' => $nome, 'url' =>$url));
}
?>

<section class="search container">
	<h2 class="title">Busque por categoria:</h2>
	<!-- Fazer um filtro por categora do WordPress -->
	<!-- Puxar automaticamente por categorias (Categoria -> categoria) -->
	<ul class="search__items">
<?php
foreach($array_produtos as $produto):
?>
		<li>
				<a href="http://alurachallengemeteora.local/todos-produtos/?produto=<?= $produto['nome'] ?>">
					<img src="<?= $produto['url'] ?>" alt="<?= $produto['nome'] ?>"/>
					<h3 class="title title--extra-small"><?= $produto['nome'] ?></h3>
				</a>
		</li>
<?php
endforeach
?>
		<!-- <li>
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
		</li> -->
	</ul>
</section>


