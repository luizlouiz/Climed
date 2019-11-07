<?php
session_start();
$id_paciente = $_GET['id_paciente'];
//echo $id_paciente;
$_SESSION['id_paciente'] = $id_paciente;
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Agendar Consulta | Climed</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet">
		<link rel="SHORTCUT ICON" href="Fotos/hospital.png">
	</head>
	<body>
		<div class="container">
			<br><br><a href='listar.php?id_paciente=<?php echo $id_paciente;?>'><h4>LISTAR</h4></a><br><br>
			<h1>Agendar Consulta</h1>
			<br/>
			<?php
			if(isset($_SESSION['msg'])){
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			}
			?>
			<form class="form-horizontal" action="processa.php" method="POST">
				<div class="form-group">
					<label for="local" class="col-sm-2 control-label">Local da Consulta</label>
					<div class="col-sm-10">
						<input type="text" name="estabelecimento" class="form-control" id="inputEmail3" placeholder="Estabelicimento a ser visitado" required>
					</div>
				</div>
				<div class="form-group">
					<label for="data" class="col-sm-2 control-label">Data e Hora</label>
					<div class="col-sm-10">
						<div class="input-group date data_formato" data-date-format="dd/mm/yyyy HH:ii:ss">
							<input type="text" class="form-control" name="data" placeholder="Data da visita" required>
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-th"></span>
							</span>
						</div> 
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-success">Cadastrar</button>
						<a href="listar_paciente.php" style="position: relative; bottom: -10px; left: 5px;">VOLTAR</a>
					</div>
				</div>
			</form>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/bootstrap-datetimepicker.min.js"></script>
		<script src="js/locales/bootstrap-datetimepicker.pt-BR.js"></script>
		<script type="text/javascript">
			$('.data_formato').datetimepicker({
				weekStart: 1,
				todayBtn: 1,
                autoclose: 1,
                todayHighlight: 1,
                startView: 2,
                forceParse: 0,
                showMeridian: 1,
                language: "pt-BR",
                //startDate: '+0d'
			});
		</script>
	</body>
</html>