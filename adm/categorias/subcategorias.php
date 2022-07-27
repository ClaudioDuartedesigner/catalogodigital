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

<?php

require './adm/classes/Conn.php';
require './adm/subcategorias/Class-SubCategorias.php';

$list = new subCategorias();
$result=$list->listSubCategoriasId();

?>


<section class="container">

<?php
foreach ($result as $row) {
	extract($row);?>

	<div class="box">
		<img src="./img/categorias/subcategorias/<?php echo $id ."/". $imagem ?>" class="img-box-categoria">
		<h4> <?php echo $titulo ?></h4>
		<p> <?php echo $descricao ?></p>
		<p class="text-preco"><?php echo "R$ " . number_format($valor,2)  ?></p>

		    <a href="./subcategoriasdetalhes.php<?php echo "?id=$id"?>">
		    <button class="bt-access">Detalhes</button>
		</a>
		
		<a href="https://api.whatsapp.com/send?phone=<?php echo "$line[whatsapp]"?>&text=Oi, quero <?php echo $titulo ?>" target="_blank"><button class="bt-confirm">Quero Este</button></a>
	</div>

<?php } ?>
</section>


<section class="container">
	<a href="./index.php"><button class="bt-access">Voltar</button></a>
</section>


</main>

<!--------------------------------------------
 -------------Início do Footer ---------------
 --------------------------------------------->

<footer>
    <?php include_once 'footer.php';?>
</footer>

</body>