<?php 
@session_start();
require_once("verificar.php");
require_once("../conexao.php");

$query = $pdo->query("SELECT * FROM produtos ");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_clientes = @count($res);

$query_banner = $pdo->query("SELECT * FROM slider_banner ");
$res_banner = $query_banner->fetchAll(PDO::FETCH_ASSOC);
$total_banner = @count($res_banner);

$query_ofertas_varejo = $pdo->query("SELECT * FROM slider_ofertas ");
$res_ofertas_varejo = $query_ofertas_varejo->fetchAll(PDO::FETCH_ASSOC);
$total_ofertas_varejo = @count($res_ofertas_varejo);

$query_ofertas_atacado = $pdo->query("SELECT * FROM slider_ofertas_atacado ");
$res_ofertas_atacado = $query_ofertas_atacado->fetchAll(PDO::FETCH_ASSOC);
$total_ofertas_atacado = @count($res_ofertas_atacado);

$query_usuarios = $pdo->query("SELECT * FROM usuarios ");
$res_usuarios = $query_usuarios->fetchAll(PDO::FETCH_ASSOC);
$total_usuarios = @count($res_usuarios);

//categoria
$query_categoria = $pdo->query("SELECT * FROM cat_produtos ");
$res_categoria = $query_categoria->fetchAll(PDO::FETCH_ASSOC);
$total_categoria = @count($res_categoria);

//receitas
$query_receitas = $pdo->query("SELECT * FROM slider_receitas ");
$res_receitas = $query_receitas->fetchAll(PDO::FETCH_ASSOC);
$total_receitas = @count($res_receitas);

//parceiros
$query_parceiros = $pdo->query("SELECT * FROM slider_parceiros ");
$res_parceiros = $query_parceiros->fetchAll(PDO::FETCH_ASSOC);
$total_parceiros = @count($res_parceiros);

$query_cargos = $pdo->query("SELECT * FROM cargos ");
$res_cargos = $query_cargos->fetchAll(PDO::FETCH_ASSOC);
$total_cargos = @count($res_cargos);

?>

<div class="main-page">


	<div class="row">

        <a href="index.php?pag=varejo">
            <div class="col-md-3 col-sm-12 widget widget1">
                <div class="r3_counter_box">
                    <i class="pull-left fa fa-archive icon-rounded"></i>
                    <div class="stats">
                            <h5><strong><big><big><?php echo $total_clientes ?></big></big></strong></h5>

                        </div>
                        <hr style="margin-top:10px">
                        <div align="center"><span>Total de Produtos</span></div>
                </div>
            </div>
        </a>	

        <a href="index.php?pag=cat_produtos">
            <div class="col-md-3 col-sm-12 widget widget1">
                <div class="r3_counter_box">
                    <i class="pull-left fa fa-archive user1 icon-rounded"></i>
                    <div class="stats">
                            <h5><strong><big><big><?php echo $total_categoria ?></big></big></strong></h5>

                        </div>
                        <hr style="margin-top:10px">
                        <div align="center"><span>Categorias de Produto</span></div>
                </div>
            </div>
        </a>

        <a href="index.php?pag=usuarios">
            <div class="col-md-3 col-sm-12 widget widget1">
                <div class="r3_counter_box">
                    <i class="pull-left fa fa-users dollar2 icon-rounded"></i>
                    <div class="stats">
                            <h5><strong><big><big><?php echo $total_usuarios ?></big></big></strong></h5>

                        </div>
                        <hr style="margin-top:10px">
                        <div align="center"><span>Usuários Cadastrado</span></div>
                </div>
            </div>
            
        </a>

        <a href="index.php?pag=cargos">
            <div class="col-md-3 col-sm-12 widget widget1">
                <div class="r3_counter_box">
                    <i class="pull-left fa fa-users user2 icon-rounded"></i>
                    <div class="stats">
                            <h5><strong><big><big><?php echo $total_cargos ?></big></big></strong></h5>

                        </div>
                        <hr style="margin-top:10px">
                        <div align="center"><span>Cargos</span></div>
                </div>
            </div>
            
        </a>

    </div>

    <div class="row">
        <a href="index.php?pag=slider_ofertas">
                <div class="col-md-3  col-sm-12 widget widget1">
                    <div class="r3_counter_box">
                        <i class="pull-left fa fa-picture-o dollar2 icon-rounded"></i>
                        <div class="stats">
                                <h5><strong><big><big><?php echo $total_ofertas_varejo ?></big></big></strong></h5>

                            </div>
                            <hr style="margin-top:10px">
                            <div align="center"><span>Encarte Varejo</span></div>
                    </div>
                </div>
            </a>

            <a href="index.php?pag=slider_ofertas_atacado">
                <div class="col-md-3 col-sm-12 widget widget1">
                    <div class="r3_counter_box">
                        <i class="pull-left fa fa-picture-o dollar1 icon-rounded"></i>
                        <div class="stats">
                                <h5><strong><big><big><?php echo $total_ofertas_atacado ?></big></big></strong></h5>

                            </div>
                            <hr style="margin-top:10px">
                            <div align="center"><span>Encarte Atacado</span></div>
                    </div>
                </div>
            </a>  
            
            <a href="index.php?pag=slider_banner">
                <div class="col-md-3 col-sm-12 widget widget1">
                    <div class="r3_counter_box">
                        <i class="pull-left fa fa-picture-o dollar3 icon-rounded"></i>
                        <div class="stats">
                                <h5><strong><big><big><?php echo $total_banner ?></big></big></strong></h5>

                            </div>
                            <hr style="margin-top:10px">
                            <div align="center"><span>Slider Banner</span></div>
                    </div>
                </div>
            </a>

            <a href="index.php?pag=slider_receitas">
            <div class="col-md-3 col-xs-12 widget ">
                <div class="r3_counter_box">
                    <i class="pull-left fa fa-picture-o user1 icon-rounded"></i>
                    <div class="stats">
                            <h5><strong><big><big><?php echo $total_receitas ?></big></big></strong></h5>

                        </div>
                        <hr style="margin-top:10px">
                        <div align="center"><span>Receitas</span></div>
                </div>
            </div>
        </a>

    </div>

		            
		

    
	
	<!-- for amcharts js -->
	<script src="js/amcharts.js"></script>
	<script src="js/serial.js"></script>
	<script src="js/export.min.js"></script>
	<link rel="stylesheet" href="css/export.css" type="text/css" media="all" />
	<script src="js/light.js"></script>
	<!-- for amcharts js -->

	<script  src="js/index1.js"></script>
	

</div>
</div>

</div>

</div>