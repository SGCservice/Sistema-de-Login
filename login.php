<?php
	include("include/conexao.php");
	include("seguranca.php");
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="Caio Erick" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  
  <title>Login</title>
  
  <link href="css/style.css" rel="stylesheet" type="text/css" media="screen" />

</head>
<body>
	<h1>Acesso Restrito</h1>
	<form action="validar.php" method="POST" id="form">
		CPF: <input type="text" name="cpf" style="width: 200px;">
		Senha: <input type="password" name="senha" style="width: 200px;" value="">
		
		<?php
			session_start();
			if ($_SESSION['erroLogin'] == true) {
				// Usuário inválido
				return false;
				unset($_SESSION['erroLogin']);
			}
			session_destroy();
		?>
		
		<button type="submit">Login</button>
	</form>
</body>
</html>
