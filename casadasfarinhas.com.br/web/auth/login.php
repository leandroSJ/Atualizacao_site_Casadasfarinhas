<?php
  @session_start();
  require_once("conexao.php");


  $email = $_POST['email'];
  $senha = $_POST['password'];
  $password_hash = password_hash($senha, PASSWORD_DEFAULT);  

  $query = $pdo->prepare("SELECT * from usuarios where email = :email or cpf = :email");
  $query->bindValue(":email", "$email"); 
  $query->execute();
  $res = $query->fetchALL(PDO::FETCH_ASSOC);
  $hash = $res[0]['senha_crip'];  

  $total_reg = @count($res);
  if($total_reg > 0){
    $ativo = $res[0]['ativo'];          

    if($ativo == 'Sim'){
      $_SESSION['id']= $res[0]['id'];
      $_SESSION['nivel'] = $res[0]['nivel'];
      $_SESSION['nome']= $res[0]['nome'];      
    }else{
      echo "<script>window.alert('Seu usuário foi desativado !!!')</script>";      
      echo "<script>window.location='index.php'</script>";
    }

    if(password_verify($senha, $hash)){      
      //Go to panel
      echo "<script>window.location='painel'</script>";
    }else{
      echo "<script>window.alert('Senha Incorreta, Verifique sua senha !!!')</script>";
      echo "<script>window.location='index.php'</script>";
    }
    
  }else{
    echo "<script>window.alert('Email não cadastrado, verifique seu email !!!')</script>";
    echo "<script>window.location='index.php'</script>";
  }  


?>