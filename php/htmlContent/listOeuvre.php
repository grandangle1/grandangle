<h1 id="php">Liste des oeuvres de l'expo du <?php echo $date ?></h1>

<div class="list-oeuvre-container" style="width: 50%; margin: auto;">
	<div class="list-group"></div>

	<nav aria-label="Page navigation example" style="display: flex; justify-content: center;">
	  <ul class="pagination" max="<?= $nbPage ?>">
	  	<?php if($nbPage > 0): ?>
		    <li class="page-item">
		    	<div class="pagi" dir="-1">
			      <a class="page-link" dir="-1" aria-label="Previous">
			        <span aria-hidden="true" dir="-1">&laquo;</span>
			        <span class="sr-only">Previous</span>
			      </a>
		 	 </div>
		    </li>
		<?php endif; ?>
	    <li class="page-item number active" num="1"><a class="page-link">1</a></li>
	    <?php if($nbPage > 0): ?>
	    	<li class="page-item number" num="2"><a class="page-link">2</a></li>
	    <?php endif; ?>
	    <?php if($nbPage > 1): ?>
	    	<li class="page-item number" num="3"><a class="page-link">3</a></li>
		<?php endif; ?>
		<?php if($nbPage > 2): ?>
	    	<li class="page-item number" num="4"><a class="page-link">4</a></li>
		<?php endif; ?>
		<?php if($nbPage > 3): ?>
	    	<li class="page-item number" num="5"><a class="page-link">5</a></li>
		<?php endif; ?>
		<?php if($nbPage > 0): ?>
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
<script type="text/javascript" src="../js/listOeuvre.js"></script>