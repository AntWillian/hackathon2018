<div class="padrao">
    <div class="formVaga">
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

          <div class="seguraFomVaga">
            <div class="linhaVaga">
              <label class="labelEmpresa">EMPRESA:</label><input type="text" name="TxtEmpresa" value="" class="imputEmpresa">
              <label class="dataRegistro">DATA:</label> <div class="dataFormato"><?php echo date('d/m/y') ?></div>

            </div>

            <div class="novaLinha">
              <label class="labelEmpresa">CARGO:</label><input type="text" name="TxtCargo" value="" class="imputEmpresa"></br>
            </div>

            <div class="novaLinha">
              <label class="labelLocal">LOCAL DE TRABALHO:</label><input type="text" name="TxtLocalTrabalho" value="" class="imputLocal">

            </div>

            <div class="novaLinha">
              <label class="labelHorario">HORARIO DE TRABALHO:</label><input type="text" name="TxtHoarario" value="" class="imputLocal">
            </div>

            <div class="novaLinha">
              <label class="labelEmpresa">SALARIO:</label><input type="text" name="TxtSalario" value="" class="imputEmpresa"></br>
            </div>

            <div class="preRequisitos">
                <div class="titulopreRequisitos">
                  <label class="labelRequisitos">PRÉ-REQUISITOS DO(A) CANDIDATO(A):</label>
                  <textarea class="areaRequisito" name="txtRequisitos" rows="8" cols="80"></textarea>
                </div>
            </div>

            <div class="preRequisitos">
                <div class="titulopreRequisitos">
                  <label class="labelRequisitos">PERFIL/DESCRIÇÃO DO CARGO:</label>
                  <textarea class="areaRequisito" name="txtPerfil" rows="8" cols="80"></textarea>
                </div>
            </div>

            <div class="novaLinha">
                <label class="labelHorario"> BENEFÍCIOS:</label>

                <div class="containerBeneficios">

                  <div class="beneficioCheck">

                    <div class="check">
                      <input type='checkbox' name="beneficiostransporte" value="1" />
                    </div>
                    <label class="labelBeneficio"> Vale transporte</label>
                  </div>


                  <div class="beneficioCheck">

                    <div class="check">
                      <input type='checkbox' name="beneficiosAlimentacao" value="1" />
                    </div>
                    <label class="labelBeneficio"> Vale Alimentacao</label>

                  </div>

                  <div class="beneficioCheck">

                    <div class="check">
                      <input type='checkbox' name="beneficiosCesta" value="1" />
                    </div>
                    <label class="labelBeneficio">Cesta Básica</label>

                  </div>

                  <div class="beneficioCheck">

                    <div class="check">
                      <input type='checkbox' name="beneficiosVida" value="1" />
                    </div>
                    <label class="labelBeneficio"> Seguro de vida</label>

                  </div>

                  <div class="beneficioCheck">

                    <div class="check">
                      <input type='checkbox' name="beneficiosMedico" value="1" />
                    </div>
                    <label class="labelBeneficio"> Assistência Médica</label>

                  </div>

                  <div class="beneficioCheckoutros">


                    <label class="labelBeneficioooutros"> Outros:</label>

                    <div class="checkoutro">
                      <input class="imputBeneficio" type="text" name="txtOutros" value="" >
                    </div>

                  </div>






                </div>

                <div class="novaLinha">
                    <label class="labelfinal"> OS(AS) INTERESSADOS(AS) DEVERÃO:</label>
                </div>
                <div class="novaLinha">
                  <label class="labelEmpresafinalTelefone"> TELEFONAR:</label><input type="text" name="TxtTelefone" value="" class="imputEmpresa"></br>
                </div>

                <div class="novaLinha">
                  <label class="labelEmpresafinal">ENVIAR CURRÍCULO:</label><input type="text" name="TxtEmail" value="" class="imputEmpresa"></br>
                </div>

                <div class="novaLinha">
                  <label class="labelEmpresafinalTelefone">COMPARECER:</label><input type="text" name="TxtComparecer" value="" class="imputEmpresa"></br>
                </div>

                <div class="novaLinha">
                  <label class="labelEmpresafinalTelefone"> OBS:</label><input type="text" name="TxtObs" value="" class="imputEmpresa"></br>
                </div>
          </div>


          </div>
          <div class="segura_botao">
            <input class="btnEnviarVaga" type="submit" name="btnSalvar" value="Enviar">

          </div>


        </form>

      </div>

    </div>
</div>
