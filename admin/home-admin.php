<?php
include('../verifica-login.php');
include('../conexao.php');
$query = $conect->prepare('SELECT idFamilia from tbFamilia INNER JOIN tbPrioridade ON tbFamilia.idPrioridade = tbPrioridade.idPrioridade WHERE ativaFamilia = 1');
$query->execute();
$totalfamilia = $query->fetchAll(PDO::FETCH_ASSOC);

$query = $conect->prepare('SELECT idFamilia from tbFamilia INNER JOIN tbPrioridade ON tbFamilia.idPrioridade = tbPrioridade.idPrioridade WHERE descPrioridade like "Vermelho"  and ativaFamilia = 1');
$query->execute();
$vermelho = $query->fetchAll(PDO::FETCH_ASSOC);

$query = $conect->prepare('SELECT idFamilia from tbFamilia INNER JOIN tbPrioridade ON tbFamilia.idPrioridade = tbPrioridade.idPrioridade WHERE descPrioridade like "Amarelo"  and ativaFamilia = 1');
$query->execute();
$amarelo = $query->fetchAll(PDO::FETCH_ASSOC);

$query = $conect->prepare('SELECT idFamilia from tbFamilia INNER JOIN tbPrioridade ON tbFamilia.idPrioridade = tbPrioridade.idPrioridade WHERE descPrioridade like "Verde"  and ativaFamilia = 1');
$query->execute();
$verde = $query->fetchAll(PDO::FETCH_ASSOC);

$query = $conect->prepare('SELECT idSaidaDoacao from tbSaidaDoacao');
$query->execute();
$saida = $query->fetchAll(PDO::FETCH_ASSOC);

$query = $conect->prepare('SELECT `dataEntradaDoacao`, `nomeDoador`,`qtdeEntradaDoacao`,`descItemDoacao` FROM tbEntradaDoacao INNER JOIN tbDoador ON tbDoador.idDoador=tbEntradaDoacao.idDoador INNER JOIN tbItemDoacao ON tbItemDoacao.idItemDoacao=tbEntradaDoacao.idItemDoacao order by dataEntradaDoacao ASC LIMIT 5');
$query->execute();
$entrada = $query->fetchAll(PDO::FETCH_ASSOC);

?>



<!DOCTYPE html>

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
<script src="../js/moment.js"></script>
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
<li tabindex="0" class="icon-doasai"><span><a href="pesquisa-entredoacao.php?value=0">Doa????es Entregues</a></span></li>
<li tabindex="0" class="icon-doaentra"><span><a href="pesquisa-recedoacao.php?value=0">Doa????es Recebidas</a></span></li>
<li tabindex="0" class="icon-settings"><span><a href="gerenciar-categoria.php">Gerenciar Categorias</a></span></li>

<li class="icon-sair" style=" position: absolute;
    bottom: 0;
    width: 100%;
	background-color: black;"><span><a href="../logout.php">Sair</a></span></li>
</ul>
</nav>
        

<form>
<input type="hidden" name="total" id="total" value="<?php echo count($totalfamilia);?>">
<input type="hidden" name="vermelho" id="vermelho" value="<?php echo  count($vermelho);?>">
<input type="hidden" name="verde" id="verde" value="<?php echo  count($verde);?>">
<input type="hidden" name="amarelo" id="amarelo" value="<?php echo  count($amarelo);?>">
</form>
<section class="home" id="">
<div>
<br>
<div class="large-8 large-centered column">
<div class="title">
<br><br><br>
<h2 style="font-weight: bold;color:black;">SEJA BEM VINDO DE VOLTA, ADMINISTRADOR! O QUE H?? DE IMPORTANTE PARA SABER HOJE?</h2> 
<hr>
</div>
</div>
<div class="row">
<div class="col-sm-7">
<div>
<div>
<img src="../images/adm-logo.jpg" alt="">
</div>
</div>
</div>
<div class="col-sm-5" style="align-content:center;text-align:center;align-self:center;">
<div>
<h1 style="font-size: 35px; font-weight: bold; font-style: italic;color:black;">Sobre a p??gina:</h1>
<p style="font-size: 26px; line-height: 30px; letter-spacing: 3px;">A fim de facilitar a usabilidade
do adminitrador esta p??gina tem o objetivo de explicar e orientar o usu??rio a saber e entender
mais informa????es sobre as outras p??ginas! </p>
</div>
</div>
</div>
</div>
<br>
<br>
<hr>
<br>
<br>
<div class="large-8 large-centered column">
<div class="title">
<h1 style="font-size: 35px; font-weight: bold; font-style: italic;color:black;">O que ?? mais relevante para a ONG hoje?</h1>
</div>
</div>
<div class="row">
<div class="col-sm-1" style="text-align:center;">
</div>
<div class="col-sm-4" style="text-align:center;">
<div class="card">
<div class="card-header">
<div>
<p style="font-size: 26px; line-height: 26px; letter-spacing: 2px;"> Hoje temos um total de <strong><?php echo count($totalfamilia);?></strong> fam??lias cadastradas!</p>
</div>

<div id="graficoPizza"></div>
</div>
</div>
</div>

