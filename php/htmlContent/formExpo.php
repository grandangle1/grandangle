 <!-- A enlever ! -->
 <style type="text/css">
 	li {
 		width: 40%;
 		padding-right: 20px;
 	}
 	.alert {display: none;}
 </style>

<h1 style="text-align: center;">Add expo</h1>
<form id="form-expo">
	<ul style="display: flex; flex-wrap: wrap;">
		<li style="width: 100%"><h1>Information artiste</h1></li>
		<li><label>Nom : </label></li>
		<li>
			<input type="text" name="nameArtist">
			<span class="alert nameArtist"></span>
		</li>
		

		<li><label>Prenom : </label></li>
		<li>
			<input type="text" name="surnameArtist">
			<span class="alert surnameArtist"></span>
		</li>
		

		<li><label>Date de naissance : </label></li>
		<li>
			<input type="date" name="birthDate">
			<span class="alert birthDate"></span>
		</li>
		

		<li><label>Description fr : </label></li>
		<li>
			<textarea name="descrArtistFr"></textarea>
			<span class="alert descrArtistFr"></span>
		</li>
		

		<li><label>Description en : </label></li>
		<li>
			<textarea name="descrArtisteEn"></textarea>
			<span class="alert descrArtisteEn"></span>
		</li>
		
		<li style="width: 100%"><h1>Contact</h1></li>
		<li><label>Nom : </label></li>
		<li>
			<input type="text" name="nameContact">
			<span class="alert nameContact"></span>
		</li>
		

		<li><label>Prenom : </label></li>
		<li>
			<input type="text" name="surnameContact">
			<span class="alert surnameContact"></span>
		</li>
		

		<li><label>Email : </label></li>
		<li>
			<input type="email" name="email">
			<span class="alert email"></span>
		</li>
		

		<li><label>Telephone : </label></li>
		<li>
			<input type="text" name="telephone">
			<span class="alert telephone"></span>
		</li>
		

		<li><label>Addresse : </label></li>
		<li>
			<input type="text" name="address">
			<span class="alert address"></span>
		</li>
		

		<li><label>Ville : </label></li>
		<li>
			<input type="text" name="city">
			<span class="alert city"></span>
		</li>
		

		<li style="width: 100%"><h1>Information expo</h1></li>
		<li><label>Choissez un jour de la semaine (La semaine entiere sera automatiquement attribuer a cette expo):</label></li>
		<li>
			<input type="date" name="week">
			<span class="alert week"></span>
		</li>
		

		<li><label>A voir si on fait? Description generale fr:</label></li>
		<li>
			<input type="text" name="generalDescrFr">
			<span class="alert generalDescrFr"></span>
		</li>
		

		<li><label>A voir si on fait? Description generale en:</label></li>
		<li>
			<input type="text" name="generalDescrEn">
			<span class="alert generalDescrEn"></span>
		</li>
		

		<li><button type="submit">Envoyer</button></li>
	</ul>

</form>
<script type="text/javascript" src="../js/addExpo.js"></script>