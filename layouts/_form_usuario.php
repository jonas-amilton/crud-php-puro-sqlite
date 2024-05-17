<div class="col-md-6">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title text-center"><?= $titulo ?></h5>
            <form action="<?= $action ?>" method="post">
                <?php if ($userId) : ?>
                <input type="hidden" name="id" value="<?= $userId; ?>">
                <?php endif ?>
                <div class="mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </form>
        </div>
    </div>
</div>