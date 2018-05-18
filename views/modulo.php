<?php
function conexao(){
    $conexao = mysql_connect('localhost', 'root', 'bcd127');
    mysql_select_db('dbsenai');
}


function salvarFoto($file,$caminho){
  $erro="Erro";
    $diretorio_imagen=$caminho."/";//caminho
    $nome_do_arquivo= basename($file ['name']);
    //checando extensao
    if (strstr($nome_do_arquivo,'.jpg') || strstr($nome_do_arquivo,'.png') || strstr($nome_do_arquivo,'.jpeg')) {
        // criptografia
        $extensao = substr($nome_do_arquivo,strpos($nome_do_arquivo,"."),5);
        $prefixo = substr($nome_do_arquivo,0,strpos($nome_do_arquivo,"."));
        $nome_do_arquivo = md5($prefixo).$extensao;
        $diretorio_completo=$diretorio_imagen.$nome_do_arquivo;//caminho guardado na pasta
    //  echo $diretorio_completo;
      if (move_uploaded_file($file ['tmp_name'],$diretorio_completo)) {
          return $diretorio_completo;
      }else{
        return $erro;
      }
    }else{
      return $erro;
    }
}


function autentica( $pagina){
    $id = $_SESSION['idFuncionario'];
    $idNivel;
    $select = mysql_query("SELECT idNivel FROM tbl_funcionario WHERE idFuncionario = $id LIMIT 1" );
    if( $rs = mysql_fetch_array($select) ){
        $idNivel = $rs['idNivel'];
    }
    switch ($idNivel){
            
        case 1:
            break;
            
        default:
            
            if( $pagina == "conteudoConsultaVagas" ){
                header("location:home.php?pag=home");
            }elseif( $pagina == "conteudoFuncionario"){
                header("location:home.php?pag=home");
            }
            
            break;
            
    }
    
}

 ?>
