<?php if (isset($_SESSION['logged_in'])) { ?>
<?= validation_errors(); ?>
<div>
	<?= form_open('contact/add_social_media') ?>
	<legend>Add Affiliated Site</legend>
	<label for="Name">Site Name</label>
	<input required type="text" name="name" class="form-control" id="Name">
	<label for="siteDescription">Desciption</label>
	<textarea name="description" id="siteDescription" class="form-control" rows="3"></textarea>
	<label for="URL">URL</label>
	<input required type="text" name="url" class="form-control" id="URL">
	<input type="submit" name="submit" class="btn btn-primary mt-sm-2" value="Add">
	<?= form_close(); ?>
</div>
<?php } ?>