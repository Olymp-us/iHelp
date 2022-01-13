<?php
include("../conexao.php");

//Pega o ID da familia selecionada e armazena.
$id = ($_GET['id']);


//Apaga todos os registros da tbTelefone que esteja relacionado a família e executa.
$query = $conect->prepare('SET FOREIGN_KEY_CHECKS = 0; DELETE FROM tbTelefone WHERE idFamilia = :id');
$query->bindParam(':id', $id, PDO::PARAM_STR);
$query->execute();


//Apaga todos os registros da tbIntegrantes que esteja relacionado a família e executa.
$query = $conect->prepare('SET FOREIGN_KEY_CHECKS = 0; DELETE FROM tbIntegrantes WHERE idFamilia = :id');
$query->bindParam(':id', $id, PDO::PARAM_STR);
$query->execute();


//Por fim apaga o registro da família e executa.
$query = $conect->prepare('SET FOREIGN_KEY_CHECKS = 0; DELETE FROM tbFamilia WHERE idFamilia = :id');
$query->bindParam(':id', $id, PDO::PARAM_STR);
$query->execute();

//Retorna a página inicial.
header('location:pesquisa-familia.php');

exit();


?>
