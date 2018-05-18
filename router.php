<?php
switch ($_GET["controller"]) {

//funcionario
  case 'funcionario':
    require_once('controller/funcionario_controller.php');
    require_once('models/funcionario_class.php');

    switch ($_GET['modo']) {
      case 'login':
        $controller_funcionario= new controller_funcionario();
        $controller_funcionario::Login();
        break;

    }

    //fic
      case 'fic':
        require_once('controller/fic_controller.php');
        require_once('models/fic_class.php');

        switch ($_GET['modo']) {
          case 'inportar':
             $controller_fic= new controller_fic();
             $controller_fic::inportar();


            break;

        }

        //vaga
          case 'vaga':
            require_once('controller/vaga_controller.php');
            require_once('models/vaga_class.php');

            switch ($_GET['modo']) {
              case 'cadastrar':
                 $controller_vaga= new controller_vaga();
                 $controller_vaga::cadastrar();

                 echo "string";
                break;

            }



    break;


}


 ?>
