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
<section class="container-Yellow">	
	<div class="box-text"><p>Trocar imagem da Categoria <h2> <?php echo $titulo?></h2></p>
</section>

<section class="container">
	<form method="POST" enctype="multipart/form-data" class="dv-form">
	<input type="hidden" name="id" value="<?php echo $id?>"><br>
	<input type="file" name="imagem"><br>
	<Button type="submit" name="salvar" class="bt-confirm" value="Cadastrar">Alterar</Button>

	<a href="./List-Categorias.php">
	<button type="button"class="bt-delete">Desistir</button></a>

<?php

if(isset($_POST['id'])){

	unlink('../../img/catalogos_categorias/'.$id.'/'.$imagem);

	$formatfiles = array("png","jpg","jpeg","gif");
	$extensao = pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);

	if(in_array($extensao, $formatfiles)){
		$pasta = "../../img/catalogos_categorias/".$id."/";
		$tmp = $_FILES['imagem']['tmp_name'];
		$novoNome = $_FILES['imagem']['name'];

		$filename = $pasta.$novoNome;

		
		if(file_exists($filename)){
			?>

	   			<div class="dv-form"> <?php echo "Este aquivo já existe, procure mudar o nome do arquivo ou enviar outro!"; ?> 
	   			
			</div>

			<?php
		} else{

			if(move_uploaded_file($tmp, $pasta.$novoNome)){

				$create_category = new Categorias();
				$create_category->updateCategoriaImagem();
			}
		}
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