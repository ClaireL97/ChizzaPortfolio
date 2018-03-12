<?= $galleryForm ?>
<table>
	<tr>
		<th>Gallery Name</th>
		<th>Tags</th>
	</tr>
<?php foreach($galleries as $gallery) { ?>
	<tr>
	<?= validation_errors(); ?>
	<div class="col-sm-3">
	<td>
		<?= form_open("gallery/updateGallery"); ?>
		<input required type="text" name="title" class="form-control" id="title" value="<?=htmlentities($gallery->title)?>" placeholder="<?=htmlentities($gallery->title)?>">
		<input required type="hidden" value="<?=$gallery->id?>" name="id">
	</td>
	<td>
			<select name="tags[]" multiple class="form-control">
				<?php foreach($tags as $tag) { ?>
					<option <?= in_array($tag->id, $gallery->tag_ids) ? 'selected' : '' ?>
						value="<?=$tag->id?>"> <?=$tag->name?> </option>
				<?php } ?>
			</select>
	</td>
	<td>
		<input type="submit" name="submit" class="btn btn-primary" value="Update">
		<?= form_close(); ?>
	</td>
	<td>
		<?= form_open("gallery/deleteGallery"); ?>
			<input required type="hidden" value="<?=$gallery->id?>" name="id">
			<input type="submit" class="delete btn btn-secondary" value="Delete">
		<?= form_close(); ?>
	</td>
	</div>
	<br/>
	</tr>
<?php } ?>
</table>

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