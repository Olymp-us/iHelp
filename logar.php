<?php

include('conexao.php');

//Iniciando uma sessão.
session_start();


//Definindo os indices da sessão.
$_SESSION = array('usuario','senha');


//Se o input login ou input senha estiverem vazios, o usuário será redirecionado de volta para a index.
//Caso contrário, as outras verificações serão realizadas.
if(empty($_POST['login']) || empty($_POST['senha'])){
    header('location:login.php');
    exit();
} 


//Evita ataque de MySQL injection pelos inputs, além de armazenar o que foi digitado nos inputs.
$login = mysqli_real_escape_string($conexao, $_POST['login']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);


//Armazena as informações dentro da SESSION.
$_SESSION['usuario'] = $login;
$_SESSION['senha'] = $senha;


//Definindo o comando a ser enviado para o banco de dados.
//Verifica se o login e a senha digitadas são compatíveis com o login já criado. 
$query = "SELECT idUsuario, loginUsuario from tbUsuarios where senhaUsuario = '{$senha}' and loginUsuario = '{$login}'"; 


//Coleta o resultado do comando e o armazena.
$resultado = mysqli_query($conexao, $query);


//Conta a quantidade de resultados(linhas) do comando e armazena. 
$linhas = mysqli_num_rows($resultado);


// 0 linhas = login e senha incompátiveis; 1 linha = login e senha compatíveis; + de 1 linha = Algo de errado não está certo.
if($linhas == 0){

    //Quando o login for incompátivel, a sessão "Não autenticado" será criada.
    $_SESSION['nao-autenticado'] = true;
    header('location:login.php');
    exit();

}else{

    //Quando o login for compatível, o usuário será redirecionado para dentro das páginas privadas(pasta 'Admin').
    header('location:admin/home-admin.php');
    exit();

}


?>