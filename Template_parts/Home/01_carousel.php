<?php
	$slides = get_field('carousel-slides');
?>

<style>
<?php
$index = 0;
foreach($slides as $slide):
	$index++;
	$slideClassName = '.carousel__track__slide--'.$index;
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

	<div class="carousel__controls">
		<div class="carousel__controls__navigation">
<?php 
$index = 0;
foreach($slides as $slide):	
	$index++;
?>
			<button class="navigation--<?= $index ?> "></button>
<?php endforeach ?>
		</div>
		<div class="carousel__controls__arrows">
			<button class="carousel__controls__arrows__arrow"></button>
			<button class="carousel__controls__arrows__arrow"></button>
		</div>
	</div>

	<div class="carousel__track">
<?php
$index = 0;
foreach($slides as $slide):
	$index++;
	if($slide["carousel_image"]):
		$bgClass = ($slide["carousel_title"] || $slide["carousel_title_2"]) && $slide["carousel_bg"] ? "carousel__track__slide--"."bg" : "";
?>
		<div class="carousel__track__slide carousel__track__slide--<?= $index ?> <?= $bgClass ?>" role="group" aria-roledescription="Slide">
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
	</div>
</section>