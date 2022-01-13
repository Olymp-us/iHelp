<?php
include('../verifica-login.php');
include('../conexao.php');

$id = $_GET['id'];

$query = $conect->prepare('SELECT `idFamilia`, `chefeFamilia`, `rendaFamilia`, `cepFamilia`, `bairroFamilia`, `logradouroFamilia`, `numeroFamilia`, `complementoFamilia`, `referenciaFamilia`, `situacaoImovelFamilia`, `ativaFamilia`,`descPrioridade`,tbFamilia.idPrioridade from tbFamilia INNER JOIN tbPrioridade ON tbFamilia.idPrioridade = tbPrioridade.idPrioridade where idFamilia = :id');
$query->bindParam(':id', $id, PDO::PARAM_INT);
$query->execute();
$fam = $query->fetchAll(PDO::FETCH_ASSOC);

$query = $conect->prepare('SELECT `idIntegrante`, `nomeIntegrante`, `dataNascIntegrante`, `generoIntegrante`, `corIntegrante`, `escolaridadeIntegrante`, `estadoCivilIntegrante`, `rgIntegrante`, `cpfIntegrante`,`chefeIntegrante` from tbIntegrantes WHERE idFamilia = :id');
$query->bindParam(':id', $id, PDO::PARAM_INT);
$query->execute();
$integ = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<html lang="pt-br">
<head>
<title>iHelp</title>
<link REL = "SHORTCUT ICON" HREF = "../images/favicon.ico"  type = "image/x-icon">
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
<div class="large-8 large-centered column" style="margin-bottom:0%;">
<div class="title" style="margin-bottom:0%;">
<br><br><br>
<h2 style="font-weight: bold;color:black;">GERENCIAMENTO DE FAMÍLIA</h2> 
<hr style="margin-bottom:0%;">
</div>
</div>

<div class="row">
<div class="col-sm-1"></div>
<div class="col-sm-10" style="align-content:center;margin-bottom:2%;background-color:#225C81;color:white;border-radius:20px;">
<div class="row">
<div class="large-8 large-centered column" style="margin-top:0%;text-align:center;">
<div class="col-sm-12" style="margin-top:0%;align-content:center;align-self:center;">
<div>
<h1  style="font-size: 35px; font-weight: bold; font-style: italic;color:white;">Informações da família</h1>

<p style="font-size: 26px; line-height: 30px; letter-spacing: 3px;color:white;">Informações gerais</p>

</div>
</div>
</div>
</div>
<form action="alterar-familia.php" method="post" name="form"  style="padding:2%;" onsubmit="return validaForm();">

