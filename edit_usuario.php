<?php 

session_start();
require_once('conn.php'); 

$id = $_SESSION['id'];
//echo $id;

$nome = $_POST['nameUser'];
$cpf = $_POST['cpf'];
$cpf = preg_replace("/\D+/", "", $cpf); 
$rg = $_POST['rg'];
$email = $_POST['email'];
$telefone = $_POST['tel'];
$telefone = preg_replace("/\D+/", "", $telefone);

	
$sql = $pdo->prepare("UPDATE `usuarios`SET nome='$nome', cpf='$cpf', rg='$rg', email='$email', telefone='$telefone'  WHERE id_usuario = $id;");

if($sql->execute()){
    

	echo "Dados do usuário atualizados !"; 
}

header('Location: sucesso.html');

?>