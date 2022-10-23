<?php
session_start();
if ( !isset($_SESSION['nome']) and !isset($_SESSION['senha']) ) {  
  //Limpa
  unset ($_SESSION['nome']);
  unset ($_SESSION['senha']);
  
  //Redireciona para a página de autenticação
 header('location:../login.php');   
  }     
?>
<?php 
      require_once "../db/config.php";

      $sql = "SELECT * FROM usuarios";
      $sql = $pdo->query($sql);
	 
?>
<head>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<br><br>		
<div class="container">	
    
<h1>Controle de Usuário</h1><br>

<hr style="border:1px solid #008000;">
<div class="table-responsive-sm">
<a href="../index.php"><img src="../imagens/diversas_imagens/voltar.png" alt="" width="26" height="20" title="Voltar"></a>	
<form id="frmRegistro" action="../procedimentos/cadastrar_usuario.php"  method="POST"style="border:1px solid #008000;margin-top:10px;padding:10px;margin-right:0px;background-color:#FF4500;"> 

	<div class="form-row">
			<div class="form-group col-md-6">			     
			      <input type="text" class="form-control" id="nome_user" placeholder="Nome da congregacao" name="nome">
			</div>
		    <div class="form-group col-md-6">      
			  
            <select class="form-control" id="login" name="nivel">                         
                      <option>Selecione nivel acesso</option>
                      <option>admin</option>
                      <option>financeiro</option>
                      <option>apoio</option>                     
                </select>
		    </div>
        
	</div>
  
    <div class="form-row">
    
		    <div class="form-group col-md-6">		       	      
                <input type="password" class="form-control" id="senha"placeholder="Senha"name="senha">
		    </div>
        <div class="form-group col-md-6">		       	      
                <input type="text" class="form-control" id="senha"placeholder="Confirmar"name="confirmar">
		    </div>
		    
    </div>

		  
          <button type="submit" class="btn btn-secondary">Gravar</button>
</div>
</form>

<div class="table-responsive" style="overflow: auto;border:solid 1px #FF4500;margin-top:10px;">
<table class="table table-hover">
  <thead>
    <tr>      
      <th>Id</th>
      <th>Nome</th>
      <th>Nivel</th>           
      <th>Senha</th>
      <th>Confirmação</th>
      <th>Ação</th>
    </tr>
  </thead>
  <?php 
  
  if($sql->rowCount() > 0) {
      foreach($sql->fetchAll() as $linhas){   
  ?>
  <tbody>
    <tr>
      
      <td><?php echo $linhas['id'];?></td>
      <td><?php echo $linhas['nome'];?></td>
      <td><?php echo $linhas['nivel'];?></td>
      <td><?php echo $linhas['senha'];?></td>  
      <td><?php echo $linhas['confirmar'];?></td>          
      <td><?php echo $linhas['dataCaptura'];?></td>
      <td><a href="../procedimentos/excluir_usuario.php?&id=<?php echo $linhas['id'];?>"><img class="" src="../imagens/diversas_imagens/excluir.png"
       width="30" height="20" style="margin-right:-125px;"></a></td>
    
    </tr>
   
  </tbody>
  <?php 
       }
      } 
    ?>
    
</table>

</div>
<br>
	

<footer style="background-color:">
	
</footer>
<?php require_once'footer.php';?>
 