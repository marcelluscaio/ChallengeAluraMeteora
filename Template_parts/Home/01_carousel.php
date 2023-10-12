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
		elseif(!$hasBg) :
?>
/*720px*/
@media (min-width: 45em){
<?= $slideClassName ?>{
	background-image: url('<?=  $slide["imagem_tablet"] ?>');
}
}

/*1040px*/
@media (min-width: 65em){
<?= $slideClassName ?>{
	background-image: url('<?=  $slide["imagem_desktop"] ?>');
}
}

<?php
	endif;
endforeach;
?>
</style>


<section class="carousel" role="region" aria-roledescription="carousel" aria-label="Produtos em alta">

	<div class="carousel__controls" role="group" aria-label="Slide Controls">
		<div class="carousel__controls__navigation">
<?php 
$index = 0;
foreach($slides as $slide):	
	$index++;
?>
			<button class="navigation--<?= $index ?> <?php if($index === 1){echo "navigation--active";} ?>" aria-label="Show slide <?= $index ?> of <?= count($slides) ?>"  aria-disabled="<?= $index === 1 ? "true" : "false" ?>"></button>
<?php endforeach ?>
		</div>
		<div class="carousel__controls__arrows">
			<button class="arrow--left" aria-label="Previous Slide"></button>
			<button class="arrow--right" aria-label="Next Slide"></button>
		</div>
	</div>

	<div class="carousel__track">
<?php
$index = 0;
foreach($slides as $slide):
	$index++;
	if($slide["carousel_image"]):
		$bgClass = ($slide["carousel_title"] || $slide["carousel_title_2"]) && $slide["carousel_bg"] ? "carousel__track__slide--"."bg" : "";
		$arialabel = $slide["carousel_title"] ? 'aria-labelledby="title--'.$index.'"' : 'aria-label="'.$index.' of '.count($slides).'"';
?>
		<div class="carousel__track__slide carousel__track__slide--<?= $index ?> <?= $bgClass ?>" role="group" aria-roledescription="Slide" <?= $arialabel ?>  aria-hidden="<?= $index === 1 ? "false" : "true" ?>">
<?php if($slide["carousel_title"]): ?>
			<p class="title" id="title--<?= $index ?>"> <?= $slide["carousel_title"] ?> </p>
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