<form method='post'>
  <input type='hidden' name='id' value='<?= @$id ?>'/>
  
  <label for='nome'>Nome:</label>
  <br>
  <input value="<?= @$nome ?>"
    type='text' id='nome' name='nome' required
    size="25" maxlength="25"
    autofocus placeholder='Nome do Contato' />
  
  <br><br>
  
  <label for='telefone'>Telefone:</label>
  <br>
  <input value="<?= @$telefone ?>"
         type='tel' id='telefone' name='telefone'
         pattern='[0-9]{8}' title='O telefone deve ter exatamente 8 dígitos'/>
  
  <br><br>
  
  <fieldset>
    <legend>Gênero:</legend>    
    <label>
      <input <?= @$genero == 'f' ? 'checked' : '' ?>
        type='radio' name='genero' value='f'/>
      Feminino
    </label>
    <label>
      <input <?= @$genero == 'm' ? 'checked' : '' ?>
        type='radio' name='genero' value='m'/>
      Masculino
    </label>
  </fieldset>
  
  <br>
  
  <label>
    Grupo:
    <br>
    <select name='grupo'>
      <option value='2' <?= @$grupo == 2 ? 'selected' : '' ?>>Conhecidos</option>
      <option value='1'>Amigos</option>
      <option value='0'>Família</option>
    </select>
  </label>
  
  <br><br>
  <input type='submit' value='Adiciona' />
  <input type='reset' value='Limpa' />
</form>