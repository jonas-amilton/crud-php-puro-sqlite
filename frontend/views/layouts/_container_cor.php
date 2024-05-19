<?php
include_once('./backend/models/Color.php');

$modelColor = new Color();

$userId = $_POST['id'] ?? '';
$colors = (array) $modelColor->getColorsByIdUser($userId);
?>

<div class="col-md-6 text-center">
    <div class="card col">
        <div class="card-body">
            <h5 class="card-title text-center"><?= 'Cores vinculadas a ' . $_POST['name'] ?? '' ?></h5>
            <?php if (!empty($colors)) : ?>
            <?php foreach ($colors as $color) : ?>
            <hr>
            <div class="d-flex align-items-center justify-content-between">
                <div><?= $color['name'] ?>
                </div>
                <div style="background-color: <?= $color['name']; ?>; width: 1em; height: 1em; border-radius: 50%;">
                </div>
            </div>
            <?php endforeach ?>
            <?php else : ?>
            Nenhuma cor vinculada
            <?php endif ?>
        </div>
    </div>
</div>