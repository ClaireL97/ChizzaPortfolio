<p>About Me</p>

<div id="about_me">
	<?php if (isset($_SESSION['logged_in'])) { ?>
		<button id="show-about_me-form" value="Edit">Edit</button>
	<?php } ?>
	<?= $about_me ?>
</div>

<?php if (isset($_SESSION['logged_in'])) { ?>
	<div id="about_me-form-div" style="display:none">
		<?= validation_errors(); ?>
		<div>
			<?= form_open('About_me/save_about_me', array("id"=>"about-me")); ?>
			<textarea name="about_me" placeholder="About Me">
				<?= $about_me ?>
			</textarea>
			</br>
			<input type="submit" name="submit" value="Submit">
			<?= form_close(); ?>
		</div>
	</div>
<?php } ?>

<?= $footer ?>
<script>
// jquery on document load
$(document).ready(function(){
	$("#show-about_me-form").on('click', function(e) {
		$("#about_me").hide();
		$("#about_me-form-div").show();
	});

	$("#about_me-form").on('submit', function(e) {
		$("#about_me").show();
		$("#about_me-form-div").hide();
	});
});

</script>