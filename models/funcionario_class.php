<?php

  class Funcionario{

    public $idFuncionario;
    public $nome;
     public $idNivel;
     public $cpf;
     public $senha;

     public function __construct(){
        require_once('bd_class.php');
      }


    //Função de login
    public function Login($_funcionario){
      session_start();

      addslashes($sql="CALL loginFuncionario('$_funcionario->cpf', '$_funcionario->senha', @_idFuncionario);");

      $con=new Mysql_db();
      $pdoCon = $con->Conectar();

      $pdoCon->query($sql);


      addslashes($sql="select @_idFuncionario as idFuncionario;");
      $select = $pdoCon->query($sql);
      $idFuncionario = 0;

      if($rs=$select->fetch(PDO::FETCH_ASSOC)){

        $idFuncionario = $rs['idFuncionario'];
      }

      $con->Desconectar();

      if ($idFuncionario > 0) {
        $_SESSION['idFuncionario'] = $idFuncionario;
        header('location:index.php');
      }else {
        echo('<script> alert("Falha na autenticação!");
        window.location.href = "index.php"</script>');
      }

    }
  }

 ?>
