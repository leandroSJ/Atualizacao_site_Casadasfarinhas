<?php

require_once 'conexao.php';
// Inserir um usuário Administrador caso não exista
$system_name = 'Casa das Farinhas';
$system_email = $system_email;
$cpf = $cpf;
$telefone = $telefone;
$endereco = $endereco;
$senha = $senha;
$password_hash = password_hash($senha, PASSWORD_DEFAULT);
$nivel = 'Administrador';

$query = $pdo->query("SELECT * from usuarios where nivel = 'Administrador'");
$res = $query->fetchALL(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if ($total_reg == 0) {
    $pdo->query("INSERT INTO usuarios SET nome='$system_name',
    email='$system_email', cpf='$cpf', telefone='$telefone', endereco='$endereco', senha='$senha',
    senha_crip='$password_hash', nivel='$nivel', data=curDate(), ativo='Sim'");
}

// Inserir um Cargo Administrador caso não exista

$query = $pdo->query("SELECT * from cargos");
$res = $query->fetchALL(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if ($total_reg == 0) {
    $pdo->query("INSERT INTO cargos SET nome='$nivel'");
}

?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Casa das Farinhas, Aqui você encontra óleos de soja, óleos de milho, e molhos prontos.">
    <title> <?php echo $system_name ?> </title>
    <!-- Fonte -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <!-- Estilos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"/>
    <link rel="icon" type="image/png" sizes="192x192"  href="../img/icons/favicons/mini-logo.png">
    <!-- Font Awesome -->
    <link href="../css/my_style.css" rel="stylesheet">
    <link href="../css/form-login.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/bf7e05c402.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <section>
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-xl-10">
            <div class="card rounded-3 text-black">
              <div class="row g-0">
                <div class="col-lg-6">
                  <div class="card-body p-md-5 mx-md-4">
                    <div class="text-center">
                      <img src="../img/logo-banners/logo-red.png"
                      style="width: 185px;" alt="logo">
                      <h1 class="mt-3 mb-5 pb-1 secondary-color">Inimiga nº 1 dos Preços Altos</h1>
                    </div>
                    <form accept-charset="utf8" role="form" action="login.php" method="post">
                      <p>Login</p>
                      <div class="form-outline mb-4">
                        <input type="text" class="form-control" id="cpf-perfil" placeholder="Email ou CPF" name="email" required/>                        
                      </div>
                      <p>Senha</p>
                      <div class="form-outline mb-4">
                        <input type="password" class="form-control" placeholder="Digite sua Senha" name="password" required />                        
                      </div>
                      <div class="pt-1 mb-5 pb-1">
                        <button class="btn btn-danger w-100" type="submit" value="Login">Login</button><br>                        
                      </div>                      
                      <p class="text-muted text-center" ><a class="unlink" href="" data-bs-toggle="modal" data-bs-target="#exampleModal">esqueceu sua senha?</a></p>
                    </form>
                  </div>
                </div>
                <div class="col-lg-6 d-flex align-items-center gradient-custom-2 bg-danger">
                  <div class="px-3 py-4 p-md-5 mx-md-4 text-white">
                    <h2 class="mb-4 text-center">Seja uma pessoa melhor</h2>
                    <p>“Se você é alguém que tenta, você não vai conseguir, a tentativa ela não existe, ou você faz ou não faz.”</p>                         
                    <p>“Aprender a controlar seu orçamento é o modo mais prático de cortar gastos, liquidar suas dívidas e começar a investir.”</p>
                    <p>“Investir em conhecimento rende sempre os melhores juros.”</p>
                    <p>“Insanidade é continuar fazendo sempre a mesma coisa e esperar resultados diferentes.”</p>
                    <p class="text-center">Leandro SJ</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Recupere sua Senha</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form method="post" id="form-recuperar">

              <label for="email-perfil"></label>
              <input type="email" class="form-control" placeholder="Digite seu email" name="email" required="required" id="email-recuperar"/>
              <div id="mensagem-recuperar" class='text-center'></div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary" >Recuperar Senha</button>
              </div>
            </form>               
          </div>
        </div>
      </div>
    </div>
 
    <script src="../js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">  

 $("#form-recuperar").submit(function () {

   event.preventDefault();
   var formData = new FormData(this);

   $.ajax({
     url: "recuperar-senha.php",
     type: 'POST',
     data: formData,

     success: function (mensagem) {
       $('#mensagem-recuperar').text('');
       $('#mensagem-recuperar').removeClass()
       if (mensagem.trim() == "Recuperado com Sucesso") {
         //$('#btn-fechar-rec').click();
         $('#email-recuperar').val('');
         $('#mensagem-recuperar').addClass('text-success')
         $('#mensagem-recuperar').text('Sua Senha foi enviada para o Email')

       } else {

         $('#mensagem-recuperar').addClass('text-danger')
         $('#mensagem-recuperar').text(mensagem)
       }


     },

     cache: false,
     contentType: false,
     processData: false,

   });

 });
</script>