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

      require_once('../controller/tecnico_controller.php');
      require_once('../models/tecnico_class.php');

      //instacia a controller
      //Passa o id para a controller
      $controller_tecnico = new controller_tecnico();
      $retornoModel = $controller_tecnico :: Buscar($id);

      // var_dump($retornoModel);

      $nome= $retornoModel ->nome;
  $descricao= $retornoModel ->descricao;
  $imagem= $retornoModel ->imagem;
  $area= $retornoModel ->area;
  $duracao= $retornoModel ->duracao;
  $preRequisitos= $retornoModel ->preRequisitos;
  $link= $retornoModel ->link;
  $processoSeletivo= $retornoModel ->processoSeletivo;
  $dataInicio= $retornoModel ->dataInicio;
  $dataFim= $retornoModel ->dataFim;
  $horaInicio= $retornoModel ->horaInicio;
  $horaFim= $retornoModel ->horaFim;
  $idCursoTecnico= $retornoModel ->idCursoTecnico;

    }

  }


 ?>
 <div >
 <a href="#" class="fechar" onclick="fechar()">X</a>
 </div>
    <div class="titulo_modal">
        Nome do Curso
    </div>
     <div class="texto_modal">
       <?php echo $nome ?>
     </div>

    <div class="titulo_modal">
        Descrição
    </div>
    <div class="texto_modal">
       <?php echo $descricao ?>
    </div>
    
    <div class="titulo_modal">
        Foto
    </div>
    <div class="texto_modal">
      <img src="<?php echo $imagem ?>" alt="" class="imagem_modal">
    </div>

    <div class="titulo_modal">
        Área do Curso
    </div>
    <div class="texto_modal">
       <?php echo $area ?>
    </div>

    <div class="titulo_modal">
        Duração do Curso
    </div>
    <div class="texto_modal">
        <?php echo $duracao ?>
    </div>

    <div class="titulo_modal">
        Pré Requisitos
    </div>
    <div class="texto_modal">
        <?php echo $preRequisitos ?>
    </div>

    <div class="titulo_modal">
        Processo Seletivo
    </div>
    <div class="texto_modal">
       <?php echo $processoSeletivo ?>
     </div>
    
    <div class="titulo_modal">
        Data do Início das Inscrições
    </div>
    <div class="texto_modal">
       <?php echo $dataInicio ?>
    </div>
    
    <div class="titulo_modal">
        Data do Fim das Inscrições
    </div>
    <div class="texto_modal">
       <?php echo $dataFim ?>
    </div>
    
    <div class="titulo_modal">
        Hora do Início das Inscrições
    </div>
    <div class="texto_modal">
       <?php echo $horaInicio ?>
    </div>
    
    <div class="titulo_modal">
        Hora do Fim das Inscrições
    </div>
    <div class="texto_modal">
       <?php echo $horaFim ?>
    </div>
