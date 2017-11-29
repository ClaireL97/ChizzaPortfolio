<p>Gallery</p>

<?php
$count = 1;
foreach($arts as $art) {
	if ($count-1 % 3 == 0 || $count == 1) { ?>
		<div class="row">
	<?php } ?>
	<div class="col-sm-3">
		Title: <?=$art->title?> <br/>
		<img src="<?=base_url(array_slice(explode('/', $art->file), -3, 3, true))?>"> <br/>
		Caption: <?=$art->caption?>
	</div>
	<?php if ($count % 3 == 0 || $count == count($arts)) { ?>
		</div>
	<?php } ?>
	<?php $count++; ?>
<?php }
?>

<?=$footer?>