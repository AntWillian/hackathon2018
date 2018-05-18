<?php

    if($conexao = mysql_connect('localhost', 'root', 'bcd127')){
        mysql_select_db('dbsenai');
    } else {
        echo('<script>alert("Erro ao conectar com o banco")</script>');
    }

    $id = "";
    $nome = "";
    $descricao = "";
    $area = "";
    $duracao = "";
    $preRequisitos = "";
    $link = "";
    $processoSeletivo = "";
    $dataInicio = "";
    $dataFim = "";
    $horaInicio = "";
    $horaFim = "";
    $imagem="";
    $botao = "Salvar";

    $require = "required";

    if(isset($_GET['btnSalvar'])){
        $nome = $_POST['txtNome'];
        $descricao = $_POST['txtDescricao'];
        $area = $_POST['txtArea'];
        $duracao = $_POST['txtDuracao'];
        $preRequisitos = $_POST['txtPreRequisitos'];
        $link = $_POST['txtLink'];
        $horaInicio = $_POST['txtHoraInicio'];
        $dataInicio = $_POST['txtDataInicio'];
        $horaFim = $_POST['txtHoraFim'];
        $dataFim = $_POST['txtDataFim'];
        $processoSeletivo = 0;

//        chamando classe modulo que realiza o upload
        require_once 'modulo.php';
        if(!empty($_FILES['flImagem']['name'])){
            $imagem_file = true;
            $diretorio_completo=salvarFoto($_FILES['flImagem'], 'imagemTecnico');
            if($diretorio_completo == "Erro"){
                echo("
                    <script>
                        alert('arquivo não movido');
                    </script>");
                $MovUpload=false;
            } else {
                $MovUpload =true;
            }
        } else {
            $imagem_file = false;
        }

        if($_GET['btnSalvar'] == 'Salvar'){
            $sql = "INSERT INTO tbl_curso_tecnico (nome, descricao, area, duracao, preRequisitos, link, processoSeletivo, dtInicio, dtFim, horaInicio, horaFim, imagem) ";
            $sql .= "VALUES ('".$nome."', '".$descricao."', '".$area."', '".$duracao."', '".$preRequisitos."', '".$link."', '".$processoSeletivo."', '".$dataInicio."', '".$dataFim."', '".$horaInicio."', '".$horaFim."', '".$diretorio_completo."')";
//            echo($sql);
        } else if($_GET['btnSalvar'] == 'Editar'){

            if($imagem_file == true && $MovUpload == true){
                $sql = "UPDATE tbl_curso_tecnico SET
                nome = '".$nome."',
                descricao = '".$descricao."',
                area = '".$area."',
                duracao = '".$duracao."',
                preRequisitos = '".$preRequisitos."',
                link = '".$link."',
                processoSeletivo = '".$processoSeletivo."',
                dtInicio = '".$dataInicio."',
                dtFim = '".$dataFim."',
                horaInicio = '".$horaInicio."',
                horaFim = '".$horaFim."',
                imagem = '".$diretorio_completo."'
                WHERE idCursoTecnico = ".$_SESSION['idSessao'];
            } else {
                $sql = "UPDATE tbl_curso_tecnico SET
                nome = '".$nome."',
                descricao = '".$descricao."',
                area = '".$area."',
                duracao = '".$duracao."',
                preRequisitos = '".$preRequisitos."',
                link = '".$link."',
                processoSeletivo = '".$processoSeletivo."',
                dtInicio = '".$dataInicio."',
                dtFim = '".$dataFim."',
                horaInicio = '".$horaInicio."',
                horaFim = '".$horaFim."'
                WHERE idCursoTecnico = ".$_SESSION['idSessao'];
            }
        }
       // echo($sql);
        mysql_query($sql);
        header('location:?pag=Tecnico');
    }

    if(isset($_GET['modo'])){
        $modo = $_GET['modo'];

        if($modo == 'excluir'){
            $id = $_GET['id'];
            $sql = "DELETE FROM tbl_curso_tecnico WHERE idCursoTecnico =".$id;
            mysql_query($sql);
        } else if($modo == 'consultar'){
            $required = "";
            $id = $_GET['id'];
            //echo $id;
            $sql = "SELECT * FROM tbl_curso_tecnico WHERE idCursoTecnico =".$id;


            $result = mysql_query($sql);

            if($curso = mysql_fetch_array($result)){
               $id = $curso['idCursoTecnico'];
               $_SESSION['idSessao'] = $id;

                $nome = $curso['nome'];
                $descricao = $curso['descricao'];
                $imagem = $curso['imagem'];
                $area = $curso['area'];
                $duracao = $curso['duracao'];
                $preRequisitos = $curso['preRequisitos'];
                $link = $curso['link'];
                $processoSeletivo = $curso['processoSeletivo'];

//                data vindo do banco no estilo americano
//                esse codigo reverte para o padrão brasileiro
                $dataInicio =implode("-",array_reverse(explode("/",$curso['dtInicio']))) ;
//                echo $dataInicio;
                $dataFim = implode("-",array_reverse(explode("/",$curso['dtFim'])));
//                echo $dataFim;
                $horaInicio = $curso['horaInicio'];
                $horaFim = $curso['horaFim'];
                $botao = 'Editar';
            }
        } else if ($modo == 'status'){
            $id = $_GET['id'];
            $status = $_GET['status'];

            if($status == 1){
                $sql = "UPDATE tbl_curso_tecnico SET processoSeletivo = 0 WHERE idCursoTecnico =".$id;
            } else {
                $sql = "UPDATE tbl_curso_tecnico SET processoSeletivo = 1 WHERE idCursoTecnico =".$id;
            }
//            echo $sql;
            mysql_query($sql);
        }
    }




?>


<script>
      $(document).ready(function () {


        //Efeito para abrir a div Container com timer de 2 segundos (Novo Registro)
        $(".Tecnico").click(function(){
           $(".modalContainer_vagas").slideToggle(2000);

        });



      });

      function Tecnico(idItem){
          $.ajax({
            type: "GET",
            url: "visualizarCursoTecnico.php",
            data: {modo:'buscarId',id:idItem},
            success: function(dados){
                  $('.modal_vaga').html(dados);
              }
          });

      //     function Editar(idItem){
      //
      //   $.ajax({
      //     type: "GET",
      //     url: "visualizarVagas.php",
      //     data: {modo:'buscarId',id:idItem},
      //     success: function(dados){
      //       $('.modal').html(dados);
      //     }
      //
      //   });
      // }
      }


  </script>
<div class="modalContainer_vagas">
        <div class="modal_vaga">

        </div>
    </div>

<div class="padrao">
  <div class="titulo">
    <h1>Administrção de Cursos > Técnico</h1>
  </div>

  <div class="contents">
    <div class="titulo_contents">
      <h1>Cursos Cadastrados</h1>
    </div>

    <div class="content_tabela">
      <div class="linha_titulos">
        <div class="caixas_titulos">
          Nome
        </div>
        <div class="caixas_titulos">
          Duração
        </div>
        <div class="caixas_titulos">
          Data de Inicio e Fim
        </div>
        <div class="caixas_titulos">
          Processo Seletivo
        </div>
        <div class="caixas_titulos">
          Opções
        </div>
      </div>
      <div class="content_registros">
          <?php
            $sql = "SELECT * FROM tbl_curso_tecnico order by idCursoTecnico desc";

            $result = mysql_query($sql);
            $cont=0;
            while($cursos = mysql_fetch_array($result)){

                  if ($cont%2==0) {
                     $cor='cor1';
                   }else {
                     $cor='cor2';
                   }

                   $cont+=1;

                if($cursos['processoSeletivo'] == 1){
                    $imgStatus = "ativado.png";
                } else {
                    $imgStatus = "desativado.png";
                }




                    ?>


              <div class="linha_registros <?php echo $cor ?> ">
                <div class="caixas_registros">
                    <?php echo($cursos['nome']); ?>
                </div>
                <div class="caixas_registros">
                    <?php echo($cursos['duracao']); ?>
                </div>
                <div class="caixas_registros">
                    <?php echo( implode("/",array_reverse(explode("-",$cursos['dtInicio'])))); ?>
                </div>
                <div class="caixas_registros">
                    <?php echo($cursos['processoSeletivo']); ?>
                </div>
                <div class="caixas_registros">
                    <a href="#" class="Tecnico" onclick=Tecnico(<?php echo($cursos['idCursoTecnico'])?>)>
                        <img src="../imagems/visualizar.png">
                    </a>
                    |
                    <a href="?pag=Tecnico&modo=consultar&id=<?php echo($cursos['idCursoTecnico'])?>">
                        <img src="../imagems/editar.png">
                    </a>
                    |
                    <a href="?pag=Tecnico&modo=excluir&id=<?php echo($cursos['idCursoTecnico'])?>">
                        <img src="../imagems/deletar.png">
                    </a>
                    |
                    <a href="?pag=Tecnico&modo=status&id=<?php echo($cursos['idCursoTecnico'])?>&status=<?php echo($cursos['processoSeletivo'])?>">
                        <img src="../imagems/<?php echo($imgStatus);?>">
                    </a>
                </div>
              </div>
          <?php } ?>
      </div>
    </div>
  </div>
  <div class="contents">
    <div class="titulo_contents">
      <h1>Novo Curso</h1>
    </div>
    <div class="content_form">
        <form name="frmCadastroCursoTecnico" method="post" action="?pag=Tecnico&btnSalvar=<?php echo($botao);?>" enctype="multipart/form-data">
            <div class="segura_upload">
                <div>
                    <h1>Upload da foto</h1>
                </div>
                <div class="segura_preview">
                    <div class="preview_img">
                        <img id="img" src="<?php echo($imagem);?>">
                    </div>
                </div>
                <div class="filePost">
                    <input id="upload" type="file" name="flImagem" <?= $required ?> >
                </div>
            </div>
            <div class="linhas_campos">
                <div class="campos" id="campo_nomeCurso">
                    <div class="titulos_campos">
                        Nome do Curso
                    </div>
                    <input type="text" name="txtNome" id="txtNome" placeholder="Nome do curso..." value="<?php echo($nome);?>" required maxlength="45">
                </div>
                <div class="campos" id="campo_descricao">
                    <div class="titulos_campos">
                        Descrição do Curso
                    </div>
                    <textarea type="text" name="txtDescricao" id="txtDescricao" placeholder="Descrição do curso..." required><?php echo($descricao);?></textarea>
                </div>
            </div>
            <div class="linhas_campos">
                <div class="campos">
                    <div class="titulos_campos">
                        Área
                    </div>
                    <input type="text" name="txtArea" id="txtArea" placeholder="Área do curso..." value="<?php echo($area);?>" required maxlength="45">
                </div>
                <div class="campos" id="campo_duracao">
                    <div class="titulos_campos">
                        Duração (em Horas)
                    </div>
                    <input type="text" name="txtDuracao" id="txtDuracao" placeholder="Duração do curso..." class="inputs_menores" value="<?php echo($duracao);?>" maxlength="45" required>
                </div>
                <div class="campos" id="campo_preRequisitos">
                    <div class="titulos_campos">
                        Pré Requisitos
                    </div>
                    <textarea type="text" name="txtPreRequisitos" id="txtPreRequisitos" placeholder="Pré requisitos do curso..." required><?php echo($preRequisitos);?></textarea>
                </div>
            </div>
            <div class="linhas_campos">
                <div class="campos" id="campo_link">
                    <div class="titulos_campos">
                        Link da Página
                    </div>
                    <input type="url" name="txtLink" id="txtLink" placeholder="Ex: http://www.senai.com.br/processoseletivo" value="<?php echo($link);?>" maxlength="255" required>
                </div>
            </div>
            <div class="linhas_campos">
                <div class="campos_horas">
                    <div class="titulos_campos">
                        Hora de inicio
                    </div>
                    <input type="text" name="txtHoraInicio" id="txtHoraInicio" class="inputs_menores" value="<?php echo($horaInicio);?>" placeholder="Ex: 14h" required maxlength="3">
                </div>
                <div class="campos_datas">
                    <div class="titulos_campos">
                        Data de Inicio
                    </div>
                    <input type="date" name="txtDataInicio" id="txtDataInicio" class="inputs_menores" value="<?php echo($dataInicio);?>" required>
                </div>
                <div class="campos_horas">
                    <div class="titulos_campos">
                        Hora de Fim
                    </div>
                    <input type="text" name="txtHoraFim" id="txtHoraFim" placeholder="Ex: 14h" class="inputs_menores" value="<?php echo($horaFim);?>" required maxlength="3">
                </div>
                <div class="campos_datas">
                    <div class="titulos_campos">
                        Data de Fim
                    </div>
                    <input type="date" name="txtDataFim" id="txtDataFim" class="inputs_menores" value="<?php echo($dataFim);?>" required>
                </div>
            </div>
            <div class="linhas_campos">
                <input type="submit" name="btnSalvar" value="<?php echo($botao);?>" class="botoes">
                <input type="reset" name="btnLimpar" value="Limpar Campos" class="botoes">
            </div>
        </form>
    </div>
  </div>
</div>
<script  src="../js/preview.js"></script>
