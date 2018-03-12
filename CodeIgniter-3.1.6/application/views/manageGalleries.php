<?= $galleryForm ?>
<table>
	<tr>
		<th>Gallery Name</th>
		<th>Tags</th>
	</tr>
<?php foreach($galleries as $gallery) { ?>
	<tr>
	<?= validation_errors(); ?>
	<div class="col-sm-3">
	<td>
		<?= form_open("gallery/updateGallery"); ?>
		<input required type="text" name="title" class="form-control gallery_title" id="title" value="<?=htmlentities($gallery->title)?>" placeholder="<?=htmlentities($gallery->title)?>">
		<input required type="hidden" class="gallery_id" value="<?=$gallery->id?>" name="id">
	</td>
	<td>
			<select name="tags[]" multiple class="form-control gallery_tags">
				<?php foreach($tags as $tag) { ?>
					<option <?= in_array($tag->id, $gallery->tag_ids) ? 'selected' : '' ?>
						value="<?=$tag->id?>"> <?=$tag->name?> </option>
				<?php } ?>
			</select>
	</td>
	<td>
		<input type="submit" name="submit" class="btn btn-primary submit-btn" value="Update">
		<?= form_close(); ?>
	</td>
	<td>
		<?= form_open("gallery/deleteGallery"); ?>
			<input required type="hidden" value="<?=$gallery->id?>" name="id">
			<input type="submit" class="delete btn btn-secondary" value="Delete">
		<?= form_close(); ?>
	</td>
	</div>
	<br/>
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

	$(".submit-btn").on('click', function(e) {
		e.preventDefault(); // prevents page from reloading

		var $row = $(this).closest('tr');

		var gallery_id = $row.find('.gallery_id').val();
		var gallery_title = $row.find('.gallery_title').val();
		var gallery_tags = $row.find('.gallery_tags').val();

		var params = {
			title: gallery_title,
			id: gallery_id,
			tags: gallery_tags
		};

		$.ajax({
			url: '/gallery/updateGallery_ajax',
			dataType: 'json',
			method: 'POST',
			data: params,
			success: function(data) {
				$row.find('.submit-btn').val("Saved!");
				setTimeout(function() {
					$row.find('.submit-btn').val("Update");
				}, 2500);
			}
		});
	});
});
</script>