<h4 class="title title--extra-small regular-text--small">Cores</h4>
						
<?php 
foreach($post['cores'] as $cor):
	$input_name = "input-".strtolower(str_replace(' ', '-', $post['nome']));
	$input_id = "input-".$cor."-".strtolower(str_replace(' ', '-', $post['nome']));
	$input_class = 'input-'.strtolower(str_replace(' ', '-', $cor));
?>
							<div class="modal__form__color-size">
								<label for="<?= $input_id ?>" class="<?= $input_class ?> regular-text regular-text--small"><?= $cor ?></label>
								<input type="radio" value="<?= $cor ?>" id="<?= $input_id ?>" class="<?= $input_class ?>" name="<?= $input_name ?>" />
							</div>

<?php 
endforeach;
?>