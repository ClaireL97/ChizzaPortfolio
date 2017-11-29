<?= validation_errors(); ?>
<div>
	<?= form_open('login/login'); ?>
	<legend>Login</legend>
	<label for="username">User Name</label>
	<input type="text" class="form-control" name="username" id="username">
	<label for="password">Password</label>
	<input type="password" class="form-control" name="password" id="password">
	<input type="submit" class="btn btn-primary mt-sm-2" name="submit" value="Login">
	<?= form_close(); ?>
	<?= $error_message ?>
</div>