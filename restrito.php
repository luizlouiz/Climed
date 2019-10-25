<?php

session_start();
require_once('conn.php');
require_once('checar.php'); 

?>

<!DOCTYPE html>
<html>
<head>
	<title>CLIMED</title>
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link
    href="https://fonts.googleapis.com/css?family=Encode+Sans+Condensed|Fredoka+One|Courgette|Lobster|Italianno|Lemonada|Josefin+Slab|Macondo+Swash+Caps&display=swap"
    rel="stylesheet">
    <link rel="SHORTCUT ICON" href="Fotos/hospital.png">
    <link type="text/css" rel="stylesheet" href="css/estilo.css" />
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script> <!-- Jquery -->
    <script type="text/javascript" src="main.js"></script>

    <style type="text/css">
	body{
		margin: 0;
		padding: 0;
	    /*background-color: #b30000;*/
		color: #b30000;
	}
</style>
</head>

<body>
	<div class="row" style="margin: 20px">
		<div class="col-md-12" style="text-align: center;">
			<h1 style="color: #b30000 !important;">Página restrita</h1>		
		</div>
	</div>
	<div class="row">
		<div class="col-md-12" style="text-align: center;">
			<h3 style="color: #b30000 !important;">Você não possui permissão para acessar esses dados, favor verificar permissões com administrador ! </h3>
		</div>
	</div>
	
	<br/><br/>

	<div class="row justify-content-center">
	<a href="panel_sec.php" style="color: #000">VOLTAR</a>
	</div>
</body>
</html>