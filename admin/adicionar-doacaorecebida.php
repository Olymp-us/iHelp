<?php
include("../conexao.php");

$doador = $_POST['doador'];
$datarece = $_POST['datarece'];
$item = $_POST['item'];
$qtde = $_POST['qtde'];


$query = $conect->prepare('INSERT INTO `tbEntradaDoacao`(`idItemDoacao`, `dataEntradaDoacao`, 
`qtdeEntradaDoacao`, `idDoador`, `ativaEntradaDoacao`) VALUES (:item,:datarece,:qtde,:doador,1); UPDATE tbitemdoacao set Quantidade = (SELECT ((SELECT Quantidade from tbitemdoacao where idItemDoacao = :item) + (SELECT qtdeEntradaDoacao from tbentradadoacao ORDER by idEntradaDoacao DESC Limit 1)) FROM tbitemdoacao where idItemDoacao = :item) WHERE idItemDoacao = :item; UPDATE tbitemdoacao SET Quantidade=0 where Quantidade<0;');


$query->bindParam(':item', $item, PDO::PARAM_INT);
$query->bindParam(':datarece', $datarece, PDO::PARAM_STR);
$query->bindParam(':qtde', $qtde, PDO::PARAM_INT);
$query->bindParam(':doador', $doador, PDO::PARAM_INT);

$query->execute();


header('location:pesquisa-recedoacao.php?value=0');
exit();
?>