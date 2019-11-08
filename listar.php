<?php 
	session_start();
	//Conexão com banco de dados
	include_once("conexao.php");
	require_once('conn.php');
    require_once('checar.php');

	$id_paciente = $_SESSION['id_paciente'];
	
	echo "<a href=' agendar_consulta.php?id_paciente=$id_paciente'>VOLTAR</a><br><br>";
	
	echo "<h1>Visitas agendadas para o dia de hoje</h1>";
	
	$result_horarios = "SELECT * FROM consultas WHERE id_paciente = $id_paciente AND DAY(data) = DAY(CURDATE()) AND MONTH(data) = MONTH(CURDATE()) AND YEAR(data) = YEAR(CURDATE())";
	$resultado_horarios = mysqli_query($conn, $result_horarios);
	while($row_horarios = mysqli_fetch_array($resultado_horarios)){
		echo "Local da consulta: ".$row_horarios['estabelecimento']."<br>";
		echo "Horário: ".date('d/m/Y H:i', strtotime($row_horarios['data']))."<hr>";
		
	}
	
	echo "<h1>Visitas agendadas deste mês</h1>";
	
	$result_horarios = "SELECT * FROM consultas WHERE id_paciente = $id_paciente AND MONTH(data) = MONTH(CURDATE()) AND YEAR(data) = YEAR(CURDATE())";
	$resultado_horarios = mysqli_query($conn, $result_horarios);
	while($row_horarios = mysqli_fetch_array($resultado_horarios)){
		$id = $row_horarios['id'];
		echo "Local da consulta: ".$row_horarios['estabelecimento']."<br>";
		echo "Horário: ".date('d/m/Y H:i', strtotime($row_horarios['data']))."<hr>";
		echo "<a href='cancelar_consulta.php?id=$id'>CANCELAR CONSULTA</a><br><br>";
	}


	

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Listar Consultas | Climed</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet">
		<link rel="SHORTCUT ICON" href="Fotos/hospital.png">
</head>
<body>
	<?php
    if(isset($_SESSION['msg_delete'])){
		echo $_SESSION['msg_delete'];
		unset($_SESSION['msg_delete']);
	}
	?>		
</body>
</html>