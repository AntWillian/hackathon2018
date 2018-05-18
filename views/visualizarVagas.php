<script>
$(".fechar").click(function() {
    //$(".modalContainer").fadeOut();
  $(".modalContainer_vagas").slideToggle(500);
  });

</script>


<?php
if(isset($_GET['modo'])){

    $modo=$_GET['modo'];

    if ($modo == "buscarId") {
      $id=$_GET['id'];

      //echo $modo;

      require_once('../controller/vaga_controller.php');
      require_once('../models/vaga_class.php');

      //instacia a controller
      //Passa o id para a controller
      $controller_vaga = new controller_vaga();
      $retornoModel = $controller_vaga :: Buscar($id);

      // var_dump($retornoModel);

      $idVaga=$retornoModel->idVaga ;
       $empresa=$retornoModel->empresa ;
      $cargo=$retornoModel->cargo;
      $LocalTrabalho=$retornoModel->LocalTrabalho ;
      $horario=$retornoModel->horario ;
      $salario=$retornoModel->salario ;
      $preRequisitos=$retornoModel->preRequisitos ;
      $preRequisitos=$retornoModel->preRequisitos ;
      $perfilCargo=$retornoModel->perfilCargo ;
      $valeTransporte=$retornoModel->valeTransporte ;
      $valeAlimentacao=$retornoModel->valeAlimentacao ;
      $cestaBasica=$retornoModel->cestaBasica ;
      $seguroVida=$retornoModel->seguroVida ;
      $assistenciaMedica=$retornoModel->assistenciaMedica ;
      $telefone=$retornoModel->telefone ;
      $email=$retornoModel->email ;
      $obs=$retornoModel->obs ;
       $endereco=$retornoModel->endereco ;
      $dataCadastro=$retornoModel->dataCadastro ;
      $ativo=$retornoModel->ativo ;
      // $LocalTrabalho=$retornoModel->LocalTrabalho ;
      // $LocalTrabalho=$retornoModel->LocalTrabalho ;
      // $LocalTrabalho=$retornoModel->LocalTrabalho ;
      $idBeneficio=$retornoModel->idBeneficio ;
      $nome=$retornoModel->nome ;


      //var_dump ($retornoModel);
      // echo "      ta na class ";
      // if (isset($retornoModel)) {
      //   echo "string";
      // }

    }

  }


 ?>

 <script>
 function cont(){
    var conteudo = document.getElementById('formVaga2').innerHTML;
    tela_impressao = window.open('impresao.php');
    tela_impressao.document.write(conteudo);
    tela_impressao.window.print();
    tela_impressao.window.close();
 }
 </script> 

