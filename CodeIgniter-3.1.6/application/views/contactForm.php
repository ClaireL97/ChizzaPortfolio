<?= validation_errors(); ?>
<div>
	<?= form_open('Contact/update_contact_info', array("enctype"=>"multipart/form-data")); ?>
	<legend>Edit Contact Info</legend>
	<label for="firstName">First Name</label>
	<input type="text" name="f_name" class="form-control" value="<?= $contact_info->f_name?>" id="firstName">
	<label for="lastName">Last Name</label>
	<input type="text" name="l_name" class="form-control" value="<?= $contact_info->l_name?>" id="lastName">
	<label for="Email">Email</label>
	<input type="text" name="email" class="form-control" value="<?= $contact_info->email?>" id="Email">
	<label for="Phone">Phone Number</label>
	<input type="text" name="phone" class="form-control" value="<?= $contact_info->phone?>" id="Phone Number">
	<label for="profile_pic">Profile Picture</label>
	<input type="file" class="form-control-file" aria-describedby="fileHelp" name="profile_pic" id="profile_pic">
	<input type="submit" name="submit" class="btn btn-primary mt-sm-2" value="Submit">
	<?= form_close(); ?>
</div>