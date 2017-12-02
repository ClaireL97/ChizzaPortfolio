<?= validation_errors(); ?>
<div>
	<?= form_open('login/login'); ?>
	<center><legend class="font-weight-bold emboss text-primary">Login</legend></center>
	<label class="emboss text-primary" for="username">User Name</label>
	<input required type="text" class="form-control" name="username" id="username">
	<label class="emboss text-primary" for="password">Password</label>
	<input required type="password" class="form-control" name="password" id="password">
	<center><input type="submit" class="btn btn-primary mt-sm-2" name="submit" value="Login"></center>
	<?= form_close(); ?>
	<?= $error_message ?>
</div>