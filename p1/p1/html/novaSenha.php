<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/esqueciSenha.css">
    <meta charset= utf-8>
    <link rel="icon" href="../img/favicon.ico">
    <title>Redefinição de senha</title>
</head>
<body>
<div class="container">
	<div class="row" >
		<div class="col-md-4 col-md-offset-4">
      <div id="senhabox" class="col-md-12 align-content-center">
            <div class="panel panel-default" >
              <div class="panel-body">
                <div class="text-center">
                  
                  <h3><i class="fa fa-lock fa-4x"></i></h3>
                  <h2 style="color:white" class="text-center">Digite a nova senha</h2>
                 
                  <div class="panel-body">
   
                    <form id="register-form" role="form" autocomplete="off" class="form" method="post">
    
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                          <input id="txtEmail" name="email" placeholder="Digite sua nova senha" class="form-control"  type="email">
                        </div>
                      </div>
                      <div class="form-group">
                        <br>
                        <button type="button"  name="submit" class="btn btn-secondary btn-lg">Redefinir</button>   <!-- onclick="validar();" -->
                      </div>
                      </div>
                      <input type="hidden" class="hide" name="token" id="token" value=""> 
                    </form>
                   </div>
                  </div>
                </div>
              </div>
            
          </div>
          </div>
	</div>
</div>
</body>
</html>