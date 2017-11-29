<?= $galleryForm ?>

<?php foreach($galleries as $gallery) { ?>
	Gallery Name: <?= $gallery->title?>
	Tags: <?= implode($gallery->tag_names,', ')?>

	<br/>


<?php } ?>

<?=$footer?>