<?php 

require_once('conn.php');
 
if (!isLoggedIn())
{
    header('Location: login.html');
}


?>