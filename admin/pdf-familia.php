<?php
//referenciar o DOMPDF com namespace
use Dompdf\Dompdf;
include('../conexao.php');

$id = ($_GET['id']);
$hoje = date('d/m/Y');
echo $hoje;


			$stmt = $conect->prepare('select * from tbFamilia where idFamilia='.$id);
             $stmt ->execute();
            
            while($row = $stmt->fetch(PDO::FETCH_BOTH)){


	$html = "
	<br><div class='resumo'><p class='titulo'>Endereço:</p><p class='conteudo'>".$row['logradouroFamilia']." N:".$row['numeroFamilia'].",".$row['bairroFamilia']." ".$row['cepFamilia']."</p><br>
		<p class='titulo'>Casa:</p><p class='conteudo'>".$row['situacaoImovelFamilia']."</p><br>
		<p class='titulo'>Renda:</p><p class='conteudo'>".$row['rendaFamilia']."</p></div >";
			}
	$html .= "<br><table class='table'>
	<thead>
				<tr style='font-size:30px'>
					<th scope='col'>Integrantes</th>
					<th scope='col'>Rg</th>
					<th scope='col'>Nascimento</th>
					
				</tr>
			</thead>
			<tbody>
			";
            $stmt = $conect->prepare('select * from tbFamilia inner join tbIntegrantes on tbFamilia.idFamilia = tbIntegrantes.idFamilia where tbFamilia.idFamilia='.$id);
             $stmt ->execute();
            
            while($row = $stmt->fetch(PDO::FETCH_BOTH)){
			
			$data = date('d/m/Y', strtotime($row['dataNascIntegrante']));
			$html .="<tr>
            <td style='font-size:20px'>".$row['nomeIntegrante']."</td>";
			$html .="
            <td style='font-size:20px'>".$row['rgIntegrante']."</td>";
			$html .="
            <td style='font-size:20px'>".$data."</td>
		      </tr>";
			
            
       		
			};
        $html .="</tbody>";

  		$html .= "<th></th>
				<th></th>
				<th></th>
				<th></th>";
		$html .= "</table>";
	


$html .="
<style>
body{
font-family: 'Source Sans Pro', sans-serif;
}
.resumo{
margin-left:1%;
}
	.titulo{
	display:inline;
	font-size: 22px;
	}
	.conteudo{
	display:inline;
	font-size: 22px;
	
	}
table, td.{

	width: 100%;
	color: #212529;
	padding-bottom: .50rem;
	 padding-top: .50rem;
    vertical-align: top;
    border-top: 1px solid #dee2e6;
	border-collapse: collapse;
	}
	.table thead th{
	text-align: inherit;
	vertical-align: bottom;
    border-bottom: 2px solid #dee2e6
	}
	</style>";





//include
require_once("dompdf/autoload.inc.php");

//criando a instancia
$dompdf = new DOMPDF();

//carregando o html

$dompdf->load_html('<img src="../images/logo.png" height="60px"/>
<h1 style="text-align:center"> ONG CIS - Relatório de Familia</h1><h2 style="text-align:center">'.$hoje.'</h2>
'. $html .'');




//papel
$dompdf->setPaper('A4', 'portrait');

//renderizaçao
$dompdf->render();

//enviar pdf para o browser
ob_end_clean();
$dompdf->stream("Familia.pdf", array("Attachment" => false));
?>
