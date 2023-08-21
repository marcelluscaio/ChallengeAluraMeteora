<?php 
	$title = $args["title"];
	$feature_list = $args["feature_list"];
	$product = $args["product"];
?>

<h4 class="title title--extra-small regular-text--small"><?= $title ?>:</h4>
						
<?php 
foreach($feature_list as $feature):
	$input_name = "input-".strtolower(str_replace(' ', '-', $product)).strtolower(str_replace(' ', '-', $title));
	$input_id = "input-".$feature."-".strtolower(str_replace(' ', '-', $product));
	$input_class = 'input-'.strtolower(str_replace(' ', '-', $feature));
?>

	<div class="modal__form__color-size">
		<label for="<?= $input_id ?>" class="<?= $input_class ?> regular-text regular-text--small"><?= $feature ?></label>
		<input type="radio" value="<?= $feature ?>" id="<?= $input_id ?>" class="<?= $input_class ?>" name="<?= $input_name ?>" />
	</div>

<?php 
endforeach;
?>