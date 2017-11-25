<p>Upload art</p>

<?= $artUpload_form?>

<?php foreach ($arts as $art) { ?>
	<?= validation_errors(); ?>
	<div class="parent-div">
		<div class="edit-art" style="display:none">
			<?= form_open("Art/update_art_data", array('class'=>'edit-art-form')); ?>
			<input type="text" name="title" value="<?=$art->title?>" placeholder="<?=$art->title?>">
			<input type="text" name="caption" value="<?=$art->caption?>" placeholder="<?=$art->caption?>">
			<select name="tags[]" multiple>
				<?php foreach($tags as $tag) { ?>
					<option <?= in_array($tag->id, $art->tag_ids) ? 'selected' : '' ?>
						value="<?=$tag->id?>"> <?=$tag->name?> </option>
				<?php } ?>
			</select>
			<input type="hidden" value="<?=$art->id?>" name="id">
			</br>
			<input type="submit" name="submit" value="Update">
			<?= form_close(); ?>
		</div>
		<button class="edit-art-btn">Edit</button>
		<?= form_open("Art/delete_art"); ?>
			<input type="hidden" value="<?=$art->id?>" name="id">
			<input type="submit" value="Delete">
		<?= form_close(); ?>
		<br/>
		<div class="show-art">
			<?= $art->title ?> <br/>
			<?= $art->caption ?> <br/>
		</div>
	</div>
	<img src="<?=base_url(array_slice(explode('/', $art->file), -3, 3, true))?>" height="42" width="42">
	<br/>
<?php } ?>


<?= $footer ?>
<script>
// jquery on document load
$(document).ready(function(){
	$(document).on('click', '.edit-art-btn', function(e) {
		$editDiv = $(this).parent();
		$editDiv.find('.show-art').hide();
		$editDiv.find('.edit-art').show();
		$(this).hide();
	});

	$(document).on('submit', '.edit-art-form', function(e) {
		$editDiv = $(this).parent();
		$editDiv.find('.show-art').show();
		$editDiv.find('.edit-art').hide();
		$editDiv.find('.edit-art-btn').show();
	});

});

</script>