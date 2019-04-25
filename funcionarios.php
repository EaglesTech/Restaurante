<?php include 'header.inc.php'; include 'header.navbar.php'?>
        <div class="container">
            <div class="col-lg-12">
                <h2 class="linha">Cadastro de Usuários</h2>
                <a href="#" class="list-group-item" id="janela">Cadastrar Usuários</a>
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
                                <tbody>
                                        <!-- RECEBE OS DADOS PELO CONTROLLER -->
                                </tbody>
                            </table>
                        </div>
                </div>            
            </div>           
        </div>

<!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cadastro</h5>
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

<?php include 'footer.inc.php'?>