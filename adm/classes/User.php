<?php
session_start();
ob_start();

require_once 'Conn.php';

class User extends Conn
{

	public $conn;
	
	public function User_Access()
	{
		$this->conn = $this->connect();

		if(isset($_POST["email"])){
			$email = $_POST["email"];
			$senha = $_POST["senha"];

			$login = $this->connect->query("SELECT * FROM usuarios WHERE email='$email' AND senha='$senha'");
			$acesso = $login->fetch(PDO::FETCH_ASSOC);

			if(!$acesso) {

				echo "<div class='msg-danger'>"."É necessário preencher todos os campos"."</div>";
				 
			}elseif(empty($acesso)){

				echo "<div class='msg-danger'>"."Sem sucesso"."</div>";

			}else{

				$_SESSION["user"] = $acesso["id"];
				header("location: ./home.php");
			}


		}
	}
}
