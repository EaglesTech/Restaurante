<?php include 'header.inc.php'?>
<nav class="navbar navbar-default " role="navigation">
    <div class="container">
    <!-- NavBar -->
    <?php include 'navbar.php'?>
</nav>
<div class="container">
    <div class="col-lg-12">
        <h2 class="linha">Cadastro de Clientes</h2>
        <a href="#" class="list-group-item" id="cadclientes">Cadastrar Clientes</a>
        <div class="box">
                        <div class="box-content nopadding">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>CPF</th>
                                        <th>Telefone</th>
                                        <th>Bairro</th>
                                        <th>Cidade</th>
                                        <th>Endereço</th>
                                        <th width="200">Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <!-- RECEBE OS DADOS PELO CONTROLLER -->
                                </tbody>
                            </table>
                        </div>
                </div>               
    </div>
</div>
    <!-- Modal -->
 <div class="modal fade" id="clienteModal" tabindex="-1" role="dialog" aria-labelledby="ClienteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ClienteModalLabel">Cadastro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <!-- PUXA OS DADOS AUTOMATICAMENTE DO CONTROLLER PAINEL-->
    </div>
    </div>
  </div>
</div>
<!-- Footer -->
<br>
<br>
<footer>
  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2019 Copyright:
    <a href=""> EagleTech Ltda</a> - Automação Comercial. Todos os direitos reservados.
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<script type="text/javascript" src="js/clientes.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>

</html>