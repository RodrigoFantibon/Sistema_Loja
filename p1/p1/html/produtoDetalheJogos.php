<?php
  require_once '../conexao/conexao.php';
  require_once '../conexao/carrinho.php';
  $id = $_GET['id'];
  $con = new Conexao();
  $jogo = $con->conectar()->prepare("SELECT * FROM jogos WHERE id = $id; ");
  $jogo->execute();
  $jogo = $jogo->fetch();
  session_start();
  $carrinho = new carrinho();
  if(isset($_POST['btn-carrinho'])){
    $carrinho->addCarrinho($id);
    echo '<script type="text/javascript">alert("Item adicionado com ao carrinho!")</script>';
  }

?>

<!DOCTYPE html>
<html lang="pt-br">
    
<head>
    <style>
        .checked {
            color: orange;
        }
    </style>


    <meta name="viewport" content="width=device-width, initial-scale=1.0w">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/produtoDetalhe.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset=utf-8>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <link rel="icon" href="../img/favicon.ico">
    <title>Produto Detalhe</title>
</head>
    
    <body>
            <div class="topo">            
              <nav class="navbar navbar-light" style="background-color: white;">                
                  <div class="container-fluid" id="topoConteainer">
                      <a href="../html/vitrine.php"><img src="../img/maskzeldaicon.png" id="logo" /></a>
                    <form class="d-flex">
                      <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search" style="margin: 0 auto;">
                      <button class="btn" type="submit" id="btnBuscar">
                        <i class="fas fa-search"></i>
                      </button>
                    </form>
                    <div class='icones'>
                      <a href="../html/login.php"><img src="../img/midnaicon.png" id="logini" /></a>
                      <a href="../html/carrinho.php"><img src="../img/bag.png" id="carrinho" /></a>
                    </div>
                  </div>                
              </nav>            
          </div>
          
          <div class="menu">
              <nav class="navbar navbar-expand-lg navbar-dark" style="background: rgb(0,63,92);
              background: linear-gradient(0deg, rgba(0,63,92,1) 0%, rgba(88,80,141,1) 100%);">
                  <div class="container-fluid text-xs-center">
                    <a class="navbar-brand" id="menuzinho" href="../html/busca.php">Buscar jogos</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                      <div class="navbar-nav" id="itensMenu">
                        <a id="bonitinho" class="nav-link active" aria-current="page" href="#">Consoles</a>
                        <a id="bonitinho" class="nav-link active" aria-current="page" href="#">Jogos</a>
                        <a id="bonitinho" class="nav-link active" aria-current="page" href="#">Ofertas</a>
                        <a id="bonitinho" class="nav-link active" aria-current="page" href="#">Acess??rios</a>
                      </div>
                    </div>
                  </div>
                </nav>
          </div>

          <div class="container-fluid mb-5 mt-5">
            <div>
    
                <!-- CARD 1 -->
                <form method="POST" action="" class="form">
                  <div class="row">
                      <div class="card mt-3">
                          <div class="product-1 align-items-center p-2 text-center">
                              <img src="<?=$jogo["url"]?>" alt="" class="rounded" width="200">
                              <h5> <?=$jogo["name"]?> </h5>
                              <!--<button type="submit" id="btnMetroidDread"></button>-->
                              <!-- informa????es do card -->
      
                              <div class="mt-3 info">
                                  <span class="text1 d-block"> SINOPSE: </span>
                                  <span class='text1 d-block'> <?=$jogo['sinopse']?> </span>
      
                              <div class="cost mt-3 text-drak">
                                  <span>R$ <?=$jogo['price']?></span>
                                  <div class="star mt-3 align-items-center">
                                      <i class="fa fa-star checked" aria-hidden="true"></i>
                                      <i class="fa fa-star checked" aria-hidden="true"></i>
                                      <i class="fa fa-star checked" aria-hidden="true"></i>
                                      <i class="fa fa-star checked" aria-hidden="true"></i>
                                      <i class="fa fa-star checked" aria-hidden="true"></i>
                                  </div>
                              </div>
                              <br>

                              <div class="align-items-center">

                                  <button name="btn-carrinho" class="btn btn-success">Comprar</button>
                                  <!--<a href="carrinho.php"></a> -->

                              </div>
                              <!-- fim das informa????es do card -->
                          </div>
                      </div>
                  </div>
                </form>
                  <!-- fim do cartao 1 -->
        
    
    
            </div>
        </div>
        <!-- fim da primeira linha dos card -->

          <!-- Footer -->
        <footer class="bg-dark text-center text-white">
            <!-- Grid container -->
            <div class="container p-4">
                <!-- Section: Social media -->
                <section class="mb-4">
                    <!-- Facebook -->
        <a href="https://web.facebook.com/" target="_blank">
          <img src="../img/facebook.png" width="45px" href="/img/facebook.png" role="button">
        </a>
        

        <!-- Twitter -->
        <a href="https://twitter.com/home" target="_blank">
          <img src="../img/Twitter.png" width="45px" href="/img/Twitter.png" role="button">
        </a>
       

        <!-- Google -->
        <a href="https://mail.google.com/" target="_blank">
          <img src="../img/google.png" width="45px" href="/img/google.png" role="button">
        </a>

        <!-- Instagram -->
        <a href="https://www.instagram.com/" target="_blank">
          <img src="../img/Instagram.png" width="45px" href="/img/Instagram.png" role="button">
        </a>

                </section>
            </div>

                <!-- Copyright -->
                <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                    ?? 2022 Copyright:
                    <a class="text-white">Copyright</a>
                </div>
                <!-- Copyright -->
        </footer>
        <!-- Footer -->

    </body>

 
</html>

