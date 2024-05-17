<?php
$title = "Inserir";
$href = "/index.php";
$textoHref = "Visualizar usuários";

include_once("./layouts/_header.php");
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <?php
        $action = '/process_insert.php';
        $titulo = 'Inserir usuário';
        include_once('./layouts/_form_usuario.php');
        ?>
    </div>
</div>

</body>

</html>