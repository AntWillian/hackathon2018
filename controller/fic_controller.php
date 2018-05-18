<?php
  class controller_fic{

    function inportar(){
        if (!empty($_FILES['fleArquivo']['tmp_name'])) {

                $fic = new fic;
                $fic::desativarTudo();



          $arquivo = new DOMDocument();
          $arquivo->load($_FILES['fleArquivo']['tmp_name']);

          $linhas = $arquivo->getElementsByTagName ('Row');

          $primeira_linha=true;
          $segunda_linha=true;


          foreach ($linhas as $linha) {

            if ($primeira_linha == false) {
              if ($segunda_linha == false) {
                $area = $linha->getElementsByTagName('Data')->item(0)->nodeValue;
                $nome = $linha->getElementsByTagName('Data')->item(1)->nodeValue;
                $link = $linha->getElementsByTagName('Data')->item(2)->nodeValue;
                $duracao = $linha->getElementsByTagName('Data')->item(3)->nodeValue;
                $periodo = $linha->getElementsByTagName('Data')->item(4)->nodeValue;
                $dataInicio = $linha->getElementsByTagName('Data')->item(5)->nodeValue;
                $dataFim = $linha->getElementsByTagName('Data')->item(6)->nodeValue;
                $valor = $linha->getElementsByTagName('Data')->item(7)->nodeValue;
                $parcelas = $linha->getElementsByTagName('Data')->item(8)->nodeValue;

                // echo "area : $area <br>";
                // echo "Nome : $nome <br>";
                // echo "link: $link <br> ";
                // echo "duracao : $duracao <br>";
                // echo "periodo : $periodo <br>";
                // echo "data inicio : $dataInicio <br>";
                // echo "data fim : $dataFim <br>";
                // echo "valor : $valor <br>";
                // echo "parcela : $parcelas <br>";




                $fic->area = $area;
                $fic->nome = $nome;
                $fic->link = $link;
                $fic->duracao = $duracao;
                $fic->periodo = $periodo;
                $fic->dataInicio = $dataInicio;
                $fic->dataFim = $dataFim;
                $fic->valor = $valor;
                $fic->parcelas = $parcelas;

                $fic::cadastrar($fic);



              }
              $segunda_linha = false;
            }
            $primeira_linha= false;


          }
        }
    }
  }

 ?>
