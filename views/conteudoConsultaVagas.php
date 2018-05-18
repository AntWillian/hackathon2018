<?php

    require_once'modulo.php';
    conexao();
    
    if(isset($_GET['modo'])){
        $modo = $_GET['modo'];
        
        if($modo == 'excluir'){
            $id = $_GET['id'];
            $sql_beneficios = "DELETE FROM tbl_beneficios WHERE idVaga =".$id;
            mysql_query($sql_beneficios);
            $sql = "DELETE FROM tbl_vagas WHERE idVaga =".$id;
            mysql_query($sql);
        } else if ($modo == 'status'){
            $id = $_GET['id'];
            $status = $_GET['status'];
            
            if($status == 1){
                $sql = "UPDATE tbl_vagas SET ativo = 0 WHERE idVaga = ".$id;
            } else {
                $sql = "UPDATE tbl_vagas SET ativo = 1 WHERE idVaga = ".$id;
            }
            mysql_query($sql);
            
        }
    }
    
    autentica("conteudoConsultaVagas");

?>

<script>
      $(document).ready(function () {

        //Efeito para abrir a div Container com timer de 2 segundos (Novo Registro)
        $(".vagas").click(function(){
           $(".modalContainer_vagas").slideToggle(2000);

        });



      });

      function vagas(idItem){
          $.ajax({
            type: "GET",
            url: "visualizarVagas.php",
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

<div class="centralizar">
<!--      tabela de turmas que estão com vagas abertas-->
      <div class="titulo_fic">
        Vagas em Aberto
      </div>
      <div class="contents_fic">
        <div class="linha_titulos_fic">
            <div class="caixas_maior_titulos_fic">
                Empresa
            </div>
            <div class="caixas_titulos_fic">
                Cargo
            </div>
            <div class="caixas_titulos_fic">
                Local
            </div>
            <div class="caixas_titulos_fic">
                Salário
            </div>
            <div class="caixas_titulos_fic">
                Horário
            </div>
            <div class="caixas_titulos_fic">
                Telefone
            </div>
            <div class="caixas_titulos_fic">
                Data de Cadastro
            </div>
            <div class="caixas_titulos_fic">
                Opções
            </div>
        </div>
        <div class="contents_registros_fic">
            <?php
            $sql = "SELECT * FROM tbl_vagas order by idVaga desc";
            $cont=0;
            $result = mysql_query($sql);

            while($vagas = mysql_fetch_array($result)){
                   if ($cont%2==0) {
                     $cor='cor1';
                   }else {
                     $cor='cor2';
                   }
                    $cont+=1;
                
                if($vagas['ativo'] == 1){
                    $imgAtivo = "ativado.png";
                } else {
                    $imgAtivo = "desativado.png";
                }
            ?>
            <div class="linha_registros_fic <?php echo $cor ?>">
                <div class="caixas_maior_titulos_fic">
                    <?php echo($vagas['empresa']);?>
                </div>
                <div class="caixas_registros_fic">
                    <?php echo($vagas['cargo']);?>
                </div>
                <div class="caixas_registros_fic">
                    <?php echo($vagas['LocalTrabalho']);?>
                </div>
                <div class="caixas_registros_fic">
                    <?php echo($vagas['salario']);?>
                </div>
                <div class="caixas_registros_fic">
                    <?php echo($vagas['horario']);?>
                </div>
                <div class="caixas_registros_fic">
                    <?php echo($vagas['telefone']);?>
                </div>
                <div class="caixas_registros_fic">
                    <?php echo($vagas['dataCadastro']);?>
                </div>
                <div class="caixas_registros_fic">
                    <a href="?pag=Consultavagas&modo=status&id=<?php echo($vagas['idVaga'])?>&status=<?php echo($vagas['ativo']);?>">
                        <img src="../imagems/<?= $imgAtivo ?>">
                    </a>
                    |
                    <a href="?pag=Consultavagas&modo=excluir&id=<?php echo($vagas['idVaga']);?>">
                        <img src="../imagems/deletar.png">
                    </a>
                    |
                    <!-- |href="?pag=Consultavagas&modo=visualizar&id=<?php echo($vagas['idVaga']);?>" -->
                    <a class="vagas" onclick=vagas(<?php echo($vagas['idVaga'])?>)>
                        <img src="../imagems/visualizar.png">
                    </a>
                </div>
            </div>
            <?php }?>
        </div>
      </div>
  </div>
