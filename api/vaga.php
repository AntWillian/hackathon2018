<?php
  require_once("db.php");

  $conexao = connectDatabase();
  $sql = "";

  if( isset($_GET['idVaga']) ){
    $id = $_GET['idVaga'];
    $sql = "SELECT * ,  DATE_FORMAT(dataCadastro, '%d/%m/%Y') AS dtFormatada FROM tbl_vagas as v WHERE idVaga = $id ";

    $select = mysqli_query( $conexao , $sql );

    if( mysqli_num_rows($select) > 0 ){

      $lst_vagas = array();

      while( $vaga = mysqli_fetch_assoc($select) ){
        $lst_vagas [] = $vaga;
      }

      echo json_encode( $lst_vagas );
    }

  }


?>
