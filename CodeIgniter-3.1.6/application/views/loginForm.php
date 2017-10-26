<?= validation_errors(); ?>
<div>
	<?= form_open('login/login'); ?>
	<input type="text" name="username" placeholder="username">
	<input type="password" name="password" placeholder="password">
	</br>
	<input type="submit" name="submit" value="Login">
	<?= form_close(); ?>
	<?= $error_message ?>
</div>