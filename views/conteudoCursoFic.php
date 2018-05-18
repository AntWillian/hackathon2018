<?php

    if($conexao = mysql_connect('localhost', 'root', 'bcd127')){
        mysql_select_db('dbsenai');
    } else {
        echo('<script>alert("Erro ao conectar com o banco")</script>');
    }

    if(isset($_GET['modo'])){
        $modo = $_GET['modo'];
        
        if($modo == 'excluir'){
            $id = $_GET['id'];
            $sql = "DELETE FROM tbl_curso_fic WHERE idCursoFic =".$id;
            mysql_query($sql);
            header('location:?pag=fic');
        } else if($modo == 'status'){
            $id = $_GET['id'];
            $status = $_GET['status'];
            if($status == 0){
                $sql = "UPDATE tbl_curso_fic SET status = 1 WHERE idCursoFic =".$id;
            } else {
                $sql = "UPDATE tbl_curso_fic SET status = 0 WHERE idCursoFic =".$id;
            }
            mysql_query($sql);
            header('location:?pag=fic');
        }
    }

?>

<div class="padrao">
  <div class="titulo">
    <h1>Administração de Cursos > FIC</h1>
  </div>
    
    
    <div class="centralizar_form_fic">
        <div class="titulo_upload">
            <h1>Upload de Arquivo</h1>
        </div>
        <form class="" action="../router.php?controller=fic&modo=inportar" method="post" enctype="multipart/form-data">
            <input type="file" name="fleArquivo" value="" class="file_fic">
            <input type="submit" name="btnSalvar" value="Salvar" class="input_fic">
        </form>
    </div>
  <div class="centralizar">
<!--      tabela de turmas que estão com vagas abertas-->
      <div class="titulo_fic">
        Turmas em Aberto
      </div>
      <div class="contents_fic">
        <div class="linha_titulos_fic">
            <div class="caixas_maior_titulos_fic">
                Área
            </div>
            <div class="caixas_titulos_fic">
                Nome
            </div>
            <div class="caixas_titulos_fic">
                Duração
            </div>
            <div class="caixas_titulos_fic">
                Periodo
            </div>
            <div class="caixas_titulos_fic">
                Valor
            </div>
            <div class="caixas_titulos_fic">
                Parcelas
            </div>
            <div class="caixas_titulos_fic">
                Data de Inicio
            </div>
            <div class="caixas_titulos_fic">
                Opções
            </div>
        </div>
        <div class="contents_registros_fic">
            <?php
            $sql = "SELECT * FROM tbl_curso_fic WHERE status = 1";
            $cont=0;
            $result = mysql_query($sql);
          
            while($cursosAtivos = mysql_fetch_array($result)){
                   if ($cont%2==0) {
                     $cor='cor1';
                   }else {
                     $cor='cor2';
                   }
                    $cont+=1;
            ?>
            <div class="linha_registros_fic <?php echo $cor ?>">
                <div class="caixas_maior_titulos_fic">
                    <?php echo($cursosAtivos['area']); ?>
                </div>
                <div class="caixas_registros_fic">
                    <?php echo($cursosAtivos['nome']); ?>
                </div>
                <div class="caixas_registros_fic">
                    <?php echo($cursosAtivos['duracao']); ?>
                </div>
                <div class="caixas_registros_fic">
                    <?php echo($cursosAtivos['periodo']); ?>
                </div>
                <div class="caixas_registros_fic">
                    <?php echo("R$ ".$cursosAtivos['valor']); ?>
                </div>
                <div class="caixas_registros_fic">
                    <?php 
                        $valor = $cursosAtivos['valor'];
                        $parcelas = $cursosAtivos['parcelas'];
                        $valorParcela = $valor / $parcelas;
                        $texto = $parcelas." x ".$valorParcela;

                        echo($texto);

                    ?>
                </div>
                <div class="caixas_registros_fic">
                    <?php 
                        $data_inicio = implode("/", array_reverse(explode("-", $cursosAtivos['dtInicio'])));
                        echo($data_inicio);
                    ?>
                </div>
                <div class="caixas_registros_fic">
                    <a href="?pag=fic&modo=status&id=<?php echo($cursosAtivos['idCursoFic'])?>&status=<?php echo($cursosAtivos['status']);?>">
                        <img src="../imagems/ativado.png">
                    </a>
                    |
                    <a href="?pag=fic&modo=excluir&id=<?php echo($cursosAtivos['idCursoFic']);?>">
                        <img src="../imagems/deletar.png">
                    </a>
                </div>
            </div>
            <?php }?>
        </div>
      </div>
      
<!--      tabela de turmas que não estão com vagas abertas-->
      <div class="titulo_fic" id="titulo_turmas_indisp">
        Turmas Indísponiveis
      </div>
      <div class="contents_fic">
        <div class="linha_titulos_fic">
            <div class="caixas_maior_titulos_fic">
                Área
            </div>
            <div class="caixas_titulos_fic">
                Nome
            </div>
            <div class="caixas_titulos_fic">
                Duração
            </div>
            <div class="caixas_titulos_fic">
                Periodo
            </div>
            <div class="caixas_titulos_fic">
                Valor
            </div>
            <div class="caixas_titulos_fic">
                Parcelas
            </div>
            <div class="caixas_titulos_fic">
                Data de Fim
            </div>
            <div class="caixas_titulos_fic">
                Opções
            </div>
        </div>
        <div class="contents_registros_fic">
            <?php
            $sql = "SELECT * FROM tbl_curso_fic WHERE status = 0";
            $cont=0;
            $result = mysql_query($sql);
          
            while($cursosDesativados = mysql_fetch_array($result)){
                  if ($cont%2==0) {
                     $cor='cor1';
                   }else {
                     $cor='cor2';
                   }
            $cont+=1;
        ?>
            <div class="linha_registros_fic <?php echo $cor ?>">
                <div class="caixas_maior_titulos_fic">
                    <?php echo($cursosDesativados['area']); ?>
                </div>
                <div class="caixas_registros_fic">
                    <?php echo($cursosDesativados['nome']); ?>
                </div>
                <div class="caixas_registros_fic">
                    <?php echo($cursosDesativados['duracao']); ?>
                </div>
                <div class="caixas_registros_fic">
                    <?php echo($cursosDesativados['periodo']); ?>
                </div>
                <div class="caixas_registros_fic">
                    <?php echo("R$ ".$cursosDesativados['valor']); ?>
                </div>
                <div class="caixas_registros_fic">
                    <?php 
                        $valor = $cursosDesativados['valor'];
                        $parcelas = $cursosDesativados['parcelas'];
                        $valorParcela = $valor / $parcelas;
                        $texto = $parcelas." x ".$valorParcela;

                        echo($texto);

                    ?>
                </div>
                <div class="caixas_registros_fic">
                    <?php 
                        $data_fim = implode("/", array_reverse(explode("-", $cursosDesativados['dtFim'])));
                        echo($data_fim);
                    ?>
                </div>
                <div class="caixas_registros_fic">
                    <a href="?pag=fic&modo=excluir&id=<?php echo($cursosDesativados['idCursoFic'])?>">
                        <img src="../imagems/deletar.png">
                    </a>
                </div>
            </div>
            <?php }?>
        </div>
      </div>
  </div>
</div>
