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

<section class="container-Red">	
	<div class="box-text"><p>Você está excluindo uma categoria</p>
	<h2>CUIDADO!</h2><br/></div>
</section>

<section class="container">
<?php 
$listar = new Categorias();
$result = $listar->listCategoriasId();

foreach ($result as $row) {
		extract($row);
	}


?>


	<form method="POST" enctype="multipart/form-data" class="dv-form">


	<input type="hidden" name="id" value="<?php echo $id ?>">
	

	<h3><?php echo $titulo ?></h3>
	<h4><?php echo $descricao ?></h4>

	<img src="<?php echo "../../img/catalogos_categorias/$id/$imagem"?>" class="img-box-categoria"> 
	<Button type="submit" name="salvar" class="bt-delete" value="Cadastrar">Confirmar</Button>

	<a href="./List-Categorias.php">
	<button type="button"class="bt-access">Desistir</button></a>

<?php

$id_categoria_total = $id;

require_once '../classes/Conn2.php';
$contagem = $conn2->query("SELECT * FROM subcategorias where id_categoria = $id_categoria_total");
$total = $contagem->rowCount();

if(isset($_POST['id'])){

		if($total <= 0){

		$update = new Categorias();
		$update->deleteCategoria();


		unlink('../../img/catalogos_categorias/'.$id.'/'.$imagem);
		rmdir('../../img/catalogos_categorias/'.$id);

		}else{
			?><div>
				<?php echo "<b>ATENÇÃO:</b> Você tem"." <b>".$total." ". "SUBCATEGORIAS"."</b> "." e não pode excluir uma categoria com subcategorias dentro, clique em <b>DESISTIR</B> e apague todas as SUBCATEGORIAS."; ?>
			</div>
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