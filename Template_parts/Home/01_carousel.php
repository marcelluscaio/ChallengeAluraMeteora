<?php
	$slides = get_field('carousel-slides');
?>

<style>
<?php
$index = 0;
foreach($slides as $slide):
	$index++;
	$slideClassName = '.carousel__slide--'.$index;
	$hasBg = strlen($slide["carousel_bg"]) > 0;
?>
<?= $slideClassName ?>{
	background-image: url('<?=  $slide["carousel_image"] ?>');
}

<?php 
	if($hasBg):
?>

<?= $slideClassName ?>::after{
	background-color: <?=  $slide["carousel_bg"] ?>;
}

<?php
	endif;
endforeach;
?>
</style>

<section class="carousel" aria-label="Carousel">

<?php
$index = 0;
foreach($slides as $slide):
	$index++;
	if($slide["carousel_image"]):
		$bgClass = ($slide["carousel_title"] || $slide["carousel_title_2"]) && $slide["carousel_bg"] ? "carousel__slide--"."bg" : "";
?>
	<div class="carousel__slide carousel__slide--<?= $index ?> <?= $bgClass ?>" role="group" aria-roledescription="Slide">
<?php if($slide["carousel_title"]): ?>
		<p class="title "><?= $slide["carousel_title"] ?></p>
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