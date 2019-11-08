<?php

	session_start();
	//Conexão com banco de dados
	include_once("conexao.php");
	require_once('conn.php');
    require_once('checar.php');


    $id = $_GET['id'];
    $id_paciente = $_SESSION['id_paciente'];

    $sql = "DELETE FROM `consultas` WHERE id = $id";

   if(mysqli_query($conn, $sql)){
      $_SESSION['msg_delete'] = "<div class='alert alert-success'> Consulta cancelada </div>";
	header("Location:  listar.php?id_paciente=$id_paciente");
}else{
	$_SESSION['msg_delete'] = "<div class='alert alert-danger'> Erro ao cancelar consulta </div>";
	header("Location: listar.php?id_paciente=$id_paciente");
}

   













?>