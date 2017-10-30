<?= validation_errors(); ?>
<div>
	<?= form_open('Homepage/save_synopsis', array("id"=>"synopsis-form")); ?>
	<textarea name="synopsis" placeholder="Synopsis">
	<?= $synopsis ?>
	</textarea>
	</br>
	<input type="submit" name="submit" value="Submit">
	<?= form_close(); ?>
</div>