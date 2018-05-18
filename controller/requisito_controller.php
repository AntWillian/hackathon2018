<?php

  class controller_beneficio{

    public function Listar(){
       $beneficio = new Beneficio;
       return $beneficio::Listar();
     }
  }

 ?>
