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

$id_get = $_GET['id'];
$get_titulo = $_GET['get_titulo'];
$val = 00.00;
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
	<form method="POST" enctype="multipart/form-data" class="dv-form">
	<input type="hidden" name="id_categoria" value="<?php echo $id_get ?>">
	Titulo : <input type="text" name="titulo"><br>
	<p>Descrição até no máximo 240 catacteres</p>
	<textarea name="descricao" rows="5" cols="48"></textarea>
	Valor: <input type="hidden" name="valor" value="<?php echo number_format($val,2,",","."); ?>">

	Imagem: <input type="file" name="imagem">
	<Button type="submit" name="salvar" class="bt-confirm" value="Cadastrar">Cadastrar</Button>
	<a href="./List-SubCategorias.php<?php echo "?id=$id_get&get_titulo=$get_titulo" ?>"><button type="button" class="bt-confirm">Voltar</button></a>

<?php

if(isset($_POST['titulo'])){

	$formatfiles = array("png","jpg","jpeg","gif");
	$extensao = pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);

	if(in_array($extensao, $formatfiles)){

		$create = new subCategorias();
		$create->createSubCategoria();

	}else{
		?>
			<br><br>
			<?php echo "Formato de imagem não aceito, somente png, jpg, jpeg, gif";	?>
			</form>	
		<?php
	}	


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