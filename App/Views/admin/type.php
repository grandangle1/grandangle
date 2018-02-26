<h1>Edition d'un type d'oeuvre</h1>

<form method="post" <?php if(!empty($data)): ?>action="?p=admin.type.submit&id=<?= $type->id ?>" <?php else: ?>action="?p=admin.type.submit"<?php endif; ?>>
    <?php if(!empty($data)): ?>

        <h2 style="text-align: center;">ID : <?= $type->id ?></h2>
    <?php endif; ?>
    <div class="form-group">
        <label for="exampleInputEmail1">Type fr</label>
        <input type="text" class="form-control" name="typeFr" <?php if(!empty($data)): ?><?= 'value="'.$type->typeFr.'"' ?><?php endif; ?> required>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Type En</label>
        <input type="text" class="form-control" name="typeEn" <?php if(!empty($data)): ?><?= 'value="'.$type->typeEn.'"' ?><?php endif; ?> required>
    </div>
    <div class="form-group">
        <label for="descriptionFr">Description francase</label>
        <textarea  name="descriptionFr" rows="5" cols="50" required><?php if(!empty($data)): ?><?= $type->descriptionFr ?><?php endif; ?></textarea>
    </div>
    <div class="form-group">
        <label for="descriptionEn">Description Anglaise</label>
        <textarea  name="descriptionEn" rows="5" cols="50" required><?php if(!empty($data)): ?><?= $type->descriptionEn ?><?php endif; ?></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>