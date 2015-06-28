<?php

// usar a sessão:
// espaço de armazenamento de propriedades de uma
// pessoa que está navegando (neste instante)
session_start();

// existe um usuário na sessão?
if ($_SESSION['usuario']) {
  // mostrar um avatar (previamente cadastrado em gravatar.com)
  $gravatar = "http://www.gravatar.com/avatar/";
  $hash = md5($_SESSION['usuario']['email']);
  echo "<img src='{$gravatar}{$hash}?s=40' alt='avatar' />";
  // mostrar o nome do usuário já logado
  echo "{$_SESSION['usuario']['nome']} | ";
  echo "<a href='usuario_logout.php'>Sair</a>"; // link para sair
} else { // se não: redireciona para o login
  header("Location: usuario_login.php"); // redirecionar
}