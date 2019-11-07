<?php
session_start();
require_once('conn.php');
require_once('checar.php');

ini_set( 'display_errors', 0 );
/*
$sql = $pdo->prepare("SELECT * FROM `pacientes`"); 

 $sql->execute(); 

 $info = $sql->fetchAll();

*/
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CLIMED</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link
    href="https://fonts.googleapis.com/css?family=Encode+Sans+Condensed|Fredoka+One|Courgette|Lobster|Italianno|Lemonada|Josefin+Slab|Macondo+Swash+Caps&display=swap"
    rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/estilo.css" />
    <link rel="SHORTCUT ICON" href="Fotos/hospital.png">
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script> <!-- Jquery -->
    <script type="text/javascript" src="main.js"></script>
    <style type="text/css">
    	

            body{

                background-color:#E6E6FA; 
            }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo" style="font-weight: bold; font-size: 5em; color: #b30000; margin-left:0px !important;">CLIMED</div>
        <h1 style="text-align: center; font-size: 4em;">Listar Paciente</h1>
        <br>
        <div class="row justify-content-center">
            <div class="col-md-11" style="text-align: center">
        <?php

        $filtro = $_POST['filterUser']; 

        $consulta = $pdo->prepare("SELECT * FROM `pacientes` WHERE nome LIKE '$filtro%'"); 
        $consulta->execute(); 

        $busca = $consulta->fetchAll();
        ?>
        <form name="lista" action="listar_paciente.php" method="POST">
                <input type="text" name="filterUser" placeholder="Buscar pelo nome" style="width: 100%;">
                <button type="submit" style="position: relative; bottom: 78px;">Buscar</button>
            </div>
        </div>
        <br>
        <div class="row">
            <table class="table table-hover" id="buscarPaciente" border="4" style="border-color: #A52A2A; position: relative; bottom: 65px;">
                <thead class="thead-light">
                  <tr>
                    <th style="width:550px;">NOME</th>
                    <th style="width:550px;">CPF</th>
                    <th style="width:550px;">EMAIL</th>
                    <th style="width:550px;">CADASTRADO EM</th>
                    <th style="width:550px;">HISTÓRICO</th>
                    <th style="width:50px;">EXCLUIR</th>
                    <th style="width:50px;">EDITAR</th>
                    <th style="width:50px;">AGENDAR CONSULTA</th>
                    
                  </tr>

                </thead>
                <tbody>
             <?php foreach ($busca as $key => $value) {

               $id_paciente = $value['id_paciente']; 
               //echo $id_paciente;
               
               $_SESSION['id_paciente'] = $value['id_paciente'];
               $value['cpf'] = substr_replace(substr_replace(substr_replace($value['cpf'], '-', 9,0), '.', 6,0), '.', 3,0);
             

              ?>

                	<tr>
                		<td><?php echo $value['nome']; ; ?></td>
                		<td><?php echo $value['cpf'];  ?></td>
                		<td><?php echo $value['email'];  ?></td>
                		<td><?php echo date('d/m/Y', strtotime($value['cadastrado_em']));  ?></td>
                		<?php 

            if($_SESSION['func'] == 2 || $_SESSION['func'] == 3){

            	$visualizar = "restrito.php";
            	$excluir = "excluir_paciente.php?id_paciente=$id_paciente";
            	$editar =  "editar_paciente.php?id_paciente=$id_paciente";
                $agendar = "agendar_consulta.php?id_paciente=$id_paciente";
            }

            if($_SESSION['func'] == 1 || $_SESSION['func'] == 3){

            	$visualizar = "panel_paciente.php?id_paciente=$id_paciente";
            }


        	?>
                		<td><a href="<?php echo $visualizar ;?>">VISUALIZAR</a></td>
                		<td><a href="<?php echo $excluir ;?>"><img src="Fotos/excluir.png" style="width: 30px;"></a></td>
                		<td><a href="<?php echo $editar ;?>"><img src="Fotos/edit.png" style="width: 30px;"></a></td>
                        <td><a href="<?php echo $agendar ;?>"><img src="Fotos/agenda.png" style="width: 40px;"></a></td>
                	</tr>
                 
                </tbody>
            <?php } ?>    
              </table>
        </div>
        <div class="col-md-11" style="text-align: center">
        	<?php 

            if($_SESSION['func'] == 2){

            	$voltar = "panel_sec.php";
            }

            if($_SESSION['func'] == 1){

            	$voltar = "panel_med.php";
            }

            if($_SESSION['func'] == 3){

            	$voltar = "panel_adm.php";
            }


        	?>
                <a href="<?php echo $voltar ?>" style="position: relative; bottom: 60px; left: 40px;">VOLTAR</a>
            </div>
    </div>
</form>
  <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
