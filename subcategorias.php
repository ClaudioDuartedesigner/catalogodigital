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

	<br>
<section class="container">
	<div class="dvpesquisa">
	    <form method="post" action="pesquisar.php">
	        Pesquisar: <input type="text" name="pesquisar">
	        <input type="submit" value="Ir">
	    </form>
	</div>
</section>

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
		 <a href="./produtos.php<?php echo "?id=$id"?>">
			<img src="./img/categorias/subcategorias/<?php echo $id ."/". $imagem ?>" class="img-box-categoria">
		</a>
			<h4> <?php echo $titulo ?></h4>
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