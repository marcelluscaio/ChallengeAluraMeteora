<?php
	$slides = get_field('carousel-slides');
?>

<section>
<?php
foreach($slides as $slide):
	if($slide["carousel_image"]):
?>
	<img src="<?= $slide["carousel_image"] ?>" alt=""/>
<?php if($slide["carousel_title"]): ?>
	<p><?= $slide["carousel_title"] ?></p>
<?php endif ?>
<?php if($slide["carousel_title_2"]): ?>
	<p><?= $slide["carousel_title_2"] ?></p>
<?php endif ?>
<?php
   endif;
endforeach;
?>
</section>