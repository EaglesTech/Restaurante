<?php
ob_start(); session_start();
require '../funcoes/banco/conexao.php';
require '../funcoes/login/login.php';
require '../funcoes/crud/crud.php';

$acao = filter_input(INPUT_POST, 'acao', FILTER_SANITIZE_STRING);
switch ($acao) {
    case 'login':
        //faz a interação
        $login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
        $senha = filter_input(INPUT_POST, 'current-password', FILTER_SANITIZE_STRING);
        if (login($login,$senha)) {
            //CRIA A SESSÃO
            $_SESSION['administrador'] = pegaLogin($login);
        }else{
            $dados = pegaLogin($login);

            if(empty($login) || empty($senha)){
                echo 'vazio';
            } else if (!$dados) {
                echo 'erro';
            } else if($dados->senha != md5(strrev($senha))) {
                echo 'diferentesenha';
            } else if($dados->nivel > 1){
                echo 'nivel';
            }else {
                return false;    
            }
        };
    break;
    case 'cadastro':
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
        $login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
        $nivel = filter_input(INPUT_POST, 'nivel', FILTER_SANITIZE_STRING);
        if (cadastro($nome, $login, $email, $senha,$nivel)) {
            echo "cadastrou";
        } else {
            echo "naocadastrou";
        }
    break;
    case 'listar_admin':
        if (listarAdmin()){
            $admin = listarAdmin();
            $cont = 0;
            foreach ($admin as $admin) {
                $cont = $cont + 1;
                if ($admin->deleted == null) {    
?>
                    <tr>
                        <td><?php echo "$admin->nome" ?></td>
                        <td><?php echo "$admin->email" ?></td>
                        <td><?php echo "$admin->login" ?></td>
                        <td>
                        <?php if ($admin->nivel == 1) {
                            echo "Administrador";
                        } else if ($admin->nivel == 2) {
                            echo "Funcionário";
                        } else {
                            echo "Cliente";
                        }?>
                        </td>
                        <td>
                            <a href="#" id="btn_edit" data-id="<?php echo "$admin->id" ?>" class="btn btn-warning">Editar</a>
                            <a href="#" id="btn_excluir" data-id="<?php echo "$admin->id" ?>" class="btn btn-danger">Excluir</a>
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
                case 'form_edit':
                    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
                    $dados = pegaId($id);
?>
        <div class="retorno"></div>
        <form action="" name="form_edit" method="post">
          <div class="form-group">
            <label for="InputNome">Nome</label>
            <input type="nome" name="nome" class="form-control" value="<?php echo $dados->nome?>" id="InputNome" aria-describedby="nomeHelp" placeholder="Nome" required>
          </div>  
          <div class="form-group">
            <label for="InputUsername">Login</label>
            <input type="nome" name="login" class="form-control" value="<?php echo $dados->login?>" id="InputUsername" aria-describedby="usernameHelp" placeholder="Login" required>
          </div>
          <div class="form-group">
            <label for="InputEmail">Email</label>
            <input type="email" name="email" class="form-control" value="<?php echo $dados->email?>" id="InputEmail" aria-describedby="emailHelp" placeholder="E-mail" required>
          </div>
          <input type="hidden" name="id" value="<?php echo $dados->id?>">
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>
<?php break;
    case 'edit':
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
        $login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

        if (atualizar($nome, $login, $email, $id)) {
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
        echo 'erro controler.php';
        break;
}ob_end_flush();
?>