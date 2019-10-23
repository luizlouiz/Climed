<?php

require_once('conn.php');


// variaveis do formulário de login 
$email = isset($_POST['email']) ? $_POST['email'] : '';
$senha = isset($_POST['senha']) ? $_POST['senha'] : '';


if(empty($email) || empty($senha)){

	echo "Informe email e senha";
	exit; 
}




$sql = $pdo->prepare("SELECT id_usuario, nome, funcao FROM `usuarios` WHERE email = '$email' AND senha = '$senha'"); 

$sql->execute(); 

$usuario = $sql->fetchAll(PDO::FETCH_ASSOC); 

if(count($usuario) <= 0){

	header('Location: visitante.html');
	echo "</br>";

	exit; 
} 


// pega o primeiro usuario 

$usuario = $usuario[0];


session_start();
$_SESSION['logged_in'] = true; 
$_SESSION['user_id'] = $usuario['id_usuario'];
$_SESSION['user_name'] = $usuario['nome']; 
$_SESSION['func'] = $usuario['funcao']; 

header('Location: index.php'); 


?>

