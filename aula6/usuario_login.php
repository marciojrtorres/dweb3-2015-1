<?php include('_header.php'); ?>

<?php include('_conexao.php'); ?>

<form method='post'>
  <label>
    E-mail:
    <input type='email' name='email' size='30' maxlength='30' />
  </label>
  <label>
    Senha:
    <input type='password' name='senha' size='30' maxlength='30' />
  </label>
  <input type='submit' value='Entrar >>>' />
</form>

<br><br>

<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $email = $_POST['email'];
  $senha = md5($_POST['senha']);
  
  $sql = 'SELECT id_usuario, nome FROM usuarios WHERE email = ? AND senha = ?';
  
  $comando = $conexao->prepare($sql);  
  $comando->bind_param('ss', $email, $senha);
  $comando->execute();
  $comando->bind_result($id, $nome);
  
  // existe este email/senha?
  if ($comando->fetch()) {
    
    $usuario = array('id' => $id, 'nome' => $nome, 'email' => $email);
    $_SESSION['usuario'] = $usuario;
    header('Location: index.php');
  
  } else { // não existe
    echo "Usuário não encontrado. Tente novamente.";
  }
}
?>

<?php include('_footer.php'); ?>