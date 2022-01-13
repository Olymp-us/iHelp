<?php
include("../conexao.php");

$id = ($_GET['id']);

$query = $conect->prepare('UPDATE `tbSaidaDoacao` SET `ativaSaidaDoacao`= 0 WHERE idSaidaDoacao = :id');

$query->bindParam(':id', $id, PDO::PARAM_STR);

$query->execute();

header('location:pesquisa-entredoacao.php?value=0');

exit();


?>