<?php
if(count($fam)){
foreach($fam as $Fam){
?>
<div class="row">
<div class="col-sm-5">
<input type="hidden" name="idfamilia" id="idfamilia" value="<?php echo $Fam['idFamilia']?>" title="Nome completo do chefe familiar" placeholder="Nome completo do chefe familiar" class="inputpesquisa defaultText form-control" />
<label for="" class="form-label">Nome do chefe familiar:</label>
<br>
<input type="text" name="nomechefe" readonly id="nomechefe" value="<?php echo $Fam['chefeFamilia']?>" title="Nome completo do chefe familiar" placeholder="Nome completo do chefe familiar" class="inputpesquisa defaultText form-control" />
</div>
<div class="col-sm-4">
<label for="" class="form-label">Nível de prioridade da família:</label>
<br>
<select type="text" name="nivelpriori" disabled value="" id="nivelpriori" class="inputpesquisa defaultText form-control" placeholder="Nível de prioridade">
<option value="<?php echo $Fam['idPrioridade']?>"><?php echo $Fam['descPrioridade']?></option>
<option value="1">Vermelho</option>
<option value="2">Amarelo</option>
<option value="3">Verde</option>
</select>
</div>
<div class="col-sm-3">
<label for="" class="form-label">Total de integrantes:</label>
<br>
<input type="text" name="ttintegr" readonly value="<?php echo count($integ)?>" id="ttintegr" class="inputpesquisa defaultText form-control" placeholder="Bairro">
</div>
</div>
<br>
<div class="row"> 
<div class="col-sm-2">
<label for="" class="form-label">CEP da família:</label>
<br>
<input type="text" name="cep" readonly value="<?php echo $Fam['cepFamilia']?>" id="cep" placeholder="CEP" class="inputpesquisa defaultText form-control" onkeyup="validaEndereco()"/>
</div> 
<div class="col-sm-3">
<label for="" class="form-label">Bairro:</label>
<br>
<input type="text" name="bairro" readonly value="<?php echo $Fam['bairroFamilia']?>" id="bairro" class="inputpesquisa defaultText form-control" placeholder="Bairro">
</div>
<div class="col-sm-5">
<label for="" class="form-label">Logradouro:</label>
<br>
<input type="text" name="endereco" readonly value="<?php echo $Fam['logradouroFamilia']?>" id="endereco" class="inputpesquisa defaultText form-control" placeholder="Endereço">
</div>
<div class="col-sm-2">
<label for="" class="form-label">Número:</label>
<br>
<input type="text" name="numero" readonly value="<?php echo $Fam['numeroFamilia']?>" id="numero" class="inputpesquisa defaultText form-control" placeholder="Número">
</div>
</div>
<br>
<div class="row">
<div class="col-sm-2">
<label for="" class="form-label">Complemento:</label>
<br>
<input type="text" name="complemento" readonly value="<?php if($Fam['complementoFamilia']){echo $Fam['complementoFamilia'];}else {echo "---";} ?>" id="complemento" class="inputpesquisa defaultText form-control" placeholder="Complemento">
</div>
<div class="col-sm-3">
<label for="" class="form-label"> Referência:</label>
<br>
<input type="text" name="referencia" readonly value="<?php if($Fam['referenciaFamilia']){echo $Fam['referenciaFamilia'];}else {echo "---";} ?>" id="referencia" class="inputpesquisa defaultText form-control" placeholder="Referência">
</div>
<div class="col-sm-3">
<label for="" class="form-label">Situação do imóvel:</label>
<br>
<select name="situacaoimovel" disabled class="inputpesquisa defaultText form-control" id="sitacaoimovel">
<option value="<?php echo $Fam['situacaoImovelFamilia']?>"><?php echo $Fam['situacaoImovelFamilia']?></option>
<option value="Própria Quitada">Própria Quitada</option>
<option value="Alugada">Alugada</option>
<option value="Cedida">Cedida</option>
<option value="Financiada">Financiada</option>
<option value="Ocupação">Ocupação</option>
</select>
</div>
<div class="col-sm-4">
<label for="" class="form-label">Renda total da família:</label>
<br>
<select  id="renda" disabled class="inputpesquisa defaultText form-control" name="renda">
<option value="<?php echo $Fam['rendaFamilia']?>"><?php echo $Fam['rendaFamilia']?></option>
<option value="Menos de 01 Salário mínimo">Menos de 01 Salário mínimo</option>
<option value="01 a 02 Salários mínimos">01 a 02 Salários mínimos</option>
<option value="03 a 05 Salários mínimos">03 a 05 Salários mínimos</option>
<option value="+ de 05 Salários mínimos">+ de 05 Salários mínimos</option>
</select>
</div>
</div>
<br>

<br> 
<br>
<div class="row">
<div class="col-sm-2">
<a href="arquivar-familia.php?id=<?php echo $Fam['idFamilia'] ?>">
<input type="button" value="Arquivar família" class="button icon-archive" style="padding-left:40px;"/>
</a>
</div>
<div class="col-sm-1"></div>
<div class="col-sm-2">
<a href="excluir-familia.php?id=<?php echo $Fam['idFamilia'] ?>" onclick="return confirm('Deseja realmente excluir?')";>
<input type="button" value="Excluir família"  class="button icon-delete2" style="padding-left:40px;"/>
</a>
</div>
<div class="col-sm-1" style=" width:1%"></div>
<div class="col-sm-2">
<input type="button" value="Cancelar" class="button invisible-content icon-cancel" style="padding-left:40px;"  id="cancelarfamilia" onclick="fecharEdicao()"/>
<br>
<br>
</div>
<div class="col-sm-2">
<input type="submit" value="Finalizar edições"  class="button invisible-content icon-check" style="padding-left:40px;" id="editarfamilia"/>
<br>
<br>
</div>
<div class="col-sm-2">
<input type="button" value="Editar família"  class="button icon-edit" style="padding-left:40px;" id="abrireditar" onclick="abrirEdicao()"/>
<br>
<br>
</div>
</div>
<?php }
}?>
</form>
</div>
</div>



