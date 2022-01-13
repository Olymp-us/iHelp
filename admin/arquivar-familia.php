<?php
include("../conexao.php");


//Pega o ID da familia selecionada e armazena.
$id = ($_GET['id']);


//Usa o ID armazenado para achar a familia a ser arquivada e em seguida executa o comando.
$query = $conect->prepare('UPDATE `tbFamilia` SET `ativaFamilia`= 0 WHERE idFamilia = :id');
$query->bindParam(':id', $id, PDO::PARAM_STR);
$query->execute();


//Retorna a página após finalizar os processos.
header('location:pesquisa-familia.php');


exit();
?>