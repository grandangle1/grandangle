<div class="container">
    <h1 class="text-center bold p-4">Type d'oeuvre</h1>

    <form method="post" <?php if(!empty($data)): ?>action="?p=admin.type.submit&id=<?= $type->id ?>" <?php else: ?>action="?p=admin.type.submit"<?php endif; ?>>
        <?php if(!empty($data)): ?>

            <h2 class="text-center bold p-4">ID : <?= $type->id ?></h2>
        <?php endif; ?>
        <div class="form-group">
            <label for="exampleInputEmail1">Désignation Française</label>
            <input type="text" class="form-control" name="typeFr" <?php if(!empty($data)): ?><?= 'value="'.$type->typeFr.'"' ?><?php endif; ?> required>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Désignation Anglaise</label>
            <input type="text" class="form-control" name="typeEn" <?php if(!empty($data)): ?><?= 'value="'.$type->typeEn.'"' ?><?php endif; ?> required>
        </div>
        <div class="form-group">
            <label for="descriptionFr">Description Française</label>
            <textarea  class="form-control" name="descriptionFr" rows="5" cols="50" required><?php if(!empty($data)): ?><?= $type->descriptionFr ?><?php endif; ?></textarea>
        </div>
        <div class="form-group">
            <label for="descriptionEn">Description Anglaise</label>
            <textarea  class="form-control" name="descriptionEn" rows="5" cols="50" required><?php if(!empty($data)): ?><?= $type->descriptionEn ?><?php endif; ?></textarea>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-secondary">Confirmer</button>
        </div>
    </form>
</div>