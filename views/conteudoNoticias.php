<?php

    if( $conexao = mysql_connect('localhost', 'root', 'bcd127')){
        mysql_select_db('dbsenai');
    } else {
        echo('<script>alert("Erro ao conectar com o banco")</script>');
    }

    $idNoticia = "";
    $titulo = "";
    $descricao = "";
    $dtInicio = "";
    $dtFim = "";
    $imagen="";
    $botao = "Salvar";

    if(isset($_GET['btnSalvar'])){
        $titulo = $_POST['txtTitulo'];
        $descricao = $_POST['txtDescricao'];
        $dtInicio = $_POST["txtDtInicio"];
        $dtFim = $_POST["txtDtFim"];

        //  echo("teste");
        require_once 'modulo.php';
         if (!empty($_FILES['flImagen']['name'])){
            $imagem_file = true;
            $diretorio_completo=salvarFoto($_FILES['flImagen'],'imagenNoticia');
            if ($diretorio_completo == "Erro") {
                  echo "<script>
                      alert('arquivo nao movido');

                      </script>";
                    $MovUpload=false;
              }else{
                    $MovUpload=true;
              }
          }else {
              $imagem_file = false;
          }

        if($_GET['btnSalvar'] == 'Salvar'){
            $sql = "INSERT INTO noticias (titulo, descricao, dtInicio, dtFim,imagen) ";
            $sql .= "VALUES ('".$titulo."', '".$descricao."', '".$dtInicio."', '".$dtFim."','".$diretorio_completo."')";
            echo($sql);
        } else if($_GET['btnSalvar'] == "Editar"){

          if ($imagem_file == true && $MovUpload==true) {
            $sql = "UPDATE noticias SET
            titulo = '".$titulo."',
            descricao = '".$descricao."',
            dtInicio = '".$dtInicio."',
            dtFim = '".$dtFim."',
            imagen = '".$diretorio_completo."'
            WHERE idNoticia = ".$_SESSION['idSessao'];
          }else{
            $sql = "UPDATE noticias SET
            titulo = '".$titulo."',
            descricao = '".$descricao."',
            dtInicio = '".$dtInicio."',
            dtFim = '".$dtFim."'
            WHERE idNoticia = ".$_SESSION['idSessao'];
          }

        }

        echo $sql;
        mysql_query($sql);
        header('location:?pag=noticias');
    }

    if(isset($_GET['modo'])){
        $modo = $_GET['modo'];

        if($modo == "excluir"){
            $id = $_GET['id'];
            $sql = "DELETE FROM noticias WHERE idNoticia =".$id;
            mysql_query($sql);
        } else if($modo == "consultar"){
            $id = $_GET['id'];
            $sql = "SELECT * FROM noticias WHERE idNoticia =".$id;

            $result = mysql_query($sql);

            if($noticia = mysql_fetch_array($result)){
                $id = $noticia['idNoticia'];
                $_SESSION['idSessao'] = $id;

                $titulo = $noticia['titulo'];
                $descricao = $noticia['descricao'];
                $imagen = $noticia['imagen'];
//                data vindo do banco no estilo americano
//                esse codigo reverte para o padrão brasileiro
                $dtInicio = implode("-", array_reverse(explode("/", $noticia['dtInicio'])));
                $dtFim = implode("-", array_reverse(explode("/", $noticia['dtFim'])));
                $botao = "Editar";
            }
        }
    }



?>

<div class="padrao">
    <div class="titulo">
        <h1>Administração de Noticias</h1>
    </div>
    <div class="contents">
        <div class="titulo_contents">
          <h1>Nova Noticia</h1>
        </div>
        <div class="content_form">
            <form name="frmCadastroNoticias" method="post" action="?pag=noticias&btnSalvar=<?php echo($botao);?>" enctype="multipart/form-data">
                <div class="segura_upload">
                    <div>
                        <h1>Upload da foto</h1>
                    </div>
                    <div class="segura_preview">
                        <div class="preview_img">
                            <img id="img" src="<?php echo($imagen);?>">
                        </div>
                    </div>
                    <div class="filePost">
                        <input id="upload" type="file" name="flImagem">
                    </div>
                </div>

                <div class="linhas_campos">
                    <div class="campos" id="campo_tituloNoticias">
                        <div class="titulos_campos">
                            Titulo
                        </div>
                        <input type="text" name="txtTitulo" id="txtTitulo" placeholder="Titulo da noticia..." value="<?php echo($titulo);?>" maxlength="255" required>
                    </div>
                    <div class="campos" id="campo_descricaoNoticias">
                        <div class="titulos_campos">
                            Descrição da Noticia
                        </div>
                        <textarea type="text" name="txtDescricao" id="txtDescricao" placeholder="Descrição da noticia..." required><?php echo($descricao);?></textarea>
                    </div>
                </div>
                <div class="linhas_campos">
                    <div class="campos_datas">
                        <div class="titulos_campos">
                            Data de Inicio
                        </div>
                        <input type="date" name="txtDtInicio" id="txtDtInicio" class="inputs_menores" value="<?php echo($dtInicio);?>" required>
                    </div>
                    <div class="campos_datas">
                        <div class="titulos_campos">
                            Data de Fim
                        </div>
                        <input type="date" name="txtDtFim" id="txtDtFim" class="inputs_menores" value="<?php echo($dtFim);?>" required>
                    </div>
                </div>
                <div class="linhas_campos">
                    <input type="submit" name="btnSalvar" value="<?php echo($botao);?>" class="botoes">
                    <input type="reset" name="btnLimpar" value="Limpar Campos" class="botoes">
                </div>
            </form>
        </div>
    </div>
    <div class="contents">
        <div class="titulo_contents">
          <h1>Noticias Cadastradas</h1>
        </div>

        <div class="content_tabela">
          <div class="linha_titulos">
            <div class="caixas_titulos">
              Titulo
            </div>
            <div class="caixas_titulos">
              Descrção
            </div>
            <div class="caixas_titulos">
              Data de Inicio
            </div>
            <div class="caixas_titulos">
              Data de Fim
            </div>
            <div class="caixas_titulos">
              Opções
            </div>
          </div>
          <div class="content_registros">
              <?php
                $sql = "SELECT * FROM noticias order by idNoticia desc";
                $cont=0;
                $result = mysql_query($sql);
                while($noticias = mysql_fetch_array($result)){




                      if ($cont%2==0) {
                         $cor='cor1';
                       }else {
                         $cor='cor2';
                       }

                       $cont+=1;


                        ?>

                        <?php  ?>
                  <div class="linha_registros <?php echo $cor  ?>">
                    <div class="caixas_registros">
                        <?php echo($noticias['titulo']);?>
                    </div>
                    <div class="caixas_registros">
                        <?php echo($noticias['descricao']);?>
                    </div>
                    <div class="caixas_registros">
                        <?php echo( implode("/",array_reverse(explode("-",$noticias['dtInicio'])))); ?>
                    </div>
                    <div class="caixas_registros">
                        <?php echo( implode("/",array_reverse(explode("-",$noticias['dtFim'])))); ?>
                    </div>
                    <div class="caixas_registros">
                        <a href="?pag=noticias&modo=consultar&id=<?php echo($noticias['idNoticia'])?>">
                            <img src="../imagems/editar.png">
                        </a>
                        |
                        <a href="?pag=noticias&modo=excluir&id=<?php echo($noticias['idNoticia'])?>">
                            <img src="../imagems/deletar.png">
                        </a>
                    </div>
                  </div>
              <?php

            } ?>
          </div>
        </div>
      </div>
  </div>
  <script  src="../js/preview.js"></script>
