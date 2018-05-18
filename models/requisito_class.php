<?php

  class Beneficio{

    public $idBeneficio;
    public $nome;
    public $idVaga;

    public function __construct(){
       require_once('bd_class.php');
     }

     public function Listar() {
       $sql="select * from tbl_beneficios order by idBeneficio desc";

      $con=new Mysql_db();
      //Faz a conexão com o banco
      $pdoCon = $con->Conectar();

      //Executa o select no DB e guarda o retorno na variável select
      $select = $pdoCon->query($sql);

      $indice = 0;

      while($rs=$select->fetch(PDO::FETCH_ASSOC)){
        $list_bebeficio[] = new Beneficio;

        $list_bebeficio[$indice]->idBeneficio = $rs['idBeneficio'];
        $list_servico[$indice]->nome = $rs['nome'];

        $indice+=1;
      }

      $con->Desconectar();

      if (isset($list_bebeficio)){
        var_dump($list_bebeficio);
        return $list_bebeficio;
      }
     }


  }

 ?>
