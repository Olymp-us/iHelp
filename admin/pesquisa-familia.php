<?php
include('../verifica-login.php');
include('../conexao.php');

//Se o input estiver vázio, o usuário voltará para a home. Caso contrário, o resto dos comandos será executado.
if(!$_GET['buscanome']&&!$_GET['buscadoc']&&!$_GET['buscaprio']){
    header("location:pesquisa-famili.php");
    exit;
}else{
    $nome = $_GET['buscanome'];
    $doc = $_GET['buscadoc'];
    $prio = $_GET['buscaprio'];

    $nomem = str_replace(" ","",$nome); 
    $docm = str_replace(" ","",$doc); 
    $priom = str_replace(" ","",$prio); 

    if($nomem == "" && $docm == "" && $priom == ""){
    header("location:pesquisa-famili.php");
    exit;
    }
}

if(!$_GET['buscanome']){
$buscanome = "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXX";
}else {
$buscanome = "%".trim($_GET['buscanome'])."%";
$query = $conect->prepare('SELECT tbFamilia.idFamilia,chefeFamilia,rendaFamilia,descPrioridade, logradouroFamilia from tbFamilia INNER JOIN tbPrioridade ON tbFamilia.idPrioridade = tbPrioridade.idPrioridade WHERE ativaFamilia = 1 and chefeFamilia like :buscanome and ativaFamilia = 1');
$query->bindParam(':buscanome', $buscanome, PDO::PARAM_STR);
$query->execute();
$resultado = $query->fetchAll(PDO::FETCH_ASSOC);
}

if(!$_GET['buscadoc']){
$buscadoc = "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXX";
}else{
$buscadoc = $_GET['buscadoc'];
$query = $conect->prepare('SELECT tbFamilia.idFamilia,chefeFamilia,rendaFamilia,descPrioridade, logradouroFamilia from tbFamilia INNER JOIN tbPrioridade ON tbFamilia.idPrioridade = tbPrioridade.idPrioridade INNER JOIN tbIntegrantes ON tbFamilia.idFamilia = tbIntegrantes.idFamilia WHERE rgIntegrante = :buscadoc or cpfIntegrante = :buscadoc and ativaFamilia = 1');
$query->bindParam(':buscadoc', $buscadoc, PDO::PARAM_INT);
$query->execute();
$resultado = $query->fetchAll(PDO::FETCH_ASSOC);
}

if(!$_GET['buscaprio']){
$buscaprio = "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXX";
}else{
$buscaprio ="%".trim($_GET['buscaprio'])."%";
$query = $conect->prepare('SELECT tbFamilia.idFamilia,chefeFamilia,rendaFamilia,descPrioridade, logradouroFamilia from tbFamilia INNER JOIN tbPrioridade ON tbFamilia.idPrioridade = tbPrioridade.idPrioridade WHERE descPrioridade like :buscaprio and ativaFamilia = 1 ');
$query->bindParam(':buscaprio', $buscaprio, PDO::PARAM_STR);
$query->execute();
$resultado = $query->fetchAll(PDO::FETCH_ASSOC);
}

	
	

?>


<html lang="pt-br">
<head>
<title>iHelp</title>
<link REL="SHORTCUT ICON" HREF="../images/favicon.ico"  type="image/x-icon">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width">
<meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700,400italic,600italic,700italic&subset=latin,vietnamese,latin-ext' rel='stylesheet' type='text/css'>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<link href="../css/foundation.css" type="text/css" rel="stylesheet" media="screen" />
<link href="../css/normalize.css" type="text/css" rel="stylesheet" media="screen" />
<link href="../css/font-awesome.min.css" type="text/css" rel="stylesheet" media="screen" />
<link href="../css/menu.css" type="text/css" rel="stylesheet" media="screen" />
<link href="../css/styleadmin.css" type="text/css" rel="stylesheet" media="screen" />

<script type="text/javascript" src="js/jquery-1.11.0.min.js"> </script>
<script src="../js/modernizr.js" type="text/javascript"> </script>
<script src="../js/jquery.carouFredSel-6.2.1-packed.js" type="text/javascript"> </script>
<script src="../js/jquery.isotope.js" type="text/javascript"> </script>
<script src="../js/appear.js" type="text/javascript"> </script>
<script src="../js/general.js" type="text/javascript"> </script>
</head>
<body>
<nav class="menu" tabindex="0">
<div class="smartphone-menu-trigger"></div>
<header class="avatar">
<img src="../images/logoADM.png"/>
</header>
<ul>
<li tabindex="0" class="icon-home"><span><a href="home-admin.php">Home do Administrador</a></span></li>
<li tabindex="0" class="icon-search"><span><a href="pesquisa-famili.php">Pesquisas de Cadastros</a></span></li>
<li tabindex="0" class="icon-users"><span><a href="formulario-familia.php">Cadastrar Familia</a></span></li>
<li tabindex="0" class="icon-doasai"><span><a href="pesquisa-entredoacao.php?value=0">Doações Entregues</a></span></li>
<li tabindex="0" class="icon-doaentra"><span><a href="pesquisa-recedoacao.php?value=0">Doações Recebidas</a></span></li>
<li tabindex="0" class="icon-settings"><span><a href="gerenciar-categoria.php">Gerenciar Categorias</a></span></li>

