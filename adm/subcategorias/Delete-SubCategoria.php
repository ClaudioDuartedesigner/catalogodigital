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

$listar = new subCategorias();
$result = $listar->listSubCategoriasIdUp();

foreach ($result as $row) {
		extract($row);
?>

	<form method="POST" enctype="multipart/form-data" class="dv-form">
	<input type="hidden" name="id" value="<?php echo $id ?>">
	<h3><?php echo $titulo ?></h3>
	<h4><?php echo $descricao ?></h4>
	<img src="<?php echo "../../img/categorias/subcategorias/$id/$imagem"?>" class="img-box-categoria"> 
	<Button type="submit" name="salvar" class="bt-delete" value="Cadastrar">Confirmar</Button>

	<a href="./List-SubCategorias.php<?php echo "?id=$get_cat&get_titulo=$get_titulo" ?>">
	<button type="button"class="bt-access">Desistir</button></a>

<?php

	}

$id_subcategoria_total = $id;
require_once '../classes/Conn2.php';
$contagem = $conn2->query("SELECT * FROM itens_subcategorias where id_subcategoria = $id_subcategoria_total");
$total = $contagem->rowCount();

if(isset($_POST['id'])){

		$sql = $conn2->prepare("DELETE FROM itens_subcategorias where id_subcategoria = $id_subcategoria_total");
		$sql->execute();

		$update = new SubCategorias();
		$update->deleteSubCategoria();

		unlink('../../img/categorias/subcategorias/'.$id.'/'.$imagem);
		rmdir('../../img/categorias/subcategorias/'.$id);
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