<?= $tagForm ?>

<?php foreach ($tags as $tag) { ?>
	<?= validation_errors(); ?>
	<div>
		<?= form_open("tag/update_tag"); ?>
		<input type="text" name="tag" value="<?=$tag->name?>" placeholder="<?=$tag->name?>">
		<input type="hidden" value="<?=$tag->id?>" name="id">
		</br>
		<input type="submit" name="submit" value="Update">
		<?= form_close(); ?>
	</div>
	<?= form_open("tag/delete_tag"); ?>
		<input type="hidden" value="<?=$tag->id?>" name="id">
		<input type="submit" value="Delete">
	<?= form_close(); ?>
	<br/>
<?php } ?>



<!-- use jquery to create a confirm-delete:
	on <a.class.click> e.preventDefault()
	then use a confirm dialogue to get user choice
	then if yes, use ajax to call <this.href> -->