<?php
include('../verifica-login.php');
include('../conexao.php');

//Puxa todos os dados da tbPrioridade e em seguida executa.
$query1 = $conect->prepare('SELECT * from tbPrioridade');
$query1->execute();


//Resultado do comando adicionado a uma Array.
$resultadoprior = $query1->fetchAll(PDO::FETCH_ASSOC);


//Puxa todos os dados da tbBeneficios e em seguida executa.
$query2 = $conect->prepare('SELECT * from tbBeneficios');
$query2->execute();


//Resultado do comando adicionado a uma Array.
$resultadobene = $query2->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>

<html lang="pt-br">

<head>
<title>iHelp</title>
<link REL="SHORTCUT ICON" HREF="images/favicon.ico"  type="image/x-icon">
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
<h2 style="font-weight: bold;color:black;">CADASTRO DE FAMÍLIA</h2> 
<hr>
</div>
</div>
<div class="row">

<div class="large-8 large-centered column">
<div class="col-sm-12" style="align-content:center;text-align:center;align-self:center;">
<div>
<h1  style="font-size: 35px; font-weight: bold; font-style: italic;color:black;">Cadastre uma nova família!</h1>

<p style="font-size: 26px; line-height: 30px; letter-spacing: 3px;">Insira abaixo as informações do chefe familiar e também as informações gerais da família.</p>
<br><br>
</div>
</div>
</div>
</div>




<div class="row">
<div class="col-sm-1"></div>
<div class="col-sm-10" style="align-content:center;margin-bottom:5%;align-self:center;background-color:#225C81;color:white;border-radius:20px;">

