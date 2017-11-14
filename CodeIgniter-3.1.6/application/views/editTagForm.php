<?= validation_errors(); ?>
<div>
	<?= form_open('tag/update_tag'); ?>
	<input type="hidden" name="id" value="id">
	<input type="text" name="tag" placeholder="tag">
	</br>
	<input type="submit" name="submit" value="Update">
	<?= form_close(); ?>
</div>