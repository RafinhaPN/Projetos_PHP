<?php
include './class_conexao.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    echo "Detalhes do cliente" . $id;
    $cliente = Listar::ClienteUnico($id);

    var_dump($cliente);
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <title>Teste Empresa </title>
</head>

<body>
    <div class="container">
        <header>
            <nav class="navbar navbar-light bg-light">
                <a class="navbar-brand" href="#">Agenda Detalhes</a>
            </nav>
        </header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <ul class="nav justify-content-end">
                <li class="nav-item">
                    <a class="nav-link" href="./index.php">Voltar</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="./editar.php">Atualizar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./cadastrar.php">Cadastrar</a>
                </li>
            </ul>
        </nav>
        <?php foreach ($clientes as $cliente) { ?>
            <div class="card" style="width: 100%; margin:5px">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $cliente->id; ?></h5>
                    <h5 class="card-title"><?php echo $cliente->nome; ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $cliente->sobrenome; ?></h6>
                    <p><?php echo $cliente->cpf; ?></p>
                    <p><?php echo $cliente->email; ?></p>
                    <p><?php echo $cliente->telefone; ?></p>
                    <a href="./index.php" class="card-link">Voltar</a>
                    <a href="#" class="card-link">Ligar Agora</a>
                </div>
            </div>

        <?php } ?>


    </div>
</body>

</html>