
<div class="container mt-5">
		<div class="card p-2 m-auto text-center" style="width: 18rem;">
  			<?php if(!is_null($artist->urlImg)): ?>
	    		<img src="<?= $artist->urlImg; ?>" height="200">
			<?php endif; ?>
  			<div class="card-body">
    			<h3 class="card-title">
    				<?= ucfirst($artist->surnameArtist); ?> <?= ucfirst($artist->nameArtist); ?></h3>
    			<small class="text-center m-3">Was born on the <?= $artist->birthDate; ?></small>
   				<p class="card-text pt-3"><?= $artist->descrArtistEN; ?></p>	
  			</div>
		</div>
</div>