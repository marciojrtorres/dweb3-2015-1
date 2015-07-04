<?php include('_header.php'); ?>

<?php include('_conexao.php'); ?>

<?php include('_login.php'); ?>

<h3>Minha Página</h3>

<?php

$id_usuario = $_SESSION['usuario']['id'];

$sql = "SELECT * FROM posts WHERE id_usuario = {$id_usuario} ORDER BY instante DESC";
$resultado = $conexao->query($sql);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  
  $texto = substr($_POST['texto'], 0, 128);
  
  $foto = NULL;
  
  if ($_FILES['foto']['name']) {
    $nome = md5(uniqid());    
    $extensao = @end(explode('.', $_FILES['foto']['name']));
    $foto = "{$nome}.{$extensao}";    
    $upload = "upload/{$foto}";
    move_uploaded_file($_FILES['foto']['tmp_name'], $upload);
  }
  
  $sql = 'INSERT INTO posts (id_usuario, texto, foto, instante) VALUES (?, ?, ?, NOW())';
  $comando = $conexao->prepare($sql);
  $comando->bind_param('iss', $id_usuario, $texto, $foto);
  $comando->execute();
  header('Location: minha.php');
}

?>

<div style='margin: 2em;'>

  <form method='post' enctype='multipart/form-data'>
    <textarea name='texto' placeholder='O que queres dizer hoje vivente?'
              style='width:100%'></textarea>
    <input type='file' name='foto' accept='image/*'/>
    <br>
    <input type='submit' value='Postar!'/>
  </form>

  <br>
  
  <?php if ($resultado->num_rows == 0): ?>
    Tu não fizeste nenhuma postagem ainda!
  <?php endif ?>

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
  <?php endwhile ?>
</div>

<?php include('_footer.php'); ?>