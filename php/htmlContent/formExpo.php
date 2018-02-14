<div class="container pt-5">
	<div class="center cborder">
		<h2 class="center p-4">SAISIR UNE NOUVELLE EXPOSITION</h2>
	</div>
	<form id="form-expo" class="form-group">
		<ul class="col-lg-12 ">
			<li class="list-group-item bold"><label>Informations sur l'artiste</label></li>
				<ul class="list-group-item">
					<li class="list-inline m-3">
						<label class="list-inline-item">Nom : </label>
						<input class="list-inline-item form-control" type="text" name="nameArtist">
						<span class="alert nameArtist"></span>
					</li>
				
					<li class="list-inline m-3">
						<label class="list-inline-item">Prenom : </label>
						<input class="list-inline-item form-control" type="text" name="surnameArtist">
						<span class="alert surnameArtist"></span>
					</li>
					<li class="list-inline m-3">
						<label class="list-inline-item">Date de naissance : </label>
						<input class="list-inline-item form-control" type="date" name="birthDate">
						<span class="alert birthDate"></span>
					</li>
					<li class="list-inline m-3">
						<label class="list-inline-item">Description en Français : </label>
						<textarea class="list-inline-item form-control" name="descrArtistFr"></textarea>
						<span class="alert descrArtistFr"></span>
					</li>
					<li class="list-inline m-3">
						<label class="list-inline-item">Description en Anglais: </label>
						<textarea class="list-inline-item form-control" name="descrArtisteEn"></textarea>
						<span class="alert descrArtisteEn"></span>
					</li>
				</ul>
			</li>
			<li class="list-group-item bold mt-5"></label>Contact</label></li>
				<ul class="list-group-item">
					<li class="list-inline m-3">
						<label class="list-inline-item">Nom : </label>
						<input class="list-inline-item form-control" type="text" name="nameContact">
						<span class="alert nameContact"></span>
					</li>
					<li class="list-inline m-3">
						<label class="list-inline-item">Prenom : </label>
						<input class="list-inline-item form-control"type="text" name="surnameContact">
						<span class="alert surnameContact"></span>
					</li>
					<li class="list-inline m-3">
						<label class="list-inline-item">Email : </label>
						<input class="list-inline-item form-control" type="email" name="email">
						<span class="alert email"></span>
					</li>
					<li class="list-inline m-3">
						<label class="list-inline-item">Telephone : </label>
						<input class="list-inline-item form-control" type="text" name="telephone">
						<span class="alert telephone"></span>
					</li>
					<li class="list-inline m-3">
						<label class="list-inline-item">Addresse : </label>
						<input class="list-inline-item form-control" type="text" name="address">
						<span class="alert address"></span>
					</li>
					<li class="list-inline m-3">
						<label class="list-inline-item">Ville : </label>
						<input class="list-inline-item form-control" type="text" name="city">
						<span class="alert city"></span>
					</li>
				</ul>
			</li>
			<li class="list-group-item bold mt-5"></label>Informations concernant l'exposition</label></li>
				<ul class="list-group-item">
					<li class="list-inline m-3">
						<label class="list-inline-item">Choisir un jour correspondant à la semaine de l'exposition. La semaine sera alors entièrement dediée à cette exposition</label>
						<input class="list-inline-item form-control" type="date" name="week">
						<span class="alert week"></span>
					</li>
					<li class="list-inline m-3">
						<label class="list-inline-item">Description de l'exposition en Français :</label>
						<input class="list-inline-item form-control" type="text" name="generalDescrFr">
						<span class="alert generalDescrFr"></span>
					</li>
					<li class="list-inline m-3">
						<label class="list-inline-item">A voir si on fait? Description generale en:</label>
						<input class="list-inline-item form-control" type="text" name="generalDescrEn">
						<span class="alert generalDescrEn"></span>
					</li>
				</ul>
			</li>
			
				<button type="submit" class="btn btn-dark btn-lg btn-block mt-4 mb-5">Envoyer</button>
		
		</ul>
	</form>
</div>
<script type="text/javascript" src="../js/addExpo.js"></script>