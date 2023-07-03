<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?=bloginfo('name')?></title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
	<?php wp_head() ?>
</head>
<body>

<?php
	$header_logo = get_template_directory_uri()."/assets/images/logo.png";
	$header_menu = wp_nav_menu(
		array(
			'theme_location' => 'primary', /*Nome registrado em function.php register nav menu*/
			'container' => '',
			'menu_class' => 'regular-text',
			'echo' => false
		)
	);
?>

<header class="header">
	<div class="header__desktop-container container">
		<div class="header__mobile-container container">
			<!-- Colocar dinamicamente no painel administrativo -->
			<img class= "header__logo" src=<?= $header_logo ?> alt="" />
<?php
	if(has_nav_menu('primary')) :
?>
			<nav>
				<?= $header_menu ?>
			</nav>

<?php 
	else:
?>
			<p class="header__menu-message regular-text">Cadastre um menu</p>
<?php
	endif;
?>
		</div>
		<form>
			<div class="container">
				<input class="regular-text regular-text--small" type="text" placeholder="Digite o produto" />
				<button class="regular-text button button--white">Buscar</button>
			</div>
		</form>
	</div>
</header>