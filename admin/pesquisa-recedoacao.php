<?php
include('../verifica-login.php');
include('../conexao.php');
 
$value = $_GET['value'];
//Armazena o comando e executa o comando.
if($value==0){
    
    $query1 = $conect->prepare('SELECT * from tbEntradaDoacao inner join tbItemDoacao on tbItemDoacao.idItemDoacao=tbEntradaDoacao.idItemDoacao inner join tbCategoriaDoacao on tbItemDoacao.idCategoriaDoacao=tbCategoriaDoacao.idCategoriaDoacao inner join tbDoador on tbDoador.idDoador=tbEntradaDoacao.idDoador where ativaEntradaDoacao = 1 ORDER BY dataEntradaDoacao');
$query1->execute();


//Resultado do comando adicionado a uma Array.
$resultadoentrada = $query1->fetchAll(PDO::FETCH_ASSOC);
}else if($value==1){
    
    $select = 'SELECT * from tbEntradaDoacao inner join tbItemDoacao on tbItemDoacao.idItemDoacao=tbEntradaDoacao.idItemDoacao inner join tbCategoriaDoacao on tbItemDoacao.idCategoriaDoacao=tbCategoriaDoacao.idCategoriaDoacao inner join tbDoador on tbDoador.idDoador=tbEntradaDoacao.idDoador where ativaEntradaDoacao = 1'; 
    

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
            $select = $select.' ORDER BY dataEntradaDoacao DESC';
        
        }else if($_GET['ordem']==1){
            $select = $select.' ORDER BY dataEntradaDoacao';
        
        }else if($_GET['ordem']==2){
            $select = $select.' ORDER BY qtdeEntradaDoacao DESC';
        
        }else if($_GET['ordem']==3){
            $select = $select.' ORDER BY qtdeEntradaDoacao';
        
        }
    }


        $query1 = $conect->prepare($select);
        $query1->execute();
        $resultadoentrada = $query1->fetchAll(PDO::FETCH_ASSOC);

    }

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
            <div class="large-8 large-centered column">
                <div class="title">
                    <br><br><br>
                    <h2 style="font-weight: bold;color:black;">GERENCIAMENTO DE DOAÇÕES RECEBIDAS</h2> 
                <hr>
            </div>
            </div>
        <div class="row">
           
           <div class="large-8 large-centered column">
                    <div class="col-sm-12" style="align-content:center;text-align:center;align-self:center;">
                <div>
                    
                    <p style="font-size: 26px; line-height: 30px; letter-spacing: 3px;">Insira novas doações ou procure pelas que já foram cadastradas.</p>
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
<p style="font-size:20px;font-weight: bold;">Resultados encontrados para esta busca: <?php echo count($resultadoentrada);?></p>
        
        
</div>
                       
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
                <form action="adicionar-doacaorecebida.php" method="post" style="padding:3%;">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Cadastrar nova doação</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="row">
              <div class="col-sm-12">
            <input type="hidden" id="active" name="active" value="1">
            <label>Doador:</label>
            <br>
            <select list="doador" class="form-select" name="doador">
                <option value="">Selecione o doador</option>
                      <?php if(count($resultadodoador)){ foreach($resultadodoador as $doador){?>
                      <option value="<?php echo $doador['idDoador']?>"><?php echo $doador['nomeDoador']?></option>
                      <?php }}?>
            </select>
              </div>
                <br>
                <br>
                <br>
              <div class="col-sm-12">
            <label>Adicionar item doado:</label>
            <br>
            <select list="item" class="form-select" name="item">
                <option value="">Selecione o item</option>
                      <?php if(count($itemdoacao)){ foreach($itemdoacao as $item){?>
                      <option value="<?php echo $item['idItemDoacao']?>"><?php echo $item['descItemDoacao']?></option>
                      <?php }}?>
            </select>
              </div>
                <br>
                <br>
                <br>
              <div class="col-sm-4">
            <label>Quantidade:</label>
            <br>
            <input type="number" id="qtde" name="qtde" class="defaultText form-control" min="0" max="50000" step="1" value="1">
        </div>
              <div class="col-sm-6">
            <label>Data de recebimento:</label>
            <br>
            <input type="date" id="datarece" class="defaultText form-control"  name="datarece">
              </div>
            </div>
            <br>

      </div>
      <div class="modal-footer">
        <button type="reset" style="padding-left:40px;" class="button icon-delete2" data-dismiss="modal">Cancelar</button>
        <button type="submit"  style="padding-left:40px;" class="button icon-add" >Finalizar cadastro</button>
      </div>
                  </form>
    </div>
  </div>
