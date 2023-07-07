<?php 

$db = $DB_NAME;
$user = $user;
$psw = $psw;
$server = $server_Addr;

date_default_timezone_set('America/Sao_Paulo');

try {  
  $pdo = new PDO("mysql:dbname=$db;host=$server;charset=utf8", "$user", "$psw");    
} catch (Exception $e) {
    echo 'Não conectado ao Banco de Dados! <br> <br>' .$e;
}


$system_name = 'Casa das Farinhas';
$system_email = 'lancamentos.ti@casadasfarinhas.com.br';
$endereco_sistema = 'Avenida Antonio Paterson, nº 107, Candeias - BA';
$instagram = 'https://instagram.com/casadasfarinhasof/';
$facebook = 'https://www.facebook.com/casadasfarinhass';

// Inserir configuração padrão caso não exista

$query = $pdo->query("SELECT * from config");
$res = $query->fetchALL(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if ($total_reg == 0) {
    $pdo->query("INSERT INTO config SET nome = '$system_name', email = '$system_email',
    endereco = '$endereco_sistema', instagram = '$instagram', facebook = '$facebook' ");
}else{
    $nome_sistema = $res[0]['nome'];
    $email_sistema = $res[0]['email'];          
    $telefone_fixo = $res[0]['telefone_fixo']; 
    $endereco_sistema = $res[0]['endereco'];         
    $whatsapp_varejo = $res[0]['whatsapp_varejo']; 
    $whatsapp_atacado = $res[0]['whatsapp_atacado'];
    $instagram = $res[0]['instagram'];
    $facebook = $res[0]['facebook'];
    
}

// banner_slides
$query_slides = $pdo->query("SELECT * FROM slider_banner ");
$result_slides = $query_slides->fetchAll(PDO::FETCH_ASSOC);
$qtd_reg = @count($result_slides);


// banner_ofertas_varejo
$query_ofertas = $pdo->query("SELECT * FROM slider_ofertas ");
$result_ofertas = $query_ofertas->fetchAll(PDO::FETCH_ASSOC);
$qtd_ofertas = @count($result_ofertas);

// banner_ofertas_atacado
$query_ofertas_atacado = $pdo->query("SELECT * FROM slider_ofertas_atacado ");
$result_ofertas_atacado = $query_ofertas_atacado->fetchAll(PDO::FETCH_ASSOC);
$qtd_ofertas_atacado = @count($result_ofertas_atacado);

// banner_receitas
$query_receitas = $pdo->query("SELECT * FROM slider_receitas ");
$result_receitas = $query_receitas->fetchAll(PDO::FETCH_ASSOC);
$qtd_receitas = @count($result_receitas);


// produtos loja
$query_produtos = $pdo->query("SELECT * FROM produtos ");
$result_produtos = $query_produtos->fetchAll(PDO::FETCH_ASSOC);
$qtd_produtos = @count($result_produtos);

// produtos atacado
$query_produtos_atacado = $pdo->query("SELECT * FROM produtos_atacado ");
$result_produtos_atacado = $query_produtos_atacado->fetchAll(PDO::FETCH_ASSOC);
$qtd_produtos_atacado = @count($result_produtos_atacado);

// banner_parceiros
$query_parceiros = $pdo->query("SELECT * FROM slider_parceiros ");
$result_parceiros = $query_parceiros->fetchAll(PDO::FETCH_ASSOC);
$qtd_parceiros = @count($result_parceiros);

?>

