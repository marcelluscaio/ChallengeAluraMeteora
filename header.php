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
   <div class="container">
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
      <form>
         <input type="text" placeholder="Digite o produto" />
         <button>Buscar</button>
      </form>
   </div>
</header>





<!-- CARROSSEL -->

<section>
   <img src="" alt=""/>
</section>




<!-- BUSCA CATEGORIA -->

<section class="container">
   <h2 class="title">Busque por categoria:</h2>
   <!-- Fazer um filtro por categora do WordPress -->
   <!-- Puxar automaticamente por categorias (Categoria -> categoria) -->
   <ul>
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


<!-- DESTAQUES -->
<!-- Fazer um filtro por categora do WordPress -->
<!-- Puxar automaticamente por categorias (Categoria -> Destaque) -->
<section class="container">
   <h2 class="title">Produtos que estão bombando</h2>
   <ul>
      <li>
         <article>
            <img src="" alt="" />;
            <h3>Camiseta Conforto</h3>
            <p>Multicores e tamanhos. Tecido de algodão 100%, fresquinho para o verão. Modelagem unissex.</p>
            <p>70,00</p> <!-- R$ before. Calcular centavos no php-->
            <a href="">Ver mais</a>
         </article>
      </li>
   </ul>
</section>

<!-- FACILIDADES -->
<section class="container">
   <h2>Conheça todas as nossas facilidades</h2>
   <ul>
      <li>
         <h3>Pague pelo pix</h3>
         <p>Ganhe 5% OFF em pagamentos via PIX</p>
      </li>
      <li>
         <h3>Troca grátis</h3>
         <p>Fique livre para trocar em até 30 dias</p>
      </li>
      <li>
         <h3>Sustentabilidade</h3>
         <p>Moda responsável, que respeita o meio ambiente</p>
      </li>
   </ul>
</section>

<!-- MAILING -->
<section class="container">
   <form>
      <fieldset>
         <legend>Quer receber nossas novidades, promoções exclusivas e 10% OFF na primeira compra? Cadastre-se!</legend>
         
         <div>
            <label>Digite seu email</label>
            <input />
            <button>Enviar</button>
         </div>
      </fieldset>
   </form>
</section>