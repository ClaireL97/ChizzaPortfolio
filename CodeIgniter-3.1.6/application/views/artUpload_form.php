<?= validation_errors(); ?>
<div>
	<?= form_open('art/upload_art', array("enctype"=>"multipart/form-data")); ?>
	<legend>File Upload Form</legend>
	<label>Title</label>
	<input type="text" name="title" class="form-control" placeholder="Title">
	<label>Caption</label>
	<input type="text" name="caption" class="form-control" placeholder="Caption">
	<label>Tags for Upload</label>
	<select multiple name="tags[]" class="form-control">
		<?php foreach ($tags as $tag) { ?>
			<option value="<?= $tag->id ?>"> <?= $tag->name ?></option>
		<?php } ?>
	</select>
	<label>File to Upload</label>
	<input type="file" name="image" class="form-control-file" aria-describedby="fileHelp">
	<input type="submit" name="submit" class="btn btn-primary mt-sm-2" value="upload">
	<?= form_close(); ?>
</div>