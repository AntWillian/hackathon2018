<?php
function connectDatabase(){

        //servidor
        $conexao = mysqli_connect('10.107.144.27','root', 'bcd127', 'dbsenai');

        return $conexao;
    }
  ?>
