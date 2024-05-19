<?php
require './backend/routes.php';

include_once('./backend/models/User.php');

$modelUser = new User();
?>

<?php
$title = "Home";
$href = "./frontend/views/pages/inserir.php";
$textoHref = "Inserir novo usuário";

include_once("./frontend/views/layouts/_header.php");
?>

<div class="container mt-4 text-center text-center">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Ação</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($modelUser->getUsers() as $user) : ?>
                <tr>
                    <td><?= $user->id; ?></td>
                    <td><?= $user->name; ?></td>
                    <td><?= $user->email; ?></td>
                    <td class="d-flex justify-content-around">
                        <form action="/frontend/views/pages/vincular-cores.php" method="post">
                            <input type="hidden" name="id" value="<?= $user->id ?>">
                            <input type="hidden" name="name" value="<?= $user->name ?>">
                            <button type="submit" class="btn btn-secondary btn-sm">
                                Gerenciar cores
                            </button>
                        </form>
                        <form action="/frontend/views/pages/editar.php" method="post">
                            <input type="hidden" name="name" value="<?= $user->name ?>">
                            <input type="hidden" name="email" value="<?= $user->email ?>">
                            <input type="hidden" name="id" value="<?= $user->id ?>">
                            <button type="submit" class="btn btn-primary btn-sm">
                                Editar usuário
                            </button>
                        </form>
                        <a href='index.php?action=delete&id=<?= $user->id; ?>' class="btn btn-danger btn-sm">
                            Deletar Usuário
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>

</html>