<?php
require '../funcoes/crud/crud.php';
$acao = filter_input(INPUT_POST, 'acao', FILTER_SANITIZE_STRING);

switch ($acao) {
    case 'form_cad':
?>
      <div class="retorno"></div>
      <form action="" name="form_cad" method="post">
        <div class="form-group col-md-12">
          <label for="InputNome">Nome</label>
          <input type="nome" name="nome" maxlength="30" class="form-control" id="InputNome" aria-describedby="nomeHelp" placeholder="Nome" required>
        </div>  

        <div class="form-group col-md-6">
          <label for="InputUsername">Login</label>
          <input type="nome" name="login" maxlength="25" class="form-control" id="InputUsername" aria-describedby="usernameHelp" placeholder="Login" required>
        </div>
        <div class="form-group col-md-6">
          <label for="inputPassword">Senha</label>
          <input type="password" name="senha" maxlength="15" class="form-control" id="inputPassword" placeholder="Senha" required>
        </div>
        <div class="form-group  col-md-6">
          <label for="InputEmail">Email</label>
          <input type="email" name="email" maxlength="60" class="form-control" id="InputEmail" aria-describedby="emailHelp" placeholder="E-mail" required>
        </div>
        
        <div class="form-group col-md-6">
            <label for="inputNivel">Tipo de Usuário</label>
            <select name="nivel" id="inputNivel" class="form-control" required>
              <option value="2">Funcionario</option>
            </select>
        </div>
          <button type="submit" class="btn btn-primary">Enviar</button>
      </form>
<?php
    break;
  default:
    echo 'NADA';
    break;
}