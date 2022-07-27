<?php

require_once '../classes/Conn.php';


class Perfil extends Conn{

	public $conn;

	public function listPerfil(){

		$this->conn = $this->connect();

		$query_perfil = "SELECT * FROM perfil";

		$result_perfil = $this->connect->prepare($query_perfil);
		$result_perfil->execute();
		return $result_perfil->fetchAll();
	}

	public function updatePerfil(){

		$this->conn = $this->connect();

		$empresa = addslashes($_POST['empresa']);
		$endereco = addslashes($_POST['endereco']);
		$contatos = addslashes($_POST['contatos']);
		$whatsapp = addslashes($_POST['whatsapp']);
		$email = addslashes($_POST['email']);
		$instagram = addslashes($_POST['instagram']);
		$facebook = addslashes($_POST['facebook']);
		$funcionamento = addslashes($_POST['funcionamento']);
		$informacoes = addslashes($_POST['informacoes']);

		$sql = $this->connect->prepare("UPDATE perfil SET empresa = :empresa, endereco = :endereco, contatos = :contatos, whatsapp = :whatsapp, email = :email, instagram = :instagram, facebook = :facebook, funcionamento = :funcionamento, informacoes = :informacoes");

		$sql->bindValue(":empresa",$empresa);
		$sql->bindValue(":endereco",$endereco);
		$sql->bindValue(":contatos",$contatos);
		$sql->bindValue(":whatsapp",$whatsapp);
		$sql->bindValue(":email",$email);
		$sql->bindValue(":instagram",$instagram);
		$sql->bindValue(":facebook",$facebook);
		$sql->bindValue(":funcionamento",$funcionamento);	
		$sql->bindValue(":informacoes",$informacoes);
		$sql->execute();

		header("location: ../home.php");

		return true;

	}
}

?>