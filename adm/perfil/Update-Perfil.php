<?php
session_start();
ob_start();
?>
<?php
if(!isset($_SESSION["user"])){
	header("location: ../index.php");
}
?>
<body>
<!--------------------------------------------
 -------------Inclusão do Cabeçalho ---------------
 --------------------------------------------->

<header>
	<?php include_once '../header.php';?>
</header>


<!--------------------------------------------
 -------------Início da Main ---------------
 -------------------------------------------->
<?php
require '../classes/Conn.php';
require './classPerfil.php';

$listar = new Perfil();
$result = $listar->listPerfil();

foreach ($result as $row) {
	extract($row);
}

?>

<main>

<!--------------------------------------------
 -------------Início do Formulário ---------------
 --------------------------------------------->

<section class="container-Silver">
	<form action="" method="POST" class="dv-form">
		<label><h2>Cadastro de Perfil</h2></label><br>
		<label>Empresa</label>
		<input type="text" name="empresa" value="<?php echo $empresa ?>">

		<label>Endereço</label>
		<textarea name="endereco" rows="3" cols="48"><?php echo $endereco ?></textarea>

		<label>Contatos</label>
		<input type="text" name="contatos" value="<?php echo $contatos ?>">

		<label>Whatsapp</label>
		<input type="text" name="whatsapp" value="<?php echo $whatsapp ?>">

		<label>E-mail</label>
		<input type="text" name="email" value="<?php echo $email ?>">

		<label>Instagram</label>
		<input type="text" name="instagram" value="<?php echo $instagram ?>">

		<label>Facebook</label>
		<input type="text" name="facebook" value="<?php echo $facebook ?>">

		<label>Funcionamento:</label>
		<textarea rows="3" cols="48" name="funcionamento"><?php echo $funcionamento ?></textarea>

		<label>Mais informações</label>
		<textarea rows="4" cols="48" name="informacoes"><?php echo $informacoes ?></textarea>

		<button type="submit" class="bt-access">Alterar</button>

			<a href="./home.php"><button type="button" class="bt-access">Desistir</button></a>
</form>

<!--------------------------------------------
 ------------- Fim do Formulário ---------------
 --------------------------------------------->

<?php

	if(isset($_POST['empresa'])){

		$update_perfil = new Perfil();
		$update_perfil->updatePerfil();
	}

?>

</section>
</main>

<!--------------------------------------------
 -------------Início do Footer ---------------
 --------------------------------------------->

<footer>
	<?php include_once '../footer.php'; ?>
</footer>
