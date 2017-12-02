<?php if (isset($_SESSION['logged_in'])) { ?>
<div class="row">
	<div class="col-sm-6">
		<?= validation_errors(); ?>
		<div class="form-group">
			<?= form_open('affiliate/add_affiliate') ?>
			<legend>New Affiliate Form</legend>
			<label for="affiliateName">Affiliate Name</label>
			<input required type="text" class="form-control" id="affiliateName" name="name">
			<label for="affiliateDescription">Affiliate Description</label>
			<textarea class="form-control" id="affiliateDescription" rows="3" name="description"></textarea>
			<label for="affiliateUrl">Affilite's Site</label>
			<input required type="text" class="form-control" id="affiliateUrl" name="url">
			</br>
			<input type="submit" class="btn btn-primary" name="submit" value="Add">
			<?= form_close(); ?>
		</div>
	</div>
</div>
<?php } ?>