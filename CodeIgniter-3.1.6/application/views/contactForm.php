<?= validation_errors(); ?>
<div>
	<?= form_open('Contact/update_contact_info', array("enctype"=>"multipart/form-data")); ?>
	<input type="text" name="f_name" placeholder="First Name">
	</br>
	<input type="text" name="l_name" placeholder="Last Name">
	</br>
	<input type="text" name="email" placeholder="Email">
	</br>
	<input type="text" name="phone" placeholder="Phone Number">
	</br>
	<input type="file" name="image">
	<input type="submit" name="submit" value="Submit">
	<?= form_close(); ?>
</div>