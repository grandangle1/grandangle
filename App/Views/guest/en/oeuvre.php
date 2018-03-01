<div class="container mt-5">
		<div class="card p-2 m-auto text-center" style="width: 18rem;">
  			<?php if(!empty($oeuvre->urlFile)): ?>
		        <?php if ($oeuvre->getFormat() == "image"): ?><img src="<?= $oeuvre->urlFile ?>" height="200px">
		        <?php elseif($oeuvre->getFormat() == "video"): ?><video controls src="<?= $oeuvre->urlFile ?>" height="200px"></video >
		        <?php elseif ($oeuvre->getFormat() == "audio"): ?><audio controls src="<?= $oeuvre->urlFile ?>"></audio><?php endif; ?>
		    <?php endif; ?>
  			<div class="card-body">
    			<h3 class="card-title"><?= $oeuvre->nomOeuvre; ?></h3>
   				<p class="card-text bold">This art work is on display in <?= $oeuvre->salle ?></p>
   				<p class="card-text"><?= $oeuvre->descrOeuvreEn; ?></p>
   				<small class="text-center m-3">Views : <?= $oeuvre->vues ?></small>
  			</div>
		</div>
</div>