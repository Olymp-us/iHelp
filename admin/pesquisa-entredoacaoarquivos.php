<?php
include('../verifica-login.php');
include('../conexao.php');

$value = $_GET['value'];
//Armazena o comando e executa o comando.
//'SELECT chefeFamilia,rendaFamilia,idPrioridade, bairroFamilia, logradouroFamilia, numeroFamilia, complementoFamilia, referenciaFamilia, numeroTelefone from tbFamilia INNER JOIN tbIntegrantes ON tbIntegrantes.idFamilia=tbFamilia.idFamilia INNER JOIN tbTelefone ON tbTelefone.idFamilia=tbFamilia.idFamilia WHERE chefeFamilia like :1busca OR rgIntegrante = :2busca OR cpfIntegrante = :3busca OR nomeIntegrante like :4busca'
if($value==0){

$query1 = $conect->prepare('SELECT * from tbSaidaDoacao inner join tbFamilia on tbFamilia.idFamilia=tbSaidaDoacao.idFamilia inner join tbsaidaitems on tbsaidaitems.idSaidaDoacao=tbSaidaDoacao.idSaidaDoacao inner join tbItemDoacao on tbitemdoacao.idItemDoacao=tbsaidaitems.idItemDoacao inner join tbCategoriaDoacao on tbItemDoacao.idCategoriaDoacao=tbCategoriaDoacao.idCategoriaDoacao where ativaSaidaDoacao = 0');
$query1->execute();


//Resultado do comando adicionado a uma Array.
$resultadosaida = $query1->fetchAll(PDO::FETCH_ASSOC);
}else if($value==1){

$select = 'SELECT * from tbSaidaDoacao inner join tbFamilia on tbFamilia.idFamilia=tbSaidaDoacao.idFamilia inner join tbsaidaitems on tbsaidaitems.idSaidaDoacao=tbSaidaDoacao.idSaidaDoacao inner join tbItemDoacao on tbitemdoacao.idItemDoacao=tbsaidaitems.idItemDoacao inner join tbCategoriaDoacao on tbItemDoacao.idCategoriaDoacao=tbCategoriaDoacao.idCategoriaDoacao where ativaSaidaDoacao = 0'; 


if($_GET['categori']){
$categori = $_GET['categori'];
$select = $select.' and tbItemDoacao.idCategoriaDoacao = '.$categori;

}
if($_GET['doador']){
$doador = $_GET['doador'];
$select = $select.' and tbEntradaDoacao.idDoador = '.$doador;

}






if($_GET['ordem']){
if($_GET['ordem']==0){
$select = $select.' ORDER BY dataSaidaDoacao DESC';

}else if($_GET['ordem']==1){
$select = $select.' ORDER BY dataSaidaDoacao';

}else if($_GET['ordem']==2){
$select = $select.' ORDER BY qtdeSaidaDoacao DESC';

}else if($_GET['ordem']==3){
$select = $select.' ORDER BY qtdeSaidaDoacao';

}
}


$query1 = $conect->prepare($select);
$query1->execute();
$resultadosaida = $query1->fetchAll(PDO::FETCH_ASSOC);

}
//Armazena o comando e executa o comando.
//'SELECT chefeFamilia,rendaFamilia,idPrioridade, bairroFamilia, logradouroFamilia, numeroFamilia, complementoFamilia, referenciaFamilia, numeroTelefone from tbFamilia INNER JOIN tbIntegrantes ON tbIntegrantes.idFamilia=tbFamilia.idFamilia INNER JOIN tbTelefone ON tbTelefone.idFamilia=tbFamilia.idFamilia WHERE chefeFamilia like :1busca OR rgIntegrante = :2busca OR cpfIntegrante = :3busca OR nomeIntegrante like :4busca'
$query3 = $conect->prepare('SELECT * from tbEntradaDoacao inner join tbItemDoacao on tbItemDoacao.idItemDoacao=tbEntradaDoacao.idItemDoacao inner join tbCategoriaDoacao on tbItemDoacao.idCategoriaDoacao=tbCategoriaDoacao.idCategoriaDoacao inner join tbDoador on tbDoador.idDoador=tbEntradaDoacao.idDoador where ativaEntradaDoacao = 1');
$query3->execute();

$resultadoentra = $query3->fetchAll(PDO::FETCH_ASSOC);

$query3 = $conect->prepare('SELECT * from tbIntegrantes inner join tbFamilia on tbIntegrantes.idFamilia=tbFamilia.idFamilia where chefeIntegrante = 1 and ativaFamilia = 1');
$query3->execute();
$query4 = $conect->prepare('SELECT * from tbDoador');
$query4->execute();
$query5 = $conect->prepare('SELECT * from tbItemDoacao');
$query5->execute();
$query6 = $conect->prepare('SELECT * from tbCategoriaDoacao');
$query6->execute();


