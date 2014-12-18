<?php

	ini_set('default_charset','UTF-8');
	
	include("include/conexao.php");
	include("seguranca.php");
	
	protegePagina();
	
	$_id = $_SESSION['id'];
	
	$sql = "SELECT * FROM usuarios WHERE id = '$_id' LIMIT 1";
	$query = mysql_query($sql);
	$abre = mysql_fetch_array($query);
	
	$_SESSION['id'] = $abre['id'];
	$_SESSION['cpf'] = $abre['cpf'];
	$_SESSION['senha'] = $abre['senha'];
	
?>

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  
  <title>Admin</title>
  
</head>
<body>
  <h1>Painel Administrativo</h1>
	ID: <?php echo $_SESSION['id']; ?>
	<br/>
	CPF: <?php echo $_SESSION['cpf']; ?>
	<footer>
	  <a href="logout.php">Sair</a>
	</footer>
</body>
</html>
