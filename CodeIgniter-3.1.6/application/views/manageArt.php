<p>Upload art</p>

<?= $artUpload_form?>

<?php foreach ($arts as $art) { ?>
	<?= validation_errors(); ?>
	<div class="parent-div">
		<div class="edit-art" style="display:none">
			<?= form_open("Art/update_art_data", array('class'=>'edit-art-form')); ?>
			<legend>Edit Upload</legend>
			<img src="<?=base_url(array_slice(explode('/', $art->file), -3, 3, true))?>" height="42" width="42"></br>
			<label>Title</label>
			<input required type="text" name="title" class="form-control" value="<?=$art->title?>" placeholder="<?=$art->title?>">
			<label>Caption</label>
			<input type="text" name="caption" class="form-control" value="<?=$art->caption?>" placeholder="<?=$art->caption?>">
			<label>Tags</label>
			<select name="tags[]" multiple class="form-control">
				<?php foreach($tags as $tag) { ?>
					<option <?= in_array($tag->id, $art->tag_ids) ? 'selected' : '' ?>
						value="<?=$tag->id?>"> <?=$tag->name?> </option>
				<?php } ?>
			</select>
			<input required type="hidden" value="<?=$art->id?>" name="id">
			</br>
			<input type="submit" name="submit" class="btn btn-primary" value="Update">
			<?= form_close(); ?>
		</div>
		<br/>
		<div class="show-art">
			<?= $art->title ?> <br/>
			<img src="<?=base_url(array_slice(explode('/', $art->file), -3, 3, true))?>" height="42" width="42">
			</br>
			<?= $art->caption ?> <br/>
		</div>
	</div>
	</br>
	<button class="edit-art-btn btn btn-primary">Edit</button>
	<?= form_open("Art/delete_art"); ?>
		<input required type="hidden" value="<?=$art->id?>" name="id">
		<input type="submit" class="btn btn-secondary" value="Delete">
	<?= form_close(); ?>
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