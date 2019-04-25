<?php ob_start();
require 'funcoes/login/login.php';
include 'header.inc.php';
logado('administrador');

if(isset($_GET['logout']) && $_GET['logout']==true){
    session_destroy();
    header("Location: login.php");
}
?>

<nav class="navbar navbar-default " role="navigation">
    <div class="container">
        <!-- NavBar -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">

        <div class="pull-right logout">
                        <?php if($_SESSION){
                            ?>Bem Vindo: <?php print_r($_SESSION['administrador']->nome);
                        } else {
                            ?>Você está deslogado!<?php
                        }?>
                        <a href="painel.php" class="btn btn-warning">Inicio</a>
                        <a href="?logout=true" class="btn btn-danger">Sair</a>
        </div>
    </div>
</nav>

<!-- /NavBar -->
<?php if ($_SESSION['administrador']->nivel == 1) {?>
    <div class="container">
        <div class="col-lg-2" >
            <a href="produtos.php"><button type="button" class="btn btn-primary btn-lg">PRODUTOS</button></a>
        </div>
        <div class="col-lg-2">
            <a href="clientes.php"><button type="button" class="btn btn-primary btn-lg">CLIENTES</button></a>
        </div>
        <div class="col-lg-2">
            <a href="funcionarios.php"><button type="button" class="btn btn-primary btn-lg">FUNCIONARIOS</button></a>
        </div>
        <div class="col-lg-2">
            <a href="mesas.php"><button type="button" class="btn btn-primary btn-lg">MESAS</button></a>
        </div>
        <div class="col-lg-2">
            <a href="comanda.php"><button type="button" class="btn btn-primary btn-lg">COMANDAS</button></a>
        </div>
        <div class="col-lg-2">
            <a href="caixa.php"><button type="button" class="btn btn-primary btn-lg">CAIXA</button></a>
        </div>
    </div>
        <!-- ////////ESSE
        <div class="container">
            <div class="col-lg-12">
                <h2 class="linha">HOME</h2>
                <div class="box">
                        <div class="box-content nopadding">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>E-mail</th>
                                        <th>Login</th>
                                        <th>Nivel</th>
                                        <th width="200">Ação</th>
                                    </tr>
                                </thead>
                                <tbody> ////////ESSE-->
                                        <!-- RECEBE OS DADOS PELO CONTROLLER -->
                                <!--////////ESSE
                                    </tbody>
                            </table>
                        </div>
                </div>            
            </div>           
        </div>
       ////////ESSE -->

<!-- Modal -->
<!--    ////////ESSE
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cadastro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">-->
      <!-- PUXA OS DADOS AUTOMATICAMENTE DO CONTROLLER PAINEL-->
     <!-- </div>
    </div>
  </div>
</div>
////////ESSE-->




<?php };
ob_end_flush();
include 'footer.inc.php';
?>