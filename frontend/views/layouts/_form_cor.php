<?php
include_once('./backend/models/Color.php');

$modelColor = new Color();
?>

<div class="col-md-6">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title text-center"><?= 'Vincular cor a ' . $_POST['name'] ?? '' ?></h5>
            <form action="../../../index.php" method="post">
                <div class="mb-3">
                    <input value="<?= $_POST['id']; ?>" hidden type="text" name="user_id">
                    <select name="color_id" class="form-select" aria-label="default select example">
                        <option value="n/a" selected>Escolha uma opção</option>
                        <?php foreach ($modelColor->getColors() as $color) : ?>
                            <option value="<?= $color->id; ?>"><?= $color->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </form>
        </div>
    </div>
</div>