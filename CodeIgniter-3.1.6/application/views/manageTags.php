<?= $tagForm ?>

<h3>Tag List</h3>
<?php foreach ($tags as $tag) { ?>
	<?= validation_errors(); ?>
	<div class="col-sm-3">
		<?= form_open("tag/update_tag"); ?>
		<label for="tag">Tag Name</label>
		<input required type="text" name="tag" class="form-control" id="tag" value="<?=$tag->name?>" placeholder="<?=$tag->name?>">
		<input required type="hidden" value="<?=$tag->id?>" name="id">
		<input type="submit" name="submit" class="btn btn-primary" value="Update">
		<?= form_close(); ?>
		<?= form_open("tag/delete_tag"); ?>
			<input required type="hidden" value="<?=$tag->id?>" name="id">
			<input type="submit" class="btn btn-secondary" value="Delete">
		<?= form_close(); ?>
	</div>
	<br/>
<?php } ?>

<?=$footer?>



<!-- use jquery to create a confirm-delete:
	on <a.class.click> e.preventDefault()
	then use a confirm dialogue to get user choice
	then if yes, use ajax to call <this.href> -->