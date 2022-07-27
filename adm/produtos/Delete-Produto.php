<?php
session_start();
ob_start();
?>

<?php
if(!isset($_SESSION["user"])){
    header("location: ./errologin.php");
}
?>

<?php

require_once '../classes/Conn.php';
require_once './Class-Produtos.php';


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

<?php

$get_titulo = $_GET['get_titulo'];
$get_cat = $_GET['get_cat'];

?>
<section class="container-Red">	
	<div class="box-text"><p>Você está excluindo uma subcategoria,</p>
	<h2>CUIDADO! </h2><br/></div>
</section>


<section class="container">


<?php 

$listar = new produtos();
$result = $listar->listProdutosIdUp();

foreach ($result as $row) {
		extract($row);
?>

	<form method="POST" enctype="multipart/form-data" class="dv-form">
	<input type="hidden" name="id" value="<?php echo $id ?>">
	<h3><?php echo $titulo ?></h3>
	<h4><?php echo $descricao ?></h4>
	<img src="<?php echo "../../img/categorias/subcategorias/produtos/$id/$imagem"?>" class="img-box-categoria"> 
	<Button type="submit" name="salvar" class="bt-delete" value="Cadastrar">Confirmar</Button>

	<a href="./List-SubCategorias.php<?php echo "?id=$get_cat&get_titulo=$get_titulo" ?>">
	<button type="button"class="bt-access">Desistir</button></a>

<?php

	}


if(isset($_POST['id'])){

		$update = new produtos();
		$update->deleteProduto();

		unlink('../../img/categorias/subcategorias/produtos/'.$id.'/'.$imagem);
		rmdir('../../img/categorias/subcategorias/produtos/'.$id);
	}
		
?>
</section>

</main>

<!--------------------------------------------
 -------------Início do Footer ---------------
 --------------------------------------------->

<footer>
    <?php include_once '../footer.php';?>
</footer>

</body>