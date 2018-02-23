 <div class="container pt-5">
	<div class="center cborder">
		<?php if(empty($data)): ?>
			<h2 class="center p-4">SAISIR UNE NOUVELLE EXPOSITION</h2>
		<?php else: ?>
			<h2 class="center p-4">MODIFIER UNE EXPOSITION</h2>
		<?php endif; ?>
	</div>
	<form id="form-expo" class="form-group">
		<ul class="col-lg-12 ">
			<li class="list-group-item bold"><label>Informations sur l'artiste</label></li>
				<ul class="list-group-item">
					<li class="list-inline m-3">
						<label class="list-inline-item">Nom : </label>
						<input <?php if(!empty($data)): ?> value="<?= $data['artist']->nameArtist ?>" <?php endif; ?> class="list-inline-item form-control" type="text" name="nameArtist">
						<span class="alert nameArtist"></span>
					</li>
				
					<li class="list-inline m-3">
						<label class="list-inline-item">Prenom : </label>
						<input <?php if(!empty($data)): ?> value="<?= $data['artist']->surnameArtist ?>" <?php endif; ?> class="list-inline-item form-control" type="text" name="surnameArtist">
						<span class="alert surnameArtist"></span>
					</li>
					<li class="list-inline m-3">
						<label class="list-inline-item">Date de naissance : </label>
						<input <?php if(!empty($data)): ?> value="<?= $data['artist']->birthDate ?>" <?php endif; ?> class="list-inline-item form-control" type="date" name="birthDate">
						<span class="alert birthDate"></span>
					</li>
					<li class="list-inline m-3">
						<label class="list-inline-item">Description en Français : </label>
						<textarea class="list-inline-item form-control" name="descrArtistFr"><?php if(!empty($data)): ?><?= $data['artist']->descrArtistFR ?><?php endif; ?></textarea>
						<span class="alert descrArtistFr"></span>
					</li>
					<li class="list-inline m-3">
						<label class="list-inline-item">Description en Anglais: </label>
						<textarea class="list-inline-item form-control" name="descrArtisteEn"><?php if(!empty($data)): ?><?= $data['artist']->descrArtistEN ?><?php endif; ?></textarea>
						<span class="alert descrArtisteEn"></span>
					</li>
                    <li class="list-inline m-3">
                        <label class="list-inline-item">Photo (facultatif):  </label>
                        <input type="file" id="file-artist" class="list-inline-item form-control" name="urlImg">
                        <span class="alert urlImg"></span>
                    </li>
                    <?php if(!empty($data) && isset($urlImg)): ?>
                        <li>
                            
                        </li>
                        <?= $data['artist']->descrArtistEN ?>
                    <?php endif; ?>
				</ul>
			</li>
			<li class="list-group-item bold mt-5"></label>Contact</label></li>
				<ul class="list-group-item">
					<li class="list-inline m-3">
						<label class="list-inline-item">Nom : </label>
						<input <?php if(!empty($data)): ?> value="<?= $data['contact']->nameContact ?>" <?php endif; ?> class="list-inline-item form-control" type="text" name="nameContact">
						<span class="alert nameContact"></span>
					</li>
					<li class="list-inline m-3">
						<label class="list-inline-item">Prenom : </label>
						<input <?php if(!empty($data)): ?> value="<?= $data['contact']->surnameContact ?>" <?php endif; ?> class="list-inline-item form-control"type="text" name="surnameContact">
						<span class="alert surnameContact"></span>
					</li>
					<li class="list-inline m-3">
						<label class="list-inline-item">Email : </label>
						<input <?php if(!empty($data)): ?> value="<?= $data['contact']->email ?>" <?php endif; ?> class="list-inline-item form-control" type="email" name="email">
						<span class="alert email"></span>
					</li>
					<li class="list-inline m-3">
						<label class="list-inline-item">Telephone : </label>
						<input <?php if(!empty($data)): ?> value="<?= $data['contact']->telephone ?>" <?php endif; ?> class="list-inline-item form-control" type="text" name="telephone">
						<span class="alert telephone"></span>
					</li>
					<li class="list-inline m-3">
						<label class="list-inline-item">Addresse : </label>
						<input <?php if(!empty($data)): ?> value="<?= $data['contact']->address ?>" <?php endif; ?> class="list-inline-item form-control" type="text" name="address">
						<span class="alert address"></span>
					</li>
					<li class="list-inline m-3">
						<label class="list-inline-item">Ville : </label>
						<input <?php if(!empty($data)): ?> value="<?= $data['contact']->city ?>" <?php endif; ?> class="list-inline-item form-control" type="text" name="city">
						<span class="alert city"></span>
					</li>
				</ul>
			</li>
			<li class="list-group-item bold mt-5"></label>Informations concernant l'exposition</label></li>
				<ul class="list-group-item">
					<li class="list-inline m-3">
						<label class="list-inline-item">Choisir un jour correspondant à la semaine de l'exposition. La semaine sera alors entièrement dediée à cette exposition</label>
						<input <?php if(!empty($data)): ?> value="<?= $data['exposition']->week ?>" <?php endif; ?> class="list-inline-item form-control" type="date" name="week">
						<span class="alert week"></span>
					</li>
					<li class="list-inline m-3">
						<label class="list-inline-item">Description de l'exposition en Français :</label>
						<input <?php if(!empty($data)): ?> value="<?= $data['exposition']->generalDescrFR ?>" <?php endif; ?> class="list-inline-item form-control" type="text" name="generalDescrFr">
						<span class="alert generalDescrFr"></span>
					</li>
					<li class="list-inline m-3">
						<label class="list-inline-item">A voir si on fait? Description generale en:</label>
						<input <?php if(!empty($data)): ?> value="<?= $data['exposition']->generalDescrEN ?>" <?php endif; ?> class="list-inline-item form-control" type="text" name="generalDescrEn">
						<span class="alert generalDescrEn"></span>
					</li>
				</ul>
			</li>
			<?php if(empty($data)): ?>
				<button type="submit" class="btn btn-dark btn-lg btn-block mt-4 mb-5" action="add">Envoyer</button>
			<?php else: ?>
				<button type="submit" class="btn btn-dark btn-lg btn-block mt-4 mb-5" action="edit">Modifier</button>
			<?php endif; ?>
		</ul>
	</form>
</div>
<script type="text/javascript" src="js/expo.js"></script>