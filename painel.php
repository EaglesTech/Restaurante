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
    <?php include 'navbar.php'?>
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
    
<?php };
ob_end_flush();
include 'footer.inc.php';
?>