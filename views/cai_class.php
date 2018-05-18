<?php
  class Cai{

    public $nome;
    public $descricao;
    public $imagem;
    public $area;
    public $duracao;
    public $preRequisitos;
    public $link;
    public $processoSeletivo;
    public $dataInicio;
    public $dataFim;
    public $horaInicio;
    public $horaFim;
    public $idCursoCai;

    public function __construct(){
       require_once('bd_class.php');
     }

     public function Select($dados){
      $sql="select * from tbl_curso_cai where idCursoCai=".$dados->idCursoCai;
      //echo $sql;

      $conex = new Mysql_db();

      $PDO_conex = $conex->Conectar();

      $select = $PDO_conex->query($sql);



      if ($rs=$select->fetch(PDO::FETCH_ASSOC)) {
        $listTecnico = new Tecnico();



        $listTecnico->idCursoTecnico = $rs['idCursoTecnico'];

          $listTecnico->nome= $rs['nome'];
      $listTecnico->descricao= $rs['descricao'];
      $listTecnico->imagem= $rs['imagem'];
      $listTecnico->area= $rs['area'];
      $listTecnico->duracao= $rs['duracao'];
      $listTecnico->preRequisitos= $rs['preRequisitos'];
      $listTecnico->link= $rs['link'];
      $listTecnico->processoSeletivo= $rs['processoSeletivo'];
      $listTecnico->dataInicio= $rs['dtInicio'];
      $listTecnico->dataFim= $rs['dtFim'];
      $listTecnico->horaInicio= $rs['horaInicio'];
      $listTecnico->horaFim= $rs['horaFim'];
      $listTecnico->idCursoTecnico= $rs['idCursoCai'];










      }

      $conex->Desconectar();

      if (isset($listTecnico)) {
          return $listTecnico;
      }

    }

  }

 ?>
