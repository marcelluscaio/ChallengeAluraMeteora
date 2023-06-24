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
   <nav>
      <ul class="container">
         <li>logo</li>
         <li>hamburguer</li>
         <li>Home</li>
         <li>Nossas lojas</li>
         <li>Novidades</li>
         <li>Promoções</li>
         <li>
            <form>
               <input type="text" placeholder="Digite o produto" />
               <button>Buscar</button>
            </form>
         </li>
      </ul>
   </nav>
</header>

<!-- CARROSSEL -->

<section>
   <img src="" alt=""/>
</section>




<!-- BUSCA CATEGORIA -->

<section class="container">
   <h2 class="title">Busque por categoria:</h2>
   <!-- Fazer um filtro por categora do WordPress -->
   <!-- Puxar automaticamente por categorias -->
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

