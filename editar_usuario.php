<?php
session_start();
require_once('conn.php');
require_once('checar.php'); 


$id = $_GET['id_usuario'];

$sql = $pdo->prepare("SELECT * FROM `usuarios` WHERE id_usuario = $id;"); 

 $sql->execute(); 

 $info = $sql->fetchAll();


 foreach ($info as $key => $value) {
   
         $value['cpf'] = substr_replace(substr_replace(substr_replace($value['cpf'], '-', 9,0), '.', 6,0), '.', 3,0);
         $value['telefone'] = substr_replace(substr_replace(substr_replace($value['telefone'], '-', 7,0), ')', 2,0), '(', 0,0);
    
        

         $_SESSION['id'] = $value['id_usuario'];








         								   						

         //echo $_SESSION['id'];

      }

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
    <link rel="SHORTCUT ICON" href="Fotos/hospital.png">
    <link type="text/css" rel="stylesheet" href="css/estilo.css" />
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
      <h1 style="text-align: center;">Editar Usuário</h1>
      <div class="row justify-content-center">
        <div class="col-md-11" style="font-weight: bold;">
          <label>Dados do Usuário</label>
        </div>
      </div>
      <form action="edit_usuario.php" method="POST">

      <div class="row justify-content-center">
        <div class="col-md-11" style="text-align: center">
          <input type="text" name="nameUser" value=<?php echo $value['nome'] ?> style="width: 100%;">
        </div>
        
      </div>
      <br>
        <div class="row justify-content-center">
          <div class="col-md-6" style="text-align: right">
            <input type="text" name="cpf" id="cpf" value=<?php echo $value['cpf'] ?> style="width: 91.3%;">
          </div>
          <div class="col-md-6">
            <input type="text" name="rg" id="rg" value=<?php echo $value['rg'] ?> style="width: 91.3%;">
          </div>
        </div>
        <br>
        <div class="row justify-content-center">
            <div class="col-md-6" style="text-align: right">
              <input type="text" name="email" id="email" value=<?php echo $value['email'] ?> style="width: 91.3%;">
            </div>
            <div class="col-md-6">
              <input type="text" name="tel" id="tel" value=<?php echo $value['telefone'] ?> style="width: 91.3%;">
            </div>
        </div>
        <br>
        
        <div class="row justify-content-center">
            <div class="col-md-11" style="font-weight: bold;">
                <label>Dados de acesso</label>
            </div>
           
        </div>
        
        <div class="row justify-content-center">
            <div class="col-md-6" style="text-align: right">
              <input type="password" name="senha" id="senha" placeholder="Senha" style="width: 91.3%;">
            </div>
            <div class="col-md-6">
              <input type="password" name="confirm_senha" id="confirm_senha" placeholder="Confirmar Senha" style="width: 91.3%;">
            </div>
          </div>
          <div class="row" style="text-align: center;  padding: 20px;">
            <button type="submit" name="acao" style="margin: auto;">Editar</button>

          </div>
               <a href="panel_adm.php" style="padding-left: 535px;" >voltar</a>
        </form>

    </div>

  <script type="text/javascript">
    
    var password = document.getElementById("senha")
  , confirm_password = document.getElementById("confirm_senha");

function validatePassword(){
  if(senha.value != confirm_senha.value) {
    confirm_senha.setCustomValidity("Senhas diferentes!");
  } else {
    confirm_senha.setCustomValidity('');
  }
}

senha.onchange = validatePassword;
confirm_senha.onkeyup = validatePassword;
  </script>

  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script> <!-- Jquery -->
 
  <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>