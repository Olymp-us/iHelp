<?php
include("../conexao.php");

$item = $_GET['item'];
$categoria = $_GET['categori'];

$query = $conect->prepare('INSERT INTO `tbItemDoacao`(`descItemDoacao`,`idCategoriaDoacao`,`ativaItemDoacao`, `Quantidade`) VALUES ( :item , :categoria, 1,0 )');
$query->bindParam(':item', $item, PDO::PARAM_STR);
$query->bindParam(':categoria', $categoria, PDO::PARAM_STR);

$query->execute();

header('location:gerenciar-categoria.php');

exit();
?>