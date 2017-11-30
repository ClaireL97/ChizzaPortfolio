<center><span class="font-weight-bold emboss h1 text-primary"><?= $title ?></span></center>

<?php
$count = 0;
foreach($arts as $art) {
	if ($count == 0) { ?>
		<div class="row mt-sm-2">
	<?php } ?>
	<div class="col-sm-4">
		<img class="picture" src="<?=base_url(array_slice(explode('/', $art->file), -3, 3, true))?>" height="100%" width="100%">
	</div>
	<?php if ($count == 2 || $count == count($arts)) { ?>
		</div>
	<?php 
			$count = -1;
		} ?>
	<?php $count++; ?>
<?php }
?>

<?=$footer?>