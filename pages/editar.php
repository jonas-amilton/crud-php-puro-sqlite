<?php
$title = "Editar";
$href = "../index.php";
$textoHref = "Visualizar usuários";

include_once("./layouts/_header.php");
?>

<div class="container mt-5">
    <div class="row justify-content-center">

        <?php
        $titulo = 'Editar usuário';

        include_once('./layouts/_form_usuario.php');
        ?>

        <?php
        include_once('./layouts/_form_cor.php');
        ?>

    </div>
</div>
</body>

</html>