<?php
include_once("funcao.php");


class Usuario {
	
	
	
	function Cadastrar($email,$usuario, $senha){
		$this->usuario = AntiSql($usuario);
		$this->email = AntiSql($email);
		$this->senha = md5($senha);
		
		$consulta = mysql_query("SELECT * FROM usuario where usuario='$usuario' ");
		$conConsulta = mysql_num_rows($consulta);
		
		if($conConsulta == 0){
			mysql_query("INSERT INTO usuario VALUES('','$this->email', '$this->usuario', '$this->senha', '".date("Y/m/d H:m:s")."') ");
			echo "VOCE FOI CADASTRADO COM SUCESSO, CLIQUE AQUI PARA LOGAR <a href='logar.php'>Logar</a>";
		}else{
			echo "Ja existe um usuario com estes dados cadastrados. ";
		}	
	
	}

					#####FUNCAO PARA ESQUECI MINHA SENHA SEM ENVIO DE EMAIL #####	
	
	function EsqueciSenha($usuario, $email){
	$this->Email = AntiSql($email);
	$this->Usuario = AntiSql($usuario);
	$sql = mysql_query("SELECT * FROM usuario WHERE email = '$this->Email'");
	$cont = mysql_num_rows($sql);
	
		if($cont == 0){
		echo "Usuario n�o existe";
		}else if($cont == 1){
		$senha1 = rand(1111,9999);
		$senha2 = md5($senha1);
		mysql_query("UPDATE usuario SET senha = '$senha2' WHERE email='$this->Email' ");
		Alertar("Sua senha foi Zerada, agora �: ".$senha1 , 0);
						
	
		}else{
		echo "Erro nao esperado";
		
		}
	
	
	
	
	}
	
	
					#####FUNCAO PARA ESQUECI MINHA SENHA COM ENVIO DE EMAIL #####
	/*
					function EsqueciSenha($usuario, $email){
					$this->Email = AntiSql($email);
					$this->Usuario = AntiSql($usuario);
					$sql = mysql_query("SELECT * FROM usuario WHERE email = '$this->Email'");
					$cont = mysql_num_rows($sql);
					
						if($cont == 0){
						echo "Usuario n�o existe";
						}else if($cont == 1){
						$senha1 = rand(1111,9999);
						$senha2 = md5($senha1);
						mysql_query("UPDATE usuario SET senha = '$senha2' WHERE email='$this->Email' ");
						mail($this->Email, "Esqueceu sua senha?", "Sua nova senha � $senha1 ");
										
					
						}else{
						echo "Erro nao esperado";
						
						}
					
					
					
					
					}
	
	*/


	function ListarDados($campo){
	
	$sql = mysql_query("SELECT * FROM usuario WHERE usuario='$_COOKIE[usuario]'");
	$res = mysql_fetch_assoc($sql);
	$campo = $res[$campo];
	return($campo);
	}
	
	
	function EditarDados($email,$usuario, $senha){
		$this->usuario = AntiSql($usuario);
		$this->email = AntiSql($email);
		$this->senha = md5($senha);
		$dados_atuais = mysql_query("SELECT * FROM usuario WHERE usuario='$_COOKIE[usuario]' ");	
		$res_dados_atuais = mysql_fetch_assoc($dados_atuais);
		$email_atual = $res_dados_atuais['email'];
		$usuario_atual = $res_dados_atuais['usuario'];
		
		
		
		$consulta = mysql_query("SELECT * FROM usuario WHERE email='$this->email' AND email NOT LIKE '$email_atual' ");
		$conConsulta = mysql_num_rows($consulta);
		if($conConsulta <> 0){
		echo "N�o foi possivel fazer a atualiza��o, provavelmente o email j� est� cadastrado. Utilize a opcao voltar no seu navegador";
		exit;
		} 
		
		
		
		$consulta = mysql_query("SELECT * FROM usuario WHERE usuario='$this->usuario' AND usuario NOT LIKE '$usuario_atual' ");
		$conConsulta = mysql_num_rows($consulta);		

		
		if($conConsulta <> 0){
		echo "N�o foi possivel fazer a atualiza��o, provavelmente o usuario j� est� cadastrado. Utilize a opcao voltar no seu navegador";
		exit;
		} 	
		
		setcookie("usuario", $this->usuario);
		mysql_query("UPDATE usuario SET email='$this->email', usuario='$this->usuario', senha='$this->senha' WHERE usuario='$_COOKIE[usuario]' ");

			
			Alertar("Os dados foram atualizados corretamente", 0);
			echo "<script>
					location.href='index.php';
				</script>";
		
	

	
	
}
}





?>