</section>

<!-- Aqui poderia aparecer o resultado do formulário em específico --> 
<section class="testimonials">
<div class="row">

<div class="col-sm-12" style="margin-top:0%;align-content:center;text-align:center;align-self:center; "></div>
<div><p style="font-size: 26px; line-height: 30px; letter-spacing: 3px;text-align:center;color:black;"> Integrantes cadastrados</p>
</div>
</div>
<?php
if(count($integ)){
foreach($integ as $Integ){
?> 
<div class="row " id="">
	<div class="col-sm-1" ></div>
<div class="col-sm-10 invisible-content" style="align-content:center;text-align:center;margin-bottom:5%;background-color:#225C81; color:white;border-radius:20px;   " id="integrante-<?php echo $Integ['idIntegrante']?>">
<form action="alterar-integrante.php?id=<?php echo $id?>" method="post" name="form" style="padding:7%;" onsubmit="return validaForm();">

<div class="row">

<div class="col-sm-4">
<input type="hidden" name="idintegrante" id="idintegrante" value="<?php echo $Integ['idIntegrante']?>" title="Nome completo do chefe familiar" placeholder="Nome completo do chefe familiar" class="inputpesquisa defaultText form-control" />
<label for="" class="form-label">Nome:</label>
<br>
<input type="text" name="nome"  id="nome" value="<?php echo $Integ['nomeIntegrante']?>" title="Nome completo do chefe familiar" placeholder="Nome completo do chefe familiar" class="inputpesquisa defaultText form-control" />
</div>
<div class="col-sm-3">
<label for="" class="form-label">Data de nascimento:</label>
<br>
<input type="date" name="datanasc" value="<?php echo $Integ['dataNascIntegrante']?>" id="datanasc" class="inputpesquisa defaultText form-control" placeholder="Bairro">
</div>
<div class="col-sm-2">
<label for="" class="form-label">Cor:</label>
<br>
<select type="text" name="cor" value="<?php echo $Integ['corIntegrante']?>" id="cor" class="inputpesquisa defaultText form-control" placeholder="Bairro">
<option value="<?php echo $Integ['corIntegrante']?>"><?php echo $Integ['corIntegrante']?></option>
<option value="Preta">Preta</option>
<option value="Parda">Parda</option>
<option value="Branca">Branca</option>
<option value="Amarela">Amarela</option>
<option value="Indigena">Indigena</option>
</select>
</div>
<div class="col-sm-3">
<label for="" class="form-label">Gênero:</label>
<br>
<select type="text" name="genero" value="<?php echo $Integ['generoIntegrante']?>" id="genero" class="inputpesquisa defaultText form-control" placeholder="Endereço">
<option value="<?php echo $Integ['generoIntegrante']?>"><?php echo $Integ['generoIntegrante']?></option>
<option value="Feminino cis">Feminino cis</option>
<option value="Masculino cis">Masculino cis</option>
<option value="Transexual">Transexual</option>
<option value="Travesti">Travesti</option>
<option value="Outros">Outros</option>
<option value="Prefere não identificar">Prefere não identificar</option>
</select>
</div>
</div>
<br>
<div class="row"> 
<div class="col-sm-2">
<label for="" class="form-label">RG:</label>
<br>
<input type="text" name="rg" value="<?php echo $Integ['rgIntegrante']?>" id="rg" placeholder="CEP" class="inputpesquisa defaultText form-control" onkeyup="validaEndereco()"/>
</div> 
<div class="col-sm-3">
<label for="" class="form-label">CPF:</label>
<br>
<input type="text" name="cpf" value="<?php echo $Integ['cpfIntegrante']?>" id="cpf" class="inputpesquisa defaultText form-control" placeholder="Bairro">
</div>
<div class="col-sm-2">
<label for="" class="form-label">Escolaridade:</label>
<br>
<select type="text" name="escolaridade" value="<?php echo $Integ['escolaridadeIntegrante']?>" id="escolaridade" class="inputpesquisa defaultText form-control" placeholder="Número">
<option value="<?php echo $Integ['escolaridadeIntegrante']?>"><?php echo $Integ['escolaridadeIntegrante']?></option>
<option value="Sem instrução">Sem instrução</option>
<option value="Ensino fundamental inconcluído/cursando">Ensino fundamental inconcluído/cursando</option>
<option value="Ensino fundamental concluído">Ensino fundamental concluído</option>
<option value="Ensino médio inconcluído/cursando">Ensino médio inconcluído/cursando</option>
<option value="Ensino médio concluído">Ensino médio concluído</option>
<option value="Ensino superior inconcluído/cursando">Ensino superior inconcluído/cursando</option>
<option value="Ensino superior concluído">Ensino superior concluído</option>
<option value="Outros...">Outros...</option>
</select>
</div>
<div class="col-sm-3">
<label for="" class="form-label">Estado cívil:</label>
<br>
<select type="text" name="estadocivil" value="<?php echo $Integ['estadoCivilIntegrante']?>" id="estadocivil" class="inputpesquisa defaultText form-control" placeholder="Complemento">
<option value="<?php echo $Integ['estadoCivilIntegrante']?>"><?php echo $Integ['estadoCivilIntegrante']?></option>
<option value="Solteiro(a)">Solteiro(a)</option>
<option value="Casado(a)">Casado(a)</option>
<option value="Viúvo(a)">Viúvo(a)</option>
<option value="União Estável">União Estável</option>
<option value="Morando Junto">Morando Junto</option>
<option value="Relação complicada/outros...">Relação complicada/outros...</option>
</select>
</div>
<div class="col-sm-2">
<label for="" class="form-label"> Chefe famíliar:</label>
<br>
<select type="text" name="chefe" value="<?php if($Integ['chefeIntegrante'] == 1){echo "Sim";}else{echo "Não";}?>" id="chefe" class="inputpesquisa defaultText form-control" placeholder="Referência">
<option value="<?php echo $Integ['chefeIntegrante']?>"><?php if($Integ['chefeIntegrante'] == 1){echo "Sim";}else{echo "Não";}?></option>
<option value="1">Sim</option>
<option value="0">Não</option>
</select>
</div>
</div>
<br>
<div class="row">


<div class="col-sm-6"></div>
	<div class="col-sm-1"></div>
<div class="col-sm-2">
<input type="button" value="Cancelar" onclick="fecharFicha(<?php echo $Integ['idIntegrante']?>)" class="button icon-cancel" style="padding-left:40px;"/>
<br>
<br>
</div>

<div class="col-sm-3">
<input type="submit" value="Finalizar edições" class="button icon-check" style="padding-left:40px;"/>
</div>

	
</div>
</form>
</div>
</div>

<?php }
}?>


