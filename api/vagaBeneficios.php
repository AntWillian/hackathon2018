<?php
  require_once("db.php");

  $conexao = connectDatabase();
  $sql = "";

  if( isset($_GET['idVaga']) ){
    $id = $_GET['idVaga'];
    $sql = "SELECT * FROM tbl_beneficios WHERE idVaga = $id ;";

    $select = mysqli_query( $conexao , $sql );

    if( mysqli_num_rows($select) > 0 ){

      $lst_beneficios = array();

      while( $beneficio = mysqli_fetch_assoc($select) ){
        $lst_beneficios [] = $beneficio;
      }

      echo json_encode( $lst_beneficios );
    }

  }


?>
