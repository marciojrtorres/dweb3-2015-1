<?php include('_header.php'); ?>

<?php include('_conexao.php'); ?>

<?php include('_login.php'); ?>

<h3>Bem-vindo <?= $_SESSION['usuario']['nome'] ?>, 
acompanhe o que seus amigos estão dizendo ...</h3>

<?php
$id_usuario = $_SESSION['usuario']['id'];
$sql = "SELECT * FROM posts WHERE id_usuario != {$id_usuario} ORDER BY instante DESC";
$resultado = $conexao->query($sql);
?>

<?php while($post = $resultado->fetch_assoc()): ?>
  <div style='font-size: 0.8em;'>
    Postado em 
    <?= date('d/m/Y H:i:s', strtotime($post['instante'])) ?>
  </div>
  <div style='font-family: times, bookman; margin: 1em; font-style: italic'>
    <?= $post['texto'] ?>
  </div>      
  <?php if ($post['foto']): ?>
    <div>
      <img src='upload/<?= $post['foto'] ?>'/>
    </div>
  <?php endif ?>    
  <a href='like.php?id=<?=$post['id_post'] ?>'><img src='img/like.png' width='20' height='20'></a>
  <?= $post['likes'] ?> curtida(s)
  
<?php endwhile ?>

<?php include('_footer.php'); ?>