<?php

  class fic{

    public $idCursoFic;
    public $area;
    public $nome;
    public $link;
    public $duracao;
    public $periodo;
    public $valor;
    public $dtInicio;
    public $dtFim;
    public $parcelas;
    public $status;





    public function __construct(){
       require_once('bd_class.php');
     }

     public function cadastrar($dados){

       $sql="insert into tbl_curso_fic ( area, nome, link, duracao, periodo, valor, dtInicio, dtFim, parcelas, status)
      values ('".$dados->area."',
              '".$dados->nome."',
              '".$dados->link."',
              '".$dados->duracao."',

              '".$dados->periodo."',
              '".$dados->valor."',
              '".$dados->dataInicio."',
              '".$dados->dataFim."',

              '".$dados->parcelas."','1'


              )";
    echo $sql;
    $conex = new Mysql_db();
    $PDO_conex = $conex->Conectar();

    if ($PDO_conex->query($sql)) {
      header("location:views/home.php?pag=fic");

    }else{
      echo "erro";
    }


  }

  public function desativarTudo(){
    $sql=" update tbl_curso_fic SET status=0 where idCursoFic > 0 ;";

    $conex = new Mysql_db();
    $PDO_conex = $conex->Conectar();

    if ($PDO_conex->query($sql)) {
      // echo $sql;
    }else{
      echo "erro";
    }
  }

}

 ?>
