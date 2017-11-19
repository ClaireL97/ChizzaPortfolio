<p>Upload art</p>

<?= $artUpload_form?>

<?php foreach ($arts as $art) { ?>
	<?= validation_errors(); ?>
	<div>
		<?= form_open("Art/update_art_data"); ?>
		<input type="text" name="title" value="<?=$art->title?>" placeholder="<?=$art->title?>">
		<input type="text" name="caption" value="<?=$art->caption?>" placeholder="<?=$art->caption?>">
		<input type="hidden" value="<?=$art->id?>" name="id">
		</br>
		<input type="submit" name="submit" value="Update">
		<?= form_close(); ?>
	</div>
	<?= form_open("Art/delete_art"); ?>
		<input type="hidden" value="<?=$art->id?>" name="id">
		<input type="submit" value="Delete">
	<?= form_close(); ?>
	<br/>
<?php } ?>
