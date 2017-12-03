<?= validation_errors(); ?>
<div>
	<?= form_open('gallery/createGallery'); ?>
	<label for="title">Gallery Name</label>
	<input required type="text" name="title" id="title" class="form-control">
	<label for="selectTags">Tags Displayed in Gallery</label>
	<select multiple name="tags[]" class="form-control" id="selectTags">
		<?php foreach ($tags as $tag) { ?>
			<option value="<?= $tag->id ?>"> <?= $tag->name ?></option>
		<?php } ?>
	</select>
	</br>
	<input type="submit" name="submit" class="btn btn-primary" value="Create">
	<?= form_close(); ?>
</div>