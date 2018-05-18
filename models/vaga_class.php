<?php
  class vaga{
    public $idVaga;
    public $empresa;
    public $cargo;
    public $LocalTrabalho;
    public $horario;
    public $salario;
    public $preRequisitos;
    public $perfilCargo;
    public $valeTransporte;
    public $valeAlimentacao;
    public $cestaBasica;
    public $seguroVida;
    public $assistenciaMedica;
    public $telefone;
    public $email;
    public $obs;
    public $endereco;
    public $dataCadastro;
    public $ativo;

    public $outros;

    public $idBeneficio;
    public $nome;

    public function __construct(){
       require_once('bd_class.php');
     }


     public function Insert($dados){
         $sql="insert into tbl_vagas ( empresa, cargo, LocalTrabalho, horario, salario,
         preRequisitos, perfilCargo, valeTransporte, valeAlimentacao,
         cestaBasica, seguroVida, assistenciaMedica, telefone,
         email, obs, endereco, dataCadastro, ativo)
        values ('".$dados->empresa."',
                '".$dados->cargo."',
                '".$dados->LocalTrabalho."',
                '".$dados->horario."',

                '".$dados->salario."',
                '".$dados->preRequisitos."',
                '".$dados->perfilCargo."',
                '".$dados->valeTransporte."',

                '".$dados->valeAlimentacao."',
                '".$dados->cestaBasica."',
                '".$dados->seguroVida."',

                '".$dados->assistenciaMedica."',
                '".$dados->telefone."',

                '".$dados->email."',
                '".$dados->obs."',
                '".$dados->endereco."',
                '".$dados->dataCadastro."',
                '0'


                )";
      echo $sql;
      $conex = new Mysql_db();
      $PDO_conex = $conex->Conectar();

      if ($PDO_conex->query($sql)) {
        $sql2="select idVaga from tbl_vagas where empresa='$dados->empresa' order by idVaga desc limit 1";

        //echo $sql2;
        $conex = new Mysql_db();

        $PDO_conex = $conex->Conectar();

        $select = $PDO_conex->query($sql2);



        if ($rs=$select->fetch(PDO::FETCH_ASSOC)) {

          echo "ttrtrrt";

          $sql3="insert into tbl_beneficios (nome, idVaga)
         values ('".$dados->outros."',
                 '".$idVaga= $rs['idVaga']."'
                 )";

//                 echo $sql3;

                 $conex = new Mysql_db();
                 $PDO_conex = $conex->Conectar();

                 if ($PDO_conex->query($sql3)) {
                   echo "<script>
           alert('Vaga cadastrada com sucesso');
           window.history.go(-1);
           </script>";
                 }

        }

        $conex->Desconectar();



      }else{
        echo "erro";
      }

     }

     public function Select($dados){
      $sql="select * from tbl_vagas where idVaga=".$dados->idVaga;

      $conex = new Mysql_db();

      $PDO_conex = $conex->Conectar();

      $select = $PDO_conex->query($sql);



      if ($rs=$select->fetch(PDO::FETCH_ASSOC)) {
        $listVagas = new vaga();



        $listVagas->idVaga = $rs['idVaga'];
        $listVagas->empresa = $rs['empresa'];
        $listVagas->cargo = $rs['cargo'];
        $listVagas->LocalTrabalho = $rs['LocalTrabalho'];

        $listVagas->horario = $rs['horario'];
        $listVagas->salario = $rs['salario'];
        $listVagas->preRequisitos = $rs['preRequisitos'];

        $listVagas->preRequisitos = $rs['preRequisitos'];
        $listVagas->perfilCargo = $rs['perfilCargo'];
        $listVagas->valeTransporte = $rs['valeTransporte'];

        $listVagas->valeAlimentacao = $rs['valeAlimentacao'];
        $listVagas->cestaBasica = $rs['cestaBasica'];
        $listVagas->seguroVida = $rs['seguroVida'];


        $listVagas->assistenciaMedica = $rs['assistenciaMedica'];
        $listVagas->telefone = $rs['telefone'];

        $listVagas->email = $rs['email'];
        $listVagas->obs = $rs['obs'];
        $listVagas->endereco = $rs['endereco'];

        $listVagas->dataCadastro = $rs['dataCadastro'];

        $listVagas->ativo = $rs['ativo'];
        $listVagas->cargo = $rs['cargo'];
        $listVagas->horario = $rs['horario'];
        
        $id = $rs['idVaga'];
        $sql_interno = "select * from tbl_beneficios where idVaga=$id";
        $select_interno = $PDO_conex->query($sql_interno);
          
        if( $rs_interno = $select_interno->fetch(PDO::FETCH_ASSOC) ){
            if( isset(  $rs_interno['idBeneficio'] ) ){
                $listVagas->idBeneficio = $rs_interno['idBeneficio'];
                $listVagas->nome = $rs_interno['nome'];
            }
                
            
        }else{
             $listVagas->idBeneficio = "";
                $listVagas->nome = "";
        }
        // $listVagas->LocalTrabalho = $rs['LocalTrabalho'];
        // $listVagas->LocalTrabalho = $rs['LocalTrabalho'];
        // $listVagas->LocalTrabalho = $rs['LocalTrabalho'];
        

      }

      $conex->Desconectar();

      if (isset($listVagas)) {
          return $listVagas;
      }

    }


    public function Select2($dados){
     $sql="select * from tbl_beneficios where idVaga=".$dados->idVaga;
     //echo $sql;

     $conex = new Mysql_db();

     $PDO_conex = $conex->Conectar();

     $select = $PDO_conex->query($sql);



     if ($rs=$select->fetch(PDO::FETCH_ASSOC)) {
       $listVagas = new vaga();


       $listVagas->idBeneficio = $rs['idBeneficio'];
       $listVagas->nome = $rs['nome'];







     }

     $conex->Desconectar();

     if (isset($listVagas)) {
         return $listVagas;
     }

   }


  }

 ?>
