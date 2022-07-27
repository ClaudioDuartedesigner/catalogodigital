<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortchu icon" href="./img/favicon.jpg">
	<meta property="og:image" content="https://catalogo.com.br/img/logo.jpg">
	<meta property="og:image:type" content="image/jpg">
	<meta name='description' content='Veja o nosso Catalogo Digital!'>
	<link rel="stylesheet" type="text/css" href="./css/main.css">
	<title>Meu Catalogo Digital</title>
</head>

<body>

<header>
	<?php include_once 'header.php';?>
</header>

<main>


<section class="container">

<?php

require '../adm/classes/Conn2.php';

$list = $conn2->query("SELECT * FROM catalogos_subcategorias WHERE id_categoria=3");

while ($line=$list->fetch(PDO::FETCH_ASSOC)) { ?>
	<div class="box">
		<?php echo "<a href='./produtos.php?id=$line[id]'>" ?>
			<img src="../img/catalogos_categorias/subcategorias/<?php echo "$line[id]"."/"."$line[imagem]"?>" class="img-box-categoria">
		</a>
		<h4><?php echo "$line[titulo]"?></h4>
	</div>	
<?php
}

?>

</section>


<section class="container">
	<a href="./index.php"><button class="bt-access">Voltar</button></a>
</section>


</main>



</main>

<footer>
	<?php include_once 'footer.php'; ?>
</footer>

</body>
