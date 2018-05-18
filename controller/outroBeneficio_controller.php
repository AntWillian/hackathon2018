<?php
   class outrosBeneficio{

     public function cadastrar($dados){
       require_once("../outroBeneficio.php");

       $outros = new outroBeneficio;

       $outros=$dados->idVaga;

       $outros::cadastrar($outros);

     }
   }

 ?>
