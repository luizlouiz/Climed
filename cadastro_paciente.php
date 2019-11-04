<?php
session_start();
require_once('conn.php');
date_default_timezone_set('America/Sao_Paulo');

$nome = $_POST['nomePaciente'];
$cep = $_POST['cepPaciente'];
$cpf = $_POST['cpfPaciente'];
$endereco = $_POST['enderecoPaciente'];
$email = $_POST['emailPaciente']; 
$numero = $_POST['numero'];
$telefone1 = $_POST['tel'];
$complemento = $_POST['complemento'];
$telefone2 = $_POST['te2'];
$bairro = $_POST['bairro'];
$dtNascimento = $_POST['dtNascimento'];
$uf = $_POST['uf'];
$registro = date("Y-m-d");


if(!isset($_POST['underAge'])){


   
$sql = $pdo->prepare("INSERT INTO `pacientes` (`id_paciente`, `nome`, `cpf`, `email`, `tel1`, `tel2`, `dt_nascimento`, `cep`, `endereco`, `numero`, `complemento`, `bairro`, `uf`, `cadastrado_em`) VALUES (null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");


$sql->execute(array($nome,$cpf,$email,$telefone1,$telefone2,$dtNascimento,$cep,$endereco,$numero,$complemento,$bairro,$uf,$registro)); 






  echo "Paciente inserido com sucesso !";
}



if(isset($_POST['underAge'])){

	$nome_responsavel = $_POST['nome_responsavel'];
	$tel_responsavel = $_POST['tel_responsavel'];

  $sql2 = $pdo->prepare("INSERT INTO `pacientes` (`id_paciente`, `nome`, `cpf`, `email`, `tel1`, `tel2`, `dt_nascimento`, `cep`, `endereco`, `numero`, `complemento`, `bairro`, `uf`, `nome_responsavel`, `tel_responsavel`, `cadastrado_em`) VALUES (null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");


  $sql2->execute(array($nome,$cpf,$email,$telefone1,$telefone2,$dtNascimento,$cep,$endereco,$numero,$complemento,$bairro,$uf,$nome_responsavel,$tel_responsavel,$registro));

   echo "Inserido Paciente menor de idade com sucesso !";
} 


header('Location: sucesso_cadastro.php');


?>