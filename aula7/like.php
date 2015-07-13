<?php include('_conexao.php'); ?>
<?php include('_login.php'); ?>

<?php

$sql = 'UPDATE posts SET likes = likes + 1 WHERE id_post = ?';
$comando = $conexao->prepare($sql);
$comando->bind_param('i', $_GET['id']);
$comando->execute();
header('Location: index.php');