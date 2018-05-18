<?php
  require_once("db.php");

  $conexao = connectDatabase();
  $sql = "";

  if( isset($_GET['buscar']) ){
    $palavra = $_GET['buscar'];
    $sql = "SELECT * FROM tbl_vagas WHERE cargo like ('%$palavra%') and ativo = 1";

  }else{
    $sql = "SELECT * FROM tbl_vagas WHERE ativo = 1 LIMIT 20";
  }

  $select = mysqli_query( $conexao , $sql );

  if( mysqli_num_rows($select) > 0 ){

    $lst_vagas = array();

    while( $vaga = mysqli_fetch_assoc($select) ){
      $lst_vagas [] = $vaga;
    }

    echo json_encode( $lst_vagas );
  }

?>
