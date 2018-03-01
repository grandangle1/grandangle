<div class="container">
    <h1 class="text-center mt-5 bold">Espace d'administration</h1>
    <div class="text-center">
        <a href="index.php?p=admin.artist.add"><button type="button" class="btn btn-dark m-5 btn-lg">Répertorier un artiste</button></a>
        <a href="index.php?p=admin.artist.manage"><button type="button" class="btn btn-dark m-5 btn-lg">Gestion des artistes</button></a>
    </div>
    <div class="row border border-dark rounded p-3">
        <div class="col-lg-12">
            <div class="row mt-2">
                <div class="col-lg-12">
                    <h3 class="text-center bold">Calendrier des expositions</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <img src="img/admin/precedent.png" class="pagination float-left salle" dir="-1">
                    <p class="float-left p-2 font-weight-bold prenext">Précédent</p>
                    <img src="img/admin/suivant.png" class="pagination float-right salle" dir="1">
                    <p class="float-right p-2 font-weight-bold prenext">Suivant</p>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-6">
                    <div class="card border-secondary" id="cell0">
                        <div class="card-header"><h5 class="date text-center bold"></h5></div>
                        <div class="card-body">
                            <p class="info card-title">Vous pouvez contacter le gerant Mr/Mme <span class="contact"></span> au <span class="contact"></span> ou par mail : <span class="contact"></span></p>
                            <p class="info card-text">Cet(te) artiste expose <span class="nbOeuvre"></span> oeuvres</p>
                            <div class="text-center">
                                <p><img src="img/admin/ajoutExpo.png" class="salle pr-2 newExpo">Ajouter une expo</p>
                            </div>
                            <div class="exist">
                                <div class="float-left">
                                    <p class="p-2"><img src="img/admin/ajouterOeuvre.png" class="addOeuvre pr-2 salle" spec="link" cell="0">Ajouter une oeuvre</p>
                                    <p class="p-2"><img src="img/admin/modifOeuvre.png" class="listOeuvre pr-2 salle" spec="link" cell="0">Modifier une oeuvre</p>
                                    <p class="p-2"><img src="img/admin/addArtist.png" class="artist pr-2 salle" spec="link"  cell="0">Ajouter un artiste</p>
                                </div>
                                <div class="float-left">
                                    <p class="p-2"><img src="img/admin/modifExpo.png" class="editExpo pr-2 salle" spec="link" cell="0">Modifier l'exposition</p>
                                    <p class="p-2"><img src="img/admin/supprExpo" class="deleteExpo pr-2 salle" cell="0">Supprimer l'exposition</p>
                                    <p class="p-2"><img src="img/admin/pdfGenerate.png" class="pdfExpo pr-2 salle" spec="link" cell="0">Générer le PDF</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card border-secondary" id="cell1">
                        <div class="card-header"><h5 class="date text-center bold"></h5></div>
                        <div class="card-body">
                            <p class="info card-title">Vous pouvez contacter le gerant Mr/Mme <span class="contact"></span> au <span class="contact"></span> ou par mail : <span class="contact"></span></p>
                            <p class="info card-text">Cet(te) artiste expose <span class="nbOeuvre"></span> oeuvres</p>
                            <div class="text-center">
                                <p><img src="img/admin/ajoutExpo.png" class="pr-2 salle newExpo">Ajouter une expo</p>
                            </div>
                            <div class="exist">
                                <div class="float-left">
                                    <p class="p-2"><img src="img/admin/ajouterOeuvre.png" class="addOeuvre pr-2 salle" spec="link" cell="1">Ajouter une oeuvre</p>
                                    <p class="p-2"><img src="img/admin/modifOeuvre.png" class="listOeuvre pr-2 salle" spec="link" cell="1">Modifier une oeuvre</p>
                                    <p class="p-2"><img src="img/admin/addArtist.png" class="artist pr-2 salle" spec="link"  cell="1">Ajouter un artiste</p>
                                </div>
                                <div class="float-left">
                                    <p class="p-2"><img src="img/admin/modifExpo.png" class="editExpo pr-2 salle" spec="link" cell="1">Modifier l'exposition</p>
                                    <p class="p-2"><img src="img/admin/supprExpo" class="deleteExpo pr-2 salle" cell="1">Supprimer l'exposition</p>
                                    <p class="p-2"><img src="img/admin/pdfGenerate.png" class="pdfExpo pr-2 salle" spec="link" cell="1">Générer le PDF</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-6">
                    <div class="card border-secondary" id="cell2">
                        <div class="card-header"><h5 class="date text-center bold"></h5></div>
                        <div class="card-body">
                            <p class="info card-title">Vous pouvez contacter le gerant Mr/Mme <span class="contact"></span> au <span class="contact"></span> ou par mail : <span class="contact"></span></p>
                            <p class="info card-text">Cet(te) artiste expose <span class="nbOeuvre"></span> oeuvres</p>
                            <div class="text-center">
                                <p><img src="img/admin/ajoutExpo.png" class="pr-2 salle newExpo">Ajouter une expo</p>
                            </div>
                            <div class="exist">
                                <div class="float-left">
                                    <p class="p-2"><img src="img/admin/ajouterOeuvre.png" class="addOeuvre pr-2 salle" spec="link" cell="2">Ajouter une oeuvre</p>
                                    <p class="p-2"><img src="img/admin/modifOeuvre.png" class="listOeuvre pr-2 salle" spec="link" cell="2">Modifier une oeuvre</p>
                                    <p class="p-2"><img src="img/admin/addArtist.png" class="artist pr-2 salle" spec="link"  cell="2">Ajouter un artiste</p>
                                </div>
                                <div class="float-left">
                                    <p class="p-2"><img src="img/admin/modifExpo.png" class="editExpo pr-2 salle" spec="link" cell="2">Modifier l'exposition</p>
                                    <p class="p-2"><img src="img/admin/supprExpo" class="deleteExpo pr-2 salle" cell="2">Supprimer l'exposition</p>
                                    <p class="p-2"><img src="img/admin/pdfGenerate.png" class="pdfExpo pr-2 salle" spec="link" cell="2">Générer le PDF</p>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card border-secondary" id="cell3">
                        <div class="card-header"><h5 class="date text-center bold"></h5></div>
                        <div class="card-body">
                            <p class="info card-title">Vous pouvez contacter le gerant Mr/Mme <span class="contact"></span> au <span class="contact"></span> ou par mail : <span class="contact"></span></p>
                            <p class="info card-text">Cet(te) artiste expose <span class="nbOeuvre"></span> oeuvres</p>
                            <div class="text-center">
                                <p><img src="img/admin/ajoutExpo.png" class="pr-2 salle newExpo">Ajouter une expo</p>
                            </div>
                            <div class="exist">
                                <div class="float-left">
                                    <p class="p-2"><img src="img/admin/ajouterOeuvre.png" class="addOeuvre pr-2 salle" spec="link" cell="3">Ajouter une oeuvre</p>
                                    <p class="p-2"><img src="img/admin/modifOeuvre.png" class="listOeuvre pr-2 salle" spec="link" cell="3">Modifier une oeuvre</p>
                                    <p class="p-2"><img src="img/admin/addArtist.png" class="artist pr-2 salle" spec="link"  cell="3">Ajouter un artiste</p>
                                </div>
                                <div class="float-left">
                                    <p class="p-2"><img src="img/admin/modifExpo.png" class="editExpo pr-2 salle" spec="link" cell="3">Modifier l'exposition</p>
                                    <p class="p-2"><img src="img/admin/supprExpo" class="deleteExpo pr-2 salle" cell="3">Supprimer l'exposition</p>
                                    <p class="p-2"><img src="img/admin/pdfGenerate.png" class="pdfExpo pr-2 salle" spec="link" cell="3">Générer le PDF</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="m-5"><img src="img/admin/refresh32.png" class="now pr-2 salle">Revenir à la date du jour</div>
                </div>
            </div>
        </div>
    </div>
    <div class="row border border-dark rounded p-3 mt-5 mb-5">
        <div class="col-lg-12">
            <div class="row mt-2">
                <div class="col-lg-12">
                    <h3 class="text-center mb-4 bold">Liste des catégories des oeuvres</h3>
                </div>
            </div>
            <table class="table">
                <thead>
                <tr>
                    <td class="bold p-4 text-center">IDENTIFIANT</td>
                    <td class="bold p-4">TITRE DE LA NOUVELLE CATÉGORIE (FRANCAIS ET ANGLAIS) </td>
                    <td></td>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($types as $type): ?>
                    <tr>
                        <td class="text-center pt-3"><?= $type->id; ?></td>
                        <td class="pl-4 pt-3"><span class="font-italic">Français: </span><?= $type->typeFr ?>&nbsp;&nbsp;/&nbsp;&nbsp;<span class="font-italic">Anglais: </span><?= $type->typeEn ?></td>
                        <td>
                            <a href="?p=admin.type.edit&id=<?= $type->id ?>" class="btn btn-dark"> Éditer</a>
                            <a class="btn btn-danger deleteType" id="<?= $type->id ?>">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="5" style="text-align: center;" class="pt-4"><a href="?p=admin.type.add" class="btn btn-dark">Nouvelle catégorie</a></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 text-center">
            <div class="border border-danger rounded p-4 text-danger bold"><?= $fail->nbFail; ?> personnes ont rentré le mauvais mot de passe</div>
            <a href="index.php?p=admin.account.show"><button type="button" class="btn btn-secondary mt-5 mb-5">Gestion des comptes administrateurs</button></a>

        </div>
    </div>
</div>

<script type="text/javascript" src="js/admin.js"></script>

