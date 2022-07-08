<?php
require_once '../conexao/jogos.php';
$Jogos= new jogos();
if(isset($_GET['q'])){
  $filtro = $_GET['q'];
  
  $jogos= $Jogos->querySelectBusca($filtro);
}
else{
  $jogos= $Jogos->querySelect();
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
  <script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../css/vitrine.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
  <link rel="icon" href="../img/favicon.ico">
  <title>Busca</title>
</head>

<body>
  <div class="topo">
    <nav class="navbar navbar-light" style="background-color: white;">
      <div class="container-fluid" id="topoConteainer">
        <a href="../html/vitrine.php"><img src="../img/maskzeldaicon.png" id="logo" /></a>
        <form class="d-flex" method="GET" action="">
          <input name="q" class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search"
            style="margin: 0 auto;">
          <button class="btn" type="submit" id="btnBuscar">
            <i class="fas fa-search"></i>
          </button>
        </form>
        <form action="" method="post">
        <div class='icones'>
        <?php 
          session_start();
          if(isset($_SESSION['usuario']['nome']))
          {
            echo $_SESSION['usuario']['nome'];
             ?>
        <button type="submit" name="btnSair" class="btn jumbotron">Sair</button>
        <?php 
           } 
        ?>
<?php

if(isset($_POST['btnSair'])){
  session_destroy();
  header("location: ../html/vitrine.php");
 }

?>

        
          <a href="../html/login.php"><img src="../img/midnaicon.png" id="logini" /></a>
          <a href="../html/carrinho.php"><img src="../img/bag.png" id="carrinho" /></a>
        </div>
      </div>
    </nav>
  </div>
</form>



  <div class="menu">
    <nav class="navbar navbar-expand-lg navbar-dark" style="background: rgb(0,63,92);
    background: linear-gradient(0deg, rgba(0,63,92,1) 0%, rgba(88,80,141,1) 100%);">
      <div class="container-fluid text-xs-center">
        <a class="navbar-brand" id="menuzinho" href="../html/busca.php">Buscar jogos</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
          aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav" id="itensMenu">
            <a id="bonitinho" class="nav-link active" aria-current="page" href="#">Consoles</a>
            <a id="bonitinho" class="nav-link active" aria-current="page" href="../html/busca.php">Jogos</a>
            <a id="bonitinho" class="nav-link active" aria-current="page" href="#">Ofertas</a>
            <a id="bonitinho" class="nav-link active" aria-current="page" href="#">Acessórios</a>
          </div>
        </div>
      </div>
    </nav>
  </div>
  <div class="container-fluid">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
          aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
          aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
          aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="../img/majora.jpg" class="d-block w-100">
          <div class="carousel-caption d-none d-md-block">
          </div>
        </div>
        <div class="carousel-item">
          <img src="../img/fireemblem.jpg" class="d-block w-100">
          <div class="carousel-caption d-none d-md-block">
          </div>
        </div>
        <div class="carousel-item">
          <img src="../img/bayonetta.jpg" class="d-block w-100">
          <div class="carousel-caption d-none d-md-block">
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

  </div>
  <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 id="h1MaisVendidos" class="display-1">Jogos
      </h1>
    </div>
  </div>
  <!-- CARDS -->

  <div class="container mb-5 mt-5">
    <div class="row">

      <!-- CARD 1 -->
      <?php
         foreach ($jogos as $jogo) {
          echo"<div class='col-md-4'>
            <div class='card mt-3'>
              <div class='product-1 align-items-center p-2 text-center'>
                <img src='{$jogo['url']}' alt='' class='rounded' width='160' height='250'>
                <h5>{$jogo['name']}</h5>
  
                <!-- informações do card -->
  
                <div class='mt-3 info'>
                  <span class='text1 d-block'>{$jogo['categoria']}</span>
                </div>
  
                <div class='cost mt-3 text-drak'>
                  <span>R$ {$jogo['price']}</span>
                  <div class='star mt-3 align-items-center'>
                    <i class='fa fa-star checked' aria-hidden='true'></i>
                    <i class='fa fa-star checked' aria-hidden='true'></i>
                    <i class='fa fa-star checked' aria-hidden='true'></i>
                    <i class='fa fa-star checked' aria-hidden='true'></i>
                    <i class='fa fa-star' aria-hidden='true'></i>
                  </div>
                </div>
                <!-- fim das informações do card -->
              </div>
  
  
              <!-- botoes para o card -->
              <div class='p-3 shoe text-center text-white mt-3 cursos'>
                            <a class='linkCompras' href='../html/produtoDetalheJogos.php?id={$jogo['id']}' target='_blank'>Comprar</a>
                        </div>
            </div>
          </div>";
        
  
      }?>
      <!-- fim do cartao 1 -->



      


    </div>
  </div>
  <!-- fim da primeira linha dos card -->


  <br><br><br><br>

  <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 id="h1MaisVendidos" class="display-1">Populares</h1>
    </div>
  </div>




  <div class="container mb-5 mt-5">
    <div class="row">

      <!-- CARD 4 -->
      <div class="col-md-4 configCards">
        <div class="card mt-3">
          <div class="product-1 align-items-center p-2 text-center">
            <img src="../img/vitrine_pokemonarceus.png" alt="" class="rounded" width="160">
            <h5> Pokémon Legends Arceus </h5>

            <!-- informações do card -->

            <div class="mt-3 info">
              <span class="text1 d-block">GAMES DIVERSOS ORIGINAIS!!</span>
              <span class="text1 d-block"> VENDA JOGO CONSOLE NINTENDO SWITCH </span>
            </div>

            <div class="cost mt-3 text-drak">
              <span>R$199.88</span>
              <div class="star mt-3 align-items-center">
                <i class="fa fa-star checked" aria-hidden="true"></i>
                <i class="fa fa-star checked" aria-hidden="true"></i>
                <i class="fa fa-star checked" aria-hidden="true"></i>
                <i class="fa fa-star checked" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
              </div>
            </div>
            <!-- fim das informações do card -->
          </div>


          <!-- botoes para o card -->
           <div class="p-3 shoe text-center text-white mt-3 cursos">
                         <a class="linkCompras" href="../html/produtoDetalheJogos.php">Comprar</a>
                    </div>




        </div>
      </div>

      <!-- CARD 5 -->
      <div class="col-md-4 configCards">
        <div class="card mt-3">
          <div class="product-1 align-items-center p-2 text-center">
            <img src="../img/vitrine_pokemonsword.png" alt="" class="rounded" width="160">
            <h5> Pokémon Sword </h5>

            <!-- informações do card -->

            <div class="mt-3 info">
              <span class="text1 d-block">GAMES DIVERSOS ORIGINAIS!!</span>
              <span class="text1 d-block">VENDA JOGO CONSOLE NINTENDO SWITCH</span>
            </div>

            <div class="cost mt-3 text-drak">
              <span>R$199.88</span>
              <div class="star mt-3 align-items-center">
                <i class="fa fa-star checked" aria-hidden="true"></i>
                <i class="fa fa-star checked" aria-hidden="true"></i>
                <i class="fa fa-star checked" aria-hidden="true"></i>
                <i class="fa fa-star checked" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
              </div>
            </div>
            <!-- fim das informações do card -->
          </div>


          <!-- botoes para o card -->
           <div class="p-3 shoe text-center text-white mt-3 cursos">
                         <a class="linkCompras" href="../html/produtoDetalheJogos.php">Comprar</a>
                    </div>
        </div>
      </div>



      <!-- CARD 6 -->
      <div class="col-md-4 configCards">
        <div class="card mt-3">
          <div class="product-1 align-items-center p-2 text-center">
            <img src="../img/vitrine_animalcrossing.jpg" alt="" class="rounded" width="165">
            <h5> Animal Crossing: New Horizons </h5>

            <!-- informações do card -->

            <div class="mt-3 info">
              <span class="text1 d-block">GAMES DIVERSOS ORIGINAIS!!</span>
              <span class="text1 d-block">VENDA JOGO CONSOLE NINTENDO SWITCH</span>
            </div>

            <div class="cost mt-3 text-drak">
              <span>R$199.88</span>
              <div class="star mt-3 align-items-center">
                <i class="fa fa-star checked" aria-hidden="true"></i>
                <i class="fa fa-star checked" aria-hidden="true"></i>
                <i class="fa fa-star checked" aria-hidden="true"></i>
                <i class="fa fa-star checked" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
              </div>
            </div>
            <!-- fim das informações do card -->
          </div>
           <div class="p-3 shoe text-center text-white mt-3 cursos">
                         <a class="linkCompras" href="../html/produtoDetalheJogos.php">Comprar</a>
                    </div>
        </div>
      </div>
    </div>
  </div>
  <!-- FOOTER -->
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


      <!-- Copyright -->
      <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2022 Copyright:
        <a class="text-white">Copyright</a>
      </div>
      <!-- Copyright -->
  </footer>
  <!-- Footer -->
<script src="../js/vitrine.js">

</script>

</body>

</html>
