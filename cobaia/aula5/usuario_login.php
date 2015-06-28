<?php include('_conexao.php'); ?>
<?php include('_header.php'); ?>

<h3>Entre com suas credenciais ou <a href="usuario_registro.php">registre-se aqui</a></h3>

<form method="post">
    <label>
      E-mail:
      <input type="text" name="email" size="25" maxlength="25">
    </label>
    <label>
      Senha:
      <input type="password" name="senha" size="20" maxlength="20">
    </label>
    <input type="submit" value="Entrar >>">
</form>

<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $email = $_POST['email'];
  $senha = md5($_POST['senha']);
  echo var_dump($_POST);
  $sql = 'SELECT id_usuario, nome FROM usuario WHERE email = ? AND senha = ?';
  $comando = $conexao->prepare($sql);
  $comando->bind_param('ss', $email, $senha);
  $comando->execute();
  echo var_dump($comando);
  $comando->bind_result($id, $nome);
  if ($comando->fetch()) {
    $usuario = array('id' => $id, 'nome' => $nome, 'email' => $email);
    $_SESSION['usuario'] = $usuario;
  } else {
    echo "E-mail e/ou Senha inválidos, tente novamente!";
  }
}
echo $_SESSION['usuario'];
?>

<?php include('_footer.php'); ?>