<?php
include("../conexao.php");

$id = ($_GET['id']);


$query = $conect->prepare('SET FOREIGN_KEY_CHECKS = 0; DELETE FROM tbItemDoacao WHERE idItemDoacao = :id');


$query->bindParam(':id', $id, PDO::PARAM_STR);

$query->execute();

header('location:gerenciar-categoria.php');

exit();


?>
