<?php
session_start();
 
require_once('conn.php');

ini_set( 'display_errors', 0 );

if($_SESSION['func'] == 1){

    $panel = "panel_med.php";
}

if($_SESSION['func'] == 2){

    $panel = "panel_sec.php";
}

if($_SESSION['func'] == 3){

    $panel = "panel_adm.php";
}

?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="SHORTCUT ICON" href="Fotos/hospital.png">
 
        <title>Sistema de Login Climed</title>
        <style type="text/css">
            

            body{

                background-color:#E6E6FA; 
            }
        </style>
    </head>
 
    <body>
         
        <h1>Climed</h1>
 
        <?php if (isLoggedIn()): ?>
            <p>Olá, <?php echo $_SESSION['user_name']; ?>. Para acessar seu Painel click no link <a href=<?php echo $panel; ?> >Painel</a> | <a href="logout.php">Sair</a></p>
        <?php else: ?>
            <p>Esta é uma página restrita, para acessar é necessário login ! <a href="login.html">Login</a></p>
        <?php endif; ?>
 
    </body>
</html>