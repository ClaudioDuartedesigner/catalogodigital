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
require_once './Class-ItensSubCategorias.php';

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


<script type="text/javascript">
	window.onload = function () {
   	 document.getElementById("cad-item").focus();
	}	
</script>

<main>

<section class="container-Yellow">	
	<div class="box-text"><p>Você está inserindo ítens em</p>
	<h2><?php echo $titulosub ?></h2><br/></div>
</section>

<section class="container">
	<form method="POST" enctype="multipart/form-data" class="dv-form">
	<input type="hidden" name="id_subcategoria" value="<?php echo $id_get ?>">
	<input type="text" name="item" placeholder="Insira aqui o novo ítem" id="cad-item"><br>
	<Button type="submit" name="salvar" class="bt-confirm" value="Cadastrar">Cadastrar</Button>

	<a href="./Update-ItensSubCategoria.php<?php echo "?id=$id_get&get_titulo=$get_titulo&get_cat=$get_cat&titulosub=$titulosub"?>">
		<button  type="button" class="bt-access-medium">Ordenar/Alterar</button>
	</a>

	

<?php

if(isset($_POST['item'])){

		$create = new itemSubCategorias();
		$create->createItemSubCategoria();
}
		
?>

</form>

</section>


<?php
	$list = new itemSubCategorias();
	$result=$list->listItemSubCategoriasId();


foreach ($result as $row) {
	extract($row);

		?>
	<section class="container-itens">	
		<div class="box-adm-itens"> 
			<p class="text-left">
				<?php echo $item; ?>

			<a href="./delete-ItensSubCategorias.php<?php echo "?id=$id&id_subcategoria=$id_subcategoria&get_titulo=$get_titulo&titulosub=$titulosub"?>" class="a-red">X</a></p>
		</div>
	</section>
		<?php
	}

?>

<section class="container">
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