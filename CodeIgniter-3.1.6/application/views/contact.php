<h1>Contact <?= $contact_info->f_name ?> <?= $contact_info->l_name ?></h1>
<div id="contact-info">
	<?php if (!empty($contact_info->email)) { ?>
	Email: <a href="mailTo:<?= $contact_info->email ?>"><?=$contact_info->email?></a></br>
	<?php } ?>
	<?php if (!empty($contact_info->phone)) { ?>
		Phone: <?= $contact_info->phone ?></br>
	<?php } ?>
	<?php if (isset($_SESSION['logged_in'])) { ?>
		<button id="show-contact-info-form" class="btn btn-primary" value="Edit">Edit</button>
	<?php } ?>
</div>

<?php if (isset($_SESSION['logged_in'])) { ?>
	<div id="contact-info-form-div" style="display:none">
		<?= $contactForm ?>
	</div>
<?php } ?>
<?php if (isset($_SESSION['logged_in'])) { ?>
<div class="mediaForm" style="display:none">
<?= $socialmediaForm ?>
</div>
<button class="addNew btn btn-success">Add new</button>
<?php } ?>
<?php
$count = 0;
?>
<?php foreach ($social_media as $social_media) { ?>
<?php if ($count == 0) { ?>
	<div class="row">
<?php } ?>
	<div class="col-sm-4">
	<div class="parent-div">
	<?php if (isset($_SESSION['logged_in'])) { ?>
	<?= validation_errors(); ?>
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
	<?php } ?>
		<div class="show-social_media">
			<?=$social_media->name?>: <a href="<?=$social_media->url?>"><?= $social_media->url ?></a> <br/>
			</div>
		<?php if (isset($_SESSION['logged_in'])) { ?>
		<button class="edit-social_media-btn btn-primary btn">Edit</button>
		<?= form_open("contact/remove_social_media"); ?>
			<input required type="hidden" value="<?=$social_media->id?>" name="id">
			<input type="submit" class="delete btn btn-secondary" value="Delete">
		<?= form_close(); ?>
		<?php } ?>
		</div>
	</div>
<?php if ($count == 2) { ?>
	</div><br/>
<?php
	$count = -1; 
	}
	$count++;
 ?>
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

	$(".addNew").click(function(e) {
		$(".mediaForm").show();
		$(this).hide();
	});

	$(document).on('submit', '.edit-social_media-form', function(e) {
		$editDiv = $(this).parent();
		$editDiv.find('.show-social_medias').show();
		$editDiv.find('.edit-social_media').hide();
		$editDiv.find('.edit-social_media-btn').show();
	});

	$(document).on('click', '.delete', function(e) {
		e.preventDefault();
		if (confirm('Are you sure you want to delete this?')) {
			$(this).closest('form').submit();
		}
		return false;
	});
});

</script>