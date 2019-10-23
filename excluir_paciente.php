<?php
session_start();
require_once('conn.php');
require_once('checar.php');

$id = $_GET['id_paciente'];

$sql = $pdo->prepare("DELETE FROM `pacientes` WHERE id_paciente = $id");

if($sql->execute()){

	echo "Paciente deletado !"; 
}

?>