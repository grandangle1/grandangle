<div class="container pt-5">
    <div class="row">
        <h1 class="m-auto mt-5 bold">Création ou modification d'une catégorie d'oeuvre</h1>
        <div class="col-lg-12 p-5 mt-5 border border-secondary rounded">
            <form method="post" <?php if(!empty($data)): ?>action="?p=admin.type.submit&id=<?= $type->id ?>" <?php else: ?>action="?p=admin.type.submit"<?php endif; ?>>
                <?php if(!empty($data)): ?>
                    <h2 class="text-center">Identifiant: <?= $type->id ?></h2>
                <?php endif; ?>
                <div class="form-group mt-4">
                    <label for="exampleInputEmail1">Catégorie Française</label>
                    <input type="text" class="form-control" name="typeFr" <?php if(!empty($data)): ?><?= 'value="'.$type->typeFr.'"' ?><?php endif; ?> required>
                </div>
                <div class="form-group mt-4">
                    <label for="exampleInputEmail1">Catégorie Anglaise</label>
                    <input type="text" class="form-control" name="typeEn" <?php if(!empty($data)): ?><?= 'value="'.$type->typeEn.'"' ?><?php endif; ?> required>
                </div>
                <button type="submit" class="btn btn-dark btn-block mt-5">Créer / Modifier</button>
            </form>
        </div>
    </div>
</div>