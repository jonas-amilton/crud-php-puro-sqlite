<?php
require 'connection.php';
$connection = new Connection();


$userId = $_GET['id'] ?? '';


$colors = $connection->query("SELECT * FROM colors");

?>

<?php
$title = "Editar usuário";
$href = "/index.php";
$textoHref = "Visualizar usuários";

include_once("./layouts/_header.php");
?>

<div class="container mt-5">
    <div class="row justify-content-center">

        <?php
        $action = '/process_update.php';
        $titulo = 'Editar';
        $userId = $userId;

        include_once('./layouts/_form_usuario.php');
        ?>

        <?php
        $action = "/process_insert.php";
        $userId = $userId;
        $colors = $colors;

        include_once('./layouts/_form_cor.php');
        ?>

    </div>
</div>
</body>

</html>