<br>
<br>
<div class="col-sm-1" style="text-align:center;">
</div>
<div class="col-sm-5" style="text-align:center;">

<br>
<br>
<div class="card">
<div class="card-header">
<div>
<p style="font-size: 16px;letter-spacing: 1px;text-align:left;padding:0%;margin:0%;">J?? entregamos mais de...</p>
</div>                
</div>
<div class="card-body">
<div>
<p style="font-size: 33px; line-height: 26px; letter-spacing: 1px;padding:0%;margin:0%;"> <strong><?php echo count($saida);?></strong> doa????es!</p>
</div> 
</div>
</div>
<br>
<br>
<br>
<br>

<caption>??ltimas doa????es recebidas...</caption>
<br>
<br>
<table class="table table-primary">
<thead>
<tr>
</tr>
</thead>

<tbody>
<?php
if(count($entrada)){
foreach($entrada as $Entrada){
?>
<tr class="table-light">
<td><?php echo $Entrada['nomeDoador']?></td>
<td><?php echo $Entrada['descItemDoacao']?></td>
<td><?php echo $Entrada['qtdeEntradaDoacao']?>un.</td>
<td><?php echo date('d/m/Y', strtotime($Entrada['dataEntradaDoacao']))?></td>
</tr>
<?php
}
}else{ 
?>
<p>N??o h?? doa????es cadastradas</p>   
<?php
}
?>
</tbody>
</table>
</div>
</div>

<br>
<br>
<hr>
<br><br>

<div class="large-8 large-centered column">
<div class="title">
<h1 style="font-size: 35px; font-weight: bold; font-style: italic;color:black;">Sobre qual p??gina voc?? quer ver?</h1>
</div>
</div>


<div class="row" >
<div class="col-sm-4" >
<div class="card">
<div class="card-body">
<h5 class="card-title">Cadastra Fam??lia(s)</h5>
<p class="card-text">Esta p??gina o usu??rio administrativo cadastra uma pessoa ou uma familia no sistema. Ainda nesta mesma p??gina poder?? editar as informa????es da pessoa ou fam??lia cadastrada caso algum dado tenha que ser alterado para permanecer com o cadastro atualizado.</p>
</div>
</div>
</div>
<div class="col-sm-4" style="margin-bottom:2%;">
<div class="card" style="margin-bottom:2%;">
<div class="card-body" style="margin-bottom:2%;">
<h5 class="card-title">Pesquisa Cadastro(s)</h5>
<p class="card-text">Esta p??gina o usu??rio administrativo pode estar pesquisando todas as fam??lias cadastradas que participam da ONG ou apenas pesquisar pessoas espec??ficas que est??o no grupo de prioridades, assim toda vez que o administrador precisar dos cadastros principais ou apenas um em espec??fico poder?? utilizar esta p??gina.</p>
</div>
</div>
</div>
<div class=" col-sm-4">
<div class="card">
<div class="card-body">
<h5 class="card-title">Hist??rico de Doa????es</h5>
<p class="card-text">Esta p??gina permite que o usu??rio administrativo veja todo o hist??rico das doa????es quanto contribui????es para manter o controle de estoque sua ONG, para melhor planejar o que fazer com os produtos sabendo da sua quantidade, assim como quanto entrou e quanto saiu.</p>
</div>
</div>
</div>
<div class="col-sm-5" style="margin-bottom:2%;">
<div class="card" style="margin-bottom:2%;" >
<div class="card-body">
<h5 class="card-title">Fam??lia(s) Arquivadas</h5>
<p class="card-text">Esta p??gina se o usu??rio administrativo preferir n??o excluir uma fam??lia espec??fica pode estar arquivando caso haja algum problema ou motivos que justifiquem que haja a necessidade do arquivamento,assim dando para quem mais precisa.</p>
</div>
</div>
</div>
<div class="col-sm-1"></div>
<div class="col-sm-5" style="margin-bottom:3%;">
<div class="card" style="margin-bottom:3%;">
<div class="card-body">
<h5 class="card-title">Gerenciar Categorias</h5>
<p class="card-text">Esta p??gina o usu??rio administrativo pode gerenciar e adicionar quais os tipos de categorias das doa????es, juntamente com os itens dispon??veis e os benef??cios em que cada fam??lia recebe, o usu??rio consegue administrar todas essas informa????es para realizar o cadastro.</p>
</div>
</div>
</div>
</div>
</div>
<div>


</html>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
crossorigin="anonymous"></script>
</body>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script>






google.charts.load('current', {'packages':['corechart']});

function desenharPizza (){
var verd = parseInt($('#verde').val());

var verm = parseInt($('#vermelho').val());

var amar = parseInt($('#amarelo').val());

var tabela = new google.visualization.DataTable();
tabela.addColumn('string','categorias');
tabela.addColumn('number','valores');
tabela.addRows([

['Verde', verd ],
['Vermelho', verm ],
['Amarelo', amar ]
]);
var options = {
colors: ['#00A86B', '#FF0800', '#FFD700'],
backgroundColor: 'transparent'
};    
var grafico = new google.visualization.PieChart(document.getElementById('graficoPizza'));
grafico.draw(tabela,options);
}

google.charts.setOnLoadCallback(desenharPizza);


</script>