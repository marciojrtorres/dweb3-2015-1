<?php include('_header.php'); ?>

<?php include('_conexao.php'); ?>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  $id = $_GET['id'];
  $sql = 'SELECT nome FROM contatos WHERE id_contato = ?';
  $comando = $conexao->prepare($sql);
  $comando->bind_param('i', $id);
  $comando->execute();
  $comando->bind_result($nome);
  $var = $comando->fetch();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  if ($_POST['confirma'] == 's') {
    $sql = 'DELETE FROM contatos WHERE id_contato = ?';
    $comando = $conexao->prepare($sql);
    $comando->bind_param('i', $_POST['id']);
    $comando->execute();
  }
  
  header('location: contato_lista.php');
}
?>

<h1>Exclui Contato</h1>

<form method='post'>
  <input type='hidden' name='id' value='<?= $id ?>'/>
  Está certo que deseja excluir <?= $nome ?>?
  <button name='confirma' value='n'>Não</button>
  <button name='confirma' value='s'>Sim</button>
</form>



<?php include('_footer.php'); ?>