<div class="padrao">
  <div >
  <a href="#" class="fechar" onclick="fechar()">X</a>
  </div>
    <div class="formVaga2">
      <div class="Seguraimagen">
        <div class="img">
          <img src="../imagems/Capturar.PNG" alt="iii">
        </div>

        <div class="titulo_vagas">

          <div class="titleVaga">
            <h1>Divulgação de vagas</h1>

          </div>
        </div>

        <div class="segundo_title">

            <h2>Emprego</h2>

        </div>

        <form class="" action="../router.php?controller=vaga&modo=cadastrar" method="post">

          <div class="seguraFomVaga2">
            <div class="linhaVaga">
              <label class="labelEmpresa2">EMPRESA:</label><div class="imputEmpresa2"><?php echo $empresa ?></div>
              <label class="dataRegistro">DATA:</label> <div class="dataFormato"><?php echo implode("/",array_reverse(explode("-",$dataCadastro))) ;  ?></div>

            </div>

            <div class="novaLinha">
              <label class="labelEmpresa">CARGO:</label><div class="imputEmpresa2"><?php echo ($empresa) ?></div>
            </div>

            <div class="novaLinha">
              <label class="labelLocal">LOCAL DE TRABALHO:</label><div class="imputLocal2"><?php echo $LocalTrabalho; ?></div>

            </div>

            <div class="novaLinha">
              <label class="labelHorario">HORARIO DE TRABALHO:</label><div class="imputLocal2"><?php echo $horario ?></div>
            </div>

            <div class="novaLinha">
              <label class="labelEmpresa">SALARIO:</label><div class="imputEmpresa2"><?php echo $salario ?></div>
            </div>

            <div class="preRequisitos">
                <div class="titulopreRequisitos">
                  <label class="labelRequisitos">PRÉ-REQUISITOS DO(A) CANDIDATO(A):</label>
                  <div class="areaRequisito2">
                    <?php echo $preRequisitos; ?>
                  </div>
                </div>
            </div>

            <div class="preRequisitos">
                <div class="titulopreRequisitos">
                  <label class="labelRequisitos">PERFIL/DESCRIÇÃO DO CARGO:</label>
                  <div class="areaRequisito2">
                    <?php echo $perfilCargo; ?>
                  </div>
                </div>
            </div>

            <div class="novaLinha">
                <label class="labelHorario"> BENEFÍCIOS:</label>

                <div class="containerBeneficios">

                  <div class="beneficioCheck">

                    <div class="check">
                      <input type='checkbox'
                      <?php
                        if ($valeTransporte == '1') {
                          echo "checked";
                        }
                       ?>  name="beneficiostransporte" value="1" />
                    </div>
                    <label class="labelBeneficio"> Vale transporte</label>
                  </div>


                  <div class="beneficioCheck">

                    <div class="check">
                      <input type='checkbox'  <?php
                          if ($valeAlimentacao == '1') {
                            echo "checked";
                          }
                         ?>  name="beneficiosAlimentacao" value="1" />
                    </div>
                    <label class="labelBeneficio"> Vale Alimentacao</label>

                  </div>

                  <div class="beneficioCheck">

                    <div class="check">
                      <input type='checkbox'<?php
                          if ($cestaBasica == '1') {
                            echo "checked";
                          }
                         ?>  name="beneficiosCesta" value="1" />
                    </div>
                    <label class="labelBeneficio">Cesta Básica</label>

                  </div>

                  <div class="beneficioCheck">

                    <div class="check">
                      <input type='checkbox' <?php
                          if ($seguroVida == '1') {
                            echo "checked";
                          }
                         ?> name="beneficiosVida" value="1" />
                    </div>
                    <label class="labelBeneficio"> Seguro de vida</label>

                  </div>

                  <div class="beneficioCheck">

                    <div class="check">
                      <input type='checkbox' <?php
                          if ($assistenciaMedica == '1') {
                            echo "check";
                          }
                         ?> name="beneficiosMedico" value="1" />
                    </div>
                    <label class="labelBeneficio"> Assistência Médica</label>

                  </div>

                  <div class="beneficioCheckoutros">


                    <label class="labelBeneficioooutros"> Outros:</label>

                    <div class="checkoutro">
                      <div class="imputBeneficio">
                          <?php

                          // require_once('../controller/vaga_controller.php');
                          // require_once('../models/vaga_class.php');
                          //
                          // //instacia a controller
                          // //Passa o id para a controller
                          // $controller_vaga = new controller_vaga();
                          // $retornoModel2 = $controller_vaga :: Buscar2($id);
                          //
                          // $idBeneficio=$retornoModel->idBeneficio ;
                          //  $nome=$retornoModel->nome ;

                           echo $nome;
                           ?>
                      </div>
                      <!-- <input class="imputBeneficio" type="text" name="txtOutros" value="" > -->
                    </div>

                  </div>






                </div>

                <div class="novaLinha">
                    <label class="labelfinal"> OS(AS) INTERESSADOS(AS) DEVERÃO:</label>
                </div>
                <div class="novaLinha">
                  <label class="labelEmpresafinalTelefone"> TELEFONAR:</label><div class="imputEmpresa2"><?php echo $telefone ?></div>
                </div>

                <div class="novaLinha">
                  <label class="labelEmpresafinal">ENVIAR CURRÍCULO:</label><div class="imputEmpresa2"><?php echo $email ?></div>
                </div>

                <div class="novaLinha">
                  <label class="labelEmpresafinalTelefone2">COMPARECER:</label><div class="imputEmpresa2"><?php echo $endereco  ?></div>
                </div>

                <div class="novaLinha">
                  <label class="labelEmpresafinalTelefone"> OBS:</label><div class="imputEmpresa2"><?php echo $obs ?></div>
                </div>
          </div>


          </div>
          <div class="segura_botao">
            <!-- <input class="btnEnviarVaga"  name="btnSalvar" value="Imprimir"> -->

            <a href="#" onclick="cont()";>Imprimir</a>

          </div>


        </form>

      </div>

    </div>
</div>
