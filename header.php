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
	$file_path = get_theme_root()."/meteora/dist/js/general/product-information.js";
	file_put_contents($file_path, "");
	
	$header_logo = get_template_directory_uri()."/assets/images/logo.png";
	$header_menu = wp_nav_menu(
		array(
			'theme_location' => 'primary', /*Nome registrado em function.php register nav menu*/
			'container' => '',
			'menu_class' => 'regular-text',
			'echo' => false
		)
	);
	$home_url = get_home_url()
?>

<header class="header">
	<div class="header__desktop-container container">
		<div class="header__mobile-container container">
			<!-- Colocar dinamicamente no painel administrativo -->
			<a href="<?= $home_url ?>">
				<img class= "header__logo" src=<?= $header_logo ?> alt="" />
			</a>
<?php
	if(has_nav_menu('primary')) :
?>
			<button aria-expanded="false" aria-controls="menu" class="header__hamburger-button" id="hamburger-button">
				<div class="line"></div>
				<div class="line"></div>
				<div class="line"></div>
			</button>
			<nav aria-hidden="true" id="menu">
				<button aria-expanded="false" aria-controls="menu" class="header__hamburger-button header__hamburger-button--close" id="hamburger-button">
					<div class="line"></div>
					<div class="line"></div>
					<div class="line"></div>
				</button>
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
		<form action="todos-produtos' ?>">
			<div class="container">
				<input class="regular-text regular-text--small" type="text" placeholder="Digite o produto"  name="search"/>
				<button class="regular-text button button--white">Buscar</button>
			</div>
		</form>
	</div>
</header>