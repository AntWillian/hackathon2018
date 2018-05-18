<?php
  
//        chamando classe modulo que realiza o upload
        require_once 'modulo.php';
        
    if($conexao = mysql_connect('localhost', 'root', 'bcd127')){
        mysql_select_db('dbsenai');
    } else {
        echo('<script>alert("Erro ao conectar com o banco")</script>');
    }


    autentica("conteudoFuncionario");

    $id = "";
    $nome = "";
    $cpf = "";
    $senha = "";
    $imagem="";
    $botao = "Salvar";

    if(isset($_GET['btnSalvar'])){
        $nome = $_POST['txtNome'];
        $idNivel = $_POST['txtNivel'];
        $cpf = $_POST['txtCpf'];
        $senha = $_POST['txtSenha'];
        

        
        if(!empty($_FILES['flImagem']['name'])){
            $imagem_file = true;
            $diretorio_completo=salvarFoto($_FILES['flImagem'], 'imagemUsuario');
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
            $sql = "INSERT INTO tbl_funcionario (nome, idNivel, cpf, senha, imagem) ";
            $sql .= "VALUES ('".$nome."', '".$idNivel."', '".$cpf."', '".$senha."', '".$diretorio_completo."')";
        } else if($_GET['btnSalvar'] == "Editar"){
            
            if($imagem_file == true && $MovUpload == true){
                $sql = "UPDATE tbl_funcionario SET
                nome = '".$nome."',
                idNivel = '".$idNivel."',
                cpf = '".$cpf."',
                senha = '".$senha."',
                imagem = '".$diretorio_completo."'
                WHERE idFuncionario = ".$_SESSION['idSessao'];
            } else {
                $sql = "UPDATE tbl_funcionario SET
                nome = '".$nome."',
                idNivel = '".$idNivel."',
                cpf = '".$cpf."',
                senha = '".$senha."'
                WHERE idFuncionario = ".$_SESSION['idSessao'];
            }
        }
        mysql_query($sql);
        header('location:?pag=funcionarios');
    }

    if(isset($_GET['modo'])){
        $modo = $_GET['modo'];

        if($modo == 'excluir'){
            $id = $_GET['id'];
            $sql = "DELETE FROM tbl_funcionario WHERE idFuncionario = ".$id;
            mysql_query($sql);
        } else if($modo == 'consultar'){
            $id = $_GET['id'];
            $sql = "SELECT * FROM tbl_funcionario WHERE idFuncionario = ".$id;

            $result = mysql_query($sql);

            if($funcionario = mysql_fetch_array($result)){
                $id = $funcionario['idFuncionario'];
                $_SESSION['idSessao'] = $id;

                $nome = $funcionario['nome'];
                $idNivel = $funcionario['idNivel'];
                $cpf = $funcionario['cpf'];
                $senha = $funcionario['senha'];
                $imagem = $funcionario['imagem'];
                $botao = "Editar";
            }
        }
    }


?>

<div class="padrao">
    <div class="titulo">
        <h1>Administração de Funcionários</h1>
    </div>

    <div class="contents">
        <div class="titulo_contents">
            <h1>Funcionarios Cadastrados</h1>
        </div>

        <div class="content_tabela">
            <div class="linha_titulos">
                <div class="caixas_titulos">
                    CPF
                </div>
                <div class="caixas_titulos">
                    Nome
                </div>
                <div class="caixas_titulos">
                    Senha
                </div>
                <div class="caixas_titulos">
                    Nivel
                </div>
                <div class="caixas_titulos">
                    Opções
                </div>
            </div>
            <div class="content_registros">
              <?php
                $sql = "select f.idFuncionario, f.cpf, f.nome, f.senha, n.nome as nivel
                        FROM tbl_funcionario as f
                        INNER JOIN tbl_nivel as n
                        on f.idNivel = n.idNivel
                        order by f.idFuncionario desc";

                $result = mysql_query($sql);
                $cont=0;
                while($funcionario = mysql_fetch_array($result)){
//                    arrumar o while(esta repetindo os usuários)
                      if ($cont % 2 == 0) {
                         $cor='cor1';
                       }else {
                         $cor='cor2';
                       }                        
                       $cont+=1;

                ?>


                  <div class="linha_registros <?php echo  $cor ?>">
                    <div class="caixas_registros">
                        <?php echo($funcionario['cpf']); ?>
                    </div>
                    <div class="caixas_registros">
                        <?php echo($funcionario['nome']); ?>
                    </div>
                    <div class="caixas_registros">
                        <?php echo($funcionario['senha']); ?>
                    </div>
                    <div class="caixas_registros">
                        <?php echo($funcionario['nivel']); ?>
                    </div>
                    <div class="caixas_registros">
                        <a href="?pag=funcionarios&modo=consultar&id=<?php echo($funcionario['idFuncionario'])?>">
                            <img src="../imagems/editar.png">
                        </a>
                        |
                        <a href="?pag=funcionarios&modo=excluir&id=<?php echo($funcionario['idFuncionario'])?>">
                            <img src="../imagems/deletar.png">
                        </a>
                    </div>
                  </div>
              <?php } ?>
            </div>
        </div>
    </div>

    <div class="contents">
        <div class="titulo_contents">
            <h1>Novo Funcionário</h1>
        </div>

        <div class="content_form">
            <form name="frmCadastroFuncionarios" method="post" action="?pag=funcionarios&btnSalvar=<?php echo($botao);?>" enctype="multipart/form-data">
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
                        <input id="upload" type="file" name="flImagem">
                    </div>
                </div>
                <div class="linhas_campos">
                    <div class="campos" id="campo_nomeCurso">
                        <div class="titulos_campos">
                            Nome do Funcionario
                        </div>
                        <input type="text" name="txtNome" id="txtNome" placeholder="Nome do funcionário..." value="<?php echo($nome);?>" maxlength="45" required>
                    </div>
                    <div class="campos" id="campo_descricao">
                        <div class="titulos_campos">
                            Nivel de Usuário
                        </div>
                        <select name="txtNivel">
                            <?php
                                $sql = "SELECT * FROM tbl_nivel";

                                $result = mysql_query($sql);

                                while($niveis = mysql_fetch_array($result)){ 
                                    if($niveis['idNivel'] == $idNivel && $modo == 'consultar'){
                                        $selected = 'selected';
                                    } else {
                                        $selected = '';
                                    }
                            ?>
                                    <option <?php echo($selected)?> value="<?php echo($niveis['idNivel']);?>">
                                        <?php echo($niveis['nome']);?>
                                    </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="linhas_campos">
                    <div class="campos">
                        <div class="titulos_campos">
                            CPF
                        </div>
                        <input type="text" name="txtCpf" id="txtCpf" placeholder="CPF do funcionário..." value="<?php echo($cpf);?>" maxlength="11" required>
                    </div>
                    <div class="campos">
                        <div class="titulos_campos">
                            Senha
                        </div>
                        <input type="password" placeholder="Password..." name="txtSenha" id="txtSenha" value="<?php echo($senha);?>" maxlength="8" required>
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