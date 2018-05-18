<?php
    require_once'modulo.php';
    conexao();

    session_start();

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Home</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/styleFic.css">
    <link rel="stylesheet" href="css/styleModal.css">
      <script  src="../js/jquery-3.3.1.min.js"></script>
      <link href="https://fonts.googleapis.com/css?family=Kavivanar" rel="stylesheet">



  </head>
  <body>
    <div class="principal">
      <div class="cabecalho_container">
          <?php
            $sql = "SELECT * FROM tbl_funcionario WHERE idFuncionario =".$_SESSION['idFuncionario'];
          
            $result = mysql_query($sql);
          
            if($usuario = mysql_fetch_array($result)){
          ?>
          <div class="cabecalho">
             <div class="centralizar_cabecalho">
                <div class="content_info_usuarios">
                    <div class="foto_usuario">
                        <img src="<?php echo($usuario['imagem']);?>">
                    </div>
                    <div class="info_usuario">
                        <p><?php echo($usuario['nome']);?></p>
                        <div class="sair_btn">
                              <a href="../index.php?out=1">Sair</a>
                        </div>
                    </div>
                  </div>
                  <div class="logo_instituicao">

                  </div>
              </div>
          </div>
          <?php } ?>
        </div>
          

      <div class="conteudo_container">
          <div class="conteudo">
              <div class="menu">

                <!-- Menu -->

                  <div class="titulo_menu">
                      <p>Cms</p>
                  </div>
                  <div class="item_menu">
                    <p><a href="?pag=home">Home</a></p>
                  </div>

                  <div class="titulo_menu">
                      <p>Cursos</p>
                  </div>
                  <div class="item_menu">
                    <p><a href="?pag=Tecnico">Tecnico</a></p>
                  </div>


                  <div class="item_menu">
                    <p><a href="?pag=cai">CAI</a></p>
                  </div>

                  <div class="item_menu">
                    <p><a href="?pag=fic">FIC</a></p>
                  </div>

                  <div class="titulo_menu">
                      <p>Vagas</p>
                  </div>
                  <div class="item_menu">
                    <p><a href="?pag=vagas">Nova Vaga</a></p>
                  </div>

                  <div class="item_menu">
                    <p><a href="?pag=Consultavagas">Consultar Vagas</a></p>
                  </div>

                  <div class="titulo_menu">
                        <p><a href="?pag=noticias">Noticias</a></p>
                  </div>

                  <div class="titulo_menu">
                        <p><a href="?pag=funcionarios">Funcionários</a></p>
                  </div>




              </div>

              <div class="dados_principal">
                <?php

              // if (isset($_GET['pag'])) {
              //   $pag = $_GET['pag'];
              // }else{
              //   $pag="home";
              // }
              $pag = $_GET['pag'];
              switch ($pag) {
                case 'home':
                  require_once 'conteudoHome.php';
                  break;

                  case 'Tecnico':
                    require_once 'conteudoCursoTecnico.php';
                    break;

                  case 'fic':
                    require_once 'conteudoCursoFic.php';
                    break;

                  case 'cai':
                    require_once 'conteudoCursoCai.php';
                    break;

                  case 'noticias':
                    require_once 'conteudoNoticias.php';
                    break;

                  case 'funcionarios':
                    require_once 'conteudoFuncionarios.php';
                    break;

                  case 'vagas':
                    require_once 'conteudoVaga.php';
                    break;
                
                  case 'Consultavagas':
                    require_once 'conteudoConsultaVagas.php';
                    break;
                }


       ?>
              </div>
          </div>
      </div>



    </div>
  </body>
</html>
