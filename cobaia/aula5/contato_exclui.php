<?php include('_header.php'); ?>

<?php include('_conexao.php'); ?>

<h1>Exclui Contato</h1>

<form method='post'>
  <input type='hidden' name='id' value='<?= $_GET['id'] ?>'/>
  Está certo que deseja excluir $nome?
  <button name='confirma' value='n'>Não</button>
  <button name='confirma' value='s'>Sim</button>
</form>

<?php

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

<?php include('_footer.php'); ?>