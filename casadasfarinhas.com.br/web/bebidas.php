<?php
require_once 'auth/conexao.php';
?>

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Supermercado Casa das Farinhas, Aqui você vai encontrar uma grande variedade de alimentos a preços acessíveis, Bom para sua casa, melhor ainda para o seu negócio.">
    <meta name="keywords" content="Mercado, Supermercado, loja, alimentos, bebidas, varejo, atacado,candeias">
    <meta name="author" content="Leandro SJ 2022-2023">
    <meta name="robots" content="index, follow">
    <title><?php echo $nome_sistema; ?></title>
    <!-- Fonte -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <!-- Estilos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">


    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <!-- my personal style-->
    <link href="css/my_style.css" rel="stylesheet">

    <!-- Slider mult item-->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">
	<link rel="stylesheet" href="css/style.css">


    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
    <link rel="icon" type="image/png" sizes="192x192" href="img/icons/favicons/mini-logo.png">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/bf7e05c402.js" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg fixed-top bg-primary-color" id="navbar">
            <div class="container py-3">
                <a class="navbar-brand" href="index.php">
                    <img id="logo" src="img/logo-banners/logo-red.png" alt="logo casa das farinhas">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-items"
                    aria-controls="navbar-items" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbar-items">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">                        
                        <li class="nav-item">
                            <a class="nav-link" href="varejo.php">Varejo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="atacado.php">Atacado</a>
                        </li>                        
                        <li class="nav-item">
                            <a class="nav-link" href="receitas.php">Receitas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="historia.php">História</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="nossos-valores.php">Nossos Valores</a>
                        </li>

                    </ul>
                    <a href="#" target="_blank" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-whatsapp" title="Entrar no grupo de ofertas"></i></a>
                    <a href="<?php echo $facebook; ?>" target="_blank"><i class="ms-2 bi bi-facebook"
                            title="Seguir Página do Facebook"></i></a>
                    <a href="<?php echo $instagram; ?>" target="_blank"><i class="ms-2 bi bi-instagram"
                            title="Siga-nos no Instagram"></i></a>            
                </div>
            </div>
            </div>
            </div>
        </nav>
    </header>    
    <!-- Ofertas -->   
    <section class="ftco-section" id="mainSlider">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">                
                    <h1 class="heading-section mb-5 pb-md-4">Novidades</h1>
                </div>
                <div class="col-md-12">
                    <div class="featured-carousel owl-carousel">

                        <?php 
                            for($i=0; $i < $qtd_ofertas; $i++){
                                foreach ($result_ofertas[$i] as $key => $value){}
                                $foto_ofertas = $result_ofertas[$i]['foto'];
                            

                                echo "<div class='item'>";
                                echo "<div class='work' >";
                                echo "<div class='col-12 img d-flex align-items-center justify-content-center rounded'>";
                                echo "<img src='auth/painel/img/slider_ofertas/$foto_ofertas' style='height: 330px;' alt='$foto_ofertas' title='$foto_ofertas'>";
                                echo "</div>";                                
                                echo "</div>";
                                echo "</div>";
                            
                            }
                        
                        ?>

                    </div>
                </div>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Ainda não entrou no grupo de ofertas?</strong> <span data-bs-toggle="modal" data-bs-target="#exampleModal" style="cursor:pointer; color:#e01b2f;"><strong> >> Entre agora <<<strong></span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
    </section>
    <section style="background-color: #eee;" >    
        <div class="text-center container py-5">
            <h4 class="mt-4 mb-5"><strong>Bebidas</strong></h4>                      
            <div class="row">
                <?php
                    $query_produtos = $pdo->query("SELECT * FROM produtos where categoria = 12");
                    $result_produtos = $query_produtos->fetchAll(PDO::FETCH_ASSOC);
                    $qtd_produtos = @count($result_produtos);
                
                    for($i=0; $i < $qtd_produtos; $i++){
                        foreach ($result_produtos[$i] as $key => $value){}
                        $foto_produtos = $result_produtos[$i]['foto'];
                        $cat_produtos = $result_produtos[$i]['categoria'];
                        $nome_produtos = $result_produtos[$i]['nome'];   
                        $ean = $result_produtos[$i]['ean'];   
            
                        $query2 = $pdo->query("SELECT * FROM cat_produtos where id = '$cat_produtos'");
                        $res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
                        $total_reg2 = @count($res2);
                        if($total_reg2 > 0){
                            $nome_cat = $res2[0]['nome'];
                        }else{
                            $nome_cat = 'Sem Referência!';
                        }                        
                        echo <<<HTML
                        <div class="col-lg-4 col-md-12 mb-4">
                            <div class="card">
                            <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light"
                                data-mdb-ripple-color="light">
                                <img src="auth/painel/img/produtos/$foto_produtos" alt="" class="w-100">                                
                            </div>
                            <div class="card-body">
                                <a href="" class="text-reset">
                                    <h5 class="card-title mb-3">$nome_produtos</h5>
                                </a>
                                <a href="" class="text-reset">
                                    <p>$nome_cat</p>
                                </a>
                                <h6 class="mb-3">EAN: $ean</h6>
                            </div>
                            </div>
                        </div> 
                        HTML;                       
                    
                    }
                        
                ?>                           
            </div>            
        </div>
    </section>    

    <!-- Footer -->
    <footer class="text-center text-lg-start bg-light text-muted">
        <!-- Section: Social media -->
        <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
            <!-- Left -->
            <div class="me-5 d-none d-lg-block">
                <span>Se matenha conectado em nosssas redes:</span>
            </div>
            <!-- Left -->

            <!-- Right -->
            <div>
                <a href="<?php echo $facebook; ?>" target="_blank" class="me-4 text-reset">
                    <i class="fab fa-facebook-f" style="font-size:25px;"></i>
                </a>
                <a href="<?php echo $instagram; ?>" target="_blank" class="me-4 text-reset">
                    <i class="fab fa-instagram" style="font-size:25px;"></i>
                </a>
            </div>
            <!-- Right -->
        </section>
        <!-- Section: Social media -->

        <!-- Section: Links  -->
        <section class="">
            <div class="container text-center text-md-start mt-5">
                <!-- Grid row -->
                <div class="row mt-3">
                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-4 col-xl-3 mx-auto mb-4">
                        <!-- Content -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            <i class="fas fa-gem me-3"></i>Casa das Farinhas
                        </h6>
                        <p>
                            Aqui você encontra Uma grande variedade de alimentos a preços acessíveis, Bom para sua casa,
                            melhor ainda para o seu negócio.
                        </p>
                    </div>

                    <!-- Grid column -->
                    <div class="col-md-4 mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Links uteis
                        </h6>
                        <p>
                            <a href="https://precodahora.ba.gov.br/" target="_blank" title="Veja onde comprar mais barato" class="text-reset">Preço da
                                hora</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset" data-bs-toggle="modal" data-bs-target="#exampleModal">Entrar no grupo de ofertas</a>
                        </p>
                        <p>
                            <a href="loja.php" class="text-reset">Varejo</a>
                        </p>
                        <p>
                            <a href="atacado.php" class="text-reset">Atacado</a>
                        </p>
                        <p>
                            <a href="receitas.php" class="text-reset">Receitas</a>
                        </p>
                        <p>
                            <a href="nossos-valores.php" class="text-reset">Nossos Valores</a>
                        </p>                    
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-4 mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">Contato</h6>
                        <p><i class="fas fa-home me-3"></i><?php echo $endereco_sistema; ?></p>
                        <p>
                            <i class="fas fa-envelope me-3"></i>
                            <?php echo $email_sistema; ?>
                        </p>
                        <p><i class="fas fa-phone me-3"></i> <?php echo $telefone_fixo; ?></p>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
        </section>
        <!-- Section: Links  -->

        <!-- Copyright -->
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
            Casa das Farinhas © 2023 - Copyright | Desenvolvido por
            <a class="text-reset fw-bold" href="https://github.com/leandroSJ" target="_blank"> Leandro SJ</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Entrar no grupo do WhatsApp</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="col-md-12">
                <p>
                    <a href="<?php echo $whatsapp_varejo; ?>" target="_blank" class="text-reset"><i class="bi bi-whatsapp" title="Entrar no grupo de ofertas">Ofertas de Varejo</i></a>
                </p>
            </div>

            <div class="col-md-12">
                <p>
                    <a href="<?php echo $whatsapp_atacado; ?>" target="_blank" class="text-reset"><i class="bi bi-whatsapp" title="Entrar no grupo de ofertas">Ofertas de Atacado</i></a>
                </p>
            </div>

          </div>
        </div>
      </div>
    </div>

    <!--Toast-->

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>