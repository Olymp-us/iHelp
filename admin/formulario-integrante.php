<?php
//[include('../verifica-login.php');
include('../conexao.php');

$id = $_GET['id'];

$query = $conect->prepare('SELECT `idIntegrante`, `nomeIntegrante`, `dataNascIntegrante`, `generoIntegrante`, `corIntegrante`, `escolaridadeIntegrante`, `estadoCivilIntegrante`, `rgIntegrante`, `cpfIntegrante`,`chefeIntegrante` from tbIntegrantes WHERE idFamilia = :id');
$query->bindParam(':id', $id, PDO::PARAM_INT);
$query->execute();
$integ = $query->fetchAll(PDO::FETCH_ASSOC);

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
<br>
<h2 style="font-weight: bold;color:black;">CADASTRO DE FAMÍLIA</h2> 
<hr>
</div>
</div>
<div class="row">

<div class="large-8 large-centered column">
<div class="col-sm-12" style="align-content:center;text-align:center;align-self:center;">
<div>
<h1  style="font-size: 35px; font-weight: bold; font-style: italic;color:black;">Cadastre uma nova família!</h1>

<p style="font-size: 26px; line-height: 30px; letter-spacing: 3px;">Insira abaixo as informações dos integrantes da família.</p>
<br><br>
</div>
</div>
</div>
</div>




<div class="row">
<div class="col-sm-1"></div>
<div class="col-sm-10" style="align-content:center;margin-bottom:5%;align-self:center;background-color:#225C81;color:white;border-radius:20px;">

<form action="adicionar-integrante.php" method="POST" name="form" onsubmit="return validaForm();" style="padding:10px;">
<input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
<div class="row" style="margin-top:1%;">
<span style="font-size: 10px;margin-bottom:1%;text-align:center;"></span>
<div class="col-sm-5">
<label class=" form-label">Nome:<font style="color:red">*</font></label>
<br>
<input type="text" name="nome" id="nome" class="inputpesquisa defaultText form-control" title="Nome completo" placeholder="Nome completo" class="defaultText" />
</div>
<div class="col-sm-3">
<label class=" form-label">Data de nascimento:<font style="color:red">*</font></label>
<br>
<input id="datanasc" name="datanasc" class="inputpesquisa defaultText form-control" type="date">
</div>
<div class="col-sm-2">
<label class=" form-label">Gênero:</label>
<br>
<select name="genero" class="inputpesquisa defaultText form-control" id="genero">
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
<select id="cor" class="inputpesquisa defaultText form-control" name="cor">
<option>Cor (IBGE)</option>
<option>Preta</option>
<option>Parda</option>
<option>Branca</option>
<option>Amarela</option>
<option>Indigena</option>
</select>
</div>
</div>
<div class="row">
<div class="col-sm-3">
<label class=" form-label">RG:</label>
<br>
<input type="text" name="rg" id="rg" placeholder="RG" title="RG" class="inputpesquisa defaultText form-control" />
</div>
<div class="col-sm-4">
<label class=" form-label">CPF:</label>
<br>
<input placeholder="CPF" type="text" id="cpf" name="cpf" class="inputpesquisa defaultText form-control" onkeyup="return validaCpf()" title="O CPF deve conter 11 dígitos numéricos, separados ou não." />
</div>
<div class="col-sm-2">
<label class=" form-label">Estado cívil:</label>
<br>
<select name="estadocivil" class="inputpesquisa defaultText form-control" id="estadocivil">
<option>Solteiro(a)</option>
<option>Casado(a)</option>
<option>Viúvo(a)</option>
<option>União Estável</option>
<option>Morando Junto</option>
</select>
</div>
<div class="col-sm-3">
<label class=" form-label">Escolaridade:</label>
<br>
<select name="escolaridade" class="inputpesquisa defaultText form-control" id="escolaridade">
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
<div class="row">
<div class="col-sm-4">
<label class=" form-label">Telefone celular:</label>
<br>
<input type="text" id="celular" name="telefone[]" placeholder="Celular" title="Celular" class="defaultText" />
</div>


</div>
<br>
<br>
<br>
<div class="row">
<div class="col-sm-2" style="padding-left:27px;">
<input type="submit"  class="button icon-addfamily" style="padding-left:45px;" value="Salvar Integrante" class="button"/>
</div> 
<div class="col-sm-1"></div>
<div class="col-sm-2">
<a href="pesquisa-famili.php">
<input type="button" value="Finalizar Cadastro de Família " class="button icon-check" style="padding-left:40px;" />
</a>
</div>          
</form> 

</div>
</div></section>

<!-- Aqui poderia aparecer o resultado do formulário em específico --> 
<section class="testimonials">
<div class="title">
<p style="font-size:20px;font-weight: bold;">Pessoas já cadastradas nesta família: </p>
</div>
<table class="table table-hover">
<tbody>
<?php          if(count($integ)){
foreach($integ as $Integ){

?>
<tr>
<th></th> 
<th> <?php echo $Integ['nomeIntegrante']?></th>
<th> <?php echo date('d/m/Y', strtotime($Integ['dataNascIntegrante']))?></th>
</a></th>

<!--
<a href="arquivar-familia.php?id=<?php echo $Resultados['idFamilia'] ?>">
<div class="large-12 large-centered column">
<div style="display: flex; width: 100%; align-items: center; justify-content: center;">
<input type="submit" value="Arquivar" class="cta"/>
</div> 
</div>
</a>
<a href="excluir-familia.php?id=<?php echo $Resultados['idFamilia'] ?>" onclick="return confirm('Deseja realmente excluir?')";>
<div class="large-12 large-centered column">
<div style="display: flex; width: 100%; align-items: center; justify-content: center;">
<input type="submit" value="Excluir" class="cta"/>
</div> 
</div>
</a>
-->




<?php
}
}else{
?>



<p>Não há resultados para sua busca</p>   



<?php
}
?>
</table>

</body>
</html>

<script type="text/javascript">

function validaForm(){
var Mensagem = "";
//Verifica se tudo está preenchido

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


if (validaData()<1 || validaData()> 40150){
var Mensagem = Mensagem + "Data de nascimento inválida! ";
}
if (document.form.nome.value != "" && validaCpf()===false){
var Mensagem = Mensagem + " CPF inválido! ";
}
if (document.form.nome.value != "" && document.form.nome.value.length<=2){
var Mensagem = Mensagem + " Nome inválido! ";
}
if (document.form.rg.value.length>12 || document.form.rg.value.length<5 && document.form.rg.value.length!=0){
var Mensagem = Mensagem + " RG inválido! ";
document.getElementById("rg").style.borderColor = "red";
document.getElementById("rg").focus();
}
if (document.form.rg.value != "" && document.form.rg.value.length>12 || document.form.rg.value.length<5 && document.form.rg.value.length!=0){
var Mensagem = Mensagem + " RG inválido! ";
document.getElementById("rg").style.borderColor = "red";
document.getElementById("rg").focus();
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

var button = document.getElementById("Clique");

button.addEventListener("click", function () {
var container = document.getElementById("escondido");

if (container.style.display === "none") {
container.style.display = "flex";
}
});
</script>