<li class="icon-sair" style=" position: absolute;
    bottom: 0;
    width: 100%;
	background-color: black;"><span><a href="../logout.php">Sair</a></span></li>
</ul>
</nav>
<section class="home" id="">
<div class="large-8 large-centered column">
<div class="title">
<br><br><br>
<h2 style="font-weight: bold;color:black;">GERENCIAMENTO DE CADASTROS DE FAMÍLIAS</h2> 
<hr>
</div>
</div>
<div class="row">

<div class="large-8 large-centered column">
<div class="col-sm-12" style="align-content:center;text-align:center;align-self:center;">
<div>
<h1  style="font-size: 35px; font-weight: bold; font-style: italic;color:black;">Pesquise pelo(s) cadastro(s) desejado(s)!</h1>

   <p style="font-size: 26px; line-height: 30px; letter-spacing: 3px; margin:0">Insira o nome do chefe de família, um documento como RG ou CPF ou selecione o nível de prioridade que deseja buscar.</p>

<span style="font-size: 26px;">...</span>
    
<br>
<br>

</div>
</div>
</div>
</div>

<div class="row">
<div class="col-sm-1"></div>
<div class="col-sm-10" style="align-content:center;text-align:center;margin-bottom:2%;align-self:center;background-color:#225C81;color:white;border-radius:20px;">
<form action="pesquisa-familia.php" style="padding:2%;">
<div class="large-8 large-centered column mb-3" >
<label for="buscanome" class=" form-label">Nome do chefe de família:</label>
<br>
<input type="text" id="buscanome" name="buscanome" placeholder="Nome do chefe da família" value="" class="inputpesquisa defaultText form-control" /> 
</div>
<div class="large-8 large-centered column mb-3">
<label for="buscadoc" class=" form-label">RG ou CPF de um dos integrantes:</label>
<br>
<input type="text" id="buscadoc" name="buscadoc" placeholder="RG da pessoa ou Chefe da família" value="" class="inputpesquisa defaultText form-control" /> 
</div>
<div class="large-8 large-centered column mb-3">
<label for="buscadoc" class=" form-label">Nível de prioridade:</label>
<br>
<select name="buscaprio" class="inputpesquisa form-select"  placeholder="Nível de prioridade" class="form-select" id="buscaprio">
                                    <option value="">Selecione o nível de prioridade</option>
                                    <option value="Vermelho">Vermelho</option>
    <option value="Amarelo">Amarelo</option>
    <option value="Verde">Verde</option>
                                </select>
</div>
<div class="large-12 large-centered column mb-3">
<div style="display: flex; width: 100%; align-items: center; justify-content: center;">
<input type="submit" value="Pesquisar" class="button icon-submit"/>
</div> 
</div>
</form>
</div>

<div class="col-sm-1"></div>
</div>
</section>

<!-- Aqui poderia aparecer o resultado do formulário em específico --> 
<section class="testimonials">
<div class="title">
<p style="font-size:20px;font-weight: bold;">Resultados encontrados para esta busca: <?php echo count($resultado);?></p>
</div>
<a href="formulario-familia.php" style="text-decoration: none;">
<input type="button" class="button icon-addfamily" style="padding-left:40px;"value="Adicionar família"/> 
<a href="pesquisa-familiaarquivo.php?buscanome=&buscadoc=&buscaprio=" style="text-decoration: none;">
<input type="button" class="button icon-archive" style="padding-left:40px;"value="Ver famílias arquivadas"/>
</a>
<br>
<br>
<table class="table table-hover">
<thead>
<tr>
<th scope="col"></th>
<th scope="col">Nome do chefe familiar</th>
<th scope="col">Endereço da Família</th>
<th scope="col">Nível de prioridade</th>
<th scope="col"></th>
<th scope="col"></th>
<th scope="col"></th>
</tr>
</thead>
<tbody>
<?php
if(count($resultado)){
foreach($resultado as $Resultados){

?>
<tr>
<th></th> 
<th> <?php echo $Resultados['chefeFamilia']?></th>
<th> <?php echo $Resultados['logradouroFamilia']?></th>
<th> <?php echo $Resultados['descPrioridade']?></th>
    <th > <a href="pdf-familia.php?id=<?php echo $Resultados['idFamilia'] ?>" target="_blank" style="text-decoration: none;">
<input type="button" class="button icon-pdf" style="padding-left:40px;"value="PDF"/>
</a></th>
<th > <a href="gerenciar-familia.php?id=<?php echo $Resultados['idFamilia'] ?>" style="text-decoration: none;">
<input type="button" class="button icon-edit" style="padding-left:40px;"value="Gerenciar família"/>
</a></th>
<th > <a href="excluir-familia.php?id=<?php echo $Resultados['idFamilia'] ?>" style="text-decoration: none;">
<input type="button" class="button icon-delete2" style="padding-left:40px;"value="Excluir"/>
</a></th>




<?php
}
}else{
?>



<p>Não há resultados para sua busca</p>   



<?php
}
?>

</table>
</section>


</div>
</div>
</footer>
</body>
</html>
