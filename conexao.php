<?php
//Definindo as váriaveis do mySQL.
define('host', 'localhost');
define('usuario', 'root');
define('senha','');
define('db','bdOng');


//juntando tudo em uma váriavel só.
$conexao = mysqli_connect(host, usuario,senha,db) or die ('Não foi possível conectar ao banco.');
$conect = new PDO('mysql:host=localhost;dbname=bdOng','root','');
?>