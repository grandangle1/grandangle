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
                        <label class="list-inline-item">Thème de l'exposition en Francais</label>
                        <input <?php if(!empty($data)): ?> value="<?= $data['exposition']->themeFr ?>" <?php endif; ?> class="list-inline-item form-control" type="text" name="themeFr" required>
                        <span class="alert theme"></span>
                    </li>
                    <li class="list-inline m-3">
                        <label class="list-inline-item">Thème de l'exposition en Anglais</label>
                        <input <?php if(!empty($data)): ?> value="<?= $data['exposition']->themeEn ?>" <?php endif; ?> class="list-inline-item form-control" type="text" name="themeEn" required>
                        <span class="alert theme"></span>
                    </li>
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
