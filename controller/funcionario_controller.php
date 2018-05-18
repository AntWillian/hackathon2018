<?php
  class controller_funcionario{

      Function Login(){
        $funcionario = new Funcionario;
        //Seta o usuario e senha
        $funcionario->cpf = $_POST["txtcpf"];
        $funcionario->senha = $_POST["txtsenha"];
        //Chama a função de Login
        $funcionario::Login($funcionario);
      }
  }


 ?>
