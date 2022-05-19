<?php

abstract class BancoDados{

    const  host = 'localhost';
    const dbname = 'contatos';
    const user = 'root';
    const password = '';


    static function conectar(){
         try {
            $pdo = new PDO("mysql:
             host=".self::host.";
             dbname=".self::dbname.";
             charset=utf8",
             self::user,
             self::password);
             $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
             return $pdo;
         } catch (PDOException $e) {
             echo "Error : ".$e->getMessage();
         }
    }
}
$conexao = BancoDados::conectar();
if($conexao){
  // echo "conectado!";
}

abstract class Cadastrar{
   static function Cliente($nome,$sobrenome,$cpf,$email,$telefone){
       try {
        $conexao= BancoDados::conectar();
        $inserir = $conexao->prepare('INSERT INTO agenda (nome,sobrenome,cpf,email,telefone)VALUES(:nome,:sobrenome,:cpf,:email,:telefone)');
        $inserir->bindValue(':nome',$nome);
        $inserir->bindValue(':sobrenome',$sobrenome);
        $inserir->bindValue(':cpf',$cpf);
        $inserir->bindValue(':email',$email);
        $inserir->bindValue(':telefone',$telefone);
        $inserir->execute();

           return $inserir;
       } catch (PDOException $e) {
        echo "Error : ".$e->getMessage();
    }
   }
}
//======================TESTE CADASTRAR====================================
/*
$adiocinar = Cadastrar::Cliente('Felipe','mergulhão','37003924860','Femergulha@hotmail.com','965109143');
if($adiocinar){
   return $retorna =[
       'Error'=>false,
       'mensagem'=>'Cliente cadastrado com Sucesso!',
   ];
}else{
 return $retorna =[
     'Error'=>true,
     'mensagem'=>'Cliente não cadastrado com Sucesso!',
 ];
 echo json_encode($retorna);
}
*/
//============================================================

abstract class Listar{
   static function Clientes(){
         try {
           $conexao=BancoDados::conectar();
           $listar = $conexao->prepare('SELECT * FROM agenda');
           $listar->execute();
           $listar = $listar->fetchAll(PDO::FETCH_OBJ);
           return $listar;   
         }catch (PDOException $e) {
            echo "Error : ".$e->getMessage();
        }
   }

   static function ClienteUnico($id){
    try {
        $conexao=BancoDados::conectar();
        $listar = $conexao->prepare('SELECT * FROM agenda WHERE id = :id');
        $listar->bindValue(':id',$id);
        $listar->execute();
        $listar = $listar->fetch(PDO::FETCH_OBJ);
        return $listar;   
      }catch (PDOException $e) {
         echo "Error : ".$e->getMessage();
     }
   }
}
//====================TESTE LISTAR=========================
$clientes = Listar::Clientes();

//print_r($clientes);
/*
 foreach($clientes as $cliente){
   echo $cliente->nome."<br>";
   echo $cliente->sobrenome."<br>";
   echo $cliente->cpf."<br>";
   echo $cliente->email."<br>";
   echo $cliente->telefone."<br>";
   echo"<hr>";
   
 }
 */
/*
echo"<hr>";
echo "Listar um Unico contato <br>";
$cliente = Listar::ClienteUnico(6);
echo $cliente->id; 
print_r($cliente);

*/
//====================================================

abstract class Atualizar{
static function Cliente($id,$nome,$sobrenome,$cpf,$email,$telefone){
    try {
    $conexao=BancoDados::conectar();//(nome,sobrenome,cpf,email,telefone
    $update = $conexao->prepare("UPDATE agenda SET  nome = :nome,sobrenome = :sobrenome, cpf = :cpf,  email = :email, telefone = :telefone WHERE id = :id");
        $update->bindValue(':id',$id);
        $update->bindValue(':nome',$nome);
        $update->bindValue(':sobrenome',$sobrenome);
        $update->bindValue(':cpf',$cpf);
        $update->bindValue(':email',$email);
        $update->bindValue(':telefone',$telefone);
    $update->execute();
    
    return $update;
        }catch (PDOException $e) {
            echo "Error : ".$e->getMessage();
        }
  }
}
//====================================TESTE ATUALIZAR========================================


// $update = Atualizar::Cliente(6,'Felipe 1','mergulhão1','37003924860','Fe@hotmail.com','965109141');

// if($update){
///   echo"Atualizado Com sucesso";
// }

//===========================================================================================

abstract class Delete{
    static function cliente($id){
        try {
            $conexao=BancoDados::conectar();
            $delete = $conexao->prepare("DELETE FROM agenda WHERE id = :id");
            $delete->bindValue(':id',$id);
            $delete->execute();
        }catch (PDOException $e) {
            echo "Error : ".$e->getMessage();
        }
    }
}

 $delete = Delete::cliente(5);

 if($delete){
   echo"Apagado Com sucesso";
  }




?>