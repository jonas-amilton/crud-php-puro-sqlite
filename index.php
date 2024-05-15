<?php

require 'connection.php';

$connection = new Connection();

$users = $connection->query("SELECT * FROM users");
?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar bg-primary">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1 text-white">Home</span>
            <a href="/inserir.php" style="color: #fff;">Inserir novo usuário</a>
        </div>
    </nav>

    <div class="container-fluid d-flex justify-content-center">
        <table class="table w-75">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <th scope="row"><?= $user->id; ?></th>
                        <td><?= $user->name; ?></td>
                        <td><?= $user->email; ?></td>
                        <td>
                            <a href='#'>Editar</a>
                            <a href='#'>Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</body>

</html>