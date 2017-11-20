<?php if (isset($_SESSION['logged_in'])) { ?>
<?= validation_errors(); ?>
<div>
	<?= form_open('affiliate/add_affiliate') ?>
	<input type="text" name="name" placeholder="Name">
	</br>
	<textarea name="description">
	</textarea>
	</br>
	<input type="text" name="url" placeholder="Affiliate's Site">
	</br>
	<input type="submit" name="submit" value="Add">
	<?= form_close(); ?>
</div>
<?php } ?>