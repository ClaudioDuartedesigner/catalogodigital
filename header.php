<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortchu icon" href="./img/favicon.jpg">
	<meta property="og:image" content="https://catalogo.com.br/img/logo.jpg">
	<meta property="og:image:type" content="image/jpg">
	<meta name='description' content='Catalogo na mão, Anuncie Grátis!'>
	<link rel="stylesheet" type="text/css" href="./css/main.css">
	<title>Meu Catalogo Digital</title>
</head>
<?php

require_once './adm/classes/Conn2.php';

$result = $conn2->query("SELECT * FROM perfil");
$line = $result->fetch(PDO::FETCH_ASSOC);

?>

<section class="container">
	<div class="dv-header">	<img src="./img/logo.png" class="img-mini"></div>
	<div class="dv-header"><br><h2> <?php echo "$line[empresa]"  ?> </h2></div>
</section>



