<?= validation_errors(); ?>
<div>
	<?= form_open('Homepage/synopsis'); ?>
	<input type="text" name="synopsis" placeholder="Synopsis">
	<input type="submit" name="submit" value="Submit">
	<?= form_close(); ?>
	<?= $error_message ?>
</div>