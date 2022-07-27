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
require './adm/categorias/Class-Categorias.php';

$list = new Categorias();
$result=$list->listCategorias();

?>


<section class="container">

<?php
foreach ($result as $row) {
	extract($row);?>

	<div class="box">
		<img src="./img/categorias/<?php echo $id ."/". $imagem ?>" class="img-box-categoria">
		<h4> <?php echo $titulo ?></h4>
		<p> <?php echo $descricao ?></p>

		<a href="./subcategorias.php<?php echo "?id=$id"?>">
		<button class="bt-access">Veja mais..</button></a>
 		
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