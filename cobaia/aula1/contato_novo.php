<?php 
include_once('lib/banco.php'); 
?>

<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Lista de Contatos</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <h1>Novo Contato</h1>
        
        <form method='post'>
          <label for='nome'>Nome:</label>
          <input type='text' id='nome' name='nome' required/>
          <input type='tel' id='telefone' name='telefone'/>
          <input type='submit' value='Adicionar'/>
        </form>
        
        <?php
          if ($_SERVER['REQUEST_METHOD'] === 'POST') {    
            if (preg_match("/[0-9]{8}/", $_POST['telefone'])) {
                echo 'ok';
            } else {
                echo 'nao';
            }
            if (strlen($_POST['nome']) < 5) {
              echo "ERRO: O nome {$_POST['nome']} é muito curto, necessário pelo menos 5 caracteres";
            } else {
              $sql = 'INSERT INTO contatos (nome) VALUES (?)';            
              $comando = $conexao->prepare($sql);
              $comando->bind_param('s', $_POST['nome']);
              $comando->execute();
              //header('location: contato_lista.php');
            }
          }
        ?>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.3.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>
