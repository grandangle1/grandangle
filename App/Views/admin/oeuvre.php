<div class="container pt-5">
	<div class="center cborder">
        <?php if(!isset($data["oeuvre"])): ?>
			<h2 class="center p-4">SAISIR UNE NOUVELLE OEUVRE</h2>
		<?php else: ?>
			<h2 class="center p-4">MODIFIER UNE OEUVRE</h2>
		<?php endif; ?>
	</div>
	<ul class= "col-lg-12 list-group">
		<li class="list-group-item pl-5"><input type="file" name="file" id="file-oeuvre"></li><br>
		<!-- Sert si on est en mode modifier oeuvre -->
        <?php if(isset($data["oeuvre"])): ?>
			<li class="list-group-item">
				<div>
                    <?php if(isset($oeuvre->urlFile)): ?>
                        <?php if ($oeuvre->getFormat() == "image"): ?><img src="<?= $oeuvre->urlFile ?>" height="100px">
                        <?php elseif($oeuvre->getFormat() == "video"): ?><video controls src="<?= $oeuvre->urlFile ?>" height="100px"><video >
                        <?php elseif ($oeuvre->getFormat() == "audio"): ?><audio controls src="<?= $oeuvre->urlFile ?>"></audio><?php endif; ?>
                    <?php else: ?>
                        <span>Il n'y a pas de fichier associé à cette oeuvre</span>
                    <?php endif; ?>
				</div>
			</li>
		<?php endif; ?>
		<li class="list-group-item mb-5">
			<form class="form-oeuvre">
				<ul>
					<li class="list-group bold"><label>Nom de l'oeuvre</label></li>
					<li class="list-group"><input type="text" name="nomOeuvre"
						<?php if(isset($data["oeuvre"])): ?>
							value="<?= $oeuvre->nomOeuvre ?>"
						<?php endif; ?>
							></li><br>
                    <li class="list-group pb-4">
                        <label class="bold">Type de l'oeuvre : </label>
                        <select>
                            <option value="none"></option>
                            <?php foreach ($types as $type): ?>
                                <option value="<?= $type->id ?>" <?php if(isset($data["oeuvre"]) && $type->id == $data["oeuvre"]->idType){echo"selected";} ?>><?= $type->typeFr ?></option>
                            <?php endforeach; ?>
                        </select>
                    </li>
					<li class="list-group bold"><label>Emplacement de l'exposition :</label></li>
					<li class="list-inline">
						<div class="list-inline">
						<input <?php if(isset($data["oeuvre"]) && $oeuvre->salle == "salle1"): ?>checked="checked"<?php endif; ?>  type="radio" name="salle" value="salle1" radio="1" class="list-inline-item" id="salle1"><label for="salle1">Salle VAN GOGH</label>
						</div>
						<div class="list-inline">
						<input <?php if(isset($data["oeuvre"]) && $oeuvre->salle == "salle2"): ?>checked="checked"<?php endif; ?> type="radio" name="salle" value="salle2" radio="2" class="list-inline-item" id="salle2"><label for="salle2">Salle DE VINCI</label>
						</div>
						<div class="list-inline">
						<input <?php if(isset($data["oeuvre"]) && $oeuvre->salle == "hall"): ?>checked="checked"<?php endif; ?> type="radio" name="salle" value="hall" radio="3" class="list-inline-item" id="hallprinc"><label for="hallprinc">Salle PICASSO</label>
						</div>
						<div class="list-inline">
						<input <?php if(isset($data["oeuvre"]) && $oeuvre->salle == "couloir"): ?>checked="checked"<?php endif; ?> type="radio" name="salle" value="couloir" radio="4" class="list-inline-item" id="Couloir"><label for="Couloir">Salle RENOIR</label>
					</div>
					</li><br>
					<li class="list-group bold"><label>Description de l'oeuvre en Français</label></li>
					<li class="list-group"><textarea  name="descrOeuvreFr" rows="5" cols="50"><?php if(isset($data["oeuvre"])): ?><?= $oeuvre->descrOeuvreFr ?><?php endif; ?></textarea></li>
					<li class="list-group bold"><label>Description de l'oeuvre en Anglais</label></li><br>
					<li class="list-group"><textarea  name="descrOeuvreEn" rows="5" cols="50"><?php if(isset($data["oeuvre"])): ?><?= $oeuvre->descrOeuvreEn ?><?php endif; ?></textarea></li>
                    <?php if(!isset($data["oeuvre"])): ?>
						<li class="list-group send"><button class="btn btn-dark mt-4">Envoyer</button></li>
                    <?php elseif(isset($data["oeuvre"])): ?>
						<li class="list-group"><button class="btn btn-dark mt-4 edit">Modifier</button></li>
					<?php endif; ?>
				</ul>
			</form>
		</li>
	</ul>
</div>
<script type="text/javascript" src="js/oeuvre.js"></script>

