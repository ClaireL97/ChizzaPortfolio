<?= validation_errors(); ?>
<div>
	<?= form_open('art/upload_art', array("enctype"=>"multipart/form-data")); ?>
	<input type="text" name="title" placeholder="Title">
	</br>
	<input type="text" name="caption" placeholder="Caption">
	</br>
	<input type="file" name="image">
	</br>
	<input type="submit" name="submit" value="upload">
	<?= form_close(); ?>
</div>