//Resultado do comando adicionado a uma Array.
$resultadofamilia = $query3->fetchAll(PDO::FETCH_ASSOC);
$resultadodoador = $query4->fetchAll(PDO::FETCH_ASSOC);
$itemdoacao = $query5->fetchAll(PDO::FETCH_ASSOC);
$categoriaitem = $query6->fetchAll(PDO::FETCH_ASSOC);


?>


<html>
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
<h2 style="font-weight: bold;color:black;">DOAÇÕES ENTREGUES ARQUIVADAS</h2> 
<hr>
</div>
</div>
<div class="row">

<div class="large-8 large-centered column">
<div class="col-sm-12" style="align-content:center;text-align:center;align-self:center;">
<div>

<p style="font-size: 26px; line-height: 30px; letter-spacing: 3px;">Procure pelas doações cadastradas usando os filtros de busca e pela lista abaixo.</p>
<br><br>
</div>
</div>
</div>
</div>



<div class="row">
<div class="col-sm-1"></div>
<div class="col-sm-10" style="align-content:center;margin-bottom:5%;align-self:center;background-color:#225C81;color:white;border-radius:20px;">
<form action="" method="get" style="padding:3%;">
<input type="hidden" name="value" id="value" value="1"/>
<div class="row">
<div class="col-sm-12" style="text-align:center;"><h4 class=" form-label" >Filtros de busca</h4><br></div>

<div class=" col-sm-4" >
<label for="buscanome" class=" form-label">Ordem dos resultados:</label>
<br>
<select name="ordem" class="inputpesquisa form-select" class="form-select" id="ordem">
<option value="0">Mais recentes</option>
<option value="1">Menos recentes</option>
<option value="2">Maiores quantidades</option>
<option value="3">Menores quantidades</option>
</select>
</div>
<div class=" col-sm-5" >
<label for="buscanome" class=" form-label">Doador:</label>
<br>
<select name="doador" class="inputpesquisa form-select" class="form-select" id="doador">
<option value="">---</option>
<?php if(count($resultadodoador)){ foreach($resultadodoador as $doador){?>
<option value="<?php echo $doador['idDoador']?>"><?php echo $doador['nomeDoador']?></option>
<?php }}?>
</select>
</div>
<div class=" col-sm-3" >
<label for="buscanome" class=" form-label">Categoria:</label>
<br>
<select name="categori" class="inputpesquisa form-select" class="form-select" id="categori">
<option value="">---</option>
<?php if(count($categoriaitem)){ foreach($categoriaitem as $citem){?>
<option value="<?php echo $citem['idCategoriaDoacao']?>"><?php echo $citem['descCategoriaDoacao']?></option>
<?php }}?>
</select>
</div>
</div>

<div class="row">
<div class="col-sm-9"></div> 
<div class=" col-sm-3" >   
<br>
<button type="submit"  class="button icon-add" style="padding-left:40px">Aplicar filtros</button>
</div>
</div>
</form>
</div>
</div>
<section class="testimonials">
<div class="title">
<p style="font-size:20px;font-weight: bold;">Resultados encontrados para esta busca: <?php echo count($resultadosaida);?></p>


</div>
<a href="pesquisa-entredoacao.php?value=0"><button type="button"  style="padding-left:40px;" class="button icon-archive">Ver doações ativas</button></a>
<br>
<br>
<table class="table table-hover">
<thead>
<tr>
<th>Familia beneficiada</th>
<th>Data de doação</th>
<th>Quantidade</th>
<th>Item doado</th>
<th></th>
<th></th>
</tr>
</thead>
<tbody>
<?php
if(count($resultadosaida)){
foreach($resultadosaida as $saida){
?>

<tr>
<td><a style="color:black;" href="gerenciar-familia.php?id=<?php echo $saida['idFamilia']?>"><?php echo $saida['chefeFamilia']?></a></td>
<td><?php echo date('d/m/Y', strtotime($saida['dataSaidaDoacao']))?> </td>
<td><?php echo $saida['qtdeSaidaDoacao']?> </td>
<td><?php echo $saida['descItemDoacao']?> </td> 
<td><a href="restaurar-doacaoentregue.php?id=<?php echo $saida['idSaidaDoacao'] ?>"><button type="button"  style="padding-left:40px;" class="button icon-archive" >Restaurar</button></a>  </td>   
<td><a href="excluir-doacaoentregue.php?id=<?php echo $saida['idSaidaDoacao'] ?>"> <button onclick="return confirm('Deseja realmente excluir?')" type="button"  style="padding-left:40px;" class="button icon-delete2">Excluir</button></a></td>    
</tr>

<?php
}
}else{
?>
<p>Não há doações cadastradas</p>   
<?php
}
?>
</tbody>

</table>
</section>

<footer>
<div class="row">
<div class="large-6 medium-12 column">
<ul class="social fa-ul">            
</ul>
</div>
<div class="large-6 medium-12 column">
<div class="copyright">
© Create By OLYMPUS 
</div>   

</div>
</div>
</footer>

</body>
</html>












