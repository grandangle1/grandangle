
<div class="container pt-5">
	<div class="center cborder">
		<h2 class="center p-4">SAISIR UNE NOUVELLE OEUVRE</h2>
	</div>
	<ul class= "col-lg-12 list-group">
		<li class="list-group-item pl-5"><input type="file" name="file" id="file-oeuvre"></li><br>
		<!-- Sert si on est en mode modifier oeuvre -->
		<?php if(!empty($url)): ?>
			<li class="list-group-item">
				<div>
					<img src="<?= $url ?>" width="70px" height="70px">
					<span id="url"><?php echo($url) ?></span>
				</div>
			</li>
		<?php endif; ?>
		<li class="list-group-item">
			<form class="form-oeuvre">
				<ul>
					<li class="list-group bold"><label>Nom de l'oeuvre</label></li>
					<li class="list-group"><input type="text" name="nomOeuvre"></li><br>
					<li class="list-group bold"><label>Emplacement de l'exposition :</label></li>
					<li class="list-inline">
						<div class="list-inline">
						<input type="radio" name="place" value="1" radio="1" class="list-inline-item" id="salle1"><label for="salle1">Salle 1</label>
						</div>
						<div class="list-inline">
						<input type="radio" name="place" value="2" radio="2" class="list-inline-item" id="salle2"><label for="salle2">Salle 2</label>
						</div>
						<div class="list-inline">
						<input type="radio" name="place" value="3" radio="3" class="list-inline-item" id="hallprinc"><label for="hallprinc">Hall principal</label>
						</div>
						<div class="list-inline">
						<input type="radio" name="place" value="4" radio="4" class="list-inline-item" id="Couloir"><label for="Couloir">Couloir</label>
					</div>
					</li><br>
					<li class="list-group bold"><label>Description de l'oeuvre en Français</label></li>
					<li class="list-group"><textarea  name="descrOeuvreFr" rows="5" cols="50"></textarea></li>
					<li class="list-group bold"><label>Description de l'oeuvre en Anglais</label></li><br>
					<li class="list-group"><textarea  name="descrOeuvreEn" rows="5" cols="50"></textarea></li>
					<li class="list-group"><button class="btn btn-dark mt-4">Envoyer</button></li>
				</ul>
			</form>
		</li>
	</ul>
</div>
<script type="text/javascript" src="../js/addOeuvre.js"></script>

