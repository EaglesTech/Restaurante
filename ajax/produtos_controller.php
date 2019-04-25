<?php   
    require '../funcoes/banco/conexao.php';
    require '../funcoes/crud/crud_produtos.php';
    $acao = filter_input(INPUT_POST, 'acao', FILTER_SANITIZE_STRING);

    switch ($acao) {
    case 'cadastro':
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $quantidade = filter_input(INPUT_POST, 'quantidade', FILTER_SANITIZE_NUMBER_INT);
    $custo = filter_input(INPUT_POST, 'custo', FILTER_SANITIZE_STRING);
    $valor = filter_input(INPUT_POST, 'valor', FILTER_SANITIZE_STRING);
       if (cadastro($nome, $quantidade, $custo, $valor)) {
            echo "cadastrou";
        } else {
            echo "naocadastrou";
        }
    break;
    case 'form_prod':
        ?>
              <div class="retorno"></div>
              <form action="" name="form_prod" method="post">
                <div class="form-group col-md-12">
                  <label for="InputNome">Nome do Produto</label>
                  <input type="text" name="nome" maxlength="50" class="form-control" id="InputNome" aria-describedby="nomeHelp" placeholder="Nome" required>
                </div>  
        
                <div class="form-group col-md-4">
                  <label for="InputQTD">Quantidade Estoque</label>
                  <input type="text" name="quantidade" maxlength="10" class="form-control" id="InputQTD" aria-describedby="qtdHelp" placeholder="Quantidade" required>
                </div>
                <div class="form-group col-md-4">
                  <label for="inputCusto">Valor de Custo</label>
                  <input type="text"  step="0.01" name="custo" maxlength="10" class="form-control" id="inputCusto" aria-describedby="custoHelp" placeholder="Custo" required>
                </div>
                <div class="form-group  col-md-4">
                  <label for="InputValor">Valor de Venda</label>
                  <input type="text" step="0.01" name="valor" maxlength="10" class="form-control" id="InputValor" aria-describedby="valorHelp" placeholder="Valor" required>
                </div>
                
                  <button type="submit" class="btn btn-primary col-md-12">Gravar</button>
              </form>
        <?php
    break;

    case 'listar_produtos':
        if (listarProduto()){
            $produto = listarProduto();
            $cont = 0;
            foreach ($produto as $produto) {
                if ($produto->PRO_ATIVO == null) {
                $cont = $cont + 1;
                
?>
                    <tr>
                        <td><?php echo "$produto->PRO_NOME" ?></td>
                        <td><?php echo "$produto->PRO_QTD" ?></td>
                        <td><?php echo "$produto->PRO_VAL_CUSTO" ?></td>
                        <td><?php echo "$produto->PRO_VAL_VENDA" ?></td>
                        <td>
                            <a href="#" id="btn_edit" data-id="<?php echo "$produto->PRO_ID" ?>" class="btn btn-warning">Editar</a>
                            <a href="#" id="btn_excluir" data-id="<?php echo "$produto->PRO_ID" ?>" class="btn btn-danger">Excluir</a>
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
            <label for="InputNome">Nome do Produto</label>
            <input type="text" name="nome" class="form-control" value="<?php echo $dados->PRO_NOME?>" id="InputNome" aria-describedby="nomeHelp" placeholder="Nome" required>
          </div>  
          <div class="form-group  col-md-4">
            <label for="InputQuantidade">Quantidade Estoque</label>
            <input type="text" name="quantidade" class="form-control" value="<?php echo $dados->PRO_QTD?>" id="InputQuantidade" aria-describedby="usernameHelp" placeholder="Login" required>
          </div>
          <div class="form-group col-md-4">
            <label for="InputCusto">Valor do Custo</label>
            <input type="text" step="0.01" name="custo" class="form-control" value="<?php echo $dados->PRO_VAL_CUSTO?>" id="InputCusto" aria-describedby="custoHelp" placeholder="Valor de Custo" required>
          </div>
          <div class="form-group col-md-4">
            <label for="InputVenda">Valor da Venda</label>
            <input type="text" step="0.01" name="venda" class="form-control" value="<?php echo $dados->PRO_VAL_VENDA?>" id="InputVenda" aria-describedby="custoHelp" placeholder="Valor de Venda" required>
          </div>
          <input type="hidden" name="id" value="<?php echo $dados->PRO_ID?>">
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>
<?php break;
    case 'edit':
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
        $quantidade = filter_input(INPUT_POST, 'quantidade', FILTER_SANITIZE_NUMBER_INT);
        $custo = filter_input(INPUT_POST, 'custo', FILTER_SANITIZE_STRING);
        $venda = filter_input(INPUT_POST, 'venda', FILTER_SANITIZE_STRING);
            
        if (atualizar($nome, $quantidade, $custo, $venda, $id)) {
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