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

<header class="header">
   <div class="header__desktop-container container">
<?php
/*
   Como adicionar item ao menu wordpress: Adicionar o filtro a ul
   https://developer.wordpress.org/reference/functions/add_filter/
   https://developer.wordpress.org/reference/hooks/wp_nav_menu_items/
*/
/* function append_item($items, $args){
   if($args->{'theme_location'} === 'primary'){
      $items .= '<form>
               <input type="text" placeholder="Digite o produto" />
               <button>Buscar</button>
            </form>';
   }
   return $items;
}

add_filter( 'wp_nav_menu_items', 'append_item', 10, 2); 
*/
?>

<?php
   $header_logo = get_template_directory_uri()."/assets/images/logo.png";
?>

      <div class="header__mobile-container container">
      <!-- Colocar dinamicamente no painel administrativo -->
         <img class= "header__logo" src=<?= get_template_directory_uri()."/assets/images/logo.png" ?> alt="" />
   
<?php
/* 
Adicionar menu dinamicamente. 
Adicionar isso com um if ("Nenhum menu cadastrado, cadastre o menu" 
*/
         if(has_nav_menu('primary')){
            wp_nav_menu(
               array(
                  'theme_location' => 'primary', /*Nome registrado em function.php register nav menu*/
                  'container' => 'nav'
               )
            );
         } else {
            echo '<p class="header__menu-message">Cadastre um menu</p>';
         }
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