<?= validation_errors(); ?>
<div class="col-sm-3">
	<?= form_open('tag/create_tag'); ?>
	<legend>New Tag</legend>
	<label for="newTag">Tag</label>
	<input required type="text" name="tag" id="newTag" class="form-control">
	<input type="submit" name="submit" class="btn btn-primary" value="Create Tag">
	<?= form_close(); ?>
</div>