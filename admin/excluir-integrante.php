<?php
include("../conexao.php");

//Pega o ID da familia selecionada e armazena.
$id = $_GET['id'];
$cod = $_GET['cod'];

$query = $conect->prepare('SELECT `idFamilia` from tbIntegrantes where idIntegrante= :id');
$query->bindParam(':id', $id, PDO::PARAM_INT);
$query->execute();
$fam = $query->fetchAll(PDO::FETCH_ASSOC);

//Apaga todos os registros da tbTelefone que esteja relacionado a família e executa.
$query = $conect->prepare('SET FOREIGN_KEY_CHECKS = 0; DELETE FROM tbIntegrantes WHERE idIntegrante = :id');
$query->bindParam(':id', $id, PDO::PARAM_STR);
$query->execute();
$header = 'location:gerenciar-familia.php?id='.$cod;
header($header);

exit();
?>