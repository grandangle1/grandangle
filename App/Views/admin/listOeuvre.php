<h1 id="php">Liste des oeuvres de l'expo du <?php echo $date ?></h1>

<div class="list-oeuvre-container" style="width: 50%; margin: auto;">
	<div class="list-group">
        <?php foreach ($oeuvres as $oeuvre): ?>
            <a style="z-index=2;" class="list-group-item list-group-item-action flex-column align-items-start oeuvre" id="<?= $oeuvre->idOeuvre ?>">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1"><?= $oeuvre->nomOeuvre ?></h5>
                    <small>3 days ago</small>
                    </div>
                <p class="mb-1"><?= $oeuvre->descrOeuvreFr; ?><span style="float: right;"><?= $oeuvre->salle; ?></span></p>
                <?php if (isset($oeuvre->urlFile)): ?>
                    <img src="<?= $oeuvre->urlFile ?>" height="50" width="50">
                <?php else: ?>
                    <span>Il n'y a pas de photo pour cette oeuvre</span>
                <?php endif; ?>
                <a class="btn btn-primary" href="?p=admin.oeuvre.edit&id=<?= $oeuvre->idOeuvre; ?>">Modifier</a>
                <a class="btn btn-warning" href="?p=admin.oeuvre.delete&id=<?= $oeuvre->idOeuvre; ?>&expo=<?= $oeuvre->idExpo ?>">supprimer</a>
            </a>
        <?php endforeach; ?>
    </div>

	<nav aria-label="Page navigation example" style="display: flex; justify-content: center;">
	  <ul class="pagination" max="<?= $nbPage ?>">
	  	<?php if($nbPage > 1): ?>
		    <li class="page-item">
		    	<div class="pagi" dir="-1">
			      <a class="page-link" dir="-1" aria-label="Previous">
			        <span aria-hidden="true" dir="-1">&laquo;</span>
			        <span class="sr-only">Previous</span>
			      </a>
		 	 </div>
		    </li>
		<?php endif; ?>
	    <li class="page-item number <?php if($focus == $pages[0]) echo'active'; ?>" num="1"><a class="page-link"><?= $pages[0]; ?></a></li>
	    <?php if($nbPage > 1): ?>
	    	<li class="page-item number <?php if($focus == $pages[1]) echo"active"; ?>" num="2" ><a class="page-link"><?= $pages[1]; ?></a></li>
	    <?php endif; ?>
	    <?php if($nbPage > 2): ?>
	    	<li class="page-item number <?php if($focus == $pages[2]) echo"active"; ?>" num="3" ><a class="page-link"><?= $pages[2]; ?></a></li>
		<?php endif; ?>
		<?php if($nbPage > 3): ?>
	    	<li class="page-item number <?php if($focus == $pages[3]) echo"active"; ?>" num="4" ><a class="page-link"><?= $pages[3]; ?></a></li>
		<?php endif; ?>
		<?php if($nbPage > 4): ?>
	    	<li class="page-item number <?php if($focus == $pages[4]) echo"active"; ?>" num="5"><a class="page-link"><?= $pages[4]; ?></a></li>
		<?php endif; ?>
		<?php if($nbPage > 1): ?>
		    <li class="page-item" >
		    	<div class="pagi" dir="1">
		    		<a class="page-link" dir="1" aria-label="Next">
			        <span aria-hidden="true" dir="1">&raquo;</span>
			        <span class="sr-only">Next</span>
			      </a>
		    	</div>
		    </li>
		<?php endif; ?>
	  </ul>
	</nav>
</div>
<script type="text/javascript" src="js/listOeuvre.js"></script>