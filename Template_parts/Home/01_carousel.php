<?php
	$slides = get_field('carousel-slides');
?>

<style>
<?php
$index = 0;
foreach($slides as $slide):
	$index++;
?>
.carousel__slide--<?= $index ?>{
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
		<p><?= $slide["carousel_title"] ?></p>
<?php endif ?>
<?php if($slide["carousel_title_2"]): ?>
		<p><?= $slide["carousel_title_2"] ?></p>
<?php endif ?>
	</div>
<?php
   endif;
endforeach;
?>
</section>