<table class="table table-hover">
<thead>
<tr>
<th scope="col"></th>
<th scope="col">Nome</th>
<th scope="col">Data de nascimento</th>
<th scope="col">Gênero</th>
<th scope="col">Estado cívil</th>
<th scope="col">Escolaridade</th>
<th scope="col">Chefe familiar?</th>
<th scope="col"><a href="formulario-integrante.php?id=<?php echo $Fam['idFamilia']?>"><input type="button" value="Novo Integrante" class="button icon-add" style="padding-left:40px;" /></a></th>
<th scope="col"></th>
</tr>
</thead>
<tbody>


<?php
if(count($integ)){
foreach($integ as $Integ){
?> 
<tr>

<th scope="col"></th>
<th> <?php echo $Integ['nomeIntegrante']?></th>
<th> <?php echo date('d/m/Y', strtotime($Integ['dataNascIntegrante']))?></th>
<th> <?php echo $Integ['generoIntegrante']?></th>
<th> <?php echo $Integ['estadoCivilIntegrante']?></th>
<th> <?php echo $Integ['escolaridadeIntegrante']?></th>
<th> <?php if($Integ['chefeIntegrante'] == 1){echo "Sim";}else{echo "Não";}?></th>
<th><a href="excluir-integrante.php?id=<?php echo $Integ['idIntegrante']?>"><input type="button" value="Excluir" class="button icon-delete2"  style="padding-left:40px;" onclick="return confirm('Deseja realmente excluir?')"/></a></th>
<th> <input type="button" value="Editar" class="button icon-edit"  style="padding-left:40px;" onclick="abrirFicha(<?php echo $Integ['idIntegrante']?>)"/></th>
</tr>

<?php }
}?>
</tbody>
</table>
</section> 


</html>
<script type="text/javascript">

