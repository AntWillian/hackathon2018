<?php

  class controller_cai{

    public function Buscar($idCai){
      $Cai= new Cai();
      $idCursoCai=$idCai;

      //echo $idCai;
      $Cai->idCursoCai=$idCai;
      return $Cai::Select($Cai);

    }

  }

 ?>
