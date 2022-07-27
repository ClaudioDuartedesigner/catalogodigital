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
require './adm/catalogos_categorias/Class-Categorias.php';

$list = new Categorias();
$result=$list->listCategorias();

?>

<section class="container">
	<h2>Estamos em construção!!!</h2>
</section>

<section class="container">
	<h2>por enquanto acesse o nosso site provisório</h2>
</section>


<section class="container">
	<a href="https://www.catalogonamao.com/"><button class="bt-access">Clique aqui</button></a>
</section>

<section class="container">

<?php
foreach ($result as $row) {
	extract($row);?>

	<div class="box">
		<a href="./catalogos_subcategorias.php<?php echo "?id=$id"?>">
			<img src="./img/catalogos_categorias/<?php echo $id ."/". $imagem ?>" class="img-box-categoria">
		</a>
		<h4> <?php echo $titulo ?></h4>
	</div>

<?php } ?>
</section>


</main>

<!--------------------------------------------
 -------------Início do Footer ---------------
 --------------------------------------------->

<footer>
    <?php include_once 'footer.php';?>
</footer>

</body>