<?php include('_header.php'); ?>

<?php include('_conexao.php'); ?>

<h1>Lista de Contatos</h1>

<?php

$sql = 'SELECT * FROM contatos ORDER BY id_contato DESC';

$resultado = $conexao->query($sql);

echo "Foram encontrados {$resultado->num_rows} registros <br><br>";

//while ($contato = $resultado->fetch_assoc()) {
//  echo "{$contato['id_contato']} {$contato['nome']} {$contato['telefone']} <br>";
//}

$generos = array();
$generos[''] = '- - - -';
$generos['m'] = 'Masculino';
$generos['f'] = 'Feminino';

$grupos = array('Família', 'Amigos', 'Conhecidos');
$grupos[''] = 'Sem grupo';
?>

<table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Nome</th>
      <th>Telefone</th>
      <th>Gênero</th>
      <th>Grupo</th>
      <td></th>
    </tr>
  </thead>
  <tbody>
    <?php while ($contato = $resultado->fetch_assoc()): ?>
    <tr>
      <td><?= $contato['id_contato'] ?></td>
      <td><?= $contato['nome'] ?></td>
      <td><?= $contato['telefone'] ?></td>
      <td><?= $generos[$contato['genero']] ?></td>
      <td><?= $grupos[$contato['grupo']] ?></td>
      <td>        
        <a href='contato_edita.php'>
          Edita
        </a>
        &nbsp;
        <a href='contato_exclui.php?id=<?= $contato['id_contato'] ?>'>
          Exclui
        </a>        
      </td>
    </tr>
    <?php endwhile ?>
  </tbody>
</table>



<?php include('_footer.php'); ?>