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


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="SHORTCUT ICON" href="Fotos/hospital.png">
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script> <!-- Jquery -->
    <script type="text/javascript" src="main.js"></script>

</head>
 
  <style type="text/css">
  	
  	body{
     
      background-color:#E6E6FA; 
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
		
  	}


 .teste{
  
  background: transparent;
  position :relative;
 	animation: animate 3s;
 }

 @keyframes animate{

 	from {transform: scale(0, 2);}
  to {transform: scale(1.2, 1.2);}
    
  
  
 }

  </style>

<body>

  
  <div class="teste">
 <h1 style="color: #b56d5b ">INSERIDO COM SUCESSO!</h1>
 </div> 
 
 <h4><a href=<?php echo $panel;?> style="position: relative; height: 100px; right: 230px; top: 100px; background-color:#A52A2A; color: #ffff;">VOLTAR</a></h4>
   
</body>
</html>