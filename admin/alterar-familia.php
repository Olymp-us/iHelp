<?php
include("../conexao.php");

$id = $_POST['idfamilia'];
$nome = $_POST['nomechefe'];
$prioridade = $_POST['nivelpriori'];
$cep = $_POST['cep'];
$endereco = $_POST['endereco'];
$bairro = $_POST['bairro'];
$numero = $_POST['numero'];
$complemento = $_POST['complemento'];
$referencia = $_POST['referencia'];
$situacao = $_POST['situacaoimovel'];
$renda = $_POST['renda'];

$query1 = $conect->prepare('UPDATE `tbFamilia` SET `chefeFamilia`= :nome,`idPrioridade`= :prioridade,`rendaFamilia`= :renda,`cepFamilia`= :cep,`bairroFamilia`= :bairro,`logradouroFamilia`= :endereco,`numeroFamilia`= :numero,`complementoFamilia`= :complemento,`referenciaFamilia`=:referencia,`situacaoImovelFamilia`=:situacao WHERE idFamilia = :id');


$query1->bindParam(':nome', $nome, PDO::PARAM_STR);
$query1->bindParam(':prioridade', $prioridade, PDO::PARAM_INT);
$query1->bindParam(':renda', $renda, PDO::PARAM_STR);
$query1->bindParam(':cep', $cep, PDO::PARAM_STR);
$query1->bindParam(':bairro', $bairro, PDO::PARAM_STR);
$query1->bindParam(':endereco', $endereco, PDO::PARAM_STR);
$query1->bindParam(':numero', $numero, PDO::PARAM_INT);
$query1->bindParam(':complemento', $complemento, PDO::PARAM_STR);
$query1->bindParam(':referencia', $referencia, PDO::PARAM_STR);
$query1->bindParam(':situacao', $situacao, PDO::PARAM_STR);
$query1->bindParam(':id', $id, PDO::PARAM_INT);

$query1->execute();

header('location:gerenciar-familia.php?id='.$id);

exit();

?>