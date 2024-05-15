<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserir</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar bg-primary">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1 text-white">Inserir usuário</span>
            <a href="/index.php" style="color: #fff;">Visualizar usuários</a>
        </div>
    </nav>

    <div class="container-fluid d-flex justify-content-center mt-5">
        <div class="card w-50">
            <form class="card-body container text-center" action="/process_insert.php" method="get">
                <h6>Inserir usuário</h6>
                <div class="row m-3">
                    <input type="text" name="name" placeholder="Nome">
                </div>
                <div class="row m-3">
                    <input type="email" name="email" placeholder="E-mail">
                </div>
                <div class="row m-3">
                    <button class="btn btn-primary" type="submit">Enviar</button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>