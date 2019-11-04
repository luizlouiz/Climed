<?php

require_once('conn.php'); 

session_start();
date_default_timezone_set('America/Sao_Paulo');



if(isset($_POST['acao'])){


$nome = $_POST['nameUser'];
$cpf = $_POST['cpf'];
$cpf = preg_replace("/\D+/", "", $cpf);
$rg = $_POST['rg'];
$email = $_POST['email'];
$telefone = $_POST['tel'];
$senha = $_POST['senha'];
$funcao = $_POST['funcao']; 
$registro = date("Y-m-d H:i:s");


$sql = $pdo->prepare("INSERT INTO `usuarios` (`id_usuario`, `nome`, `cpf`, `rg`, `email`, `telefone`, `senha`, `funcao`, `cadastrado_em`) VALUES (null, ?, ?, ?, ?, ?, ?, ?, ?)"); 


 $sql->execute(array($nome,$cpf,$rg,$email,$telefone,$senha,$funcao,$registro));

 echo "inserido com sucesso";  // redirecionar para página de sucesso !!!!!
}
 
 header('Location: sucesso_cadastro.php');

?>