<ul>
	<li><label>Fichier img/video/son de l'oeuvre</label></li>
	<li><input type="file" name="file" id="file-oeuvre"></li><br>
	<!-- Sert si on est en mode modifier oeuvre -->
	<?php if(!empty($url)): ?>
		<li>
			<div>
				<img src="<?= $url ?>" width="70px" height="70px">
				<span id="url"><?php echo($url) ?></span>
			</div>
		</li>
	<?php endif; ?>
	<li>
		<form class="form-oeuvre">
			<ul>
				<li><label>Nom de l'oeuvre</label></li>
				<li><input type="text" name="nomOeuvre"></li><br>
				<li><label>Numero de la salle</label></li>
				<li>
					<input type="radio" name="place" value="1" radio="1">Salle 1
					<input type="radio" name="place" value="2" radio="2">Salle 2
					<input type="radio" name="place" value="3" radio="3">Hall principal
					<input type="radio" name="place" value="4" radio="4">Couloir
				</li><br>
				<li><label>Description de l'oeuvre Fr</label></li>
				<li><textarea  name="descrOeuvreFr" rows="5" cols="50"></textarea></li>
				<li><label>Description de l'oeuvre En</label></li><br>
				<li><textarea  name="descrOeuvreEn" rows="5" cols="50"></textarea></li>
				<li><button>Envoyer</button></li>
			</ul>
		</form>
	</li>
</ul>
<script type="text/javascript" src="../js/addOeuvre.js"></script>

