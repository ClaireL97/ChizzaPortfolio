<?= validation_errors(); ?>
<div>
	<?= form_open('Contact/update_contact_info', array("enctype"=>"multipart/form-data")); ?>
	<input type="text" name="f_name" value="<?= $contact_info->f_name?>" placeholder="First Name">
	</br>
	<input type="text" name="l_name" value="<?= $contact_info->l_name?>" placeholder="Last Name">
	</br>
	<input type="text" name="email" value="<?= $contact_info->email?>" placeholder="Email">
	</br>
	<input type="text" name="phone" value="<?= $contact_info->phone?>" placeholder="Phone Number">
	</br>
	<input type="file" name="profile_pic">
	</br>
	<input type="submit" name="submit" value="Submit">
	<?= form_close(); ?>
</div>