<?php   
    require '../funcoes/banco/conexao.php';
    require '../funcoes/crud/crud_clientes.php';
    $acao = filter_input(INPUT_POST, 'acao', FILTER_SANITIZE_STRING);
    switch ($acao) {
    case 'cadastro':
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
    $telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
    $bairro= filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_STRING);
    $cidade= filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
    $endereco= filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING);
       if (cadastro($nome, $cpf, $telefone, $bairro, $cidade, $endereco)) {
            echo "cadastrou";
        } else {
            echo "naocadastrou";
        }
    break;
    case 'form_client':
        ?>
              <div class="retorno"></div>
              <form action="" name="form_client" method="post">
                <div class="form-group col-md-12">
                  <label for="InputNome"><span>Nome do Cliente</span></label>
                  <input type="text" name="nome" maxlength="50" class="form-control" id="InputNome" aria-describedby="nomeHelp" placeholder="Nome" required>
                </div>  
                <div class="form-group col-md-6">
                  <label for="InputCPF"><span>CPF</span></label>
                  <input type="text" name="cpf" maxlength="14" class="form-control" id="InputCPF" aria-describedby="cpfHelp" placeholder="CPF" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputTelefone"><span>Telefone</span></label>
                  <input type="text" name="telefone" maxlength="16" class="form-control" id="inputTelefone" aria-describedby="telefoneHelp" placeholder="Telefone" required>
                </div>
                <div class="form-group  col-md-4">
                  <label for="InputBairro">Bairro</label>
                  <input type="text" name="bairro" maxlength="50" value="" class="form-control" id="InputBairro" aria-describedby="bairroHelp" placeholder="Bairro">
                </div>
                <div class="form-group  col-md-4">
                  <label for="InputCidade">Cidade</label>
                  <input type="text" name="cidade" maxlength="50" value="" class="form-control" id="InputCidade" aria-describedby="cidadeHelp" placeholder="Cidade">
                </div>
                <div class="form-group  col-md-4">
                  <label for="InputEndereco">Endereço</label>
                  <input type="text" name="endereco" maxlength="50" value="" class="form-control" id="InputEndereco" aria-describedby="enderecoHelp" placeholder="Endereço" >
                </div>
                
                  <button type="submit" class="btn btn-primary col-md-12">Gravar</button>
              </form>
        <?php
    break;

    case 'listar_clientes':
        if (listarCliente()){
            $cliente = listarCliente();
            $cont = 0;
            foreach ($cliente as $cliente) {
                if ($cliente->CLI_ATIVO == null) {
                $cont = $cont + 1;
?>
                    <tr>
                        <td><?php echo "$cliente->CLI_NOME" ?></td>
                        <td><?php echo "$cliente->CLI_CPF" ?></td>
                        <td><?php echo "$cliente->CLI_TEL" ?></td>
                        <td><?php echo "$cliente->CLI_BAIRRO" ?></td>
                        <td><?php echo "$cliente->CLI_CIDADE" ?></td>
                        <td><?php echo "$cliente->CLI_ENDERECO" ?></td>
                        <td>
                            <a href="#" id="btn_edit" data-id="<?php echo "$cliente->CLI_ID" ?>" class="btn btn-warning">Editar</a>
                            <a href="#" id="btn_excluir" data-id="<?php echo "$cliente->CLI_ID" ?>" class="btn btn-danger">Excluir</a>
                        </td>                                  
                    </tr>
<?php
                }//fecha o IF
            }
        } else {
            return false;
        }
        break;
        case 'form_edit':
                    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
                    $dados = pegaId($id);
?>
        <div class="retorno"></div>
        <form action="" name="form_edit" method="post">
          <div class="form-group col-md-12">
            <label for="InputNome">Nome do Cliente</label>
            <input type="text" name="nome" class="form-control" value="<?php echo $dados->CLI_NOME?>" id="InputNome" aria-describedby="nomeHelp" placeholder="Nome" required>
          </div>  
          <div class="form-group  col-md-4">
            <label for="InputCPF">CPF</label>
            <input type="text" name="cpf" class="form-control" value="<?php echo $dados->CLI_CPF?>" id="InputCPF" aria-describedby="cpfHelp" placeholder="CPF" required>
          </div>
          <div class="form-group col-md-4">
            <label for="InputTelefone">Telefone</label>
            <input type="text" step="0.01" name="telefone" class="form-control" value="<?php echo $dados->CLI_TEL?>" id="InputTelefone" aria-describedby="telefoneHelp" placeholder="Telefone" required>
          </div>
          <div class="form-group col-md-4">
            <label for="InputBairro">Bairro</label>
            <input type="text" step="0.01" name="bairro" class="form-control" value="<?php echo $dados->CLI_BAIRRO?>" id="InputBairro" aria-describedby="bairroHelp" placeholder="Bairro">
          </div>
          <div class="form-group col-md-4">
            <label for="InputCidade">Cidade</label>
            <input type="text" step="0.01" name="cidade" class="form-control" value="<?php echo $dados->CLI_CIDADE?>" id="InputCidade" aria-describedby="cidadeHelp" placeholder="Cidade">
          </div>
          <div class="form-group col-md-4">
            <label for="InputEndereco">Endereço</label>
            <input type="text" step="0.01" name="endereco" class="form-control" value="<?php echo $dados->CLI_ENDERECO?>" id="InputEndereco" aria-describedby="enderecoHelp" placeholder="Endereço">
          </div>
          <input type="hidden" name="id" value="<?php echo $dados->CLI_ID?>">
            <button type="submit" class="btn btn-primary col-md-12">Atualizar</button>
        </form>
<?php break;
    case 'edit':
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
        $cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
        $telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
        $bairro= filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_STRING);
        $cidade= filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
        $endereco= filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING);
            
        if (atualizar($nome, $cpf, $telefone, $bairro, $cidade, $endereco, $id)) {
            echo "atualizou";
        } else {
            echo "erroaoatualizar";
        }
    break;
    case 'excluir':
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

        if (delete($id)) {
            echo "deletou";
        } else {
            echo "erroaodeletar";
        }
        
    break;
    default:
        echo 'erro';
        break;
}ob_end_flush();
?>