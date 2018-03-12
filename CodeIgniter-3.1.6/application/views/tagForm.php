<?= validation_errors(); ?>
<div class="col-sm-3">
	<?= form_open('tag/create_tag'); ?>
	<legend>New Tag</legend>
	<input required type="text" name="tag" id="newTag" class="form-control" placeholder="tag name">
	<input type="submit" name="submit" class="btn btn-primary" value="Create Tag">
	<?= form_close(); ?>
</div>