<form action="adicionar-familia.php" method="POST" name="form"  onsubmit="return validaForm();" style="padding:10px;">
<div class="row" style="margin-top:1%;">
<span style="font-size: 26px;margin-bottom:3%;text-align:center;">...</span>
<div class="col-sm-5">
<label class=" form-label">Nome do chefe de família:<font style="color:red">*</font></label>
<br>
<input type="text" name="nome" id="nome" class="inputpesquisa defaultText form-control"  title="Nome completo do chefe familiar" placeholder="Nome completo do chefe familiar" class="defaultText" />
</div>
<div class="col-sm-3">
<label class=" form-label">Data de nascimento:<font style="color:red">*</font></label>
<br>
<input id="datanasc" name="datanasc" class="inputpesquisa defaultText form-control"  type="date">
</div>
<div class="col-sm-2">
<label class=" form-label">Gênero:</label>
<br>
<select name="genero" class="inputpesquisa form-select" id="genero">
<option value="">Gênero</option>
<option value="Feminino cis">Feminino cis</option>
<option value="Masculino cis">Masculino cis</option>
<option value="Transexual">Transexual</option>
<option value="Travesti">Travesti</option>
<option value="Outros">Outros</option>
<option value="Prefere não identificar">Prefere não identificar</option>
</select> 
</div>
<div class="col-sm-2">
<label class=" form-label">Cor(IBGE):</label>
<br>
<select id="cor" class="inputpesquisa form-select" class="form-select" name="cor">
<option value="">Cor (IBGE)</option>
<option value="Preta">Preta</option>
<option value="Parda">Parda</option>
<option value="Branca">Branca</option>
<option value="Amarela">Amarela</option>
<option value="Indigena">Indigena</option>
</select>
</div>
</div>
<br>
<div class="row">
<div class="col-sm-3">
<label class=" form-label">RG:<font style="color:red">*</font></label>
<br>
<input type="text" name="rg" id="rg" placeholder="RG" title="RG" class="inputpesquisa defaultText form-control" />
</div>
<div class="col-sm-3">
<label class=" form-label">CPF:<font style="color:red">*</font></label>
<br>
<input placeholder="CPF" type="text" id="cpf" name="cpf" title="O CPF deve conter 11 dígitos numéricos, separados ou não." onkeyup="validaCpf()" class="inputpesquisa defaultText form-control" />
</div>
<div class="col-sm-3">
<label class=" form-label">Estado cívil:</label>
<br>
<select name="estadocivil" class="inputpesquisa form-select" class="form-select" id="estadocivil">
<option value="">Estado Cívil</option>
<option value="Solteiro(a)">Solteiro(a)</option>
<option value="Casado(a)">Casado(a)</option>
<option value="Viúvo(a)">Viúvo(a)</option>
<option value="União Estável">União Estável</option>
<option value="Morando Junto">Morando Junto</option>
<option value="Relação complicada/outros...">Relação complicada/outros...</option>
</select>
</div>
<div class="col-sm-3">
<label class=" form-label">Escolaridade:</label>
<br>
<select name="escolaridade" class="inputpesquisa form-select" class="form-select" id="escolaridade">
<option value="">Nível de escolaridade</option>
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
</div>
<br>
<br>
<br>
<br>
<div class="row">
<div class="col-sm-4">
<label class=" form-label">Telefone residência:</label>
<br>
<input type="text" id="telefone" name="telefone" placeholder="Telefone (Fixo)" class="inputpesquisa defaultText form-control"  />
</div>
<div class="col-sm-4">
<label class=" form-label">Telefone celular:<font style="color:red">*</font></label>
<br>
<input type="text" id="celular" name="celular" placeholder="Celular" title="Celular"class="inputpesquisa defaultText form-control"  />
</div>
<div class="col-sm-4">
<label class=" form-label">Renda familiar total:<font style="color:red">*</font></label>
<br>
<select  id="renda" class="inputpesquisa form-select" class="form-select" name="renda">
<option value="">Renda familiar</option>
<option value="Menos de 01 Salário mínimo">Menos de 01 Salário mínimo</option>
<option value="01 a 02 Salários mínimos">01 a 02 Salários mínimos</option>
<option value="03 a 05 Salários mínimos">03 a 05 Salários mínimos</option>
<option value="+ de 05 Salários mínimos">+ de 05 Salários mínimos</option>
</select>
</div>
</div> 
<br>
<div class="row"> 
<div class="col-sm-2">
<label class=" form-label">CEP:<font style="color:red">*</font></label>
<br>
<input type="text" name="cep" id="cep" placeholder="CEP" class="inputpesquisa defaultText form-control"  onkeyup="validaEndereco()"/>
</div>
<div class="col-sm-3">
<label class=" form-label">Bairro:<font style="color:red">*</font></label>
<br>
<input type="text" name="bairro" id="bairro" class="inputpesquisa defaultText form-control"  placeholder="Bairro">
</div>
<div class="col-sm-5">
<label class=" form-label">Endereço:<font style="color:red">*</font></label>
<br>
<input type="text" name="endereco" id="endereco" class="inputpesquisa defaultText form-control"  placeholder="Endereço">
</div>
<div class="col-sm-2">
<label class=" form-label">Número:<font style="color:red">*</font></label>
<br>
<input type="text" name="numero" id="numero" class="inputpesquisa defaultText form-control"  placeholder="Número">
</div>
</div>
<br>
<div class="row">
<div class="col-sm-2">
<label class=" form-label">Complemento:</label>
<br>
<input type="text" name="complemento" id="complemento" class="inputpesquisa defaultText form-control"  placeholder="Complemento">
</div>
<div class="col-sm-3">
<label class=" form-label">Referência:</label>
<br>
<input type="text" name="referencia" id="referencia" class="inputpesquisa defaultText form-control"  placeholder="Referência">
</div>
<div class="col-sm-4">
<label class=" form-label">Situação do imóvel:<font style="color:red">*</font></label>
<br>
<select name="situacaoimovel" class="inputpesquisa form-select" class="form-select" id="sitacaoimovel">
<option value="">Situação do imóvel</option>
<option value="Própria Quitada">Própria Quitada</option>
<option value="Alugada">Alugada</option>
<option value="Cedida">Cedida</option>
<option value="Financiada">Financiada</option>
<option value="Ocupação">Ocupação</option>
</select>
</div>
<div class="col-sm-3" style="align-content:left;align-self:left;text-align:left;">
<?php if(count($resultadobene)){ foreach($resultadobene as $Resultadob){?>
<input type="checkbox" name="beneficios[]" value="<?php echo $Resultadob['idBeneficios']?>"><label>  <?php echo $Resultadob['descBeneficios']?></label>
<br>
<?php }}?>
</div>
</div>
<br>
<br>
<br>
<div class="row">
<div class="col-sm-9"></div>
<div class="col-sm-3">
<input type="submit" value="Cadastrar família >>" class="button icon-add" style="font-size:17px;margin-bottom:3%; padding-left:40px"/>
</div>
</div>   
<br>    
</form>

</div>
</div>
</section> 

</body>
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

if (validaData()<5475 || validaData()> 40150){
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


</script>