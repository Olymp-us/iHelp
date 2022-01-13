<?php
include("../conexao.php");

$id = ($_GET['id']);
$item = ($_GET['item']);

$query = $conect->prepare('SET FOREIGN_KEY_CHECKS = 0; UPDATE tbitemdoacao set Quantidade = (SELECT SUM(Quantidade -qtdeentradadoacao)FROM tbitemdoacao inner join tbentradadoacao ON tbentradadoacao.idItemDoacao = tbitemdoacao.idItemDoacao WHERE tbentradadoacao.idItemDoacao = :item AND idEntradaDoacao = :id) WHERE idItemDoacao =  :item; DELETE from `tbEntradaDoacao` WHERE idEntradaDoacao = :id;UPDATE tbitemdoacao SET Quantidade=0 where Quantidade<0;');

$query->bindParam(':id', $id, PDO::PARAM_STR);
$query->bindParam(':item', $item, PDO::PARAM_STR);

$query->execute();

header('location:pesquisa-recedoacao.php?value=0');

exit();


?>