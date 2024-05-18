<div class="col-md-6">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title text-center"><?= $titulo ?></h5>
            <form action="<?= $action ?>" method="post">
                <?php if ($_POST['id']) : ?>
                <input type="hidden" name="id" value="<?= $_POST['id']; ?>">
                <?php endif ?>
                <div class="mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" value="<?= $_POST['name'] ? $_POST['name'] : '' ?>" class="form-control"
                        id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" value="<?= $_POST['email'] ? $_POST['email'] : '' ?>" class="form-control"
                        id="email" name="email" required>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </form>
        </div>
    </div>
</div>