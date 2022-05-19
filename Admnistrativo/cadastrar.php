<?php
include './class_conexao.php';
//$cliente = Cadastrar::Cliente($nome,$sobrenome,$cpf,$email,$telefone);
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
                <a class="navbar-brand" href="#">Agenda Novo</a>
            </nav>
        </header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <ul class="nav justify-content-end">
                <li class="nav-item">
                    <a class="nav-link" href="./index.php">Voltar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./visualizar.php">Detalhes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./editar.php">Atualizar</a>
                </li>

            </ul>
        </nav>
        <div class="form">
            <?php

            /*
             $cpf =preg_replace("/[^0-9]/","",$cpf);
                $qtd=strlen($cpf);
                if($qtd >= 11){
                    if($qtd === 11){
                       $cpfFormatado = substr($cpf, 0, 3) . '.' .
                                       substr($cpf, 3, 3) . '.' .
                                       substr($cpf, 6, 3) . '.' .
                                       substr($cpf, 9, 2);
                        
                    }else{

                    }
                }else{
                    return 'documento invalido!';
                }

            
            */
            if (isset($_POST['btn'])) {
                $nome = $_POST['nome'];
                $sobrenome = $_POST['sobrenome'];
                $cpf = $_POST['cpf'];
                $email = $_POST['email'];
                $telefone = $_POST['telefone'];
                
                if(empty($nome) && empty($sobrenome) && empty($telefone) ){
                    ?>
                    <div class="alert alert-danger text-center" role="alert">
                        <p>Preencha os campos corretamente</p>
                    </div>

                    <?php
                    return;
                 
                }
                else
                {
                    $cliente = Cadastrar::Cliente($nome, $sobrenome, $cpf, $email, $telefone);
                    if ($cliente) {
                        ?>
                        <div class="alert alert-info text-center" role="alert">
                            <p>Contato cadastrado com sucesso</p>
                        </div>
                    <?php
                    } else {
                    ?>
                        <p>Erro: no cadastro</p>
                   <?php
                     }
                }
               
              

              
            }
            ?>


            <form method="POST" action="#">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nome</label>
                    <div class="col-sm-10">
                        <input type="text" name="nome" class="form-control" id="inputEmail3">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Sobrenome</label>
                    <div class="col-sm-10">
                        <input type="text" name="sobrenome" class="form-control" id="inputPassword3">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">CPF</label>
                    <div class="col-sm-10">
                        <input type="text" name="cpf" class="form-control" maxlength="11">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">E-mail</label>
                    <div class="col-sm-10">
                        <input type="email" name="email" class="form-control" id="inputPassword3">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Telefone</label>
                    <div class="col-sm-10">
                        <input type="text" name="telefone" class="form-control" id="inputPassword3">
                    </div>
                </div>

                <input type="submit" name="btn" class="btn btn-primary mb-2" value="Cadastrar" />
            </form>
        </div>
    </div>
</body>

</html>