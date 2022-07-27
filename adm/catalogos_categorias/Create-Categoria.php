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
require_once './Class-Categorias.php';


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
	<div class="box-text"><p>Cadastre uma <h2>Nova Categoria</h2></p>
</section>


<section class="container">
	<form method="POST" enctype="multipart/form-data" class="dv-form">
	Titulo : <input type="text" name="titulo"><br>
	<p>Descrição até no máximo 240 catacteres</p>
	<textarea name="descricao" rows="5" cols="48"></textarea>
	Imagem: <input type="file" name="imagem">
	<Button type="submit" name="salvar" class="bt-confirm" value="Cadastrar">Cadastrar</Button>
	<a href="../categorias/List-Categorias.php"><button type="button" class="bt-access">Voltar</button></a>

<?php

if(isset($_POST['titulo'])){

	$formatfiles = array("png","jpg","jpeg","gif");
	$extensao = pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);

	if(in_array($extensao, $formatfiles)){

		$create = new Categorias();
		$create->createCategoria();

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