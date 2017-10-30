<p> Hello </p>


<div id="synopsis">
	<button id="show-synopsis-form" value="Edit">Edit</button>
	<?= $synopsis ?>
</div>
<div id="synopsis-form-div" style="display:none">
	<?= $synopsisForm ?>
</div>

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
		// AJAX to send new synopsis to controller/database
		// update content in div with new data
	});
});
	// function on button.click
		// hide normal div, unhide edit div
	// else if button click is to unhide normal
		//then hide edit mode unhide normal

</script>