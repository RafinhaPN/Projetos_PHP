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
                <a class="navbar-brand" href="#">Agenda Atualizar</a>
            </nav>
        </header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <ul class="nav justify-content-end">
                <li class="nav-item">
                    <a class="nav-link" href="./index.php">Voltar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./cadastrar.php">Cadastrar</a>
                </li>
            </ul>
        </nav>
        <div class="form">
            <?php
            if (isset($_POST['btn'])) {
                $id = $_POST['id'];
                $nome = $_POST['nome'];
                $sobrenome = $_POST['sobrenome'];
                $cpf = $_POST['cpf'];
                $email = $_POST['email'];
                $telefone = $_POST['telefone'];

                $cliente = Atualizar::Cliente($id, $nome, $sobrenome, $cpf, $email, $telefone);

                if ($cliente) {
            ?>
                    <div class="alert alert-primary text-center" role="alert">
                        <p>Atualizado com sucesso</p>
                    </div>
                <?php
                } else {
                ?>
                    <p>Erro na Atualização</p>
            <?php
                }
            }




            ?>

            <?php foreach ($clientes as $cliente) { ?>
                <form method="POST" action="#">
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">id</label>
                        <div class="col-sm-10">
                            <input type="hidden" name="id" class="form-control" id="inputEmail3" value="<?php echo $cliente->id ?>" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Nome</label>
                        <div class="col-sm-10">
                            <input type="text" name="nome" class="form-control" id="inputEmail3" value="<?php echo $cliente->nome ?>" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Sobrenome</label>
                        <div class="col-sm-10">
                            <input type="text" name="sobrenome" class="form-control" id="inputPassword3" value="<?php echo $cliente->sobrenome ?>" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">CPF</label>
                        <div class="col-sm-10">
                            <input type="text" name="cpf" class="form-control" id="inputPassword3" value="<?php echo $cliente->cpf; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">E-mail</label>
                        <div class="col-sm-10">
                            <input type="text" name="email" class="form-control" id="inputPassword3" value="<?php echo $cliente->email; ?>" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Telefone</label>
                        <div class="col-sm-10">
                            <input type="text" name="telefone" class="form-control" id="inputPassword3" value="<?php echo $cliente->telefone; ?>" />
                        </div>
                    </div>
                    <input type="submit" name="btn" class="btn btn-primary mb-2" value="Atualizar">
                </form>
            <?php } ?>
        </div>



    </div>
</body>

</html>