function validaForm(){
//Verifica se tudo está preenchido

var Mensagem = "";

if (document.form.sitacaoimovel.value == ""){
var Mensagem = "Preencha todos os campos!";
document.getElementById("sitacaoimovel").style.borderColor = "red";
document.getElementById("sitacaoimovel").focus();
}
if (document.form.numero.value == ""){
var Mensagem = "Preencha todos os campos!";
document.getElementById("numero").style.borderColor = "red";
document.getElementById("numero").focus();
}
if (document.form.bairro.value == ""){
var Mensagem = "Preencha todos os campos!";
document.getElementById("bairro").style.borderColor = "red";
document.getElementById("bairro").focus();
}
if (document.form.endereco.value == ""){
var Mensagem = "Preencha todos os campos!";
document.getElementById("endereco").style.borderColor = "red";
document.getElementById("endereco").focus();
}
if (document.form.cep.value == ""){
var Mensagem = "Preencha todos os campos!";
document.getElementById("cep").style.borderColor = "red";
document.getElementById("cep").focus();
}
if (document.form.celular.value == ""){
var Mensagem = "Preencha todos os campos!";
document.getElementById("celular").style.borderColor = "red";
document.getElementById("celular").focus();
}
if (document.form.renda.value == ""){
var Mensagem = "Preencha todos os campos!";
document.getElementById("renda").style.borderColor = "red";
document.getElementById("renda").focus();
}
if (document.form.escolaridade.value == ""){
var Mensagem = "Preencha todos os campos!";
document.getElementById("escolaridade").style.borderColor = "red";
document.getElementById("escolaridade").focus();
}
if (document.form.estadocivil.value == ""){
var Mensagem = "Preencha todos os campos!";
document.getElementById("estadocivil").style.borderColor = "red";
document.getElementById("estadocivil").focus();
}
if (document.form.genero.value == ""){
var Mensagem = "Preencha todos os campos!";
document.getElementById("genero").style.borderColor = "red";
document.getElementById("genero").focus();
}
if (document.form.cpf.value == ""){
var Mensagem = "Preencha todos os campos!";
document.getElementById("cpf").style.borderColor = "red";
document.getElementById("cpf").focus();
}
if (document.form.rg.value == ""){
var Mensagem = "Preencha todos os campos!";
document.getElementById("rg").style.borderColor = "red";
document.getElementById("rg").focus();
}
if (document.form.datanasc.value == "" || document.form.datanasc.value == null){
var Mensagem = "Preencha todos os campos!";
document.getElementById("datanasc").style.borderColor = "red";
document.getElementById("datanasc").focus();
}
if (document.form.nome.value == ""){
var Mensagem = "Preencha todos os campos!  ";
document.getElementById("nome").style.borderColor = "red";
document.getElementById("nome").focus();
}
//Fim da verificação

if (validaData()<6570 || validaData()> 40150){
var Mensagem = Mensagem + "Data de nascimento inválida! ";
document.getElementById("datanasc").style.borderColor = "red";
document.getElementById("datanasc").focus();
}
if (validaCpf()==false){
var Mensagem = Mensagem + " CPF inválido! ";
document.getElementById("cpf").style.borderColor = "red";
document.getElementById("cpf").focus();
}
if (document.form.nome.value != "" && document.form.nome.value.length<=2){
var Mensagem = Mensagem + " Nome inválido! ";
document.getElementById("nome").style.borderColor = "red";
document.getElementById("nome").focus();
}
if (document.form.rg.value.length>12 || document.form.rg.value.length<5 && document.form.rg.value.length!=0){
var Mensagem = Mensagem + " RG inválido! ";
document.getElementById("rg").style.borderColor = "red";
document.getElementById("rg").focus();
}
if (validaEndereco()==false){
var Mensagem = Mensagem + " CEP inválido! ";
document.getElementById("cep").style.borderColor = "red";
document.getElementById("cep").focus();
}



if(Mensagem!=""){
alert(Mensagem);
return false;
}
}
//Verifica se o CPF é válido
function validaCpf() {
var soma = 0;
var resto;
var cpf = document.form.cpf.value;
if (cpf == "" || cpf == null){
return true;
}
if (document.form.cpf.value.length>11 || document.form.cpf.value.length<11){
document.getElementById("cpf").style.borderColor = "red";
return false;
}

if (cpf == "00000000000" || cpf == "11111111111" || cpf == "22222222222" || cpf == "33333333333" || cpf == "44444444444" || cpf == "55555555555" || cpf == "66666666666" || cpf == "77777777777" || cpf == "88888888888" || cpf == "99999999999") {
document.getElementById("cpf").style.borderColor = "red";
return false;
}
for (i=1; i<=9; i++){ 
soma = soma + parseInt(cpf.substring(i-1, i)) * (11 - i);  
resto = (soma * 10) % 11;
}
if ((resto == 10) || (resto == 11)){  
resto = 0;
}
if (resto != parseInt(cpf.substring(9, 10))){ 
document.getElementById("cpf").style.borderColor = "red"; 
return false;
}
soma = 0;
for (i = 1; i <= 10; i++) {
soma = soma + parseInt(cpf.substring(i-1, i)) * (12 - i);
resto = (soma * 10) % 11;
}

if ((resto == 10) || (resto == 11)){  
resto = 0;
}
if (resto != parseInt(cpf.substring(10, 11))) {
document.getElementById("cpf").style.borderColor = "red";
return false;
}
document.getElementById("cpf").style.borderColor = "green";
}

