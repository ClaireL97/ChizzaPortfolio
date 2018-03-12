<?= $tagForm ?>
</br>
<h3>Tag List</h3>
<table>
<?php foreach ($tags as $tag) { ?>
	<tr>
	<?= validation_errors(); ?>
		<td>
		<?= form_open("tag/update_tag"); ?>
			<input required type="text" name="tag" class="form-control" id="tag" value="<?=htmlentities($tag->name)?>" placeholder="<?=htmlentities($tag->name)?>">
			<input required type="hidden" value="<?=$tag->id?>" name="id">
		</td>
		<td>
			<input type="submit" name="submit" class="btn btn-primary" value="Update">
			<?= form_close(); ?>
		</td>
		<td>
			<?= form_open("tag/delete_tag"); ?>
				<input required type="hidden" value="<?=$tag->id?>" name="id">
				<input type="submit" class="delete btn btn-secondary" value="Delete">
			<?= form_close(); ?>
		</td>
	</tr>
<?php } ?>
</table>

<?=$footer?>

<script>
$(document).ready(function() {
	$(document).on('click', '.delete', function(e) {
		e.preventDefault();
		if (confirm('Are you sure you want to delete this?')) {
			$(this).closest('form').submit();
		}
		return false;
	});
});
</script>