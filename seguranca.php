<?php
	ob_start();
	session_start();

	$_SG['validaSempre'] = true;       // Deseja validar o usuário e a senha a cada carregamento de página?

	include("include/conexao.php");

	function validaUsuario(cpf, $senha) {
		// Usa a função addslashes para escapar as aspas
		$cpf = addslashes($usuario);
		$senha = addslashes($senha);
		$senha = md5($senha); // Caso a senha no banco de dados esteja criptografada em MD5

		// Monta uma consulta para procurar um usuário
		$sql = "SELECT * FROM admin WHERE binary(usuario) = binary('".$usuario."') AND binary(senha) = binary('".$senha."') LIMIT 1";
		$query = mysql_query($sql);
		$resultado = mysql_fetch_assoc($query);
		
			// Verifica se encontrou algum registro
			if (empty($resultado)) {
				// Usuário inválido
				return false;
			}
			else {
				
				  // Usuário valido
				  
					$_SESSION['id'] = $resultado['id'];
					$_SESSION['cpf'] = $resultado['cpf'];
					$_SESSION['senha'] = $resultado['senha'];
					
					return true;
			}
	}

	
	
	function protegePagina() {
		if (!isset($_SESSION['usuario']) OR !isset($_SESSION['senha'])) {
			// Não há usuário logado, manda pra página de usuario
			expulsaVisitante();
		}
	}

	function expulsaVisitante() {
	  // Envia o usuário para a página de login
		session_destroy();
		header("Location: login.php");
	}
	
?>
