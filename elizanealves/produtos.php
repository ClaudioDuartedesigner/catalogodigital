<head><meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortchu icon" href="./img/favicon.jpg">
	<meta property="og:image" content="https://catalogo.com.br/img/logo.jpg">
	<meta property="og:image:type" content="image/jpg">
	<meta name='description' content='Veja o nosso Catalogo Digital!'>
	<link rel="stylesheet" type="text/css" href="./css/main.css">
	<title>Meu Catalogo Digital</title>
</head>
<!--------------------------------------------
 -------------Início da Página ---------------
 --------------------------------------------->

<body>

<!--------------------------------------------
 -------------Inclusão do Cabeçalho ---------------
 --------------------------------------------->

<header>
    <?php include_once 'header.php';?>
</header>

<!--------------------------------------------
 -------------Início da Main ---------------
 --------------------------------------------->

<main>

<?php

require '../adm/classes/Conn.php';
require '../adm/catalogos_produtos/Class-Produtos.php';

$list = new produtos();
$result=$list->listProdutosId();
?>


<section class="container-Silver">

<?php
foreach ($result as $row) {
	extract($row);?>

	<div class="box-produtos">
		
		<div class="box-produtos-content">
		 <a href="./subcategoriasdetalhes.php<?php echo "?id=$id"?>">
			<img src="../img/catalogos_categorias/subcategorias/produtos/<?php echo $id ."/". $imagem ?>" class="img-box-produtos">
		</a>
			<h4> <?php echo $titulo ?></h4>
			<p><?php echo $descricao ?></p>
			<p><?php echo $local ?></p>
		</div>

		<div>
			<a href="https://api.whatsapp.com/send?phone=<?php echo "$whatsapp"?>&text=Oi, <?php echo $titulo ?> vi seu anúncio no site catalogonamao.com.br" target="_blank"><button class="bt-confirm">WhatsApp</button></a>

			<a href="<?php echo $link_catalogo ?>" target="_blank"><button class="bt-access">Visite-nos</button></a>
		</div>
	</div>

<?php } ?>
</section>


<section class="container">
	<a href="./index.php"><button class="bt-access">Voltar</button></a>
</section>


</main>

<!--------------------------------------------
 -------------Início do Footer ---------------
 --------------------------------------------->

<footer>
    <?php include_once 'footer.php';?>
</footer>

</body>