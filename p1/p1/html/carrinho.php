<?php
require_once '../conexao/carrinho.php';
$carrao = new carrinho();
$carrinho = $carrao->buscaCarrinho();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="../css/carrinho.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <link rel="icon" href="../img/favicon.ico">
    <title>Carrinho de Compras</title>
</head>

<body>
    <div class="topo">
        <nav class="navbar navbar-light" style="background-color: white;">
            <div class="container-fluid" id="topoConteainer">
                <a href="../html/vitrine.php"><img src="../img/maskzeldaicon.png" id="logo" /></a>
                <form class="d-flex" method="GET" action="">
                    <input name="q" class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search" style="margin: 0 auto;">
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
                <a class="navbar-brand" id="menuzinho" href="../html/busca.php">Buscar Jogos</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav" id="itensMenu">
                        <a id="bonitinho" class="nav-link active" aria-current="page" href="#">Consoles</a>
                        <a id="bonitinho" class="nav-link active" aria-current="page" href="#">Jogos</a>
                        <a id="bonitinho" class="nav-link active" aria-current="page" href="#">Ofertas</a>
                        <a id="bonitinho" class="nav-link active" aria-current="page" href="#">Acessórios</a>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <div class="container">
        <link rel="stylesheet" href="../css/carrinho2.css">
        <div class="heading">
            <h1>
                <i class="fa fa-shopping-cart"></i> Carrinho de Compras
            </h1>

            <a href="../html/vitrine.php" class="visibility-cart transition is-open">X</a>
        </div>

        <div class="cart transition is-open">

            <div class="table">

                <div class="layout-inline row th">
                    <div class="col col-pro align-center">Produto</div>
                    <div class="col col-price align-center ">Preço</div>
                    <div class="col col-qty align-center">Quantidade</div>
                    <div class="col align-center">Total</div>
                </div>

                <?php
                $total = 0;
                if (count($carrinho) == 0) {
                    echo "<p><br>Seu carrinho está vazio!<br><br></p>";
                } else {
                    foreach ($carrinho as $carrinhozinho) {
                        $totalzao = $carrinhozinho['quantidade'] * $carrinhozinho['price'];

                        echo "<div class='layout-inline row'>
                        
                        <div class='col col-pro layout-inline align-center'>
                        <img src='{$carrinhozinho['url']}' /><br><br>
                        <p>{$carrinhozinho['name']}</p>
                        </div>
                        
                        <div class='col col-price col-numeric align-center '>
                            <p>R$ {$carrinhozinho['price']}</p>
                        </div>
                        
                        <div class='col col-qty layout-inline '>
                        <p>{$carrinhozinho['quantidade']}</p>
                        </div>
                        
                        <div class='col col-total col-numeric align-center'>
                        <p>R$ {$totalzao}</p>
                        </div>
                        </div>";
                        $total += $totalzao;
                    }
                }
                ?>

                <div class="tf">
                    <div class="row layout-inline">
                        <div class="col-2">
                            <p>Total</p>
                        </div>
                        <div class="col-9">
                            <p>R$ <?= $total ?></p>
                        </div>
                        <!-- <div class="col-2"></div> -->
                    </div>
                </div>
            </div>
            <div class="row layout-inline">
                <div class="col-4">
                    <form method="post" action="carrinho.php">
                        <input name="clear-cart" class="btn btn-lg btn-primary btn-block" value="Limpar Carrinho" type="submit" id="cartButton">
                        <?php
                        if (isset($_POST['clear-cart'])) {
                            $carrao->limparCarrinho();
                            echo '<script type="text/javascript">alert("Carrinho esvaziado! Atualize a página!");</script>';
                        }
                        ?>
                    </form>
                </div>
                <div class="col-4">
                    <input name="return-shop" class="btn btn-lg btn-primary btn-block" value="Retornar à Loja" type="submit" id="cartButton" onclick="retornar();">
                </div>
                <div class="col-4">
                    <input name="finish-buying" class="btn btn-lg btn-primary btn-block" value="Finalizar Compra" type="submit" id="cartButton" onclick="validar();">
                </div>
            </div>

        </div>
</body>

</html>


<script lang="javascript">
    function validar() {
        alert("Iremos direcionar você para a página de pagamento.");
    }

    function retornar() {
        window.location = 'vitrine.php'
    }
</script>

<script src="../js/vitrine.js">

</script>
