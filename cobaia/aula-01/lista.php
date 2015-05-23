<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title></title>
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

        <!-- Add your site or application content here -->
        <h1>Abrindo contato #1</h1>
        
        <?php
          $conexao = new mysqli('localhost','root','','agenda');
          $conexao->set_charset('utf8');
          
          $sql = 'SELECT * FROM contatos';
          
          $resultado = $conexao->query($sql);
          
          //while ($registro = $resultado->fetch_assoc()) {
          //  echo var_dump($registro['nome']) . "<br>";
          //}
          
          //$resultado->data_seek(1);
          $array = $resultado->fetch_all(MYSQLI_ASSOC);
          
          echo var_dump($array);
        
        ?>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.3.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>        
    </body>
</html>
