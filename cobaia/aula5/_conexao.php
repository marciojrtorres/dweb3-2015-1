<?php
$conexao = new mysqli('localhost', 'root', 'root', 'etecwitter');
$conexao->set_charset('utf8');

if ($conexao->connect_error) {
  die('conexao falhou');
}