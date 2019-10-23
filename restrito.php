<?php

session_start();
require_once('conn.php');
require_once('checar.php'); 

?>

<!DOCTYPE html>
<html>
<head>
	<title>Página Restrita</title>
</head>
<body>


	<h2>Você não possui permissão para acessar esses dados, favor verificar permissões com administrador ! </h2>
	<br/><br/>

	<a href="panel_sec.php">VOLTAR</a>

</body>
</html>