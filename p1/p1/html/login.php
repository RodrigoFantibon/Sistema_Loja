

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="icon" href="../img/favicon.ico">
    <title>Login</title>
</head>
<body>
    <div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                            <h3 class="text-center text-white">Login</h3>
                            <div class="form-group">
                                <label for="email" class="text-white ">E-mail:</label><br>
                                <input type="text" name="email" id="txtEmail" class="form-control" placeholder="digite seu e-mail" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-white">Senha:</label><br>
                                <input type="password" name="senha" id="txtSenha" class="form-control" placeholder="digite sua senha" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" onclick="validar()" name="btnLogin" class="btn btn-secondary btn-lg">Entrar</button>
                            </div>
                                <div id="register-link" class="text-right"></br>
                                    <a href="../html/cadastro.php" class="text-info">Cadastre-se</a><br>
                                    <a href="../html/esqueciSenha.php" class="text-info">Esqueceu a senha?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<script lang="javascript">
    function validar(){
        if(txtSenha.value.length <= 8){
            alert("Informe uma senha válida!!!");
            txtSenha.focus();
            return false;
        }
        if(txtEmail.value.length<6 || 
        txtEmail.value.indexOf("@") <=0 ||
        txtEmail.value.lastIndexOf(".")
        <=txtEmail.value.indexOf("@")  ){
            alert("informe um email valido !!");
            txtEmail.focus();
            return false;
        }
     
        // alert("tudo certo!!! =D");
    }    
  
</script>


<?php

require_once '../conexao/cadastroCRUD.php';
require_once '../conexao/funcoes.php';
require_once '../conexao/conexao.php';
$func = new Funcoes();
$cliente = new cliente();


if(isset($_POST['btnLogin'])){
    $sesao = $cliente->login($_POST);
    if($sesao){
       session_start();
        $_SESSION['usuario']=$sesao;
        var_dump($_SESSION);
        echo '<script type="text/javascript">alert("Login realizado com sucesso")</script>';
      header("location: ../html/vitrine.php");
        
    }
    else{
   
        echo '<script type="text/javascript">alert("E-mail ou senha incorreto")</script>';
    }
}
?>
    