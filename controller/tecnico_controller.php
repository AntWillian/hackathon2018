<?php

  class controller_tecnico{

    public function Buscar($idTecnico){
      $Tecnico = new Tecnico();
      $idTecnico=$idTecnico;

      //echo $idTecnico;
      $Tecnico->idTecnico=$idTecnico;
      return $Tecnico::Select($Tecnico);

    }



  }

 ?>
