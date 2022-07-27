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
require_once './Class-SubCategorias.php';


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
<?php 

$get_titulo = $_GET['get_titulo'];
$id_get = $_GET['id'];
$get_cat = $_GET['get_cat'];

$listar = new subCategorias();
$result = $listar->listSubCategoriasIdUp();

foreach ($result as $row) {
		extract($row);

		}
?>

<main>
<section class="container">
	<form method="POST" enctype="multipart/form-data" class="dv-form">

	<p class="title-form">Alterar de Categoria</p>

	<input type="hidden" name="id" value="<?php echo $id ?>">
	<input type="text" name="titulo" value="<?php echo $titulo ?>">
	<label>Descrição até no máximo 240 catacteres</label>
	<textarea name="descricao" rows="5" cols="48" ><?php echo $descricao ?></textarea>
	<input type="text" name="valor" value="<?php echo number_format($valor,2) ?>">
	<img src="<?php echo "../../img/catalogos_categorias/subcategorias/$id/$imagem"?>" class="img-box-categoria-up"> 
	<Button type="submit" name="salvar" class="bt-confirm" value="Cadastrar">Alterar</Button>
		<a href="./Create-ItensSubCategoria.php<?php echo "?id=$id&get_titulo=$get_titulo&get_cat=$get_cat&titulosub=$titulo"?>">
	<button type="button" class="bt-access-medium">Novo/Alterar item</button>
	</a>

	<a href="./Update-SubCategoria-Imagem.php<?php echo "?id=$id&get_titulo=$get_titulo&get_cat=$get_cat" ?>">
	<button type="button"class="bt-access-medium">Trocar Imagem</button></a>

	<a href="./List-SubCategorias.php<?php echo "?id=$id_categoria&get_titulo=$get_titulo" ?>">
	<button type="button"class="bt-access-medium">Voltar</button></a>


<?php

if(isset($_POST['titulo'])){

		$update = new subCategorias();
		$update->updateSubCategoria();
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