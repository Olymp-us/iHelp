<?php
include('../verifica-login.php');
include('../conexao.php');


//Armazena o comando e executa o comando.
//'SELECT chefeFamilia,rendaFamilia,idPrioridade, bairroFamilia, logradouroFamilia, numeroFamilia, complementoFamilia, referenciaFamilia, numeroTelefone from tbFamilia INNER JOIN tbIntegrantes ON tbIntegrantes.idFamilia=tbFamilia.idFamilia INNER JOIN tbTelefone ON tbTelefone.idFamilia=tbFamilia.idFamilia WHERE chefeFamilia like :1busca OR rgIntegrante = :2busca OR cpfIntegrante = :3busca OR nomeIntegrante like :4busca'
$query1 = $conect->prepare('SELECT * from tbBeneficios');
$query1->execute();
$query2 = $conect->prepare('SELECT * from tbCategoriaDoacao');
$query2->execute();
$query3 = $conect->prepare('SELECT * from tbPrioridade');
$query3->execute();
$query4 = $conect->prepare('SELECT idItemDoacao,descItemDoacao, descCategoriaDoacao, Quantidade from tbItemDoacao inner join tbCategoriaDoacao on tbCategoriaDoacao.idCategoriaDoacao = tbItemDoacao.idCategoriaDoacao ');
$query4->execute();


//Resultado do comando adicionado a uma Array.
$resultadobeneficio = $query1->fetchAll(PDO::FETCH_ASSOC);
$resultadocategoria = $query2->fetchAll(PDO::FETCH_ASSOC);
$resultadoprioridade = $query3->fetchAll(PDO::FETCH_ASSOC);
$resultadoitemdoacao = $query4->fetchAll(PDO::FETCH_ASSOC);


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

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        
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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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
<div class="large-8 large-centered column" style="margin-bottom:0%;">
<div class="title" style="margin-bottom:0%;">
<br><br><br>
<h2 style="font-weight: bold;color:black;">GERENCIAMENTO DE CATEGORIAS</h2> 
<hr style="margin-bottom:0%;">
<div class="large-8 large-centered column" style="margin-top:0%;text-align:center;">
<div class="col-sm-12" style="margin-top:0%;align-content:center;align-self:center;">
<div>
<h1  style="font-size: 35px; font-weight: bold; font-style: italic;color:black;">Gerencie, atualize ou exclua as categorias do sistema.</h1>

<p style="font-size: 26px; line-height: 30px; letter-spacing: 3px;">Categorias cadastradas.</p>
</div>
</div>
</div>
</div>
</div>
	<div style="padding-left:15px">
<button type="button" style="padding-left:40px;" class="button icon-archive" data-toggle="modal" id="modalbutton3" data-target="#exampleModalCenter3" class="button icon-add" style="margin-top:0%;padding-left:40px;">Consultar itens em estoque </button></div>
    
    
    
    
    
    
    <div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <form action="adicionar-beneficio.php" onsubmit="return validaBeneficio()">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Cadastrar novo benefício</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="row">
<div class="col-sm-12">
    
<label for="" class="form-label">Novo benefício:</label>
<input type="text" name="beneficio" id="beneficio" class="inputpesquisa defaultText form-control" placeholder="Digite o nome do novo benefício">
<br>
</div>
</div>
<br>
            <br>

      </div>
      <div class="modal-footer">
        <button type="reset" style="padding-left:40px;" class="button icon-delete2" data-dismiss="modal">Cancelar</button>
        <button type="submit"  style="padding-left:40px;" class="button icon-add" >Adicionar</button>
      </div>
                  </form>
    </div>
  </div>
</div>
    
    
    
    
    
    
    
    
        <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle2" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
<form action="adicionar-item.php" onsubmit="return validaItem()">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Cadastrar novo item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            
<label for="" class="form-label">Novo item:</label>
<br>
<input type="text" name="item" id="item" class="inputpesquisa defaultText form-control" placeholder="Digite o nome do novo item">
<br>
<br>
<label for="" class="form-label">Categoria do novo item:</label>
<br>
<select list="categori" name="categori" class="form-select" id="categori">
<option value="">Categoria</option>
<?php if(count($resultadocategoria)){ foreach($resultadocategoria as $categorias){?>
<option value="<?php echo $categorias['idCategoriaDoacao']?>"><?php echo $categorias['descCategoriaDoacao']?></option><?php }} ?>
</select>
<br>
      </div>
      <div class="modal-footer">
        <button type="reset" style="padding-left:40px;" class="button icon-delete2" data-dismiss="modal">Cancelar</button>
        <button type="submit"  style="padding-left:40px;" class="button icon-add" >Adicionar</button>
      </div>
                  </form>
    </div>
  </div>
</div>
    
    
    
    
    
    
    
    <div class="modal fade" id="exampleModalCenter3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle3" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <form action="adicionar-beneficio.php" onsubmit="return validaBeneficio()">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Estoque</h5>
		  
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
		  
      </div>
			
      <div class="modal-body" style="padding-bottom:0">
 <table class="table table-hover" >
