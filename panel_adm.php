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
         
        <h1>Painel do Administrador</h1>
 
        <p>Bem-vindo ao seu painel, <?php echo $_SESSION['user_name']; ?> | <a href="logout.php">Sair</a></p>


        <h3><a href="cadastro_usuario.html">CADASTRAR USUÁRIO</a></h3>

        <h3><a href="listar_usuarios.php">CONSULTAR USUÁRIOS</a></h3>
    </body>
</html>