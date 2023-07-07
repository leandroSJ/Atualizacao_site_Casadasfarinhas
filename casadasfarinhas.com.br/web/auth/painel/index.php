<?php 
@session_start();
require_once("verificar.php");
require_once("../conexao.php");

$id_usuario = $_SESSION['id'];

$query = $pdo->query("SELECT * from usuarios where id = '$id_usuario'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg > 0){
	$nome_usuario = $res[0]['nome'];
	$email_usuario = $res[0]['email'];
	$cpf_usuario = $res[0]['cpf'];
	$senha_usuario = $res[0]['senha'];
	$nivel_usuario = $res[0]['nivel'];
	$telefone_usuario = $res[0]['telefone'];
	$endereco_usuario = $res[0]['endereco'];	
}

if(@$_GET['pag'] == ""){
	$pag = 'home';
}else{
	$pag = $_GET['pag'];
}

?>

<!DOCTYPE HTML>
<html>
<head>
	<title><?php echo $nome_sistema ?></title>
	<link rel="icon" type="image/png" href="../../img/icons/favicons/mini-logo.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); 
	function hideURLbar(){ window.scrollTo(0,1); } </script>

	<!-- Bootstrap Core CSS -->
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />

	<!-- Custom CSS -->
	<link href="css/style.css" rel='stylesheet' type='text/css' />

	<!-- font-awesome icons CSS -->
	<link href="css/font-awesome.css" rel="stylesheet"> 
	<!-- //font-awesome icons CSS-->

	<!-- side nav css file -->
	<link href='css/SidebarNav.min.css' media='all' rel='stylesheet' type='text/css'/>
	<!-- //side nav css file -->

	<!-- js-->
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/modernizr.custom.js"></script>

	<!--webfonts-->
	<link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
	<!--//webfonts--> 

	<!-- chart -->
	<script src="js/Chart.js"></script>
	<!-- //chart -->

	<!-- Metis Menu -->
	<script src="js/metisMenu.min.js"></script>
	<script src="js/custom.js"></script>
	<link href="css/custom.css" rel="stylesheet">
	<!--//Metis Menu -->
	<style>
		#chartdiv {
			width: 100%;
			height: 295px;
		}
	</style>
	<!--pie-chart --><!-- index page sales reviews visitors pie chart -->
	<script src="js/pie-chart.js" type="text/javascript"></script>
	<script type="text/javascript">

		$(document).ready(function () {
			$('#demo-pie-1').pieChart({
				barColor: '#2dde98',
				trackColor: '#eee',
				lineCap: 'round',
				lineWidth: 8,
				onStep: function (from, to, percent) {
					$(this.element).find('.pie-value').text(Math.round(percent) + '%');
				}
			});

			$('#demo-pie-2').pieChart({
				barColor: '#8e43e7',
				trackColor: '#eee',
				lineCap: 'butt',
				lineWidth: 8,
				onStep: function (from, to, percent) {
					$(this.element).find('.pie-value').text(Math.round(percent) + '%');
				}
			});

			$('#demo-pie-3').pieChart({
				barColor: '#ffc168',
				trackColor: '#eee',
				lineCap: 'square',
				lineWidth: 8,
				onStep: function (from, to, percent) {
					$(this.element).find('.pie-value').text(Math.round(percent) + '%');
				}
			});


		});

	</script>
	<!-- Data tables-->
	<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
	<script type="text/javascript" src="DataTables/datatables.min.js"></script>

	
