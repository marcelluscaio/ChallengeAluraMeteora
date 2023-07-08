<?php
	$slides = get_field('carousel-slides');
?>

<style>
<?php
$index = 0;
foreach($slides as $slide):
	$index++;
	$className = '.carousel__slide--'.$index;
?>
<?= $className ?>{
	background-image: url('<?=  $slide["carousel_image"] ?>');
}
<?php
endforeach;
?>
</style>

<section class="carousel" aria-label="Carousel">
<?php
$index = 0;
foreach($slides as $slide):
	$index++;
	if($slide["carousel_image"]):
?>
	<div class="carousel__slide carousel__slide--<?= $index ?>" role="group" aria-roledescription="Slide">
<?php if($slide["carousel_title"]): ?>
		<p class="title"><?= $slide["carousel_title"] ?></p>
<?php endif ?>
<?php if($slide["carousel_title_2"]): ?>
		<p class="regular-text"><?= $slide["carousel_title_2"] ?></p>
<?php endif ?>
	</div>
<?php
   endif;
endforeach;
?>
</section>