</div>
        
        <div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <form action="adicionar-doador.php" method="post">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Cadastrar novo doador</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="row">
<div class="col-sm-12">
    
<label for="" class="form-label">Nome/entidade:</label>
<input type="text" name="doador" id="doador" class="inputpesquisa defaultText form-control" placeholder="Digite o nome do novo doador">
<br>
    <label for="" class="form-label">Email:</label>
<input type="email" name="email" id="email" class="inputpesquisa defaultText form-control" placeholder="Digite o email do doador">
<br>
    <label for="" class="form-label">Telefone:</label>
<input type="telefone" name="telefone" id="telefone" class="inputpesquisa defaultText form-control" placeholder="Digite o telefone do doador">
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
         
            
            
            
            
<button type="button"  style="padding-left:40px;" class="button icon-add" data-toggle="modal" id="modalbutton" data-target="#exampleModalCenter">Cadastrar nova doação recebida</button> 
<button type="button"  class="button icon-add" style="padding-left:40px;" class="button icon-add" data-toggle="modal" id="modalbutton" data-target="#exampleModalCenter1">Adicionar doador</button>
<a href="pesquisa-recedoacaoarquivos.php?value=0"><button type="button"   style="padding-left:40px;" class="button icon-archive">Ver doações arquivadas</button></a>
<br>
<br>
<table class="table table-hover">
<thead>
<tr>
                    <th>Item doado</th>
                    <th>Quantidade</th>
                    <th>Data de recebimento</th>
                    <th>Doador</th>
                    <th></th>
                    <th></th>
                    </tr>
</thead>
<tbody>
<?php
if(count($resultadoentrada)){
    foreach($resultadoentrada as $entrada){
?>

                <tr>
                    <td><?php echo $entrada['descItemDoacao']?> </td>
                    <td><?php echo $entrada['qtdeEntradaDoacao']?> </td>
                    <td><?php echo date('d/m/Y', strtotime($entrada['dataEntradaDoacao']))?> </td>
                    <td><?php echo $entrada['nomeDoador']?> </td>
                    <td><a href="arquivar-doacaorece.php?id=<?php echo $entrada['idEntradaDoacao'] ?>"><button type="button"  style="padding-left:40px;" class="button icon-archive">Arquivar</button></a>  </td>   
                    <td><a href="excluir-doacaorece.php?id=<?php echo $entrada['idEntradaDoacao'] ?>&item=<?php echo $entrada['idItemDoacao'] ?>" onclick="return confirm('Deseja realmente excluir?')" ><button  type="button"  style="padding-left:40px;" class="button icon-delete2">Excluir</button></a></td> 
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
</body>
</html>

<script>
 $('#exampleModalCenter').on('shown.bs.modal', function () {
  $('#modalbutton').trigger('focus')
})
function abrirFormDoacaoSaida() {
  document.getElementById("formDoacaoSaida").style.display = "block";
}

function fecharFormDoacaoSaida() {
  document.getElementById("formDoacaoSaida").style.display = "none";
} 

function abrirFormDoacaoEntrada() {
  document.getElementById("formDoacaoEntrada").style.display = "block";
}

function fecharFormDoacaoEntrada() {
  document.getElementById("formDoacaoEntrada").style.display = "none";
} 

</script>