</head> 
<body class="cbp-spmenu-push">
	<div class="main-content">
		<div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
			<!--left-fixed -navigation-->
			<aside class="sidebar-left">
				<nav class="navbar navbar-inverse">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".collapse" 
						aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<h1><a class="navbar-brand" href="index.php"><span class="fa fa-area-chart"></span>GBgroup<span 
						class="dashboard_text"><?php echo $nome_sistema?></span></a></h1>
					</div>
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="sidebar-menu">
							<li class="header">MENU DE NAVEGAÇÃO</li>


							<li class="treeview">
								<a href="index.php">
									<i class="fa fa-dashboard"></i> <span>Home</span>
								</a>
							</li>							
							
							<li class="treeview">
								<a href="#">
									<i class="fa fa-plus"></i>
									<span>Cadastro</span>
									<i class="fa fa-angle-left pull-right"></i>
								</a>
								<ul class="treeview-menu">	

									<li class="treeview">
										<a href="#">
											<i class="fa fa-plus"></i>
											<span>Produtos</span>
											<i class="fa fa-angle-left pull-right"></i>
										</a>
										<ul class="treeview-menu">									
											<li><a href="index.php?pag=varejo"><i class="fa fa-angle-right"></i> Varejo</a></li>
											<li><a href="index.php?pag=atacado"><i class="fa fa-angle-right"></i> Atacado</a></li>
											<li><a href="index.php?pag=cat_produtos"><i class="fa fa-angle-right"></i> Categorias</a></li>									
										</ul>
									</li>

									<li class="treeview">
										<a href="#">
											<i class="fa fa-users"></i>
											<span>Pessoas</span>
											<i class="fa fa-angle-left pull-right"></i>
										</a>
										<ul class="treeview-menu">
											<li><a href="index.php?pag=usuarios"><i class="fa fa-angle-right"></i> Usuários</a></li>									
											<li><a href="index.php?pag=funcionarios"><i class="fa fa-angle-right"></i> Funcionários</a></li>									
											<li><a href="index.php?pag=cargos"><i class="fa fa-angle-right"></i> Cargos</a></li>		
										</ul>
									</li>

									<li><a href="index.php?pag=cargos"><i class="fa fa-angle-right"></i>Cargos</a></li>

									
								</ul>
							</li>

							<li class="treeview">
								<a href="#">
								<i class="fa fa-newspaper-o" aria-hidden="true"></i>
									<span>Páginas</span>
									<i class="fa fa-angle-left pull-right"></i>
								</a>
								<ul class="treeview-menu">
									<li><a href="index.php?pag=home"><i class="fa fa-angle-right"></i> Home</a></li>									
									<li><a href="index.php?pag=varejo"><i class="fa fa-angle-right"></i> Varejo</a></li>									
									<li><a href="index.php?pag=atacado"><i class="fa fa-angle-right"></i> Atacado</a></li>
								</ul>
							</li>
							
							<li class="treeview">
								<a href="#">
								<i class="fa fa-newspaper-o" aria-hidden="true"></i>
									<span>Slides Image</span>
									<i class="fa fa-angle-left pull-right"></i>
								</a>
								<ul class="treeview-menu">
									<li><a href="index.php?pag=slider_banner"><i class="fa fa-angle-right"></i>Banner Principal</a></li>
									<li><a href="index.php?pag=slider_ofertas"><i class="fa fa-angle-right"></i>Ofertas Varejo</a></li>
									<li><a href="index.php?pag=slider_ofertas_atacado"><i class="fa fa-angle-right"></i>Ofertas Atacado</a></li>
									<li><a href="index.php?pag=slider_receitas"><i class="fa fa-angle-right"></i>Receitas</a></li>									
									<li><a href="index.php?pag=slider_parceiros"><i class="fa fa-angle-right"></i>Parceiros</a></li>
								</ul>
							</li>

						
						</ul>
					</div>
					<!-- /.navbar-collapse -->
				</nav>
			</aside>
		</div>
		<!--left-fixed -navigation-->
		
		<!-- header-starts -->
		<div class="sticky-header header-section ">
			<div class="header-left">
				<!--toggle button start-->
				<button id="showLeftPush"><i class="fa fa-bars"></i></button>
				<!--toggle button end-->
				<div class="profile_details_left"><!--notifications of menu start -->
					<ul class="nofitications-dropdown">
						<li class="dropdown head-dpdn">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
								<i class="fa fa-envelope"></i><span class="badge">4</span>
							</a>
							<ul class="dropdown-menu">
								<li>
									<div class="notification_header">
										<h3>You have 3 new messages</h3>
									</div>
								</li>
								<li><a href="#">
									<div class="user_img"><img src="images/1.jpg" alt=""></div>
									<div class="notification_desc">
										<p>Lorem ipsum dolor amet</p>
										<p><span>1 hour ago</span></p>
									</div>
									<div class="clearfix"></div>	
								</a></li>
								<li class="odd"><a href="#">
									<div class="user_img"><img src="images/4.jpg" alt=""></div>
									<div class="notification_desc">
										<p>Lorem ipsum dolor amet </p>
										<p><span>1 hour ago</span></p>
									</div>
									<div class="clearfix"></div>	
								</a></li>
								<li><a href="#">
									<div class="user_img"><img src="images/3.jpg" alt=""></div>
									<div class="notification_desc">
										<p>Lorem ipsum dolor amet </p>
										<p><span>1 hour ago</span></p>
									</div>
									<div class="clearfix"></div>	
								</a></li>
								<li><a href="#">
									<div class="user_img"><img src="images/2.jpg" alt=""></div>
									<div class="notification_desc">
										<p>Lorem ipsum dolor amet </p>
										<p><span>1 hour ago</span></p>
									</div>
									<div class="clearfix"></div>	
								</a></li>
								<li>
									<div class="notification_bottom">
										<a href="#">See all messages</a>
									</div> 
								</li>
							</ul>
						</li>
						<li class="dropdown head-dpdn">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
								<i class="fa fa-bell"></i><span class="badge blue">4</span>
							</a>
							<ul class="dropdown-menu">
								<li>
									<div class="notification_header">
										<h3>You have 3 new notification</h3>
									</div>
								</li>
								<li><a href="#">
									<div class="user_img"><img src="images/4.jpg" alt=""></div>
									<div class="notification_desc">
										<p>Lorem ipsum dolor amet</p>
										<p><span>1 hour ago</span></p>
									</div>
									<div class="clearfix"></div>	
								</a></li>
								<li class="odd"><a href="#">
									<div class="user_img"><img src="images/1.jpg" alt=""></div>
									<div class="notification_desc">
										<p>Lorem ipsum dolor amet </p>
										<p><span>1 hour ago</span></p>
									</div>
									<div class="clearfix"></div>	
								</a></li>
								<li><a href="#">
									<div class="user_img"><img src="images/3.jpg" alt=""></div>
									<div class="notification_desc">
										<p>Lorem ipsum dolor amet </p>
										<p><span>1 hour ago</span></p>
									</div>
									<div class="clearfix"></div>	
								</a></li>
								<li><a href="#">
									<div class="user_img"><img src="images/2.jpg" alt=""></div>
									<div class="notification_desc">
										<p>Lorem ipsum dolor amet </p>
										<p><span>1 hour ago</span></p>
									</div>
									<div class="clearfix"></div>	
								</a></li>
								<li>
									<div class="notification_bottom">
										<a href="#">See all notifications</a>
									</div> 
								</li>
							</ul>
						</li>	
						<li class="dropdown head-dpdn">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
								<i class="fa fa-tasks"></i><span class="badge blue1">8</span>
							</a>
							<ul class="dropdown-menu">
								<li>
									<div class="notification_header">
										<h3>You have 8 pending task</h3>
									</div>
								</li>
								<li><a href="#">
									<div class="task-info">
										<span class="task-desc">Database update</span><span class="percentage">40%</span>
										<div class="clearfix"></div>	
									</div>
									<div class="progress progress-striped active">
										<div class="bar yellow" style="width:40%;"></div>
									</div>
								</a></li>
								<li><a href="#">
									<div class="task-info">
										<span class="task-desc">Dashboard done</span><span class="percentage">90%</span>
										<div class="clearfix"></div>	
									</div>
									<div class="progress progress-striped active">
										<div class="bar green" style="width:90%;"></div>
									</div>
								</a></li>
								<li><a href="#">
									<div class="task-info">
										<span class="task-desc">Mobile App</span><span class="percentage">33%</span>
										<div class="clearfix"></div>	
									</div>
									<div class="progress progress-striped active">
										<div class="bar red" style="width: 33%;"></div>
									</div>
								</a></li>
								<li><a href="#">
									<div class="task-info">
										<span class="task-desc">Issues fixed</span><span class="percentage">80%</span>
										<div class="clearfix"></div>	
									</div>
									<div class="progress progress-striped active">
										<div class="bar  blue" style="width: 80%;"></div>
									</div>
								</a></li>
								<li>
									<div class="notification_bottom">
										<a href="#">See all pending tasks</a>
									</div> 
								</li>
							</ul>
						</li>	
					</ul>
					<div class="clearfix"> </div>
				</div>
				<!--notification menu end -->
				<div class="clearfix"> </div>
			</div>
			<div class="header-right">																
				<div class="profile_details">		
					<ul>
						<li class="dropdown profile_details_drop">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
								<div class="profile_img">										
									<div class="user-name">
										<p><?php echo $nome_usuario ?></p>
										<span><?php echo $nivel_usuario ?></span>
									</div>
									<i class="fa fa-angle-down lnr"></i>
									<i class="fa fa-angle-up lnr"></i>
									<div class="clearfix"></div>	
								</div>	
							</a>
							<ul class="dropdown-menu drp-mnu">

								<li> 
									<a href="" data-toggle="modal" data-target="#modalConfig">
										<i class="fa fa-cog"></i> Configurações
									</a> 
								</li> 	

								<li> 
									<a href="" data-toggle="modal" data-target="#modalPerfil">
										<i class="fa fa-suitcase"></i> Editar Perfil
									</a> 
								</li> 

								<li> 
									<a href="logout.php">
										<i class="fa fa-sign-out"></i> Sair
									</a> 
								</li>

							</ul>
						</li>
					</ul>
				</div>
				<div class="clearfix"> </div>				
			</div>
			<div class="clearfix"> </div>	
		</div>
		<!-- //header-ends -->

		<!-- main content start-->
		<div id="page-wrapper">
			<?php require_once("pages/".$pag.'.php') ?>
		</div>

		<!--footer-->
		<div class="footer">
			<p> &copy; Casa das Farinhas 2023 - Desenvolvido Por <a href="https://github.com/leandroSJ/" target="_blank">Leandro SJ</a></p>		
		</div>
		<!--//footer-->
	</div>
	</div>

	<!-- Modal Perfil-->
	<div class="modal fade" id="modalPerfil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">	
				<div class="modal-header">
					<h4 class="modal-title" id="exampleModalLabel">Editar Perfil</h4>
					<button id="btn-fechar-perfil" type="button" class="close" data-dismiss="modal" 
					ria-label="Close" style="margin-top: -20px">
						<span aria-hidden="true" >&times;</span>
					</button>
				</div>
				<form method="post" id="form-perfil">
					<div class="modal-body">

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="exampleInputEmail1">Nome</label>
									<input type="text" class="form-control" id="nome-perfil" name="nome" 
									placeholder="Nome" value="<?php echo $nome_usuario ?>" required>    
								</div> 	
							</div>
							<div class="col-md-6">

								<div class="form-group">
									<label for="exampleInputEmail1">Email</label>
									<input type="email" class="form-control" id="email-perfil" name="email" 
									placeholder="Email" value="<?php echo $email_usuario ?>" required>    
								</div> 	
							</div>
						</div>


						<div class="row">
							
							<div class="col-md-6">
								<div class="form-group">
									<label for="exampleInputEmail1">Telefone</label>
									<input type="text" class="form-control" id="telefone-perfil" name="telefone" 
									placeholder="Telefone" value="<?php echo $telefone_usuario ?>" >    
								</div> 	
							</div>

							<div class="col-md-6">
								
								<div class="form-group">
									<label for="exampleInputEmail1">CPF</label>
									<input type="text" class="form-control" id="cpf-perfil"  name="cpf" 
									placeholder="CPF" value="<?php echo $cpf_usuario ?>">    
								</div> 	
							</div>

						</div>


						<div class="row">

							<div class="col-md-6">
								<div class="form-group">
									<label for="exampleInputEmail1">Senha</label>
									<input type="password" class="form-control" id="senha-perfil" name="senha" 
									placeholder="Senha" value="<?php echo $senha_usuario ?>" required>    
								</div> 	
							</div>

							<div class="col-md-6">
								
								<div class="form-group">
									<label for="exampleInputEmail1">Confirmar Senha</label>
									<input type="password" class="form-control" id="conf-senha-perfil" name="conf_senha" 
									placeholder="Confirmar Senha" required>    
								</div> 	
							</div>

						</div>


						<div class="row">

							<div class="col-md-12">
								<div class="form-group">
									<label for="exampleInputEmail1">Endereço</label>
									<input type="text" class="form-control" id="endereco-perfil" name="endereco" 
									placeholder="Rua X Número 1 Bairro xxx" value="<?php echo $endereco_usuario ?>" >    
								</div> 	
							</div>
							
						</div>										
							<input type="hidden" name="id" value="<?php echo $id_usuario ?>">
						<br>
						<small><div id="mensagem-perfil" class="text-center"></div></small>
					</div>
					<div class="modal-footer">      
						<button type="submit" class="btn btn-primary">Editar Perfil</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	
		<!-- Modal Config-->
	<div class="modal fade" id="modalConfig" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="exampleModalLabel">Editar Configurações</h4>
					<button id="btn-fechar-config" type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -20px">
						<span aria-hidden="true" >&times;</span>
					</button>
				</div>
				<form method="post" id="form-config">
					<div class="modal-body">

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="exampleInputEmail1">Nome da Loja</label>
									<input type="text" class="form-control" id="nome_sistema" name="nome_sistema" placeholder="Nome da Loja" value="<?php echo $nome_sistema ?>" required>    
								</div> 	
							</div>
							<div class="col-md-6">

								<div class="form-group">
									<label for="exampleInputEmail1">Email da Loja</label>
									<input type="email" class="form-control" id="email_sistema" name="email_sistema" placeholder="Email da Loja" value="<?php echo $email_sistema ?>" required>    
								</div> 	
							</div>
						</div>


						<div class="row">
							
							<div class="col-md-4">

								<div class="form-group">
									<label for="exampleInputEmail1">Telefone Fixo</label>
									<input type="text" class="form-control" id="telefone_fixo" name="telefone_fixo" 
									placeholder="Fixo" value="<?php echo $telefone_fixo?>">    
								</div> 	
							</div>
							<div class="col-md-8">
								
								<div class="form-group">
									<label for="exampleInputEmail1">Endereço da Loja</label>
									<input type="text" class="form-control" id="endereco_sistema" name="endereco_sistema"
									 placeholder="Rua X Numero X Bairro Cidade" value="<?php echo $endereco_sistema ?>">    
								</div> 	
							</div>
						</div>


						<div class="row">
							<div class="col-md-6">
							<div class="form-group">
									<label for="exampleInputEmail1">Instagram</label>
									<input type="text" class="form-control" id="instagram_sistema" name="instagram_sistema" 
									placeholder="Link do Perfil no Instagram" value="<?php echo $instagram ?>">   
								</div> 
							</div>											

							<div class="col-md-6">
								<div class="form-group">
									<label for="exampleInputEmail1">Facebook</label>
									<input type="text" class="form-control" id="facebook" name="facebook" 
									placeholder="Link do Perfil no facebook" value="<?php echo $facebook ?>">   
								</div> 	
							</div>
							
						</div>							
						
						<div class="row">
							
							<div class="col-md-6">
								<div class="form-group">
									<label for="exampleInputEmail1">Whatsapp Varejo</label>
									<input type="text" class="form-control" id="whatsapp_varejo" name="whatsapp_varejo"
									 placeholder="Insira o link para o grupo no whatsapp" value="<?php echo $whatsapp_varejo ?>">
								</div> 	
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label for="exampleInputEmail1">Whatsapp Atacado</label>
									<input type="text" class="form-control" id="whatsapp_atacado" name="whatsapp_atacado"
									 placeholder="Insira o link para o grupo no whatsapp" value="<?php echo $whatsapp_atacado ?>">
								</div> 	
							</div>

						</div>

						<br>
						<small><div id="mensagem-config" align="center"></div></small>
					</div>
					<div class="modal-footer">      
						<button type="submit" class="btn btn-primary">Salvar Dados</button>
					</div>
				</form>
			</div>
		</div>
	</div>


	<script type="text/javascript">
		$("#form-perfil").submit(function () {

			event.preventDefault();
			var formData = new FormData(this);

			$.ajax({
				url: "editar-perfil.php",
				type: 'POST',
				data: formData,

				success: function (mensagem) {
					$('#mensagem-perfil').text('');
					$('#mensagem-perfil').removeClass()
					if (mensagem.trim() == "Editado com Sucesso") {

						$('#btn-fechar-perfil').click();
						location.reload();			
						
					} else {

						$('#mensagem-perfil').addClass('text-danger')
						$('#mensagem-perfil').text(mensagem)
					}


				},

				cache: false,
				contentType: false,
				processData: false,

			});

		});
	</script>

	<script type="text/javascript">
		function carregarImgPerfil() {
		var target = document.getElementById('target-usu');
		var file = document.querySelector("#foto-usu").files[0];
		
			var reader = new FileReader();

			reader.onloadend = function () {
				target.src = reader.result;
			};

			if (file) {
				reader.readAsDataURL(file);

			} else {
				target.src = "";
			}
		}
	</script>

	<script type="text/javascript">
		$("#form-config").submit(function () {

			event.preventDefault();
			var formData = new FormData(this);

			$.ajax({
				url: "editar-config.php",
				type: 'POST',
				data: formData,

				success: function (mensagem) {
					$('#mensagem-config').text('');
					$('#mensagem-config').removeClass()
					if (mensagem.trim() == "Editado com Sucesso") {

						$('#btn-fechar-config').click();
						location.reload();			
						
					} else {

						$('#mensagem-config').addClass('text-danger')
						$('#mensagem-config').text(mensagem)
					}


				},

				cache: false,
				contentType: false,
				processData: false,

			});

		});
	</script>

	<script type="text/javascript">
		function carregarImgLogo() {
		var target = document.getElementById('target-logo');
		var file = document.querySelector("#foto-logo").files[0];
		
			var reader = new FileReader();

			reader.onloadend = function () {
				target.src = reader.result;
			};

			if (file) {
				reader.readAsDataURL(file);

			} else {
				target.src = "";
			}
		}
	</script>

	<script type="text/javascript">
		function carregarImgLogoRel() {
		var target = document.getElementById('target-logo-rel');
		var file = document.querySelector("#foto-logo-rel").files[0];
		
			var reader = new FileReader();

			reader.onloadend = function () {
				target.src = reader.result;
			};

			if (file) {
				reader.readAsDataURL(file);

			} else {
				target.src = "";
			}
		}
	</script>

	<script type="text/javascript">
		function carregarImgIcone() {
		var target = document.getElementById('target-icone');
		var file = document.querySelector("#foto-icone").files[0];
		
			var reader = new FileReader();

			reader.onloadend = function () {
				target.src = reader.result;
			};

			if (file) {
				reader.readAsDataURL(file);

			} else {
				target.src = "";
			}
		}
	</script>


	<!-- Classie --><!-- for toggle left push menu script -->
	<script src="js/classie.js"></script>
	<script>
		var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
			showLeftPush = document.getElementById( 'showLeftPush' ),
			body = document.body;
			
		showLeftPush.onclick = function() {
			classie.toggle( this, 'active' );
			classie.toggle( body, 'cbp-spmenu-push-toright' );
			classie.toggle( menuLeft, 'cbp-spmenu-open' );
			disableOther( 'showLeftPush' );
		};
		

		function disableOther( button ) {
			if( button !== 'showLeftPush' ) {
				classie.toggle( showLeftPush, 'disabled' );
			}
		}
	</script>
	<!-- //Classie --><!-- //for toggle left push menu script -->
		
	<!--scrolling js-->
	<script src="js/jquery.nicescroll.js"></script>	
	<!--//scrolling js-->
	
	<!-- side nav js -->
	<script src='js/SidebarNav.min.js' type='text/javascript'></script>
	<script>
      $('.sidebar-menu').SidebarNav()
    </script>				
	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.js"> </script>

	<script type="text/javascript" src="js/mascaras.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script> 
	<script type="text/javascript">
		$("#form-perfil").submit(function () {

			event.preventDefault();
			var formData = new FormData(this);

			$.ajax({
				url: "editar-perfil.php",
				type: 'POST',
				data: formData,

				success: function (mensagem) {
					$('#mensagem-perfil').text('');
					$('#mensagem-perfil').removeClass()
					if (mensagem.trim() == "Editado com Sucesso") {

						$('#btn-fechar-perfil').click();
						location.reload();			
						
					} else {

						$('#mensagem-perfil').addClass('text-danger')
						$('#mensagem-perfil').text(mensagem)
					}
				},

				cache: false,
				contentType: false,
				processData: false,
			});
		});
	</script>	
	
</body>
</html>