<?php

include_once '../classes/Conn2.php';
		
		$titulosub = $_GET['titulosub'];
		/*$titulo = $_GET['id_titulo'];*/

		$id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
		$id_subcategoria = $_GET['id_subcategoria'];

		$sql = $conn2->prepare("DELETE FROM itens_subcategorias WHERE id = :id");
		
		$sql->bindValue(":id",$id);
		$sql->execute();
		header("location: ./Create-ItensSubCategoria.php?id=$id_subcategoria&titulosub=$titulosub");
	
?>
