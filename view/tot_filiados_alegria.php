<?php
session_start();
if ( !isset($_SESSION['nome']) and !isset($_SESSION['senha']) ) {  
  //Limpa
  unset ($_SESSION['nome']);
  unset ($_SESSION['senha']);
  
  //Redireciona para a página de autenticação
 header('location:../login.php');   
  }     

$arquivo='Membros_alegria.xls';

$html='';
$html.='<table border="1">';
$html.='<tr>';
$html.='<td colspan="12">Total Membros -Alegria</td>';
$html.='</tr>';

$html.='<tr>';
$html.='<td><b>Matricula</b></td>';
$html.='<td><b>Nome</b></td>';
$html.='<td><b>Funcao</b></td>';
$html.='<td><b>Congregacao</b></td>';
$html.='<td><b>Logradouro</b></td>';
$html.='<td><b>Endereco</b></td>';
$html.='<td><b>Numero</b></td>';
$html.='<td><b>Telefone</b></td>';
$html.='<td><b>Status</b></td>';
$html.='<td><b>Criado em :</b></td>';
$html.='</tr>';

//Selecionar todos os itens da tabela 
    require_once '../db/config.php';
          
    $total =0;
          $sql ="SELECT COUNT(*) as c FROM filiado WHERE congregacao = 'ALEGRIA'";
          $sql = $pdo->query($sql);
          $sql = $sql->fetch();
          $total = $sql['c'];     
       
		  $sql = " SELECT matricula,nome,funcao,congregacao,status FROM filiado WHERE congregacao = 'ALEGRIA'";
		  $sql = $pdo->query($sql);
		
		if ($sql->rowCount() > 0) {
            # code...
            foreach ($sql->fetchAll() as  $linhas) {
    # code...
	$html .= '<tr>';
	$html .= '<td>'.$linhas["matricula"].'</td>';
	$html .= '<td>'.$linhas["nome"].'</td>';
	$html .= '<td>'.$linhas["funcao"].'</td>';
	$html .= '<td>'.$linhas["congregacao"].'</td>';  
	$html .= '<td>'.$linhas["logradouro"].'</td>'; 
	$html .= '<td>'.$linhas["endereco"].'</td>';  
	$html .= '<td>'.$linhas["numero"].'</td>';	
	$html .= '<td>'.$linhas["telefone"].'</td>';
	$html .= '<td>'.$linhas["status"].'</td>';	
	$data = date('d/m/Y H:i:s');
	$html .= '<td>'.$data.'</td>';
	$html .= '</tr>';
		}

// Configurações header para forçar o download
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
		header("Cache-Control: no-cache, must-revalidate");
		header("Pragma: no-cache");
		header("Content-type: application/x-msexcel");
		header("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
		header("Content-Description: PHP Generated Data" );
		// Envia o conteúdo do arquivo
		
    echo $html;
 ?>	

<?php
  }
 

 ?> 
