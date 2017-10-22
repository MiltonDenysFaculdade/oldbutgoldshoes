<?php
	session_start();	
	$nome = $_REQUEST['NOME'];
	$phone = $_REQUEST['PHONE'];
	$nasc = $_REQUEST['NASC'];
	
	echo "Nome : $nome <BR/>";
	echo "Telefone : $phone <BR/>";
	echo "Nascimento : $nasc <BR/>";
	
	$con = new PDO("mysql:host=localhost;dbname=formulario;charset=utf8", 
						"root", "");
	echo "Conexão no banco de dados efetuada !!! </BR>";
	
	$sql = "INSERT INTO contatos (nome, telefone, nascimento) " . 
				" VALUES ('$nome', '$phone', '$nasc')";
	$result = $con->exec( $sql );			

	$msg = "Erro ao gravar no banco de dados";
	if ($result == 1) { 
		$msg = "Contato gravado com sucesso";
	}
	
	$_SESSION['MENSAGEM'] = $msg;
	
	header('Location: ./contato.html');
	



?>
