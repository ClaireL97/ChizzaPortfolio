<?= validation_errors(); ?>
<div>
	<?= form_open('tag/update_tag'); ?>
	<legend>Edit Tag</legend>
	<input type="hidden" name="id" value="id">
	<label for="tag">Tag</label>
	<input type="text" class="form-control" id="tag" name="tag" placeholder="tag">
	<input type="submit" class="btn btn-primary" name="submit" value="Update">
	<?= form_close(); ?>
</div>