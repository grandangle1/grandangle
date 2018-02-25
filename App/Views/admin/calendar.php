<!-- A enlever -->
<style>
    table {
        border-collapse: collapse;
    }

    table, th, td {
        border: 3px solid black;
    }
</style>

<h1>Espace d'administration</h1>
<div><?= $fail->nbFail; ?> personnes ont raté leur mot de passe</div>
<table style="margin: 50px auto;">
	<tr><td colspan="2">Tableau des expositions</td></tr>
	<tr>
		<td><img src="img/admin/previousPage32.png" class="pagination" dir="-1">Previous week </td>
		<td>Next week <img src="img/admin/nextPage32.png" class="pagination" dir="1"></td>
	</tr>
	<tr>
		<td id="cell0">
			<h5 class="date"></h5>
			<p class="info">Vous pouvez contacter le gerant Mr/Mme <span class="contact"></span> au <span class="contact"></span> ou par mail : <span class="contact"></span></p>
			<p class="info">Cet(te) artiste expose <span class="nbOeuvre"></span> oeuvres</p>
			<ul class="exist">
				<li><img src="img/admin/addOeuvre.png" class="addOeuvre" spec="link" cell="0">Ajouter oeuvre</li>
                <li><img src="img/admin/gear32.png" class="listOeuvre" spec="link" cell="0">Editer oeuvre</li>
				<li><img src="img/admin/editExpo.png" class="editExpo" spec="link" cell="0">Editer expo</li>
                <li><img src="img/admin/pdf32.png" class="pdfExpo" spec="link" cell="0">Généreé un pdf</li>
                <li><img src="img/admin/deleteExpo.png" class="deleteExpo" cell="0">enlever expo</li>

			</ul>
			<p class="newExpo"><img src="img/admin/newExpo.png">Ajouter une expo</p>
		</td>
		<td id="cell1">
			<h5 class="date"></h5>
			<p class="info">Vous pouvez contacter le gerant Mr/Mme <span class="contact"></span> au <span class="contact"></span> ou par mail : <span class="contact"></span></p>
			<p class="info">Cet(te) artiste expose <span class="nbOeuvre"></span> oeuvres</p>
			<ul class="exist">
				<li><img src="img/admin/addOeuvre.png" class="addOeuvre" spec="link" cell="1">Ajouter oeuvre</li>
                <li><img src="img/admin/gear32.png" class="listOeuvre" spec="link" cell="1">Editer oeuvre</li>
				<li><img src="img/admin/editExpo.png" class="editExpo" spec="link" cell="1">Editer expo</li>
                <li><img src="img/admin/pdf32.png" class="pdfExpo" spec="link" cell="1">Généreé un pdf</li>
                <li><img src="img/admin/deleteExpo.png" class="deleteExpo" cell="1">enlever expo</li>

			</ul>
			<p class="newExpo"><img src="img/admin/newExpo.png">Ajouter une expo</p>
		</td>
	</tr>
	<tr>
		<td id="cell2">
			<h5 class="date"></h5>
			<p class="info">Vous pouvez contacter le gerant Mr/Mme <span class="contact"></span> au <span class="contact"></span> ou par mail : <span class="contact"></span></p>
			<p class="info">Cet(te) artiste expose <span class="nbOeuvre"></span> oeuvres</p>
			<ul class="exist">
				<li><img src="img/admin/addOeuvre.png" class="addOeuvre" spec="link" cell="2">Ajouter oeuvre</li>
                <li><img src="img/admin/gear32.png" class="listOeuvre" spec="link" cell="2">Editer oeuvre</li>
				<li><img src="img/admin/editExpo.png" class="editExpo" spec="link" cell="2">Editer expo</li>
                <li><img src="img/admin/pdf32.png" class="pdfExpo" spec="link" cell="2">Généreé un pdf</li>
                <li><img src="img/admin/deleteExpo.png" class="deleteExpo" cell="2">enlever expo</li>
			</ul>
			<p class="newExpo"><img src="img/admin/newExpo.png">Ajouter une expo</p>
		</td>
		<td id="cell3">
			<h5 class="date"></h5>
			<p class="info">Vous pouvez contacter le gerant Mr/Mme <span class="contact"></span> au <span class="contact"></span> ou par mail : <span class="contact"></span></p>
			<p class="info">Cet(te) artiste expose <span class="nbOeuvre"></span> oeuvres</p>
			<ul class="exist">
				<li><img src="img/admin/addOeuvre.png" class="addOeuvre" spec="link" cell="3">Ajouter oeuvre</li>
                <li><img src="img/admin/gear32.png" class="listOeuvre" spec="link" cell="3">Editer oeuvre</li>
				<li><img src="img/admin/editExpo.png" class="editExpo" spec="link" cell="3">Editer expo</li>
                <li><img src="img/admin/pdf32.png" class="pdfExpo" spec="link" cell="3">Généreé un pdf</li>
                <li><img src="img/admin/deleteExpo.png" class="deleteExpo" cell="3">enlever expo</li>

			</ul>
			<p class="newExpo"><img src="img/admin/newExpo.png">Ajouter une expo</p>
		</td>
	</tr>
	<tr>
		<td colspan="2"><img src="img/admin/refresh32.png" class="now">Revenir a la date du jours</td>
	</tr>
</table>

<h2>Administration des type de d'oeuvres</h2>
<table class="table">
    <thead>
    <tr>
        <td>ID</td>
        <td>Titre</td>
        <td>Desciption Francaise</td>
        <td>Desciption Anglaise</td>
        <td>Actions</td>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($types as $type): ?>
        <tr>
            <td><?= $type->id; ?> - </td>
            <td>Fr : <?= $type->typeFr ?> En : <?= $type->typeEn ?></td>
            <td><?= $type->descriptionFr ?></td>
            <td><?= $type->descriptionEn ?></td>
            <td>
                <a href="?p=admin.type.edit&id=<?= $type->id ?>" class="btn btn-primary"> Editer</a>
                <a class="btn btn-danger deleteType" id="<?= $type->id ?>">Supprimer</a>
            </td>
        </tr>
    <?php endforeach; ?>
    <tr>
        <td colspan="5" style="text-align: center;"><a href="?p=admin.type.add" class="btn btn-success">Ajouter un type</a></td>
    </tr>
    </tbody>
</table>

<script type="text/javascript" src="js/admin.js"></script>







