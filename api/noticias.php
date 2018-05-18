<?php
  require_once("db.php");

  $conexao = connectDatabase();
  $sql = "SELECT titulo , descricao , DATE_FORMAT(dtFim , '%d/%m/%Y') AS dtFim, imagen FROM noticias WHERE NOW() between dtInicio and dtFim ORDER BY dtFim DESC";
  $select = mysqli_query( $conexao , $sql );

  if( mysqli_num_rows($select) > 0 ){

    $lst_noticias = array();

    while( $noticia = mysqli_fetch_assoc($select) ){
      $lst_noticias [] = $noticia;
    }

    echo json_encode( $lst_noticias );
  }

?>
