<?php include('_header.php'); ?>

<?php include('_conexao.php'); ?>

<h1>Novo Contato</h1>

<?php include('_contato_form.php'); ?>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  
  $nome = $_POST['nome'];
  $telefone = $_POST['telefone'];
  $genero = $_POST['genero'];
  $grupo = $_POST['grupo'];
  
  // validação no servidor
  if (strlen($nome) < 3) {
    echo "Nome muito curto, é necessário pelo menos 3 caracteres";
  } else if (strlen($nome) > 25) {
    echo "Nome muito longo, é aceito no máximo 25 caracteres";
  } else if (strlen($telefone) > 0 && ! preg_match("/^[0-9]{8}$/", $telefone)) {
    echo "O Telefone deve ter exatamente 8 dígitos";
  } else {
       
    
    // SQL INJECTION
    $sql = 'INSERT INTO contatos (nome, telefone, genero, grupo) VALUES (?, ?, ?, ?)';
    
    $comando = $conexao->prepare($sql);
    
    $comando->bind_param('sssi', $nome, $telefone, $genero, $grupo);
    
    $comando->execute();
    
    // echo "Contato adicionado com sucesso";
    
    header('location: contato_lista.php'); 
  }
} 
?>

<?php include('_footer.php'); ?>