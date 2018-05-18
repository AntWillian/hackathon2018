<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Autenticacao</title>
    <link rel="stylesheet" href="views/css/styleAutenticacao.css">
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">  </head>
    <link href="https://fonts.googleapis.com/css?family=Kavivanar" rel="stylesheet">
    <script>
        function mask(e, id, mask){
          var tecla=(window.event)?event.keyCode:e.which;
          if((tecla>47 && tecla<58)){
              mascara(id, mask);
              return true;
          }
          else{
              if (tecla==8 || tecla==0){
                  mascara(id, mask);
                  return true;
              }
              else  return false;
          }
        }
        function mascara(id, mask){
            var i = id.value.length;
            var carac = mask.substring(i, i+1);
            var prox_char = mask.substring(i+1, i+2);
            if(i == 0 && carac != '#'){
                insereCaracter(id, carac);
                if(prox_char != '#')insereCaracter(id, prox_char);
            }
            else if(carac != '#'){
                insereCaracter(id, carac);
                if(prox_char != '#')insereCaracter(id, prox_char);
            }
            function insereCaracter(id, char){
                id.value += char;
            }
        }

    </script>
  <body>
    <div class="conteudo_autenticacao">
      <div class="login">
        <div class="autenticacao_espaco">
          <h1>"Fazendo que se aprende"</h1>
        </div>

          <div class="autenticacao">
            <div class="autenticacao_login">
              <form class="" action="router.php?controller=funcionario&modo=login "method="post">


                <div class="seguraDados">
                  <h1>Autenticação</h1>
                </div>

                <div class="dadosGerais">
                    <input class="caixaTexto" type="text" name="txtcpf" value="" placeholder="Digite o cpf" onkeypress="return mask(event, this, '###.###.###-##')"  maxlength="14">
                </div>

                <div class="dadosGerais">
                <input class="caixaTexto" type="password" name="txtsenha" value="" placeholder="Digite a senha">
                </div>

                    <input class="btn" type="submit" name="BtnEntrar" value="Entrar">

                <!--
                <label class="label">Senha:</label></br><input class="caixaTexto" type="text" name="txtsenha" value="" placeholder="Digite sua senha"> -->

              </form>
            </div>
          </div>
      </div>
    </div>
  </body>
</html>
