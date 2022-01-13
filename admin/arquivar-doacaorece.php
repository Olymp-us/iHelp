<?php
include("../conexao.php");

$id = ($_GET['id']);

$query = $conect->prepare('UPDATE `tbEntradaDoacao` SET `ativaEntradaDoacao`= 0 WHERE idEntradaDoacao = :id');

$query->bindParam(':id', $id, PDO::PARAM_STR);

$query->execute();

header('location:pesquisa-recedoacao.php?value=0');

exit();


?>