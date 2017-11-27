<?= validation_errors(); ?>
<div>
	<?= form_open('gallery/createGallery'); ?>
	<input type="text" name="title" placeholder="Title">
	</br>
	<select multiple name="tags[]">
		<?php foreach ($tags as $tag) { ?>
			<option value="<?= $tag->id ?>"> <?= $tag->name ?></option>
		<?php } ?>
	</select>
	</br>
	<input type="submit" name="submit" value="Create">
	<?= form_close(); ?>
</div>