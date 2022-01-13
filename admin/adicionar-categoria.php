<?php
include("../conexao.php");

$categoria = $_GET['categoria'];


$query = $conect->prepare('INSERT INTO `tbCategoriaDoacao`(`descCategoriaDoacao`,`ativaCategoriaDoacao`) VALUES ( :categoria,1 )');


$query->bindParam(':categoria', $categoria, PDO::PARAM_STR);

$query->execute();

header('location:gerenciar-categoria.php');

exit();

?>