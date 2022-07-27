<?php
session_start();
ob_start();
?>

<?php
if(!isset($_SESSION["user"])){
    header("location: ../errologin.php");
}

$id_get = $_GET['id'];
$get_titulo = $_GET['get_titulo'];
?>

<!--------------------------------------------
 -------------Início da Página ---------------
 --------------------------------------------->

<body>

<?php require_once '../config.php';?>

<!--------------------------------------------
 -------------Inclusão do Cabeçalho ---------------
 --------------------------------------------->

<header><meta charset="utf-8">
    <?php include_once '../header.php';?>
</header>

<!--------------------------------------------
 -------------Início da Main ---------------
 --------------------------------------------->

<main>

<section class="container-Yellow">	
	<div class="box-text"><p>Você está em subcategorias de</p>
	<h2><?php echo $get_titulo ?></h2><br/></div>
</section>

<section class="container">
		<a href="Create-Produto.php<?php echo "?id=$id_get&get_titulo=$get_titulo"?>"><button class="bt-access-medium">Novo Produto</button></a>
		<a href="../catalogos_categorias/List-Categorias.php"><button class="bt-access-medium">Voltar</button></a>
</section>

<section class="container-Silver">
<?php
require '../classes/Conn.php';
require './Class-Produtos.php';

$list = new produtos();
$result=$list->listProdutosId();

foreach ($result as $row) {
	extract($row);?>

<div class="box-adm-produtos">
	<img src="../../img/catalogos_categorias/subcategorias/produtos/<?php echo $id ."/". $imagem ?> " class="img-box-produtos">
	<h4><?php echo $titulo ?></h4>
	<p><?php echo $descricao ?></p>
	<p><?php echo $local ?></p>
	

	<a href="./Update-Produto.php<?php echo "?id=$id&get_titulo=$get_titulo&get_cat=$id_subcategoria"?>">
		<button class="bt-edit">Alterar</button>

	<a href="./Delete-Produto.php<?php echo "?id=$id&get_cat=$id_subcategoria&get_titulo=$get_titulo"?>">
		<button class="bt-delete">Excluir</button>
	</a>
	</div>

<?php } ?>

</section>

<section class="container">
	<a href="Create-Produto.php<?php echo "?id=$id_get&titulo=$id_titulo"?>"><button class="bt-access-medium">Novo Produto</button></a>
	<a href="../categorias/List-Categorias.php"><button class="bt-access-medium">Voltar</button></a>
</section>

</main>

<!--------------------------------------------
 -------------Início do Footer ---------------
 --------------------------------------------->

<footer>
    <?php include_once '../footer.php';?>
</footer>

</body>