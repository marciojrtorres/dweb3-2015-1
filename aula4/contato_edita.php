<?php include('_header.php'); ?>
<?php include('_conexao.php'); ?>

<?php

$id = $_REQUEST['id'];

$nome = @$_POST['nome']; // @ suprime o erro
$telefone = @$_POST['telefone'];
$genero = @$_POST['genero'];
$grupo = @$_POST['grupo'];

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  
  $sql = 'SELECT nome, telefone, genero, grupo FROM contatos WHERE id_contato = ?';
  
  $comando = $conexao->prepare($sql);
  $comando->bind_param('i', $id);
  $comando->execute();
  $comando->bind_result($nome, $telefone, $genero, $grupo);
  $comando->fetch();
  
}

?>

<h1>Edita Contato Código #<?= $id ?></h1>

<form method='post'>
  <input type='hidden' name='id' value='<?= $id ?>' />

  <label for='nome'>Nome:</label>
  <br>
  <input value="<?= $nome ?>"
    type='text' id='nome' name='nome' required
    size="25" maxlength="25"
    autofocus placeholder='Nome do Contato' />
  
  <br><br>
  
  <label for='telefone'>Telefone:</label>
  <br>
  <input value="<?= $telefone ?>"
         type='tel' id='telefone' name='telefone'
         pattern='[0-9]{8}' title='O telefone deve ter exatamente 8 dígitos'/>
  
  <br><br>
  
  <fieldset>
    <legend>Gênero:</legend>    
    <label>
      <input <?= $genero == 'f' ? 'checked' : '' ?>
        type='radio' name='genero' value='f' />
      Feminino
    </label>
    <label>
      <input <?= $genero == 'm' ? 'checked' : '' ?>
        type='radio' name='genero' value='m'/>
      Masculino
    </label>
  </fieldset>
  
  <br>
  
  <label>
    Grupo:
    <br>
    <select name='grupo'>
      <option <?= $grupo == 2 ? 'selected' : '' ?> 
        value='2'>Conhecidos</option>
      <option <?= $grupo == 1 ? 'selected' : '' ?> 
        value='1'>Amigos</option>
      <option <?= $grupo == 0 ? 'selected' : '' ?> 
        value='0'>Família</option>
    </select>
  </label>
  
  <br><br>
  <input type='submit' value='Salva' />
  <input type='reset' value='Limpa' />
</form>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
  // validação no servidor
  if (strlen($nome) < 3) {
    echo "Nome muito curto, é necessário pelo menos 3 caracteres";
  } else if (strlen($nome) > 25) {
    echo "Nome muito longo, é aceito no máximo 25 caracteres";
  } else if (strlen($telefone) > 0 && ! preg_match("/^[0-9]{8}$/", $telefone)) {
    echo "O Telefone deve ter exatamente 8 dígitos";
  } else {
       
    $sql = 'UPDATE contatos SET nome = ?, telefone = ?, genero = ?, grupo = ? WHERE id_contato = ?';
    
    $comando = $conexao->prepare($sql);
    
    $comando->bind_param('sssii', $nome, $telefone, $genero, $grupo, $id);
    
    $comando->execute();
    
    // echo "Contato adicionado com sucesso";
    
    header('location: contato_lista.php'); 
  }
} 
?>

<?php include('_footer.php'); ?>