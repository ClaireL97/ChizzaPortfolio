<p>Contact Info</p>
<div id="contact-info">
	<?php if (isset($_SESSION['logged_in'])) { ?>
		<button id="show-contact-info-form" value="Edit">Edit</button>
	<?php } ?>
	<?= $contact_info->f_name ?>
	<?= $contact_info->l_name ?> <br/>
	<?= $contact_info->email ?></br>
	<?= $contact_info->phone ?></br>
	<?= $contact_info->profile_pic ?></br>
</div>

<?php if (isset($_SESSION['logged_in'])) { ?>
	<div id="contact-info-form-div" style="display:none">
		<?= $contactForm ?>
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
});

</script>