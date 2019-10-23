<?php

 $pdo = new PDO('mysql:host=localhost;dbname=climed', 'root', '');



 /**
 * Verifica se o usuário está logado
 */
function isLoggedIn()
{
    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true)
    {
        return false;
    }
 
    return true;
}





// habilita todas as exibições de erros
ini_set('display_errors', true);
error_reporting(E_ALL);

?>