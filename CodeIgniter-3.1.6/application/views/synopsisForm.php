<?= validation_errors(); ?>
<div>
	<?= form_open('Homepage/save_synopsis', array("id"=>"synopsis-form")); ?>
	<legend>Synopsis Form</legend>
	<label for="synopsis">Synopsis</label>
	<textarea name="synopsis" class="form-control" rows="4" id="synopsis"><?= $synopsis ?></textarea>
	<center><input type="submit" class="btn btn-primary mt-sm-2" name="submit" value="Submit"></center>
	<?= form_close(); ?>
</div>