<?php 
	session_start();
	//Conexão com banco de dados
	include_once("conexao.php");

	$id_paciente = $_SESSION['id_paciente'];
	
	echo "<a href=' agendar_consulta.php?id_paciente=$id_paciente'>VOLTAR</a><br><br>";
	
	echo "<h1>Visitas agendadas para o dia de hoje</h1>";
	
	$result_horarios = "SELECT * FROM consultas WHERE id_paciente = $id_paciente AND DAY(data) = DAY(CURDATE()) AND MONTH(data) = MONTH(CURDATE()) AND YEAR(data) = YEAR(CURDATE())";
	$resultado_horarios = mysqli_query($conn, $result_horarios);
	while($row_horarios = mysqli_fetch_array($resultado_horarios)){
		echo "Estabelecimento: ".$row_horarios['estabelecimento']."<br>";
		echo "Horário: ".date('d/m/Y H:i:s', strtotime($row_horarios['data']))."<hr>";
	}
	
	echo "<h1>Visitas agendadas deste mês</h1>";
	
	$result_horarios = "SELECT * FROM consultas WHERE id_paciente = $id_paciente AND MONTH(data) = MONTH(CURDATE()) AND YEAR(data) = YEAR(CURDATE())";
	$resultado_horarios = mysqli_query($conn, $result_horarios);
	while($row_horarios = mysqli_fetch_array($resultado_horarios)){
		echo "Estabelecimento: ".$row_horarios['estabelecimento']."<br>";
		echo "Horário: ".date('d/m/Y H:i:s', strtotime($row_horarios['data']))."<hr>";
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Listar Consultas</title>
	<link rel="SHORTCUT ICON" href="Fotos/hospital.png">
</head>
<body>
 
</body>
</html>