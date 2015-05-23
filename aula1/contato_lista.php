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

        <h1>Lista de Contatos</h1>
        
        <?php
        $conexao = new mysqli('localhost', 'root', '', 'agenda');
        $conexao->set_charset('utf8');
        
        if ($conexao->connect_error) {
          die('conexao falhou');
        }
        
        $sql = 'SELECT * FROM contatos';
        
        // "debugar"
        // echo var_dump($sql);
        
        $resultado = $conexao->query($sql);
        
        echo "Foram encontrados {$resultado->num_rows} registros <br><br>";
        
        while ($contato = $resultado->fetch_assoc()) {
          echo "{$contato['id_contato']} {$contato['nome']} {$contato['telefone']} <br>";
        }
        
        ?>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.3.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>