//Calcula a quantidade de dias entre uma data e outra.
function validaData() {
const agora = moment(new Date()); // Data de hoje
const data = moment(document.form.datanasc.value); // Outra data no passado
const diferenca = moment.duration(agora.diff(data));

// Mostra a diferença em dias
const days = diferenca.asDays();
return days;

}

function validaEndereco() {
$.getScript("http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep="+$("#cep").val(),
function(){
if(  resultadoCEP["resultado"] ){
// troca o valor dos elementos
$("#endereco").val(unescape(resultadoCEP["tipo_logradouro"])+" "+unescape(resultadoCEP["logradouro"]));
$("#bairro").val(unescape(resultadoCEP["bairro"]));

var elementVar = document.getElementById("endereco");
elementVar.setAttribute("readonly", "");
document.form.endereco.style.fontColor="#000";

elementVar = document.getElementById("bairro");
elementVar.setAttribute("readonly", "");
document.form.bairro.style.fontColor="#000";
}else{
return false;
}
});
}

var button = document.getElementById("Clique");

button.addEventListener("click", function () {
var container = document.getElementById("escondido");

if (container.style.display === "none") {
container.style.display = "flex";
}
});

function abrirFicha(id) {
var name = 'integrante-' + id;
document.getElementById(name).style.display = "block";
document.getElementById(name).focus();
}
	


function fecharFicha(id) {
var name = 'integrante-' + id;
document.getElementById(name).style.display = "none";
}

function abrirEdicao(){
document.getElementById("cancelarfamilia").style.display = "block";
document.getElementById("editarfamilia").style.display = "block";
document.getElementById("abrireditar").style.display = "none";

document.getElementById("nomechefe").removeAttribute("readonly", "");

document.getElementById("renda").removeAttribute("disabled", "");

document.getElementById("cep").removeAttribute("readonly", "");

document.getElementById("endereco").removeAttribute("readonly", "");

document.getElementById("bairro").removeAttribute("readonly", "");

document.getElementById("numero").removeAttribute("readonly", "");

document.getElementById("sitacaoimovel").removeAttribute("disabled", "");

document.getElementById("complemento").removeAttribute("readonly", "");

document.getElementById("referencia").removeAttribute("readonly", "");

document.getElementById("nivelpriori").removeAttribute("disabled", "");
}
function fecharEdicao(){
document.getElementById("cancelarfamilia").style.display = "none";
document.getElementById("editarfamilia").style.display = "none";
document.getElementById("abrireditar").style.display = "block";

document.getElementById("nomechefe").setAttribute("readonly", "");

document.getElementById("renda").setAttribute("disabled", "");

document.getElementById("cep").setAttribute("readonly", "");

document.getElementById("endereco").setAttribute("readonly", "");

document.getElementById("bairro").setAttribute("readonly", "");

document.getElementById("numero").setAttribute("readonly", "");

document.getElementById("sitacaoimovel").setAttribute("disabled", "");

document.getElementById("complemento").setAttribute("readonly", "");

document.getElementById("referencia").setAttribute("readonly", "");

document.getElementById("nivelpriori").setAttribute("disabled", "");}
</script>