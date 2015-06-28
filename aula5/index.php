<?php include('_header.php'); ?>

<?php include('_conexao.php'); ?>

<?php include('_login.php'); ?>

<h3>Bem-vindo <?= $_SESSION['usuario']['nome'] ?>, 
acompanhe o que seus amigos estão dizendo ...</h3>

<div>
  Postagem dos amigos ...
</div>

<?php include('_footer.php'); ?>