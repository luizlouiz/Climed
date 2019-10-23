<?php
session_start();
require_once('conn.php');
require_once('checar.php'); 




$id = $_GET['id_paciente'];

$sql = $pdo->prepare("SELECT * FROM `pacientes` WHERE id_paciente = $id;"); 

 $sql->execute(); 

 $info = $sql->fetchAll();


 foreach ($info as $key => $value) {
   
         $value['cpf'] = substr_replace(substr_replace(substr_replace($value['cpf'], '-', 9,0), '.', 6,0), '.', 3,0);
         $value['tel1'] = substr_replace(substr_replace(substr_replace($value['tel1'], '-', 7,0), ')', 2,0), '(', 0,0);
         $value['tel2'] = substr_replace(substr_replace(substr_replace($value['tel2'], '-', 7,0), ')', 2,0), '(', 0,0);
         $value['dt_nascimento'] = date('d/m/Y',  strtotime($value['dt_nascimento']));

         $_SESSION['id'] = $value['id_paciente'];

         echo $_SESSION['id'];
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
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script> <!-- Jquery -->
    <script type="text/javascript" src="main.js"></script>

</head>
<body>
    <div class="container">
        <div class="logo" style="font-weight: bold; font-size: 5em; color: #b30000; margin-left:0px !important;">CLIMED</div>
        <h1 style="text-align: center;">Editar <?php echo $value['nome']?></h1>
        <div class="row">
            <div class="col-md-11" style="font-weight: bold;">
              <label>Dados do Paciente</label>
            </div>
            <form action="run_edit.php" method="POST">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        Nome do paciente <input type="text" name="nome" value="<?php echo $value['nome']?>" style="width:100%;">
                    </div>
                    <div class="col-md-6">
                        CEP  <input type="text" name="cep" value="<?php echo $value['cep']?>" style="width: 100%;">
                    </div>
                </div>
                <br>
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        CPF <input type="text" name="cpf" id="cpf" value="<?php echo $value['cpf']?>" style="width:100%;">
                    </div>
                    <div class="col-md-6">
                        Endereço <input type="text" name="endereco" value="<?php echo $value['endereco']?>" style="width:100%;">
                    </div>
                </div>
                <br>
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        EMAIL <input type="text" name="email" value="<?php echo $value['email']?>" style="width:100%;">
                    </div>
                    
                    <div class="col-md-6">
                        Número <input type="text" name="numero" value="<?php echo $value['numero']?>" style="width:100%;">
                    </div>
                </div>
                <br>
            
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        Telefone 1 <input type="text" name="tel1" id="tel1" value="<?php echo $value['tel1']?>" style="width:100%;">
                    </div>
                    <div class="col-md-6">  
                        Complemento <input type="text" name="complemento" value="<?php echo $value['complemento']?>" style="width:100%;">
                    </div>
                </div>
                <br>
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        Telefone 2 <input type="text" name="tel2" id="tel2" value="<?php echo $value['tel2']?>" style="width:100%;">
                    </div>
                    <div class="col-md-6">  
                        Bairro <input type="text" name="bairro" value="<?php echo $value['bairro']?>" style="width:100%;">
                    </div>
                </div>
                <br>
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        Data de nascimento <input type="date" name="dtNascimento" id="dtNascimento" value="<?php echo $value['dt_nascimento']?>" style="width:100%;" required>
                    </div>
                    <div class="col-md-6">  
                        UF <input type="text" name="uf" value="<?php echo $value['uf']?>" style="width:100%;">
                    </div>
                </div>
                <hr>
                <input type="checkbox" id="underAge" name="underAge"> Menor de idade
                <br>
                <br>
                <div class="row justify-content-center" style="display: none;" id="formResponsavel">
                    <div class="col-md-6">
                        Nome responsável <input type="text" name="nome_responsavel" value="<?php echo $value['nome_responsavel']?>" style="width:100%;">
                    </div>
                    <br>
                    <div class="col-md-6">  
                        Telefone responsável <input type="text" name="tel_responsavel" id="tel_responsavel" value="<?php echo $value['tel_responsavel']?>" style="width:100%;">
                    </div>
                </div>
                <button type="submit" name="acao" class="btn btn-success">EDITAR</button>
                <a href="panel_sec.php" style="padding-left: 420px;">VOLTAR</a>
            </form>
        </div>
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script> <!-- Jquery -->
 
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>