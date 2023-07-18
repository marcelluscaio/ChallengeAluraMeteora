<?php
$posts = get_posts(array(
    'numberposts'   => 9, 
    'post_type'     => 'cm_produtos',
    'meta_key'      => 'is_highlight',
    'meta_value'    => true
));

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
	<h2 class="title">Produtos que estão bombando</h2>
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
					<a class="button" href="">Ver mais</a>
				</div>
			</article>
		</li>
<?php
endforeach
?>
   </ul>
</section>