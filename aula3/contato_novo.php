<?php include('_header.php'); ?>

<?php include('_conexao.php'); ?>

<h1>Novo Contato</h1>

<form method='post'>
  <label for='nome'>Nome:</label>
  <br>
  <input type='text' id='nome' name='nome' required
    size="25" maxlength="25"
    autofocus placeholder='Nome do Contato' />
  
  <br><br>
  
  <label for='telefone'>Telefone:</label>
  <br>
  <input type='tel' id='telefone' name='telefone'
         pattern='[0-9]{8}' title='O telefone deve ter exatamente 8 dígitos'/>
  
  <br><br>
  
  <fieldset>
    <legend>Gênero:</legend>    
    <label>
      <input type='radio' name='genero' value='f'/>
      Feminino
    </label>
    <label>
      <input type='radio' name='genero' value='m'/>
      Masculino
    </label>
  </fieldset>
  
  <br>
  
  <label>
    Grupo:
    <br>
    <select name='grupo'>
      <option value='2'>Conhecidos</option>
      <option value='1'>Amigos</option>
      <option value='0'>Família</option>
    </select>
  </label>
  
  <br><br>
  <input type='submit' value='Adiciona' />
  <input type='reset' value='Limpa' />
</form>

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