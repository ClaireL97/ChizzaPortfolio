<p>Contact Info</p>
<div id="contact-info">
	<?= $contact_info->f_name ?>
	<?= $contact_info->l_name ?> <br/>
	<?= $contact_info->email ?></br>
	<?= $contact_info->phone ?></br>
	<?= $contact_info->profile_pic ?></br>
	<?php if (isset($_SESSION['logged_in'])) { ?>
		<button id="show-contact-info-form" class="btn btn-primary" value="Edit">Edit</button>
	<?php } ?>
</div>

<?php if (isset($_SESSION['logged_in'])) { ?>
	<div id="contact-info-form-div" style="display:none">
		<?= $contactForm ?>
	</div>
<?php } ?>

<h2>Links to Affiliated Sites</h2>
<?= $socialmediaForm ?>

<?php foreach ($social_media as $social_media) { ?>
	<?= validation_errors(); ?>
	<div class="parent-div">
		<div class="edit-social_media" style="display:none">
			<?= form_open("contact/edit_social_media", array('class'=>'edit-social_media-form')); ?>
			<legend>Edit Affiliated Site</legend>
			<label>Site Name</label>
			<input required type="text" class="form-control" name="name" value="<?=$social_media->name?>" placeholder="<?=$social_media->name?>">
			<label>Description</label>
			<input  type="text" name="description" class="form-control" value="<?=$social_media->description?>" placeholder="<?=$social_media->description?>">
			<label>Site URL</label>
			<input required type="text" name="url" class="form-control" value="<?=$social_media->url?>" placeholder="<?=$social_media->url?>">
			<input required type="hidden" value="<?=$social_media->id?>" name="id">
			<input type="submit" class="btn btn-primary" name="submit" value="Update">
			<?= form_close(); ?>
		</div>
		<div class="show-social_media">
			<?= $social_media->name ?> <br/>
			<?= $social_media->description ?> <br/>
			<?= $social_media->url ?></br>
		</div>
		<button class="edit-social_media-btn btn-primary btn">Edit</button>
		<?= form_open("contact/remove_social_media"); ?>
			<input required type="hidden" value="<?=$social_media->id?>" name="id">
			<input type="submit" class="btn btn-secondary" value="Delete">
		<?= form_close(); ?>
	</div>
<?php } ?>




<?= $footer ?>
<script>
// jquery on document load
$(document).ready(function(){
	$("#show-contact-info-form").on('click', function(e) {
		$("#contact-info").hide();
		$("#contact-info-form-div").show();
	});

	$("#contact-info-form").on('submit', function(e) {
		$("#contact-info").show();
		$("#contact-info-form-div").hide();
	});
	$(document).on('click', '.edit-social_media-btn', function(e) {
		$editDiv = $(this).parent();
		$editDiv.find('.show-social_media').hide();
		$editDiv.find('.edit-social_media').show();
		$(this).hide();
	});

	$(document).on('submit', '.edit-social_media-form', function(e) {
		$editDiv = $(this).parent();
		$editDiv.find('.show-social_medias').show();
		$editDiv.find('.edit-social_media').hide();
		$editDiv.find('.edit-social_media-btn').show();
	});
});

</script>