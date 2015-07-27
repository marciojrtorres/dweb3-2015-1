<?php
$conexao = new mysqli('localhost', 'u108991855_etec', 'etecetec', 'u108991855_etec');
$conexao->set_charset('utf8');

if ($conexao->connect_error) {
  die('conexao falhou');
}