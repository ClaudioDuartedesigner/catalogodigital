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
require './adm/categorias/Class-Categorias.php';
require './adm/catalogos_produtos/Class-Produtos.php';

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
		<a href="./subcategorias.php<?php echo "?id=$id"?>">
			<img src="./img/categorias/<?php echo $id ."/". $imagem ?>" class="img-box-categoria">
		</a>
		<h4> <?php echo $titulo ?></h4>
	</div>

<?php } ?>
</section>

<section class="container-Darkblue">
	<h1>Sites e Catalogos</h1>
</section>
    
<section class="container">
    
<?php  
$list = new produtos();
$result=$list->listProdutosDuart();

foreach ($result as $row) {
	extract($row);?>
    	<div class="box-divulga">
		<a href="<?php echo $link_catalogo ?>">
			<img src="./img/catalogos_categorias/subcategorias/produtos/<?php echo $id ."/". $imagem ?>" class="img-box-categoria-2">
		</a>
		<h4> <?php echo $titulo ?></h4>
		<p> <?php echo $descricao ?></p>
	</div>

<?php } ?>
    
    
</section>
<section class="container-Darkblue">
	<h1>Dicas para Empreendedores</h1>
</section>

<section class="container">
    
<?php  
$list = new produtos();
$result=$list->listProdutosDicas();

foreach ($result as $row) {
	extract($row);?>
    	<div class="box-divulga">
		<a href="<?php echo $link_catalogo ?>">
			<img src="./img/catalogos_categorias/subcategorias/produtos/<?php echo $id ."/". $imagem ?>" class="img-box-categoria-2">
		</a>
		<h4> <?php echo $titulo ?></h4>
		<p> <?php echo $descricao ?></p>
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