<?php

//Iniciando uma sessão.
session_start();


//Desconecta do usuário local.
unset($_SESSION['usuario']);


//Direciona o usuário para a index.
header('location:login.php');
exit(); 

?>