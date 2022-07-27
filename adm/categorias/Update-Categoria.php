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
<?php 

$listar = new Categorias();
$result = $listar->listCategoriasId();

foreach ($result as $row) {
		extract($row);
	}
?>

<main>
<section class="container-Yellow">	
	<div class="box-text"><p>Alterar uma <h2>Categoria</h2></p>
</section>

<section class="container">
	<form method="POST" enctype="multipart/form-data" class="dv-form">

	<input type="hidden" name="id" value="<?php echo $id ?>">
	<input type="text" name="titulo" value="<?php echo $titulo ?>">
	<label>Descrição até no máximo 240 catacteres</label>
	<textarea name="descricao" rows="5" cols="48" ><?php echo $descricao ?></textarea>
	<img src="<?php echo "../../img/categorias/$id/$imagem"?>" class="img-box-categoria-up"> 
	<Button type="submit" name="salvar" class="bt-confirm" value="Cadastrar">Alterar</Button>

	<a href="./Update-Categoria-Imagem.php<?php echo "?id=$id" ?>">
	<button type="button"class="bt-access-medium">Trocar Imagem</button></a>,
	<a href="../categorias/List-Categorias.php"><button type="button" class="bt-access">Voltar</button></a>

<?php

if(isset($_POST['titulo'])){

		$update = new Categorias();
		$update->updateCategoria();
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