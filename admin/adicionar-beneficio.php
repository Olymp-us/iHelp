<?php
include("../conexao.php");

$beneficio = $_GET['beneficio'];


$query = $conect->prepare('INSERT INTO `tbBeneficios`(`descBeneficios`,`ativaBeneficio`) VALUES ( :beneficio,1 )');


$query->bindParam(':beneficio', $beneficio, PDO::PARAM_STR);

$query->execute();

header('location:gerenciar-categoria.php');

exit();

?>