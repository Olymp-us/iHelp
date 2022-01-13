<?php
include("../conexao.php");

$familia = $_POST['familia'];
$data = $_POST['data'];

$qtde = $_POST['qtde'];
$item = $_POST['item'];

$query = $conect->prepare('INSERT INTO `tbSaidaDoacao`(`idFamilia`, `dataSaidaDoacao`, `ativaSaidaDoacao`) VALUES (:familia, :data , 1); INSERT INTO `tbsaidaitems`(`idSaidaDoacao`, `idItemDoacao`, `qtdeSaidaDoacao`) VALUES ((SELECT idSaidaDoacao from tbsaidadoacao ORDER by idSaidaDoacao DESC Limit 1), :item, :qtde); UPDATE tbitemdoacao set Quantidade = (SELECT((SELECT Quantidade from tbitemdoacao where idItemDoacao = :item)-(SELECT qtdesaidadoacao from tbsaidaitems INNER join tbsaidadoacao on tbsaidaitems.idSaidaDoacao = tbsaidadoacao.idSaidaDoacao ORDER by tbsaidadoacao.idSaidaDoacao DESC Limit 1))FROM tbitemdoacao WHERE idItemDoacao = :item) WHERE idItemDoacao = :item; UPDATE tbitemdoacao SET Quantidade=0 WHERE  Quantidade<0');

$query->bindParam(':item', $item, PDO::PARAM_INT);
$query->bindParam(':familia', $familia, PDO::PARAM_INT);
$query->bindParam(':data', $data, PDO::PARAM_STR);
$query->bindParam(':qtde', $qtde, PDO::PARAM_INT);


$query->execute(); 

header('location:pesquisa-entredoacao.php?value=0');
exit();
?>