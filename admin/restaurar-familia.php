<?php
  include("../conexao.php");


//Pega o ID da família selecionada e adiciona a uma variável.
  $id = ($_GET['id']);



//Usa o ID armazenado para achar a familia a ser restaurada e em seguida executa o comando.
  $query = $conect->prepare('UPDATE `tbFamilia` SET `ativaFamilia`= 1 WHERE idFamilia = :id');
  $query->bindParam(':id', $id, PDO::PARAM_STR);
  $query->execute();


//Retorna a página após finalizar os processos.
  header('location:pesquisa-familiaarquivo.php?buscanome=&buscadoc=&buscaprio=');


  exit();
?>