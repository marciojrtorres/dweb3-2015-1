<?php
session_start();

if ($_SESSION['usuario']) {
  echo "<img src='http://www.gravatar.com/avatar/".md5($_SESSION['usuario']['email'])."?s=40'>";
  echo "{$_SESSION['usuario']['nome']} | <a href='usuario_logout.php'>Sair</a>";
} else {
  header("Location: usuario_login.php");
}
?>