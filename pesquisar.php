<head><meta charset="utf-8">
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortchu icon" href="./img/favicon.png">
	<meta property="og:image" content="https://catalogo.com.br/img/logo.jpg">
	<meta property="og:image:type" content="image/jpg">
	<meta name='description' content='Veja o nosso Catalogo Digital!'>
	<link rel="stylesheet" type="text/css" href="./css/main.css">
	<title>Meu Catalogo Digital</title>
</head>
<!--------------------------------------------
 -------------Início da Página ---------------
 --------------------------------------------->

<body>

<?php require_once 'config.php';?>

<!--------------------------------------------
 -------------Inclusão do Cabeçalho ---------------
 --------------------------------------------->

<header>
    <?php include_once 'header.php';?>
</header>

<!--------------------------------------------
 -------------Início da Main ---------------
 --------------------------------------------->

<main>
<br><br>

<?php

$pesquisar = $_POST['pesquisar'];

/*$result_pesquisa = $conn->query("SELECT * FROM anuncio WHERE servicos LIKE '%$pesquisar%' LIMIT 1000");*/

$result_pesquisa = $conn2->query("SELECT * FROM produtos WHERE titulo LIKE '%$pesquisar%' OR descricao LIKE '%$pesquisar%' OR local LIKE '%$pesquisar%'  LIMIT 1000");

    
    
$total = $result_pesquisa->rowCount();
while ($line=$result_pesquisa->fetch(PDO::FETCH_ASSOC))
	{
		?>
			<div class="dvanuncio">
				<div class="dvanuncio-content">
					<h2><?php echo "$line[titulo]";?></h2>
					<h3><?php echo "$line[descricao]";?></h3>
					<p><?php echo "$line[local]";?></p>
			</div>

				<a href="https://api.whatsapp.com/send?phone=<?php echo "$line[whatsapp]";?>&text=Vi seu anuncio no catalogonamao.com.br"><button class="bt-confirm">Whatsapp</button></a> 
				<a href="<?php echo "$line[link]";?>"><button class="bt-access">Visite-nos</button></a> 
			</div>
	
		<?php
	}?>
</section>




<br><br>

</main>

<!--------------------------------------------
 -------------Início do Footer ---------------
 --------------------------------------------->

<footer>
    <?php include_once 'footer.php';?>
</footer>

</body>