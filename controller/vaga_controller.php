<?php
  class controller_vaga{


    public function cadastrar(){
      $vaga = new vaga();
      $vaga->empresa = $_POST['TxtEmpresa'];

      $vaga->cargo = $_POST['TxtCargo'];
      $vaga->LocalTrabalho = $_POST['TxtLocalTrabalho'];
      $vaga->horario = $_POST['TxtHoarario'];

      $vaga->salario = $_POST['TxtSalario'];
      $vaga->preRequisitos = $_POST['txtRequisitos'];

      $vaga->perfilCargo = $_POST['txtPerfil'];

      if (isset($_POST['beneficiostransporte'])) {
        $vaga->valeTransporte = $_POST['beneficiostransporte'];
      }else{
        $vaga->valeTransporte = "0";
      }


      if (isset($_POST['beneficiosAlimentacao'])) {
        $vaga->valeAlimentacao = $_POST['beneficiosAlimentacao'];
      }else{
        $vaga->valeAlimentacao = "0";
      }

      if (isset($_POST['beneficiosCesta'])) {
        $vaga->cestaBasica = $_POST['beneficiosCesta'];
      }else{
        $vaga->cestaBasica = "0";
      }

      if (isset($_POST['beneficiosVida'])) {
        $vaga->seguroVida = $_POST['beneficiosVida'];
      }else{
        $vaga->seguroVida = "0";
      }

      if (isset($_POST['beneficiosMedico'])) {
        $vaga->assistenciaMedica = $_POST['beneficiosMedico'];
      }else{
        $vaga->assistenciaMedica = "0";
      }



      if (isset($_POST['txtOutros'])) {
        $vaga->outros = $_POST['txtOutros'];
      }

      $vaga->telefone = $_POST['TxtTelefone'];
      $vaga->endereco = $_POST['TxtComparecer'];
      $vaga->email = $_POST['TxtEmail'];
      $vaga->obs = $_POST['TxtObs'];
      $dataCadastro = date('Y-m-d');
      $vaga->dataCadastro = $dataCadastro;

       $vaga::Insert($vaga);
    }

    public function Buscar($idVaga){
      $vaga = new vaga();
      $idVaga=$idVaga;

      $vaga->idVaga=$idVaga;
      return $vaga::Select($vaga);

    }

    public function Buscar2($idVaga){
      $vaga = new vaga();
      $idVaga=$idVaga;

      $vaga->idVaga=$idVaga;
      return $vaga::Select2($vaga);

    }


  }

 ?>
