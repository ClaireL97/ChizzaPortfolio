<?php echo validation_errors(); ?>
<div>
	<?php echo form_open('login'); ?>
	<input type="text" name="UserName" placeholder="username">
	<input type="text" name="Password" placeholder="Password">
	</br>
	<input type="submit" name="submit" value="Login">
	<? echo form_close(); ?>
</div>