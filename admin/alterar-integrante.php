<?php
include("../conexao.php");
$id =$_GET['id'];
$idint = $_POST['idintegrante'];
$nome = $_POST['nome'];
$datanasc = $_POST['datanasc']; 
$rg = $_POST['rg'];
$cpf = $_POST['cpf'];
$genero = $_POST['genero'];
$cor = $_POST['cor'];
$estadocivil = $_POST['estadocivil'];
$escolaridade = $_POST['escolaridade'];
$chefe = $_POST['chefe'];

echo $idint;

$query1 = $conect->prepare('UPDATE `tbIntegrantes` SET `nomeIntegrante`= :nome,
`dataNascIntegrante`=:datanasc,`generoIntegrante`=:genero,`corIntegrante`=:cor,`escolaridadeIntegrante`=:escolaridade,`estadoCivilIntegrante`=:estadocivil,`rgIntegrante`=:rg,`cpfIntegrante`=:cpf,`chefeIntegrante`= :chefe WHERE idIntegrante = :id');

$query1->bindParam(':nome', $nome, PDO::PARAM_STR);
$query1->bindParam(':datanasc', $datanasc, PDO::PARAM_STR);
$query1->bindParam(':genero', $genero, PDO::PARAM_STR);
$query1->bindParam(':cor', $cor, PDO::PARAM_STR);
$query1->bindParam(':escolaridade', $escolaridade, PDO::PARAM_STR);
$query1->bindParam(':estadocivil', $estadocivil, PDO::PARAM_STR);
$query1->bindParam(':rg', $rg, PDO::PARAM_STR);
$query1->bindParam(':cpf', $cpf, PDO::PARAM_STR);
$query1->bindParam(':chefe', $chefe, PDO::PARAM_INT);
$query1->bindParam(':id', $idint, PDO::PARAM_INT);

$query1->execute();

header('location:gerenciar-familia.php?id='.$id);

exit();

?>