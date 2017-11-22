<?php if (isset($_SESSION['logged_in'])) { ?>
<?= validation_errors(); ?>
<div>
	<?= form_open('contact/add_social_media') ?>
	<input type="text" name="name" placeholder="Name">
	</br>
	<textarea name="description">
	</textarea>
	</br>
	<input type="text" name="url" placeholder="URL">
	</br>
	<input type="submit" name="submit" value="Add">
	<?= form_close(); ?>
</div>
<?php } ?>