<?php
  include("../conexao.php");

  $id = ($_GET['id']);

  $query = $conect->prepare('UPDATE `tbSaidaDoacao` SET `ativaSaidaDoacao`= 1 WHERE idSaidaDoacao = :id');

  $query->bindParam(':id', $id, PDO::PARAM_STR);

  $query->execute();

  header('location:pesquisa-entredoacaoarquivos.php?value=0');

  exit();
  

?>