<thead>
	<a href="pdf-estoque.php" target="_blank" style="text-decoration: none;">
<input type="button" class="button icon-pdf" style="padding-left:40px;"value="PDF"/>
</a>
	<br>
	<br>
<tr>
<th scope="col">Item</th>
<th scope="col">Em Estoque</th>


</tr>
</thead>
<tbody>
<?php
if(count($resultadoitemdoacao)){
foreach($resultadoitemdoacao as $item){
?>

<tr>

<th> <?php echo $item['descItemDoacao']?></th>
<th> <?php echo $item['Quantidade']?></th>

	




<?php
}
}else{
?>
<p>Não há itens cadastrados</p>   
<?php
}
?>
</tr>
</tbody>
</table>
      </div>
      <div class="modal-footer">
        <button type="reset" style="padding-left:40px;" class="button icon-delete2" data-dismiss="modal">Fechar</button>
      </div>
                  </form>
    </div>
  </div>
</div>
    
    
    
    
    

    
    
    
    
    
    
    
    
    
    
    
    
</section>
<div class="row">
<div class="col-sm-6">
<table class="table table-hover">
<thead>
<tr>
<th scope="col">Benefício</th>
<th scope="col"><button type="button" style="padding-left:40px;" class="button icon-add" data-toggle="modal" id="modalbutton1" data-target="#exampleModalCenter1" class="button icon-add" style="margin-top:0%;padding-left:40px;" >Adicionar</button>
</th>
</tr>
</thead>
<tbody>
<?php
if(count($resultadobeneficio)){
foreach($resultadobeneficio as $beneficios){
?>

<tr>

<th> <?php echo $beneficios['descBeneficios']?></th>
<th><a href="excluir-beneficio.php?id=<?php echo $beneficios['idBeneficios'] ?>"  onclick="return confirm('Deseja realmente excluir?')" ><button type="button"  class="button icon-delete2" style="padding-left:40px;">Excluir</button></a></th>   





<?php
}
}else{
?>
<p>Não há beneficios cadastrados</p>  
<?php
}
?>
</tr>
	<br>
</tbody>
</table>
</div>

<div class="col-sm-6">
<table class="table table-hover" >
<thead>
<tr>
<th scope="col">Item</th>
<th scope="col">Categoria</th>
<th scope="col"><button type="button" style="padding-left:40px;" class="button icon-add" data-toggle="modal" id="modalbutton1" data-target="#exampleModalCenter2" class="button icon-add" style="margin-top:0%;padding-left:40px;"> Adicionar</button>
</th>
</tr>
</thead>
<tbody>
<?php
if(count($resultadoitemdoacao)){
foreach($resultadoitemdoacao as $item){
?>

<tr>

<th> <?php echo $item['descItemDoacao']?></th>
<th> <?php echo $item['descCategoriaDoacao']?></th>
<th><a href="excluir-itemdoacao.php?id=<?php echo $item['idItemDoacao'] ?>"  onclick="return confirm('Deseja realmente excluir?')"><button type="button"  class="button icon-delete2" style="padding-left:40px;">Excluir</button></a></th>



<?php
}
}else{
?>
<p>Não há itens cadastrados</p>   
<?php
}
?>
</tr>
	<br>
</tbody>
</table>
</div>
</div>



</div>
</div>
</div>
<br>
<br>


</html>

<script>
$('#exampleModalCenter1').on('shown.bs.modal', function () {
  $('#modalbutton1').trigger('focus')
})
    $('#exampleModalCenter2').on('shown.bs.modal', function () {
  $('#modalbutton2').trigger('focus')
})
     $('#exampleModalCenter3').on('shown.bs.modal', function () {
  $('#modalbutton3').trigger('focus')
})
function abrirFormBeneficio() {
document.getElementById("formBeneficio").style.display = "block";
document.getElementById("formCategoria").style.display = "none";
document.getElementById("formItem").style.display = "none";
}

function fecharFormBeneficio() {
document.getElementById("formBeneficio").style.display = "none";
} 
function abrirFormCategoria() {
document.getElementById("formCategoria").style.display = "block";
document.getElementById("formBeneficio").style.display = "none";
document.getElementById("formItem").style.display = "none";
}
function fecharFormCategoria() {
document.getElementById("formCategoria").style.display = "none";
}
function abrirFormItem(){
document.getElementById("formItem").style.display = "block";
document.getElementById("formBeneficio").style.display = "none";
document.getElementById("formCategoria").style.display = "none";
}

function fecharFormItem() {
document.getElementById("formItem").style.display = "none";
}

function validaBeneficio(){
var beneficio = document.getElementById("beneficio").value;
if (beneficio == "" || beneficio == null){
alert("Preencha o campo!");
return false;
}
}
function validaCategoria(){
var categoria = document.getElementById("categoria").value;
if (categoria == "" || categoria == null){
alert("Preencha o campo!");
return false;
}
}
function validaItem(){
var categori = document.getElementById("categori").value;
var item = document.getElementById("item").value;
if (categori == "" || categori == null || item == "" || item == null){
alert("Preencha os campos!");
return false;
}
}

</script>