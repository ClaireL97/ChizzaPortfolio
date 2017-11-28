<div id="synopsis">
	<?php if (isset($_SESSION['logged_in'])) { ?>
		<button id="show-synopsis-form" value="Edit">Edit</button>
	<?php } ?>
	<?= $synopsis ?>
</div>

<?php if (isset($_SESSION['logged_in'])) { ?>
	<div id="synopsis-form-div" style="display:none">
		<?= $synopsisForm ?>
	</div>
<?php } ?>

<?= $footer ?>
<script>
// jquery on document load
$(document).ready(function(){
	$("#show-synopsis-form").on('click', function(e) {
		$("#synopsis").hide();
		$("#synopsis-form-div").show();
	});

	$("#synopsis-form").on('submit', function(e) {
		$("#synopsis").show();
		$("#synopsis-form-div").hide();
	});
});

</script>