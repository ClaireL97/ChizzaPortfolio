<center><span class="font-weight-bold emboss h1 text-primary"><?= $gallery->title ?></span></center>

<?php
$count = 0;
$max = count($arts); // to show X / <max>
$number = 1;
foreach($arts as $art) {
	if ($count == 0) { ?>
		<div class="row mt-sm-2">
	<?php } ?>
	<div class="col-sm-4">
		<img class="picture hover-shadow" src="<?=base_url(array_slice(explode('/', $art->file), -3, 3, true))?>" data-number="<?=$number?>" height="100%" width="100%">
	</div>
	<?php if ($count == 2 || $count == count($arts)) { ?>
		</div>
	<?php 
			$count = -1;
		} ?>
	<?php $count++;
		  $number++; ?>
<?php }
$number = 1; // reset to 1 for the next set of loops
?>

<div id="myModal" class="modal">
  <span class="close cursor">&times;</span>
  <div class="modal-content">

	<?php foreach($arts as $art) { ?>
    <div class="mySlides">
      <div class="numbertext"><?= $number ?> / <?= $max ?></div>
      <img src="<?=base_url(array_slice(explode('/', $art->file), -3, 3, true))?>" style="width:100%">
    </div>
    	<?php 
    	$number++;
	} 
    $number = 1; ?>

    <a class="prev">&#10094;</a>
    <a class="next">&#10095;</a>

    <div class="caption-container">
      <p id="caption"></p>
    </div>
<div class="row">
    <?php foreach($arts as $art) { ?>
	    <div class="columnLightBox">
	    <div class="col-sm-1">
	      <img class="demo" src="<?=base_url(array_slice(explode('/', $art->file), -3, 3, true))?>" data-number="<?=$number?>" alt="<?=$art->title?>">
	    </div>
	    </div>
    	<?php $number++;
    } ?>
    </div>
  </div>
</div>
<?php if ($pageNum > 1) { ?>
<a href="<?=base_url()?>Gallery/gallery/<?=$gallery->id?>/<?=$pageNum - 1?>">Previous </a>
<?php } ?>
<?php for($i = 1; $i < ($total->total%$max); $i++) { ?>
	<a href="<?=base_url()?>Gallery/gallery/<?=$gallery->id?>/<?=$i?>"><?=$i?></a>
<?php } ?>
<?php if ($total->total > $max) { ?>
<a href="<?=base_url()?>Gallery/gallery/<?=$gallery->id?>/<?=$pageNum + 1?>">Next </a>
<?php } ?>
<?=$footer?>