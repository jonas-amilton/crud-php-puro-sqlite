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

        include_once('./layouts/_form_usuario.php');
        ?>

        <?php
        include_once('./layouts/_form_cor.php');
        ?>

    </div>
</div>
</body>

</html>