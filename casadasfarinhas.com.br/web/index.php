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
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

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
                
    <!-- Banners -->
    <section class="d-none d-lg-block">
        <div id="mainSlider" class="carousel slide" data-bs-ride="carousel">
            
            <div class="carousel-indicators">
                <?php 
                 $controle = '0';
                 while($controle <  $qtd_reg ){
                     $ativo = '';
                     if($controle == 0){
                         $ativo = 'active';
                     }
                     echo "<button type='button' data-bs-target='#mainSlider' data-bs-slide-to='$controle' class='$ativo'
                     aria-current='true' aria-label='Slide $controle'></button>";
                     $controle++;
                 }
                ?>                                  
            </div>
            <div class="carousel-inner">            
                <?php                     
                    for($i=0; $i < $qtd_reg; $i++){
                        foreach ($result_slides[$i] as $key => $value){}
                        $foto = $result_slides[$i]['foto'];

                        if($i == 0){
                            $ativo = 'active';
                        }

                        echo "<div class='carousel-item $ativo'>";
                        echo "<img id='carousel-$i' src='auth/painel/img/slider_banner/$foto' 
                        class='d-block w-100' alt='$foto' title='$foto'>";
                        echo "</div>";
                    }                    
                    ?>                
                
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#mainSlider" data-bs-slide="prev">
                <i class="bi bi-chevron-compact-left"></i>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#mainSlider" data-bs-slide="next">
                <i class="bi bi-chevron-compact-right"></i>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <!-- Ofertas -->   
    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">                
                <span class="badge badge-pill badge-danger mt-4 mb-3 fs-5">NOVIDADES</span>
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
                                echo "<img src='auth/painel/img/slider_ofertas/$foto_ofertas' style='height: 330px;' alt=''>";
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
    <!-- Seções -->
    <section>
        <div class="container">
            <div class="container">
                <div class="col12 col-md-10 offset-md-1" id="mini-banners">
                    <div class="row">
                    <span class="badge badge-pill badge-danger mt-4 mb-3 fs-5">SEÇÕES</span>
                        <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                            <a href="massas.php">
                                <div class="item card card-section text-center">
                                    <div class="single-box">
                                        <div class="img-box"><img src="img/icons/espaguete.png" alt="Massas"></div>
                                    </div>
                                    <div class="card-body">
                                        <h1 class="card-title primary-color">Massas</h1>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                            <a href="enlatados.php">
                                <div class="item card card-section text-center">
                                    <div class="single-box">
                                        <div class="img-box"><img src="img/icons/comidas-enlatadas.png"
                                                alt="Enlatados"></div>
                                    </div>
                                    <div class="card-body">
                                        <h1 class="card-title primary-color">Enlatados</h1>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                            <a href="oleos-e-molhos.php">
                                <div class="item card card-section text-center">
                                    <div class="single-box">
                                        <div class="img-box"><img src="img/icons/oleo-de-cozinha.png"
                                                alt="Óleos e molhos"></div>
                                    </div>
                                    <div class="card-body">
                                        <h1 class="card-title primary-color">Óleos e molhos</h1>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                            <a href="biscoitos.php">
                                <div class="item card card-section text-center">
                                    <div class="single-box">
                                        <div class="img-box"><img src="img/icons/biscoitos.png" alt="Biscoitos">
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h1 class="card-title primary-color">Biscoitos</h1>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col12 col-md-10 offset-md-1" id="mini-banners">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                            <a href="matinais.php">
                                <div class="item card card-section text-center">
                                    <div class="single-box">
                                        <div class="img-box"><img src="img/icons/caixa-de-leite.png" alt="Matinais">
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h1 class="card-title primary-color">Matinais</h1>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                            <a href="limpeza.php">
                                <div class="item card card-section text-center">
                                    <div class="single-box">
                                        <div class="img-box"><img src="img/icons/limpeza.png"
                                                alt="Materiais de limpeza"></div>
                                    </div>
                                    <div class="card-body">
                                        <h1 class="card-title primary-color">Limpeza</h1>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                            <a href="higiene_pessoal.php">
                                <div class="item card card-section text-center">
                                    <div class="single-box">
                                        <div class="img-box"><img src="img/icons/higiene-pessoal.png"
                                                alt="Higiene pessoal"></div>
                                    </div>
                                    <div class="card-body">
                                        <h1 class="card-title primary-color">Higiene Pessoal</h1>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                            <a href="graos.php">
                                <div class="item card card-section text-center">
                                    <div class="single-box">
                                        <div class="img-box"><img src="img/icons/grao.png" alt="Grãos"></div>
                                    </div>
                                    <div class="card-body">
                                        <h1 class="card-title primary-color">Grãos</h1>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col12 col-md-10 offset-md-1" id="mini-banners">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                            <a href="naturais.php">
                                <div class="item card card-section text-center">
                                    <div class="single-box">
                                        <div class="img-box"><img src="img/icons/produtos-naturais.png"
                                                alt="produtos naturais"></div>
                                    </div>
                                    <div class="card-body">
                                        <h1 class="card-title primary-color">naturais</h1>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                            <a href="cosmeticos.php">
                                <div class="item card card-section text-center">
                                    <div class="single-box">
                                        <div class="img-box"><img src="img/icons/cosmeticos.png" alt="Cosméticos">
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h1 class="card-title primary-color">Cosméticos</h1>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                            <a href="laticinios.php">
                                <div class="item card card-section text-center">
                                    <div class="single-box">
                                        <div class="img-box"><img src="img/icons/laticinios.png" alt="Laticínios">
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h1 class="card-title primary-color">Laticínios</h1>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                            <a href="bebidas.php">
                                <div class="item card card-section text-center">
                                    <div class="single-box">
                                        <div class="img-box"><img src="img/icons/bebida-alcoolica.png"
                                                alt="Bebidas"></div>
                                    </div>
                                    <div class="card-body">
                                        <h1 class="card-title primary-color">Bebidas</h1>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Receitas-->
    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                <span class="badge badge-pill badge-danger mt-4 mb-3 fs-5">RECEITAS</span>
                </div>
                <div class="col-md-12">
                    <div class="featured-carousel owl-carousel">

                        <?php 
                        
                            for($i=0; $i < $qtd_receitas; $i++){
                                foreach ($result_receitas[$i] as $key => $value){}
                                $foto_receita = $result_receitas[$i]['foto'];
                                $titulo_receita = $result_receitas[$i]['titulo_receitas'];
                                $link_receita = $result_receitas[$i]['link_receitas'];
                            

                                echo "<div class='item'>";
                                echo "<div class='work'>";
                                echo "<div class='col-12 img d-flex align-items-center justify-content-center rounded'>";
                                echo " <a href='{$link_receita}' target='_blanc'><img src='auth/painel/img/slider_receitas/$foto_receita' alt='$titulo_receita'> </a>";
                                echo "</div>";
                                echo "<div class='text pt-3 w-100 text-center'>";
                                echo "<h3>$titulo_receita</h3>";                                
                                echo "</div>";
                                echo "</div>";
                                echo "</div>";
                            
                            }
                        
                        ?>                       
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Mapa do supermercado-->
    <section>
        <div class="container pb-4">
            <div class="card mb-5">
                <div class="card-body text-center">
                <span class=" badge badge-pill badge-danger mb-3 fs-5">MAPA DO SUPERMERCADO</span>
                    <p class="card-text">
                        Aqui você encontra Uma grande variedade de alimentos a preços acessíveis, Bom para sua casa,
                        melhor ainda para o seu negócio.
                    </p>                    
                </div>                
                <img src="img/logo-banners/super-mercado-1-2.webp" class="card-img-bottom"
                alt="Mapa Supermercado Casa das Farinhas" />
            </div>

            <div class="card">
                <img src="img/logo-banners/super-mercado-2-2.webp" class="card-img-bottom" alt="Mapa Supermercado Casa das Farinhas" />
            </div><!--  -->
        </div>

    </section>

    <!-- lojas-->
    <section class="pb-6">
        <div class="container text-center">
        <span class="badge badge-pill badge-danger mt-4 mb-3 fs-5">NOSSAS LOJAS</span>
            <div class="row">

                <div class="col-md-6">
                    <h1>Supermercado</h1>

                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d546.1694241531551!2d-38.53970471517318!3d-12.670732558537036!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x716711231544afb%3A0x3c3d005e7269abc0!2sCasa%20das%20Farinhas!5e0!3m2!1spt-BR!2sbr!4v1679890123009!5m2!1spt-BR!2sbr"
                        style="border:0; width:100%; height: 500px;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>

                </div>

                <div class="col-md-6">
                <h1>Atacado</h1>

                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d613.0564631573312!2d-38.51414042277155!3d-12.669925723093979!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x71671dd73e0a90d%3A0x788c5d6e6c06c692!2sAtacado%20Casa%20Das%20Farinhas!5e0!3m2!1spt-BR!2sbr!4v1680052216997!5m2!1spt-BR!2sbr"
                        style="border:0; width:100%; height: 500px;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>

            </div>
        </div>
    </section>

    <!-- Parceiros-->
    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                <span class="badge badge-pill badge-danger mt-4 mb-3 fs-5">PARCEIROS</span>
                </div>
                <div class="col-md-12">
                    <div class="featured-carousel owl-carousel">
                        
                        <?php 
                            for($i=0; $i < $qtd_parceiros; $i++){
                                foreach ($result_parceiros[$i] as $key => $value){}
                                $foto_parceiros = $result_parceiros[$i]['foto'];
                            

                                echo "<div class='item'>";
                                echo "<div class='work' >";
                                echo "<div class='col-12 img d-flex align-items-center justify-content-center rounded'>";
                                echo "<img src='auth/painel/img/slider_parceiros/$foto_parceiros' style='height: 330px;' alt=''>";
                                echo "</div>";                                
                                echo "</div>";
                                echo "</div>";
                            
                            }
                        
                        ?>                  
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Posts Instagram-->
    <!-- <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                <span class="badge badge-pill badge-danger mt-4 mb-3 fs-5">ÚLTIMAS NO INSTAGRAM</span>
                </div>
                <div class="col-md-12">
                    <div class="featured-carousel owl-carousel">
                        <?php /*
                            $campos = "caption,media_type,media_url,permalink,timestamp,username";
                            $token = "IGQVJYbXdZAMnJES1FBZAmI4VHNJV3Jlc1ZADYTAwV1ZA4YkhuRlM4SlN0ZAm51a2VaNkN2c3JDbnpjdUplUVZALdGJCUkgzN2ZA2RGhvTXVqLXlyRGd4OUZASREhNejFZAbEw5eGI1bVR0MTdUQVV2VHNUU0syMgZDZD";
                            $limitador = 15;                            
                            //JSON
                            $stringAPI = "https://graph.instagram.com/me/media?fields={$campos}&access_token={$token}&limit={$limitador}";
                            $conversaoJsonPHP = @file_get_contents($stringAPI);
                            $resultadoDecodificado = json_decode($conversaoJsonPHP, true, 512, JSON_BIGINT_AS_STRING);                                                         
                        
                                

                            foreach ($resultadoDecodificado["data"] as $cp) {
                                # code...                                
                                $caption = isset($cp["caption"]) ? $cp["caption"] : "";
                                $media_type = isset($cp["media_type"]) ? $cp["media_type"] : "";
                                $media_url = isset($cp["media_url"]) ? $cp["media_url"] : "";
                                $permalink = isset($cp["permalink"]) ? $cp["permalink"] : "";
                                $timestamp= isset($cp["timestamp"]) ? $cp["timestamp"] : "";
                                $username= isset($cp["username"]) ? $cp["username"] : "";                                                              
                            
                                echo "<div class='item'>";
                                echo "<div class='work'>";
                                echo "<div class='col-12 img d-flex align-items-center justify-content-center rounded'>";
                                if($media_type == 'VIDEO'){
                                    echo "<div class='embed-responsive embed-responsive-16by9'>";
                                    echo "<a href='{$permalink}' target=' _blank' ><video src='$media_url' muted style='position:fixed;'>";                                                                        
                                    echo "</video> </a>";
                                    echo "</div>";                                    
                                    
                                    
                                }else{
                                    echo " <a href='{$permalink}' target=' _blank' ><img src='{$media_url}' alt='ultimas postagens do instagram'></a>";                                    
                                    
                                }                                
                                echo "</div>";
                                echo "<div class='text pt-3 w-100 text-center'>";                                                                
                                echo "</div>";
                                echo "</div>";
                                echo "</div>";       
                                
                            }
                        
                        */
                        ?>              
                    </div>                    
                </div>
            </div>
        </div>
    </section>-->

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
                <a href="https://www.facebook.com/casadasfarinhass" target="_blank" class="me-4 text-reset">
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
    <!-- Footer -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Entrar no grupo do whatsapp</h5>
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
