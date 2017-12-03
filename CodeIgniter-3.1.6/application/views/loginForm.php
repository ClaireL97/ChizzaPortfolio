<?= validation_errors(); ?>
<center>
<div class="row">
	<div class="col-sm-3"></div>
	<div class="col-sm-6">
		<?= form_open('login/login'); ?>
		<label class="emboss text-primary" for="username">User Name</label>
		<input required type="text" class="form-control" name="username" id="username">
		<label class="emboss text-primary" for="password">Password</label>
		<input required type="password" class="form-control" name="password" id="password">
		<input type="submit" class="btn btn-primary mt-sm-2" name="submit" value="Login">
		<?= form_close(); ?>
		<?= $error_message ?>
	</div>
	<div class="col-sm-3"></div>
</div>
</center>