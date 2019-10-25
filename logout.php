<?php 


// inicia a sessão 
session_start(); 

// muda valor de loged_in para false 

$_SESSION['logged_in'] = false; 



//finaliza a sessão 

session_destroy(); 

// retorna para o login.html

header('Location: login.html'); 






?>