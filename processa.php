<?php
session_start();
//Conexao com BD
include_once("conexao.php");

//Receber os dados do formulário
$id_paciente = $_SESSION['id_paciente'];

$data = $_REQUEST['data'];
$estabelecimento = $_REQUEST['estabelecimento'];

//Converter a data e hora do formato brasileiro para o formato do Banco de Dados
$data = explode(" ", $data);
list($date, $hora) = $data;
$data_sem_barra = array_reverse(explode("/", $date));
$data_sem_barra = implode("-", $data_sem_barra);
$data_sem_barra = $data_sem_barra . " " . $hora;

//Salvar no BD
$result_data = "INSERT INTO consultas (id_paciente, estabelecimento, data) VALUES ('$id_paciente','$estabelecimento', '$data_sem_barra')";
$resultado_data = mysqli_query($conn, $result_data);

//Verificar se salvou no banco de dados através "mysqli_insert_id" o qual verifica se existe o ID do último dado inserido
if(mysqli_insert_id($conn)){
	$_SESSION['msg'] = "<div class='alert alert-success'> Consulta agendada com sucesso </div>";
	header("Location:  agendar_consulta.php?id_paciente=$id_paciente");
}else{
	$_SESSION['msg'] = "<div class='alert alert-danger'> Erro ao agendar a data </div>";
	header("Location: agendar_consulta.php?id_paciente=$id_paciente");
}


?>
