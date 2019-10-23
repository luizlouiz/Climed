<?php
session_start();

require_once('conn.php');
require_once('checar.php');  

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="SHORTCUT ICON" href="Fotos/hospital.png">
 
        <title>Painel | CLIMED</title>
        <style type="text/css">
            

            body{

                background-color:#E6E6FA; 
            }
        </style>
    </head>
 
    <body>
         
        <h1>Painel do(a) Secretário(a)</h1>
 
        <p>Bem-vindo ao seu painel, <?php echo $_SESSION['user_name']; ?> | <a href="logout.php">Sair</a></p>

        <h3><a href="cad_paciente.html">CADASTRAR PACIENTE</a></h3>
        <br/>
        <h3><a href="listar_paciente.php">CONSULTAR PACIENTE</a></h3>
    </body>
</html>