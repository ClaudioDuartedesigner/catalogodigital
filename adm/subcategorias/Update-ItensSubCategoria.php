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
require_once '../classes/Conn2.php';
require_once '../classes/Conn.php';
require_once '../subcategorias/Class-ItensSubCategorias.php';

@$id_get = $_GET['id'];
@$get_titulo = $_GET['get_titulo'];
@$get_cat = $_GET['get_cat'];
@$titulosub = $_GET['titulosub']
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
<section class="container-Yellow">	
	<div class="box-text"><p>Você está inserindo ítens em</p>
	<h2><?php echo $titulosub ?></h2><br/></div>
</section>	

<br>

<section class="container2">
	<?php 
$id_get = $_GET['id'];
$listar = new itemSubCategorias();
$result = $listar->listItemSubCategoriasId();

foreach ($result as $row) {
	extract($row);
?>	
<div class="box-itens">
	<form method="POST" enctype="multipart/form-data"  class="form-itens">
		<input type="hidden" name="id" value="<?php  echo $id; ?>">	
		<input type="hidden" name="id_subcategoria" value="<?php  echo $id_subcategoria ?>">	
		<input type="number" name="ordem" value="<?php  echo $ordem ?>"  maxlength="4" size=3 class="input-valor">	
		<input type="text" name="item" value="<?php  echo $item ?>" size=30>

		<Button type="submit" name="salvar" value="Cadastrar" class="bt-ok">Ok</Button>

	<?php
	
	if(isset($_POST['id'])){

		$listar = new itemsubCategorias();
		$result = $listar->updateItemSubCategoria();

	}
?>
</form>

<?php } ?>
</div>	
</section>
<br>
<section class="container2">
	<a href="./Update-SubCategoria.php<?php echo "?id=$id_get&get_titulo=$get_titulo&get_cat=$get_cat"?>">
		<button  type="button" class="bt-access">Voltar</button>
	</a>
</section>

</main>

<!--------------------------------------------
 -------------Início do Footer ---------------
 --------------------------------------------->

<footer>
    <?php include_once '../footer.php';?>
</footer>

</body>