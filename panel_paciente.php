<?php
session_start();

require_once('conn.php');


$id = $_GET['id_paciente']; 

//echo $id;

$sql = $pdo->prepare("SELECT * FROM `pacientes` WHERE id_paciente = $id;");
$sql->execute();

$dados = $sql->fetchAll();

foreach ($dados as $key => $value) {
    

}

if(isset($_POST['acao'])){

$data = date("Y-m-d H:i:s");
$comentario = $_POST['comentario'];
$sql2 = $pdo->prepare("INSERT INTO `historico_paciente` (`id_historico`, `id_paciente`, `descricao_consulta`, `registro`) VALUES (null, ?, ?, ?)");


$sql2->execute(array($id,$comentario,$data)); 






  echo "<Conculta salva com sucesso !";
}

$sql3 = $pdo->prepare("SELECT descricao_consulta FROM `historico_paciente` WHERE id_paciente = $id");
$sql3->execute();

$info = $sql3->fetchAll();




?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="SHORTCUT ICON" href="Fotos/hospital.png">
        <script src="ckeditor/ckeditor.js"></script>
        <style type="text/css">
            
            .linha{

              height: 6px;
              background-color:#A52A2A;
            }

            body{

                background-color:#E6E6FA; 
            }
        </style>
        <title>Painel | CLIMED</title>
    </head>
      

    <body>
        
        <h1>Painel do Paciente</h1>
 
        <p><h3>Histórico de <?php echo $value['nome']; ?></h3></p>

        <?php

         $value['cpf'] = substr_replace(substr_replace(substr_replace($value['cpf'], '-', 9,0), '.', 6,0), '.', 3,0);
         $value['tel1'] = substr_replace(substr_replace(substr_replace($value['tel1'], '-', 7,0), ')', 2,0), '(', 0,0);
         $value['dt_nascimento'] = date('d/m/Y',  strtotime($value['dt_nascimento']));

         echo 'CPF:  '.$value['cpf'];
         echo  "</br>";
         echo 'Email: '.$value['email'];
         echo  "</br>";
         echo 'Telefone: '.$value['tel1'];
         echo  "</br>";
         echo 'Data de Nascimento: '.$value['dt_nascimento'];
         echo  "</br>";echo  "</br>";
         echo 'Endereço: '.$value['endereco']."  ".$value['numero']."  " .$value['complemento']."  " .$value['bairro']."  " .$value['uf'];
         






         ?>
         <hr class="linha">
         <br/><br/>
         <label><h3>Faça a descrição da consulta:</h3></label>
         <form name="consulta_paciente" action="panel_paciente.php?id_paciente=<?php echo $id;?>"" method="POST" >
         <textarea name="comentario" style="height: 265px; width: 700px;"></textarea>
         <script>
                CKEDITOR.replace( 'comentario' );
        </script>
         <br/><br/>
         <button type="submit" style="height: 45px; width: 95px;" name="acao">Salvar Consulta</button>

         <br/><br/>

         <label><h3>HISTÓRICO DO PACIENTE:</h3></label>
         <?php
         foreach ($info as $key => $value) {
 
         echo "<br/>";
         echo $value['descricao_consulta'];
         echo "<hr>";




         }

         ?>
        <h4><a href="listar_paciente.php" style="position: relative; height: 100px; left: 60px; background-color:#A52A2A; color: #ffff;">VOLTAR</a></h4>
        </form>

    </body>
<?php //} ?>
</html>