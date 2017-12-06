<?= $tagForm ?>

<h3>Tag List</h3>
<?php foreach ($tags as $tag) { ?>
	<?= validation_errors(); ?>
	<div class="col-sm-3">
		<?= form_open("tag/update_tag"); ?>
		<label for="tag">Tag Name</label>
		<input required type="text" name="tag" class="form-control" id="tag" value="<?=htmlentities($tag->name)?>" placeholder="<?=htmlentities($tag->name)?>">
		<input required type="hidden" value="<?=$tag->id?>" name="id">
		<input type="submit" name="submit" class="btn btn-primary" value="Update">
		<?= form_close(); ?>
		<?= form_open("tag/delete_tag"); ?>
			<input required type="hidden" value="<?=$tag->id?>" name="id">
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