<div class="container">
<h1 class="text-center mt-5 bold">Edition d'un type d'oeuvre</h1>

<form method="post" <?php if(!empty($data)): ?>action="?p=admin.type.submit&id=<?= $type->id ?>" <?php else: ?>action="?p=admin.type.submit"<?php endif; ?>>
    <?php if(!empty($data)): ?>

        <h2 class="text-center p-5">ID : <?= $type->id ?></h2>
    <?php endif; ?>
    <div class="form-group">
        <label for="exampleInputEmail1">Type en Français</label>
        <input type="text" class="form-control" name="typeFr" <?php if(!empty($data)): ?><?= 'value="'.$type->typeFr.'"' ?><?php endif; ?> required>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Type en anglais</label>
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

    <button type="submit" class="btn btn-secondary btn-block mb-5">Submit</button>
</form>
</div>