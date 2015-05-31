<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Novo Contato</title>
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
        
        <a href='contato_lista.php'>
          Lista Contatos
        </a>

        <h1>Novo Contato</h1>
        
        <form method='post'>
          <label for='nome'>Nome:</label>
          <input type='text' id='nome' name='nome' required
            size="25" maxlength="25"
            autofocus placeholder='Nome do Contato' />
            
          <label for='telefone'>Telefone:</label>
          <input type='tel' id='telefone' name='telefone'
                 pattern='[0-9]{8}' title='O telefone deve ter exatamente 8 dígitos'/>
          
          <input type='submit' value='Adiciona' />
          <input type='reset' value='Limpa' />
        </form>
        
        <?php
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          
          $nome = $_POST['nome'];
          $telefone = $_POST['telefone'];
          
          // validação no servidor
          if (strlen($nome) < 3) {
            echo "Nome muito curto, é necessário pelo menos 3 caracteres";
          } else if (strlen($nome) > 25) {
            echo "Nome muito longo, é aceito no máximo 25 caracteres";
          } else if (strlen($telefone) > 0 && ! preg_match("/^[0-9]{8}$/", $telefone)) {
            echo "O Telefone deve ter exatamente 8 dígitos";
          } else {
            
            $conexao = new mysqli('localhost', 'root', '', 'agenda');
            $conexao->set_charset('utf8');
            
            if ($conexao->connect_error) {
              die('conexao falhou');
            }
            
            // SQL INJECTION
            $sql = 'INSERT INTO contatos (nome, telefone) VALUES (?, ?)';
            
            $comando = $conexao->prepare($sql);
            
            $comando->bind_param('ss', $nome, $telefone);
            
            $comando->execute();
            
            // echo "Contato adicionado com sucesso";
            
            header('location: contato_lista.php');
            
          }
          
        } 
    
        
        
        ?>
        
        
        
        
        
        
        
        
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.3.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>