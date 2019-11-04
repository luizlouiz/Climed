<?php 

session_start();
require_once('conn.php'); 

$id = $_SESSION['id'];
//echo $id;

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$cpf = preg_replace("/\D+/", "", $cpf); 
$cep = $_POST['cep'];
$endereco = $_POST['endereco'];
$email = $_POST['email'];
$numero = $_POST['numero'];
$tel1 = $_POST['tel1'];
$tel1 = preg_replace("/\D+/", "", $tel1);
$complemento = $_POST['complemento'];
$tel2 = $_POST['tel2'];
$tel2 = preg_replace("/\D+/", "", $tel2);
$bairro = $_POST['bairro'];
$uf = $_POST['uf'];
$nome_responsavel = $_POST['nome_responsavel'];
$tel_responsavel = $_POST['tel_responsavel'];
$tel_responsavel = preg_replace("/\D+/", "", $tel_responsavel);
	
$sql = $pdo->prepare("UPDATE `pacientes` SET nome='$nome', cpf='$cpf', cep='$cep', endereco='$endereco', email='$email', numero='$numero', tel1='$tel1', complemento='$complemento', tel2='$tel2', bairro='$bairro', uf='$uf', nome_responsavel='$nome_responsavel', tel_responsavel='$tel_responsavel' WHERE id_paciente = $id;");

if($sql->execute()){

	echo "Dados do paciente atualizados !"; 
}


header('Location: sucesso.html');

?>