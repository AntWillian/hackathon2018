<?php
  require_once("db.php");

  $conexao = connectDatabase();
  $sql = "SELECT * , DATE_FORMAT(dtInicio, '%d/%m/%Y') AS dtFormInicio , DATE_FORMAT(dtFim, '%d/%m/%Y') AS dtFormFim FROM tbl_curso_fic WHERE status = 1";
  $select = mysqli_query( $conexao , $sql );

  if( mysqli_num_rows($select) > 0 ){

    $lst_cursos = array();

    while( $curso = mysqli_fetch_assoc($select) ){
      $lst_cursos [] = $curso;
    }

    echo json_encode( $lst_cursos );
  }

?>
