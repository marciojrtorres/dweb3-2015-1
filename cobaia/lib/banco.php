<?php

$conexao = new mysqli('localhost', 'root', '', 'agenda');
$conexao->set_charset('utf8');

if ($conexao->connect_error) {
  die('conexao falhou');
}