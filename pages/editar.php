<?php
require 'connection.php';

$userId = $_GET['id'] ?? '';


if (isset($userId)) {
    $connection = new Connection();

    $query = $connection->prepare("SELECT * FROM users WHERE id = :id");
    $query->bindParam(':id', $userId, PDO::PARAM_INT);
    $query->execute();

    $user = $query->fetch(PDO::FETCH_OBJ);
} else {
    echo "ID de usuário não fornecido.";
    exit;
}

$colors = $connection->query("SELECT * FROM colors");

?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="bg-dark-subtle">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">Usuário(a) <?= $user->name; ?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href='/index.php'>Visualizar usuários</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Editar</h5>
                        <form action="/process_update.php" method="post">
                            <input type="hidden" name="id" value="<?= $user->id; ?>">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nome</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="<?= $user->name; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">E-mail</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="<?= $user->email; ?>" required>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Vincular cor</h5>
                        <form action="/process_insert.php" method="post">
                            <div class="mb-3">
                                <input value="<?= $userId; ?>" hidden type="text" name="user_id">
                                <select name="color_id" class="form-select" aria-label="default select example"
                                    onchange="submitForm()">
                                    <option value="n/a" selected>Escolha uma opção</option>
                                    <?php foreach ($colors as $color) : ?>
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
        </div>
    </div>
</body>

</html>