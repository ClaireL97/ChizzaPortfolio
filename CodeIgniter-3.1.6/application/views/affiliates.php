<?= $affiliateForm ?>
<?php foreach ($affiliates as $affiliate) { ?>
	<div class="row">
		<div class="col-sm-3">
			<?= validation_errors(); ?>
			<div class="parent-div">
				<?php if (isset($_SESSION['logged_in'])) { ?>
				<div class="edit-affiliate" style="display:none">
					<?= form_open("Affiliate/edit_affiliate", array('class'=>'edit-affiliate-form')); ?>
					<label for="name">Affiliate Name</label>
					<input type="text" id="name-<?$affiliate->id?>" name="name" class="form-control" value="<?=$affiliate->name?>" placeholder="<?=$affiliate->name?>">
					<label for="description-<?=$affiliate->id?>">Description</label>
					<textarea id="description-<?=$affiliate->id?>" class="form-control" rows="3" name="description"><?=$affiliate->description?></textarea>
					<label for="url">Affiliate's Site</label>
					<input type="text" name="url" id="url" class="form-control" value="<?=$affiliate->url?>" placeholder="<?=$affiliate->url?>">
					<input type="hidden" value="<?=$affiliate->id?>" name="id">
					</br>
					<input type="submit"  class="btn btn-primary" name="submit" value="Update">
					<?= form_close(); ?>
				</div>
				<?php } ?>
				<div class="show-affiliate">
					<?= $affiliate->name ?> <br/>
					<?= $affiliate->description ?> <br/>
					<?= $affiliate->url ?></br>
				</div>
				<div class="row">
					<button class="edit-affiliate-btn btn btn-primary mr-sm-2">Edit</button>
					<?php if (isset($_SESSION['logged_in'])) { ?>
					<?= form_open("Affiliate/remove_affiliate", array("class"=>"delete-affiliate")); ?>
						<input type="hidden" value="<?=$affiliate->id?>" name="id">
						<input type="submit" class="btn btn-secondary" value="Delete">
					<?= form_close(); ?>
					<?php } ?>
				</div>
				<br/>
			</div>
		</div>
	</div>
<?php } ?>

<?= $footer ?>
<script>
// jquery on document load
$(document).ready(function(){
	$(document).on('click', '.edit-affiliate-btn', function(e) {
		$editDiv = $(this).offsetParent();
		console.log($editDiv.find("div"));
		$editDiv.find('.show-affiliate').hide();
		$editDiv.find('.edit-affiliate').show();
		$editDiv.find('.delete-affiliate').hide();
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