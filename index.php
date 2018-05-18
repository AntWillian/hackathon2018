<?php
session_start();
if (isset($_GET['out'])) {
 session_destroy();
 header('location:index.php');
} else if (isset($_SESSION['idFuncionario'])){
   require_once("views/home.php");
   header("location:views/home.php?pag=home");
 }else {
   require_once("views/autenticacao.php");
 }
//  require_once("views/home.php");
?>
