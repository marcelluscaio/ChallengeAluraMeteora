<?php
$website_url = get_site_url();

//Get all product types
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
	<ul class="search__items">
<?php
foreach($array_produtos as $produto):
?>
		<li>
				<a href="<?= $website_url ?>/todos-produtos/?produto=<?= $produto['nome'] ?>">
					<img src="<?= $produto['url'] ?>" alt="<?= $produto['nome'] ?>"/>
					<h3 class="title title--extra-small"><?= $produto['nome'] ?></h3>
				</a>
		</li>
<?php
endforeach
?>
	</ul>
</section>


