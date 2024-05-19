<?php
$title = "Vincular cores";
$href = "../../../index.php";
$textoHref = "Visualizar usuários";

include_once("./frontend/views/layouts/_header.php");
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <?php
        include_once('./frontend/views/layouts/_container_cor.php');
        ?>

        <?php
        include_once('./frontend/views/layouts/_form_cor.php');
        ?>

    </div>
</div>
</body>

</html>