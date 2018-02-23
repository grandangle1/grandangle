<div class="container pt-5">
	<div class="center cborder">
		<?php if(empty($data)): ?>
			<h2 class="center p-4">SAISIR UNE NOUVELLE OEUVRE</h2>
		<?php else: ?>
			<h2 class="center p-4">MODIFIER UNE OEUVRE</h2>
		<?php endif; ?>
	</div>
	<ul class= "col-lg-12 list-group">
		<li class="list-group-item pl-5"><input type="file" name="file" id="file-oeuvre"></li><br>
		<!-- Sert si on est en mode modifier oeuvre -->
		<?php if(!empty($data)): ?>
			<li class="list-group-item">
				<div>
                    <?php if(isset($oeuvre->urlFile)): ?>
                        <img src="<?= $oeuvre->urlFile ?>" width="70px" height="70px">
                        <span id="url"><?= $oeuvre->urlFile; ?></span>
                    <?php else: ?>
                        <span>Il n'y a pas de fichier associé à cette ouevre</span>
                    <?php endif; ?>
				</div>
			</li>
		<?php endif; ?>
		<li class="list-group-item">
			<form class="form-oeuvre">
				<ul>
					<li class="list-group bold"><label>Nom de l'oeuvre</label></li>
					<li class="list-group"><input type="text" name="nomOeuvre"
						<?php if(!empty($data)): ?>
							value="<?= $oeuvre->nomOeuvre ?>"
						<?php endif; ?>
							></li><br>
                    <li class="list-group">
                        <label>Type de l'oeuvre : </label>
                        <select>
                            <option value="none"></option>
                            <option value="1" <?php if(!empty($data) && $oeuvre->idType == 1){echo"selected";} ?>>statue</option>
                            <option value="2" <?php if(!empty($data) && $oeuvre->idType == 2){echo"selected";} ?>>son</option>
                            <option value="3" <?php if(!empty($data) && $oeuvre->idType == 3){echo"selected";} ?>>tableau</option>
                        </select>
                    </li>
					<li class="list-group bold"><label>Emplacement de l'exposition :</label></li>
					<li class="list-inline">
						<div class="list-inline">
						<input <?php if(!empty($data) && $oeuvre->salle == "salle1"): ?>checked="checked"<?php endif; ?>  type="radio" name="salle" value="salle1" radio="1" class="list-inline-item" id="salle1"><label for="salle1">Salle 1</label>
						</div>
						<div class="list-inline">
						<input <?php if(!empty($data) && $oeuvre->salle == "salle2"): ?>checked="checked"<?php endif; ?> type="radio" name="salle" value="salle2" radio="2" class="list-inline-item" id="salle2"><label for="salle2">Salle 2</label>
						</div>
						<div class="list-inline">
						<input <?php if(!empty($data) && $oeuvre->salle == "hall"): ?>checked="checked"<?php endif; ?> type="radio" name="salle" value="hall" radio="3" class="list-inline-item" id="hallprinc"><label for="hallprinc">Hall principal</label>
						</div>
						<div class="list-inline">
						<input <?php if(!empty($data) && $oeuvre->salle == "couloir"): ?>checked="checked"<?php endif; ?> type="radio" name="salle" value="couloir" radio="4" class="list-inline-item" id="Couloir"><label for="Couloir">Couloir</label>
					</div>
					</li><br>
					<li class="list-group bold"><label>Description de l'oeuvre en Français</label></li>
					<li class="list-group"><textarea  name="descrOeuvreFr" rows="5" cols="50"><?php if(!empty($data)): ?><?= $oeuvre->descrOeuvreFr ?><?php endif; ?></textarea></li>
					<li class="list-group bold"><label>Description de l'oeuvre en Anglais</label></li><br>
					<li class="list-group"><textarea  name="descrOeuvreEn" rows="5" cols="50"><?php if(!empty($data)): ?><<?= $oeuvre->descrOeuvreEn ?><?php endif; ?></textarea></li>
					<?php if(empty($data)): ?>
						<li class="list-group send"><button class="btn btn-dark mt-4">Envoyer</button></li>
					<?php elseif (!empty($data)): ?>
						<li class="list-group"><button class="btn btn-dark mt-4 edit">Modifier</button></li>
					<?php endif; ?>
				</ul>
			</form>
		</li>
	</ul>
</div>
<script type="text/javascript" src="js/oeuvre.js"></script>
