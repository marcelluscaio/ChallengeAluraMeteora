<?php
   $slides = get_field('carousel-slides');
?>

<section>

<?php
foreach($slides as $slide):
?>
   <img src="<?= $slide["carousel_image"] ?>" alt=""/>
   <p><?= $slide["carousel_title"] ?></p>
   <p><?= $slide["carousel_title_2"] ?></p>
<?php 
endforeach;
?>
</section>