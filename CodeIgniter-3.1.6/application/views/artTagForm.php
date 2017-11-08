<?= validation_errors(); ?>
<div>
	<?= form_open('tag/create_tag'); ?>
	<input type="text" name="tag" placeholder="tag">
	</br>
	<input type="submit" name="submit" value="Create Tag">
	<?= form_close(); ?>
</div>