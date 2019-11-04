<?php
session_start();
require_once('conn.php');
require_once('checar.php');

$id = $_GET['id_usuario'];

$sql = $pdo->prepare("DELETE FROM `usuarios` WHERE id_usuario = $id");

if($sql->execute()){

	echo "Usuario deletado !"; 
}

header('Location: sucesso.html');
?>