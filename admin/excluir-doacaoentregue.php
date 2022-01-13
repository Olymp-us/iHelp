<?php
include("../conexao.php");

$id = ($_GET['id']);

$query = $conect->prepare('SET FOREIGN_KEY_CHECKS = 0;DELETE FROM `tbSaidaDoacao` WHERE idSaidaDoacao = :id');

$query->bindParam(':id', $id, PDO::PARAM_STR);

$query->execute();

header('location:pesquisa-entredoacao.php?value=0');

exit();


?>