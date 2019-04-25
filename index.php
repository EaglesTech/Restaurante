<?php include 'header.inc.php';
include 'header.navbar.php'
?>

        <div class="container">
            <div class="login">
                <h2>Login</h2>
                <div class="retorno"></div>
                <form action="" class="form" method="post" name="form_login">
                    <div class="form-group">
                        <label for="login">Login</label>
                        <input type="text" name="login" class="form-control input-lg" placeholder="Login">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Senha</label>
                        <input type="password" name="current-password" class="form-control input-lg" placeholder="Senha">
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg">Logar</button>
                </form>
            </div>
        </div>
        
<?php include 'footer.inc.php'?>