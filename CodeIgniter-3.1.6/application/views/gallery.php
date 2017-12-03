<center><span class="font-weight-bold emboss h1 text-primary"><?= $gallery->title ?></span></center>

<?php
$count = 0;
$max = count($arts); // to show X / <max>
$number = 1;
foreach($arts as $art) {
	if ($count == 0) { ?>
		<div class="row mt-sm-2 valign-items">
	<?php } ?>
	<div class="col-sm-4">
	<center>
		<?php if (in_array(pathinfo($art->file, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif'])) { ?>
		<img class="picture full-size hover-shadow" src="<?=base_url(array_slice(explode('/', $art->file), -3, 3, true))?>" data-number="<?=$number?>" height="100%" width="100%">
		<?php } else { ?>
		<embed src="<?=base_url(array_slice(explode('/', $art->file), -3, 3, true))?>#zoom=100&toolbar=0" width="100%" height="200%" class="picture full-size hover-shadow" type="application/pdf">
		<?php } ?>
		</center>
	</div>
	<?php if ($count == 2 || $count == count($arts)) { ?>
		</div>
	<?php 
			$count = -1;
		} ?>
	<?php $count++;
		  $number++; ?>
<?php }
if ($count != -1) { // close the unclosed div-row ?>
	</div>
<?php }
$number = 1; // reset to 1 for the next set of loops
?>

<div id="myModal" class="modal">
  <span class="close cursor">&times;</span>
  <div class="modal-content">

	<?php foreach($arts as $art) { ?>
    <div class="mySlides">
      <div class="numbertext"><?= $number ?> / <?= $max ?></div>
      <center>
      <?php if (in_array(pathinfo($art->file, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif'])) { ?>
      	<img src="<?=base_url(array_slice(explode('/', $art->file), -3, 3, true))?>" height="600px" class="modal-img">
      <?php } else { ?>
		<embed src="<?=base_url(array_slice(explode('/', $art->file), -3, 3, true))?>#zoom=300" width="100%" height="600px" type="application/pdf">
		<?php } ?>
      </center>
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
	<div class="row valign-items">
	<div style="margin-left:35px"></div>
	    <?php foreach($arts as $art) { ?>
		    <div class="columnLightBox">
		    <?php if (in_array(pathinfo($art->file, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif'])) { ?>
		      <img class="demo" src="<?=base_url(array_slice(explode('/', $art->file), -3, 3, true))?>" data-number="<?=$number?>" alt="<?=$art->title?>" width="100%" height="auto">
		     <?php } else { ?>
				<embed src="<?=base_url(array_slice(explode('/', $art->file), -3, 3, true))?>#zoom=50&toolbar=0" width="200%" height="100%" class="demo" type="application/pdf" alt="<?=$art->title?>">
			<?php } ?>
		    </div>
	    	<?php $number++;
	    } ?>
    </div>
  </div>
</div>
<br/>
<center>
<h1>
<?php if ($pageNum > 1) { ?>
<a href="<?=base_url()?>Gallery/gallery/<?=$gallery->id?>/<?=$pageNum - 1?>">&#10094; </a>
<?php } ?>
<?php for($i = 1; $i < ((int)$total/9)+1; $i++) { ?>
	<a href="<?=base_url()?>Gallery/gallery/<?=$gallery->id?>/<?=$i?>"><?=$i?></a>
<?php } ?>
<?php if ($total > 9*($pageNum)) { ?>
<a href="<?=base_url()?>Gallery/gallery/<?=$gallery->id?>/<?=$pageNum + 1?>">&#10095; </a>
<?php } ?>
</h1>
</center>
<?=$footer?>