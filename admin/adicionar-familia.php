<?php
include("../conexao.php");

$nome = $_POST['nome'];
$datanasc = $_POST['datanasc']; 
$rg = $_POST['rg'];
$cpf = $_POST['cpf'];
$genero = $_POST['genero'];
$cor = $_POST['cor'];
$estadocivil = $_POST['estadocivil'];
$escolaridade = $_POST['escolaridade'];
$renda = $_POST['renda'];
$cep = $_POST['cep'];
$endereco = $_POST['endereco'];
$bairro = $_POST['bairro'];
$numero = $_POST['numero'];
$complemento = $_POST['complemento'];
$referencia = $_POST['referencia'];
$situacao = $_POST['situacaoimovel'];

if($renda=="Menos de 01 Salário mínimo" || $renda=="01 a 02 Salários mínimos"){
$prioridade = 1;
}else if($renda=="03 a 05 Salários mínimos"){
$prioridade = 2;
}else{
$prioridade = 3;
}

$query1 = $conect->prepare('INSERT INTO `tbFamilia`(`chefeFamilia`, `idPrioridade`, `rendaFamilia`, 
`cepFamilia`, `bairroFamilia`, `logradouroFamilia`, `numeroFamilia`, `complementoFamilia`, 
`referenciaFamilia`, `situacaoImovelFamilia`, `ativaFamilia`) VALUES (:nome,:prioridade,:renda,:cep,:bairro,
:endereco,:numero, :complemento, :referencia, :situacao, 1)');


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


$query1->execute();


$id = $conect->lastInsertId(); 


$query2 = $conect->prepare('INSERT INTO `tbIntegrantes`(`nomeIntegrante`, `dataNascIntegrante`, `generoIntegrante`, 
`corIntegrante`, `escolaridadeIntegrante`, `estadoCivilIntegrante`, `rgIntegrante`, `cpfIntegrante`, `chefeIntegrante`, `idFamilia`)
VALUES (:nome,:datanasc,:genero,:cor,:escolaridade,:estadocivil,:rg,:cpf,1,:id) ');


$query2->bindParam(':nome', $nome, PDO::PARAM_STR);
$query2->bindParam(':datanasc', $datanasc, PDO::PARAM_STR);
$query2->bindParam(':genero', $genero, PDO::PARAM_STR);
$query2->bindParam(':cor', $cor, PDO::PARAM_STR);
$query2->bindParam(':escolaridade', $escolaridade, PDO::PARAM_STR);
$query2->bindParam(':estadocivil', $estadocivil, PDO::PARAM_STR);
$query2->bindParam(':rg', $rg, PDO::PARAM_STR);
$query2->bindParam(':cpf', $cpf, PDO::PARAM_STR);
$query2->bindParam(':id', $id, PDO::PARAM_INT);


$query2->execute();

if(!empty($_POST['telefone'])){
$telefone = $_POST['telefone'];
$query3 = $conect->prepare('INSERT INTO `tbTelefone`(`idFamilia`, `numeroTelefone`) VALUES (:id,:telefone)');
$query3->bindParam(':id', $id, PDO::PARAM_INT);
$query3->bindParam(':telefone', $telefone, PDO::PARAM_INT);


$query3->execute();
}


if(!empty($_POST['celular'])){
$celular = $_POST['celular'];
$query3 = $conect->prepare('INSERT INTO `tbTelefone`(`idFamilia`, `numeroTelefone`) VALUES (:id,:celular)');
$query3->bindParam(':id', $id, PDO::PARAM_INT);
$query3->bindParam(':celular', $celular, PDO::PARAM_INT);


$query3->execute();
}


if(!empty($_POST['beneficios']) && is_array($_POST['beneficios'])){
$x = count($_POST['beneficios']);
for ($i = 0; $i < $x; $i++) {
  $beneficio = $_POST['beneficios'][$i];

  $query3 = $conect->prepare('INSERT INTO `tbBeneficioFamilia`(`idFamilia`,`idBeneficio`) VALUES (:id, :beneficio)');
  $query3->bindParam(':id', $id, PDO::PARAM_INT);
  $query3->bindParam(':beneficio', $beneficio, PDO::PARAM_INT);

  $query3->execute();
}
}

header('location:formulario-integrante.php?id='.$id);

exit();

?>