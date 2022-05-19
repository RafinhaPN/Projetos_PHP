<?php

include './class_conexao.php';

$clientes = Listar::Clientes();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    echo "Detalhes do cliente" . $id;
    $delete = Delete::cliente($id);
    if($delete){
        ?>
        <div class="alert alert-danger text-center" role="alert">
        <p>Contato deletado com sucesso!</p>    
        </div>
        
        <?php
    }

    $clientes = Listar::Clientes();

   
}




//var_dump($clientes);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Teste Empresa </title>
</head>

<body>
    <div class="container">
        <header>
            <nav class="navbar navbar-light bg-light">
                <a class="navbar-brand" href="#">Agenda</a>
            </nav>

        </header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <ul class="nav justify-content-end">
                <li class="nav-item">
                    <a class="nav-link" href="./index.php">Listar</a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link" href="./cadastrar.php">Cadastrar</a>
                </li>
            </ul>
        </nav>
        <?php foreach ($clientes as $cliente) { ?>
            <div class="card" style="width: 100%; margin:5px">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $cliente->nome ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $cliente->sobrenome?></h6>

                    <a href="./index.php/?id=<?php echo $cliente->id; ?>" class="card-link">Apagar</a>

                   
                </div>
            </div>
        <?php } ?>
    </div>
</body>

</html>