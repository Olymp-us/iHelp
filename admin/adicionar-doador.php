<?php
include("../conexao.php");

$doador = $_POST['doador'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];

$query = $conect->prepare('INSERT INTO `tbDoador`(`nomeDoador`,`emailDoador`) VALUES (:doador, :email)');

$query->bindParam(':doador', $doador, PDO::PARAM_STR);
$query->bindParam(':email', $email, PDO::PARAM_STR);

$query->execute();

$id = $conect->lastInsertId();

$query = $conect->prepare('INSERT INTO `tbTelefoneDoador`(`idDoador`,`numeroTelefoneDoador`) VALUES (:id, :telefone)');

$query->bindParam(':id', $id, PDO::PARAM_STR);
$query->bindParam(':telefone', $telefone, PDO::PARAM_STR);

header('location:pesquisa-recedoacao.php?value=0');
exit();
?>