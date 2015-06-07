<?php include_once('lib/banco.php'); ?>

<?php 
$title = 'Novo Contato';
include_once('_header.php'); 
?>

<h1>Novo Contato</h1>

<form method='post'>
  <label for='nome'>Nome:</label>
  <input type='text' id='nome' name='nome' required/>
  <input type='tel' id='telefone' name='telefone'/>
  <fieldset>
  <legend>Gênero</legend>
  <input type='radio' id='masculino' name='genero' value='m'/>
  <label for='masculino'>Masculino</label>                    
  <input type='radio' id='feminino' name='genero' value='f'/>          
  <label for='feminino'>Feminino</label>            
  </fieldset>
  <label for='grupo'>Grupo:</label>
  <select name='grupo' id='grupo'>
    <option value=''>-- selecione --</option>
    <option value='0'>Família</option>
    <option value='1'>Amigo</option>
  </select>
  <input type='submit' value='add'>
</form>

<?php
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {    
    
    $sql = 'INSERT INTO contatos (nome, telefone, genero, grupo) VALUES (?, ?, ?, ?)';            
    echo var_dump($_POST);
    $comando = $conexao->prepare($sql);
    $comando->bind_param('sssi', 
                         $_POST['nome'],
                         $_POST['telefone'], 
                         $_POST['genero'],
                         $_POST['grupo'] ? $_POST['grupo'] : NULL);
    $comando->execute();
    //header('location: contato_lista.php');
    
  }
?>

<?php include_once('_footer.php'); ?>