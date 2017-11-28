<p>Affiliates</p>
<?= $affiliateForm ?>

<?php foreach ($affiliates as $affiliate) { ?>
	<?= validation_errors(); ?>
	<div class="parent-div">
		<?php if (isset($_SESSION['logged_in'])) { ?>
		<div class="edit-affiliate" style="display:none">
			<?= form_open("Affiliate/edit_affiliate", array('class'=>'edit-affiliate-form')); ?>
			<input type="text" name="name" value="<?=$affiliate->name?>" placeholder="<?=$affiliate->name?>">
			<br>
			<input type="text" name="description" value="<?=$affiliate->description?>" placeholder="<?=$affiliate->description?>">
			<br>
			<input type="text" name="url" value="<?=$affiliate->url?>" placeholder="<?=$affiliate->url?>">
			<input type="hidden" value="<?=$affiliate->id?>" name="id">
			</br>
			<input type="submit" name="submit" value="Update">
			<?= form_close(); ?>
		</div>
		<?php } ?>
		<div class="show-affiliate">
			<?= $affiliate->name ?> <br/>
			<?= $affiliate->description ?> <br/>
			<?= $affiliate->url ?></br>
		</div>
		<?php if (isset($_SESSION['logged_in'])) { ?>
		<?= form_open("Affiliate/remove_affiliate"); ?>
			<input type="hidden" value="<?=$affiliate->id?>" name="id">
			<input type="submit" value="Delete">
		<?= form_close(); ?>
		<button class="edit-affiliate-btn">Edit</button>
		<?php } ?>
		<br/>
		<!-- TODO this only seems to work for one picture -->
	</div>
<?php } ?>

<?= $footer ?>
<script>
// jquery on document load
$(document).ready(function(){
	$(document).on('click', '.edit-affiliate-btn', function(e) {
		$editDiv = $(this).parent();
		$editDiv.find('.show-affiliate').hide();
		$editDiv.find('.edit-affiliate').show();
		$(this).hide();
	});

	$(document).on('submit', '.edit-affiliate-form', function(e) {
		$editDiv = $(this).parent();
		$editDiv.find('.show-affiliates').show();
		$editDiv.find('.edit-affiliate').hide();
		$editDiv.find('.edit-affiliate-btn').show();
	});

});

</script>