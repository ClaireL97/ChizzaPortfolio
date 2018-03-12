<span class="label-danger"><?= $error ?></span>
<?= $artUpload_form?>
<?php
$count = 0;
$max = count($arts); // to show X / <max>

foreach ($arts as $art) { 
	if ($count == 0) { ?>
		<div class="row mt-sm-2 valign-items">
	<?php } ?>

	<?= validation_errors(); ?>
	<div class="parent-div col-sm-4">
		<div class="edit-art" style="display:none">
			<?= form_open("Art/update_art_data", array('class'=>'edit-art-form')); ?>
			<legend>Edit Upload</legend>
			<img src="<?=base_url(array_slice(explode('/', $art->file), -3, 3, true))?>" height="42" width="42"></br>
			<label>Title</label>
			<input required type="text" name="title" class="form-control" value="<?=htmlentities($art->title)?>" placeholder="<?=htmlentities($art->title)?>">
			<label>Caption</label>
			<input type="text" name="caption" class="form-control" value="<?=htmlentities($art->caption)?>" placeholder="<?=htmlentities($art->caption)?>">
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
		<button class="edit-art-btn btn btn-primary">Edit</button>
		<?= form_open("Art/delete_art"); ?>
			<input required type="hidden" value="<?=$art->id?>" name="id">
			<input type="submit" class="delete btn btn-secondary" value="Delete">
		<?= form_close(); ?>
	</div>
	<!-- <button class="edit-art-btn btn btn-primary">Edit</button> -->
	<?php if ($count == 2 || $count == count($arts)) { ?>
		</div>
	<?php
		$count = -1;
	} ?>
	<?php $count++; ?>
<?php }
if ($count != -1) { // close the unclosed div-row ?>
	</div>
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

	$(document).on('click', '.delete', function(e) {
		e.preventDefault();
		if (confirm('Are you sure you want to delete this?')) {
			$(this).closest('form').submit();
		}
		return false;
	});

});

</script>