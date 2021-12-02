<?php

//Iniciando uma sessão.
session_start();

?>

<html>
    <head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">
        
		
        <link href="css/foundation.css" type="text/css" rel="stylesheet" media="screen" />
        <link href="css/normalize.css" type="text/css" rel="stylesheet" media="screen" />
        <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700,400italic,600italic,700italic&subset=latin,vietnamese,latin-ext' rel='stylesheet' type='text/css'>
        <link href="css/font-awesome.min.css" type="text/css" rel="stylesheet" media="screen" />
        <script type="text/javascript" src="js/jquery-1.11.0.min.js"> </script>
        <script src="js/modernizr.js" type="text/javascript"> </script>
        <script src="js/foundation.min.js" type="text/javascript"> </script>
        <script src="js/jquery.carouFredSel-6.2.1-packed.js" type="text/javascript"> </script>
        <script src="js/jquery.isotope.js" type="text/javascript"> </script>
        <script src="js/appear.js" type="text/javascript"> </script>
        <script src="js/general.js" type="text/javascript"> </script>
        <link href="css/style.css" type="text/css" rel="stylesheet" media="screen" />        





        
        <title> Login do administrador </title>

        <style>
            body {
                background-color: #E7E8EA;
                background-image: url(images/bolassemfundo1.jpg);
                background-repeat: no-repeat;
                background-position: left bottom;
                font-family: 'Source Sans Pro' , sans-serif;
            }
            .container {
                display: flex;
                align-items: center;
                justify-content: center;
                width: 100%;
                height: 100vh;
            }
            .form-container {
                display: flex;
                justify-content: center;
                width:416px;
                border-radius: 30px;
                padding:30px;
                text-align: center;
                background-color: rgba(71, 159, 199, 1);
                border-radius: 42px;
            }
            .form-container p {
                font-size: 20px;
            }
            .button {
                font-size: 20px;
                border-radius: 42px;
                background-color:black;
                color:white;
                width:70%;
                mask-border-width:0%;
                padding:1%;
                border: none;
                outline:none;
            } 
            .log{
                margin-top: 20px;
                justify-content: left;
            }
            .title{
                margin:0%;
                padding:0%;
                margin-bottom:1%;
            }
        </style>
    </head>




    <body>
        <div class="container">
            <div class="form-container shadow p-3">
            
                <form method="POST" action="logar.php">
                    
                    <div class="title">
                                <h1 style="margin:0%;margin-bottom:3%;">Seja bem vindo, administrador!</h1>
                                <h2 style="margin:0%;">Insira seus dados para prosseguir</h2>
                            </div>
                            <hr>
                            <?php if(isset($_SESSION['nao-autenticado'])): ?>
                        <div class="title">
                                <h1>ERRO: Usuário ou senha incorretos.</h1>
                            </div>
                    <?php endif; unset($_SESSION['nao-autenticado']); ?>
                            <div class="log">
                            <div class="title">
                                <h1>Login</h1>
                            </div>
                            <input type="text" name="login" id="login" placeholder="Digite seu login">
                            <br>
                            <br>
                            <div class="title">
                                <h1>Senha</h1>
                            </div>
                            <input type="password" name="senha" id="senha" placeholder="Digite sua senha">
                            <br><br>
                        <input type="submit" value="Entrar" id="entrar" name="entrar" class="button">
                    </div>
                        
                </form>
            </div>
        </div>
    </body>
</html>