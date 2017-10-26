<?= validation_errors(); ?>
<div>
	<?= ''//form_open('login/login'); ?>
	<form action="/login/login" method="POST">
	<input type="text" name="username" placeholder="username">
	<input type="password" name="password" placeholder="password">
	</br>
	<input type="submit" name="submit" value="Login">
	<?= form_close(); ?>
	<? print_r($data); ?>
</div>