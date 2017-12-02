<?php if (isset($_SESSION['logged_in'])) { ?>
<?= validation_errors(); ?>
<div>
	<?= form_open('Resume/save_resume', array("enctype"=>"multipart/form-data")); ?>
	<legend>Resume Upload Form</legend>
	<label>File to Upload</label>
	<input required type="file" name="resume" class="form-control-file" aria-describedby="fileHelp">
	<input type="submit" name="submit" class="btn btn-primary mt-sm-2" value="upload">
	<?= form_close(); ?>
</div>
<?php } ?>

<iframe src="<?=$resume?>"></iframe>

<?= $footer ?>