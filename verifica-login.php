<?php

//Iniciando uma sessão.
session_start();


//Se o valor do login não existir, o usuário volta para a index.
if(!$_SESSION['usuario']){
    header('location:../login.php');
    exit();
}

?>