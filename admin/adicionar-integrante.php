<?php
  include("../conexao.php");

  $id = $_POST['id'];
  $nome = $_POST['nome'];
  $datanasc = $_POST['datanasc']; 
  $rg = $_POST['rg'];
  $cpf = $_POST['cpf'];
  $genero = $_POST['genero'];
  $cor = $_POST['cor'];
  $estadocivil = $_POST['estadocivil'];
  $escolaridade = $_POST['escolaridade'];



  $query1 = $conect->prepare('INSERT INTO `tbIntegrantes`(`nomeIntegrante`, `dataNascIntegrante`, `generoIntegrante`, 
  `corIntegrante`, `escolaridadeIntegrante`, `estadoCivilIntegrante`, `rgIntegrante`, `cpfIntegrante`, `chefeIntegrante`, `idFamilia`)
   VALUES (:nome,:datanasc,:genero,:cor,:escolaridade,:estadocivil,:rg,:cpf,0,:id) ');


  $query1->bindParam(':nome', $nome, PDO::PARAM_STR);
  $query1->bindParam(':datanasc', $datanasc, PDO::PARAM_STR);
  $query1->bindParam(':genero', $genero, PDO::PARAM_STR);
  $query1->bindParam(':cor', $cor, PDO::PARAM_STR);
  $query1->bindParam(':escolaridade', $escolaridade, PDO::PARAM_STR);
  $query1->bindParam(':estadocivil', $estadocivil, PDO::PARAM_STR);
  $query1->bindParam(':rg', $rg, PDO::PARAM_STR);
  $query1->bindParam(':cpf', $cpf, PDO::PARAM_STR);
  $query1->bindParam(':id', $id, PDO::PARAM_INT);


  $query1->execute();


  if(!empty($_POST['celular'])){
    $celular = $_POST['celular'];
    $query2 = $conect->prepare('INSERT INTO `tbTelefone`(`idFamilia`, `numeroTelefone`) VALUES (:id,:celular)');
    $query2->bindParam(':id', $id, PDO::PARAM_INT);
    $query2->bindParam(':celular', $celular, PDO::PARAM_INT);
    echo $celular;
  
  
    $query2->execute();
    }

  header('location:formulario-integrante.php?id='.$id);

  exit();

?>