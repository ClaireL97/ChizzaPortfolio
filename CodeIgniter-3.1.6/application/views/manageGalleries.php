<?= $galleryForm ?>

<?php foreach($galleries as $gallery) { ?>
	<?= validation_errors(); ?>
	<div class="col-sm-3">
		<?= form_open("gallery/updateGallery"); ?>
		<label for="title">Gallery Title</label>
		<input required type="text" name="title" class="form-control" id="title" value="<?=htmlentities($gallery->title)?>" placeholder="<?=htmlentities($gallery->title)?>">
		<input required type="hidden" value="<?=$gallery->id?>" name="id">
		<label>Tags</label>
			<select name="tags[]" multiple class="form-control">
				<?php foreach($tags as $tag) { ?>
					<option <?= in_array($tag->id, $gallery->tag_ids) ? 'selected' : '' ?>
						value="<?=$tag->id?>"> <?=$tag->name?> </option>
				<?php } ?>
			</select>
		<input type="submit" name="submit" class="btn btn-primary" value="Update">
		<?= form_close(); ?>
		<?= form_open("gallery/deleteGallery"); ?>
			<input required type="hidden" value="<?=$gallery->id?>" name="id">
			<input type="submit" class="delete btn btn-secondary" value="Delete">
		<?= form_close(); ?>
	</div>
	<br/>
<?php } ?>

<?=$footer?>
<script>
$(document).ready(function() {
	$(document).on('click', '.delete', function(e) {
		e.preventDefault();
		if (confirm('Are you sure you want to delete this?')) {
			$(this).closest('form').submit();
		}
		return false;
	});
});
</script>