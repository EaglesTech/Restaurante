<div class="pull-left dropdown">
    <a class="dropdown-toggle btn btn-secondary btn-lg" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Cadastro
    </a>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <ul>
        <li><a class="dropdown-item" href="produtos.php">Produto</a></li>
        <li><a class="dropdown-item" href="clientes.php">Clientes</a></li>
        <li><a class="dropdown-item" href="funcionarios.php">Funcionários</a></li>
    </ul>
    </div>
</div>
<div class="pull-right logout">
    <?php if($_SESSION){
        ?>Bem Vindo: <?php print_r($_SESSION['administrador']->nome);
    } else {
        ?>Você está deslogado!<?php
    }?>
    <a href="painel.php" class="btn btn-warning">Inicio</a>
    <a href="?logout=true" class="btn btn-danger">Sair</a>
</div>