<?php
session_start();
ob_start();
?>

<?php
if(!isset($_SESSION["user"])){
    header("location: ../errologin.php");
}
?>

<!--------------------------------------------
 -------------Início da Página ---------------
 --------------------------------------------->

<body>

<?php require_once '../config.php';?>

<!--------------------------------------------
 -------------Inclusão do Cabeçalho ---------------
 --------------------------------------------->

<header>
    <?php include_once '../header.php';?>
</header>

<!--------------------------------------------
 -------------Início da Main ---------------
 --------------------------------------------->

<main>

<section class="container">
	<a href="Create-Categoria.php"><button class="bt-access-medium">Nova Categoria</button></a>
	<a href="../home.php"><button class="bt-access-medium">Voltar</button></a>
</section>

<section class="container">
<?php
require '../classes/Conn.php';
require './Class-Categorias.php';

$list = new Categorias();
$result=$list->listCategorias();

foreach ($result as $row) {
	extract($row);?>

<div class="box-adm">
	<img src="../../img/categorias/<?php echo $id ."/". $imagem ?> " class="img-box-categoria">
	<h4><?php echo $titulo ?></h4>
	
		
	<a href="../subcategorias/List-SubCategorias.php<?php echo "?id=$id&get_titulo=$titulo"?>">
		<button class="bt-access">L</button>
	</a>

	<a href="./Update-Categoria.php<?php echo "?id=$id"?>">
		<button class="bt-edit">A</button>
	</a>

	<a href="./Delete-Categoria.php<?php echo "?id=$id"?>">
		<button class="bt-delete">E</button>
	</a>
	</div>

<?php } ?>

</section>

<section class="container">
	<a href="Create-Categoria.php"><button class="bt-access-medium">Nova Categoria</button></a>
	<a href="../home.php"><button class="bt-access-medium">Voltar</button></a>
</section>

</main>

<!--------------------------------------------
 -------------Início do Footer ---------------
 --------------------------------------------->

<footer>
    <?php include_once '../footer.php';?>
</footer>

</body>